@extends('layouts.admin.admin')

@can('role_has_permissions.crear')


@section('breadcrumbs')    
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Admistracion</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
        <li class="breadcrumb-item active">Editar rol</li>
    </ol>
@endsection

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3>Permisos rol: {{ str_replace("menu_", "", str_replace("web_", "", $rol->name ) ) }}</h3>
                </div>
                <div class="card-body">
                    {{-- @can('public.roles.crear') --}}
                    <form action="{{ route('roles.savepermisos', $rol->id ) }}" method="POST">
                    
                        @csrf
                        <div class="form-row">
                            Seleccionar permisos:
                        </div>
                    
                        <div class="form-row">
                            @foreach ($permissions as $permiso)
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <label class="form-check-label">
                                        <input 
                                            type="checkbox" 
                                            name="permisos[]"
                                            @if ( $rol->hasPermissionTo( $permiso->name , 'web') )
                                                checked
                                            @endif
                                            value="{{ $permiso->name }}">
                                        {{ $permiso->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                                
                        <div class="form-row">
                            <span class="text-danger">{{ $errors->first('permisos') }}</span>
                        </div>
                        
                        <div class="form-row py-2">
                            <div class="form-group col">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{ route('roles.index') }}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </form>
                    {{-- @endcan --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scriptspersonalizados')

@endsection


@else
    @include('includes.sinpermiso')
@endcan