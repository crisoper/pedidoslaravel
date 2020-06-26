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
                                        <th class="text-center" colspan="3">Acciones</th>
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
                                                <i class="fas fa-eye text-info"></i>
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
                                         
                                        <td class="text-center " id="btn_ofertarproducto">
                                            @if ( in_array( $producto->id, $arrayofertas) )
                                            <button type="button" class="btn badge badge-warning badge-pill"
                                                data-toggle="modal" data-target="#ModalOfertas" title="Ofertar producto"
                                                nombreproducto="{{ $producto->nombre }}" idproducto="{{$producto->id}}" value="En Ofertar">En Oferta</button>
                                            @else
                                            <button type="button" class="btn badge badge-success badge-pill"
                                                data-toggle="modal" data-target="#ModalOfertas" title="Ofertar producto"
                                                nombreproducto="{{ $producto->nombre }}" idproducto="{{$producto->id}}">
                                                Ofertar
                                            </button>

                                            @endif
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
<div class="modal fade" id="ModalOfertas" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalOfertasLabel">Ofertar producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="formularioProductoOfertas">
                    <div class="form-group">
                        <label for="nombreproducto">Producto: </label>
                        <span id="nombreproducto" class="text-primary text-center"></span>
                        <input type="hidden" name="idproducto" id="idproducto" value="">
                        <input type="hidden" name="idoferta" id="idoferta" value="">
                    </div>
                    <div class="form-row">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success" id="basic-addon3">Precio de oferta</span>
                            </div>
                            <input class="form-control" type="text" name="preciooferta" id="preciooferta"
                                placeholder="s/">
                        </div>

                    </div>

                    <div class="form-row d-flex justify-content-around">
                        <div class="form-group">
                            <label for="fechainicio">Fecha de inicio: </label><br>
                            <input class="form-control" type="date" name="diainicio" id="diainicio"><br>
                            <input class="form-control" type="time" name="horainicio" id="horainicio">
                        </div>
                        <div class="form-group">
                            <label for="fechafin">Fecha de fin: </label><br>
                            <input class="form-control" type="date" name="diafin" id="diafin"><br>
                            <input class="form-control" type="time" name="horafin" id="horafin">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                @csrf
                <div class="form-group col-12">
                    <button type="submit" id="btn_guardaroferta" class="btn btn-primary btn-block" value="Guardar Oferta">Guardar Oferta</button>
                </div>
                <div class="form-group col-12 d-flex">
                    <button type="button" id="btn_emininardeofertas" class="form-control btn btn-secondary  col-6 mr-1" data-dismiss="modal">Eliminar de Ofertas</button>
                    <button type="button" id="btn_cancelarregistro" class="form-control btn btn-danger col-6 " data-dismiss="modal">Cancelar</button>
                </div>
            </div>
            </form>
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
                        <div class="border" id="iconpreview">
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
                        let iconpreview = "<img class='img-thumbnail' src='{{URL::to('/') }}/storage/" + foto.url +"' width='100px' height='80px' id='"+foto.url+"' data-initial-preview='#' accept='image/*' >";
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

        $("#btn_cancelarregistro").on('click', function( event){
            event.preventDefault();
            $('#formularioProductoOfertas')[0].reset();
            $('#ModalOfertas').modal('hide');
        });

        $('#tablaProductos #btn_ofertarproducto').on('click', 'button', function(){
         
            if ( $(this).attr('value') == 'En Ofertar' ) {
                    $("#nombreproducto").html( "<h4> "+$(this).attr('nombreproducto')+"</h4>");          
                    $("#idproducto").val( $(this).attr('idproducto'));          
                    $('#ModalOfertas').modal( {backdrop: "static"} );
                    $('#btn_guardaroferta').html('Editar Oferta');
                    $('#btn_guardaroferta').val('Editar Oferta');
                    
            $.ajax({
                url:  "{{ route('productos.ofertas.editar') }}",
                dataType: "json",
                method: 'get',
                data: {idproducto: $(this).attr('idproducto')},
                success: function (data) {                 

                    $('#preciooferta').val(data.preciooferta);
                    $('#diainicio').val(data.diainicio);
                    $('#horainicio').val(data.horainicio);
                    $('#diafin').val(data.diafin);
                    $('#horafin').val(data.horafin);
                    $('#idoferta').val(data.id);
                    
                }
            });
                
            } else {
                $('#btn_guardaroferta').html('Guardar Oferta');
                $('#btn_guardaroferta').val('Guardar Oferta');
                $("#nombreproducto").html( "<h4> "+$(this).attr('nombreproducto')+"</h4>");          
                $("#idproducto").val( $(this).attr('idproducto'));          
                $('#ModalOfertas').modal( {backdrop: "static"} );
            }

        });

        $("#btn_guardaroferta").on('click', function(){
 
            if ( $(this).val() == 'Editar Oferta') {
                    $('#formularioProductoOfertas').on('submit', function (event) {
                    event.preventDefault();
                    
                        $.ajax({
                           url: "{{ route('productos.ofertas.update') }}",
                           dataType: "json",
                           method: "post",
                           contentType: false,
                           cache: false,
                           processData: false,                        
                           data: new FormData(this),
                        success: function(){
                          
                            $('#ModalOfertas').modal('hide');
                            datoguardadocorrectamente();    
                        },
                        error: function( jqXHR, textStatus, errorThrown  ){
                            if( jqXHR.status == 422 ){
                                console.log("No se ha registrado la oferta");
                            }
                            else if( jqXHR.status == 404 ) {
                                console.log("Pagina no encontrada");
                            }
                         }
                     })
                 });

             }
             else
             {
                $('#formularioProductoOfertas').on('submit', function (event) {
                        event.preventDefault();
                        $.ajax({
                            url: "{{ route('productos.ofertas') }}",
                            dataType: "json",
                            method: "post",
                            contentType: false,
                                cache: false,
                                processData: false,

                            data: new FormData(this),
                            success: function(){
                                console.log("Oferta registrada");
                                $('#ModalOfertas').modal('hide');
                              
                                datoguardadocorrectamente();                 
                            },
                                error:  function( jqXHR, textStatus, errorThrown ) {
                                if( jqXHR.status == 404 ) 
                                {

                                }
                                else if( jqXHR.status == 422 ) 
                                {
                                    GLOBARL_settearErroresEnCampos( jqXHR, "formularioProductoOfertas" );
                                }
                            }
                        });
                    });
                }
            });

             $("#btn_emininardeofertas").on('click', function( event ){
             event.preventDefault();
             $.ajax({
                url: "{{ route('productos.ofertas.eliminar') }}",
                dataType: "json",
                method: "post",
                data:{ ofertaid: $('#idoferta').val() },
                success: function(){
                    console.log("Oferta eliminada");
                    location. reload();
                    
                    // $('#btn_ofertarproducto').attr('class', 'btn badge badge-warning badge-pill');
                    $('#formularioProductoOfertas')[0].reset();
                    $('#ModalOfertas').modal('hide');

                },
                error: function( jqXHR, textStatus, errorThrown  ){
                    if( jqXHR.status == 422 ){
                        console.log("No se ha registrado la oferta");
                        }
                        else if( jqXHR.status == 404 ) {
                            console.log("Pagina no encontrada");
                        }
                }
                })
             });

             function GLOBARL_settearErroresEnCampos( jqXHR, idElementoContenedorCampos ) {

                    //Mostramos errores devueltos desde Backend
                    let errorsRespuesta = jqXHR.responseJSON.errors;

                    $.each( errorsRespuesta, function( idElemento, arrayErrores ) {
                    
                        $( "#" + idElemento ).addClass("is-invalid");
                            arrayErrores.forEach( error => {
                            MostrarNotificaciones(error ,  'error') ;
                            
                        });
                    
                    });

                    //Ocultamos los errores despues de 5 segundos
                    setTimeout( function() {
                    
                        $("#" + idElementoContenedorCampos).find(".is-invalid").removeClass("is-invalid");
                    }, 5000);

            }
            function datoguardadocorrectamente() {

                        bootbox.alert({
                            message: "La oferta se ha registrado correctamente!",
                            callback: function () {
                                $('#formularioProductoOfertas')[0].reset();
                                  location. reload();   
                            }
                        })
                    }
                    

            
  
         
    });
    
</script>

@endsection

@else
@include('layouts.admin.messenger')
@include('includes.sinpermiso')
@endcan