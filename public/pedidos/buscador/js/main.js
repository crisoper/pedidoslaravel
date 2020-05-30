(function ($) {

    // Search Toggle
    $("#search_input_box").hide();
    $("#search_1").on("click", function () {
        $("#search_input_box").slideToggle();
        // $("#search_input").focus();
    });
    $("#close_search").on("click", function () {
        $("#search_input_box").slideUp(500);
    });
    
})(jQuery);
(function ($) {

    // Search Toggle
    $("#search_input_box").hide();
    $("#search_2").on("click", function () {
        $("#search_input_box").slideToggle();
        // $("#search_input").focus();
    });
    $("#close_search").on("click", function () {
        $("#search_input_box").slideUp(500);
    });
    
})(jQuery);



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

