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

// | GET|HEAD  | login | login | App\Http\Controllers\Auth\LoginController@showLoginForm | web,guest |
// | POST      | login |.      | App\Http\Controllers\Auth\LoginController@login | web,guest |
// | POST      | logout | logout | App\Http\Controllers\Auth\LoginController@logout | web |
// | GET|HEAD  | password/confirm | password.confirm | App\Http\Controllers\Auth\ConfirmPasswordController@showConfirmForm | web,auth|
// | POST | password/confirm | App\Http\Controllers\Auth\ConfirmPasswordController@confirm web,auth |

// | POST | password/email| password.email | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail | web |
// | GET|HEAD | password/reset | password.request | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm | web|
// | POST | password/reset | password.update | App\Http\Controllers\Auth\ResetPasswordController@reset | web |
// | GET|HEAD | password/reset/{token} | password.reset | App\Http\Controllers\Auth\ResetPasswordController@showResetForm | web |
// | POST| register | | App\Http\Controllers\Auth\RegisterController@register| web,guest |
// | GET|HEAD | register | register | App\Http\Controllers\Auth\RegisterController@showRegistrationForm | web,guest|

Auth::routes();

Route::get("administracion/login", "Auth\LoginController@showLoginForm")
->name("admin.login");

Route::post("administracion/login", "Auth\LoginController@login")
->name("admin.login.post");

Route::post("administracion/logout", "Auth\LoginController@logout")
->name("admin.logout");

Route::get("administracion/password/confirm", "Auth\ConfirmPasswordController@showConfirmForm")
->name("admin.password.confirm");

Route::post("administracion/password/confirm", "Auth\ConfirmPasswordController@confirm")
->name("admin.password.confirm.post");

Route::post("administracion/password/email", "Auth\ForgotPasswordController@sendResetLinkEmail")
->name("admin.password.email");

Route::get("administracion/password/reset", "Auth\ForgotPasswordController@showLinkRequestForm")
->name("admin.password.request");

Route::post("administracion/password/reset", "Auth\ResetPasswordController@reset")
->name("admin.password.update");

Route::get("administracion/password/reset/{token}", "Auth\ResetPasswordController@showResetForm")
->name("admin.password.reset");

Route::post("administracion/register", "Auth\RegisterController@register")
->name("admin.register.post");

Route::post("administracion/register", "Auth\RegisterController@showRegistrationForm")
->name("admin.register");




Route::get('/', 'Publico\ProductosController@index')
->name('inicio.index');

// CESTA REALIZAR COMPRA
Route::get('cart', 'Publico\CartController@index')
->name('cart.index');

// LISTA DE DESEOS
Route::get('listadedeseos', 'Publico\ListadeseosController@index')
->name('listadedeseos.index');


// PRODUCTOS RECOMENDADOS
Route::get('recomendados', 'Publico\RecomendadosController@index')
->name('recomendados.index');
// PRODUCTOS OFERTADOS
Route::get('ofertas', 'Publico\OfertasController@index')
->name('ofertas.index');
// PRODUCTOS NUEVOS
Route::get('nuevos', 'Publico\NuevosController@index')
->name('nuevos.index');
// PRODUCTOS MAS PEDIDOS
Route::get('maspedidos', 'Publico\MaspedidosController@index')
->name('maspedidos.index');


// EMPRESAS
Route::get('locales/{idempresa}', 'Publico\LocalesController@index')
->name('locales.index');







Route::get('registrartuempresa','Admin\EmpresasController@registrartuempresa')->name('registrartuempresa');
Route::post('tuempresa/store','Admin\EmpresasController@tuempresastore')->name('registratuempresa.store');
Route::get('confirmarcuenta','Admin\EmpresasController@confirmarcuenta')->name('confirmarcuenta');
Route::PUT('cambiaremailusuario.update/{userid}','Admin\EmpresasController@cambiaremailusuarios')->name('cambiaremailusuario.update');


// Route::get('activarcuentaempresa/{cuentas}','Admin\EmpresasController@activarcuentatoken')->name('empresas.activarcuenta');
Route::get('activarcuentaempresa','Admin\EmpresasController@activarcuentatoken')->name('empresas.activarcuenta');
// Route::get('activarcuentaempresa/{token}','Admin\EmpresasController@activarcuentatoken')->name('empresas.activarcuenta');

Route::get('vistaprevia','Admin\EmpresasController@vistaprevia')->name('vistaprevia');


Route::get('/home', 'HomeController@index')
->name('home');

//CONSULTA RUC
Route::get('consultar.ruc', 'Admin\EmpresasController@consultaRuc')->name('consultar.ruc');


//departamentos
Route::get("getdepartamento", "Publico\DepartamentosController@getBuscarDepartamento")
->name("ajax.getBuscarDepartamento");


Route::get("getprovincias/pordepartamento", "Publico\ProvinciasController@getprovinciaByDepartamentoId")
->name("ajax.getprovinciaByDepartamentoId");

//Distritos
Route::get("getdistritos/porprovincia", "Publico\DistritosController@getdistritosByProvinciaId")
->name("ajax.getdistritosByProvinciaId");
