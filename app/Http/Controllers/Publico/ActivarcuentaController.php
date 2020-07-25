<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ActivarcuentaController extends Controller
{
    public function activarcuentatoken(Request $request)
    {
       
        if ($request->has("tokenactivation")) {
            $usuario = User::where("remember_token", $request->tokenactivation)->first();
          if ($usuario) {
            if ( $usuario->email_verified_at == "" || $usuario->email_verified_at == null ) {
                $usuario->email_verified_at = now();
                $usuario->save();
                $this->guard()->login($usuario);
                if ($usuario->hasRole('web_Comprador')) {
                    return view('publico.mail.cuentaactivadaComprador');
                } else {
                    return view('publico.empresa.cuentaactivada');
                }
            }else{
                return view('errors.422');
            }
          } else {
            return view('errors.422');
          }
          
        }
        else {
            return view('errors.422');
        }
        
    }
    
    protected function guard()
    {
        return Auth::guard();
    }
}
