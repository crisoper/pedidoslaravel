<?php

namespace App\Http\Controllers\Admin\Usuarios;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests\Admin\Usuarios\UserChangePasswordRequest;
use App\Http\Requests\Admin\Usuarios\UsuarioCreateRequest;
use App\Http\Requests\Admin\Usuarios\UsuarioSubirfotoRequest;
use App\Http\Requests\Admin\Usuarios\UsuarioUpdateRequest;
use App\Mail\Enviarclaveausuario;
use App\Models\Admin\Userempresa;
use App\Models\Publico\Persona;
use Spatie\Permission\Models\Role as Rol;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class UsuariosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function empresaId(){
        return Session::get('empresaactual',0);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //Es un usuario administrador, mostramos todos los registros
        if (!empty(request()->buscar)) 
        {
            $usuarios = User::where('name', '=', request()->buscar )
                        ->orWhere('email', 'like', '%'.request()->buscar.'%' )
                        ->paginate(10);
            return view('admin.usuarios.usuarios.index', compact('usuarios'));
        }
        else
        {
            $usuarios = User::paginate(10);
            return view('admin.usuarios.usuarios.index', compact('usuarios'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.usuarios.usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // UsuarioCreateRequest
        $persona = Persona::firstOrNew([
            'nombre' => $request->name,
            'paterno' => $request->paterno,
            'materno' => $request->materno,
            'dni' => $request->dni,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'correo' => $request->email,            
        ],
        [
            'created_by' => auth()->user()->id,
        ]);
            $persona->save();

        // $usuario = User::findOrfail( $userid );        
        // $usuario = User::create($request->all());
        $usuario = User::firstOrNew(
            [
                'persona_id' => $persona->id,
                'name' => $request->name .' '. $request->paterno .' '.$request->materno,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ],
            [
                'created_by'=> auth()->user()->id,
            ]
        );
        $usuario->save();

        Userempresa::create([
            'user_id' => $usuario->id,
            'empresa_id' => $this->empresaId(),
            'estado' => '1',
        ]);

        return redirect()->route('usuarios.index')->with('info', 'Registro creado');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::findOrFail( $id );
        return view( 'admin.usuarios.usuarios.edit', compact('usuario') );
    }


    private function enviarCorreoCambioClave( $usuario, $clave ) {
        Mail::to( $usuario->email )->send( new Enviarclaveausuario( $usuario, $clave ) );
    }    


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioUpdateRequest $request, $id)
    {
        $usuario = User::findOrFail( $id );
        $usuario->name = $request->input('name');

        if ( !empty($request->input("password"))) {
            $usuario->password = Hash::make( $request->input('password') );

            $this->enviarCorreoCambioClave( $usuario, $request->input('password') );
        }

        $usuario->save();

        return redirect()->route('usuarios.index')->with('info', 'Registro actualizado');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail( $id );
        $usuario->delete();
        
       return redirect()->route('usuarios.index');
    }



    public function getroles($id) 
    {
        $usuario = User::findOrFail( $id );
        $roles = Rol::where('guard_name', 'web')->get();
        $rolesmenus = Rol::where('guard_name', 'menu')->get();
        
        return view('admin.usuarios.usuarios.roles', compact('usuario', 'roles', 'rolesmenus') );
    }


    public function storeroles (Request $request, $id)
    {

        $usuario = User::findOrFail( $id );

        //Cambiar para considerar los guard_name
        $roles_web = Rol::where('guard_name', 'web')->get();
        foreach( $roles_web as $rol_web ) {
            $usuario->removeRole(  $rol_web->name );
        }
        $usuario->assignRole( $request->roles );

        $roles_menu = Rol::where('guard_name', 'menu')->get();
        foreach( $roles_menu as $rol_menu ) {
            $rol_to_remove = Rol::findById($rol_menu->id, 'menu');
            $usuario->removeRole( $rol_to_remove );
        }

        if( $request->has('rolesmenus') ) {
            foreach( $request->rolesmenus as $rolMenu ) {
                $rol_to_add = Rol::findByName($rolMenu, 'menu');
                $usuario->assignRole( $rol_to_add );
            }
        }

        return redirect()->route('usuarios.index')->with('info', 'Roles asignados');
    }


    public function miperfil()
    {
        return view('admin.usuarios.usuarios.miperfil');
    }


    public function cambiarmiclave( UserChangePasswordRequest $request )
    {
        $usuario = User::where('name', '=', $request->input('name'))->where('email', '=', $request->input('email'))->first();

        if (!empty($usuario))
        {
            $usuario->password = Hash::make($request->input('password'));
            $usuario->save();
            return redirect()->back()->with('info', 'Clave actualizada correctamente');     
        }
        else
        {
            abort(404);
        } 
    }



    public function miperfilsubirfoto (UsuarioSubirfotoRequest $request) {

        if ( Auth::check() ) {
            $usuario = User::findOrFail( Auth::id() ); 
            $image = $request->file('foto');
            $input['imagename'] = $usuario->id.'.'.$image->extension();   
            $destinationPath = storage_path('app/public/usuarios');
            $img = Image::make($image->path());
            $img->fit(200, 200, function ($constraint) {
                $constraint->upsize();
            });
            $img->save($destinationPath.'/'.$input['imagename']);
            //Guardando foto perfil del usuario
            $usuario->avatar =  $input['imagename'];
            $usuario->save();

            return response()->json(['imagen' => base64_encode( \Storage::disk('usuarios')->get('usuarios/'.$input['imagename'] ) ) ], 200);     
        }

    }
  

}
