jQuery(document).ready(function() {
	
	jQuery('#fullpage').fullpage({
		autoScrolling: false,
		fitToSection: false,
		sectionSelector: '.fullpage-section'
	});
	
	
	
	
	// Scroll-Down

	jQuery(window).on('load',function() {
		var scrollheight = jQuery( window ).height();
		//console.log(''+scrollheight+'px');
		
		jQuery('.scroll-btn').click(function(e) {
			e.preventDefault();		
		
			jQuery('body,html').stop().animate({ scrollTop: ''+scrollheight+'px' });
		});
	});	

	jQuery(window).on('resize',function() {
		var scrollheight = jQuery( window ).height();
		//console.log(''+scrollheight+'px');
		
		jQuery('.scroll-btn').click(function(e) {
			e.preventDefault();		
		
			jQuery('body,html').stop().animate({ scrollTop: ''+scrollheight+'px' });
		});
	});	

});