

$(document).ready(function () {
    "use strict";

    // :: Header Cart Active Code
    var cartbtn1 = $("#mostrar_menumovil");
    var cartOverlay = $(".content_modal_menumovil");
    var cartWrapper = $(".sidebar_modal_menumovil_left");
    var cartbtn2 = $("#close_sidebar_menumovil");
    var cartOverlayOn = "content_modal_menumovil_on";
    var cartOn = "sidebar_modal_menumovil_left_on";

    cartbtn1.on("click", function () {
        cartOverlay.toggleClass(cartOverlayOn);
        cartWrapper.toggleClass(cartOn);
        // $("body").css({
        //     overflow: "hidden",
        //     height: "100%",
        // });
    });

    cartOverlay.on("click", function () {
        $(this).removeClass(cartOverlayOn);
        cartWrapper.removeClass(cartOn);
        // $("body").css({
        //     overflow: "auto",
        //     height: "auto",
        // });
    });

    cartbtn2.on("click", function () {
        cartOverlay.removeClass(cartOverlayOn);
        cartWrapper.removeClass(cartOn);
        // $("body").css({
        //     overflow: "auto",
        //     height: "auto",
        // });
    });
});
