

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="{{ asset('adminlte301/js/adminlte.js') }}"></script>
<script src="{{ asset('adminlte301/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('adminlte301/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte301/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

<script src="{{ asset('adminlte301/plugins/bootbox/bootbox.min.js') }}"></script>
<script src="{{ asset('adminlte301/plugins/messeger/js/messenger.min.js') }}"></script>
<script src="{{ asset('adminlte301/plugins/messeger/js/messenger-theme-flat.js') }}"></script>

<script src="{{ asset('Plugins\bootstrap-switch\js\bootstrap-switch.min.js')}}"> </script>
<script src="{{ asset('Plugins\bootstrap4-toggle-3.6.1\js\bootstrap4-toggle.min.js')}}"> </script>


{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js" integrity="sha256-8zyeSXm+yTvzUN1VgAOinFgaVFEFTyYzWShOy9w7WoQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js" integrity="sha256-nZaxPHA2uAaquixjSDX19TmIlbRNCOrf5HO1oHl5p70=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
{{-- <script src="{{ asset('adminlte301/plugins/select2/js/select2.min.js') }}"></script> --}}

<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

<script>
  
    var urlabuscar = '{{ str_replace( request()->path(), "", request()->url() ).substr( Route::currentRouteName(), 0, (  strpos( Route::currentRouteName(), '.' ) ? strpos( Route::currentRouteName(), '.' ) : 0  ) ) }}';

    if( document.location.pathname != '/home')
    {
      var len = $('a[href="'+ urlabuscar +'"]')
                  .addClass('active', function( ) {
                    if ( ! $(this).hasClass("nav-link") ) {
                      $( this ).removeClass("active");
                    }
                  })
                  .parents('ul .siderbar-custom')
                  .css({"display":"block"})
                  .length;
      if (len <= 0) {
        // console.log("No encontrado")
      }
    }

    //Almacenando en LocalStorage el estado de la barra lateral
    $(document).ready(function(){    
        
        $('.showHideSideBar').on("click", function(){
            validarShowHideSideBar( true );
        });

        function validarShowHideSideBar( cambiarEstado ) {

            if ( localStorage.showHideSideBar == undefined ) {
                localStorage.setItem("showHideSideBar", "sidebar-collapse");
            }

            if ( cambiarEstado ) {
                if( localStorage.getItem("showHideSideBar") == "sidebar-collapse" ) {
                    localStorage.setItem("showHideSideBar", "");
                }
                else {
                    localStorage.setItem("showHideSideBar", "sidebar-collapse");
                }
            }
            else {
                if( localStorage.getItem("showHideSideBar") == "sidebar-collapse" ) {
                    $("body").addClass("sidebar-collapse");
                }
                else {
                    $("body").removeClass("sidebar-collapse");
                }
            }

        }

        validarShowHideSideBar( false );

    });


</script>