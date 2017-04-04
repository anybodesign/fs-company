<?php if ( !defined('ABSPATH') ) die();



// Parent's CSS

function fs_company_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'fs_company_enqueue_styles' );



// The Custom Post Type & Slider

require get_stylesheet_directory() . '/inc/fs-cpt.php';



// Customizer

require get_stylesheet_directory() . '/inc/fsc-customizer.php';



// Enqueue JS & CSS

function fs_company_scripts_load() {
    if (!is_admin()) {

		// JS 
		
		wp_enqueue_script( 'jquery' );


		if ( is_front_page() ) {

			wp_enqueue_script(
				'fullpage', 
				get_stylesheet_directory_uri() . '/js/jquery.fullpage.min.js', 
				array('jquery'), 
				'2.8.6', 
				true
			);
			wp_enqueue_script(
				'fullpage-init', 
				get_stylesheet_directory_uri() . '/js/init-fullpage.js', 
				array('fullpage'), 
				false, 
				true
			);
			
			wp_enqueue_script(
				'slick', 
				get_stylesheet_directory_uri() . '/js/slick.min.js', 
				array('jquery'), 
				'1.6.0', 
				true
			);
			wp_enqueue_script(
				'slick-init', 
				get_stylesheet_directory_uri() . '/js/init-slick.js', 
				array('slick'), 
				false, 
				true
			);				
		}


		
		
		// CSS
		
		if ( is_front_page() ) {
			
			wp_enqueue_style( 
				'fullpage', 
				get_stylesheet_directory_uri() . '/css/jquery.fullpage.css',
				array(), 
				false, 
				'screen' 
			);
			
			wp_enqueue_style( 
				'slick', 
				get_stylesheet_directory_uri() . '/css/slick.css',
				array(), 
				false, 
				'screen' 
			);

		}
		

	}
}    
add_action( 'wp_enqueue_scripts', 'fs_company_scripts_load' );