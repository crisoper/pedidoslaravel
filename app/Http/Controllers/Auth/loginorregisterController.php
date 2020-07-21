<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Enviarclaveausuario;
use App\Models\Admin\Empresarubro;
use App\Models\Publico\Persona;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class loginorregisterController extends Controller
{
    public function loginOrRegister($flag){
      
        return view('auth.loginoregister', compact('flag'));
        
    }

    public function registernewempresa(){
        $empresarubros = Empresarubro::get();
        
        return view('publico.empresa.create', compact('empresarubros'));
    }

    public function editarcomprador(Request $request){
       
        return view('admin.usuarios.comprador.editar');
        
    }

    public function actualizarDatosComprador( Request $request ){
        $usuario = User::findOrFail(Auth()->user()->id);

        $persona = Persona::where('correo', $usuario->email);
        $persona->nombre = $request->nombre;
        $persona->paterno = $request->paterno;
        $persona->materno = $request->materno;
        $persona->dni = $request->dni;
        $persona->direccion = $request->direccion;
        $persona->telefono = $request->telefono;
        $persona->updated_by = auth()->user()->id;

        $usuario->name = $request->nombre . ' ' . $request->paterno . ' ' . $request->materno;

        $usuario->save();
        return redirect()->route('loginOrRegister.editar.comprador')->with('info', 'Registro actualizado');
    }
    private function enviarCorreoCambioClave($usuario, $clave)
    {
        Mail::to($usuario->email)->send(new Enviarclaveausuario($usuario, $clave));
    }
    public function cambiarcontraseñaComprador( Request $request  ){
       
        $usuario = User::findOrFail( Auth()->user()->id );        
        if (!empty($request->input("password"))) {
            $usuario->password = Hash::make($request->input('password'));
            $this->enviarCorreoCambioClave($usuario, $request->input('password'));
        }
        $usuario->save();
        return redirect()->route('loginOrRegister.editar.comprador')->with('info', 'Contraseña  actualizada');
    }

}
