$(document).ready(function () {
	
    $(document).on("click", ".dropdown-menu", function (e) {
      e.stopPropagation();
    });
  
    if ($(window).width() < 992) {
      $(".has-submenu a").click(function (e) {
        e.preventDefault();
        $(this).next(".megasubmenu").toggle();
  
        $(".dropdown").on("hide.bs.dropdown", function () {
          $(this).find(".megasubmenu").hide();
        });
      });
    }
  });
  


(function ($) {

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    //Humberger Menu
    $(".humberger__open").on('click', function () {
        $(".humberger__menu__wrapper").addClass("show__humberger__menu__wrapper");
        $(".humberger__menu__overlay").addClass("active");
        $("body").addClass("over_hid");
    });

    $(".humberger__menu__overlay").on('click', function () {
        $(".humberger__menu__wrapper").removeClass("show__humberger__menu__wrapper");
        $(".humberger__menu__overlay").removeClass("active");
        $("body").removeClass("over_hid");
    });

    //MENU MOVIL
    const navExpand = [].slice.call(document.querySelectorAll('.nav_expanded'))
    const backLink = `<li class="nav-item">
        <a class="nav_link regresar_menu" href="javascript:;">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </li>`

    navExpand.forEach(item => {
        item.querySelector('.nav_expand_content').insertAdjacentHTML('afterbegin', backLink)
        item.querySelector('.nav_link').addEventListener('click', () => item.classList.add('active'))
        item.querySelector('.regresar_menu').addEventListener('click', () => item.classList.remove('active'))
    })
    

})(jQuery);


  