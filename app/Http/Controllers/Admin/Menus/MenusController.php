<?php

namespace App\Http\Controllers\Admin\Menus;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Menus\MenuCreateRequest;
use App\Models\Admin\Menus\Menu;
use Illuminate\Http\Request;
use App\Models\Admin\Permisos\Permission;

class MenusController extends Controller
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

        if (!empty(request()->buscar)) 
        {
            $menus = Menu::where('nombre', 'like', '%'.request()->buscar.'%')
                            ->orWhere('url', 'like', request()->buscar.'%')
                            ->with('submenus')
                            ->orderBy('orden')
                            ->paginate(5);
        }
        else
        {
            $menus = Menu::whereNull('parent_id')
                            ->with('submenus')
                            ->orderBy('orden')
                            ->paginate(5);
        }

        return view('admin.menus.menus.index', compact('menus'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::orderBy('nombre')->get();

        return view('admin.menus.menus.create', compact('sistemas', 'menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuCreateRequest $request)
    {
        $menu = new Menu();
        $menu->orden = $request->input('orden');
        
        if ( $request->input('tipo') == 'navegacion') {
            $menu->url = strtolower( $request->input('url') );
        }
        else {
            $menu->url = strtolower( str_replace( " ", "", $request->input('nombre') ).'_'.date('dmYHis') ) ;
        }

        $menu->nombre = $request->input('nombre');
        $menu->tooltip = $request->input('tooltip');
        $menu->icono = $request->input('icono');
        $menu->tipo = $request->input('tipo');

        if( !empty( $request->input('parent_id') ) ) {
            $menu->parent_id = $request->input('parent_id');
        }

        $menu->save();

        //Actualizar permisos basados en menus
        $this->actualizarPermisosMenus();

        return redirect()->route('menus.index')->with('info', 'Registro creado');

    }


    public function actualizarPermisosMenus() {
        //Actualizando permisos, esta accion ahora es automatica
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
        //Fin Actualizar permisos
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
        $menu = Menu::findOrFail($id);
        $menupadres = Menu::whereNotIn('id', [$menu->id] )->orderBy('nombre')->get();

        return view('admin.menus.menus.edit', compact('menupadres', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->orden = $request->input('orden');
        
        if ( $request->input('tipo') == 'navegacion') {
            $menu->url = strtolower( $request->input('url') ) ;
        }
        else {
            $menu->url = strtolower( str_replace( " ", "", $request->input('nombre') ).'_'.date('dmYHis') );
        }

        $menu->nombre = $request->input('nombre');
        $menu->tooltip = $request->input('tooltip');
        $menu->icono = $request->input('icono');
        $menu->tipo = $request->input('tipo');

        if( !empty( $request->input('parent_id') ) ) {
            $menu->parent_id = $request->input('parent_id');
        }
        else {
            $menu->parent_id = null;
        }

        $menu->save();

        //Actualizar permisos basados en menus
        $this->actualizarPermisosMenus();

        return redirect()->route('menus.index')->with('info', 'Registro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('menus.index')->with('info', 'Registro eliminado');
    }

}
