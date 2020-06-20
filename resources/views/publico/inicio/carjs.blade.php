
<script>
    
    $("#mostrarProductosCestaMenuFlotante").on("click", function() {
        obtenerProductosCesta( );
        marginCestaMenu();
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
                <div class="col-12 mt-2">
                    <div class="row border_caja_product mb-1">
                        <div class="col-2 p-0">
                            <div class="cart_product_foto">
                                ${ fotos }
                            </div>
                        </div>
                        <div class="col-6 p-0 pl-2">
                            <p class="cart_product_nombre text-truncate small mb-0">
                                <a href="#">${ cesta.producto.nombre }</a>
                            </p>
                            <p class="cart_product_description text-truncate small mb-0">
                                <small>${ cesta.producto.descripcion }</small>
                            </p>
                        </div>
                        <div class="col-4 p-0">
                            <p class="cart_product_precio small mb-0"><b>s/ ${ cesta.producto.precio }</b></p>
                            <small class="mt-0 mb-0">
                                x<span class="CantidadProductoCestaMenu">${ cesta.cantidad }</span>
                            </small>

                            <input type="hidden" class="precioProductoCestaMenu" value="${ cesta.producto.precio * cesta.cantidad }">
                        </div>
                        <div class="eliminar_compra p-0 eliminarProductoCestaMenu" producto_id="${ cesta.producto.id }"><i class="fas fa-trash-alt small"></i></div>
                    </div>
                </div>
            `;
        });

        $("#mostrarProductosCestaMenuFlotanteItems").html( carHTML);
        sumarImportesCestaMenu();
        marginCestaMenu();
    }

    function marginCestaMenu() {
        let contarDrpdownCartHeader = $('.border_caja_product').length;
        if (contarDrpdownCartHeader == 3) {
            $('.border_caja_product').parents('.dropdown_cart_header').css('padding-bottom', '60px');
        }
        else if (contarDrpdownCartHeader == 2) {
            $('.border_caja_product').parents('.dropdown_cart_header').css('padding-bottom', '127px');
        }
        else {
            $('.border_caja_product').parents('.dropdown_cart_header').css('padding-bottom', '0px');
        }
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
            
            agregarProducto_Canasta( producto_id, cantidad, obtenerLocalStorageclienteID (), "cesta" );
        }

    })
    $(".contenidoPrincipalPagina").on("click", ".product_aggregate_cesta", function() {

        let btnAgregarCar = $( this );
        let inputCantidad = $( btnAgregarCar ).closest(".container_product_cart").find(".input_value_cart");
        let producto_id = $( btnAgregarCar).attr("idproducto");
        let cantidad = $( inputCantidad).val();

        if( obtenerLocalStorageclienteID () != false ) {
            
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


    function sumarImportesCestaMenu() {
        
        let array = $("#mostrarProductosCestaMenuFlotanteItems").find(".precioProductoCestaMenu");

        let sumaTotal = 0;
        $.each(array, function (index, caja) {
            sumaTotal = sumaTotal + parseFloat($(caja).val());
        });

        $(".sumaTotalCestaMenu").html(sumaTotal.toFixed(2));




        let arrayCantidad = $("#mostrarProductosCestaMenuFlotanteItems").find(".CantidadProductoCestaMenu");

        let sumaTotalCantidad = 0;
        $.each(arrayCantidad, function (index, caja) {
            sumaTotalCantidad = sumaTotalCantidad + parseFloat($(caja).html());
        });

        $(".sumaCantidadCestaMenu").html(sumaTotalCantidad);

    }



</script>