
@extends('layouts.admin.admin')

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-11">
                            <h3>Crear Categoría</h3>                          
                        </div>
                        <div class="mb-3 text-center col-1">
                            <a title="Atras" class="" href="{{Route('categorias.index')}}"><h4><i class="fas fa-reply "></i></h4></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('categorias.store')}}" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                
                                <input type="text" name="nombre" id="nombre"  class="form-control" value="{{old('nombre')}}">
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
</div>

@endsection
