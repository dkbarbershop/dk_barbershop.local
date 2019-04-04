<?php

namespace App\Http\Controllers\Barbershop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdministratorController extends Controller
{
   public function main(){
    $user = Auth::user();
        if (view()->exists('barbershop.administrator.main')){
            return view('barbershop.administrator.main',['user_role'=>$user->role]);
        }
        abort(404);
    }
    public function hairdresses(){
        $user = Auth::user();
        if (view()->exists('barbershop.administrator.hairdressers')){
            return view('barbershop.administrator.hairdressers',['user_role'=>$user->role]);
        }
        abort(404); 
    }
}
