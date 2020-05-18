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


Route::group(
[
    'prefix' => 'administracion',
    'middleware' => [
        'auth'
    ],
], 
function () {
    

    //EMPRESAS
    Route::resource('empresas', 'Admin\EmpresasController');
    Route::get("seleccionarempresa", 'Admin\SeleccionarempresaController@seleccionarempresa')->name("config.seleccionar.empresa");
    Route::post("seleccionarempresa", 'Admin\SeleccionarempresaController@establecerempresa')->name("config.establecer.empresa");
    

    Route::resource('roles', 'Admin\Roles\RolesController');
    Route::resource('usuarios', 'Admin\Usuarios\UsuariosController');

});


Route::group([
    'prefix' => 'administracion',
    'middleware' => [
        'auth',
        'sessionempresa'
    ],
], 
function() {
    
    //MENUS
    Route::resource('menus', 'Admin\Menus\MenusController');

    Route::resource('periodos', 'Admin\PeriodosController');
    Route::get("seleccionarperiodo", 'Admin\SeleccionarperiodoController@seleccionarperiodo')->name("config.seleccionar.periodo");
    Route::post("seleccionarperiodo", 'Admin\SeleccionarperiodoController@establecerperiodo')->name("config.establecer.periodo");
    
    Route::resource('usuariosxperiodo', 'Admin\Usuarios\UsuariosxperiodoController');
    
    Route::get('miperfil', ['as' => 'usuarios.miperfil', 'uses' => 'Admin\Usuarios\UsuariosController@miperfil']);
    Route::post('cambiarmiclave', ['as' => 'usuarios.cambiarmiclave', 'uses' => 'Admin\Usuarios\UsuariosController@cambiarmiclave']);
    Route::get('usuarios/{user}/roles', 'Admin\Usuarios\UsuariosController@getroles')->name('usuarios.roles');
    Route::put('usuarios/{user}/roles', 'Admin\Usuarios\UsuariosController@storeroles')->name('usuarios.storeroles');
    
    
    Route::resource('productos', 'Admin\ProductosController');
    Route::get('productosimg', 'Admin\ProductosController@getImagenes')->name('productos.getImagenes');
    Route::resource('categorias', 'Admin\ProductocategoriasController');
    Route::resource('tags', 'Admin\TagsController');
    


    //EMPRESA RUBROS
    Route::resource("empresarubros", 'Admin\EmpresarubrosController');

    // COMPROBANTE TIPOS
    Route::resource('comprobantetipos', 'Admin\ComprobantestiposController');
    Route::get('empresas/{empresa}/agregarcomprobantetipos', 'Admin\EmpresasController@agregarcomprobantetipos')->name('empresas.agregarcomprobantetipos');
    Route::post('empresas/{empresa}/guardarcomprobantetipos', 'Admin\EmpresasController@guardarcomprobantetipos')->name('empresas.guardarcomprobantetipos');

    //Usuarios que pertencen a una empresa
    Route::resource('usuariosxempresa', 'Admin\Usuarios\UsuariosxempresaController');


    
    //Rutas que requieren un periodo para continuar
    Route::group([
        'middleware' => [
            'sessionperiodo'
        ],
    ],
    function() {
        
        
        Route::resource('accionpermisos', 'Admin\Permisos\AccionpermisosController');
        
        Route::get('roles/{role}/getpermisos', ['as' => 'roles.getpermisos', 'uses' => 'Admin\Roles\RolesController@getpermisos']);
        Route::post('roles/{role}/savepermisos', ['as' => 'roles.savepermisos', 'uses' => 'Admin\Roles\RolesController@savepermisos']);      //Guardar permisos por rol
        
        Route::get('roles/{role}/getmenus', ['as' => 'roles.generarmenus', 'uses' => 'Admin\Roles\RolesController@getmenus']);
        Route::post('roles/{role}/savemenus', ['as' => 'roles.generarmenussave', 'uses' => 'Admin\Roles\RolesController@savemenus']);      //Guardar menu por rol

        Route::resource('permissions', 'Admin\Permisos\PermisosController');
        Route::post('permissions/generarmasivamente', 'Admin\Permisos\PermisosController@generarmasivamente')->name('permissions.generarmasivamente');
        Route::post('permissions/generarmasivamentemenus', 'Admin\Permisos\PermisosController@generarmasivamentemenus')->name('permissions.generarmasivamente.menus');

        Route::post('ajax/miperfil/subirfoto', 'Admin\Usuarios\UsuariosController@miperfilsubirfoto')->name('ajax.miperfilsubirfoto');

    });

    
});