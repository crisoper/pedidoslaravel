@extends('layouts.public')

@section('contenido')
  
            <div class="card ">
                <div class="card-header">
                    <h3>Crear Categoria</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('categorias.store')}}" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                
                                <input type="text" name="nombre" id="nombre"  class="form-control">
                                <span class="text-danger">{{ $errors->first('nombre') }}</span>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="parent_id">Categoria padre:</label>
                                <select class="form-control" name="parent_id" id="parent_id" >
                                    <option value="">Seleccione categoría</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id}}">
                                            {{ $categoria->nombre}}
                                        </option>
                                    @endforeach    
                                </select>
                            </div>

                            <div class="form-group col-12">
                                @csrf
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{route('categorias.index')}}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection