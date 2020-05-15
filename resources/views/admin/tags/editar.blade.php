@extends('layouts.public')

@section('contenido')
  
            <div class="card ">
                <div class="card-header">
                    <h3>Crear Tags</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('tags.store')}}" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" name="nombre" id="nombre"  class="form-control" value="{{$tag->nombre}}">
                                <span class="text-danger">{{ $errors->first('nombre') }}</span>
                            </div>
                           
                            <div class="form-group col-12">
                                @csrf
                                {!! method_field('PUT') !!}
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{route('tags.index')}}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection