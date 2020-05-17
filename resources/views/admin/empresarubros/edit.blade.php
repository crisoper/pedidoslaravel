@extends('layouts.admin.admin')

@can('empresarubros.editar')

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3>Editar Rubro Empresa</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('empresarubros.update', $empresarubro->id)}}" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $empresarubro->nombre }}">
                                <span class="text-danger">{{ $errors->first('nombre') }}</span>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="descripcion">Descripción:</label>
                                <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{ $empresarubro->descripcion }}">
                                <span class="text-danger">{{ $errors->first('descripcion') }}</span>
                            </div>
                            <div class="form-group col-12">
                                @csrf
                                {!! method_field('PUT') !!}
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{route('empresarubros.index')}}" class="btn btn-danger">Cancelar</a>
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