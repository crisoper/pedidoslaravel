<script>
    
    $("#mostrarProductosCestaMenuFlotante").on("mouseover", function() {
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


        $("#mostrarProductosCestaMenuFlotanteItems").html();

        let carHTML = "";

        $.each( cestas.data, function( key, cesta ) {
            carHTML = carHTML + `
                <div class="col-12 mt-2">
                    <div class="row border_caja_product">
                        <div class="col-2 p-0">
                            <img src="pedidos/img/featured/feature-2.jpg" alt="">
                        </div>
                        <div class="col-6 p-0">
                            <p class="cart_product_description small mb-0">${ cesta.producto.nombre }</p>
                        </div>
                        <div class="col-4 p-0">
                            <p class="cart_product_precio small text-success mb-0"><b>s/ ${ cesta.producto.precio }</b></p>
                            <small class="mt-0 mb-0">x${ cesta.cantidad }</small>
                        </div>
                        <div class="eliminar_compra p-0 eliminarProductoCestaMenu" producto_id="${ cesta.producto.id }"><i class="fas fa-trash-alt small"></i></div>
                    </div>
                </div>
            `;
        });

        $("#mostrarProductosCestaMenuFlotanteItems").html( carHTML);
    } 


    $("#mostrarProductosCestaMenuFlotanteItems").on("click", ".eliminarProductoCestaMenu", function() {

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





    //Agregar producto a carrito compras
    $(".contenidoPrincipalPagina").on("click", ".agregar_cart", function() {

        let btnAgregarCar = $( this );
        let inputCantidad = $( btnAgregarCar ).closest(".container_product_cart").find(".input_value_cart");
        let producto_id = $( btnAgregarCar).attr("idproducto");
        let cantidad = $( inputCantidad).val();

        if( obtenerLocalStorageclienteID () != false ) {
            
            $( btnAgregarCar ).html("Agregado.... <i class='fa fa-eye'></i>");

            agregarProducto_Canasta( producto_id, cantidad, obtenerLocalStorageclienteID (), "cesta" );
        }

    })


    function agregarProducto_Canasta( producto_id, cantidad, storagecliente_id, tipo, btnAgregarCar) {

        $.ajax({
            url: "{{ route('cesta.store') }}",
            method: 'POST',
            data: {
                storagecliente_id: storagecliente_id,
                tipo: tipo,
                producto_id: producto_id,
                cantidad: cantidad
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