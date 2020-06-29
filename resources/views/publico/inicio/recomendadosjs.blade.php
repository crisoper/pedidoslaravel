
<script>
    
    $(document).ready(  function () {
        //Obtenemos los productos recomendados
        obtenerProductosRecomendadosInicio( );
    
        function obtenerProductosRecomendadosInicio( ) {
    
            $.ajax({
                url: "{{ route('ajax.productos.recomendados') }}",
                method: 'GET',
                data: {
                    storagecliente_id: obtenerLocalStorageclienteID()
                },
                success: function ( data ) {
                    mostrarProductosRecomendadosInicio( data.recomendados );
                    mostrarProductosEnOfertaInicio( data.ofertas )
                    mostrarProductosNuevosInicio( data.nuevos );
                    mostrarProductosMasPedidosInicio( data.maspedidos );  
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });
    
        }
    
        function mostrarProductosRecomendadosInicio( datos ) {
            $("#cuerpoProductosRecomendadosInicio").html();
    
            let recomendadosHTML = "";
    
            $.each( datos, function( key, recomendados ) {

                let fotos = '';

                let contador = 0; 
                
                $.each( recomendados.fotos, function( key, foto ) {
                    
                    contador++

                    if (contador == 2) {
                        fotos = fotos + `<img src="${ foto.url }" alt="${ foto.nombre }" class="hover-img">`;
                    } else {
                        fotos = fotos + `<img src="${ foto.url }" alt="${ foto.nombre }" class="m-0">`;
                    }

                });
                
                
                let enlistadeseos = '';
                if (recomendados.enlistadeseos == false) {
                    enlistadeseos = enlistadeseos + `<div class="col-2 p-0">
                        <button class="agregar_lista_deseos  hint--top-right" data-hint="Agregar a lista de deseos" idproducto="${ recomendados.id }" idempresa="${ recomendados.empresa_id }">
                            <i class="fa fa-heart"></i>
                        </button>
                    </div>`;
                } else {
                    enlistadeseos = enlistadeseos + `<div class="col-2 p-0">
                        <button class="product_agreggate_listadeseos hint--top-right hint--success" data-hint="Agregado a lista de deseos" idproducto="${ recomendados.id }" idempresa="${ recomendados.empresa_id }">
                            <i class="fa fa-heart"></i>
                        </button>
                    </div>`;
                }

                let encarrito = '';
                if (recomendados.encarrito == false) {
                    encarrito = encarrito + `<div class="col-8 p-0">
                        <a href="${ recomendados.empresa_url }" class="agregar_cart hint--top" data-hint="Agregar producto a cesta" idproducto="${ recomendados.id }" idempresa="${ recomendados.empresa_id }">
                            <span>Agregar</span>
                            <i class="fas fa-shopping-basket"></i>
                        </a>
                    </div>`;
                } else {
                    encarrito = encarrito + `<div class="col-8 p-0">
                        <a href="${ recomendados.empresa_url }" class="product_aggregate_cesta hint--top hint--success" data-hint="Producto agregado en cesta" idproducto="${ recomendados.id }" idempresa="${ recomendados.empresa_id }">
                            <span>Agregado</span>
                            <i class="fas fa-check-circle"></i>
                        </a>
                    </div>`;
                }

                recomendadosHTML = recomendadosHTML + `
                    <div class="single_product_wrapper mx-2 mb-3">
                        <div class="product-img">
                            
                            ${ fotos }

    						<span class="empresa_badge">
                                <a target="blank" href="${ recomendados.empresa_url }" class="row">
                                    <p class="text-truncate m-0 p-0">${ recomendados.empresa }</p>
                                    <i class="fas fa-angle-double-right"></i>
                                </a>
                            </span>
                        </div>


                        <!-- Product Description -->
                        <div class="featured__item__text container_product_cart px-2 pt-2 mb-0">
                            <div class="row">
                                <div class="col-12">
                                    <p class="nombre_producto my-0">${ recomendados.nombre }</p>
                                </div>
                            </div>
                            <hr class="mt-1 mb-0">
                            <div class="row px-2 conten_precio_cantidad">
                                <div class="col-6 pt-1 pb-2 px-0 m-0" id="price_product_border">
                                    <p class="price_product_prev text-muted py-0 my-0">
                                        S/ <span>20.90</span>
                                    </p>
                                    <h4 class="price_product_unit my-0">
                                        S/ <span class="precio_producto">${ recomendados.precio }</span>
                                    </h4>
                                </div>
                                <div class="col-6 pt-1 pb-2 px-2 m-0">
                                    <p class="import_price text-muted py-0 my-0">
                                        Importe: <b>S/ <span class="importe_producto">${ recomendados.precio }</span></b>
                                    </p>
                                    <div class="input-group input_group_unit_product">
                                        <button class="input-group-prepend minus MoreMinProd d-flex justify-content-around">-</button>
                                        <input type="text" class="form-control input_value_cart" value="1">
                                        <button class="input-group-append more MoreMinProd d-flex justify-content-around">+</button>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-0 mb-2">
                            <div class="row modal_lista_cart mx-1 mb-2">
                                <div class="col-2 p-0">
                                    <button class="abrir_modal_producto_inicio hint--top-right" data-hint="Detalle de producto" data-toggle="modal" data-target="#abrir_modal_producto_inicio" idproducto="${ recomendados.id }">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                                ${ enlistadeseos }
                                ${ encarrito }
                            </div>
                        </div>
                    </div>
                `;
            });
    
            $("#cuerpoProductosRecomendadosInicio").html( recomendadosHTML);
            sliderRecomendadosInicio();
        }

        

        function sliderRecomendadosInicio() {
            $(".responsiveSlickRecomendadosInicio").slick({
                dots: false,
                arrows: true,
                slidesToShow: 5,
                slidesToScroll: 5,
                infinite: true,
                speed: 800,
                autoplay: true,
                autoplaySpeed: 4000,
                appendArrows: $(".slickArrowsRecomendadosInicio"),
                prevArrow:
                    '<button class="slick-prev" type="button"><i class="fa  fa-angle-left"></i></button>',
                nextArrow:
                    '<button class="slick-next" type="button"><i class="fa  fa-angle-right"></i></button>',
                responsive: [
                    {
                        breakpoint: 1300,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 4,
                        },
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                        },
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                        },
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        },
                    },
                ],
            });

        }


        $(".contenidoPrincipalPagina").on("click", ".abrir_modal_producto_inicio", function() {

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

            let enlistadeseos = '';
            if (data.data.enlistadeseos == false) {
                enlistadeseos = enlistadeseos + `
                    <button class="agregar_lista_deseos  hint--top-left" data-hint="Agregar a lista de deseos" idproducto="${ data.data.id }" idempresa="${ data.data.empresa_id }">
                        <i class="fa fa-heart"></i>
                    </button>`;
            } else {
                enlistadeseos = enlistadeseos + `
                    <button class="product_agreggate_listadeseos hint--top-left hint--success" data-hint="Agregado a lista de deseos" idproducto="${ data.data.id }" idempresa="${ data.data.empresa_id }">
                        <i class="fa fa-heart"></i>
                    </button>`;
            }

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
                    <div class="row container_producto_modal container_product_cart">
                        <div class="col-12 mb-2">
                            <p class="m-0" id="nombre_producto_modal">${data.data.nombre}</p>
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
                            <p class="stock_modal">
                                Stock: <span id="stock_producto_modal">${data.data.stock}</span>
                            </p>
                        </div>
                        <div class="col-12">
                            <p class="precio_modal my-0">
                                S/ <span id="precio_producto_modal">${data.data.precio}</span>
                            </p>
                        </div>
                        <div class="col-12">
                            <p id="descripcion_producto_modal">${data.data.descripcion}</p>
                        </div>
                        <div class="col-12"><hr class="mt-1"></div>
                        <div class="col-4 p-0 pl-3">
                            <div class="input-group input_group_unit_product">
                                <button class="input-group-prepend restar sumarRestarProdModal d-flex justify-content-around pt-0">-</button>
                                <input type="text" class="form-control input_value_cart" value="1">
                                <button class="input-group-append sumar sumarRestarProdModal d-flex justify-content-around pt-0">+</button>
                            </div>
                            <p class="import_price text-muted text-center mt-1 mb-0">
                                Importe: <b>S/ <span class="importe_producto_modal">${ data.data.precio }</span></b>
                            </p>
                        </div>
                        <div class="col-5 py-0 px-3 content_btn_cesta_modal">
                            ${ encarrito }
                        </div>
                        <div class="col-2 p-0 pr-2 content_btn_favoritos_modal">
                            ${ enlistadeseos }
                        </div>
                    </div>
                </div>
            `;
            $(".content_producto_modal").html( productoModalHTML );
            
            
            let empresaModalHTML = "";
            empresaModalHTML = empresaModalHTML + `
                <a href="${data.data.empresa_id}">${data.data.empresa}</a>
            `;
            $("#nombre_empresa_modal").html( empresaModalHTML );
            
            sumarRestarCantidadModal();
        }
        
        function crearImagenesProducto( fotos ) {

            let fotoPrincipalHTML = '';
            let contadorPrincipal = 0; 

            $.each( fotos, function( key, fotoPrincipal ) {
                
                contadorPrincipal++

                if (contadorPrincipal == 1) {
                    fotoPrincipalHTML = fotoPrincipalHTML + `<img src="${ fotoPrincipal.url }" alt="${ fotoPrincipal.nombre }" class="imagen_princ_producto_modal_1">`;
                } else if (contadorPrincipal == 2) {
                    fotoPrincipalHTML = fotoPrincipalHTML + `<img src="${ fotoPrincipal.url }" alt="${ fotoPrincipal.nombre }" class="imagen_princ_producto_modal_2">`;
                } else if (contadorPrincipal == 3) {
                    fotoPrincipalHTML = fotoPrincipalHTML + `<img src="${ fotoPrincipal.url }" alt="${ fotoPrincipal.nombre }" class="imagen_princ_producto_modal_3">`;
                } else if (contadorPrincipal == 4) {
                    fotoPrincipalHTML = fotoPrincipalHTML + `<img src="${ fotoPrincipal.url }" alt="${ fotoPrincipal.nombre }" class="imagen_princ_producto_modal_4">`;
                }
            });

            $("#imagenes_principal_producto_modal").html( fotoPrincipalHTML );



            let fotosHTML = '';
            let contadorFotos = 0; 

            $.each( fotos, function( key, foto ) {
                
                contadorFotos++

                if (contadorFotos == 1) {
                    fotosHTML = fotosHTML + `<img src="${ foto.url }" alt="${ foto.nombre }" class="imagen_producto_modal_1" width="100">`;
                } else if (contadorFotos == 2) {
                    fotosHTML = fotosHTML + `<img src="${ foto.url }" alt="${ foto.nombre }" class="imagen_producto_modal_2" width="100">`;
                } else if (contadorFotos == 3) {
                    fotosHTML = fotosHTML + `<img src="${ foto.url }" alt="${ foto.nombre }" class="imagen_producto_modal_3" width="100">`;
                } else if (contadorFotos == 4) {
                    fotosHTML = fotosHTML + `<img src="${ foto.url }" alt="${ foto.nombre }" class="imagen_producto_modal_4" width="100">`;
                }

            });

            $("#imagenes_producto_modal").html( fotosHTML );


            $('.imagen_producto_modal_1').on('click', function () {
                $(".imagen_princ_producto_modal_1").css( "visibility", "visible" );
                $(".imagen_princ_producto_modal_2").css( "visibility", "hidden" );
                $(".imagen_princ_producto_modal_3").css( "visibility", "hidden" );
                $(".imagen_princ_producto_modal_4").css( "visibility", "hidden" );
            });
            $('.imagen_producto_modal_2').on('click', function () {
                $(".imagen_princ_producto_modal_2").css( "visibility", "visible" );
                $(".imagen_princ_producto_modal_1").css( "visibility", "hidden" );
                $(".imagen_princ_producto_modal_3").css( "visibility", "hidden" );
                $(".imagen_princ_producto_modal_4").css( "visibility", "hidden" );
            });
            $('.imagen_producto_modal_3').on('click', function () {
                $(".imagen_princ_producto_modal_3").css( "visibility", "visible" );
                $(".imagen_princ_producto_modal_1").css( "visibility", "hidden" );
                $(".imagen_princ_producto_modal_2").css( "visibility", "hidden" );
                $(".imagen_princ_producto_modal_4").css( "visibility", "hidden" );
            });
            $('.imagen_producto_modal_4').on('click', function () {
                $(".imagen_princ_producto_modal_4").css( "visibility", "visible" );
                $(".imagen_princ_producto_modal_1").css( "visibility", "hidden" );
                $(".imagen_princ_producto_modal_2").css( "visibility", "hidden" );
                $(".imagen_princ_producto_modal_3").css( "visibility", "hidden" );
            });
            }
            
        });


</script>
