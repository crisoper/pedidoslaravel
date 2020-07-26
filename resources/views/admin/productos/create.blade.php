@extends('layouts.admin.admin')
@can('productos.crear')
@section('contenido')
<style>
    .boxSep {
        display: flex;
        background-color: #ffffff;
        border: 1px solid rgb(255, 255, 255);

        float: left;
        width: 90%;
        align-items: center;
        justify-content: center;
        color: rgb(0, 0, 0);
        border-radius: 5px;
    }

    #iconoMas {
        z-index: 2;
        font-size: 20px;
        border: #ddd solid 1px;
        width: 40px;
        height: 40px;
        border-radius: 5px;
        float: left;

    }

    #iconoMas>i {
        font-size: 20px;
        color: rgb(168, 168, 168);
    }

    #iconoMas>i:hover {
        font-size: 30px;
        color: blue;

    }
</style>
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
                            <div class="col-12 col-lg-6">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <input type="text" name="nombre" id="nombre" class="form-control"
                                            placeholder="Producto" value="{{old('nombre')}}">
                                        <span class="text-danger">{{ $errors->first('nombre') }}</span>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <textarea class="form-control" name="descripcion" id="descripcion" cols="30"
                                            rows="3"
                                            placeholder="Descripcion de producto">{{old('descripcion')}}</textarea>
                                        <span class="text-danger">{{ $errors->first('descripcion') }}</span>
                                    </div>
                                    <div class="form-group col-12 ">
                                        <input class="form-control auto " name="categoriasName" id="categoriasName"
                                            value="{{old('categoriasName')}}" placeholder="Categoría">
                                        <input type="hidden" name="categoriasId" id="categoriasId" value="0">

                                        <span class="text-danger">{{ $errors->first('categoriaid') }}</span>
                                    </div>
                                    <div class="form-group col-12">
                                        <input class="form-control" value="{{old('tagName')}}" name="tagName"
                                            id="tagName" placeholder="Tag">
                                        <input type="hidden" name="tagId" id="tagId" value="0">
                                        <span class="text-danger">{{ $errors->first('tagid') }}</span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" name="codigo" id="codigo" class="form-control"
                                            placeholder="Código " value="{{old('codigo')}}">
                                        <span class="text-danger">{{ $errors->first('codigo') }}</span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="number" name="precio" step="0.01" id="precio" class="form-control"
                                            placeholder="Precio" value="{{old('precio')}}">
                                        <span class="text-danger">{{ $errors->first('precio') }}</span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" name="stock" id="stock" class="form-control"
                                            placeholder="Stock" value="{{old('stock')}}">
                                        <span class="text-danger">{{ $errors->first('stock') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-5 mx-auto" id="products_border">
                                <div class="form-row">
                                    <div class="form-group col-12 col-md-11 mb-3 mx-auto d-flex flex-column">
                                        <div class="d-flex flex-column">


                                            <input class="btn btn-light border btn-block mt-2" type="button"
                                                name="cargarfoto" id="cargarfoto" value="Subir imágen">
                                                <figcaption class="text-danger"><small><i>Tamaño recomendado: 200 x
                                                    200px</i></small> </figcaption>

                                            <input type="file" name="fotoproducto[]" id="fotoproducto" multiple>                                 </div>
                                            <input type="file" name="fotos[]" id="fotos" multiple >
                                    </div>
                                    <div class="col-12 text-center mt-3">
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

@endsection


@section('scripts')
@include('admin.productos.js');
@endsection
@else
@include('includes.sinpermiso')
@endcan