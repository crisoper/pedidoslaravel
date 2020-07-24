<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Models\Admin\Empresarubro;
use App\Models\Publico\Persona;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class loginorregisterController extends Controller
{
    
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function loginOrRegister($flag){      
        return view('auth.loginoregister', compact('flag'));        
    }

    public function registernewempresa(){
        $empresarubros = Empresarubro::get();
        
        return view('publico.empresa.create', compact('empresarubros'));
    }

    
    


}
