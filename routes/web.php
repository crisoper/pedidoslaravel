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




Route::get('/', 'Publico\InicioController@index')
->name('inicio.index');

Route::get('cart', 'Publico\CartController@index')
->name('cart.index');

Route::get('registrartuempresa','Admin\EmpresasController@registrarTuEmpresa')->name('registrartuempresa');
Route::post('tuempresa.store','Admin\EmpresasController@tuempresastore')->name('registratuempresa.store');

Route::get('/home', 'HomeController@index')
->name('home');

//CONSULTA RUC
Route::get('consultar.ruc', 'Admin\EmpresasController@consultaRuc')->name('consultar.ruc');