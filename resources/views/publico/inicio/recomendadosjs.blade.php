
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
            // $("#cuerpoProductosRecomendadosInicio").html();

            let recomendadosHTML = "";
    
            $.each( datos, function( key, recomendados ) {

                // console.log(recomendados);

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

                
                if ( (recomendados.oferta_diainicio <= recomendados.diaactual) && (recomendados.oferta_diafin >= recomendados.diaactual) ) {
                    if ( recomendados.nuevo == "Si" ) {
                        recomendadosHTML = recomendadosHTML + `
                            <div class="single_product_wrapper abrir_modal_productos m-3" data-toggle="modal" data-target="#abrir_modal_producto_inicio" idproducto="${ recomendados.id }">

                                <div class="product-img">
                                    ${ fotos }
                                    
                                    <div class="product-badge new-badge">
                                        <span class="py-1 px-2">Nuevo</span>
                                    </div>
                                    <div class="product-badge offer-badge">
                                        <span class="py-1 px-2">Oferta</span>
                                    </div>
                                </div>
                                
                                <div class="featured__item__text p-2">
                                    <div class="row mx-0">
                                        <div class="col-12">
                                            <p class="nombre_producto text-truncate my-0">${ recomendados.nombre }</p>
                                            <p class="nombre_empresa text-truncate my-0">${ recomendados.empresa }</p>
                                        </div>
                                        <div class="col-12 p-0">
                                            <div class="row mx-0">
                                                <div class="col-6 p-0 text-center">
                                                    <h5 class="price_product_offer mt-2 pt-1">
                                                        S/ <span class="precio_producto">${ recomendados.precio }</span>
                                                    </h5>
                                                </div>
                                                <div class="col-6 p-0 text-left">
                                                    <h4 class="content_precio_producto mt-2">
                                                        S/ <span class="precio_producto">${ recomendados.oferta }</span>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        `;
                    } else {
                        recomendadosHTML = recomendadosHTML + `
                            <div class="single_product_wrapper abrir_modal_productos m-3" data-toggle="modal" data-target="#abrir_modal_producto_inicio" idproducto="${ recomendados.id }">

                                <div class="product-img">
                                    ${ fotos }
                                    
                                    <div class="product-badge offer-badge">
                                        <span class="py-1 px-2">Oferta</span>
                                    </div>
                                </div>
                                
                                <div class="featured__item__text p-2">
                                    <div class="row mx-0">
                                        <div class="col-12">
                                            <p class="nombre_producto text-truncate my-0">${ recomendados.nombre }</p>
                                            <p class="nombre_empresa text-truncate my-0">${ recomendados.empresa }</p>
                                        </div>
                                        <div class="col-12 p-0">
                                            <div class="row mx-0">
                                                <div class="col-6 p-0 text-center">
                                                    <h5 class="price_product_offer mt-2 pt-1">
                                                        S/ <span class="precio_producto">${ recomendados.precio }</span>
                                                    </h5>
                                                </div>
                                                <div class="col-6 p-0 text-left">
                                                    <h4 class="content_precio_producto mt-2">
                                                        S/ <span class="precio_producto">${ recomendados.oferta }</span>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        `;
                    }
                } else if ( recomendados.nuevo == "Si" ) {
                    recomendadosHTML = recomendadosHTML + `
                        <div class="single_product_wrapper abrir_modal_productos m-3" data-toggle="modal" data-target="#abrir_modal_producto_inicio" idproducto="${ recomendados.id }">

                            <div class="product-img">
                                ${ fotos }
                                
                                <div class="product-badge new-badge">
                                    <span class="py-1 px-2">Nuevo</span>
                                </div>
                            </div>
                            
                            <div class="featured__item__text p-2">
                                <div class="row mx-0">
                                    <div class="col-12">
                                        <p class="nombre_producto text-truncate my-0">${ recomendados.nombre }</p>
                                        <p class="nombre_empresa text-truncate my-0">${ recomendados.empresa }</p>
                                        <h4 class="content_precio_producto mt-2">
                                            S/ <span class="precio_producto">${ recomendados.precio }</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>

                        </div>
                    `;
                } else {
                    recomendadosHTML = recomendadosHTML + `
                        <div class="single_product_wrapper abrir_modal_productos m-3" data-toggle="modal" data-target="#abrir_modal_producto_inicio" idproducto="${ recomendados.id }">

                            <div class="product-img">
                                
                                ${ fotos }

                            </div>
                            
                            <div class="featured__item__text p-2">
                                <div class="row mx-0">
                                    <div class="col-12">
                                        <p class="nombre_producto text-truncate my-0">${ recomendados.nombre }</p>
                                        <p class="nombre_empresa text-truncate my-0">${ recomendados.empresa }</p>
                                        <h4 class="content_precio_producto mt-2">
                                            S/ <span class="precio_producto">${ recomendados.precio }</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>

                        </div>
                    `;
                }
                
            });
    
            $("#cuerpoProductosRecomendadosInicio").html( recomendadosHTML);
            sliderRecomendadosInicio();
        }


        function sliderRecomendadosInicio() {
            $(".responsiveSlickRecomendadosInicio").slick({
                dots: false,
                arrows: true,
                slidesToShow: 4,
                slidesToScroll: 4,
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
            
    });


</script>
