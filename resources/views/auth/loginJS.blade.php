<script>
    $(document).ready(function(){

    if ( $("#login").hasClass('active') ) {
        $(".li_login").attr('style','border-bottom:3px solid #000 !important; ');
    }
   
    if ( $("#register").hasClass('active') ) {
        $(".li_register").attr('style','border-bottom:3px solid #000 !important; color: #000 !important;');
    }
   
    $(".li_login").on('click', function(){
        $(".li_login").attr('style','border-bottom:3px solid #000 !important; color: #000 !important; font: bold !important;')
        $(".li_register").removeAttr('style');
    });
    
    $(".li_register").on('click', function(){
        $(".li_register").attr('style','border-bottom:3px solid #000 !important; color: #000 !important; font: bold !important;');
        $(".li_login").removeAttr('style');         

    })
  
    $('#aceptarterminos').on('click', function() {
            $("#btn_submit").removeAttr("disabled");
           
    });

    // $('#terminosycondiciones').on('change', function() {
    //      if( $(this).prop('checked') ) {
            
           
    //         $("#btn_submit").removeAttr("disabled");
    //      }  else{
    //         $("#btn_submit").attr('disabled','disabled');
    //      }
    // });
    
    
    $("#btn_submit").on('click', function(event){
        event.preventDefault();
        $( btn_submit ).prop( "disabled", true ).find("span").show();

        $.ajax({
            url: $("#Form_RegistroComprador").attr('action'),
            method: 'post',
            dataType: 'json',
            data: $("#Form_RegistroComprador").serialize(),
            success: function(){             
                window.location = '{{route("confirmarcuentaRegistrada")}}';
                $( btn_submit ).prop( "disabled", false ).find("span").hide();
            },
            error:function( jqXHR, textStatus, errorThrown  ){
                if( jqXHR.status == 404 ) {}
                
                else if( jqXHR.status == 422 ) 
                {     
                    $( btn_submit ).prop( "disabled", false ).find("span").show(); 
                    $( ".spinnerr" ).hide(); 

                    GLOBARL_settearErroresEnCampos( jqXHR, "Form_RegistroComprador" );
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

    function obtenerLocalStorageclienteID () {
    if(typeof(Storage) !== "undefined") {
        if ( !localStorage.LocalStorageclienteID ) {
            $.ajax({
                url: '{{ route("localstorage.index") }}',
                method: 'GET',
                data: { },
                success: function ( data ) {
                    localStorage.LocalStorageclienteID = data
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });
        }
        return localStorage.LocalStorageclienteID;
    } 
    else {
        return false;
    }
}
           
});
</script>