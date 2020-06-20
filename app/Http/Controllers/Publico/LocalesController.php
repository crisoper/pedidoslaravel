<?php

namespace App\Http\Controllers\Publico;

use Illuminate\Http\Request;
use App\Models\Admin\Empresa;
use App\Models\Publico\Cesta;
use App\Models\Admin\Producto;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Publico\Pedidodetalle;
use App\Http\Resources\Publico\ProductoResource;

class LocalesController extends Controller
{
    
    public function index(Request $request, $idempresa )
    {
        $empresa = Empresa::where("id", $idempresa)
        ->with([
            "horarios"
        ])
        ->first();

        return view("publico.locales.index", compact("empresa"));
    }


    public function productos ( Request $request ) {
        

        $productoCestaIds = array();
        $productoDeseoIds = array();

        if ( $request->has("storagecliente_id") ) {
            $productoCestaIds = Cesta::where("storagecliente_id", $request->storagecliente_id )
            ->where("tipo", "cesta")
            ->where("empresa_id", $request->input("empresa_id", 0) )
            ->get()
            ->pluck("producto_id");


            $productoDeseoIds = Cesta::where("storagecliente_id", $request->storagecliente_id )
            ->where("tipo", "deseos")
            ->where("empresa_id", $request->input("empresa_id", 0) )
            ->get()
            ->pluck("producto_id");
        }
        
        
        $productosrecomendados = Producto::where("empresa_id", $request->input("empresa_id", 0) );

        if( $request->has('buscar')  and $request->buscar != "" ) {
            $productosrecomendados = $productosrecomendados->where('nombre', 'like', '%'.$request->buscar.'%');
        }

        if( $request->has('filtro_nuevos')  and $request->filtro_nuevos == 1 ) {
            $productosrecomendados = $productosrecomendados->whereDate( "created_at", now() );
        }
        
        if( $request->has('filtro_ofertas')  and $request->filtro_nuevos == 1 ) {
            // $productosrecomendados = $productosrecomendados->whereDate( "created_at", now() );
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
        ->get();

        foreach ( $productosrecomendados as $producto ) {

            if ( in_array( $producto->id , $productoCestaIds->toArray() ) ) {
                $producto->encarrito = true;
            }
            else {
                $producto->encarrito = false;
            }
            
            if ( in_array( $producto->id , $productoDeseoIds->toArray() ) ) {
                $producto->enlistadeseos = true;
            }
            else {
                $producto->enlistadeseos = false;
            }

        }


        //Productos en oferta
        $productosoferta = Producto::where("empresa_id", $request->input("empresa_id", 0) )
        ->where( "stock", ">", 20 )
        ->whereNotIn("id", $productosrecomendados->pluck("id") )
        ->with([
            "empresa",
            "tags",
            "categoria",
            "fotos",
        ])
        ->limit(10)
        ->get();

        foreach ( $productosoferta as $producto ) {

            if ( in_array( $producto->id , $productoCestaIds->toArray() ) ) {
                $producto->encarrito = true;
            }
            else {
                $producto->encarrito = false;
            }
            
            if ( in_array( $producto->id , $productoDeseoIds->toArray() ) ) {
                $producto->enlistadeseos = true;
            }
            else {
                $producto->enlistadeseos = false;
            }

        }



        //Productos nuevos
        $productosnuevos = Producto::where("empresa_id", $request->input("empresa_id", 0) )
        ->whereDate( "created_at", now() )
        ->whereNotIn("id", $productosrecomendados->pluck("id") )
        ->whereNotIn("id", $productosoferta->pluck("id") )
        ->with([
            "empresa",
            "tags",
            "categoria",
            "fotos",
        ])
        ->limit(10)
        ->get();

        foreach ( $productosnuevos as $producto ) {

            if ( in_array( $producto->id , $productoCestaIds->toArray() ) ) {
                $producto->encarrito = true;
            }
            else {
                $producto->encarrito = false;
            }
            
            if ( in_array( $producto->id , $productoDeseoIds->toArray() ) ) {
                $producto->enlistadeseos = true;
            }
            else {
                $producto->enlistadeseos = false;
            }
        }


        //Productos mas pedidos
        $hoy =  Carbon::now();
        $fechainicio = Carbon::now()->subDays( 30 );

        $productomaspedidosIds = Pedidodetalle::join("productos", 'pedidodetalles.producto_id', '=', 'productos.id')
        ->select("pedidodetalles.empresa_id", "productos.id",  DB::raw('COUNT( pedidodetalles.id ) AS cantidad') )
        ->groupBy("pedidodetalles.empresa_id", "productos.id" )
        ->orderBy("cantidad", "desc")
        ->whereDate("pedidodetalles.created_at", ">=", $fechainicio )
        ->whereDate("pedidodetalles.created_at", "<=", $hoy )
        ->limit(10)
        ->pluck("id");


        $productosmaspedidos = Producto::where( "stock", "<", 10 )
        ->whereIn("id", $productomaspedidosIds )
        ->with([
            "empresa",
            "tags",
            "categoria",
            "fotos",
        ])
        ->limit(10)
        ->get();

        foreach ( $productosmaspedidos as $producto ) {

            if ( in_array( $producto->id , $productoCestaIds->toArray() ) ) {
                $producto->encarrito = true;
            }
            else {
                $producto->encarrito = false;
            }
            
            if ( in_array( $producto->id , $productoDeseoIds->toArray() ) ) {
                $producto->enlistadeseos = true;
            }
            else {
                $producto->enlistadeseos = false;
            }
        }

        return response()
        ->json(
            [
                'recomendados' => ProductoResource::collection( $productosrecomendados ),
                'ofertas' => ProductoResource::collection( $productosoferta ),
                'nuevos' => ProductoResource::collection( $productosnuevos ),
                'maspedidos' => ProductoResource::collection( $productosmaspedidos )
            ], 
            200
        );


    }

}
