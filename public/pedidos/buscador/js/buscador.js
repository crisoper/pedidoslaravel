(function ($) {

    // Search Toggle
    $("#search_input_box").hide();

    $("#header_search_movil").on("click", function () {
        $("#search_input_box").slideToggle();
        // $("#search_input").focus();
    });
    

    $("#close_search").on("click", function () {
        $("#search_input_box").slideUp(500);
    });
    
})(jQuery);



