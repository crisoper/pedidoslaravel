
<script>
    
    function mostrarProductosMasPedidosInicio( datos ) {
        $("#cuerpoProductosMasPedidosInicio").html();

        let maspedidosHTML = "";

        $.each( datos, function( key, maspedidos ) {

            let fotos = '';
            let contador = 0; 
            $.each( maspedidos.fotos, function( key, foto ) {
                contador++
                if (contador == 2) {
                    fotos = fotos + `<img src="${ foto.url }" alt="${ foto.nombre }" class="hover-img">`;
                } else {
                    fotos = fotos + `<img src="${ foto.url }" alt="${ foto.nombre }" class="m-0">`;
                }
            });


            if ( (maspedidos.oferta_diainicio != "") && (maspedidos.oferta_diafin != "") ) {
                if ( maspedidos.nuevo == "Si" ) {
                    maspedidosHTML = maspedidosHTML + `
                        <div class="single_product_wrapper abrir_modal_productos m-3" data-toggle="modal" data-target="#abrir_modal_producto_inicio" idproducto="${ maspedidos.id }">

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
                                        <p class="nombre_producto text-truncate my-0">${ maspedidos.nombre }</p>
                                        <p class="nombre_empresa text-truncate my-0">${ maspedidos.empresa }</p>
                                    </div>
                                    <div class="col-12 p-0">
                                        <div class="row mx-0">
                                            <div class="col-6 p-0 text-center">
                                                <h5 class="price_product_offer mt-2 pt-1">
                                                    S/ <span class="precio_producto">${ maspedidos.precio }</span>
                                                </h5>
                                            </div>
                                            <div class="col-6 p-0 text-left">
                                                <h4 class="content_precio_producto mt-2">
                                                    S/ <span class="precio_producto">${ maspedidos.oferta }</span>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    `;
                } else {
                    maspedidosHTML = maspedidosHTML + `
                        <div class="single_product_wrapper abrir_modal_productos m-3" data-toggle="modal" data-target="#abrir_modal_producto_inicio" idproducto="${ maspedidos.id }">

                            <div class="product-img">
                                ${ fotos }
                                
                                <div class="product-badge offer-badge">
                                    <span class="py-1 px-2">Oferta</span>
                                </div>
                            </div>
                            
                            <div class="featured__item__text p-2">
                                <div class="row mx-0">
                                    <div class="col-12">
                                        <p class="nombre_producto text-truncate my-0">${ maspedidos.nombre }</p>
                                        <p class="nombre_empresa text-truncate my-0">${ maspedidos.empresa }</p>
                                    </div>
                                    <div class="col-12 p-0">
                                        <div class="row mx-0">
                                            <div class="col-6 p-0 text-center">
                                                <h5 class="price_product_offer mt-2 pt-1">
                                                    S/ <span class="precio_producto">${ maspedidos.precio }</span>
                                                </h5>
                                            </div>
                                            <div class="col-6 p-0 text-left">
                                                <h4 class="content_precio_producto mt-2">
                                                    S/ <span class="precio_producto">${ maspedidos.oferta }</span>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    `;
                }
            } else if ( maspedidos.nuevo == "Si" ) {
                maspedidosHTML = maspedidosHTML + `
                    <div class="single_product_wrapper abrir_modal_productos m-3" data-toggle="modal" data-target="#abrir_modal_producto_inicio" idproducto="${ maspedidos.id }">

                        <div class="product-img">
                            ${ fotos }
                            
                            <div class="product-badge new-badge">
                                <span class="py-1 px-2">Nuevo</span>
                            </div>
                        </div>
                        
                        <div class="featured__item__text p-2">
                            <div class="row mx-0">
                                <div class="col-12">
                                    <p class="nombre_producto text-truncate my-0">${ maspedidos.nombre }</p>
                                    <p class="nombre_empresa text-truncate my-0">${ maspedidos.empresa }</p>
                                    <h4 class="content_precio_producto mt-2">
                                        S/ <span class="precio_producto">${ maspedidos.precio }</span>
                                    </h4>
                                </div>
                            </div>
                        </div>

                    </div>
                `;
            } else {
                maspedidosHTML = maspedidosHTML + `
                    <div class="single_product_wrapper abrir_modal_productos m-3" data-toggle="modal" data-target="#abrir_modal_producto_inicio" idproducto="${ maspedidos.id }">

                        <div class="product-img">
                            
                            ${ fotos }

                        </div>
                        
                        <div class="featured__item__text p-2">
                            <div class="row mx-0">
                                <div class="col-12">
                                    <p class="nombre_producto text-truncate my-0">${ maspedidos.nombre }</p>
                                    <p class="nombre_empresa text-truncate my-0">${ maspedidos.empresa }</p>
                                    <h4 class="content_precio_producto mt-2">
                                        S/ <span class="precio_producto">${ maspedidos.precio }</span>
                                    </h4>
                                </div>
                            </div>
                        </div>

                    </div>
                `;
            }
            
        });

        $("#cuerpoProductosMasPedidosInicio").html( maspedidosHTML);
        sliderMasPedidosInicio();
    }


    function sliderMasPedidosInicio() {
        $(".responsiveSlickMasPedidosInicio").slick({
            dots: false,
            arrows: true,
            slidesToShow: 4,
            slidesToScroll: 4,
            infinite: true,
            speed: 800,
            autoplay: true,
            autoplaySpeed: 4000,
            appendArrows: $(".slickArrowsMasPedidosInicio"),
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

</script>

