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
//    $(".datetimepicker-input").datetimepicker({
//         format: 'LT'
  
//     });                   
                      
  
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
                    $( enviarFormRegistro ).prop( "disabled", false ).find("span").show(); 
                    $( ".spinnerr" ).hide(); 

                    GLOBARL_settearErroresEnCampos( jqXHR, "formularioRegistroEmpresa" );
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
            MostrarNotificaciones( error ,  'error') ;
        });

    });

    //Ocultamos los errores despues de 5 segundos
    setTimeout( function() {
    
    $("#" + idElementoContenedorCampos).find(".is-invalid").removeClass("is-invalid");
    }, 5000);

    }

function slidertime(valorminimo, valormaximo, i){
         $('div[name="slider-range['+i+']"]').slider({
         range: true,   
         min: 0,
         max: 1440,
         step: 15,
         values: [valorminimo , valormaximo],
         slide: function (e, ui) {
             var hours1 = Math.floor(ui.values[0] / 60);
             var minutes1 = ui.values[0] - (hours1 * 60);

             if (hours1.length == 1) hours1 = '0' + hours1;
             if (minutes1.length == 1) minutes1 = '0' + minutes1;
             if (minutes1 == 0) minutes1 = '00';
             if (hours1 >= 12) {
                 if (hours1 == 12) {
                     hours1 = hours1;
                     minutes1 = minutes1 + " PM";
                 } else {
                     hours1 = hours1 - 12;
                     minutes1 = minutes1 + " PM";
                 }
             } else {
                 hours1 = hours1;
                 minutes1 = minutes1 + " AM";
             }
             if (hours1 == 0) {
                 hours1 = 12;
                 minutes1 = minutes1;
             }
         
             // $('div[name="slider-range['+i+']"]').on('click', function() {});            
                 $('input[name="horainicio['+i+']"]').val(hours1 + ':' + minutes1);
             // $('.slider-time').html(hours1 + ':' + minutes1);       

         
             var hours2 = Math.floor(ui.values[1] / 60);
             var minutes2 = ui.values[1] - (hours2 * 60);
         
             if (hours2.length == 1) hours2 = '0' + hours2;
             if (minutes2.length == 1) minutes2 = '0' + minutes2;
             if (minutes2 == 0) minutes2 = '00';
             if (hours2 >= 12) {
                 if (hours2 == 12) {
                     hours2 = hours2;
                     minutes2 = minutes2 + " PM";
                 } else if (hours2 == 24) {
                     hours2 = 11;
                     minutes2 = "59 PM";
                 } else {
                     hours2 = hours2 - 12;
                     minutes2 = minutes2 + " PM";
                 }
             } else {
                 hours2 = hours2;
                 minutes2 = minutes2 + " AM";
             }
         
        // $('.slider-time2').html(hours2 + ':' + minutes2);
        $('input[name="horafin['+i+']"]').val(hours2 + ':' + minutes2);
       
        }
        });
    }
});
</script>