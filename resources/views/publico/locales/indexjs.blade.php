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
                    console.log( data );  
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });

        }




    });
</script>