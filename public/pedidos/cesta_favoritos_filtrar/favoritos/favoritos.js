

$(document).ready(function () {
    "use strict";

    // :: Header Cart Active Code
    var cartbtn1 = $("#btn_open_favorites");
    var cartOverlay = $(".content_modal");
    var cartWrapper = $(".sideban_modal_right");
    var cartbtn2 = $("#close_sidebar");
    var cartOverlayOn = "content_modal_on";
    var cartOn = "sideban_modal_right_on";

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
