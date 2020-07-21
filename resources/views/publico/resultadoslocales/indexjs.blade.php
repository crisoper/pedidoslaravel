
<script>
    
    $(document).ready(  function () {
        
        $("#filtro_ofertas").on("click", function() {
            obtenerLocalesResultados();
        });
        
        $("#filtro_nuevos").on("click", function() {
            obtenerLocalesResultados();
        });
        

        $("#filtro_orden_defecto").on("click", function() {
            obtenerLocalesResultados();
        });

        $("#filtro_orden_alfabetico").on("click", function() {
            obtenerLocalesResultados();
        });
        
        
      
        //Obtenemos los productos en localess
        obtenerLocalesResultados( );
    
        function obtenerLocalesResultados( ) {
    
            $.ajax({
                url: "{{ route('ajax.locales.busqueda.index') }}",
                method: 'GET',
                data: {
                    buscarproductos: $("#txtBuscarTextoGeneral").val(),
                    filtro_nuevos: $("#filtro_nuevos").is(':checked')  ? 1 : 0,
                    // filtro_ofertas: $("#filtro_ofertas").is(':checked')  ? 1 : 0,
                    filtro_orden: $("input[name='fitroorden']:checked").val(),
                },
                success: function ( data ) {
                    mostrarLocalesResultados( data )
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });
    
        }
    
        function mostrarLocalesResultados( datos ) {

            // console.log(datos);

            $("#cuerpoLocalesResultados").html();
    
            let resultadosLocalesHTML = "";
    
            $.each( datos.data, function( key, locales ) {

                resultadosLocalesHTML = resultadosLocalesHTML + `
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="content_empresas">
                            <div class="row m-0 logos_banners_empresas">
                                <div class="col-12 p-0 mx-auto content_logo_empresas">
                                    <img class="producto_1" src="{{asset('pedidos/image/productos/comida1.jpg')}}" alt="">
                                    <img class="logo_empresas" src="${ locales.logo }" alt="">
                                    <img class="producto_1" src="{{asset('pedidos/image/productos/comida2.jpg')}}" alt="">
                                </div>
                                <div class="col-12 p-0 banner_empresas">
                                    <img src="{{asset('pedidos/image/banners/banner2.jpg')}}" alt="">
                                </div>
                            </div>
                            
                            <div class="content_informacion_empresas">
                                <div class="row m-0">
                                    <div class="col-12 mb-2 content_nombre_empresas">
                                        <h6 class="m-0 text-truncate">${ locales.nombrecomercial }</h6>
                                    </div>
                                    <div class="col-12">
                                        <hr class="mt-0 mb-0">
                                    </div>
                                    <div class="col-12">
                                        <div class="row m-0 content_especialidad_empresas">
                                            <div class="col-3 py-1 px-0 border__empresas">
                                                <p class="m-0 rubro_empresas">${ locales.rubro }</p>
                                            </div>
                                            <div class="col-6 py-1 px-0 border__empresas">
                                                <p class="m-0 text_transform">${ locales.departamentoid } | ${ locales.provincia }</p>
                                                <p class="m-0 text_transform">${ locales.distrito }</p>
                                            </div>
                                            <div class="col-3 py-1 px-0">
                                                <p class="m-0 ">Reservaciones <br> Delivery</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <hr class="mt-0 mb-2">
                                    </div>
                                    <div class="col-12 pb-2 content_visitar_empresas">
                                        <a href="${ locales.empresa_url }">
                                            Visitar restaurante <i class="fas fa-angle-double-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });
    
            $("#cuerpoLocalesResultados").html( resultadosLocalesHTML);
            contarLocalesAlFiltrar();
        }


        function contarLocalesAlFiltrar() {
            let contarProductos = $('.content_empresas').length;
            $(".nro_locales_buscados").html(contarProductos);
        }



    });


</script>
