@extends('layouts.admin.admin')

@can('productos.listar')
@section('contenido')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">

                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-11">
                            <h3>Productos</h3>
                        </div>
                        <div class="mb-3 text-center col-1">
                            <a title="Ir a principal" class="" href="{{Route('home')}}">
                                <h4><i class="fas fa-reply "></i></h4>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row card-body">
                    <div class="col-12 col-md-9 mb 3">
                        <form id="form-buscar-roles" class="" action="">
                            <div class="input-group">
                                <input type="text" class="form-control rounded-1" placeholder="Buscar"
                                    aria-label="Buscar" autofocus name="buscar" value="{{request()->query('buscar')}}">

                                <div class="input-group-append">
                                    <a href="#" class="btn btn-outline-info"
                                        onclick="event.preventDefault(); document.getElementById('form-buscar-roles').submit();">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-md-3 mb-3 text-right">
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-outline-info dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Operaciones
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <a href="{{ route('productos.create') }}" class="dropdown-item"><i
                                        class="fas fa-plus-square text-success"></i> Crear</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Item</th>
                                        <th>Categoría</th>
                                        <th>Código</th>
                                        <th>Producto</th>
                                        <th>Descripción</th>
                                        <th>Precio</th>
                                        <th>Stock</th>
                                        <th class="text-center">Foto</th>
                                        <th class="text-center" colspan="2">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="tablaProductos">
                                    @foreach ($productos as $producto)
                                    <tr id="{{$producto->id}}">
                                        <td>{{$producto->id}}</td>
                                        <td>
                                            @foreach ($categorias as $categoria)
                                            @if ( $categoria->id== $producto->categoria_id)
                                            {{$categoria->nombre}}
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>{{$producto->codigo}}</td>
                                        <td>{{$producto->nombre}}</td>
                                        <td>{{$producto->descripcion}}</td>
                                        <td>{{$producto->precio}}</td>
                                        <td>{{$producto->stock}}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn_imagenes_producto p-0"
                                                data-toggle="modal" data-target="#modalimagenes" id="{{$producto->id}}">
                                                <i class="far fa-image text-info"></i>
                                            </button>
                                        </td>

                                        <td class="text-center">
                                            <a class="" href="{{route('productos.edit', $producto->id)}}"
                                                title="Editar">
                                                <i class="fas fa-edit" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                       
                                        <td class="text-center">
                                            <form id="form.producto.delete.{{$producto->id}}"
                                                action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                                                {!! method_field('DELETE') !!}
                                                {!! csrf_field() !!}
                                                <a class="text-danger" href="#"
                                                    onclick="event.preventDefault(); document.getElementById('form.producto.delete.{{$producto->id}}').submit();"
                                                    title="Eliminar">
                                                    <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12">
                        {!! $productos->appends(request()->query() )->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="modalimagenes" role="dialog" aria-labelledby="modalimagenesLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalimagenesLabel">Imagenes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row text-center">
                    <div class="col-12" id="preview">
                        
                    </div>

                    <div class="col-12 mt-3">
                        <div class="" id="iconpreview">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(function(){       

        $('#tablaProductos tr').on('click', 'button', function(){
            $('#preview').html("");
            $('#iconpreview').html("");
            
            var id = $(this).attr('id');
            $.ajax({
                url: "{{ route('productos.getImagenes')}}",
                method: 'get',
                dataType: 'json',
                data: {id} ,
                success: ( function(data){
                    $('#preview').html("");
                    $('#iconpreview').html("");
                    
                    let imgpreview = "<img class='img-thumbnail' src='{{URL::to('/') }}/storage/" + data[1][0].url +"' width='350px' height='300px' id='imgdefault' data-initial-preview='#' accept='image/*'>";
                    $('#preview').html(imgpreview);
                    let fotosArray = data[1];
                 
                    $.each(fotosArray, function(index, foto){
                        let iconpreview = "<img class='img-thumbnail' src='{{URL::to('/') }}/storage/" + foto.url +"' width='80px' height='70px' id='"+foto.url+"' data-initial-preview='#' accept='image/*' >";
                        $('#iconpreview').append(iconpreview);
                    });
                }),
                error: function(){
                    $('#preview').html("<span> No existen imagenes de este producto.</span>");
                    // console.log("Error, no se caragaron las imágenes");
                }
            });
        });

        $('body #iconpreview').on('click', 'img', function(){
            var src = $(this).prop('id');
            // console.log(src);
            let iconpreview = "<img class='img-thumbnail' src='{{URL::to('/') }}/storage/" + src +"' width='350px' height='300px' id='imgdefault' data-initial-preview='#' accept='image/*'>";
            $('#preview').html(iconpreview);
        });
        
    });
    
</script>

@endsection

@else
@include('layouts.admin.messenger')
@include('includes.sinpermiso')
@endcan