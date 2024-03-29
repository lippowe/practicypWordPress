(function($) {
  'use strict';
  
	if($("body").hasClass("slider6")){
		$('.sevrice2-wrap').owlCarousel({
			loop:true,
			margin:30,
			nav:true,
			dots:false,
			autoplayHoverPause:true,
			autoplay:true,
			navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
			responsive:{
				0:{
					items:1
				},
				575:{
					items:2
				},
				768:{
					items:2
				},
				1024:{
					items:3
				},
				1199:{
					items:4
				}
			}
		});
	}
}(jQuery));
