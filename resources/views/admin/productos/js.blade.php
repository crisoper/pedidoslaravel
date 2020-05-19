
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

        $("#cargarfoto").on('click',function(){
            $("#fotoproducto").trigger("click");
            // $("#imagenmuestra").hide();
        })

        //Cargo las imagenes del input y le digo que ejecute el metodo preview
        var upload = document.getElementById("fotoproducto");
        upload.addEventListener("change", preview, false);

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
                    //Añado en una parte del form el img con la ruta de la foto
                    $("#preview").append("<div class='d-flex flex-column' col-1 id='"+fotosArray[i].name+"'><img class='uploaded_foto img-thumbnail' src='"+ objectUrl + "'width='100px' height='80px' />  <div>");
                    $('#imagenmuestra').attr('src',  objectUrl);

                    $("#imagenmuestra").show();
                    $("#imgdefault").hide();
                    window.URL.revokeObjectURL(fotosArray[i]);
                }
            console.log(fotosArray);
            }
        }

        // <button class='btn' type='button'><i class='fas fa-trash-alt' aria-hidden='true'></i></button>
        $('body #preview').on('mouseover', 'img', function(){
            var src = $(this).prop('src');
            $('#imagenmuestra').attr('src',  src);
        });
        
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
        
        $('#bntver').on('click',function(){
            var i=0;
            var fotos = fotoproducto.files;
            var fotosArray = Array.from(fotos);
            $.each(fotosArray, function(indice, elemento) {
                console.log( elemento.name );
            });
        });

        function readURL(input) {
            var fotos = fotoproducto.files;
            var fotosArray = Array.from(fotos);

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    console.log(e);
                    // Asignamos el atributo src a la tag de imagen
                    $('#imagenmuestra').attr('src', e.target.result);

                    $.each(fotosArray, function(indice, elemento) {
                        // $('#preview').attr('src', e.target.result);
                        var preview1 = "<img src='' width='100px' height='80px' data-initial-preview='#' accept='image/*'>" ;
                        $("#preview").append(preview1);
                    });
                }

                $.each(fotosArray, function(indice, elemento) {
                    reader.readAsDataURL(input.files[indice]);
                });
            }
        }

    });

</script>