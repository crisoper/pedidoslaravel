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
    Route::resource("empresarubros", 'Admin\EmpresarubrosController');
    Route::resource("empresas", 'Admin\EmpresasController');
    Route::resource("productos", 'Admin\ProductosController');
    
});