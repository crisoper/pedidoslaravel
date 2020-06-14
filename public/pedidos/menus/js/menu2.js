

$(document).ready(function () {
    $(".dropdown-submenu a.submenu_categorias").on("click", function (e) {
        $(this).next("ul").toggle();
        e.stopPropagation();
        e.preventDefault();
    });
    
    $(".js-scroll-trigger").on("click", function () {
        $("#menuCategorias").hide();
    });

});
