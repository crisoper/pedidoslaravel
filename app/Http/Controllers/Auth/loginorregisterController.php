<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\ProcesssendmailJob;
use App\Jobs\SendcorreonuevousuarioJob;
use App\Models\Admin\Empresarubro;
use App\Models\Publico\Persona;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Spatie\Permission\Models\Role as Rol;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class loginorregisterController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function loginOrRegister($flag)
    {
        return view('auth.loginoregister', compact('flag'));
    }

    public function registernewempresa()
    {
        $empresarubros = Empresarubro::get();

        return view('publico.empresa.create', compact('empresarubros'));
    }

    protected function validator(array $data)
    {
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

    public function createComprador(Request $request)
    {

        $this->validator($request->all())->validate();
        Persona::firstOrCreate(
            [
                'dni' => $request->dni,
                'correo' => $request->email,
            ],
            [
                'nombre' => $request->nombres,
                'paterno' => $request->paterno,
                'materno' => $request->materno,
                'direccion' => $request->direccion,
                'telefono' => $request->telefono,
            ]
        );
                
            $user = User::create([
                'dni' => $request->dni,
                'name' => $request->nombres . ' ' . $request->paterno . ' ' . $request->materno,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'remember_token' => Hash::make(time()),

            ]);
      
        //Asignamos el rol postulante por defecto
        $roles = Rol::where("name", "like", "%Comprador")->get();
        foreach ($roles as $rol) {
            $user->assignRole($rol);
        }
        //Enviamos correo, mediane un job        
        SendcorreonuevousuarioJob::dispatchNow($user);
        Session::PUT('userid', $user->id);
       
        return response()->json('success', 200);
    }
    
    public function confirmarcuentaRegistrada()
    {
        return view('publico.empresa.confirmarcuenta');
    }

    public function cambiaremailusuarios( Request $request, $user_id)
    {
        // CambiaremailCreateRequest
        $user = User::findOrFail($user_id);
        $user->email =  $request->email;
        $user->save();

      
        SendcorreonuevousuarioJob::dispatchNow($user);
      
        return redirect()->back()->with('info', 'Verifica tu correo para validar tu cuenta');
       
    }
}
