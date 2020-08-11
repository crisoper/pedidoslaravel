
@extends('layouts.admin.admin')
@can('productos.editar')
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
                            <div class="col-12 mt-2">
                                <div class="row">
                                    <div class="col-12 col-md-6">
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
                                            <div class="form-group col-12 ">
                                                <label for="precio" class="mb-1"><small>Categoria:</small></label>
                                                <input  class="form-control" name="categoriasName" id="categoriasName"  value="{{$producto->categoria->nombre}}" placeholder="Categoría">
                                                <input type="hidden" name="categoriasId" id="categoriasId" value="{{$producto->categoria->id}}">
                                                <span class="text-danger">{{ $errors->first('categoriaid') }}</span>
                                            </div>
                                            <div class="form-group col-12">
                                                <label for="precio" class="mb-1"><small>Tags:</small></label>
                                                <input  class="form-control"  value="{{$tag->nombre}}" name="tagName" id="tagName" placeholder="Tag">
                                                <input type="hidden" name="tagId" id="tagId" value="{{$tag->id}}">
                                                <span class="text-danger">{{ $errors->first('tagid') }}</span>
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
                                    <div class="col-12 col-md-6">
                                        <div class="form-row" id="previewImg">
                                            @php
                                            $fotoview=[];
                                                foreach ($producto->fotos as $foto) {                                        
                                                    array_push($fotoview , $foto->nombre);  
                                                }
                                                $imgproducto = reset($fotoview);
                                            @endphp
                                            <div class="form-group text-center col-12 mb-0">
                                                <label class="mb-0"><small>Imagenes actuales:</small></label>
                                            </div>
                                            <div class="form-group text-center col-12 mt-0 mb-1" id="imagen_principal">
                                                @if ( $imgproducto != null && $exists != null )
                                                    <img id="imgdefault" src="{{Storage::url('img_productos/'.$imgproducto.'')}}" data-zoom-image="{{Storage::url('img_productos/'.$imgproducto.'')}}" width='350px' height='300px'/>
                                                @else 
                                                    <img id="imgdefault" src="{{Storage::url('imgproducto.jpg')}}" data-zoom-image="{{Storage::url('imgproducto.jpg')}}" width='350px' height='300px'/>
                                                @endif
                                            </div>
                                            <div class="form-group text-center col-12" id="imagenes_producto_edit">
                                                @foreach ($producto->fotos as $foto)
                                                    @if ( $imgproducto != null && $exists != null )
                                                        <a href="#" data-image="{{Storage::url('img_productos/'.$foto->nombre.'')}}" data-zoom-image="{{Storage::url('img_productos/'.$foto->nombre.'')}}">
                                                            <img id="imgdefault" src="{{Storage::url('img_productos/'.$foto->nombre.'')}}" width="80px" height="70px">
                                                        </a>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-row">
                                    <div class="col-12">
                                        <label for="stock" class="mb-1"><small>Nuevas Imágenes:</small></label>
                                        <div class="file-loading">
                                            <input id="fotoproducto" name="fotoproducto[]" type="file" multiple accept="image/*">
                                        </div>
                                        <small class="text-danger">{{ $errors->first('fotoproducto') }}</small>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12 mt-5 text-center">
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



<script>
    $('#imgdefault').ezPlus({
        gallery: 'previewImg', 
        cursor: 'pointer', 
        galleryActiveClass: 'active',
        zoomType: false,
    });


    $(document).ready(function() {
        $("#fotoproducto").fileinput({
            maxFileCount: 4,
            allowedFileExtensions: ["jpg", "gif", "png", "jpeg"],
            
            browseClass: "btn btn-secondary",
            browseLabel: "Agregar Nuevas Imágenes",
            browseIcon: "<i class=\"glyphicon glyphicon-picture\"></i> ",

            removeClass: "btn btn-warning",
            removeLabel: "Eliminar Imágenes",
            removeIcon: "<i class=\"glyphicon glyphicon-trash\"></i> ",

            uploadClass: "btn btn-info",
            uploadLabel: "Upload",
            uploadIcon: "<i class=\"glyphicon glyphicon-upload\"></i> ",
            
            // showCaption: false,
            // showRemove: false,
            showUpload: false,
            theme: "fas",
            language: "es",
        });
    });
</script>

@endsection


@else
    @include('includes.sinpermiso')
@endcan
