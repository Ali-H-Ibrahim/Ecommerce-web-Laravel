(function ($) {
	"use strict";



	/* ..............................................
	   Slider Range
	   ................................................. */

	$(function () {
		$("#slider-range").slider({
			range: true,
			min: 0,
			max: 4000,
			values: [1000, 3000],
			slide: function (event, ui) {
				$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
			}
		});
		$("#amount").val("$" + $("#slider-range").slider("values", 0) +
			" - $" + $("#slider-range").slider("values", 1));
	});

	/* ..............................................
	   NiceScroll
	   ................................................. */

	$(".brand-box").niceScroll({
		cursorcolor: "#9b9b9c",
	});


}(jQuery));