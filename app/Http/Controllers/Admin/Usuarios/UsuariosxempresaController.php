<?php

namespace App\Http\Controllers\Admin\Usuarios;

use App\Http\Controllers\Controller;
use App\Models\Encuestas\Administracion\Empresas;
use App\User;
use Illuminate\Http\Request;
use Session;

class UsuariosxempresaController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    private function empresaId() {
        return Session::get( 'empresaactual', 0 );
    }


    public function index()
    {
        if (!empty(request()->buscar)) 
        {

            $usuarioempresas = User::where('name', 'like', '%'.request()->buscar.'%')
            ->orWhere('email', 'like', '%'.request()->buscar.'%' )
            ->with([
                'empresas',
                'roles'
            ])
            ->paginate(10);

            return view('admin.usuarios.usuariosxempresa.index', compact('usuarioempresas') );
        }
        else
        {
            $usuarioempresas = User::with([
                'empresas',
                'roles'
            ])
            ->paginate(10);
            
            return view('admin.usuarios.usuariosxempresa.index', compact('usuarioempresas') );

        }
    }


    public function store( Request $request )
    {
        $empresa = Empresas::find( $this->empresaId() );
        if( $empresa ) {
            $empresa->usuarios()->attach($request->usuario, ['estado' => 1]);
            
            return redirect()->route('usuariosxempresa.index')->with('info', 'Datos guardados correctamente');
        }
        else {
            return redirect()->route('usuariosxempresa.index')->with('error', 'No se han encontrado datos de la empresa');
        }
        
        
    }


    public function destroy ( $idusuario ) {

        $empresa = Empresas::find( $this->empresaId() );
        
        if( $empresa ) {
            $empresa->usuarios()->detach( $idusuario );
            return redirect()->route('usuariosxempresa.index')->with('info', 'Datos guardados correctamente');
        }
        else {
            return redirect()->route('usuariosxempresa.index')->with('error', 'No existe una empresa seleccionada');
        }

    }


}
