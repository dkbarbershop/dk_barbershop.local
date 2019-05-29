<?php

namespace App\Http\Controllers\Barbershop;

use App\Models\BsObject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BsObjectRequest;
use App\Http\Controllers\Barbershop\UploadController;
/*use Illuminate\Support\Facades\Storage;*/
use Storage;
use File;

class ObjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   /* public $no_image_path = '\storage\barbershop\images\no_foto.jpg';*/
    public $no_image_path = '/storage/barbershop/images/no_foto1.png';

    public function index()
    {   
        $user = Auth::user();
        if (view()->exists('barbershop.superroot.objects')){
            $bsobjects = $this->getObjects();
            return view('barbershop.superroot.objects',['user_role'=>$user->role,'bsobjects'=>$bsobjects]);
        }
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BsObjectRequest $request)
  /*public function store(Request $request)*/
    {
        $first_file = true;
       
        $user = Auth::user();
        $object_data = $request->all();
        $object_data['creator'] = $user->login;
        $object_data['last_modifer'] = $user->login;
        $st_path = 'storage/barbershop/'.$object_data['name'].'/images/obj';
        $object_data['image'] =  $this->no_image_path;
        foreach ($request->file() as $file) {
            foreach ($file as $f) {
                if($first_file){
                    $object_data['image'] ='/'.$st_path.'/'.$f->getClientOriginalName();
                    $first_file = false;
                }
                $f->move($st_path,$f->getClientOriginalName());
            }
        }
        unset($object_data['file']); 
        $bs_object = BsObject::create($object_data);
        return $bs_object;
    }
 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Objects  $objects
     * @return \Illuminate\Http\Response
     */
    public function show(Objects $objects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Objects  $objects
     * @return \Illuminate\Http\Response
     */
    public function edit(Objects $objects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Objects  $objects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Objects $objects)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Objects  $objects
     * @return \Illuminate\Http\Response
     */
    public function destroy(Objects $objects)
    {
        //
    }
    public function getObjects(){
       $bsobjects = BsObject::all();
       foreach ($bsobjects as $bsobject) {
        $find_file = public_path().$bsobject->image;
        $exists = File::exists($find_file);
        if (!(isset($bsobject->image) && $exists)) 
            $bsobject->image_src = $this->no_image_path;
        else $bsobject->image_src = $bsobject->image;
       }
       return $bsobjects;
    }
/*    public function getObject(){ 
    $msg = "This is a simple message.";
     return response()->json(array('msg'=> $msg), 200);
    }*/
    public function getbsobject(Request $request) {
        $obj = $this->getObectById($request->id); 
        $find_file = public_path().$obj[0]->image;
        $exists = File::exists($find_file);
        if (!(isset($obj[0]->image) && $exists)) 
            $obj[0]->image_src = $this->no_image_path;
        else $obj[0]->image_src = $obj[0]->image;
       
      return response()->json(array('bs_obj'=> $obj[0]), 200);
   }
    public function getObectById($obj){
       return  BsObject::where('id',$obj)->get();
    }
}
