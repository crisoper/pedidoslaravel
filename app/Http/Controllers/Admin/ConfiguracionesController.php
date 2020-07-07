<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ConfiguracionesController extends Controller
{
     
    public function __construct()
    {
        $this->middleware('auth');
    }


    private function empresaId() {
        return Session::get( 'empresaactual', 0 );
    }
    
    public function index(){
        return view('admin.configuracion.index');
    }

    public function comprobantes(){
        $empresa = Empresa::findOrFail($this->empresaId());
        return view('admin.configuracion.empresa.comprobantes.index', compact('empresa'));
        
    }
}
