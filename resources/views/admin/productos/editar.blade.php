
@extends('layouts.admin.admin')

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-11">
                            <h3>Editar Productos</h3>                          
                        </div>
                        <div class="mb-3 text-center col-1">
                            <a title="Atras" class="" href="{{Route('productos.index')}}"><h4><i class="fas fa-reply "></i></h4></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('productos.update', $producto->id)}}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="nombre" class="mb-1"><small>Nombre:</small></label>
                                        <input type="text" name="nombre" id="nombre"  class="form-control" value="{{$producto->nombre}}">
                                        <span class="text-danger">{{ $errors->first('nombre') }}</span>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="descripcion" class="mb-1"><small>Descripción:</small></label>
                                        <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="3" value="">{{$producto->descripcion}}</textarea>
                                        <span class="text-danger">{{ $errors->first('descripcion') }}</span>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="categoriaid" class="mb-1"><small>Categoría:</small></label>
                                        <select class="form-control" name="categoriaid" id="categoriaid" placeholder="Buscar categoría">
                                            <option value="">Seleccione Categoría</option>
                                            @foreach ($categorias as $categoriaitem)
                                                <option value="{{ $categoriaitem->id }}" @if ($categoriaitem->id == $producto->categoria_id ) selected="selected" @endif>
                                                    {{ $categoriaitem->nombre }}
                                                </option>                                                    
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('categoriaid') }}</span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="codigo" class="mb-1"><small>Código:</small></label>
                                        <input type="text" name="codigo" id="codigo"  class="form-control" value="{{ $producto->codigo }}">
                                        <span class="text-danger">{{ $errors->first('codigo') }}</span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="precio" class="mb-1"><small>Precio:</small></label>
                                        <input type="text" name="precio" id="precio"  class="form-control" value="{{$producto->precio}}" >
                                        <span class="text-danger">{{ $errors->first('precio') }}</span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="stock" class="mb-1"><small>Stock:</small></label>
                                        <input type="text" name="stock" id="stock"  class="form-control" value="{{$producto->stock}}" >
                                        <span class="text-danger">{{ $errors->first('stock') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-5 mx-auto" id="products_border">
                                <div class="form-row">
                                    <div class="form-group col-12 col-md-11 mb-3 mt-4 mx-auto">
                                        <div style="display: none">
                                           <input type="file" name="fotoproducto[]" id="fotoproducto" maxlength="250" multiple class="form-control">
                                        </div>                                              
                                        <input class="btn btn-light border btn-block " type="button" name="cargarfoto" id="cargarfoto" value="Actualizar imagen">
                                    </div>
    
                                    @php
                                    $fotoview=[];
                                        foreach ($producto->fotos as $foto) {                                        
                                            array_push($fotoview , $foto->nombre);  
                                        }
                                      $imgproducto = reset($fotoview);
                                    @endphp
    
                                    <div class="form-group text-center col-12">
                                        @if ($imgproducto != null && $exists != null )
                                            <img class='img-thumbnail' src='{{Storage::url('img_productos/'.$imgproducto.'')}}' width='350px' height='300px' id='imgdefault' data-initial-preview='#' accept='image/*'>
                                        @else 
                                            <img class='img-thumbnail' src='{{Storage::url('imgproducto.jpg')}}' width='350px' height='300px' id='imgdefault' data-initial-preview='#' accept='image/*'>
                                        @endif
                                        <img class=" img-thumbnail" src="" width="350px" height="300px" id="imagenmuestra">
                                    </div>
                                    <div class="form-group mx-auto col-12">
                                        <div class="d-flex justify-content-center" id="preview">
                                            @foreach ($producto->fotos as $foto)
                                                @if ( $imgproducto != null && $exists != null )
                                                    <img class="img-thumbnail border" src="{{Storage::url('img_productos/'.$foto->nombre.'')}}" width="90px" height="80px" id="iconoimagen">
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 text-center mt-3">
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
</div>

@endsection
@section('scripts')
    @include('admin.productos.js');

@endsection