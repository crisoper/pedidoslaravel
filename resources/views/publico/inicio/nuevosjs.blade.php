
<script>
    
    // $(document).ready(  function () {
        //Obtenemos los productos nuevos
        // obtenerProductosNuevosInicio( );
    
        // function obtenerProductosNuevosInicio( ) {
    
        //     $.ajax({
        //         url: "{{ route('ajax.productos.nuevos') }}",
        //         method: 'GET',
        //         data: {
        //             storagecliente_id: obtenerLocalStorageclienteID()
        //         },
        //         success: function ( data ) {
        //             mostrarProductosNuevosInicio( data );
        //         },
        //         error: function ( jqXHR, textStatus, errorThrown ) {
        //             console.log(jqXHR.responseJSON);
        //         }
        //     });
    
        // }
    
        function mostrarProductosNuevosInicio( datos ) {
            $("#cuerpoProductosNuevosInicio").html();
    
            let nuevosHTML = "";
    
            $.each( datos, function( key, nuevos ) {

                let fotos = '';

                let contador = 0; 
                
                $.each( nuevos.fotos, function( key, foto ) {
                    
                    contador++

                    if (contador == 2) {
                        fotos = fotos + `<img src="${ foto.url }" alt="${ foto.nombre }" class="hover-img">`;
                    } else {
                        fotos = fotos + `<img src="${ foto.url }" alt="${ foto.nombre }" class="m-0">`;
                    }

                });
                
                
                let enlistadeseos = '';
                if (nuevos.enlistadeseos == false) {
                    enlistadeseos = enlistadeseos + `<div class="col-2 p-0">
                        <button class="agregar_lista_deseos  hint--top-right" data-hint="Agregar a lista de deseos" idproducto="${ nuevos.id }" idempresa="${ nuevos.empresa_id }">
                            <i class="fa fa-heart"></i>
                        </button>
                    </div>`;
                } else {
                    enlistadeseos = enlistadeseos + `<div class="col-2 p-0">
                        <button class="product_agreggate_listadeseos hint--top-right hint--success" data-hint="Agregado a lista de deseos" idproducto="${ nuevos.id }" idempresa="${ nuevos.empresa_id }">
                            <i class="fa fa-heart"></i>
                        </button>
                    </div>`;
                }

                let encarrito = '';
                if (nuevos.encarrito == false) {
                    encarrito = encarrito + `<div class="col-8 p-0">
                        <a href="${ nuevos.empresa_url }" class="agregar_cart hint--top" data-hint="Agregar producto a cesta" idproducto="${ nuevos.id }" idempresa="${ nuevos.empresa_id }">
                            <span>Agregar</span>
                            <i class="fas fa-shopping-basket"></i>
                        </a>
                    </div>`;
                } else {
                    encarrito = encarrito + `<div class="col-8 p-0">
                        <a href="${ nuevos.empresa_url }" class="product_aggregate_cesta hint--top hint--success" data-hint="Producto agregado en cesta" idproducto="${ nuevos.id }" idempresa="${ nuevos.empresa_id }">
                            <span>Agregado</span>
                            <i class="fas fa-check-circle"></i>
                        </a>
                    </div>`;
                }

                nuevosHTML = nuevosHTML + `
                    <div class="single_product_wrapper mx-2 mb-3">
                        <div class="product-img">
                            
                            ${ fotos }

    						<span class="empresa_badge">
                                <a target="blank" href="${ nuevos.empresa_url }" class="row">
                                    <p class="text-truncate m-0 p-0">${ nuevos.empresa }</p>
                                    <i class="fas fa-angle-double-right"></i>
                                </a>
                            </span>

                            <div class="product-badge new-badge">
                                <span>Nuevo</span>
                            </div>
                        </div>


                        <!-- Product Description -->
                        <div class="featured__item__text container_product_cart featured__item__text_nuevos px-2 pt-2">
                            <div class="row mx-0">
                                <div class="col-12 mb-0">
                                    <p class="nombre_producto m-0 p-0" >${ nuevos.nombre }</p>
                                </div>
                            </div>
                            <hr class="mt-2 mb-0">
                                <div class="row px-2 conten_precio_cantidad">
                                <div class="col-6 pt-1 pb-2 px-0 m-0" id="price_product_border">
                                    <p class="price_product_prev text-muted py-0 my-0">
                                        S/ <span>20.90</span>
                                    </p>
                                    <h4 class="price_product_unit my-0">
                                        S/ <span class="precio_producto">${ nuevos.precio }</span>
                                    </h4>
                                </div>
                                <div class="col-6 pt-1 pb-2 px-2 m-0">
                                    <p class="import_price text-muted py-0 my-0">
                                        Importe: <b>S/ <span class="importe_producto">${ nuevos.precio }</span></b>
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
                                    <button class="abrir_modal_producto_inicio hint--top-right" data-hint="Detalle de producto" data-toggle="modal" data-target="#abrir_modal_producto_inicio" idproducto="${ nuevos.id }">
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
    
            $("#cuerpoProductosNuevosInicio").html( nuevosHTML);
            sliderNuevosInicio();
        }

        

        function sliderNuevosInicio() {
            $(".responsiveSlickNuevosInicio").slick({
                dots: false,
                arrows: true,
                slidesToShow: 5,
                slidesToScroll: 5,
                infinite: true,
                speed: 800,
                autoplay: true,
                autoplaySpeed: 4000,
                appendArrows: $(".slickArrowsNuevosInicio"),
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
        
    // });


</script>
