<?php

namespace App\Http\Controllers\Barbershop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ErrorController extends Controller
{
    public function unroleUser(){
    	$user = Auth::user();
    	  if (view()->exists('barbershop.bs_error')){
          return view('barbershop.bs_error',['user_role'=>$user->role,'error'=>'unrole_user']);
        }
        abort(404);
    }
}
