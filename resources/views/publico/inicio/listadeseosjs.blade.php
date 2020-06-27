<script>
    
    $("#btn_open_favorites").on("click", function() {
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


        $("#mostarFavoritosProductos").html();

        let listaHTML = "";

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


            listaHTML = listaHTML + `
                <div class="col-12 mb-2">
                    <div class="row border_fav_prod p-1">
                        <div class="col-3 p-0">
                            <div class="foto_fav_prod">
                                ${ fotos }
                            </div>
                        </div>
                        <div class="col-9 p-0 pl-2">
                            <p class="nombre_fav_prod my-0">
                                <a href="#">${ deseos.producto.nombre }</a>
                                </p>
                            <p class="descripcion_fav_prod my-0">${ deseos.producto.descripcion }</p>
                            <p class="precio_fav_prod mb-0"><b>s/ ${ deseos.producto.precio }</b></p>
                        </div>
                        
                        <div class="p-0 eliminarProductoListaDeseos" producto_id="${ deseos.producto.id }"><i class="fas fa-trash-alt small"></i></div>
                    </div>
                </div>
            `;
        });

        $("#mostarFavoritosProductos").html( listaHTML);
        marginListaDeseosMenu();
    } 

    function marginListaDeseosMenu() {
        let contarDrpdownListaDeseosHeader = $('.border_caja_favorites').length;
        if (contarDrpdownListaDeseosHeader == 3) {
            $('.border_caja_favorites').parents('.dropdown_favorites_header').css('padding-bottom', '60px');
        }
        else if (contarDrpdownListaDeseosHeader == 2) {
            $('.border_caja_favorites').parents('.dropdown_favorites_header').css('padding-bottom', '127px');
        }
        else {
            $('.border_caja_favorites').parents('.dropdown_favorites_header').css('padding-bottom', '0px');
        }
    }


    $("#mostarFavoritosProductos").on("click", ".eliminarProductoListaDeseos", function() {

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
        console.log($(this));
        let btnAgregarLista = $( this );
        let producto_id = $( btnAgregarLista).attr("idproducto");
        let empresa_id = $(btnAgregarLista).attr('idempresa');

        console.log(empresa_id)

        if( obtenerLocalStorageclienteID () != false ) {
            
            agregarProducto_ListDeseos( producto_id, obtenerLocalStorageclienteID (), "deseos", empresa_id );
        }
    })


    function agregarProducto_ListDeseos( producto_id, storagecliente_id, tipo, empresa_id, btnAgregarLista) {

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
                obtenerProductosListaDeseos( );
                console.log( $( btnAgregarLista ) );
            },
            error: function ( jqXHR, textStatus, errorThrown ) {
                console.log(jqXHR.responseJSON);
            }
        });

    }


</script>