<?php

namespace App\Http\Controllers\Barbershop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        $user = Auth::user();
        if (view()->exists('barbershop.bs_index')){
        	return view('barbershop.bs_index',['user_role'=>$user->role]);
    	}
    	abort(404);
    }
}
