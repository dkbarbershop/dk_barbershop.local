<?php

namespace App\Http\Controllers\Barbershop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Barbershop\ObjectController;

class LoginController extends Controller
{
    public function index(){
        $user = Auth::user();
        if (view()->exists('barbershop.bs_index')){
        	$bsobjects = new ObjectController(); 
        	return view('barbershop.bs_index',['user_role'=>$user->role,'bsobjects'=>$bsobjects->getObjects()]);
    	}
    	abort(404);
    }
}
