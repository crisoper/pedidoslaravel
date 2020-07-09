@extends('layouts.admin.admin')

@can('periodos.crear')

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3>Crear Comprobante Tipos</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('comprobantetipos.store')}}" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old("nombre") }}">
                                <span class="text-danger">{{ $errors->first('nombre') }}</span>
                            </div>
                            <div class="form-group col-md-9">
                                <label for="descripcion">Descripción:</label>
                                <input type="text" name="descripcion" id="descripcion" class="form-control"  value="{{ old("descripcion") }}">
                                <span class="text-danger">{{ $errors->first('descripcion') }}</span>
                            </div>
                            <div class="form-group col-12">
                                @csrf
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                @if ( auth()->user()->hasRole('SuperAdministrador'))
                                <a href="{{route('comprobantetipos.index')}}" class="btn btn-danger">Cancelar</a>
                                @else
                                <a href="{{route('configuracionempresa.index')}}" class="btn btn-danger">Cancelar</a>
                                @endif
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