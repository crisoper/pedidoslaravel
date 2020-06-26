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
                    $( enviarFormRegistro ).prop( "disabled", false ).find("span").show(); 
                    $( ".spinnerr" ).hide(); 

                    GLOBARL_settearErroresEnCampos( jqXHR, "formularioRegistroEmpresa" );
                }
                else if( jqXHR.status == 429 ) 
                {   
                    $( enviarFormRegistro ).prop( "disabled", false ).find("span").show();
                    $( ".spinnerr" ).hide(); 

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
            MostrarNotificaciones( error ,  'error') ;
        });

    });

    //Ocultamos los errores despues de 5 segundos
    setTimeout( function() {
    
    $("#" + idElementoContenedorCampos).find(".is-invalid").removeClass("is-invalid");
    }, 5000);

    }
    for (let i = 1; i < 8; i++) {

        var horainicio =   $('input[name="horainicio['+i+']"]').val() ;
        var horafinn =   $('input[name="horafin['+i+']"]').val();
        var valorminimo = 0;
        var valormaximo = 1440;

        $('input[name="dias['+i+']"]').on('change', function() {
                if( $(this).prop('checked') ) {
                     $('div[name="slider-range['+i+']"]').show();
                     $('input[name="horainicio['+i+']"]').show();
                     $('input[name="horafin['+i+']"]').show();
                     $('input[name="horainicio['+i+']"]').val('12:00 AM');
                     $('input[name="horafin['+i+']"]').val('11:59 PM');
                     valorminimo = 0;
                     valormaximo = 1440;
               }else{
                    $('div[name="slider-range['+i+']"]').hide();
                    $('input[name="horainicio['+i+']"]').hide();
                    $('input[name="horafin['+i+']"]').hide();
                    $('input[name="horainicio['+i+']"]').val('');
                    $('input[name="horafin['+i+']"]').val('');
               }
    });
   
    let indicehorainicio = horainicio.indexOf(":");
    let indiceminutosinicio = horainicio.indexOf(" ");
    let horainicioextraida = horainicio.substring(0, indicehorainicio);
    let minutosinicioextraida = horainicio.substring(indicehorainicio +  1, indiceminutosinicio);
    let AmPmhoraninicio =  horainicio.substring(indiceminutosinicio + 1, horainicio.length);
        valorminimo = ( parseInt(horainicioextraida) * 60 ) +  parseInt(minutosinicioextraida) ;
   
        if (AmPmhoraninicio == 'PM') {
          valorminimo = valorminimo + 720;
        }else{
         valorminimo = valorminimo + 0;
        }

  
    let indicehorafin = horafinn.indexOf(":");
    let indiceminutosfin = horafinn.indexOf(" ");
    let horafinextraida = horafinn.substring(0, indicehorafin);
    let minutosfinextraida = horafinn.substring(indicehorafin +  1, indiceminutosfin);
    let AmPmhoranfin =  $.trim(horafinn.substring( indicehorafin + 4 ,  horafinn.length));
        valormaximo = ( parseInt(horafinextraida) * 60 ) +  parseInt(minutosfinextraida) ;
    console.log(AmPmhoranfin);
    if (AmPmhoranfin == 'PM') {
     valormaximo = valormaximo + 720;
   }else{
    valormaximo = valormaximo + 0;
   }


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