<?php

namespace App\Http\Controllers\Barbershop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DirectorController extends Controller
{
    public function results(){
    $user = Auth::user();
        if (view()->exists('barbershop.director.results')){
            return view('barbershop.director.results',['user_role'=>$user->role]);
        }
        abort(404);
    }
    public function work(){
        $user = Auth::user();
        if (view()->exists('barbershop.director.work')){
            return view('barbershop.director.work',['user_role'=>$user->role]);
        }
        abort(404);	
    }
}
