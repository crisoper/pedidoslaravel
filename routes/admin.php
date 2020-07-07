<?php

use App\Models\Admin\Empresa;
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
    // Route::post("horarioatencionempresa", 'Admin\SeleccionarempresaController@horarioAtencion')->name("horario.atencion.empresa");
    

    Route::resource('roles', 'Admin\Roles\RolesController');
    Route::resource('usuarios', 'Admin\Usuarios\UsuariosController');

});

Route::group([
    'prefix' => 'configuracion',
    'middleware' => [
        'auth'
    ],    
],
function(){
    Route::get("horarioempresa","Admin\HorariosController@index")->name('horarios.index');
    Route::get("horarioempresa.editar","Admin\HorariosController@edit")->name('horarios.editar');
    Route::post("horarioempresa.update","Admin\HorariosController@update")->name('horarios.update');
    Route::post("horarioempresa","Admin\HorariosController@store")->name('horario.atencion.empresa');
    Route::get("configuracionempresa","Admin\ConfiguracionesController@index")->name('configuracionempresa.index');
    Route::get("comprobantesempresa","Admin\ConfiguracionesController@comprobantes")->name('config.comprobantes.index');
}
);

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
    Route::post('productos.ofertas', 'Admin\ProductosController@productosofertas')->name('productos.ofertas');
    Route::get('productos.ofertas.editar', 'Admin\ProductosController@productosofertaseditar')->name('productos.ofertas.editar');
    Route::post('productos.ofertas.update', 'Admin\ProductosController@productosofertasupdate')->name('productos.ofertas.update');
    Route::post('productos.ofertas.eliminar', 'Admin\ProductosController@productosofertasdelete')->name('productos.ofertas.eliminar');
    Route::get('productosimg', 'Admin\ProductosController@getImagenes')->name('productos.getImagenes');
    Route::resource('categorias', 'Admin\ProductocategoriasController');
    Route::get('categorias.getCategorias', 'Admin\ProductocategoriasController@getCategorias')->name('categorias.getCategorias');
    Route::resource('tags', 'Admin\TagsController');
    Route::get('tags.getTags', 'Admin\TagsController@getTags')->name('tags.getTags');
    


    //EMPRESA RUBROS
    Route::resource("empresarubros", 'Admin\EmpresarubrosController');

    // COMPROBANTE TIPOS
    Route::resource('comprobantetipos', 'Admin\ComprobantestiposController');
    Route::get('empresas/{empresa}/agregarcomprobantetipos', 'Admin\EmpresasController@agregarcomprobantetipos')->name('empresas.agregarcomprobantetipos');
    Route::post('empresas/{empresa}/guardarcomprobantetipos', 'Admin\EmpresasController@guardarcomprobantetipos')->name('empresas.guardarcomprobantetipos');

    //Usuarios que pertencen a una empresa
    Route::resource('usuariosxempresa', 'Admin\Usuarios\UsuariosxempresaController');


    //INCLUDES DE HOME
    Route::get('includeProductos.productos','Admin\IncludeshomeController@includeProductos')->name('includeProductos.productos');
    Route::get('includeProductos.principal','Admin\IncludeshomeController@includePrincipal')->name('includeProductos.principal');
    Route::get('includeProductos','Admin\IncludeshomeController@getproductosmaspedidos')->name('getproductosmaspedidos');
    Route::get('includeProductos.getHistoricoVentas','Admin\IncludeshomeController@getHistoricoVentas')->name('getHistoricoVentas');
  
    //INCLUDE SUPERADMINISTRADOR  
    Route::get('includeProductos.empresasRegitradas','Admin\IncludeshomeController@empresasRegitradas')->name('empresasRegitradas');
    Route::get('includeProductos.totalderegistros','Admin\IncludeshomeController@totalderegistros')->name('totalderegistros');

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


    
    // PRODUCTOS
    Route::resource('productos', 'Admin\ProductosController');
    Route::get('productosimg', 'Admin\ProductosController@getImagenes')->name('productos.getImagenes');
    Route::resource('categorias', 'Admin\ProductocategoriasController');
    Route::get('categorias.getCategorias', 'Admin\ProductocategoriasController@getCategorias')->name('categorias.getCategorias');
    Route::resource('tags', 'Admin\TagsController');
    Route::get('tags.getTags', 'Admin\TagsController@getTags')->name('tags.getTags');


    // PEDIDOS
    Route::get('pedidos', 'Admin\PedidosController@index')->name("pedidos.index");

    Route::get("ajax/pedidos/index", "Admin\PedidosAjaxController@index")
    ->name("ajax.pedidos.index");
    Route::post("ajax/pedidos/store", "Admin\PedidosAjaxController@store")
    ->name("ajax.pedidos.store");

    
    // PEDIDOS DESPACHADOS
    Route::get('pedidos/despachados', 'Admin\PedidosController@despachados')->name("pedidos.despachados");

    Route::get("ajax/pedidos/despachados/index", "Admin\PedidosdespachadosAjaxController@index")
    ->name("ajax.pedidos.despachados.index");
    Route::post("ajax/pedidos/despachados/store", "Admin\PedidosdespachadosAjaxController@store")
    ->name("ajax.pedidos.despachados.store");
    

    // PEDIDOS DESPACHADOS
    Route::get('pedidos/entregados', 'Admin\PedidosController@entregados')->name("pedidos.entregados");

    Route::get("ajax/pedidos/entregados/index", "Admin\PedidosentregadosAjaxController@index")
    ->name("ajax.pedidos.entregados.index");
    Route::post("ajax/pedidos/entregados/store", "Admin\PedidosentregadosAjaxController@store")
    ->name("ajax.pedidos.entregados.store");

    
});