<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Http\Resources\Publico\DepartamentoResource;
use App\Models\Publico\Departamento;
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
