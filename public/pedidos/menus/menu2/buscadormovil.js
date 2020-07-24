

$(document).ready(function () {
    "use strict";

    // :: Header Cart Active Code
    var cartbtn1 = $("#mostrar_search_movil_menu");
    var cartOverlay = $(".content_modal_search_movil");
    var cartWrapper = $(".sidebar_modal_search_movil_right");
    var cartbtn2 = $("#close_sidebar_search_movil");
    var cartOverlayOn = "content_modal_search_movil_on";
    var cartOn = "sidebar_modal_search_movil_right_on";

    cartbtn1.on("click", function () {
        cartOverlay.toggleClass(cartOverlayOn);
        cartWrapper.toggleClass(cartOn);
        $("body").css({
            overflow: "hidden",
            height: "100%",
        });
    });

    cartOverlay.on("click", function () {
        $(this).removeClass(cartOverlayOn);
        cartWrapper.removeClass(cartOn);
        $("body").css({
            overflow: "auto",
            height: "auto",
        });
    });

    cartbtn2.on("click", function () {
        cartOverlay.removeClass(cartOverlayOn);
        cartWrapper.removeClass(cartOn);
        $("body").css({
            overflow: "auto",
            height: "auto",
        });
    });
});
