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
            carHTML = carHTML + `
            
                <tr>
                    <td class="image" data-title="No"><img src="https://via.placeholder.com/100x100" alt="#"></td>
                    <td class="product-des" data-title="Description">
                        <p class="product-name"><a href="#">${ cesta.producto.nombre }</a></p>
                        <p class="product-des">${ cesta.producto.descripcion }</p>
                    </td>
                    <td class="price" data-title="Price"><span>${ cesta.producto.precio }</span></td>
                    <td class="qty" data-title="Qty">
                        <div class="input_group_unit_product border m-0">
                            <input type="text" class="text-center" value="${ cesta.cantidad }">
                        </div>
                    </td>
                    <td class="total-amount" data-title="Total"><span>${ cesta.cantidad * cesta.producto.precio }</span></td>
                    <td class="action" data-title="Remove">
                        <span class="icon_close eliminarProductoCesta" producto_id="${ cesta.producto.id }" ><i class="fas fa-trash-alt small"></i></span>
                    </td>
                </tr>
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
                        <span class="icon_close eliminarProductoCesta" producto_id="${ cesta.producto.id }" >x</span>
                    </td>
                </tr>
            `;
        });

        $("#cuerpoTablaCarritoCompras").html( carHTML);
    } 


    $("#cuerpoTablaCarritoCompras").on("click", ".eliminarProductoCesta", function() {

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

</script>