@extends('layouts.admin.admin')

@can('periodos.crear')

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3>Crear Periodos</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('periodos.store')}}" method="POST">
                        <div class="form-row">
                             <div class="form-group col-md-3">
                                <label for="empresa_id">Empresa:</label>
                                <select name="empresa_id" id="empresa_id" class="form-control" autofocus>
                                    <option value="">Seleccionar empresa</option>
                                    @foreach ($empresas as $empresa)
                                    <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('empresa_id') }}</span>
                            </div> 
                            <div class="form-group col-md-9">
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old("nombre") }}">
                                <span class="text-danger">{{ $errors->first('nombre') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inicio">Inicio:</label>
                                <input type="date" name="inicio" id="inicio" class="form-control"  value="{{ old("inicio") }}">
                                <span class="text-danger">{{ $errors->first('inicio') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="fin">Fin:</label>
                                <input type="date" name="fin" id="fin" class="form-control"  value="{{ old("fin") }}">
                                <span class="text-danger">{{ $errors->first('fin') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="estado">Estado:</label>
                                <select name="estado" id="estado" class="form-control">
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                                <span class="text-danger">{{ $errors->first('estado') }}</span>
                            </div>
                            <div class="form-group col-12">
                                @csrf
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{route('periodos.index')}}" class="btn btn-danger">Cancelar</a>
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