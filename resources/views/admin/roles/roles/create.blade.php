@extends('layouts.admin.admin')


@can('roles.crear')

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3>Crear Rol</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('roles.store') }}" method="POST">
                    
                        @csrf
                        {{-- <div class="form-row">
                    
                            <div class="form-group col-xs-12 col-sm-6">
                                <label for="guard_name">Tipo</label>
                                <select autofocus class="form-control" name="guard_name" id="guard_name">
                                    <option value="web">Rol de acceso a permisos</option>
                                    <option value="menu">Rol para menu de navegacion</option>
                                </select>
                                <span class="text-danger">{{ $errors->first('guard_name') }}</span>
                            </div>
                        
                        </div> --}}
                    
                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" id="name" placeholder="Nombre" value="{{ old('name') }}" class="form-control">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
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

@endsection



@else
    @include('includes.sinpermiso')
@endcan