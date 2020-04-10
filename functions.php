<?php if ( !defined('ABSPATH') ) die();

define( 'FSCHILD_THEME_DIR', get_stylesheet_directory() );
define( 'FSCHILD_THEME_URL', get_stylesheet_directory_uri() );


// I18n

load_theme_textdomain( 'fs-company', FSCHILD_THEME_DIR . '/languages' );



// The Custom Post Type & Slider

require FSCHILD_THEME_DIR . '/inc/fs-cpt.php';



// Customizer

require FSCHILD_THEME_DIR . '/inc/fsc-customizer.php';



// Enqueue JS & CSS

function fs_company_scripts_load() {
    if (!is_admin()) {

		// JS 
		
		if ( is_front_page() || is_page_template('pagecustom-maintenance.php') ) {

			wp_enqueue_script(
				'slick', 
				FSCHILD_THEME_URL . '/js/slick.min.js', 
				array('jquery'), 
				'1.9.0', 
				true
			);
			wp_enqueue_script(
				'slick-init', 
				FSCHILD_THEME_URL . '/js/slick-init.js', 
				array('slick'), 
				false, 
				true
			);

			wp_enqueue_script(
				'scrollto', 
				FSCHILD_THEME_URL . '/js/scrollto.js', 
				array('jquery'), 
				false, 
				true
			);
										
		}


		
		
		// CSS
		
		if ( is_front_page() || is_page_template('pagecustom-maintenance.php') ) {
			
			wp_enqueue_style( 
				'slick', 
				FSCHILD_THEME_URL . '/css/slick.css',
				array(), 
				false, 
				'screen' 
			);


		}
		
		// Parent's CSS

		wp_enqueue_style( 
			'parent-style', 
			FS_THEME_URL . '/style.css',
			array(),
			false,
			'screen'
		);
		

	}
}    
add_action( 'wp_enqueue_scripts', 'fs_company_scripts_load' );



// Auto-Updater

require 'inc/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/anybodesign/fs-company',
	__FILE__,
	'fs-company'
);
$myUpdateChecker->setBranch('master');