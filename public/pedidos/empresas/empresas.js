
$(document).ready(function () {
    $(".slickempresas").slick({
        dots: true,
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        speed: 500,
        autoplay: true,
        autoplaySpeed: 4000,
        appendArrows: $(".slickCustomEmpresas"),
        prevArrow:
            '<button class="slick-prev" type="button"><i class="fa  fa-angle-left"></i></button>',
        nextArrow:
            '<button class="slick-next" type="button"><i class="fa  fa-angle-right"></i></button>',
    });
});





$(document).ready(function () {
    "use strict";

    // :: Header Cart Active Code
    var cartbtn1 = $(".btn_filtrar_locales");
    var cartOverlay = $(".content_modal_filtrar_locales");
    var cartWrapper = $(".sideban_modal_filtrar_locales_right");
    var cartbtn2 = $("#close_sidebar_filtrar_locales");
    var cartOverlayOn = "content_modal_filtrar_locales_on";
    var cartOn = "sideban_modal_filtrar_locales_right_on";

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
