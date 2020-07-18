<script>
    $(document).ready(function(){

    if ( $("#login").hasClass('active') ) {
        $(".li_login").attr('style','border-bottom:3px solid #ed3237 !important; ');
    }
   
    if ( $("#register").hasClass('active') ) {
        $(".li_register").attr('style','border-bottom:3px solid #ed3237 !important; color: #ed3237 !important;');
    }
   
    $(".li_login").on('click', function(){
        $(".li_login").attr('style','border-bottom:3px solid #ed3237 !important; color: #ed3237 !important; font: bold !important;')
        $(".li_register").removeAttr('style');
    });
    
    $(".li_register").on('click', function(){
        $(".li_register").attr('style','border-bottom:3px solid #ed3237 !important; color: #ed3237 !important; font: bold !important;');
        $(".li_login").removeAttr('style');         

    })
  

    $('#terminosycondiciones').on('change', function() {
         if( $(this).prop('checked') ) {
            
           
            $("input[type=submit]").removeAttr("disabled");
         }  else{
            $("input[type=submit]").attr('disabled','disabled');
         }
    });
    
    $("#sesionStorage").val( obtenerLocalStorageclienteID() );

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