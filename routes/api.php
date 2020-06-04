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

//CESTA MENU
Route::get("cesta/index", "Publico\CestaController@index")
->name("cesta.index");
Route::post("cesta/store", "Publico\CestaController@store")
->name("cesta.store");
Route::delete("cesta/delete", "Publico\CestaController@delete")
->name("cesta.delete");
//LISTA DESEOS MENU
Route::get("listadeseo/index", "Publico\ListadeseosMenuController@index")
->name("listadeseo.index");
Route::post("listadeseo/store", "Publico\ListadeseosMenuController@store")
->name("listadeseo.store");
Route::delete("listadeseo/delete", "Publico\ListadeseosMenuController@delete")
->name("listadeseo.delete");


//PRODUCTOS RECOMENDADOS
Route::get("ajax/productos/recomendados", "Publico\ProductosController@recomendados")
->name("ajax.productos.recomendados");

//PRODUCTOS OFERTAS
Route::get("ajax/productos/ofertas", "Publico\ProductosController@ofertas")
->name("ajax.productos.ofertas");

//PRODUCTOS NUEVOS
Route::get("ajax/productos/nuevos", "Publico\ProductosController@nuevos")
->name("ajax.productos.nuevos");

//PRODUCTOS NUEVOS
Route::get("ajax/productos/maspedidos", "Publico\ProductosController@maspedidos")
->name("ajax.productos.maspedidos");






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

