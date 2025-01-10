<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class notLoginUser extends Controller
{
    //
    public function onlyForNotLogin(){
        if(auth()->user()){
            return redirect()->route('dashboard');
        }else{
            return view('login');
        }
    }
}
