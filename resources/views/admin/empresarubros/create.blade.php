@extends('layouts.admin')

@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        Crear rubro empresa
                    </div>

                    <div class="card-body">

                        <form action="{{ route("empresarubros.store") }}" method="POST">

                            @method("POST")
                            @csrf

                            <div class="form-row">

                                <div class="form-group col-12">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control" autofocus value="{{ old("nombre") }}">
                                    <small class="text-danger">{{ $errors->first('nombre') }}</small>
                                </div>
                                
                                <div class="form-group col-12">
                                    <label for="">Descripcion</label>
                                    <textarea name="descripcion" id="descripcion" cols="30" rows="3" class="form-control">{{ old("descripcion") }}</textarea>
                                </div>
                                
                                <div class="form-group col-12">
                                    <button type="submit" class="btn btn-info">Guardar</button>
                                    <a href="{{ route("empresarubros.index") }}" class="btn btn-danger">Cancelar</a>
                                </div>

                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection