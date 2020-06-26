<script>
    
    $(document).ready( function() {


        $("#btn_realizar_pedido_cesta").on("click", function( e ) {
            e.preventDefault();

            $.ajax({
                method: "POST",
                url: $("#formNavDetallePedidoCesta").attr("action"),
                dataType: "json",
                data: $("#formNavDetallePedidoCesta").serialize() ,
                success: function( data ) {
    
                    $( buttonGuardar ).prop( "disabled", false ).find("span").hide();
                    GLOBARL_MostrarNotificaciones( data.success, "info" );
                    mesajeDatosActualizados( ) ;
    
                },
                error : function ( jqXHR, textStatus, errorThrown ) {
    
                    $( buttonGuardar ).prop( "disabled", false ).find("span").hide();
                    GLOBARL_MostrarNotificaciones( "Error, actualice la pagina y vuelva a intentarlo", "error" );
                    console.log( jqXHR );
                }
            });
        });


        $("#filtro_ofertas").on("click", function() {
            obtnerProductosLocales();
        });
        
        $("#filtro_nuevos").on("click", function() {
            obtnerProductosLocales();
        });
        
        $("#filtro_orden_menor").on("click", function() {
            obtnerProductosLocales();
        });
        
        $("#filtro_orden_mayor").on("click", function() {
            obtnerProductosLocales();
        });
        
        $("#filtro_orden_ofertas").on("click", function() {
            obtnerProductosLocales();
        });


        $(".btn_buscar_productos_x_empresa").on("click", function( e ) {
            e.preventDefault();
            obtnerProductosLocales();
        });
      


        obtnerProductosLocales();

        function obtnerProductosLocales() {
            
            $.ajax({
                url: "{{ route('ajax.locales.productos') }}",
                method: 'GET',
                data: {
                    storagecliente_id: obtenerLocalStorageclienteID(),
                    buscar: $("#txtBuscarProductosXempresa").val(),
                    empresa_id: $("#idlocal").attr("idlocal"),
                    filtro_nuevos: $("#filtro_nuevos").is(':checked')  ? 1 : 0,
                    filtro_ofertas: $("#filtro_ofertas").is(':checked')  ? 1 : 0,
                    filtro_orden: $("input[name='fitroorden']:checked").val(),
                },
                success: function ( data ) { 
                    mostrarProductosEmpresa( data.productosxempresa );
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });

        }

        

        function mostrarProductosEmpresa( datos ) {

            $("#cuerpoProductosEmpresas").html();
    
            let prod_x_empresaHTML = "";
    
            $.each( datos, function( key, prodxempresa ) {

                let fotos = '';

                let contador = 0; 
                
                $.each( prodxempresa.fotos, function( key, foto ) {
                    
                    contador++

                    if (contador == 2) {
                        fotos = fotos + `<img src="${ foto.url }" alt="${ foto.nombre }" class="hover-img">`;
                    } else {
                        fotos = fotos + `<img src="${ foto.url }" alt="${ foto.nombre }" class="m-0">`;
                    }

                });
                
                
                let enlistadeseos = '';
                if (prodxempresa.enlistadeseos == false) {
                    enlistadeseos = enlistadeseos + `<div class="col-2 p-0">
                        <button class="agregar_lista_deseos  hint--top-right" data-hint="Agregar a lista de deseos" idproducto="${ prodxempresa.id }" idempresa="${ prodxempresa.empresa_id }">
                            <i class="fa fa-heart"></i>
                        </button>
                    </div>`;
                } else {
                    enlistadeseos = enlistadeseos + `<div class="col-2 p-0">
                        <button class="product_agreggate_listadeseos hint--top-right hint--success" data-hint="Agregado a lista de deseos" idproducto="${ prodxempresa.id }" idempresa="${ prodxempresa.empresa_id }">
                            <i class="fa fa-heart"></i>
                        </button>
                    </div>`;
                }

                let encarrito = '';
                if (prodxempresa.encarrito == false) {
                    encarrito = encarrito + `<div class="col-8 p-0">
                        <button class="agregar_cart hint--top" data-hint="Agregar producto a cesta" idproducto="${ prodxempresa.id }" idempresa="${ prodxempresa.empresa_id }">
                            <span>Agregar</span>
                            <i class="fas fa-shopping-basket"></i>
                        </button>
                    </div>`;
                } else {
                    encarrito = encarrito + `<div class="col-8 p-0">
                        <button class="product_aggregate_cesta hint--top hint--success" data-hint="Producto agregado en cesta" idproducto="${ prodxempresa.id }" idempresa="${ prodxempresa.empresa_id }">
                            <span>Agregado</span>
                            <i class="fas fa-check-circle"></i>
                        </button>
                    </div>`;
                }

                prod_x_empresaHTML = prod_x_empresaHTML + `
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="single_product_wrapper">
                            <div class="product-img">
                                ${ fotos }
                            </div>

                            <!-- Product Description -->
                            <div class="featured__item__text container_product_cart px-2 pt-2 mb-0">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="nombre_producto my-0">${ prodxempresa.nombre }</p>
                                    </div>
                                </div>
                                <hr class="mt-1 mb-0">
                                <div class="row px-2 conten_precio_cantidad">
                                    <div class="col-6 pt-1 pb-2 px-0 m-0" id="price_product_border">
                                        <p class="price_product_prev text-muted py-0 my-0">
                                            S/ <span>20.90</span>
                                        </p>
                                        <h4 class="price_product_unit my-0">
                                            S/ <span class="precio_producto">${ prodxempresa.precio }</span>
                                        </h4>
                                    </div>
                                    <div class="col-6 pt-1 pb-2 px-2 m-0">
                                        <p class="import_price text-muted py-0 my-0">
                                            Importe: <b>S/ <span class="importe_producto">${ prodxempresa.precio }</span></b>
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
                                        <button class="modal_productos_x_empresa hint--top-right" data-hint="Detalle de producto" data-toggle="modal" data-target="#modal_productos_x_empresa" idproducto="${ prodxempresa.id }">
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
    
            $("#cuerpoProductosEmpresas").html( prod_x_empresaHTML);
            sumarRestarCantidad();
            contarProductosAlFiltrar();
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


        function sumarRestarCantidad() {
            
            $('.input_group_unit_product').on('click', '.MoreMinProd', function () {
                var botonMoreMin = $(this);

                var valorActual = botonMoreMin.parent().find('input').val();
                var precio = botonMoreMin.parents('.conten_precio_cantidad').find('.precio_producto').html();
                
                if (botonMoreMin.hasClass('more')) {
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
                botonMoreMin.parents('.conten_precio_cantidad').find('.importe_producto').html((nuevoValor * precio).toFixed(2));

            });
        }

        function contarProductosAlFiltrar() {
            let contarProductos = $('.single_product_wrapper').length;
            $(".nro_productos_buscados").html(contarProductos);
        }

    });
    

</script>