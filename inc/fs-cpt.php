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
/*
		'parent_item_colon'		=> __( 'Parent service:', 'fs-company' ),
		'all_items'				=> __( 'All services', 'fs-company' ),
		'add_new_item'			=> __( 'Add New Service', 'fs-company' ),
		'new_item'				=> __( 'New Service', 'fs-company' ),
		'edit_item'				=> __( 'Edit Service', 'fs-company' ),
		'update_item'			=> __( 'Update Service', 'fs-company' ),
		'view_item'				=> __( 'View Service', 'fs-company' ),
		'search_items'			=> __( 'Search Service', 'fs-company' ),
*/
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
		'labels'				=> $labels,
		'supports'				=> array( 'title', 'editor', 'thumbnail', 'revisions'),
		'taxonomies'			=> array(),
		'hierarchical'			=> false,
		'public'				=> true,
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
		'labels'				=> $labels_slide,
		'supports'				=> array( 'title', 'editor', 'thumbnail', 'revisions'),
		'taxonomies'			=> array(),
		'hierarchical'			=> false,
		'public'				=> true,
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
		'labels'				=> $labels,
		'hierarchical'			=> true,
		'public'				=> true,
		'show_ui'				=> true,
		'show_admin_column'		=> true,
		'show_in_nav_menus'		=> true,
		'show_tagcloud'			=> false,
		//'rewrite'				=> array( 'slug' => 'creations' ),		
	);
	register_taxonomy( 'slide-category', array( 'slide' ), $args );	


	$labels = array(
		'name'							=> _x( 'Services Categories', 'Taxonomy General Name', 'fs-company' ),
		'singular_name'					=> _x( 'Services Category', 'Taxonomy Singular Name', 'fs-company' ),
		'menu_name'						=> __( 'Services Categories', 'fs-company' ),
		/*
		'all_items'						=> __( 'All Services Categories', 'fs-company' ),
		'parent_item'					=> __( 'Parent Services Category', 'fs-company' ),
		'parent_item_colon'				=> __( 'Parent Services Category:', 'fs-company' ),
		'new_item_name'					=> __( 'New Services Category', 'fs-company' ),
		'add_new_item'					=> __( 'Add New Services Category', 'fs-company' ),
		'edit_item'						=> __( 'Edit Services Category', 'fs-company' ),
		'update_item'					=> __( 'Update Services Category', 'fs-company' ),
		'view_item'						=> __( 'View Services Category', 'fs-company' ),
		'popular_items'					=> __( 'Popular Services Category', 'fs-company' ),
		'search_items'					=> __( 'Search Services Category', 'fs-company' ),
		*/
	);
	$args = array(
		'labels'				=> $labels,
		'hierarchical'			=> true,
		'public'				=> true,
		'show_ui'				=> true,
		'show_admin_column'		=> true,
		'show_in_nav_menus'		=> true,
		'show_tagcloud'			=> false,
		//'rewrite'				=> array( 'slug' => 'creations' ),		
	);
	register_taxonomy( 'service-category', array( 'service' ), $args );	

}
add_action( 'init', 'fs_custom_taxonomies', 0 );



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
	        //$args['description'] = 'Nos références';
	        //$args['menu_icon'] = 'dashicons-building';
	        
	        $args['labels']['name'] = $cpt_plural;
	        $args['labels']['singular_name'] = $cpt_singular;
	        $args['labels']['menu_name'] = $cpt_plural;
	        $args['labels']['name_admin_bar'] = $cpt_plural;
/*
	        $args['labels']['parent_item_colon'] = 'Référence parente :';
	        $args['labels']['all_items'] = 'Toutes les références';
	        $args['labels']['add_new_item'] = 'Ajouter une référence';
	        $args['labels']['new_item'] = 'Nouvelle référence';
	        $args['labels']['edit_item'] = 'Modifier la référence';
	        $args['labels']['update_item'] = 'Mettre à jour la référence';
	        $args['labels']['view_item'] = 'Voir la référence';
	        $args['labels']['search_items'] = 'Chercher une référence';
*/
	    }
	 
	    return $args;
	}

}


// Override Tax Names

if ( get_theme_mod('tax_name_text') || get_theme_mod('tax_plural_text') || get_theme_mod('tax_slug') ) {

	add_filter('register_taxonomy_args', 'any_fscompany_rewrite_tax', 10, 3);
	function any_fscompany_rewrite_tax($args, $taxonomy){
 
		// var
		
		if(get_theme_mod('tax_name_text')) {
			$tax_singular = get_theme_mod('tax_name_text'); 
		}
		if(get_theme_mod('tax_plural_text')) {
			$tax_plural = get_theme_mod('tax_plural_text'); 
		}
		if(get_theme_mod('tax_slug')) {
			$tax_slug = get_theme_mod('tax_slug'); 
		}
	 
	    if ($taxonomy == 'service-category'){	
	        
	        $args['rewrite']['slug'] = $tax_slug;
	        
			$args['labels']['name'] = _x( $tax_plural, 'Taxonomy General Name');
	        $args['labels']['singular_name'] = _x( $tax_singular, 'Taxonomy Singular Name');
	        $args['labels']['menu_name'] = __( $tax_plural );
			/*
			$args['labels']['all_items'] = __( $tax_plural.': All' );
	        $args['labels']['parent_item'] = __( 'Parent '.$tax_singular );
	        $args['labels']['parent_item_colon'] = __( 'Parent: '. $tax_singular);
	        $args['labels']['new_item_name'] = __( 'New '.$tax_singular );
	        $args['labels']['add_new_item'] = __( 'Add '. $tax_singular );
	        $args['labels']['edit_item'] = __( 'Edit '. $tax_singular);
	        $args['labels']['update_item'] = __( 'Update '. $tax_singular);
	        $args['labels']['view_item'] = __( 'View '. $tax_singular);
	        $args['labels']['popular_items'] = __( 'Popular '. $tax_singular);
	        $args['labels']['search_items'] = __( 'Search '. $tax_singular);
	        */
	    }
	 
	    return $args;
	}

}