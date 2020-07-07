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
                            <p class="text-truncate text-center my-0">
                                <a class="nombre_empresa_cesta_menu" href="${ cesta.producto.empresa_url }">${ cesta.producto.empresa }</a>
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
                                    
                                    <div class="row m-0 border_cantidad_precio_cesta_menu">
                                        <div class="col-4">
                                            <input class="input_cantidad_producto_cesta_menu" type="hidden" name="" value="${ cesta.cantidad }">
                                            <p class="m-0 cantidad_producto_cesta_menu">
                                                x${ cesta.cantidad }
                                            </p>
                                        </div>
                                        <div class="col-8">
                                            <p class="m-0 precio_producto_cesta_menu">S/ ${ cesta.producto.precio }</p>
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
    }



    // AGREGAR PRODUCTO A CESTA
    $(".contenidoPrincipalPagina").on("click", ".agregar_cart", function() {
        let btnAgregarCar = $( this );
        let inputCantidad = $( btnAgregarCar ).closest(".container_product_cart").find(".input_value_cart");
        let producto_id = $( btnAgregarCar).attr("idproducto");
        let cantidad = $( inputCantidad).val();
        let empresa_id = $(btnAgregarCar).attr('idempresa');

        if( obtenerLocalStorageclienteID () != false ) {
            agregar_producto_a_cesta( producto_id, cantidad, obtenerLocalStorageclienteID (), "cesta", empresa_id );
        }
    })

    $(".contenidoPrincipalPagina").on("click", ".product_aggregate_cesta", function() {
        let btnAgregarCar = $( this );
        let inputCantidad = $( btnAgregarCar ).closest(".container_product_cart").find(".input_value_cart");
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
        
        let arrayTotalProductos = $("#cuerpo_productos_cesta_menu").find(".input_cantidad_producto_cesta_menu");

        let sumaTotalProductos = 0;
        $.each(arrayTotalProductos, function (index, cantidad) {
            sumaTotalProductos = sumaTotalProductos + parseFloat($(cantidad).val());
        });

        if ($(".cantidad_cesta_menu").html() <= 9) {
            $(".cantidad_cesta_menu").html(sumaTotalProductos);
        } else {
            $(".cantidad_cesta_menu").html('9+');
        }


    }


</script>