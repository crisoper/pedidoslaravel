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
        // console.log(cestas);

        $("#card_empresa_cart").html();

        let carHTML = "";

        $.each( cestas.data, function( key, cesta ) {
            // console.log(cestas);
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
                <div class="col-12 p-0 mb-5 border_empresa_cart">
                    <div class="row m-0">
                        <div class="col-12 px-0 py-1 card_header_cart">
                            <h6 class="text-truncate text-center my-0">
                                <a href="#">${ cesta.empresa.nombre }</a>
                            </h6>
                            <p class="text-center small my-0">Como mínimo debes comprar S/ 30.00</p>
                        </div>

                        <div class="col-12 pt-4 px-4 pb-3 card_body_cart">
                            <div class="row m-0">
                                <div class="col-12 p-2 mb-3 border_producto_cart">
                                    <div class="row m-0">
                                        <div class="col-2 col-md-2 col-lg-1 p-0 imagen_producto_cart">
                                            ${ fotos }
                                        </div>
                                        <div class="col-10 col-md-6 col-lg-7 p-0 pl-3">
                                            <h6 class="my-0 nombre_producto_cart">${ cesta.producto.nombre }</h6>
                                            <p class="my-0 descripcion_producto_cart"><small>${ cesta.producto.descripcion }</small></p>
                                        </div>
                                        <div class="col-12 col-md-5 col-lg-4 p-0">
                                            <div class="row m-0 text-center">
                                                <div class="col-3 p-0 precio_producto_Cart">
                                                    <h6 class="my-0">Precio</h6>
                                                    <p class="my-0">S/ ${ cesta.producto.precio }</p>
                                                </div>
                                                <div class="col-6 p-0 px-2 cantidad_producto_cart">
                                                    <h6 class="my-0">Cantidad</h6>
                                                    <div class="input-group input_cantidad_producto_cart">
                                                        <button class="input-group-prepend restar sumar_restar_cantidad_producto d-flex justify-content-around">-</button>
                                                        <input type="text" class="form-control input_value_producto_cart" value="${ cesta.cantidad }">
                                                        <button class="input-group-append sumar sumar_restar_cantidad_producto d-flex justify-content-around">+</button>
                                                        <button class="actualizar_producto_cart py-0 px-1 ml-2 hint--top-left hint--success" data-hint="Actualizar cantidad" producto_id="${ cesta.producto.id }" idcesta="${ cesta.id }">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-3 p-0 subtotal_producto_cart">
                                                    <h6 class="my-0">Subtotal</h6>
                                                    <p class="my-0">
                                                        S/ <span class="span_subtotal_producto_cart">${ cesta.cantidad * cesta.producto.precio }</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="btn_eliminar_producto_cart hint--top-left hint--error" data-hint="Eliminar" producto_id="${ cesta.producto.id }">
                                        <i class="fas fa-trash-alt text-light"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
            
                        <div class="col-12 p-3 card_footer_cart">
                            <div class="row m-0">
                                <div class="col-12 col-md-6 col-lg-4 mb-4 px-4">
                                    <form action="#">
                                        <div class="input-group input_group_cupon">
                                            <input type="text" class="input_cupon mt-0 pl-3" placeholder="Ingrese su cupón de descuento">
                                            <div class="input-group-append btn_aplicar_cupon_append">
                                                <a href="#" class="btn btn_aplicar_cupon mt-0">Aplicar</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 content_realizar_pedido_cart">
                                    <div class="row">
                                        <div class="col-12 px-0 pt-2 pb-1 text-center content_resumen_pedido_cart">
                                            <h5><b>Resumen del pedido</b></h5>
                                        </div>
                                        <div class="col-12 mt-3 mb-2">
                                            <div class="row m-0 content_subtotal_pedido_cart">
                                                <div class="col-4"><p>Subtotal</p></div>
                                                <div class="col-8">
                                                    <h6 class="text-right">
                                                        <b>S/ <span class="subtotal_pedido_cart">0.00</span></b>
                                                    </h6>
                                                </div>
                                            </div>
                                            <hr class="mt-0 mb-2">
                                            <div class="row m-0 content_tota_pedido_cart">
                                                <div class="col-4">
                                                    <h5>Total</h5>
                                                </div>
                                                <div class="col-8">
                                                    <h4 class="text-right">
                                                        S/ <span class="total_pedido_cart">0.00</span>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 px-0 pt-2 pb-2 text-center content_btn_realizar_pedido_cart">
                                            <button class="btn_realizar_pedido_cart py-1 mb-2">Realizar Pedido</button>
                                            <br>
                                            <a class="btn btn_seguir_comprando_cart py-1 mb-1" href="#">Seguir Comprando</a>
                                        </div>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                    </div>
                </div>
            `;
        });

        $("#card_empresa_cart").html( carHTML);
        sumarRestarCantidad();
        sumarImportes();
    } 
    

    $("#card_empresa_cart").on("click", ".btn_eliminar_producto_cart", function() {

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
        
        $('.input_cantidad_producto_cart').on('click', '.sumar_restar_cantidad_producto', function () {
            var actualizarProducto = $(this);

            var valorActual = actualizarProducto.parent().find('input').val();

            if (actualizarProducto.hasClass('sumar')) {
                var nuevoValor = parseInt(valorActual) + 1;
            } else {
                if (valorActual > 1) {
                    var nuevoValor = parseInt(valorActual) - 1;
                } else {
                    nuevoValor = 1;
                }
            }



            // if( actualizarProducto.hasClass('sumar') ) {
            //     actualizarCesta( "sumar", nuevoValor, actualizarProducto.attr("idcesta") )
            // }
            // else {
            //     actualizarCesta( "restar", nuevoValor, actualizarProducto.attr("idcesta") )
            // }

            actualizarProducto.parent().find('input').val(nuevoValor);
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
        
        let arrayTotal = $(".border_producto_cart").find(".span_subtotal_producto_cart");

        let sumaTotal = 0;
        $.each(arrayTotal, function (index, caja) {
            sumaTotal = sumaTotal + parseFloat($(caja).html());
        });

        $(".subtotal_pedido_cart").html(sumaTotal.toFixed(2));


        // let delivery = parseFloat($('.deliveryTotal').html());
        // let descuento = parseFloat($('.descuentoTotal').html());


        // $(".total_pedido_cart").html((sumaTotal - delivery + descuento).toFixed(2));
        $(".total_pedido_cart").html((sumaTotal).toFixed(2));

    }

</script>
