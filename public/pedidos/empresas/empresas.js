
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