<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin\Empresarubro;
use Illuminate\Http\Request;

class loginorregisterController extends Controller
{
    public function loginOrRegister($flag){
      
        return view('auth.loginoregister', compact('flag'));
        
    }

    public function registernewempresa(){
        $empresarubros = Empresarubro::get();
        
        return view('publico.empresa.create', compact('empresarubros'));
    }
}
