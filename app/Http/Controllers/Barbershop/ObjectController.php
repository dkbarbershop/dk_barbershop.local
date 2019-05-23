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

class ObjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
   /* public function store(BsObjectRequest $request)*/
  public function store(Request $request)
    {
        
        /*$object_storage_path = storage_path('images') .'/'.$object_data['name'];*/
        /*dd($object_storage_path);*/
        /*fsdfsdfsdsdsdfsdf*/
        /*Storage::makeDirectory($object_storage_path, 0775, true); */
   /*dd($object_storage_path);*/ 
        $user = Auth::user();
        $object_data = $request->all();
        $object_data['creator'] = $user->login;
        $object_data['last_modifer'] = $user->login;

        $object_storage_path = storage_path('images')."\\".$object_data['name'];
        /*dd(storage_path());*/
        Storage::makeDirectory(storage_path('/app/112'));
        

/*
if(!Storage::exists('/path/to/your/directory')) {

    Storage::makeDirectory('/path/to/create/your/directory', 0775, true); //creates directory

}
 */       
/*$object_storage_path = storage_path('images') +'/'+ $object_data['name'];
   dd($object_storage_path);*/
/*if(!Storage::exists('/path/to/your/directory')){
    Storage::makeDirectory($object_storage_path, 0775, true);     
}

        foreach ($request->file() as $file) {
            foreach ($file as $f) {
                //$f->move(storage_path('images'), time().'_'.$f->getClientOriginalName());
                $f->move($object_storage_path, time().'_'.$f->getClientOriginalName());
            }
        }
        unset($object_data['file']); 
        $bs_object = BsObject::create($object_data);*/
        /*return $bs_object;*/
        /*return 'ok';*/
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
       return $bsobjects;
    }
/*    public function getObject(){ 
    $msg = "This is a simple message.";
     return response()->json(array('msg'=> $msg), 200);
    }*/
    public function getbsobject(Request $request) {
      $obj = $this->getObectById($request->id); 
      return response()->json(array('bs_obj'=> $obj[0]), 200);
   }
    public function getObectById($obj){
       return  BsObject::where('id',$obj)->get();
    }
}
