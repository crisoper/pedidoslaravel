<script>


$(document).ready( function() {
    obtenerProductosCesta( );
});


$("#mostrarProductosCestaMenuFlotante").on("click", function() {
    obtenerProductosCesta( );
});



//Obtenemos los productos de la cesta
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
                mostrarProductosCestaMenuFlotante( data )
            },
            error: function ( jqXHR, textStatus, errorThrown ) {
                console.log(jqXHR.responseJSON);
            }
        });

    }

}


function mostrarProductosCestaMenuFlotante( cestas ) {


    $("#cuerpoCestaPedido").html();

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
            <div class="col-12 mb-3" id="contenido_producto_cesta">
                <div class="row p-1 contenido_producto_cesta">
                    <div class="col-md-12 column_detalle_cesta_1">
                        <div class="row">
                            <div class="col-3 col-md-2 col-lg-3 p-0 imagen_producto_cesta">
                                ${ fotos }
                            </div>
                            <div class="col-9 col-md 10 col-lg-9">
                                <p class="mt-0 mb-1 nombre_produc_cesta">${ cesta.producto.nombre }</p>
                                <p class="my-0 descripcion_produc_cesta"><small>${ cesta.producto.descripcion }</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 column_detalle_cesta_2">
                        <div class="row text-center">
                            <div class="col-4 px-0 py-2 padding_column_cesta">
                                <p class="my-0"><b>Precio</b></p>
                                <p class="my-0">S/ ${ cesta.producto.precio }</p>
                            </div>
                            <div class="col-4 px-0 py-2 px-2 padding_column_cesta_1">
                                <p class="my-0"><b>Cantidad</b></p>
                                <div class="input-group input_group_cant_prod_cesta">
                                    
                                    <input type="hidden" name="cesta_id[]" value="${ cesta.id }">
                                    <input type="hidden" name="cantidad[]" value="${ cesta.cantidad }">
                                    <input type="hidden" name="precio[]" value="${ cesta.producto.precio }">
                                    <input type="hidden" name="subtotal[]" value="${ (cesta.cantidad * cesta.producto.precio).toFixed(2) }">

                                    <button class="input-group-prepend restar sumarRestarProducto" idcesta="${ cesta.id }">-</button>
                                    <input type="text" class="form-control input_value_cartcart" value="${ cesta.cantidad }">
                                    <button class="input-group-append sumar sumarRestarProducto" idcesta="${ cesta.id }">+</button>
                                </div>
                            </div>
                            <div class="col-4 px-0 py-2 padding_column_cesta">
                                <p class="my-0"><b>Subtotal</b></p>
                                <p class="my-0">
                                    S/ <span class="precioTotalProductos">${ (cesta.cantidad * cesta.producto.precio).toFixed(2) }</span>
                                </p>
                            </div>
                            <div class="col-12 p-0 content_btn_eliminar">
                                <button class="eliminar_producto_cesta hint--bottom-left hint--error" data-hint="Eliminar" producto_id="${ cesta.producto.id }">
                                    <i class="fas fa-trash-alt text-danger"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    });

    $("#cuerpoCestaPedido").html( carHTML);
    sumarRestarCantidad();
    sumarImportesCesta();
    marginProductosCesta();
}

//Sumar o Restar cantidad de productos en cesta
function sumarRestarCantidad() {
    
    $('.input_group_cant_prod_cesta').on('click', '.sumarRestarProducto', function () {
        var botonSumarRestar = $(this);
        var oldValue = botonSumarRestar.parent().find('input').val();
        if (botonSumarRestar.hasClass('sumar')) {
            var newVal = parseInt(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 1) {
                var newVal = parseInt(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }

        
        if( botonSumarRestar.hasClass('sumar') ) {
            actualizarCesta( "sumar", newVal, botonSumarRestar.attr("idcesta") )
        }
        else {
            actualizarCesta( "restar", newVal, botonSumarRestar.attr("idcesta") )
        }

        botonSumarRestar.parent().find('input').val(newVal);
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

// Eliminar producto de cesta
$("#cuerpoCestaPedido").on("click", ".eliminar_producto_cesta", function() {

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


//Agregar producto a cesta
$(".contenidoPrincipalPagina").on("click", ".agregar_cart", function() {
    let btnAgregarCar = $( this );
    let inputCantidad = $( btnAgregarCar ).closest(".container_product_cart").find(".input_value_cart");
    let producto_id = $( btnAgregarCar).attr("idproducto");
    let cantidad = $( inputCantidad).val();
    let empresa_id = $(btnAgregarCar).attr('idempresa');

    if( obtenerLocalStorageclienteID () != false ) {
        agregarProducto_Canasta( producto_id, cantidad, obtenerLocalStorageclienteID (), "cesta", empresa_id );
    }
})

$(".contenidoPrincipalPagina").on("click", ".product_aggregate_cesta", function() {
    let btnAgregarCar = $( this );
    let inputCantidad = $( btnAgregarCar ).closest(".container_product_cart").find(".input_value_cart");
    let producto_id = $( btnAgregarCar).attr("idproducto");
    let cantidad = $( inputCantidad).val();
    let empresa_id = $(btnAgregarCar).attr('idempresa');

    if( obtenerLocalStorageclienteID () != false ) {
        agregarProducto_Canasta( producto_id, cantidad, obtenerLocalStorageclienteID (), "cesta", empresa_id );
    }
})

function agregarProducto_Canasta( producto_id, cantidad, storagecliente_id, tipo, empresa_id, btnAgregarCar) {

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
            obtenerProductosCesta( );
            console.log( $( btnAgregarCar ) );
        },
        error: function ( jqXHR, textStatus, errorThrown ) {
            console.log(jqXHR.responseJSON);
        }
    });

}


// Sumar o restar cantidad de producto en cesta
function sumarImportesCesta() {
    
    let arrayTotalProductos = $("#cuerpoCestaPedido").find(".input_value_cartcart");

    let sumaTotalProductos = 0;
    $.each(arrayTotalProductos, function (index, cantidad) {
        sumaTotalProductos = sumaTotalProductos + parseFloat($(cantidad).val());
    });

    $(".sumaTotalProductos").html(sumaTotalProductos);
    $(".suma_productos_Cesta").html(sumaTotalProductos);
    

    if ($(".cantidad_menu_pedido").html() <= 9) {
        $(".cantidad_menu_pedido").html(sumaTotalProductos);
    } else {
        $(".cantidad_menu_pedido").html('9+');
    }


    let arrayTotalPrecio = $("#cuerpoCestaPedido").find(".precioTotalProductos");
    let sumaTotaPrecio = 0;
    $.each(arrayTotalPrecio, function (index, caja) {
        sumaTotaPrecio = sumaTotaPrecio + parseFloat($(caja).html());
    });

    $(".sumaTotal").html(sumaTotaPrecio.toFixed(2));
    $(".suma_total_prev").html(sumaTotaPrecio.toFixed(2));
    $(".precio_menu_pedido").html(sumaTotaPrecio.toFixed(2));


    let delivery = parseFloat($('.deliveryTotal').html());
    let descuento = parseFloat($('.descuentoTotal').html());


    $(".pedidoTotal").html((sumaTotaPrecio - delivery + descuento).toFixed(2));

}


function marginProductosCesta() {
    let marginProductosCesta = $('.contenido_producto_cesta').length;

    var cestaResponsive = $(window).width();
    
    if (cestaResponsive >= 1201){
        if (marginProductosCesta == 1) {
            $('#scroll_cesta').height(185);
        }
        else if (marginProductosCesta == 2) {
            $('#scroll_cesta').height(340);
        }
        else if (marginProductosCesta == 3) {
            $('#scroll_cesta').height(485);
        }
        else {
            $('#scroll_cesta').height(92+'%');
        }
    }
    if ((cestaResponsive >= 769) && (cestaResponsive <= 1200)){
        if (marginProductosCesta == 1) {
            $('#scroll_cesta').height(185);
        }
        else if (marginProductosCesta == 2) {
            $('#scroll_cesta').height(340);
        }
        else {
            $('#scroll_cesta').height(90+'%');
        }
    }
    if (cestaResponsive <= 768){
        if (marginProductosCesta == 1) {
            $('#scroll_cesta').height(185);
        }
        else if (marginProductosCesta == 2) {
            $('#scroll_cesta').height(340);
        }
        else {
            $('#scroll_cesta').height(85+'%');
        }
    }

    
}



</script>