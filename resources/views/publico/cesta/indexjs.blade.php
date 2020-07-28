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
                <div class="col-12 p-2 mb-3 border_producto_cart">
                    <div class="row m-0">
                        <div class="col-2 col-md-1 col-lg-1 col-xl-1 p-0 imagen_producto_cart">
                            ${ fotos }
                        </div>
                        <div class="col-10 col-md-5 col-lg-5 col-xl-6 pl-3">
                            <h6 class="my-0 text-truncate nombre_producto_cart">${ cesta.producto.nombre }</h6>
                            <p class="my-0 text-truncate descripcion_producto_cart"><small>${ cesta.producto.descripcion }</small></p>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 col-xl-5 border_productos_cart">
                            <div class="row m-0 text-center">
                                <div class="col-3 col-sm-4 col-md-4 p-0 precio_producto_Cart">
                                    <h6 class="my-0">Precio</h6>
                                    <p class="my-0">S/ ${ cesta.producto.precio }</p>
                                </div>
                                <div class="col-5 col-sm-4 col-md-4 p-0 px-2 cantidad_producto_cart">
                                    <h6 class="my-0">Cantidad</h6>
                                    <div class="input-group input_cantidad_producto_cart">
                        
                                        <input type="hidden" name="cesta_id[]" value="${ cesta.id }">
                                        <input type="hidden" name="cantidad[]" value="${ cesta.cantidad }">
                                        <input type="hidden" name="precio[]" value="${ cesta.producto.precio }">
                                        <input type="hidden" name="subtotal[]" value="${ (cesta.cantidad * cesta.producto.precio).toFixed(2) }">

                                        <div class="input-group-prepend restar sumar_restar_cantidad_producto d-flex justify-content-around" idempresa="${cesta.empresa.id}" idproducto="${ cesta.producto.id }" id="restar">-</div>
                                        <input type="text" class="form-control input_value_producto_cart" value="${ cesta.cantidad }">
                                        <div class="input-group-append sumar sumar_restar_cantidad_producto d-flex justify-content-around" idempresa="${cesta.empresa.id}" idproducto="${ cesta.producto.id }" id="sumar">+</div>
                                    </div>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4 p-0 subtotal_producto_cart">
                                    <h6 class="my-0">Subtotal</h6>
                                    <p class="my-0">
                                        S/ <span class="span_subtotal_producto_cart">${ (cesta.cantidad * cesta.producto.precio).toFixed(2) }</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn_eliminar_producto_cart hint--top-left hint--error" data-hint="Eliminar" producto_id="${ cesta.producto.id }">
                        <i class="fas fa-trash-alt text-light"></i>
                    </div>
                </div>
            `;
        });

        $("#cuerpoRealizarPedidoCart").html( carHTML);
        sumarRestarCantidad();
        sumarImportes();
    } 
    


    // ACTUALIZAR PRODUCTO CESTA
    function sumarRestarCantidad() {
        
        $('.input_cantidad_producto_cart').on('click', '.sumar_restar_cantidad_producto', function () {
            var actualizarProducto = $(this);

            var valorActual = actualizarProducto.parent().find('.input_value_producto_cart').val();

            if (actualizarProducto.hasClass('sumar')) {
                var nuevoValor = parseInt(valorActual) + 1;
            } else {
                if (valorActual > 1) {
                    var nuevoValor = parseInt(valorActual) - 1;
                } else {
                    nuevoValor = 1;
                }
            }

            actualizarProducto.parent().find('.input_value_producto_cart').val(nuevoValor);
        });
    }

    $(".contenidoPrincipalPagina").on("click", "#restar", function() {
        let btnAgregarCar = $( this );
        let inputCantidad = $( btnAgregarCar ).closest(".input_cantidad_producto_cart").find(".input_value_producto_cart");

        let producto_id = $( btnAgregarCar).attr("idproducto");
        let cantidad = $( inputCantidad).val();
        let empresa_id = $(btnAgregarCar).attr('idempresa');

        if( obtenerLocalStorageclienteID () != false ) {
            actualizar_producto_cesta( producto_id, cantidad, obtenerLocalStorageclienteID (), "cesta", empresa_id, "0" );
        }
    })

    $(".contenidoPrincipalPagina").on("click", "#sumar", function() {
        let btnAgregarCar = $( this );
        let inputCantidad = $( btnAgregarCar ).closest(".input_cantidad_producto_cart").find(".input_value_producto_cart");

        let producto_id = $( btnAgregarCar).attr("idproducto");
        let cantidad = $( inputCantidad).val();
        let empresa_id = $(btnAgregarCar).attr('idempresa');

        if( obtenerLocalStorageclienteID () != false ) {
            actualizar_producto_cesta( producto_id, cantidad, obtenerLocalStorageclienteID (), "cesta", empresa_id, "0" );
        }
    })

    function actualizar_producto_cesta( producto_id, cantidad, storagecliente_id, tipo, empresa_id, estado, btnAgregarCar) {

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
                estado: estado,
            },
            success: function ( data ) {
                obtenerProductosCesta( );
                obtenerProductosCestaMenu( );
            },
            error: function ( jqXHR, textStatus, errorThrown ) {
                console.log(jqXHR.responseJSON);
            }
        });

    }



    // ELIMINAR PRODUCTO DE CESTA
    $("#cuerpoRealizarPedidoCart").on("click", ".btn_eliminar_producto_cart", function() {

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



    // SUMAR IMPORTES DE PEDIDO
    function sumarImportes() {
        
        let arrayTotal = $(".border_producto_cart").find(".span_subtotal_producto_cart");

        let sumaTotal = 0;
        $.each(arrayTotal, function (index, caja) {
            sumaTotal = sumaTotal + parseFloat($(caja).html());
        });

        $(".subtotal_pedido_cart").html(sumaTotal.toFixed(2));


        let delivery = parseFloat($('.delivery_pedido_cart').html());

        $(".total_pedido_cart").html((sumaTotal + delivery).toFixed(2));
        $(".input_total_pedido_cesta").val((sumaTotal + delivery).toFixed(2));

    }

</script>
