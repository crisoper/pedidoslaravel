<style>
    .ui-autocomplete {
  font-family: Arial, Helvetica, sans-serif; 
  font-size: 0.9rem;
  color:#141414;
}
</style>
<script>

    $( document ).ready( function () {

        $("#imagenmuestra").hide();

        $('#categoriaid').select2({
            placeholder: "Seleccione categoría",
            theme: 'bootstrap4'
        });
        $('#tagid').select2({
            placeholder: "Selccione Tag",
            theme: 'bootstrap4'
        });

        $("#iconoMas").on('click',function(){            
            $("#fotoproducto").trigger("click");
            $("#errorextension").hide();
        });

        setTimeout( function() {
            $("#errorextension").hide();
        }, 900);
     

        $('#fotoproducto').fileinput({
            language: 'es',
            allowedFileExtensions: ['jpg', 'png', 'jpeg', 'svg'],
            maxFileSize: 1000,
            showUpload: false,
            showClose: false,
            initialPreviewAsData: true,
            dropZoneEnabled: false,
            theme: 'fas',
        });


        $("#cargarfoto").on('click',function(){
            $("#fotoproducto").trigger("click");
            $("#previewImg").hide();
        })



        $("#file-1").on('change', function(event){
             event.preventDefault();
             var fileInput = document.getElementById('fotoproducto');
             var filePath = fileInput.value;
             var allowedExtensions = /(.jpg|.jpeg|.png)$/i;             
             if(!allowedExtensions.exec(filePath)){
                 $("#errorextension").show();
                 fileInput.value = '';
                 return false;
             }else{
                if (fileInput.files && fileInput.files[0]) {
                     var reader = new FileReader();
                     reader.onload = function(e) {
                         $('#imagePreview').html('<img id="vistaimg" src="'+e.target.result+'"/>');
                         $(".imgLiquid").imgLiquid({fill:true});
                     };
                     reader.readAsDataURL(fileInput.files[0]);
                     }
             }
        });
      
        //Cargo las imagenes del input y le digo que ejecute el metodo preview
        // var upload = document.getElementById("fotoproducto");
        // upload.addEventListener("change", preview, false);

        function preview() {
            $('#preview').html("");
            //Obtengo las imagenes subidas
            var fotosArray = this.files;
            if (fotosArray.length > 5) {
                alert("¡ATENCIÓN! Solo se permite como máximo 4 imagenes del producto. Por favor vuelva a seleccionar.");
            } else{
                var anyWindow = window.URL || window.webkitURL;
                //Como puedo subir multimples archivos, hago un for para recorrer todo lo subido
                for (var i = 0; i < fotosArray.length; i++) {
                    
                    var objectUrl = anyWindow.createObjectURL(fotosArray[i]);                                     
                    $("#preview").append("<div class='boxSep' id='img-'"+i+"''><div class='' style='width:100px; height:100px;'><img class='uploaded_foto img-thumbnail' src='"+ objectUrl + " '/>  <div><div>");
                   
                    window.URL.revokeObjectURL(fotosArray[i]);
                }
            }
        } 
        // $(".imgLiquid").imgLiquid({fill:true});
        $('body #preview').on('click', 'img', function(){
            
            var src = $(this).prop('src');
            $('#vistaimg').attr('src',  src);
            $('#imagePreview').html("<img id='vistaimg'  src='" + src + " '/>");

        });
            $(".imgLiquid").imgLiquid({fill:true});
     

        
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
            },           
            );


    });

</script>