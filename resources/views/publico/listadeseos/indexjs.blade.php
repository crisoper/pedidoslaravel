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
            carHTML = carHTML + `
                <tr>
                    <td class="imagen">
                        <img src="https://via.placeholder.com/100x100" alt="#">
                    </td>
                    <td class="text-left">
                        <h5 class="text-truncate mt-0 mb-1"><a href="#">${ deseos.producto.nombre }</a></h5>
                        <p class="text-truncate td_product_description my-0">${ deseos.producto.descripcion }</p>
                    </td>
                    <td class="cantidad text-center">
                        <p class="stock_lista_deseos my-0">${ deseos.producto.stock }</p>
                    </td>
                    <td class="text-center">
                        <p class="my-0">S/ ${ deseos.producto.precio }</p>
                    </td>
                    <td class="cantidad text-center">
                        <button class="agregar_producto_delista_apedidos" data-toggle="modal" data-target="#productoTablaListaDeseos">
                            Agregar <i class="fas fa-shopping-basket"></i>
                        </button>
                    </td>
                    <td class="text-center">
                        <button class="eliminarProductoListaDeseos hint--top-left hint--error" data-hint="Eliminar" producto_id="${ deseos.producto.id }">
                            <i class="fas fa-trash-alt text-danger"></i>
                        </button>
                    </td>
                </tr>
            `;
        });

        $("#cuerpoTablaListaDeseos").html( carHTML);
    } 


    $("#cuerpoTablaListaDeseos").on("click", ".eliminarProductoListaDeseos", function() {

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
        
        var proQty = $('.input_group_unit_product');
        proQty.prepend('<button class="minus MoreMinProd"><b>-</b></button>');
        proQty.append('<button class="more MoreMinProd"><b>+</b></button>');
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
