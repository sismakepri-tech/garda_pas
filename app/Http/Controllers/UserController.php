<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard(){
        if(Auth::check()){
            if(Auth::user()->role==="upt"){
                return view('upt.dashboard');
            }else if(Auth::user()->role==="kanwil"){
                return view('kanwil.dashboard');
            }else if(Auth::user()->role==="uke"){
                return view('uke.dashboard');
            }
        }
    }

    
}
