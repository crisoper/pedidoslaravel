@extends('layouts.public')

@section('contenido')
  
            <div class="card ">
                <div class="card-header">
                    <h3>Crear Productos</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('productos.update', $producto->id)}}" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" name="nombre" id="nombre"  class="form-control" value="{{$producto->nombre}}">
                                <span class="text-danger">{{ $errors->first('nombre') }}</span>
                            </div>
                            <div class="form-group col-md-12">
                                <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="4" value="">{{$producto->descripcion}}</textarea>
                                <span class="text-danger">{{ $errors->first('descripcion') }}</span>
                            </div>
                            <div class="form-group col-md-12">
                            <input type="text" name="codigo" id="codigo"  class="form-control" value="{{ $producto->codigo }}">
                                <span class="text-danger">{{ $errors->first('codigo') }}</span>
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label for="categoriaid"> Categoría </label>
                                <select class="form-control" name="categoriaid" id="categoriaid" placeholder="Buscar categoría">
                                    <option value="">Seleccione Categoría</option>
                                    
                                    @foreach ($categorias   as $categoriaitem)
                                    
                                          <option  value="{{ $categoriaitem->id }}" 
                                              @if ($categoriaitem->id == $producto->categoria_id )
                                              selected ="selected"                                           
                                                       @endif    
                                          >
                                                       {{ $categoriaitem->nombre }}  
                                          </option>                                                    
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('categoriaid') }}</span>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="precio" id="precio"  class="form-control" value="{{$producto->precio}}" >
                                <span class="text-danger">{{ $errors->first('precio') }}</span>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="stock" id="stock"  class="form-control" value="{{$producto->stock}}" >
                                <span class="text-danger">{{ $errors->first('stock') }}</span>
                            </div>
                            <div class="form-group col-12">
                                @csrf
                                {!! method_field('PUT') !!}
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