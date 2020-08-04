<?php

namespace App\Http\Controllers\Publico\Productos;

use App\Http\Controllers\Controller;
use App\Http\Resources\Publico\ProductoResource;
use App\Models\Admin\Producto;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductosrecomendadosController extends Controller
{
    public function index()
    {
        return view('publico.recomendados.index');
    }

    
    public function recomendados(Request $request)
    {
        $hoy =  Carbon::now();
        $fechainicio = Carbon::now()->subDays( 7 );


        $productosrecomendados = Producto::query();

        // if( $request->has('buscar')  and $request->buscar != "" ) {
        //     $productosrecomendados = $productosrecomendados->where('nombre', 'like', '%'.$request->buscar.'%');
        // }

        if( $request->has('filtro_nuevos')  and $request->filtro_nuevos == 1 ) {
            $productosrecomendados = $productosrecomendados->whereDate("created_at", ">=", $fechainicio )
                ->whereDate("created_at", "<=", $hoy );
        }
        
        if( $request->has('filtro_ofertas')  and $request->filtro_ofertas == 1 ) {
            $productosrecomendados = $productosrecomendados->whereHas("oferta", function($query){
                    $query->whereDate('diainicio', "<=", now())->whereDate("diafin", ">=", now());
                });
        }

        
        if ( $request->has('filtro_orden')  and $request->filtro_orden == "ofertas" ) {
            $productosrecomendados = $productosrecomendados->orderBy("id", "asc");
        }
        elseif( $request->has('filtro_orden')  and $request->filtro_orden == "mayor" ) {
            $productosrecomendados = $productosrecomendados->orderBy("precio", "desc");
        }
        elseif( $request->has('filtro_orden')  and $request->filtro_orden == "menor" ) {
            $productosrecomendados = $productosrecomendados->orderBy("precio", "asc");
        }

        $productosrecomendados = $productosrecomendados->with([
            "empresa",
            "tags",
            "categoria",
            "fotos",
        ])
        ->whereHas("recomendar", function($query){
            $query->whereDate('diainicio', "<=", now())->whereDate("diafin", ">=", now());
        })
        ->get();


        return ProductoResource::collection( $productosrecomendados );
        
    }
}
