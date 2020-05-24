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

        let tagsHTML = "";

        $.each( cestas.data, function( key, cesta ) {
            tagsHTML = tagsHTML + `
                <tr>
                    <td class="shoping__cart__item">
                        <img src="img/cart/cart-1.jpg" alt="">
                        <h5>${ cesta.producto.nombre }</h5>
                    </td>
                    <td class="shoping__cart__price">
                        ${ cesta.producto.precio }
                    </td>
                    <td class="shoping__cart__quantity">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="text" value="${ cesta.cantidad }">
                            </div>
                        </div>
                    </td>
                    <td class="shoping__cart__total">
                        ${ cesta.cantidad * cesta.producto.precio }
                    </td>
                    <td class="shoping__cart__item__close">
                        <span class="icon_close eliminarProductoCesta" producto_id="${ cesta.producto.id }" ></span>
                    </td>
                </tr>
            `;
        });

        $("#cuerpoTablaCarritoCompras").html( tagsHTML);
    } 


    $("#cuerpoTablaCarritoCompras").on("click", ".eliminarProductoCesta", function() {

        let btnEliminar = $( this );

        if( obtenerLocalStorageclienteID () != false ) {
            
            $.ajax({
                url: "{{ route('cesta.delete') }}",
                method: 'POST',
                data: {
                    _method:"DELETE",
                    storagecliente_id: obtenerLocalStorageclienteID (),
                    tipo: "cesta",
                    producto_id: $( btnEliminar ).attr("producto_id"),
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

</script>