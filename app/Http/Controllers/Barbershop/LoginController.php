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
        switch ($user->role) {
        	case 'SuperRoot':
        		return redirect()->route('object_index');
        	break;
        	case 'Director':
        		return redirect()->route('director_results');
        	break;
        	case 'Administrator':
        		return redirect()->route('administrator_main');
        	break;
        	case 'HairDresser':
        		return redirect()->route('hairdresser_main');
        	break;
        	case 'User':
        		return redirect()->route('user_main');
        	break;
     
        	default:
        		return redirect()->route('error_unrole');
        	break;
        }

    }
}

/*
        		if (view()->exists('barbershop.superroot.objects')){
        			$bsobjects = new ObjectController(); 
        			return view('barbershop.superroot.objects',['user_role'=>$user->role,'bsobjects'=>$bsobjects->getObjects()]);
    			}
    			abort(404)*/
 	      /* dd($user->role);*/
/*        if (view()->exists('barbershop.bs_index')){
        	$bsobjects = new ObjectController(); 
        	return view('barbershop.bs_index',['user_role'=>$user->role,'bsobjects'=>$bsobjects->getObjects()]);
    	}
    	abort(404);*/