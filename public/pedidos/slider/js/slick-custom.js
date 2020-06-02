

$(document).ready(  function () {
    // USE STRICT
    "use strict";
    
    $(".slick2").slick({
        slidesToShow: 5,
        slidesToScroll: 5,
        infinite: true,
        autoplay: true,
        autoplayTimeout: 6000,
        autoplaySpeed: 4000,
        autoplayHoverPause: true,
        arrows: true,
        appendArrows: $(".wrap-slick2"),
        prevArrow:
            '<button class="arrow-slick2 prev-slick2"><i class="fa  fa-angle-left" aria-hidden="true"></i></button>',
        nextArrow:
            '<button class="arrow-slick2 next-slick2"><i class="fa  fa-angle-right" aria-hidden="true"></i></button>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                },
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                },
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
        ],
    });

});

