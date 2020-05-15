{{-- @extends('layouts.app') --}}
@extends('layouts.admin.admin')

@section('contenido')

@can('public.roles.editar')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3>Editar rol: {{ str_replace("menu_", "", str_replace("web_", "", $rol->name ) ) }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('roles.update', $rol->id ) }}" method="POST">
                        @csrf
                        {!! method_field('PUT') !!}
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" id="name" placeholder="rol" value="{{ str_replace("menu_", "", str_replace("web_", "", $rol->name ) ) }}" class="form-control">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>

                            @if ( $rol->guard_name == 'menu')    
                                <div class="form-group col-12">
                                    <label for="">Pagina inicio</label>
                                    <select name="paginainicio" id="paginainicio" class="form-control">
                                        @foreach ( $rol->permissions as $permiso)
                                        
                                        @if ( $permiso->guard_name == 'menu' && Route::has( $permiso->name ) )
                                        <option value="{{ $permiso->name }}">{{ route("$permiso->name") }}</option>
                                        @endif
                                        
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{ route('roles.index') }}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endcan

@endsection