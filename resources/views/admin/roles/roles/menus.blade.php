@extends('layouts.adminlte3.adminlte3')
{{-- @extends('layouts.app') --}}

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3>Generar Menu: rol {{ str_replace("menu_", "", str_replace("web_", "", $rol->name ) ) }}</h3>
                </div>
                <div class="card-body">
                    @can('roles.crear')
                    
                        <form action="{{ route('roles.generarmenussave', $rol->id) }}" method="POST">
                    
                            @csrf
                            @method('POST')
                    
                            <div class="form-group">
                                <ul style="list-style:none;">
                                    @foreach ($menus as $menu)
                                        <li>
                                            <div class="form-group form-check mb-0 pb-0">
                                                <input 
                                                    type="checkbox" 
                                                    class="form-check-input" 
                                                    name="menus[]" 
                                                    value="{{ $menu->url }}" 
                                                    id="{{ $menu->url."-".$menu->id }}"
                                                    @if ( $rol->hasPermissionTo($menu->url, 'menu') )
                                                        checked="checked"
                                                    @endif
                                                >
                                                <label class="form-check-label" for="{{ $menu->url."-".$menu->id }}" >{{ $menu->nombre }}</label>
                                            </div>
                                        </li>
                                        @if ( $menu->submenus )
                                            <ul style="list-style:none;">
                                                @foreach ( $menu->submenus as $submenu )
                                                    @include('admin.roles.roles.submenus', ['submenu' => $submenu])
                                                @endforeach
                                            </ul>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                    
                            <div class="form-group">
                                <button type="submit"  class="btn btn-info">Guardar</button>
                                <a href="{{ route("roles.index") }}" class="btn btn-danger">Cancelar</a>
                            </div>
                    
                        </form>
                    
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>

@endsection