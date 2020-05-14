<?php

namespace App\Http\Controllers\Admin\Ubigeos;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\SectorResource;
use App\Models\Admin\Ubigeos\Departamento;
use App\Models\Admin\Ubigeos\Distrito;
use App\Models\Admin\Ubigeos\Provincia;
use App\Models\Admin\Ubigeos\Comunidad;
use App\Models\Admin\Ubigeos\Sector;
use Illuminate\Http\Request;

class SectoresController extends Controller
{
    
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function getsectoresporcomunidad ( Request $request ) {

        $sectores = Sector::where("comunidad_id", $request->comunidad_id)->get();
        return SectorResource::collection( $sectores );

    } 

    public function getsector(Request $request)
    {
        if( $request->has("search") ) {
            $sectores = Sector::where("nombre", 'like', '%'.$request->input("search").'%' )->get();
            $data = [];
            foreach ($sectores as $sector) {
                $data[] = [ 
                    'id' => $sector->id, 
                    'text' => $sector->nombre
                ];
            }
            return \response::json($data);
        }
        else {
            return \Response::json([]);
        }
    }
}
