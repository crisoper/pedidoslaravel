<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Empresas\EmpresaCreateRequest;
use App\Models\Admin\Modelhasrole;
use App\Models\Publico\Persona;
use App\Providers\RouteServiceProvider;
use Spatie\Permission\Models\Role as Rol;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Jobs\SendcorreonuevousuarioJob;
use App\Mail\Publico\ActivarcuentaempresaMail;
use App\Models\Admin\Empresa;
use App\Models\Admin\Periodo;
use App\Models\Admin\Userempresa;
use App\Models\Admin\Userperiodo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
  
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // return Validator::make($data, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);

        return Validator::make($data, [
            'dni' => ['required', 'numeric', 'digits:8', 'unique:users'],
            'paterno' => ['required', 'string', 'max:255'],
            'materno' => ['required', 'string', 'max:255'],
            'nombres' => ['required', 'string', 'max:255'],
            'direccion' => ['required', 'string', 'max:255'],
            'telefono' =>  ['required', 'numeric', 'digits:9'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
     
        // return $usuario = User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);

   
        Persona::firstOrCreate(
            [
                'dni' => $data['dni'],
            ],
            [
                'nombre' => $data['nombres'],
                'paterno' => $data['paterno'],
                'materno'=> $data['materno'],
                'direccion'=> $data['direccion'],
                'telefono'=> $data['telefono'],
                'correo'=> $data['email'],
            ]
        );
        
        $user = User::create([
                'dni' => $data['dni'],
                'name' => $data['nombres'].' '. $data['paterno'].' '.$data['materno'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'remember_token' => Hash::make( time() ),
                'cuenta_activada' => '0',
        ]);

        //Asignamos el rol postulante por defecto
        $roles = Rol::where("name", "like", "%Comprador")->get();
        foreach( $roles as $rol ) {
            $user->assignRole( $rol );
        }

        //Enviamos correo, mediane un job
        SendcorreonuevousuarioJob::dispatchNow( $user );

        return $user;
        
     
    }

    public function activarcuentatoken( Request $request ) {

        if ( $request->has("tokenactivation") ) {
            
            $usuario = User::where("remember_token", $request->tokenactivation ) ->first();

            if( $usuario ) {
                $usuario->email_verified_at = now();
                $usuario->save();
                
               

                return view('publico.empresa.cuentaactivada');
            }

        }

        return "El token enviado no es valido";

    }
    public function nuevaEmpresa(EmpresaCreateRequest $request)
    {
                      
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

        $empresa =  Empresa::firstOrNew([
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
            'created_by'=> $user->id,
        ]);
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
        foreach( $roles as $rol ) {
            $user->assignRole( $rol );
        }

        $this->guard()->login($user);
        //Enviamos correo para activar cuenta
        $this->enviarCorreoActivarCuentaEmpresa($user);
        Session::put('empresadescripcion',  $empresa->nombre);

        return response()->json($user,200);

            // return redirect()->route('empresas.index')->with("info", "Registro creado");
    }
    private function enviarCorreoActivarCuentaEmpresa($user)
    {

        try {
            Mail::to($user->email)
                ->cc("gilbertofores@gmail.com")
                ->send(new  ActivarcuentaempresaMail($user));
        } catch (\Exception $e) {
            return null;
        }
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
