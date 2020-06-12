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
                <tr>
                    <td class="imagen">
                        <div class="cart_product_foto">
                            ${ fotos }
                        </div>
                    </td>
                    <td class="text-left">
                        <h5 class="text-truncate mt-0 mb-1"><a href="#">${ cesta.producto.nombre }</a></h5>
                        <p class="text-truncate td_product_description my-0">${ cesta.producto.descripcion }</p>
                    </td>
                    <td class="text-center">
                        <p class="my-0">S/ ${ cesta.producto.precio }</p>
                    </td>
                    <td class="cantidad text-center">
                        <div class="input_group_unit_product border m-0">
                            <input type="text" class="text-center input_value_cartcart" value="${ cesta.cantidad }">
                        </div>
                    </td>
                    <td class="text-center">
                        <p class="my-0">S/ <span class="precioTotalProductos">${ cesta.cantidad * cesta.producto.precio }</span></p>
                    </td>
                    <td class="text-center">
                        <button class="eliminarProductoCestaTabla hint--top-left hint--error" data-hint="Eliminar" producto_id="${ cesta.producto.id }">
                            <i class="fas fa-trash-alt text-danger"></i>
                        </button>
                    </td>
                </tr>
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
