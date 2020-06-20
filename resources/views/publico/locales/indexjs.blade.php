<script>
    $(document).ready( function() {
        
        obtnerProductosLocales();

        function obtnerProductosLocales() {
            
            $.ajax({
                url: "{{ route('ajax.locales.productos') }}",
                method: 'GET',
                data: {
                    storagecliente_id: obtenerLocalStorageclienteID(),
                    buscar: $("#txtBuscarTextoGeneral").val(),
                    empresa_id: $("#idlocal").attr("idlocal"),
                },
                success: function ( data ) { 
                    mostrarProductosEmpresa( data.recomendados );
                    // mostrarProductosEmpresa( data.ofertas );
                    // mostrarProductosEmpresa( data.nuevos );
                    // mostrarProductosEmpresa( data.maspedidos );
                    // console.log( data );
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });

        }

        

        function mostrarProductosEmpresa( datos ) {

            console.log(datos);

            $("#cuerpoProductosEmpresas").html();
    
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
                        <button class="agregar_lista_deseos  hint--top-right" data-hint="Agregar a lista de deseos" idproducto="${ recomendados.id }">
                            <i class="fa fa-heart"></i>
                        </button>
                    </div>`;
                } else {
                    enlistadeseos = enlistadeseos + `<div class="col-2 p-0">
                        <button class="product_agreggate_listadeseos hint--top-right hint--success" data-hint="Agregado a lista de deseos" idproducto="${ recomendados.id }">
                            <i class="fa fa-heart"></i>
                        </button>
                    </div>`;
                }

                let encarrito = '';
                if (recomendados.encarrito == false) {
                    encarrito = encarrito + `<div class="col-8 p-0">
                        <button class="agregar_cart hint--top" data-hint="Agregar producto a cesta" idproducto="${ recomendados.id }">
                            <span>Agregar</span>
                            <i class="fas fa-shopping-basket"></i>
                        </button>
                    </div>`;
                } else {
                    encarrito = encarrito + `<div class="col-8 p-0">
                        <button class="product_aggregate_cesta hint--top hint--success" data-hint="Producto agregado en cesta" idproducto="${ recomendados.id }">
                            <span>Agregado</span>
                            <i class="fas fa-check-circle"></i>
                        </button>
                    </div>`;
                }

                recomendadosHTML = recomendadosHTML + `
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-4">
                        <div class="single_product_wrapper p-0">
                            <div class="product-img">
                                ${ fotos }
                            </div>

                            <!-- Product Description -->
                            <div class="featured__item__text container_product_cart px-2 pt-2 mb-0">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="text-truncate my-0">${ recomendados.nombre }</p>
                                    </div>
                                </div>
                                <hr class="mt-3 mb-0">
                                <div class="row px-2">
                                    <div class="col-6 pt-1 pb-2 px-0 m-0" id="price_product_border">
                                        <p class="price_product_prev text-muted py-0 my-0">
                                            S/ <span>20.90</span>
                                        </p>
                                        <h4 class="price_product_unit my-0">
                                            S/ <span>${ recomendados.precio }</span>
                                        </h4>
                                    </div>
                                    <div class="col-6 pt-1 pb-2 px-2 m-0">
                                        <p class="import_price text-muted py-0 my-0">
                                            Importe: <b>S/ <span>15.90</span></b>
                                        </p>
                                        <div class="input-group input_group_unit_product">
                                            <button class="input-group-prepend minus MoreMinProd">-</button>
                                            <input type="text" class="form-control input_value_cart" value="1">
                                            <button class="input-group-append more MoreMinProd">+</button>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mt-0 mb-2">
                                <div class="row modal_lista_cart mx-1 mb-2">
                                    <div class="col-2 p-0">
                                        <button class="modal_productos_x_empresa hint--top-right" data-hint="Detalle de producto" data-toggle="modal" data-target="#modal_productos_x_empresa" idproducto="${ recomendados.id }">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </div>
                                    ${ enlistadeseos }
                                    ${ encarrito }
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });
    
            $("#cuerpoProductosEmpresas").html( recomendadosHTML);
            sumarRestarCantidad();
        }


        function sumarRestarCantidad() {
            
            $('.input_group_unit_product').on('click', '.MoreMinProd', function () {
                var botonMoreMin = $(this);
                var oldValue = botonMoreMin.parent().find('input').val();
                if (botonMoreMin.hasClass('more')) {
                    var newVal = parseFloat(oldValue) + 1;
                } else {
                    // Don't allow decrementing below zero
                    if (oldValue > 1) {
                        var newVal = parseFloat(oldValue) - 1;
                    } else {
                        newVal = 1;
                    }
                }

                botonMoreMin.parent().find('input').val(newVal);
            });
        }
        
        

        $(".contenidoPrincipalPagina").on("click", ".modal_productos_x_empresa", function() {

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
            // console.log( data );

            $("#titulo_producto_modal").html( data.data.nombre ); 
            $("#descripcion_producto_modal").html( data.data.descripcion );
            $("#precio_modal_lista_deseos_span").html( data.data.precio );
            $("#stock_modal_span").html( data.data.stock );

            crearImagenesProducto( data.data.fotos );

        }



        function crearImagenesProducto( fotos ) {

            let html = ""; 
            $.each( fotos, function( key, foto ) {        
                html = html + `
                    <a class="lightbox" href="#${ foto.nombre }">
                        <img src="${ foto.url }">
                    </a>
                    <div class="lightbox-target" id="${ foto.nombre }">
                        <img src="${ foto.url }">
                        <a class="lightbox-close" href="#"></a>
                    </div>
                `
            });

            $("#imagenes_producto_modal").html( html );

        }

    });
</script>