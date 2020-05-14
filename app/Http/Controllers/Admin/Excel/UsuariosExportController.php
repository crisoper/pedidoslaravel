<?php

namespace App\Http\Controllers\Admin\Exports\Usuarios;

use App\Http\Controllers\Controller;
use App\Exports\Admin\UsuariosExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UsuariosExportController extends Controller
{
    
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index( Request $request ) {
        
        if ( !empty( $request->input('buscar_exportar') ) )  {
            return Excel::download( ( new UsuariosExport )->withBuscar( $request->input('buscar_exportar', '') ), 'Usuarios_'.time().'.xlsx');
        }
        else {
            return Excel::download( ( new UsuariosExport )->withBuscar(''), 'Usuarios_'.time().'.xlsx');
        }

    }


}
