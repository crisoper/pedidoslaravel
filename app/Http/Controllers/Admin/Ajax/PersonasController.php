<?php

namespace App\Http\Controllers\Admin\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\PersonaResource;
use App\Models\Encuestas\Encuestados\Persona;
use App\Models\Admin\Ubigeos\Departamento;
use App\Models\Admin\Ubigeos\Distrito;
use App\Models\Admin\Ubigeos\Provincia;
use App\Models\Admin\Ubigeos\Comunidad;
use App\Models\Admin\Ubigeos\Sector;
use Illuminate\Http\Request;

class PersonasController extends Controller
{
    
    public function getpersonaxdni ( Request $request ) {
        
        $persona = Persona::where("doc_identidad", $request->dni)->first();
        $departamento = Departamento::findOrFail($persona->departamento_id)->first();
        $distrito = Distrito::findOrFail($persona->distrito_id)->first();

        if( $persona ) {
            return new PersonaResource( $persona );
        }
        else {
            return response()->json( ['error' => 'Registro no encontrado'], 404);
        }


    }
    
    




}
