<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Http\Resources\Publico\DistritoResource;
use App\Models\Publico\Distrito;
use App\Models\Publico\Provincia;
use Illuminate\Http\Request;

class DistritosController extends Controller
{
    public function index () 
    {
        $distritos = Distrito::get();
        return DistritoResource::collection( $distritos );
    }
    public function getprovinciaDistrito (Request $request) 
    {
        $distritos = Distrito::findOrFail($request->distritoid );
        $provincia = Provincia::findOrFail($distritos->provincia_id);       
        
        return response()->json([$provincia ], 200);
       
        // return ProvinciaResource::collection( $provincia);
       
    }

    
    public function getdistritosByProvinciaId ( Request $request ) 
    {
        $distritos = Distrito::where("provincia_id", $request->provincia_id )->get();           
        return DistritoResource:: collection( $distritos );
    }

    public function getBuscarDistritos(Request $request)
    {
        if( $request->has("search") ) {
            $distritos = Distrito::where("nombre", 'like', '%'.$request->input("search").'%' )->get();
            $data = [];
            foreach ($distritos as $distrito) {
                $data[] = [ 
                    'id' => $distrito->id, 
                    'text' => $distrito->nombre
                ];
            }
            return \Response::json($data);
        }
        else {
            return \Response::json([]);
        }
    }
}
