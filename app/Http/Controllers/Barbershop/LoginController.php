<?php

namespace App\Http\Controllers\Barbershop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        dd($user);
        $result = $request->session()->all();
        //dump($result);
        return view('home');
    }
 
}
