
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
                    <div class="form-row">
                    <form action="{{route('productos.update', $producto->id)}}" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                        <div class="col-6 d-flex flex-wrap">
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
                            </div>
                            <div class="col-md-6 col-sm-12">

                                <div class="form-group col-12 mb-4 ">  
                                    
                                    <div style="display: none " >
                                       <input type="file" name="fotoproducto[]" id="fotoproducto" maxlength="250" multiple class="form-control">
                                      
                                    </div>                                              
                                    <input class="btn btn-light border btn-block " type="button" name="cargarfoto" id="cargarfoto" value="Subir imágen">
                                   
                                </div>
                                @php
                                $fotoview=[];
                                    foreach ($producto->fotos as $foto) {                                        
                                        array_push($fotoview , $foto->nombre);  
                                    }
                                  $imgproducto = reset($fotoview);
                                @endphp
                                 
                                <div class="d-flex  flex-wrap text-center">
                                    <div class="col-12">
                                        @if ($imgproducto != null && $exists != null )
                                            <img class='img-thumbnail' src='{{Storage::url('img_productos/'.$imgproducto.'')}}' width='350px' height='300px' id='imgdefault' data-initial-preview='#' accept='image/*'>
                                        @else 
                                            <img class='img-thumbnail' src='{{Storage::url('imgproducto.jpg')}}' width='350px' height='300px' id='imgdefault' data-initial-preview='#' accept='image/*'>
                                        @endif
                                        <img class=" img-thumbnail" src="" width="350px" height="300px" id="imagenmuestra">
                                    </div>
                                    <div class="mt-2">
                                        <div class="border d-flex justify-content-between "  id="preview">
                                            @foreach ($producto->fotos as $foto)    
                                                @if ($imgproducto != null && $exists != null )                                                                                   
                                                    <img class=" img-thumbnail" src=" {{Storage::url('img_productos/'.$foto->nombre.'')}}" width="100px" height="80px" id="iconoimagen">
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    
                                </div>

                            </div>
                        </div>
                        </div>
                            <div class="form-group col-12">
                            <div class="form-group col-12">
                                @csrf
                                {!! method_field('PUT') !!}
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{route('productos.index')}}" class="btn btn-danger">Cancelar</a>
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