jQuery(document).ready(function($) {
	
	function scrollToAnchor(aid){
		var aTag = $(aid);
		$('html,body').animate({scrollTop: aTag.offset().top},'slow');
	}


	$('.scroll-btn').on('click', function() {
		var my_id = $(this).attr('href');
		scrollToAnchor( my_id );
		
		return false;
	});	
	
});