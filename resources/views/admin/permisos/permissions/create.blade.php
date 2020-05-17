@extends('layouts.admin.admin')

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3>Crear Permisos</h3>
                </div>
                <div class="card-body">
                    
                    @can('crear.permissions')
                    <form action="{{ route('permissions.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-12 col-sm-4">
                                <label for="tabla">Tabla</label>
                                <select class="form-control" id="tabla" name="tabla">
                                    @foreach ( $tablas as $tabla )
                                        <option value="{{ $tabla }}">{{ $tabla }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('tabla') }}</span>
                            </div>
                        </div>

                        <div class="form-row mb-3">
                            <div class="col-12 col-sm-12">
                                <label for="">Acciones</label>
                            </div>
                            @foreach ( $accionpermisos as $accionpermiso )    
                                <div  class="form-group col-12 col-sm-4 pb-0 mb-0">
                                    <label class="form-check-label">
                                        <input 
                                            type="checkbox" 
                                            name="acciones[]"
                                            value="{{ $accionpermiso->nombre }}">
                                        {{ $accionpermiso->nombre }}
                                    </label>
                                </div>
                            @endforeach
                            <div class="col-12 col-sm-12">
                                <span class="text-danger">{{ $errors->first('acciones') }}</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-12 col-sm-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{ route('permissions.index') }}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>


@endsection