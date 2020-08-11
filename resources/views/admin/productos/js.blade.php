<style>
    .ui-autocomplete {
        font-family: Arial, Helvetica, sans-serif; 
        font-size: 0.9rem;
        color:#141414;
    }
</style>

<script>

    $( document ).ready( function () {

        $('#categoriaid').select2({
            placeholder: "Seleccione categoría",
            theme: 'bootstrap4'
        });
        $('#tagid').select2({
            placeholder: "Selccione Tag",
            theme: 'bootstrap4'
        });
        
        //cargamos categorias
        $( "#categoriasName" ).autocomplete({
            source: function(request, response){
                $.ajax({
                    url:"{{ route('categorias.getCategorias') }}",
                    dataType:"json",
                    method:"get",
                    data:{name: request.term },
                    success: function(data){
                        response($.map(data[1], function(item){
                            return {
                                id: item.id,
                                value: item.nombre,
                            }
                        }))
                    }
                });
            }, 
            select: function( event, ui ){
                $(this).val(ui.item.value);
                $( "#categoriasId" ).val(ui.item.id);
            },
            minLength:1,
            autoFocus: true,
        });


        //CARGAMOS TAGS        
        $( "#tagName" ).autocomplete({
            source: function(request, response){
                $.ajax({
                    url:"{{ route('tags.getTags') }}",
                    dataType:"json",
                    method:"get",
                    data:{name: request.term },
                    success: function(data){
                        response($.map(data[1], function(item){
                            return {
                                id: item.id,
                                value: item.nombre,
                            }
                        }))                            
                    }
                });
            },
            select: function( event, ui ){
                $(this).val(ui.item.value);
                $( "#tagId" ).val(ui.item.id);
            },
            minLength:1,
            autoFocus: true,                      
        });


    });

</script>