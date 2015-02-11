;(function($){

	$('.rslides').each(function(){

		$(this).responsiveSlides({ 
			auto: true, 
			pager: false, 
			nav: true, 
			speed: 500,
			namespace: "callbacks"
		}); 
	});

})(jQuery);