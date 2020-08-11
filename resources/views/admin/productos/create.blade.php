@extends('layouts.admin.admin')
@can('productos.crear')
@section('contenido')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-11">
                            <h3>Crear Productos</h3>
                        </div>
                        <div class="mb-3 text-center col-1">
                            <a title="Atras" class="" href="{{Route('productos.index')}}">
                                <h4><i class="fas fa-reply "></i></h4>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('productos.store')}}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12 mt-2">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <input type="text" name="nombre" id="nombre" class="form-control"
                                                    placeholder="Producto" value="{{old('nombre')}}">
                                                <small class="text-danger">{{ $errors->first('nombre') }}</small>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <textarea class="form-control" name="descripcion" id="descripcion" cols="30"
                                                    rows="4"
                                                    placeholder="Descripcion de producto">{{old('descripcion')}}</textarea>
                                                <small class="text-danger">{{ $errors->first('descripcion') }}</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-row">
                                            <div class="form-group col-12 ">
                                                <input class="form-control auto " name="categoriasName" id="categoriasName"
                                                    value="{{old('categoriasName')}}" placeholder="Categoría">
                                                <input type="hidden" name="categoriasId" id="categoriasId" value="0">
        
                                                <small class="text-danger">{{ $errors->first('categoriaid') }}</small>
                                            </div>
                                            <div class="form-group col-12">
                                                <input class="form-control" value="{{old('tagName')}}" name="tagName"
                                                    id="tagName" placeholder="Tag">
                                                <input type="hidden" name="tagId" id="tagId" value="0">
                                                <small class="text-danger">{{ $errors->first('tagid') }}</small>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="text" name="codigo" id="codigo" class="form-control"
                                                    placeholder="Código " value="{{old('codigo')}}">
                                                <small class="text-danger">{{ $errors->first('codigo') }}</small>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="number" name="precio" step="0.01" id="precio" class="form-control"
                                                    placeholder="Precio" value="{{old('precio')}}">
                                                <small class="text-danger">{{ $errors->first('precio') }}</small>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="text" name="stock" id="stock" class="form-control"
                                                    placeholder="Stock" value="{{old('stock')}}">
                                                <small class="text-danger">{{ $errors->first('stock') }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <div class="file-loading">
                                    <input id="fotoproducto" name="fotoproducto[]" type="file" multiple accept="image/*">
                                </div>
                                <small class="text-danger">{{ $errors->first('fotoproducto') }}</small>
                            </div>
                            <div class="col-12 mt-5 text-center">
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
</div>


<script>
    $(document).ready(function() {
        $("#fotoproducto").fileinput({
            maxFileCount: 4,
            allowedFileExtensions: ["jpg", "gif", "png", "jpeg"],
            
            browseClass: "btn btn-secondary",
            browseLabel: "Agregar Imágenes",
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