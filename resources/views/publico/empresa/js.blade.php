<script>
    $(document).ready(function(){
        setTimeout( function() {
            $("#errorextension").fadeOut(1000);
        }, 5000);
       
      $("#camara").on("click", function(){
        $("#file").trigger('click');
        $("#errorextension").fadeOut();
      })

   $("#file").on('change', function(event){
   
    event.preventDefault();
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    var allowedExtensions = /(.jpg|.jpeg|.png)$/i;
    if(!allowedExtensions.exec(filePath)){
        $("#errorextension").show();
      
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }

   });

        function fileValidation(){
  
}

        $('#horainicio').datetimepicker({
            format: 'LT'
        })
        $('#horafin').datetimepicker({
            format: 'LT'
        })
        $('#hora').datetimepicker({
            format: 'LT'
        })

    $('#departamentoid').select2({
            placeholder: "Departamento"
    });
    $('#provinciaid').select2({
            placeholder: "Provincia"
    });
    $('#distritoid').select2({
            placeholder: "Distrito"
    });
    $('#rubro_id').select2({
            placeholder: "Rubro"
    });
   
    $('#departamentoid').on("change", function () {

    let elemento = this;

    $.ajax({
        url: "{{ route('ajax.getprovinciaByDepartamentoId') }}",
        method:'GET',
        dataType:'json',
        data: {
            departamento_id : $( elemento ).val()
        },
        success: function( resp ){
            //console.log( resp );
            $("#provinciaid").html(""); 

            $.each( resp.data, function( key, value ) {

                let opcion = `<option value="${ value.id }">${ value.nombre }<option>`;
                $("#provinciaid").append( opcion ); 
            });

            $('#provinciaid').trigger("change");

        },
        error:  function( jqXHR, textStatus, errorThrown ) {
            $("#provinciaid").html(""); 
            console.log( jqXHR );
        }

    });

    });
        
        
    
    $('#provinciaid').on("change", function () {
    
    let elemento = this;
    
    $.ajax({
        url: "{{ route('ajax.getdistritosByProvinciaId') }}",
        method:'GET',
        dataType:'json',
        data: {
            provincia_id : $( elemento ).val()
        },
        success: function( resp ){
        
            $("#distritoid").html(""); 
            $.each( resp.data, function( key, value ) {
                let opcion = `<option value="${ value.id }">${ value.nombre }<option>`;
                $("#distritoid").append( opcion ); 
            });
            
        },
        error:  function( jqXHR, textStatus, errorThrown ) {
            $("#distritoid").html(""); 
          
        }
    
    });
    
    });
    
    
    $("#enviarFormRegistro").on('click', function(event){
        event.preventDefault();
        $.ajax({
            url: $("#formularioRegistroEmpresa").attr('action'),
            method: 'post',
            dataType: 'json',
            data: $("#formularioRegistroEmpresa").serialize(),
            success: function( user ){
                
                window.location = '{{route("confirmarcuenta")}}';
          
            },
            error:function( jqXHR, textStatus, errorThrown  ){
                if( jqXHR.status == 404 ) {}
                
                else if( jqXHR.status == 422 ) 
                {                        
                    GLOBARL_settearErroresEnCampos( jqXHR, "formularioRegistroEmpresa" );
                }
                else if( jqXHR.status == 429 ) 
                {   
                    let dias = ['Lunes','Martes','Miercoles','Jueves','Viernes','Sabado', 'Domingo'];
                    let error = jqXHR.responseJSON.error.data;
                     
                        for (let i = 1; i <= dias.length; i++) {
                          if (error.fin[i - 1] == dias[i - 1]) {                        
                            $("#horafin-"+ i ).val( 'ok' );
                          
                          }
                        }     
                }  
            }
        });
    });
    function GLOBARL_settearErroresEnCampos( jqXHR, idElementoContenedorCampos ) {

    //Mostramos errores devueltos desde Backend
    let errorsRespuesta = jqXHR.responseJSON.errors;

    $.each( errorsRespuesta, function( idElemento, arrayErrores ) {
           

        if( $( "#" + idElemento ).hasClass("select2") ) {
            $( "#" + idElemento ).parent().find("span.select2-container").addClass("is-invalid");
            $( "#" + idElemento ).parent().find(".select2-selection").addClass("is-invalid");
           
        }
       
            
        $( "#" + idElemento ).addClass("is-invalid");
            arrayErrores.forEach( error => {
            // MostrarNotificaciones( $("#obligatorio").val() ,  'error') ;
        });

    });

    //Ocultamos los errores despues de 5 segundos
    setTimeout( function() {
    
        $("#" + idElementoContenedorCampos).find(".is-invalid").removeClass("is-invalid");
    }, 7000);

    }
    
});
</script>
