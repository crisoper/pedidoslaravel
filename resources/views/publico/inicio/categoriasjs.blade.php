<script>
    $(document).ready(  function () {

        obtenerListadoCategorias( "{{ route('ajax.categorias.inicio') }}" );


        function obtenerListadoCategorias( link ) {

            $.ajax({
                url: link,
                method: 'GET',
                data: {},
                success: function ( data ) {
                    console.log( data );
                    contruirMenuCategorias( data )
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });

        }

        function contruirMenuCategorias( data ) {
            
            $("#menuCategorias").html("");

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

            $("#listaproductos").append( html );

            


        }





    });
</script>