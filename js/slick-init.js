jQuery(document).ready(function($) {

	var $slick_slider;
	var $settings;
	var $sliderbtn;	
	var $next;	
	var $prev;	
	
	$slick_slider = $('.front-slider');
	$sliderbtn = '<img src="/wp-content/themes/fs-company/img/slick-arrow-2.svg" alt="">';
	
	if ( $('html').attr('lang') === 'fr-FR' ) {
		$next = 'Panneau suivant';
		$prev = 'Panneau précédent';
	} else {
		$next = 'Next Slide';
		$prev = 'Previous Slide';
	}
	
	$settings = {
		speed: 1000,
  		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: true,
		dots: false,
		fade: true,
		infinite: true,
		nextArrow: '<button type="button" class="slick-next slick-arrow" aria-label="'+$next+'">'+$sliderbtn+'</button>',
		prevArrow: '<button type="button" class="slick-prev slick-arrow" aria-label="'+$prev+'">'+$sliderbtn+'</button>',
		mobileFirst: true,
		responsive: [
		    {
		      breakpoint: 720,
		      settings: {
		      }
		    }
		]
	};
	
	$slick_slider.slick($settings);


	// Tab Index

	$('.slick-slide, .slick-slide a').removeAttr('tabindex');
	
	$(window).on('load',function() {
		$('.slick-slide').removeAttr('tabindex');
	});
	
	$(window).on('resize',function() {
		if ($(window).width() > 720) {
			$('.slick-slide').removeAttr('tabindex');
		}
	});	
	
});