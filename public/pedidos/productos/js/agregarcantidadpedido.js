
(function ($) {
    /*-------------------		
		SUMAR O RESTAR UNIDADES DE PRODUCTO
	--------------------- */
    var proQty = $('.input_group_unit_product');
    proQty.prepend('<button class="minus MoreMinProd"><b>-</b></button>');
    proQty.append('<button class="more MoreMinProd"><b>+</b></button>');
    proQty.on('click', '.MoreMinProd', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('more')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        $button.parent().find('input').val(newVal);
    });
    
})(jQuery);