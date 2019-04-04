<?php

namespace App\Http\Controllers\Barbershop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HairdresserController extends Controller
{
    public function main(){
    	$user = Auth::user();
        if (view()->exists('barbershop.hairdresser.main')){
            return view('barbershop.hairdresser.main',['user_role'=>$user->role]);
        }
        abort(404);

    }
    public function settings(){
    	$user = Auth::user();
        if (view()->exists('barbershop.hairdresser.settings')){
            return view('barbershop.hairdresser.settings',['user_role'=>$user->role]);
        }
        abort(404);
    }
}
