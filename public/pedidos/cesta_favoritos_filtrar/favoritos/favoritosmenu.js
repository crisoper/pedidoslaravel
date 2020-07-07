

$(document).ready(function () {
    "use strict";

    // :: Header Cart Active Code
    var cartbtn1 = $("#mostrar_favoritos_menu");
    var cartOverlay = $(".content_modal");
    var cartWrapper = $(".sideban_modal_right");
    var cartbtn2 = $("#close_sidebar");
    var cartOverlayOn = "content_modal_on";
    var cartOn = "sideban_modal_right_on";

    cartbtn1.on("click", function () {
        cartOverlay.toggleClass(cartOverlayOn);
        cartWrapper.toggleClass(cartOn);
    });

    cartOverlay.on("click", function () {
        $(this).removeClass(cartOverlayOn);
        cartWrapper.removeClass(cartOn);
    });

    cartbtn2.on("click", function () {
        cartOverlay.removeClass(cartOverlayOn);
        cartWrapper.removeClass(cartOn);
    });
});
