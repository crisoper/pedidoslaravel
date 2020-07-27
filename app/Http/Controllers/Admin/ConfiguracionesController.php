<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Empresa;
use App\Models\Admin\Empresarubro;
use App\Models\Publico\Departamento;
use App\Models\Publico\Distrito;
use App\Models\Publico\Provincia;
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
        $empresa = Empresa::findOrFail($this->empresaId());
       
        $empresarubros = $empresa->rubro_id ? Empresarubro::findOrFail($empresa->rubro_id):"";
        $departamentos =  $empresa->departamento_id ? Departamento::findOrFail($empresa->departamento_id) : "";
        $provincias = $empresa->provincia_id ? Provincia::findOrFail($empresa->provincia_id): "";
        $distritos = $empresa->distrito_id ? Distrito::findOrFail($empresa->distrito_id): "";
        return view('admin.configuracion.index', compact('empresa', 'empresarubros', 'departamentos','provincias','distritos' ) );
    }

    public function comprobantes(){
        $empresa = Empresa::findOrFail($this->empresaId());       
        return view('admin.configuracion.empresa.comprobantes.index', compact('empresa'));
        
    }
    public function personalizarempresa(){
        $empresa = Empresa::findOrFail($this->empresaId());
        return view('publico.locales.index' , compact('empresa'));
        
       }
}
