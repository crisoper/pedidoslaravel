<?php
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Exports routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth']], function () {
    Route::post('/export/usuarios', 'Admin\Excel\UsuariosExportController@index')
    ->name('export.usuarios.index');
    
});

