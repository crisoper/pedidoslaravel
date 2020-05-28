<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Http\Resources\Publico\ProvinciaResource;
use App\Models\Publico\Provincia;
use Illuminate\Http\Request;

class ProvinciasController extends Controller
{
    public function index () 
    {
        $provincias = Provincia::get();
        return ProvinciaResource::collection( $provincias );
    }
    
    
    
    
    
    public function getprovinciaByDepartamentoId ( Request $request ) 
    {

        $provincias = Provincia::where("departamento_id", $request->departamento_id)->get();
        return ProvinciaResource::collection( $provincias );

    
    }


    public function getprovincia(Request $request)
    {
        if( $request->has("search") ) {
            $provincias = Provincia::where("nombre", 'like', '%'.$request->input("search").'%' )->get();
            $data = [];
            foreach ($provincias as $provincia) {
                $data[] = [ 
                    'id' => $provincia->id, 
                    'text' => $provincia->nombre
                ];
            }
            return \Response::json($data);
        }
        else {
            return \Response::json([]);
        }
    }
}
