@extends('layouts.adminlte3.adminlte3')
{{-- @extends('layouts.app') --}}

@can('periodos.editar')

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3>Editar Periodos</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('periodos.update', $periodo->id)}}" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="nombre">Empresa ID:</label>
                                <select name="empresa_id" id="empresa_id" class="form-control">
                                    @foreach ($empresas as $empresa)
                                    <option value="{{ $empresa->id }}" 
                                        @if ( $empresa->nombre == $periodo->empresa->nombre )
                                            selected
                                        @endif
                                        >{{ $empresa->nombre }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('nombre') }}</span>
                            </div>
                            <div class="form-group col-md-9">
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $periodo->nombre }}">
                                <span class="text-danger">{{ $errors->first('nombre') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inicio">Inicio:</label>
                                <input type="date" name="inicio" id="inicio" class="form-control" value="{{ $periodo->inicio }}">
                                <span class="text-danger">{{ $errors->first('inicio') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="fin">Fin:</label>
                                <input type="date" name="fin" id="fin" class="form-control" value="{{ $periodo->fin }}">
                                <span class="text-danger">{{ $errors->first('fin') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="estado">Estado:</label>
                                <input type="text" name="estado" id="estado" class="form-control" value="{{ $periodo->estado }}">
                                <span class="text-danger">{{ $errors->first('estado') }}</span>
                            </div>
                            <div class="form-group col-12">
                                @csrf
                                {!! method_field('PUT') !!}
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