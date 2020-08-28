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
                            <h3>Recomendar Productos</h3>
                        </div>
                        <div class="mb-3 text-center col-1">
                            <a title="Ir a principal" class="" href="{{Route('home')}}">
                                <h4><i class="fas fa-reply "></i></h4>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row card-body">
                    <div class="col-12 col-md-12 mb-3">
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
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Item</th>
                                        {{-- <th>Local</th> --}}
                                        <th>Código</th>
                                        <th>Producto</th>
                                        <th class="text-center">Ofertado</th>
                                        <th class="text-center">Ofertar</th>
                                    </tr>
                                </thead>
                                <tbody id="tabla_productos_ofertar">
                                    @foreach ($productos as $producto)
                                        <tr>
                                            <td>{{$producto->id}}</td>
                                            {{-- <td>{{$producto->empresa->nombre}}</td> --}}
                                            <td>{{$producto->codigo}}</td>
                                            <td>{{$producto->nombre}}</td>
                                            <td class="text-center">
                                                @foreach ($productosofertados as $ofertar)
                                                    @if ($producto->id == $ofertar->producto_id)
                                                        @if ( ($ofertar->diainicio <= date('Y-m-d')) && ($ofertar->diafin >= date('Y-m-d')) )
                                                            <p class="m-0 text-success">Ofertado <i class="fas fa-check-circle"></i></p>
                                                        @elseif ( $ofertar->diainicio > date('Y-m-d') )
                                                            <p class="m-0 text-warning">
                                                                Empieza el {{date('d-m-Y', strtotime($ofertar->diainicio))}}
                                                            </p>
                                                        @elseif ( $ofertar->diafin < date('Y-m-d') )
                                                            <p class="m-0 text-danger"></p>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="text-center">
                                                @if ( (in_array( $producto->id, $arrayrecomendar)) )
                                                    <button type="button" class="btn badge badge-secondary badge-pill btn_modal_ofertar" data-toggle="modal" data-target="#modal_ofertar" idproducto="{{$producto->id}}">
                                                        Ofertar
                                                    </button>
                                                @else
                                                    <button type="button" class="btn badge badge-secondary badge-pill btn_modal_ofertar" data-toggle="modal" data-target="#modal_ofertar" idproducto="{{$producto->id}}">
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
<div class="modal fade" id="modal_ofertar" tabindex="-1" role="dialog" aria-labelledby="modal_ofertar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light row m-0 py-2">
                <div class="col-11 p-0 mx-auto">
                    <h5 class="text-center mb-0 mt-1" id="nombre_empresa_recomendar"> </h5>
                </div>
                <div class="col-1 p-0">
                    <button type="button" class="close_modal_ofertar p-0" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="modal-body row m-0">
                <div class="col-12 p-0">
                    <div class="row content_ofertar_producto_modal">

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

        // MOSTRAR PRODUCTO EN MODAL X ID
        $("#tabla_productos_ofertar").on("click", ".btn_modal_ofertar", function() {

            let btn = $( this );

            $.ajax({
                url: "{{ route('ajax.productos.getdatosxidofertar') }}",
                method: 'GET',
                data: {
                    idproducto: $( btn ).attr("idproducto")
                },
                success: function ( data ) {
                    llenarDatosModalProductoDetalle( data );
                    // console.log(data.data);
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });

        });

        function llenarDatosModalProductoDetalle( data ) {
            
            // console.log(data);

            let productoModalHTML = "";


            if ( (data.data.oferta_diainicio <= data.data.diaactual) && (data.data.oferta_diafin >= data.data.diaactual) ) {
                productoModalHTML = productoModalHTML + `
                    <div class="col-12">
                        <div class="row container_recomendar_producto_modal">
                            <div class="col-12">
                                <p class="" id="nombre_recomendar_producto_modal">
                                    <b>Producto:</b> ${data.data.nombre}
                                </p>
                                <p class="" id="nombre_recomendar_producto_modal">
                                    <b>Precio Normal:</b> ${data.data.precio}
                                </p>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success">Precio de oferta</span>
                                    </div>
                                    <input class="form-control" type="text" name="preciooferta" id="preciooferta" placeholder="S/" value="${data.data.oferta}">
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="diainicio">Inicio</label>
                                <input type="date" name="diainicio" id="diainicio" value="${data.data.oferta_diainicio}">
                            </div>
                            <div class="col-6">
                                <label for="diafin">Fín</label>
                                <input type="date" name="diafin" id="diafin" value="${data.data.oferta_diafin}"  placeholder="${data.data.oferta_diafin}">
                            </div>
                            <div class="col-12"><hr class=""></div>
                            <div class="col-6 content_btn_recomendar_producto_modal">
                                <button class="actualizar_recomendar_producto_modal" idproducto="${ data.data.id }" idempresa="${ data.data.empresa_id }">
                                    Actualizar oferta
                                </button>
                            </div>
                            <div class="col-6 content_btn_favoritos_modal">
                                <button class="eliminar_recomendacion_producto_modal" idproducto="${ data.data.id }" idempresa="${ data.data.empresa_id }">
                                    Eliminar de oferta
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            } else if (data.data.oferta_diainicio > data.data.diaactual) {
                productoModalHTML = productoModalHTML + `
                    <div class="col-12">
                        <div class="row container_recomendar_producto_modal">
                            <div class="col-12">
                                <p class="" id="nombre_recomendar_producto_modal">
                                    <b>Producto:</b> ${data.data.nombre}
                                </p>
                                <p class="" id="nombre_recomendar_producto_modal">
                                    <b>Precio Normal:</b> ${data.data.precio}
                                </p>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success">Precio de oferta</span>
                                    </div>
                                    <input class="form-control" type="text" name="preciooferta" id="preciooferta" placeholder="S/" value="${data.data.oferta}">
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="diainicio">Inicio</label>
                                <input type="date" name="diainicio" id="diainicio" value="${data.data.oferta_diainicio}">
                            </div>
                            <div class="col-6">
                                <label for="diafin">Fín</label>
                                <input type="date" name="diafin" id="diafin" value="${data.data.oferta_diafin}" placeholder="${data.data.oferta_diafin}">
                            </div>
                            <div class="col-12"><hr class=""></div>
                            <div class="col-6 content_btn_recomendar_producto_modal">
                                <button class="actualizar_recomendar_producto_modal" idproducto="${ data.data.id }" idempresa="${ data.data.empresa_id }">
                                    Actualizar oferta
                                </button>
                            </div>
                            <div class="col-6 content_btn_favoritos_modal">
                                <button class="eliminar_recomendacion_producto_modal" idproducto="${ data.data.id }" idempresa="${ data.data.empresa_id }">
                                    Eliminar de oferta
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            } else {
                productoModalHTML = productoModalHTML + `
                    <div class="col-12">
                        <div class="row container_recomendar_producto_modal">
                            <div class="col-12">
                                <p class="" id="nombre_recomendar_producto_modal">
                                    <b>Producto:</b> ${data.data.nombre}
                                </p>
                                <p class="" id="nombre_recomendar_producto_modal">
                                    <b>Precio Normal:</b> ${data.data.precio}
                                </p>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success">Precio de oferta</span>
                                    </div>
                                    <input class="form-control" type="text" name="preciooferta" id="preciooferta" placeholder="S/" value="${data.data.oferta}">
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="diainicio">Inicio</label>
                                <input type="date" name="diainicio" id="diainicio" value="${data.data.oferta_diainicio}">
                            </div>
                            <div class="col-6">
                                <label for="diafin">Fín</label>
                                <input type="date" name="diafin" id="diafin" value="${data.data.oferta_diafin}" placeholder="${data.data.oferta_diafin}">
                            </div>
                            <div class="col-12"><hr class=""></div>
                            <div class="col-12 content_btn_recomendar_producto_modal">
                                <button class="btn_recomendar_producto_modal" idproducto="${ data.data.id }" idempresa="${ data.data.empresa_id }">
                                    Ofertar Producto
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            }
            $(".content_ofertar_producto_modal").html( productoModalHTML );


            let empresaModalHTML = "";
            empresaModalHTML = empresaModalHTML + `
                <p class="m-0">${data.data.empresa}</p>
            `;
            $("#nombre_empresa_recomendar").html( empresaModalHTML );

        }


        $(".contenidoPrincipalPaginaAdmin").on("click", ".btn_recomendar_producto_modal", function() {
            let btnAgregarCar = $( this );
            let producto_id = $( btnAgregarCar).attr("idproducto");
            let empresa_id = $(btnAgregarCar).attr('idempresa');
            let preciooferta = $(btnAgregarCar).closest(".container_recomendar_producto_modal").find("#preciooferta").val();
            let diainicio = $(btnAgregarCar).closest(".container_recomendar_producto_modal").find("#diainicio").val();
            let diafin = $(btnAgregarCar).closest(".container_recomendar_producto_modal").find("#diafin").val();

            recomendar_producto( producto_id, empresa_id, preciooferta, diainicio, diafin);
        })

        $(".contenidoPrincipalPaginaAdmin").on("click", ".actualizar_recomendar_producto_modal", function() {
            let btnAgregarCar = $( this );
            let producto_id = $( btnAgregarCar).attr("idproducto");
            let empresa_id = $(btnAgregarCar).attr('idempresa');
            let preciooferta = $(btnAgregarCar).closest(".container_recomendar_producto_modal").find("#preciooferta").val();
            let diainicio = $(btnAgregarCar).closest(".container_recomendar_producto_modal").find("#diainicio").val();
            let diafin = $(btnAgregarCar).closest(".container_recomendar_producto_modal").find("#diafin").val();

            recomendar_producto( producto_id, empresa_id, preciooferta, diainicio, diafin);
        })

        function recomendar_producto( producto_id, empresa_id, preciooferta, diainicio, diafin, btnAgregarCar) {

            $.ajax({
                url: "{{ route('productosofertar.update') }}",
                method: 'POST',
                data: {
                    producto_id: producto_id,
                    empresa_id: empresa_id,
                    preciooferta: preciooferta,
                    diainicio: diainicio,
                    diafin: diafin,
                },
                success: function ( data ) {
                    // obtenerProductosCestaMenu( );
                    // Swal.fire({
                    //     icon: 'success',
                    //     title: 'Producto asignado como recomendado',
                    //     showConfirmButton: true,
                    //     // timer: 1500
                    // })
                    $('#modal_ofertar').modal('hide')
                    
                    location.reload();
                    // console.log( $( btnAgregarCar ) );
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });

        }



        // ELIMINAR PRODUCTO DE CESTA
        $(".contenidoPrincipalPaginaAdmin").on("click", ".eliminar_recomendacion_producto_modal", function() {

            let spanEliminar = $( this );
            
            $.ajax({
                url: "{{ route('productosofertar.destroy') }}",
                method: 'POST',
                data: {
                    _method:"DELETE",
                    producto_id: $( spanEliminar ).attr("idproducto"),
                    empresa_id: $( spanEliminar ).attr("idempresa"),
                },
                success: function ( data ) {
                    // obtenerProductosCestaMenu( );
                    location.reload();
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });

        });

    });
</script>
@endsection

@else
    @include('layouts.admin.messenger')
    @include('includes.sinpermiso')
@endcan