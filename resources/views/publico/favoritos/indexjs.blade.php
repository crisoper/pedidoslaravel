<script>
    
    //Obtenemos los productos de la cesta
    obtenerProductosListaDeseos( );


    function obtenerProductosListaDeseos( tipo = "deseos" ) {

        if( obtenerLocalStorageclienteID () != false ) {
            
            $.ajax({
                url: "{{ route('listadeseo.index') }}",
                method: 'GET',
                data: {
                    storagecliente_id: obtenerLocalStorageclienteID (),
                    tipo: tipo,
                },
                success: function ( data ) {
                    mostrarProductosPaginaListaDeseos( data )
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });

        }

    }


    function mostrarProductosPaginaListaDeseos( listadeseos ) {
        $("#cuerpoTablaListaDeseos").html();

        let carHTML = "";

        $.each( listadeseos.data, function( key, deseos ) {

            let fotos = '';

            let contador = 0; 

            $.each( deseos.producto.fotos, function( key, foto ) {
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
                                <div class="col-3 col-md-2 col-lg-3 p-0 cart_product_foto_lista">
                                    ${ fotos }
                                </div>
                                <div class="col-9 col-md 10 col-lg-9">
                                    <p class="my-0 nombre_produc_detalle">${ deseos.producto.nombre }</p>
                                    <p class="my-0 descripcion_produc_detalle"><small>${ deseos.producto.descripcion }</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-5 column_detalle_pedido_2">
                            <div class="row text-center">
                                <div class="col-3 p-0 padding_column_listadeseos">
                                    <p class="prec_cant_subt my-0">Stock</p>
                                    <p class="my-0">${ deseos.producto.stock }</p>
                                </div>
                                <div class="col-4 p-0 padding_column_listadeseos">
                                    <p class="prec_cant_subt my-0">Precio</p>
                                    <p class="my-0">S/ ${ deseos.producto.precio }</p>
                                </div>
                                <div class="col-3 col-sm-4 p-0 px-2 padding_column_agregar">
                                    <button class="agregar_producto_delista_apedidos" data-toggle="modal" data-target="#productoTablaListaDeseos">
                                        <span class="agregar_btn_modal">Agregar</span> <i class="fas fa-shopping-basket"></i>
                                    </button>
                                </div>
                                <div class="col-2 col-sm-1 p-0 botones_detalle_listadeseos">
                                    <button class="eliminarProductodeseosTabla hint--top-left hint--error" data-hint="Eliminar" producto_id="${ deseos.producto.id }">
                                        <i class="fas fa-trash-alt text-danger"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });

        $("#cuerpoTablaListaDeseos").html( carHTML);
    } 


    $("#cuerpoTablaListaDeseos").on("click", ".eliminarProductodeseosTabla", function() {

        let spanEliminar = $( this );

        if( obtenerLocalStorageclienteID () != false ) {
            
            $.ajax({
                url: "{{ route('listadeseo.delete') }}",
                method: 'POST',
                data: {
                    _method:"DELETE",
                    storagecliente_id: obtenerLocalStorageclienteID (),
                    tipo: "deseos",
                    producto_id: $( spanEliminar ).attr("producto_id"),
                },
                success: function ( data ) {
                    obtenerProductosListaDeseos( );
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
                var newVal = parseFloat(oldValue) + 1;
            } else {
                // Don't allow decrementing below zero
                if (oldValue > 1) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 1;
                }
            }
            $button.parent().find('input').val(newVal);
        });
    }
    

</script>
