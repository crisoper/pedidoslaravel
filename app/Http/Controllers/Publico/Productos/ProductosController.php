<?php

namespace App\Http\Controllers\Publico\Productos;

use App\Http\Controllers\Controller;
use App\Http\Resources\Publico\ProductomodalResource;
use App\Http\Resources\Publico\ProductoResource;
use App\Models\Admin\Empresa;
use App\Models\Admin\Pedidos\Pedidodetalle;
use App\Models\Admin\Producto;
use App\Models\Publico\Horario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    public function index( Request $request )
    {
        return view('publico.inicio.index');
    }

    


    
    //PRODUCTOS X AJAX

    public function recomendados(Request $request)
    {
        $productosrecomendados = Producto::with([
            "empresa",
            "tags",
            "categoria",
            "fotos",
            "oferta",
            "recomendar",
        ])
        ->whereHas("recomendar", function($query){
            $query->whereDate('diainicio', "<=", now())->whereDate("diafin", ">=", now());
        })
        ->limit(10)
        ->get();

        
        



        //Productos en oferta
        $productosoferta = Producto::whereNotIn("id", $productosrecomendados->pluck("id") )
        ->with([
            "empresa",
            "tags",
            "categoria",
            "fotos",
            "oferta",
        ])
        ->whereHas("oferta", function($query){
            $query->whereDate('diainicio', "<=", now())->whereDate("diafin", ">=", now());
        })
        ->limit(10)
        ->get();





        
        //Productos mas pedidos
        $hoynuevos =  Carbon::now();
        $fechainicionuevos = Carbon::now()->subDays( 7 );

        $productosnuevos = Producto::whereDate("created_at", ">=", $fechainicionuevos )      
        ->whereDate("created_at", "<=", $hoynuevos )
        ->whereNotIn("id", $productosrecomendados->pluck("id") )
        ->whereNotIn("id", $productosoferta->pluck("id") )
        ->with([
            "empresa",
            "tags",
            "categoria",
            "fotos",
            "oferta",
        ])
        ->limit(10)
        ->get();

        

        //Productos mas pedidos
        $hoymaspedidos =  Carbon::now();
        $fechainiciomaspedidos = Carbon::now()->subDays( 30 );

        $productomaspedidosIds = Pedidodetalle::join("productos", 'pedidodetalles.producto_id', '=', 'productos.id')
        ->select("productos.id",  DB::raw('COUNT( pedidodetalles.id ) AS cantidad') )
        ->groupBy("productos.id" )
        ->orderBy("cantidad", "desc")
        ->whereDate("pedidodetalles.created_at", ">=", $fechainiciomaspedidos )
        ->whereDate("pedidodetalles.created_at", "<=", $hoymaspedidos )
        ->limit(10)
        ->pluck("id");


        $productosmaspedidos = Producto::where( "stock", ">", 0 )
        ->whereIn("id", $productomaspedidosIds )
        ->with([
            "empresa",
            "tags",
            "categoria",
            "fotos",
            "oferta",
        ])
        ->limit(10)
        ->get();

        
        

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


    public function getdatosxid ( Request $request ) {
        // $productoCestaIds = array();
        // $productoDeseoIds = array();

        // if ( $request->has("storagecliente_id") ) {
        //     $productoCestaIds = Cesta::where("storagecliente_id", $request->storagecliente_id )
        //     ->where("tipo", "cesta")
        //     ->get()
        //     ->pluck("producto_id");


        //     $productoDeseoIds = Cesta::where("storagecliente_id", $request->storagecliente_id )
        //     ->where("tipo", "deseos")
        //     ->get()
        //     ->pluck("producto_id");
        // }
       
      
     
        $productoEnModal = Producto::where("id", $request->has("idproducto") ? $request->idproducto : 0 )
        ->with([
            "empresa" => function($query){
                $query->with([
                    "horarios"=> function($qhorario){
                        $w_today = date('w', strtotime( Carbon::now() ));
                        $diassemana = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado','Domingo'];
                        for ( $i = 1; $i < count($diassemana) ; $i++) { 
                            if ( $w_today == $i) {
                                $dia = $diassemana[$i - 1];
                            }
                        }
                        $qhorario->where( 'dia', $dia );
                    }
                ]);
            },
            "categoria",
            "tags",
            "fotos",           
        ])
        ->first();
        

        // foreach ( $productoEnModal as $producto ) {

        //     if ( in_array( $producto->id , $productoCestaIds->toArray() ) ) {
        //         $producto->encarrito = true;
        //     }
        //     else {
        //         $producto->encarrito = false;
        //     }
            
        //     if ( in_array( $producto->id , $productoDeseoIds->toArray() ) ) {
        //         $producto->enlistadeseos = true;
        //     }
        //     else {
        //         $producto->enlistadeseos = false;
        //     }
        // }
        

        if ( $productoEnModal != null ) {
            return new ProductomodalResource (  $productoEnModal );
        }

        return "No se encontro el producto";



    }


}
