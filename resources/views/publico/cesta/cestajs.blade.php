<script>


    $(document).ready( function() {
        obtenerProductosCestaMenu( );
    });


    $("#mostrar_cesta_menu").on("click", function() {
        obtenerProductosCestaMenu( );
    });



    // OBTENIENDO PRODUCTOS DE CESTA
    function obtenerProductosCestaMenu( tipo = "cesta" ) {

        if( obtenerLocalStorageclienteID () != false ) {
            
            $.ajax({
                url: "{{ route('cesta.index') }}",
                method: 'GET',
                data: {
                    storagecliente_id: obtenerLocalStorageclienteID (),
                    tipo: tipo,
                },
                success: function ( data ) {
                    mostrarProductosCestaMenu( data )
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });

        }

    }

    function mostrarProductosCestaMenu( cestas ) {

        $("#cuerpo_productos_cesta_menu").html();

        let carHTML = "";

        $.each( cestas.data, function( key, cesta ) {

            let fotos = '';

            let contador = 0; 

            $.each( cesta.producto.fotos, function( key, foto ) {
                contador++
                if (contador >= 2) {
                    fotos = fotos + `<img src="${ foto.url }" alt="${ foto.nombre }" class="hover_img">`;
                } else {
                    fotos = fotos + `<img src="${ foto.url }" alt="${ foto.nombre }" class="m-0">`;
                }
            });

            carHTML = carHTML + `
                <div class="col-12 mb-3">
                    <div class="card border_producto_cesta_menu">
                        <div class="card-header p-0">
                            <p class="nombre_empresa_cesta_menu text-truncate text-center my-0">
                                ${ cesta.producto.empresa }
                            </p>
                        </div>
                        <div class="card-body p-1">
                            <div class="row m-0">
                                <div class="col-3 p-0">
                                    <div class="foto_producto_cesta_menu">
                                        ${ fotos }
                                    </div>
                                </div>
                                <div class="col-9 p-0 pl-2">
                                    <p class="nombre_producto_cesta_menu text-truncate my-0">${ cesta.producto.nombre }</p>
                                    <p class="descripcion_producto_cesta_menu text-truncate my-0">${ cesta.producto.descripcion }</p>
                                </div>
                                    
                                <div class="col-12 p-0 mt-1 border_dashed_cesta_menu">
                                    <div class="row m-0 text-center">
                                        <div class="col-4 py-1 px-0">
                                            <p class="my-0 small"><b>Precio</b></p>
                                            <p class="my-0">
                                                S/ <span class="precio_cesta_menu">${ cesta.producto.precio }</span>
                                            </p>
                                        </div>
                                        <div class="col-4 py-1 px-1 border_dashed_cesta_menu_2">
                                            <p class="my-0 small"><b>Cantidad</b></p>
                                            <div class="input-group input_cantidad_cesta_menu">
                                
                                                <input type="hidden" name="cesta_id[]" value="${ cesta.id }">
                                                <input type="hidden" name="cantidad[]" value="${ cesta.cantidad }">
                                                <input type="hidden" name="precio[]" value="${ cesta.producto.precio }">
                                                <input type="hidden" name="subtotal[]" value="${ (cesta.cantidad * cesta.producto.precio).toFixed(2) }">

                                                <div class="input-group-prepend restar sumar_restar_cantidad_producto d-flex justify-content-around" idempresa="${cesta.empresa.id}" idproducto="${ cesta.producto.id }" id="restar">-</div>
                                                <input type="text" class="form-control input_value_cesta_menu" value="${ cesta.cantidad }">
                                                <div class="input-group-append sumar sumar_restar_cantidad_producto d-flex justify-content-around" idempresa="${cesta.empresa.id}" idproducto="${ cesta.producto.id }" id="sumar">+</div>
                                            </div>
                                        </div>
                                        <div class="col-4 py-1 px-0">
                                            <p class="my-0 small"><b>Subtotal</b></p>
                                            <p class="my-0">
                                                S/ <span class="subtotal_producto_cesta_menu">${ (cesta.cantidad * cesta.producto.precio).toFixed(2) }</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="eliminar_producto_cesta_menu hint--bottom-left hint--error" data-hint="Eliminar" producto_id="${ cesta.producto.id }">
                            <i class="fas fa-trash-alt"></i>
                        </div>
                    </div>
                </div>
            `;
        });

        $("#cuerpo_productos_cesta_menu").html( carHTML);
        sumar_cantidad_boton_cesta_menu();
        sumarRestarCantidad_cest_menu();
        sumarImportes();
    }



    // AGREGAR PRODUCTO A CESTA
    $(".contenidoPrincipalPagina").on("click", ".agregar_cart", function() {
        let btnAgregarCar = $( this );
        let inputCantidad = $( btnAgregarCar ).closest(".container_producto_modal").find(".input_value_cart");
        let producto_id = $( btnAgregarCar).attr("idproducto");
        let cantidad = $( inputCantidad).val();
        let empresa_id = $(btnAgregarCar).attr('idempresa');

        if( obtenerLocalStorageclienteID () != false ) {
            agregar_producto_a_cesta( producto_id, cantidad, obtenerLocalStorageclienteID (), "cesta", empresa_id );
        }
    })

    $(".contenidoPrincipalPagina").on("click", ".product_aggregate_cesta", function() {
        let btnAgregarCar = $( this );
        let inputCantidad = $( btnAgregarCar ).closest(".container_producto_modal").find(".input_value_cart");
        let producto_id = $( btnAgregarCar).attr("idproducto");
        let cantidad = $( inputCantidad).val();
        let empresa_id = $(btnAgregarCar).attr('idempresa');

        if( obtenerLocalStorageclienteID () != false ) {
            agregar_producto_a_cesta( producto_id, cantidad, obtenerLocalStorageclienteID (), "cesta", empresa_id );
        }
        
    })

    function agregar_producto_a_cesta( producto_id, cantidad, storagecliente_id, tipo, empresa_id, btnAgregarCar) {

        $.ajax({
            url: "{{ route('cesta.store') }}",
            method: 'POST',
            data: {
                storagecliente_id: storagecliente_id,
                tipo: tipo,
                producto_id: producto_id,
                cantidad: cantidad,
                empresa_id: empresa_id,
            },
            success: function ( data ) {
                obtenerProductosCestaMenu( );
                // console.log( $( btnAgregarCar ) );
                $('#abrir_modal_producto_inicio').modal('hide')
                Swal.fire({
                    // position: 'top-center',
                    icon: 'success',
                    title: 'Producto agregado a cesta',
                    showConfirmButton: false,
                    timer: 1500
                })
            },
            error: function ( jqXHR, textStatus, errorThrown ) {
                console.log(jqXHR.responseJSON);
            }
        });

    }



    // ACTUALIZAR PRODUCTO CESTA
    function sumarRestarCantidad_cest_menu() {
        
        $('.input_cantidad_cesta_menu').on('click', '.sumar_restar_cantidad_producto', function () {
            var actualizarProducto = $(this);

            var valorActual = actualizarProducto.parent().find('.input_value_cesta_menu').val();

            if (actualizarProducto.hasClass('sumar')) {
                var nuevoValor = parseInt(valorActual) + 1;
            } else {
                if (valorActual > 1) {
                    var nuevoValor = parseInt(valorActual) - 1;
                } else {
                    nuevoValor = 1;
                }
            }

            actualizarProducto.parent().find('.input_value_cesta_menu').val(nuevoValor);
        });
    }

    $(".contenidoPrincipalPagina").on("click", "#restar", function() {
        let btnAgregarCar = $( this );
        let inputCantidad = $( btnAgregarCar ).closest(".input_cantidad_cesta_menu").find(".input_value_cesta_menu");

        let producto_id = $( btnAgregarCar).attr("idproducto");
        let cantidad = $( inputCantidad).val();
        let empresa_id = $(btnAgregarCar).attr('idempresa');

        if( obtenerLocalStorageclienteID () != false ) {
            actualizar_producto_cesta( producto_id, cantidad, obtenerLocalStorageclienteID (), "cesta", empresa_id );
        }
    })

    $(".contenidoPrincipalPagina").on("click", "#sumar", function() {
        let btnAgregarCar = $( this );
        let inputCantidad = $( btnAgregarCar ).closest(".input_cantidad_cesta_menu").find(".input_value_cesta_menu");

        let producto_id = $( btnAgregarCar).attr("idproducto");
        let cantidad = $( inputCantidad).val();
        let empresa_id = $(btnAgregarCar).attr('idempresa');

        if( obtenerLocalStorageclienteID () != false ) {
            actualizar_producto_cesta( producto_id, cantidad, obtenerLocalStorageclienteID (), "cesta", empresa_id );
        }
    })

    function actualizar_producto_cesta( producto_id, cantidad, storagecliente_id, tipo, empresa_id, btnAgregarCar) {

        $.ajax({
            url: "{{ route('cesta.update') }}",
            method: 'POST',
            data: {
                _method:"PUT",
                storagecliente_id: storagecliente_id,
                tipo: tipo,
                producto_id: producto_id,
                cantidad: cantidad,
                empresa_id: empresa_id,
            },
            success: function ( data ) {
                obtenerProductosCestaMenu( );
                // console.log( $( btnAgregarCar ) );
            },
            error: function ( jqXHR, textStatus, errorThrown ) {
                console.log(jqXHR.responseJSON);
            }
        });

    }



    // ELIMINAR PRODUCTO DE CESTA
    $("#cuerpo_productos_cesta_menu").on("click", ".eliminar_producto_cesta_menu", function() {

        let spanEliminar = $( this );

        if( obtenerLocalStorageclienteID () != false ) {
            
            $.ajax({
                url: "{{ route('cesta.delete') }}",
                method: 'POST',
                data: {
                    _method:"DELETE",
                    storagecliente_id: obtenerLocalStorageclienteID (),
                    tipo: "cesta",
                    producto_id: $( spanEliminar ).attr("producto_id"),
                },
                success: function ( data ) {
                    obtenerProductosCestaMenu( );
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });

        }

    });



    // AGREGAR CANTIDAD EN BOTON CESTA
    function sumar_cantidad_boton_cesta_menu() {
        
        let arrayTotalProductos = $("#cuerpo_productos_cesta_menu").find(".border_producto_cesta_menu").length;

        // let sumaTotalProductos = 0;
        // $.each(arrayTotalProductos, function (index, cantidad) {
        //     sumaTotalProductos = sumaTotalProductos + parseFloat($(cantidad).val());
        // });

        if ($(".cantidad_cesta_menu").html() <= 9) {
            $(".cantidad_cesta_menu").html(arrayTotalProductos);
        } else {
            $(".cantidad_cesta_menu").html('9+');
        }


    }



    // SUMAR IMPORTES DE PEDIDO
    function sumarImportes() {
        
        let arrayTotal = $(".border_producto_cesta_menu").find(".subtotal_producto_cesta_menu");

        let sumaTotal = 0;
        $.each(arrayTotal, function (index, caja) {
            sumaTotal = sumaTotal + parseFloat($(caja).html());
        });

        $(".subtotal_pedido_cesta_menu").html(sumaTotal.toFixed(2));


        let delivery = parseFloat($('.delivery_pedido_cesta_menu').html());
        // let descuento = parseFloat($('.descuentoTotal').html());


        $(".total_pedido_cesta_menu").html((sumaTotal + delivery).toFixed(2));
        $(".input_total_pedido_cesta_menu").val((sumaTotal + delivery).toFixed(2));
        // $(".total_pedido_cart").html((sumaTotal).toFixed(2));

    }



    // REALIZAR PEDIDO CESTA MENU
    $(document).ready( function() {
        
        $(".btn_realizar_pedido_cesta_menu").on("click", function( e ) {
            e.preventDefault();

            let buttonGuardar = this;

            $.ajax({
                method: "POST",
                url: $("#formNavDetallePedidoCestaMenu").attr("action"),
                dataType: "json",
                data: $("#formNavDetallePedidoCestaMenu").serialize() ,
                success: function( data ) {

                    // $( buttonGuardar ).prop( "disabled", false ).find("span").hide();
                    // GLOBARL_MostrarNotificaciones( data.success, "info" );
                    // mesajeDatosActualizados( ) ;
                    
                    Swal.fire({
                        // position: 'top-center',
                        icon: 'success',
                        title: 'Tu pedido fue realizado con exito',
                        showConfirmButton: false,
                        timer: 1500
                    })

                },
                error : function ( jqXHR, textStatus, errorThrown ) {

                    $( buttonGuardar ).prop( "disabled", false ).find("span").hide();
                    GLOBARL_MostrarNotificaciones( "Error, actualice la pagina y vuelva a intentarlo", "error" );
                    console.log( jqXHR );
                }
            });
        });

    });

</script>