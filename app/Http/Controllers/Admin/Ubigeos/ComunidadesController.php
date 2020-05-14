<?php

namespace App\Http\Controllers\Admin\Ubigeos;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ComunidadResource;
use App\Models\Admin\Ubigeos\Departamento;
use App\Models\Admin\Ubigeos\Distrito;
use App\Models\Admin\Ubigeos\Provincia;
use App\Models\Admin\Ubigeos\Comunidad;
use App\Models\Admin\Ubigeos\Sector;
use Illuminate\Http\Request;

class ComunidadesController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function index () 
    {
        $comunidades = Comunidad::get();
        return ComunidadResource::collection( $comunidades );
        
    }
    
    public function getcomunidad(Request $request)
    {
        if( $request->has("search") ) {
            $comunidades = Comunidad::where("nombre", 'like', '%'.$request->input("search").'%' )->get();
            $data = [];
            foreach ($comunidades as $comunidad) {
                $data[] = [ 
                    'id' => $comunidad->id, 
                    'text' => $comunidad->nombre
                ];
            }
            return \Response::json($data);
        }
        else {
            return \Response::json([]);
        }
    }


}
