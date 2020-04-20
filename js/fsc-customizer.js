(function($){
    
    // CPT
    wp.customize('display_cpt', function( value ) {
        value.bind( function( to ) {
            if( to ) {
                $( '#front_cpt' ).show();
            }
            else {
                $( '#front_cpt' ).hide();
            }
        });
    });
    
    // CPT btn text
    wp.customize('cpt_btn_text', function(value) {
        value.bind( function( text ) {
            $('.cpt-btn').text( text );
        });
    });
    wp.customize('cpt_plural_text', function(value) {
        value.bind( function( text ) {
            $('.cpt-title').text( text );
        });
    });

})(jQuery);