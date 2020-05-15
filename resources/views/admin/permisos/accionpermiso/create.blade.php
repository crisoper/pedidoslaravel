@extends('layouts.admin.admin')
{{-- @extends('layouts.app') --}}

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3>Crear accion permiso</h3>
                </div>
                <div class="card-body">
                    {{-- @can('usuarios.accionpermisos.crear') --}}
            
                    <form action="{{ route('accionpermisos.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-xs-12 col-sm-6">
                                <label for="nombre">Nombre</label>
                                <input autofocus type="text" name="nombre" id="nombre" placeholder="nombre" value="{{ old('name') }}" class="form-control">
                                <span class="text-danger">{{ $errors->first('nombre') }}</span>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-xs-12 col-sm-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{ route('accionpermisos.index') }}" class="btn btn-danger">Cancelar</a>
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