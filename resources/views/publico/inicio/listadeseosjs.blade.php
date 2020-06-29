<script>
    
    $("#btn_open_favorites").on("click", function() {
        obtenerProductosListaDeseos( );
    });
    

    //Obtenemos los productos favoritos
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
                    <div class="card border_fav_prod">
                        <div class="card-header p-0">
                            <p class="text-truncate text-center my-0">
                                <a class="nombre_fav_empresa" href="${ deseos.producto.empresa_url }">${ deseos.producto.empresa }</a>
                            </p>
                        </div>
                        <div class="card-body p-1">
                            <div class="row m-0">
                                <div class="col-3 p-0">
                                    <div class="foto_fav_prod">
                                        ${ fotos }
                                    </div>
                                </div>
                                <div class="col-9 p-0 pl-2">
                                    <p class="nombre_fav_prod text-truncate my-0">${ deseos.producto.nombre }</p>
                                    <p class="descripcion_fav_prod text-truncate my-0">${ deseos.producto.descripcion }</p>
                                    <p class="precio_fav_prod my-0">
                                        S/ <span class="precio_prod_favoritos">${ deseos.producto.precio }</span>
                                    </p>
                                </div>
                                
                                <div class="col-12 p-0 column_detalle_favoritos">
                                    <div class="row m-0 content_detalles_prod_fav">
                                        <p class="import_price_fav text-muted text-center py-0 my-0">
                                            Importe: <br> <b>S/ <span class="importe_producto_fav">${ deseos.producto.precio }</span></b>
                                        </p>
                                        
                                        <div class="input-group input_group_unit_product_fav">
                                            <button class="input-group-prepend minus MoreMinProd d-flex justify-content-around">-</button>
                                            <input type="text" class="form-control input_value_cart" value="1">
                                            <button class="input-group-append more MoreMinProd d-flex justify-content-around">+</button>
                                        </div>
                                        
                                        <a href="${ deseos.producto.empresa_url }" class="agregar_cart_de_favoritos hint--top-left" data-hint="Agregar producto a cesta" idproducto="${ deseos.producto.id }" idempresa="${ deseos.producto.empresa_id }">
                                            <span>Agregar</span>
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                        
                                        <button class="abrir_modal_producto_favoritos p-0 hint--top-left" data-hint="Detalle de producto" data-toggle="modal" data-target="#abrir_modal_producto_favoritos" idproducto="${ deseos.producto.id }">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="eliminarProductoListaDeseos" producto_id="${ deseos.producto.id }">
                            <i class="fas fa-trash-alt"></i>
                        </div>
                        
                    </div>
                </div>
            `;
        });

        $("#mostarFavoritosProductos").html( favoritosHTML);
        marginListaDeseosMenu();
        sumarRestarCantidadFavoritos();
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



    //Agregar producto a favoritos
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
    $(".contenidoPrincipalPagina").on("click", ".product_agreggate_listadeseos", function() {
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



    $(".contenidoPrincipalPagina").on("click", ".abrir_modal_producto_favoritos", function() {

        let btn = $( this );

        $.ajax({
            url: "{{ route('ajax.productos.getdatosxid') }}",
            method: 'GET',
            data: {
                idproducto: $( btn ).attr("idproducto")
            },
            success: function ( data ) {
                llenarDatosModalProductoDetalle( data );
            },
            error: function ( jqXHR, textStatus, errorThrown ) {
                console.log(jqXHR.responseJSON);
            }
        });

    });
        
    function llenarDatosModalProductoDetalle( data ) {
        
        crearImagenesProducto( data.data.fotos );

        let encarrito = '';
        if (data.data.encarrito == false) {
            encarrito = encarrito + `
                <a href="${ data.data.empresa_url }" class="agregar_cart text-center hint--top" data-hint="Agregar producto a cesta" idproducto="${ data.data.id }" idempresa="${ data.data.empresa_id }">
                    <span>Agregar</span>
                    <i class="fas fa-shopping-basket"></i>
                </a>
            `;
        } else {
            encarrito = encarrito + `
                <a href="${ data.data.empresa_url }" class="product_aggregate_cesta text-center hint--top hint--success" data-hint="Producto agregado en cesta" idproducto="${ data.data.id }" idempresa="${ data.data.empresa_id }">
                    <span>Agregado</span>
                    <i class="fas fa-check-circle"></i>
                </a>
            `;
        }

        let productoModalHTML = "";
        productoModalHTML = productoModalHTML + `
            <div class="col-12">
                <div class="row container_product_cart">
                    <div class="col-12">
                        <h4 id="nombre_producto_modal_fav">${data.data.nombre}</h4>
                    </div>
                    <div class="col-6 col-sm-5 col-md-4">
                        <div class="top_seller_product_rating">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="col-6 col-sm-5 col-md-8">
                        <p class="stock_modal_fav">
                            Stock: <span id="stock_producto_modal_fav">${data.data.stock}</span>
                        </p>
                    </div>
                    <div class="col-12">
                        <h3 class="precio_modal_fav my-0">
                            S/ <span id="precio_producto_modal_fav">${data.data.precio}</span>
                        </h3>
                    </div>
                    <div class="col-12">
                        <p id="descripcion_producto_modal_fav">${data.data.descripcion}</p>
                    </div>
                    <div class="col-12"><hr></div>
                    <div class="col-5">
                        <div class="input-group input_group_unit_product">
                            <button class="input-group-prepend restar sumarRestarProdModal d-flex justify-content-around">-</button>
                            <input type="text" class="form-control input_value_cart" value="1">
                            <button class="input-group-append sumar sumarRestarProdModal d-flex justify-content-around">+</button>
                        </div>
                        <p class="import_price text-muted text-center mt-1 mb-0">
                            Importe: <b>S/ <span class="importe_producto_modal_fav">${ data.data.precio }</span></b>
                        </p>
                    </div>
                    <div class="col-5 content_btn_cesta_modal_fav">
                        ${ encarrito }
                    </div>
                </div>
            </div>
        `;
        $(".content_producto_modal_fav").html( productoModalHTML );
        
        let empresaModalHTML = "";
        empresaModalHTML = empresaModalHTML + `
            <a href="${data.data.empresa_id}">${data.data.empresa}</a>
        `;
        $("#nombre_empresa_modal_fav").html( empresaModalHTML );


        sumarRestarCantidadModalFav();
    }

    function crearImagenesProducto( fotos ) {

        let fotoPrincipalFavHTML = '';
        let contadorPrincipalFav = 0; 

        $.each( fotos, function( key, fotoPrincipal ) {
            
            contadorPrincipalFav++

            if (contadorPrincipalFav == 1) {
                fotoPrincipalFavHTML = fotoPrincipalFavHTML + `<img src="${ fotoPrincipal.url }" alt="${ fotoPrincipal.nombre }" class="imagen_princ_producto_modal_fav_1">`;
            } else if (contadorPrincipalFav == 2) {
                fotoPrincipalFavHTML = fotoPrincipalFavHTML + `<img src="${ fotoPrincipal.url }" alt="${ fotoPrincipal.nombre }" class="imagen_princ_producto_modal_fav_2">`;
            } else if (contadorPrincipalFav == 3) {
                fotoPrincipalFavHTML = fotoPrincipalFavHTML + `<img src="${ fotoPrincipal.url }" alt="${ fotoPrincipal.nombre }" class="imagen_princ_producto_modal_fav_3">`;
            } else if (contadorPrincipalFav == 4) {
                fotoPrincipalFavHTML = fotoPrincipalFavHTML + `<img src="${ fotoPrincipal.url }" alt="${ fotoPrincipal.nombre }" class="imagen_princ_producto_modal_fav_4">`;
            }
        });

        $("#imagenes_principal_producto_modal_fav").html( fotoPrincipalFavHTML );



        let fotosFavHTML = '';
        let contadorFotosFav = 0; 

        $.each( fotos, function( key, foto ) {
            
            contadorFotosFav++

            if (contadorFotosFav == 1) {
                fotosFavHTML = fotosFavHTML + `<img src="${ foto.url }" alt="${ foto.nombre }" class="imagen_producto_modal_fav_1" width="100">`;
            } else if (contadorFotosFav == 2) {
                fotosFavHTML = fotosFavHTML + `<img src="${ foto.url }" alt="${ foto.nombre }" class="imagen_producto_modal_fav_2" width="100">`;
            } else if (contadorFotosFav == 3) {
                fotosFavHTML = fotosFavHTML + `<img src="${ foto.url }" alt="${ foto.nombre }" class="imagen_producto_modal_fav_3" width="100">`;
            } else if (contadorFotosFav == 4) {
                fotosFavHTML = fotosFavHTML + `<img src="${ foto.url }" alt="${ foto.nombre }" class="imagen_producto_modal_fav_4" width="100">`;
            }

        });

        $("#imagenes_producto_modal_fav").html( fotosFavHTML );


        $('.imagen_producto_modal_fav_1').on('click', function () {
            $(".imagen_princ_producto_modal_fav_1").css( "visibility", "visible" );
            $(".imagen_princ_producto_modal_fav_2").css( "visibility", "hidden" );
            $(".imagen_princ_producto_modal_fav_3").css( "visibility", "hidden" );
            $(".imagen_princ_producto_modal_fav_4").css( "visibility", "hidden" );
        });
        $('.imagen_producto_modal_fav_2').on('click', function () {
            $(".imagen_princ_producto_modal_fav_2").css( "visibility", "visible" );
            $(".imagen_princ_producto_modal_fav_1").css( "visibility", "hidden" );
            $(".imagen_princ_producto_modal_fav_3").css( "visibility", "hidden" );
            $(".imagen_princ_producto_modal_fav_4").css( "visibility", "hidden" );
        });
        $('.imagen_producto_modal_fav_3').on('click', function () {
            $(".imagen_princ_producto_modal_fav_3").css( "visibility", "visible" );
            $(".imagen_princ_producto_modal_fav_1").css( "visibility", "hidden" );
            $(".imagen_princ_producto_modal_fav_2").css( "visibility", "hidden" );
            $(".imagen_princ_producto_modal_fav_4").css( "visibility", "hidden" );
        });
        $('.imagen_producto_modal_fav_4').on('click', function () {
            $(".imagen_princ_producto_modal_fav_4").css( "visibility", "visible" );
            $(".imagen_princ_producto_modal_fav_1").css( "visibility", "hidden" );
            $(".imagen_princ_producto_modal_fav_2").css( "visibility", "hidden" );
            $(".imagen_princ_producto_modal_fav_3").css( "visibility", "hidden" );
        });
    }



    //Sumar o Restar cantidad de productos en cesta
    function sumarRestarCantidadFavoritos() {
        $('.input_group_unit_product_fav').on('click', '.MoreMinProd', function () {
            var botonSumarRestar = $(this);
            var oldValue = botonSumarRestar.parent().find('input').val();

            var precio = botonSumarRestar.parents('.border_fav_prod').find('.precio_prod_favoritos').html();

            if (botonSumarRestar.hasClass('more')) {
                var newVal = parseInt(oldValue) + 1;
            } else {
                // Don't allow decrementing below zero
                if (oldValue > 1) {
                    var newVal = parseInt(oldValue) - 1;
                } else {
                    newVal = 1;
                }
            }

            botonSumarRestar.parent().find('input').val(newVal);
            botonSumarRestar.parents('.border_fav_prod').find('.importe_producto_fav').html((newVal * precio).toFixed(2));
        });
    }

    function sumarRestarCantidadModalFav() {
        
        $('.input_group_unit_product').on('click', '.sumarRestarProdModal', function () {
            var botonMoreMin = $(this);

            var valorActual = botonMoreMin.parent().find('input').val();
            var precio = botonMoreMin.parents('.container_product_cart').find('#precio_producto_modal_fav').html();

            if (botonMoreMin.hasClass('sumar')) {
                var nuevoValor = parseFloat(valorActual) + 1;
            } else {
                // Don't allow decrementing below zero
                if (valorActual > 1) {
                    var nuevoValor = parseFloat(valorActual) - 1;
                } else {
                    nuevoValor = 1;
                }
            }

            botonMoreMin.parent().find('input').val(nuevoValor);
            botonMoreMin.parents('.container_product_cart').find('.importe_producto_modal_fav').html((nuevoValor * precio).toFixed(2));

        });
    }


    
    
    function marginListaDeseosMenu() {
        let marginProductosFavoritos = $('.border_fav_prod').length;

        var cestaResponsive = $(window).width();
        
        if (cestaResponsive >= 1201){
            if (marginProductosFavoritos == 1) {
                $('.scroll_cart_content').height('auto');
            }
            else if (marginProductosFavoritos == 2) {
                $('.scroll_cart_content').height(345);
            }
            else if (marginProductosFavoritos == 3) {
                $('.scroll_cart_content').height(505);
            }
            else {
                $('.scroll_cart_content').height(92+'%');
            }
        }
        if ((cestaResponsive >= 769) && (cestaResponsive <= 1200)){
            if (marginProductosFavoritos == 1) {
                $('.scroll_cart_content').height('auto');
            }
            else if (marginProductosFavoritos == 2) {
                $('.scroll_cart_content').height(345);
            }
            else if (marginProductosFavoritos == 3) {
                $('.scroll_cart_content').height(505);
            }
            else {
                $('.scroll_cart_content').height(90+'%');
            }
        }
        if (cestaResponsive <= 768){
            if (marginProductosFavoritos == 1) {
                $('.scroll_cart_content').height('auto');
            }
            else if (marginProductosFavoritos == 2) {
                $('.scroll_cart_content').height(345);
            }
            else if (marginProductosFavoritos == 3) {
                $('.scroll_cart_content').height(505);
            }
            else {
                $('.scroll_cart_content').height(85+'%');
            }
        }

        
    }


</script>