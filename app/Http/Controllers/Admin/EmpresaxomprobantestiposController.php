<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Comprobantetipo;
use App\Models\Admin\Empresa;
use Illuminate\Http\Request;

class EmpresaxomprobantestiposController extends Controller
{
    
    //AGREGAR PERMISOS
    public function agregarcomprobantetipos($id)
    {
        $empresa = Empresa::findOrFail($id);

        $comprobantetipos = Comprobantetipo::get();
        $empresacomprobantetipos = Comprobantetipo::get();

        return view('admin.empresas.agregarcomprobantetipos', compact('empresa', 'comprobantetipos'));
    }

    //GUARDAR PERMISOS
    public function guardarcomprobantetipos(Request $request, $id)
    {
        $empresa = Empresa::findOrFail($id);

        $comprobantetipos = Comprobantetipo::get()->pluck('nombre')->toArray();

        // $empresa->delete($comprobantetipos);

        $empresa->empresa_id = $request->input('comprobantetipos');
        $empresa->save();

        return redirect()->route('empresas.index');
    }

}
