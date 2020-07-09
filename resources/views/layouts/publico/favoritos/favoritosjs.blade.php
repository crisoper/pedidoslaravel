<script>
    
    $(document).ready( function() {
        obtenerProductosFavoritosMenu( );
    });


    $("#mostrar_favoritos_menu").on("click", function() {
        obtenerProductosFavoritosMenu( );
    });
    

    //OBTENIENDO PRODUCTOS DE FAVORITOS
    function obtenerProductosFavoritosMenu( tipo = "deseos" ) {

        if( obtenerLocalStorageclienteID () != false ) {
            
            $.ajax({
                url: "{{ route('listadeseo.index') }}",
                method: 'GET',
                data: {
                    storagecliente_id: obtenerLocalStorageclienteID (),
                    tipo: tipo,
                },
                success: function ( data ) {
                    mostrarProductosFavoritosMenu( data )
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });

        }

    }

    function mostrarProductosFavoritosMenu( listadeseos ) {


        $("#mostrar_productos_favoritos_menu").html();

        let favoritosHTML = "";

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

            
            favoritosHTML = favoritosHTML + `
                <div class="col-12 mb-3">
                    <div class="card border_producto_favoritos_menu">
                        <div class="card-header p-0">
                            <p class="text-truncate text-center my-0">
                                <a class="nombre_empresa_favoritos_menu" href="${ deseos.producto.empresa_url }">${ deseos.producto.empresa }</a>
                            </p>
                        </div>
                        <div class="card-body p-1">
                            <div class="row m-0">
                                <div class="col-3 p-0">
                                    <div class="foto_producto_favoritos_menu">
                                        ${ fotos }
                                    </div>
                                </div>
                                <div class="col-9 p-0 pl-2">
                                    <p class="nombre_producto_favoritos_menu text-truncate my-0">${ deseos.producto.nombre }</p>
                                    <p class="descripcion_producto_favoritos_menu text-truncate my-0">${ deseos.producto.descripcion }</p>
                                    <p class="precio_producto_favoritos_menu my-0">
                                        S/ ${ deseos.producto.precio }
                                    </p>
                                </div>
                            </div>
                        </div>                        
                        <div class="eliminar_producto_favoritos_menu" producto_id="${ deseos.producto.id }">
                            <i class="fas fa-trash-alt"></i>
                        </div>
                        
                    </div>
                </div>
            `;
        });

        $("#mostrar_productos_favoritos_menu").html( favoritosHTML);
        sumar_cantidad_boton_favoritos_menu();
    } 

    

    //AGREGAR PRODUCTO A FAVORITOS
    $(".contenidoPrincipalPagina").on("click", ".agregar_lista_deseos", function() {
        let btnAgregarLista = $( this );
        let producto_id = $( btnAgregarLista).attr("idproducto");
        let empresa_id = $(btnAgregarLista).attr('idempresa');

        if( obtenerLocalStorageclienteID () != false ) {
            
            agregar_producto_a_favoritos( producto_id, obtenerLocalStorageclienteID (), "deseos", empresa_id );
        }
    })
    
    $(".contenidoPrincipalPagina").on("click", ".product_agreggate_listadeseos", function() {
        let btnAgregarLista = $( this );
        let producto_id = $( btnAgregarLista).attr("idproducto");
        let empresa_id = $(btnAgregarLista).attr('idempresa');

        if( obtenerLocalStorageclienteID () != false ) {
            
            agregar_producto_a_favoritos( producto_id, obtenerLocalStorageclienteID (), "deseos", empresa_id );
        }
    })

    function agregar_producto_a_favoritos( producto_id, storagecliente_id, tipo, empresa_id, btnAgregarLista) {

        $.ajax({
            url: "{{ route('listadeseo.store') }}",
            method: 'POST',
            data: {
                storagecliente_id: storagecliente_id,
                tipo: tipo,
                producto_id: producto_id,
                empresa_id: empresa_id,
            },
            success: function ( data ) {
                obtenerProductosFavoritosMenu( );
                // console.log( $( btnAgregarLista ) );
            },
            error: function ( jqXHR, textStatus, errorThrown ) {
                console.log(jqXHR.responseJSON);
            }
        });

    }
    

    
    // ELIMINAR PRODUCTO DE FAVORITOS
    $("#mostrar_productos_favoritos_menu").on("click", ".eliminar_producto_favoritos_menu", function() {

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
                    obtenerProductosFavoritosMenu( );
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });

        }

    });



    // AGREGAR CANTIDAD EN BOTON FAVORITOS
    function sumar_cantidad_boton_favoritos_menu() {
        
        let productosFavoritosMenu = $("#mostrar_productos_favoritos_menu").find(".border_producto_favoritos_menu").length;

        if ($(".cantidad_favoritos_menu").html() <= 9) {
            $(".cantidad_favoritos_menu").html(productosFavoritosMenu);
        } else {
            $(".cantidad_favoritos_menu").html('9+');
        }

    }
    
</script>