<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'Publico\InicioController@index')->name('inicio.index');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(
[
    'prefix' => 'admin',
    'middleware' => [
        'auth'
    ],
], 
function () {
    Route::resource("productos", 'Admin\ProductosController');
    // Route::get("productos.index", 'Admin\ProductosController@index')->name("productos.index");
    // Route::get("productos.create", 'Admin\ProductosController@create')->name("productos.create");
    // Route::post("productos.store", 'Admin\ProductosController@store')->name("productos.store");
    
    // CATEGORIAS
    Route::resource('categorias', 'Admin\ProductocategoriasController');
    // Route::get("categorias.index", 'Admin\ProductocategoriasController@index')->name("categorias.index");
    // Route::get("categorias.create", 'Admin\ProductocategoriasController@create')->name("categorias.create");
    // Route::post("categorias.store", 'Admin\ProductocategoriasController@store')->name("categorias.store");
    // Route::get("categorias.edit", 'Admin\ProductocategoriasController@edit')->name("categorias.edit");
    // Route::post("categorias.update", 'Admin\ProductocategoriasController@update')->name("categorias.update");
    // Route::delete("categorias.destroy/{categoriaid}", 'Admin\ProductocategoriasController@destroy')->name("categorias.destroy");
    
});
