<script>
    
    //Obtenemos los productos de la cesta
    obtenerProductosCesta( );


    function obtenerProductosCesta( tipo = "cesta" ) {

        if( obtenerLocalStorageclienteID () != false ) {
            
            $.ajax({
                url: "{{ route('cesta.index') }}",
                method: 'GET',
                data: {
                    storagecliente_id: obtenerLocalStorageclienteID (),
                    tipo: tipo,
                },
                success: function ( data ) {
                    mostrarProductosPaginaCarrito( data )
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });

        }

    }


    function mostrarProductosPaginaCarrito( cestas ) {
        $("#cuerpoTablaCarritoCompras").html();

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
                <div class="col-12 mb-3" id="contenido_producto_detalle_pedido">
                    <div class="row p-2">
                        <div class="col-md-12 col-lg-7 column_detalle_pedido_1">
                            <div class="row">
                                <div class="col-3 col-md-2 col-lg-3 p-0 cart_product_foto">
                                    ${ fotos }
                                </div>
                                <div class="col-9 col-md 10 col-lg-9">
                                    <p class="my-0 nombre_produc_detalle">${ cesta.producto.nombre }</p>
                                    <p class="my-0 descripcion_produc_detalle"><small>${ cesta.producto.descripcion }</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-5 column_detalle_pedido_2">
                            <div class="row text-center">
                                <div class="col-4 p-0 padding_column_detalle_pedido">
                                    <p class="prec_cant_subt my-0">Precio</p>
                                    <p class="my-0">S/ ${ cesta.producto.precio }</p>
                                </div>
                                <div class="col-4 p-0 px-2 cantidad_detalle padding_column_detalle_pedido">
                                    <p class="prec_cant_subt my-0">Cantidad</p>
                                    <div class="input_group_unit_product border m-0">
                                        <button class="minus MoreMinProd" idcesta="${ cesta.id }"><b>-</b></button>
                                        <input type="text" class="text-center input_value_cartcart" value="${ cesta.cantidad }">
                                        <button class="more MoreMinProd" idcesta="${ cesta.id }"><b>+</b></button>
                                    </div>
                                </div>
                                <div class="col-4 p-0 padding_column_detalle_pedido">
                                    <p class="prec_cant_subt my-0">Subtotal</p>
                                    <p class="my-0">
                                        S/ <span class="precioTotalProductos">${ cesta.cantidad * cesta.producto.precio }</span>
                                    </p>
                                </div>
                                <div class="col-12 p-0 botones_detalle_pedido">
                                    <button class="eliminarProductoCestaTabla hint--top-left hint--error" data-hint="Eliminar" producto_id="${ cesta.producto.id }">
                                        <i class="fas fa-trash-alt text-danger"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });

        $("#cuerpoTablaCarritoCompras").html( carHTML);
        sumarRestarCantidad();
        sumarImportes();
    } 
    

    $("#cuerpoTablaCarritoCompras").on("click", ".eliminarProductoCestaTabla", function() {

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
                    obtenerProductosCesta( );
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });

        }

    });

    
    function sumarRestarCantidad() {
        
        $('.input_group_unit_product').on('click', '.MoreMinProd', function () {
            var $button = $(this);
            var oldValue = $button.parent().find('input').val();
            if ($button.hasClass('more')) {
                var newVal = parseInt(oldValue) + 1;
            } else {
                // Don't allow decrementing below zero
                if (oldValue > 1) {
                    var newVal = parseInt(oldValue) - 1;
                } else {
                    newVal = 1;
                }
            }



            if( $button.hasClass('more') ) {
                actualizarCesta( "sumar", newVal, $button.attr("idcesta") )
            }
            else {
                actualizarCesta( "restar", newVal, $button.attr("idcesta") )
            }

            $button.parent().find('input').val(newVal);
        });
    }


    function actualizarCesta( _action, _cantidad, _idcesta ) {

        console.log( _action, _cantidad, _idcesta);

        // $.ajax({
        //     url: "{{ route('cesta.store') }}",
        //     method: 'POST',
        //     data: {
        //         _method:"UPDATE",
        //         storagecliente_id: obtenerLocalStorageclienteID (),
        //         tipo: "cesta",
        //         action: _action, 
        //         cantidad: _cantidad, 
        //         idcesta: _idcesta
        //     },
        //     success: function ( data ) {
        //         obtenerProductosCesta( );
        //     },
        //     error: function ( jqXHR, textStatus, errorThrown ) {
        //         console.log(jqXHR.responseJSON);
        //     }
        // });

    }
    

    function sumarImportes() {
        
        let arrayTotal = $("#cuerpoTablaCarritoCompras").find(".precioTotalProductos");

        let sumaTotal = 0;
        $.each(arrayTotal, function (index, caja) {
            sumaTotal = sumaTotal + parseFloat($(caja).html());
        });

        $(".sumaTotal").html(sumaTotal.toFixed(2));


        let delivery = parseFloat($('.deliveryTotal').html());
        let descuento = parseFloat($('.descuentoTotal').html());


        $(".pedidoTotal").html((sumaTotal - delivery + descuento).toFixed(2));

    }

</script>
