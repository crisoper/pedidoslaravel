<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Empresas\EmpresaCreateRequest;
use App\Mail\Publico\ActivarcuentaempresaMail;
use App\Models\Admin\Empresa;
use App\Models\Admin\Periodo;
use App\Models\Admin\Userempresa;
use App\Models\Admin\Userperiodo;
use App\Models\Publico\Persona;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role as Rol;

class NuevaempresaController extends Controller
{
    public function nuevaEmpresa(EmpresaCreateRequest $request)
    {

        DB::transaction(function ( ) use( $request )  {
            

            $user = User::firstOrNew([
                'name' => $request->name_representante . " " . $request->paterno . " " . $request->materno,
                'email' => $request->email,
                'dni' => $request->dni_representante,
                'password' => Hash::make($request->password),
            ]);
            $user->remember_token = Hash::make(time());
            $user->save();

            $persona = Persona::firstOrNew(
                [
                    'nombre' => $request->name_representante,
                    'paterno' => $request->paterno,
                    'materno' => $request->materno,
                    'dni' => $request->dni_representante,
                    'telefono' => $request->telefono,
                    'correo' => $request->email,

                ],
                [
                    'created_by' => $user->id,
                ]
            );
            $persona->save();

            $empresa =  Empresa::firstOrNew(
                [
                    "rubro_id" => $request->rubro_id,
                    "ruc" => $request->ruc,
                    "nombre" => $request->nombreempresa,
                    "direccion" => $request->direccion,
                    // "provincia_id" => $request->provinciaid,
                    // "departamento_id" => $request->departamentoid,
                    // "distrito_id" => $request->distritoid,
                    "telefono" => $request->telefono,
                ],
                [
                    'created_by' => $user->id,
                ]
            );
            $empresa->save();

            Userempresa::create([
                'user_id' => $user->id,
                'empresa_id' => $empresa->id,
                'estado' => 1,
            ]);

            $periodo = new Periodo();
            $periodo->empresa_id = $empresa->id;
            $periodo->nombre = 'demo';
            $fechaActual = date('Y-m-d');
            $fechaFin = strtotime('+24 month', strtotime($fechaActual));
            $fechaFin = date('Y-m-d', $fechaFin);
            $periodo->inicio = date('Y-m-d');
            $periodo->fin = $fechaFin;
            $periodo->estado = 1;
            $periodo->created_by = $user->id;
            $periodo->save();

            $userperiodo = new Userperiodo();
            $userperiodo->user_id =  $user->id;
            $userperiodo->periodo_id = $periodo->id;
            $userperiodo->created_at = $user->id;
            $userperiodo->save();


            //Asiganos roles a usuario

            $roles = Rol::where("name", "like", "%_Administrador empresa")->get();
            foreach ($roles as $rol) {
                $user->assignRole($rol);
            }

            $this->guard()->login($user);

            //Enviamos correo para activar cuenta
            $this->enviarCorreoActivarCuentaEmpresa($user);
            Session::put('empresadescripcion',  $empresa->nombre);
        });

        return response()->json("success", 200);
    }
    private function enviarCorreoActivarCuentaEmpresa($user)
    {

        try {
            Mail::to($user->email)
                ->cc("pedidosapp.pe@gmail.com")
                ->send(new  ActivarcuentaempresaMail($user));
        } catch (\Exception $e) {
           
            return null;
        }
    }

    public function activarcuentatoken(Request $request)
    {

        if ($request->has("tokenactivation")) {

            $usuario = User::where("remember_token", $request->tokenactivation)->first();

            if ($usuario) {
                $usuario->email_verified_at = now();
                $usuario->save();



                return view('publico.empresa.cuentaactivada');
            }
        }

        return "El token enviado no es valido";
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
