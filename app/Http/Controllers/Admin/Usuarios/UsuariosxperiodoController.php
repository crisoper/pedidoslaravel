<?php

namespace App\Http\Controllers\Admin\Usuarios;

use App\Http\Controllers\Controller;
use App\Models\Admin\Periodo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UsuariosxperiodoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    private function periodoId() {
        return Session::get( 'periodoactual', 0 );
    }


    public function index()
    {
        if (!empty(request()->buscar)) 
        {

            $usuarioperiodos = User::where('name', 'like', '%'.request()->buscar.'%')
            ->orWhere('email', 'like', '%'.request()->buscar.'%' )
            ->with([
                'periodos',
                'roles'
            ])
            ->paginate(10);

            return view('admin.usuarios.usuariosxperiodo.index', compact('usuarioperiodos') );
        }
        else
        {
            $usuarioperiodos = User::with([
                'periodos',
                'roles'
            ])
            ->paginate(10);
            
            return view('admin.usuarios.usuariosxperiodo.index', compact('usuarioperiodos') );

        }
    }


    public function store( Request $request )
    {
        $periodo = Periodo::find( $this->periodoId() );
        
        if( $periodo ) {
            $periodo->usuarios()->attach($request->usuario);
            return redirect()->route('usuariosxperiodo.index')->with('info', 'Datos guardados correctamente');
        }
        else {
            return redirect()->route('usuariosxperiodo.index')->with('error', 'No existe un periodo actual');
        }
        
        
    }


    public function destroy ( $idusuario ) {

        $periodo = Periodo::find( $this->periodoId() );
        
        if( $periodo ) {
            $periodo->usuarios()->detach( $idusuario );
            return redirect()->route('usuariosxperiodo.index')->with('info', 'Datos guardados correctamente');
        }
        else {
            return redirect()->route('usuariosxperiodo.index')->with('error', 'No existe un periodo actual');
        }

    }


}
