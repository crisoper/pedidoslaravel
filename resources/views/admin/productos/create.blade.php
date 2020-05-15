@extends('layouts.public')

@section('contenido')
  
            <div class="card ">
                <div class="card-header">
                    <h3>Crear Productos</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('productos.store')}}" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" name="nombre" id="nombre"  class="form-control" placeholder="Productos">
                                <span class="text-danger">{{ $errors->first('nombre') }}</span>
                            </div>
                            <div class="form-group col-md-12">
                                <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="4" placeholder="Descripcion de producto"></textarea>
                                <span class="text-danger">{{ $errors->first('descripcion') }}</span>
                            </div>

                            
                            <div class="form-group col-md-12">
                                <label for="categoriaid">Categoria:</label>
                                <select class="form-control" name="categoriaid" id="categoriaid" >
                                    <option value="">Seleccione categoría</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id}}">
                                            {{ $categoria->nombre}}
                                        </option>
                                    @endforeach    
                                </select>
                                <span class="text-danger">{{ $errors->first('categoriaid') }}</span>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="codigo" id="codigo"  class="form-control" placeholder="Código ">
                                <span class="text-danger">{{ $errors->first('codigo') }}</span>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="precio" id="precio"  class="form-control" placeholder="Precio ">
                                <span class="text-danger">{{ $errors->first('precio') }}</span>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="stock" id="stock"  class="form-control" placeholder="Stock">
                                <span class="text-danger">{{ $errors->first('stock') }}</span>
                            </div>
                            <div class="form-group col-12">
                                @csrf
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{route('productos.index')}}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection