<?php
/**
 * Plugin Name: FS Company Custom Post Type
 * Description: Add custom post type and custom taxonomy 
 * Version: 1.0
 * Author: Thomas Villain - Anybodesign
 * Author URI: https://anybodesign.com/
 */
defined('ABSPATH') or die(); 



// Flush Rewrites

function fs_rewrite_flush() {
    fs_custom_posts();
    fs_insert_slide_term();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'fs_rewrite_flush' );


// Post Types

function fs_custom_posts() {
	
	// Services
	
	$labels = array(
		'name'					=> _x( 'Services', 'Post Type General Name', 'fs-company' ),
		'singular_name'			=> _x( 'Service', 'Post Type Singular Name', 'fs-company' ),
		'menu_name'				=> __( 'Services', 'fs-company' ),
		'name_admin_bar'		=> __( 'Services', 'fs-company' ),
	);
	$rewrite = array(
		//'slug'					=> 'service',
		'with_front'			=> true,
		'pages'					=> true,
		'feeds'					=> true,
	);
	$args = array(
		'label'					=> __( 'Services', 'fs-company' ),
		//'description'			=> __( 'Our Services', 'fs-company' ),
		'labels'					=> $labels,
		'supports'				=> array( 'title', 'editor', 'thumbnail', 'revisions'),
		'taxonomies'			=> array(),
		'hierarchical'			=> false,
		'public'					=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'show_in_nav_menus'		=> true,
		'show_in_admin_bar'		=> true,
		'menu_position'			=> 20,
		'menu_icon'				=> 'dashicons-star-filled',
		'can_export'			=> true,
		'has_archive'			=> true,
		'exclude_from_search'	=> false,
		'publicly_queryable'	=> true,
		'rewrite'				=> $rewrite,
		'capability_type'		=> 'post',
		'show_in_rest'			=>	true
	);	
	register_post_type( 'service', $args);
	
	
	// Slider
	
	$labels_slide = array(
		'name'					=> _x( 'Slides', 'Post Type General Name', 'fs-company' ),
		'singular_name'			=> _x( 'Slide', 'Post Type Singular Name', 'fs-company' ),
		'menu_name'				=> __( 'Slider', 'fs-company' ),
		'name_admin_bar'		=> __( 'Slides', 'fs-company' ),
		'parent_item_colon'		=> __( 'Parent Slide:', 'fs-company' ),
		'all_items'				=> __( 'All Slides', 'fs-company' ),
		'add_new_item'			=> __( 'Add New Slide', 'fs-company' ),
		'new_item'				=> __( 'New Slide', 'fs-company' ),
		'edit_item'				=> __( 'Edit Slide', 'fs-company' ),
		'update_item'			=> __( 'Update Slide', 'fs-company' ),
		'view_item'				=> __( 'View Slide', 'fs-company' ),
		'search_items'			=> __( 'Search Slide', 'fs-company' ),
	);
	$rewrite_slide = array(
		//'slug'					=> 'slide',
		'with_front'			=> true,
		'pages'					=> true,
		'feeds'					=> true,
	);
	$args_slide = array(
		'label'					=> __( 'Slides', 'fs-company' ),
		'description'			=> __( 'The Slides', 'fs-company' ),
		'labels'					=> $labels_slide,
		'supports'				=> array( 'title', 'editor', 'thumbnail', 'revisions'),
		'taxonomies'			=> array(),
		'hierarchical'			=> false,
		'public'					=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'show_in_nav_menus'		=> true,
		'show_in_admin_bar'		=> true,
		'menu_position'			=> 20,
		'menu_icon'				=> 'dashicons-images-alt2',
		'can_export'			=> true,
		'has_archive'			=> true,
		'exclude_from_search'	=> true,
		'publicly_queryable'	=> true,
		'rewrite'				=> $rewrite_slide,
		'capability_type'		=> 'post'
	);	
	register_post_type( 'slide', $args_slide);
	
}
add_action('init', 'fs_custom_posts');



// Taxonomies

function fs_custom_taxonomies() {

	$labels = array(
		'name'							=> _x( 'Slide Categories', 'Taxonomy General Name', 'fs-company' ),
		'singular_name'					=> _x( 'Slide Category', 'Taxonomy Singular Name', 'fs-company' ),
		'menu_name'						=> __( 'Slide Categories', 'fs-company' ),
		'all_items'						=> __( 'All Slide Categories', 'fs-company' ),
		'parent_item'					=> __( 'Parent Slide Category', 'fs-company' ),
		'parent_item_colon'				=> __( 'Parent Slide Category:', 'fs-company' ),
		'new_item_name'					=> __( 'New Slide Category', 'fs-company' ),
		'add_new_item'					=> __( 'Add New Slide Category', 'fs-company' ),
		'edit_item'						=> __( 'Edit Slide Category', 'fs-company' ),
		'update_item'					=> __( 'Update Slide Category', 'fs-company' ),
		'view_item'						=> __( 'View Slide Category', 'fs-company' ),
		'popular_items'					=> __( 'Popular Slide Category', 'fs-company' ),
		'search_items'					=> __( 'Search Slide Category', 'fs-company' ),
	);
	$args = array(
		'labels'					=> $labels,
		'hierarchical'			=> true,
		'public'					=> true,
		'show_ui'				=> true,
		'show_admin_column'		=> true,
		'show_in_nav_menus'		=> true,
		'show_tagcloud'			=> false,
		//'rewrite'				=> array( 'slug' => 'creations' ),		
	);
	register_taxonomy( 'slide-category', array( 'slide' ), $args );	
}
add_action( 'init', 'fs_custom_taxonomies', 0 );


// Add terms

function fs_insert_slide_term() {
    wp_insert_term(
        __('Picture', 'fs-company'), // the term 
        'slide-category', // the taxonomy
        array(
          'description' => __('Fullscreen background picture', 'fs-company'),
          'slug'        => 'image'
        )
    );
    wp_insert_term(
        __('Video', 'fs-company'), 
        'slide-category',
        array(
          'description' => __('Native mp4 background video', 'fs-company'),
          'slug'        => 'video'
        )
    );
}


// Override CPT Names

if ( get_theme_mod('cpt_name_text') || get_theme_mod('cpt_plural_text') || get_theme_mod('cpt_slug') ) {

	add_filter('register_post_type_args', 'any_fscompany_rewrite_cpt', 10, 2);
	function any_fscompany_rewrite_cpt($args, $post_type){
	
		// var
		
		if(get_theme_mod('cpt_name_text')) {
			$cpt_singular = get_theme_mod('cpt_name_text'); 
		}
		if(get_theme_mod('cpt_plural_text')) {
			$cpt_plural = get_theme_mod('cpt_plural_text'); 
		}
		if(get_theme_mod('cpt_slug')) {
			$cpt_slug = get_theme_mod('cpt_slug'); 
		}
	 
	    if ($post_type == 'service'){
	        
	        $args['rewrite']['slug'] = $cpt_slug;
	        
	        $args['label'] = __( $cpt_plural );
	        
	        $args['labels']['name'] = $cpt_plural;
	        $args['labels']['singular_name'] = $cpt_singular;
	        $args['labels']['menu_name'] = $cpt_plural;
	        $args['labels']['name_admin_bar'] = $cpt_plural;
	    }
	 
	    return $args;
	}

}
