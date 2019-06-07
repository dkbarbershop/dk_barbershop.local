<?php

namespace App\Http\Controllers\Barbershop;

use App\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        switch ($user->login) {
        case 'SuperRoot':{
            if (view()->exists('barbershop.superroot.users')){
                $role = ['SuperRoot','Director'];
                $usersList = $this->getUsersByRole($role);
                $c_user = $this->getUserById($usersList[0]->id);
                return view('barbershop.superroot.users',[
                    'user_role' =>$user->role,
                    'usersList' =>$usersList,
                    'c_user'    =>$c_user
                    ]);
                return view('barbershop.superroot.users',[
                    'user_role' =>$user->role]);
            }
            abort(404);
        }
        break;
        }
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
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
     
    }
    public function main(){
        $user = Auth::user();
        if (view()->exists('barbershop.user.main')){
            return view('barbershop.user.main',['user_role'=>$user->role]);
        }
        abort(404);

    }
    public function settings(){
        $user = Auth::user();
        if (view()->exists('barbershop.user.settings')){
            return view('barbershop.user.settings',['user_role'=>$user->role]);
        }
        abort(404);
    }
    public function getUserById($id){
        $user = User::where('id',$id)->get();
        return $user;
    }
    public function getUsersByRole($role){
        $user = User::whereIn('role',$role)->orderBy('role')->get();
        return $user;
    }
}
