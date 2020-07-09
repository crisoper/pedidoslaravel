
<script>
    
    $(document).ready(  function () {
        
        $("#filtro_ofertas").on("click", function() {
            obtenerProductosResultados();
        });
        
        $("#filtro_nuevos").on("click", function() {
            obtenerProductosResultados();
        });
        
        $("#filtro_orden_menor").on("click", function() {
            obtenerProductosResultados();
        });
        
        $("#filtro_orden_mayor").on("click", function() {
            obtenerProductosResultados();
        });
        
        $("#filtro_orden_ofertas").on("click", function() {
            obtenerProductosResultados();
        });


        $(".btn_buscar_productos").on("click", function( e ) {
            e.preventDefault();
            obtenerProductosResultados();
        });




        //OBTENER LOS PRODUCTOS
        obtenerProductosResultados( );
    
        function obtenerProductosResultados( ) {
    
            $.ajax({
                url: "{{ route('ajax.productos.busqueda.index') }}",
                method: 'GET',
                data: {
                    storagecliente_id: obtenerLocalStorageclienteID (),
                    buscarproductos: $("#txtBuscarTextoGeneral").val(),
                    filtro_nuevos: $("#filtro_nuevos").is(':checked')  ? 1 : 0,
                    filtro_ofertas: $("#filtro_ofertas").is(':checked')  ? 1 : 0,
                    filtro_orden: $("input[name='fitroorden']:checked").val(),
                },
                success: function ( data ) {
                    mostrarProductosResultados( data )
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });
    
        }
    
        function mostrarProductosResultados( datos ) {
            
            let productosHTML = "";
    
            $.each( datos.data, function( key, producto ) {

                let fotos = '';
                let contador = 0; 
                $.each( producto.fotos, function( key, foto ) {
                    contador++
                    if (contador == 2) {
                        fotos = fotos + `<img src="${ foto.url }" alt="${ foto.nombre }" class="hover-img">`;
                    } else {
                        fotos = fotos + `<img src="${ foto.url }" alt="${ foto.nombre }" class="m-0">`;
                    }
                });

                productosHTML = productosHTML + `
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="single_product_wrapper mx-2 mb-3" data-toggle="modal" data-target="#abrir_modal_producto_inicio" idproducto="${ producto.id }">

                            <div class="product-img">
                                
                                ${ fotos }

                            </div>
                            
                            <div class="featured__item__text p-2">
                                <div class="row mx-0">
                                    <div class="col-12">
                                        <p class="nombre_producto text-truncate my-0">${ producto.nombre }</p>
                                        <p class="nombre_empresa text-truncate my-0">${ producto.empresa }</p>
                                        <h4 class="content_precio_producto mt-2">
                                            S/ <span class="precio_producto">${ producto.precio }</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                `;
            });
    
            $("#cuerpoProductosResultados").html( productosHTML);
            
            contarProductosAlFiltrar();
        }



        // MOSTRAR PRODUCTO EN MODAL X ID
        $(".contenidoPrincipalPagina").on("click", ".single_product_wrapper", function() {

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
                    <button class="agregar_cart text-center hint--top" data-hint="Agregar producto a cesta" idproducto="${ data.data.id }" idempresa="${ data.data.empresa_id }">
                        <span>Agregar</span>
                        <i class="fas fa-shopping-basket"></i>
                    </button>
                `;
            } else {
                encarrito = encarrito + `
                    <button class="product_aggregate_cesta text-center hint--top hint--success" data-hint="Producto agregado en cesta" idproducto="${ data.data.id }" idempresa="${ data.data.empresa_id }">
                        <span>Agregado</span>
                        <i class="fas fa-check-circle"></i>
                    </button>
                `;
            }

            let productoModalHTML = "";
            productoModalHTML = productoModalHTML + `
                <div class="col-12">
                    <div class="row container_producto_modal">
                        <div class="col-12 mb-2">
                            <p class="m-0" id="nombre_producto_modal">${data.data.nombre}</p>
                        </div>
                        <div class="col-12">
                            <p class="content_precio_producto_modal my-0">
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
                <p class="m-0">${data.data.empresa}</p>
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



        // SUMAR, RESTAR CANTIDAD DE PRODUCTO EN MODAL
        function sumarRestarCantidadModal() {
            
            $('.input_group_unit_product').on('click', '.sumarRestarProdModal', function () {
                var botonMoreMin = $(this);

                var valorActual = botonMoreMin.parent().find('input').val();
                var precio = botonMoreMin.parents('.container_producto_modal').find('#precio_producto_modal').html();
                
                console.log(precio);

                if (botonMoreMin.hasClass('sumar')) {
                    var nuevoValor = parseFloat(valorActual) + 1;
                } else {
                    if (valorActual > 1) {
                        var nuevoValor = parseFloat(valorActual) - 1;
                    } else {
                        nuevoValor = 1;
                    }
                }

                botonMoreMin.parent().find('input').val(nuevoValor);
                botonMoreMin.parents('.container_producto_modal').find('.importe_producto_modal').html((nuevoValor * precio).toFixed(2));

            });
        }



        // CANTIDAD DE PRODUCTOS AL FILTRAR
        function contarProductosAlFiltrar() {
            let contarProductos = $('.single_product_wrapper').length;
            $(".nro_productos_buscados").html(contarProductos);
        }


    });


</script>
