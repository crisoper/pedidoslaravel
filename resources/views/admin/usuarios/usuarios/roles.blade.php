{{-- @extends('layouts.app') --}}
@extends('layouts.adminlte3.adminlte3')

@can('model_has_roles.listar')

@section('contenido')


<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3>Roles usuario: {{ $usuario->name }}</h3>
                </div>
                <div class="card-body">
                    
                    <form action="{{ route('usuarios.storeroles', $usuario->id ) }}" method="POST">
                        @csrf
                        {!! method_field('PUT') !!}
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header">
                                    <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                        Roles de acceso a permisos
                                    </a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="form-row">
                                        @foreach( $roles as $rol )
                                            @if( $rol->name != 'SuperAdministrador') 
                                                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-4 col-xl-4 mb-0 p-0">
                                                    <label class="mb-1 form-check-label">
                                                        <input 
                                                            type="checkbox" 
                                                            name="roles[]"
                                                            value="{{ $rol->name }}"
                                                            @if ( $usuario->hasRole( $rol->name, 'web') )
                                                            checked="checked"
                                                            @endif
                                                        >
                                                        {{ str_replace('menu_', '', str_replace( 'web_', '', $rol->name ) ) }}
                                                    </label>
                                                    <span class="text-danger">{{ $errors->first('roles') }}</span>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                                        Roles para menu de navegacion
                                    </a>
                                </div>
                                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        
                                        <div class="form-row">
                                            @foreach( $rolesmenus as $rolmenu )
                        
                                                @if( $rolmenu->name != 'SuperAdministrador') 
                                                    <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-4 col-xl-4 mb-0 p-0">
                                                            
                                                        <label class="mb-1 form-check-label">
                                                            <input 
                                                                type="checkbox" 
                                                                name="rolesmenus[]"
                                                                value="{{ $rolmenu->name }}"
                                                                @if ( $usuario->hasRole( $rolmenu->name, 'menu') )
                                                                checked="checked"
                                                                @endif
                                                            >
                                                            {{ str_replace('menu_', '', str_replace( 'web_', '', $rolmenu->name ) ) }}
                                                        </label>
                                                        <span class="text-danger">{{ $errors->first('rolesmenus') }}</span>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                @can('model_has_roles.crear')
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                @endcan
                                <a href="{{ route('usuarios.index') }}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>



@endsection




@else
    @include('layouts.paginas.mensajes.sinpermiso')    
@endcan