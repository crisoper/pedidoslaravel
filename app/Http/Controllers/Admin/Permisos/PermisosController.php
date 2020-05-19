<?php

namespace App\Http\Controllers\Admin\Permisos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Permisos\PemisosCreateRequest;
use App\Http\Requests\Admin\Permisos\PemisosUpdateRequest;
use App\Models\Admin\Menus\Menu;
use App\Models\Admin\Permisos\Accionpermiso;
use App\Models\Admin\Permisos\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PermisosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Es un usuario administrador, mostramos todos los registros
        if (!empty(request()->buscar)) 
        {
            $permissions = Permission::where('name', 'like', '%'.request()->buscar.'%' )
                                    ->whereIn('guard_name', ['web', 'api'])
                                    ->paginate(10);
            return view('admin.permisos.permissions.index', compact('permissions'));
        }
        else
        {
            $permissions = Permission::whereIn('guard_name', ['web', 'api'])->paginate(10);
            return view('admin.permisos.permissions.index', compact('permissions'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accionpermisos = Accionpermiso::get();
        $tablas = $this->nombretablas( DB::select("SHOW TABLES" ) );
        return view('admin.permisos.permissions.create', compact('accionpermisos', 'tablas') );
    }


    public function nombretablas( $tablas ) 
    {

        $ntablas = [];
        foreach( $tablas as $tabla )
        {
            $ntablas[] = strtolower( str_replace("t_", "", $tabla->Tables_in_pedidos) );
        }

        return  array_unique( $ntablas );
        return  array_unique( $tablas );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PemisosCreateRequest $request)
    {
        foreach( $request->acciones as $accion ) {
            Permission::updateOrCreate(
                [
                    'name' => $request->input('tabla').'.'.$accion, 
                    'guard_name' => 'web'
                ],
                [
                    'guard_name' => 'web',
                    'name' => $request->input('tabla').'.'.$accion
                ]
            );
        }

        return redirect( route('permissions.index') )->with('Registros creados');
    }


    public function generarmasivamente() 
    {

        $accionpermisos = AccionPermiso::get();

            $tablas = $this->nombretablas( 
                DB::select("SHOW TABLES")
            );

            foreach( $tablas as $tabla )
            {

                foreach( $accionpermisos as $accion )
                {

                    Permission::updateOrCreate(
                        [
                            'name' => $tabla.'.'.$accion->nombre, 
                            'guard_name' => 'web'
                        ],
                        [
                            'guard_name' => 'web',
                            'name' => $tabla.'.'.$accion->nombre
                        ]
                    );

                }
            }

        return redirect( route('permissions.index') )->with('Registros creados');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('admin.permisos.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( PemisosUpdateRequest $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $permission->name = $request->input('name');
        $permission->save();
        return redirect( route('permissions.index') )->with('Registro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    
    //Generar menus masivamente segun los menus registrados en la aplicacion
    public function generarmasivamentemenus ()
    {
        $menus = Menu::get();

        foreach ( $menus as $menu )
        {
            Permission::updateOrCreate(
                [
                    'name' => $menu->url, 
                    'guard_name' => 'menu'
                ],
                [
                    'guard_name' => 'menu',
                    'name' => $menu->url
                ]
            );
        }

        return redirect( )->back()->with("info", 'Permisos actualizados');
    }

    
}
