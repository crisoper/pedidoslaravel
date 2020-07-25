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

Route::get("administracion/login", "Auth\}@showLoginForm")
->name("admin.login");
Route::get('loginOrRegister/{flag}' ,'Auth\loginorregisterController@loginOrRegister')->name('loginOrRegister');
Route::get('registernewempresa' ,'Auth\loginorregisterController@registernewempresa')->name('registernewempresa');
Route::get('loginOrRegister.editcomprador' ,'Admin\Usuarios\UsuariosController@editarcomprador')->name('loginOrRegister.editar.comprador');
Route::put('loginOrRegister.updatecomprador' ,'Admin\Usuarios\UsuariosController@actualizarDatosComprador')->name('loginOrRegister.update.comprador');
Route::put('loginOrRegister.updatecomprador.contraseña' ,'Admin\Usuarios\UsuariosController@cambiarcontraseñaComprador')->name('loginOrRegister.cambiarcontraseñaComprador');

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



// PRODUCTOS RESULTADOS BUSQUEDA
Route::get('productos/busqueda', 'Publico\ResultadosproductosController@index')
->name('productos.busqueda.index');
// PRODUCTOS RESULTADOS BUSQUEDA
Route::get('locales/busqueda', 'Publico\ResultadoslocalesController@index')
->name('locales.busqueda.index');



//CESTA MENU
Route::get("cesta/index", "Publico\CestaController@index")
->name("cesta.index");
Route::post("cesta/store", "Publico\CestaController@store")
->name("cesta.store");
Route::put("cesta/update", "Publico\CestaController@update")
->name("cesta.update");
Route::delete("cesta/delete", "Publico\CestaController@delete")
->name("cesta.delete");
//LISTA DESEOS MENU
Route::get("listadeseo/index", "Publico\ListadeseosMenuController@index")
->name("listadeseo.index");
Route::post("listadeseo/store", "Publico\ListadeseosMenuController@store")
->name("listadeseo.store");
Route::delete("listadeseo/delete", "Publico\ListadeseosMenuController@delete")
->name("listadeseo.delete");



//REALIZAR PEDIDO
Route::post("ajax/locales/pedidosstore", "Admin\PedidosController@pedidosstore")
->name("ajax.locales.pedidosstore");

//SEGUIMIENTO DE PEDIDO
Route::get("seguimientodepedido", "Publico\SeguimientopedidoController@index")
->name("seguimientodepedido.index");

Route::get("ajax/seguimientodepedido", "Publico\SeguimientopedidoController@seguimientodepedido")
->name("ajax.seguimientodepedido");
Route::post("ajax/seguimientodepedido/store", "Publico\SeguimientopedidoController@store")
->name("ajax.seguimientodepedido.store");

// Route::post("ajax/pedidos/store", "Admin\PedidosAjaxController@store")
// ->name("ajax.pedidos.store");





// EMPRESAS
Route::get('locales/{idempresa}', 'Publico\LocalesController@index')
->name('locales.index');
Route::post('nuevaempresa.store','Publico\NuevaempresaController@nuevaempresa')->name('nuevaempresa.store');

Route::get('confirmarcuenta','Admin\EmpresasController@confirmarcuenta')->name('confirmarcuenta');
Route::PUT('cambiaremailusuario.update/{userid}','Admin\EmpresasController@cambiaremailusuarios')->name('cambiaremailusuario.update');


// Route::get('activarcuentaempresa/{cuentas}','Admin\EmpresasController@activarcuentatoken')->name('empresas.activarcuenta');
Route::get('activarcuentaempresa','Publico\ActivarcuentaController@activarcuentatoken')->name('empresas.activarcuenta');
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



//Acerca de pedidosapp
Route::get("nosotros", "Publico\InformacionDeAplicacionController@nosotros")
->name("nosotros");

Route::get("contactanos", "Publico\InformacionDeAplicacionController@contactanos")
->name("contactanos");

Route::get("quienessomos", "Publico\InformacionDeAplicacionController@quienessomos")
->name("quienessomos");