<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class loginorregisterController extends Controller
{
    public function loginOrRegister($flag){
      
        return view('auth.loginoregister', compact('flag'));
        
    }
}
