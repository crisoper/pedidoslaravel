(function ($) {

    // Search Toggle
    $("#search_input_box").hide();
    $("#search_1").on("click", function () {
        $("#search_input_box").slideToggle();
        // $("#search_input").focus();
    });
    $("#search_2").on("click", function () {
        $("#search_input_box").slideToggle();
        // $("#search_input").focus();
    });
    $("#close_search").on("click", function () {
        $("#search_input_box").slideUp(500);
    });
    
})(jQuery);
