<?php

namespace App\Http\Controllers\Admin\Ubigeos;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\DepartamentoResource;
use App\Models\Admin\Ubigeos\Departamento;
use App\Models\Admin\Ubigeos\Distrito;
use App\Models\Admin\Ubigeos\Provincia;
use App\Models\Admin\Ubigeos\Comunidad;
use App\Models\Admin\Ubigeos\Sector;
use Illuminate\Http\Request;

class DepartamentosController extends Controller
{

    public function index () 
    {
        $departamentos = Departamento::get();
        return DepartamentoResource::collection( $departamentos );
    }
   


    public function getBuscarDepartamento(Request $request)
    {
        if( $request->has("search") ) {
            $departamentos = Departamento::where("nombre", 'like', '%'.$request->input("search").'%' )->get();
            $data = [];
            foreach ($departamentos as $departamento) {
                $data[] = [ 
                    'id' => $departamento->id, 
                    'text' => $departamento->nombre
                ];
            }
            return \Response::json($data);
        }
        else {
            return \Response::json([]);
        }
    }
}
