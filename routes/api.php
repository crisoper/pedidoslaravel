<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get("ajax/productos/inicio", "Publico\ProductoController@index")
// ->name("ajax.productos.inicio");

//LOCALSTORAGE
Route::get("clientes/obtenernavegadorid", "Publico\LocalstorageController@index")
->name("localstorage.index");

//MENU
Route::get("ajax/categorias/inicio", "Publico\ProductocategoriaController@index")
->name("ajax.categorias.inicio");



//PRODUCTOS INICIO
Route::get("ajax/productos/recomendados", "Publico\Productos\ProductosController@recomendados")
->name("ajax.productos.recomendados");
Route::get("ajax/productos/ofertas", "Publico\Productos\ProductosController@ofertas")
->name("ajax.productos.ofertas");
Route::get("ajax/productos/nuevos", "Publico\Productos\ProductosController@nuevos")
->name("ajax.productos.nuevos");
Route::get("ajax/productos/maspedidos", "Publico\Productos\ProductosController@maspedidos")
->name("ajax.productos.maspedidos");

Route::get("ajax/productos/getdatosxid", "Publico\Productos\ProductosController@getdatosxid")
->name("ajax.productos.getdatosxid");




// PRODUCTOS RECOMENDADOS
Route::get("ajax/recomendados/index", "Publico\Productos\ProductosrecomendadosController@recomendados")
->name("ajax.recomendados.index");
// PRODUCTOS OFERTADOS
Route::get("ajax/ofertas/index", "Publico\Productos\ProductosofertasController@ofertas")
->name("ajax.ofertas.index");
// PRODUCTOS NUEVOS
Route::get("ajax/nuevos/index", "Publico\Productos\ProductosnuevosController@nuevos")
->name("ajax.nuevos.index");
// PRODUCTOS MAS PEDIDOS
Route::get("ajax/maspedidos/index", "Publico\Productos\ProductosmaspedidosController@maspedidos")
->name("ajax.maspedidos.index");





// PRODUCTOS RESULTADOS POR BUSQUEDA
Route::get("ajax/productos/busqueda/index", "Publico\Productos\ResultadosproductosController@productosbusqueda")
->name("ajax.productos.busqueda.index");
// LOCALES RESULTADOS POR BUSQUEDA
Route::get("ajax/locales/busqueda/index", "Publico\ResultadoslocalesController@localesbusqueda")
->name("ajax.locales.busqueda.index");


// LOCALES
Route::get("ajax/locales/productos", "Publico\LocalesController@productos")
->name("ajax.locales.productos");












Route::get("getpersonaxdni", "Admin\Ajax\PersonasController@getpersonaxdni")
->name("ajax.getpersonaxdni");

//departamentos
Route::get("getdepartamento", "Admin\Ubigeos\DepartamentosController@getBuscarDepartamento")
->name("ajax.getBuscarDepartamento");


Route::get("getprovincias/pordepartamento", "Admin\Ubigeos\ProvinciasController@getprovinciaByDepartamentoId")
->name("ajax.getprovinciaByDepartamentoId");

//Distritos
Route::get("getdistritos/porprovincia", "Admin\Ubigeos\DistritosController@getdistritosByProvinciaId")
->name("ajax.getdistritosByProvinciaId");

