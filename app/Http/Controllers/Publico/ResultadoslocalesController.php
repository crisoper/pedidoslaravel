<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Http\Resources\Publico\EmpresaResource;
use App\Models\Admin\Empresa;
use Illuminate\Http\Request;

class ResultadoslocalesController extends Controller
{
    public function index( Request $request )
    {
        return view('publico.resultadoslocales.index');
    }
    
    
    public function localesbusqueda( Request $request )
    {
        
        $localesresultados = Empresa::orderBy("id", "desc");

        if( $request->has('buscarproductos')  and $request->buscarproductos != "" ) {
            $localesresultados = $localesresultados->where('nombre', 'like', '%'.$request->buscarproductos.'%');
        }
        
        
        if ( $request->has('filtro_orden')  and $request->filtro_orden == "defecto" ) {
            $localesresultados = $localesresultados->orderBy("id", "desc");
        }
        elseif( $request->has('filtro_orden')  and $request->filtro_orden == "alfabetico" ) {
            $localesresultados = $localesresultados->orderBy("nombrecomercial", "asc");
        }
        
        

        if( $request->has('filtro_ofertas')  and $request->filtro_ofertas == 1 ) {
            // $localesresultados = $localesresultados->whereDate( "created_at", now() );
        }

        if( $request->has('filtro_nuevos')  and $request->filtro_nuevos == 1 ) {
            $localesresultados = $localesresultados->whereDate( "created_at", now() );
        }
        



        // $localesresultados = $localesresultados->with([
        //     "empresa",
        //     "tags",
        //     "categoria",
        //     "fotos",
        // ])
        // ->get();
        $localesresultados = $localesresultados->get();

        return EmpresaResource::collection( $localesresultados );
    }

}
