jQuery(document).ready(function() {
	
	jQuery(".front-slider").slick({
		speed: 1000,
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		dots: false,
		fade: true,
		mobileFirst: true,
		responsive: [
		    {
		      breakpoint: 640,
		      settings: {
		        arrows: true
		      }
		    }
		]

	});
	
});