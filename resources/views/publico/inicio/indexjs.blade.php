<script>
    $(document).ready(  function () {

        $(".btnBuscarProductos").on("click", function( e ) {
            e.preventDefault();

            $("#listaproductos").html("");
            obtenerProductos( "{{ route('ajax.productos.inicio') }}" );
        })

        //Cargamos los productos inciales
        obtenerProductos( "{{ route('ajax.productos.inicio') }}" );


        function mostrarProductosPagina( data ) {
            // console.log(data.data);

            $("#listaproductos").find(".cargarproductos").remove();

            let html = '';
            $.each( data.data, function( key, producto ) {

                let tags = '';

                $.each( producto.tags, function( key, tag ) {
                    tags = tags + `<a href="${tag.id}" class="text-primary">${tag.nombre}</a> `;
                });

                html = html + `
                <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">${ producto.nombre }</h5>
                    <p class="card-text">${ producto.descripcion }</p>
                    <a href="${producto.categoria.id}" class="text-info">${ producto.categoria.nombre }</a>
                    <br>
                    Etiquetas:
                    <br>
                    ${ tags }
                    </div>
                </div>
                </div>`;
            });


            if ( data.links.next != null &&  data.links.next != "null" ) {

                console.log( typeof( data.links.next ), data.links.next);

                html = html + `<div class="col-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <button class="btn btn-primary cargarproductos" current_page="${ data.meta.current_page }" last_page="${ data.meta.last_page }" next="${ data.links.next }" >
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none"></span>
                                Cargar mas
                            </button>
                        </div>
                    </div>
                </div>`;

            }

            $("#listaproductos").append( html );
        }


        $("#listaproductos").on("click", ".cargarproductos", function() {

            let next = $( this ).attr( "next" );

            $( this ).find("span").show();

            if ( next != "null" ) {
                obtenerProductos( next );
            }

        })



        function obtenerProductos( link ) {

            $.ajax({
                url: link,
                method: 'GET',
                data: {
                    buscar: $("#txtBuscarProducto").val(),
                },
                success: function ( data ) {
                    mostrarProductosPagina( data )
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });

        }



        

    });


</script>


<script>
    window.addEventListener('load', () => {
        $(document).ready(function () {
            $('.slickCustom').slick({
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 3,
                centerMode: true,
                centerPadding: '60px',
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });
        });
    }, false);
</script>