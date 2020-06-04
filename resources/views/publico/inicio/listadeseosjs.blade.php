<script>
    
    $("#mostrarProductosListaDeseosMenuFlotante").on("click", function() {
        obtenerProductosListaDeseos( );
    });
    

    //Obtenemos los productos de la cesta


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
                    mostrarProductosListaDeseosMenuFlotante( data )
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });

        }

    }


    function mostrarProductosListaDeseosMenuFlotante( listadeseos ) {


        $("#mostrarProductosListaDeseosMenuFlotanteItems").html();

        let carHTML = "";

        $.each( listadeseos.data, function( key, deseos ) {
            carHTML = carHTML + `
                <div class="col-12 mt-2">
                    <div class="row border_caja_product">
                        <div class="col-2 p-0">
                            <img src="pedidos/img/featured/feature-2.jpg" alt="">
                        </div>
                        <div class="col-6 p-0">
                            <p class="cart_product_nombre text-truncate small mb-0">
                                <a href="#">${ deseos.producto.nombre }</a>
                                </p>
                            <p class="cart_product_description text-truncate small mb-0"><small>${ deseos.producto.descripcion }</small></p>
                        </div>
                        <div class="col-4 p-0">
                            <p class="cart_product_precio small mb-0"><b>s/ ${ deseos.producto.precio }</b></p>
                        </div>
                        <div class="p-0 eliminarProductoListaDeseos" producto_id="${ deseos.producto.id }"><i class="fas fa-trash-alt small"></i></div>
                    </div>
                </div>
            `;
        });

        $("#mostrarProductosListaDeseosMenuFlotanteItems").html( carHTML);
    } 


    $("#mostrarProductosListaDeseosMenuFlotanteItems").on("click", ".eliminarProductoListaDeseos", function() {

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





    //Agregar producto a carrito compras
    $(".contenidoPrincipalPagina").on("click", ".agregar_lista_deseos", function() {

        let btnAgregarCar = $( this );
        let producto_id = $( btnAgregarCar).attr("idproducto");

        if( obtenerLocalStorageclienteID () != false ) {
            
            $( btnAgregarCar, ">", ".fa-heart" ).css('color', '#3eb291');
            $( btnAgregarCar ).addClass("hint--success").attr('data-hint', 'Agregado a mi lista de deseos');

            agregarProducto_ListDeseos( producto_id, obtenerLocalStorageclienteID (), "deseos" );
        }

    })


    function agregarProducto_ListDeseos( producto_id, storagecliente_id, tipo, btnAgregarCar) {

        $.ajax({
            url: "{{ route('listadeseo.store') }}",
            method: 'POST',
            data: {
                storagecliente_id: storagecliente_id,
                tipo: tipo,
                producto_id: producto_id
            },
            success: function ( data ) {
                console.log( $( btnAgregarCar ) );
            },
            error: function ( jqXHR, textStatus, errorThrown ) {
                console.log(jqXHR.responseJSON);
            }
        });

    }


</script>