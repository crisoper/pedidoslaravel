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


Route::get("ajax/productos/inicio", "Publico\ProductoController@index")
->name("ajax.productos.inicio");

//Obtenemos los ultimos 9 productos registrados
Route::get("ajax/productos/nuevos", "Publico\ProductoController@nuevos")
->name("ajax.productos.nuevos");

Route::get("ajax/categorias/inicio", "Publico\ProductocategoriaController@index")
->name("ajax.categorias.inicio");






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

