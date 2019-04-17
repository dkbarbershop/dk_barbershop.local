<?php

namespace App\Http\Controllers\Barbershop;

use App\Models\BsObject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
    public function store(Request $request)
    {
        //
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
    public function getObject(){ 
    $msg = "This is a simple message.";
     return response()->json(array('msg'=> $msg), 200);
    }
    public function getbsobject(Request $request) {
      $obj = $this->getObectById($request->id); 
      return response()->json(array('bs_obj'=> $obj[0]), 200);
   }
    public function getObectById($obj){
       return  BsObject::where('id',$obj)->get();
    }
}
