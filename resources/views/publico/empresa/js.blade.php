<script>
    $(document).ready(function(){
        setTimeout( function() {
            $("#errorextension").fadeOut(1000);
        }, 5000);
       
      $("#camara").on("click", function(){
        $("#file").trigger('click');
        $("#errorextension").fadeOut();
      })

    $(".imgLiquid").imgLiquid({fill:true});

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
                $('#imagePreview').html('<img src="'+e.target.result+'"/>');
                $(".imgLiquid").imgLiquid({fill:true});
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }

   });
   $(".datetimepicker-input").datetimepicker({
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
        $( enviarFormRegistro ).prop( "disabled", true ).find("span").show();
        $.ajax({
            url: $("#formularioRegistroEmpresa").attr('action'),
            method: 'post',
            dataType: 'json',
            data: $("#formularioRegistroEmpresa").serialize(),
            success: function( user ){
                
                window.location = '{{route("confirmarcuenta")}}';
                $( enviarFormRegistro ).prop( "disabled", false ).find("span").hide();
            },
            error:function( jqXHR, textStatus, errorThrown  ){
                if( jqXHR.status == 404 ) {}
                
                else if( jqXHR.status == 422 ) 
                {     
                    $( enviarFormRegistro ).prop( "disabled", false ).find("span").hide();                    
                    GLOBARL_settearErroresEnCampos( jqXHR, "formularioRegistroEmpresa" );
                }
                else if( jqXHR.status == 429 ) 
                {   
                    // $( enviarFormRegistro ).prop( "disabled", false ).find("span").hide();
                    let dias = ['Lunes','Martes','Miercoles','Jueves','Viernes','Sabado', 'Domingo'];
                    let errorInicio = jqXHR.responseJSON.error.data['inicio'];
                    let errorFin = jqXHR.responseJSON.error.data['fin'];

                    $.each( errorInicio , function( index, diasemana ) {
                        $("#horainicio-"+ diasemana ).addClass("is-invalid");
                        $("#errorInicio-"+ diasemana ).addClass("is-invalid");
                      
                    
                    });
                    
                    $.each( errorFin , function( index, diasemana ) {
                        $("#horafin-"+ diasemana ).addClass("is-invalid");
                        $("#errorfin-"+ diasemana ).addClass("is-invalid");
                    
                    });

                    setTimeout( function() {
                        // $( enviarFormRegistro ).prop( "disabled", false ).find("span").hide();
                        $("#formularioRegistroEmpresa" ).find(".is-invalid").removeClass("is-invalid");
                    }, 5000);

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
    }, 5000);

    }
    
});
</script>
