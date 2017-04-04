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
		'parent_item_colon'		=> __( 'Parent service:', 'fs-company' ),
		'all_items'				=> __( 'All services', 'fs-company' ),
		'add_new_item'			=> __( 'Add New Service', 'fs-company' ),
		'add_new'				=> __( 'Add New', 'fs-company' ),
		'new_item'				=> __( 'New Service', 'fs-company' ),
		'edit_item'				=> __( 'Edit Service', 'fs-company' ),
		'update_item'			=> __( 'Update Service', 'fs-company' ),
		'view_item'				=> __( 'View Service', 'fs-company' ),
		'search_items'			=> __( 'Search Service', 'fs-company' ),
		'not_found'				=> __( 'Not found', 'fs-company' ),
		'not_found_in_trash'	=> __( 'Not found in Trash', 'fs-company' ),
	);
	$rewrite = array(
		//'slug'					=> 'service',
		'with_front'			=> true,
		'pages'					=> true,
		'feeds'					=> true,
	);
	$args = array(
		'label'					=> __( 'Services', 'fs-company' ),
		'description'			=> __( 'Our Services', 'fs-company' ),
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
		'menu_icon'				=> 'dashicons-carrot',
		'can_export'			=> true,
		'has_archive'			=> true,
		'exclude_from_search'	=> false,
		'publicly_queryable'	=> true,
		'rewrite'				=> $rewrite,
		'capability_type'		=> 'post'
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
		'add_new'				=> __( 'Add New', 'fs-company' ),
		'new_item'				=> __( 'New Slide', 'fs-company' ),
		'edit_item'				=> __( 'Edit Slide', 'fs-company' ),
		'update_item'			=> __( 'Update Slide', 'fs-company' ),
		'view_item'				=> __( 'View Slide', 'fs-company' ),
		'search_items'			=> __( 'Search Slide', 'fs-company' ),
		'not_found'				=> __( 'Not found', 'fs-company' ),
		'not_found_in_trash'	=> __( 'Not found in Trash', 'fs-company' ),
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
		'name'							=> _x( 'Services Categories', 'Taxonomy General Name', 'fs-company' ),
		'singular_name'					=> _x( 'Services Category', 'Taxonomy Singular Name', 'fs-company' ),
		'menu_name'						=> __( 'Services Categories', 'fs-company' ),
		'all_items'						=> __( 'All Services Categories', 'fs-company' ),
		'parent_item'					=> __( 'Parent Services Category', 'fs-company' ),
		'parent_item_colon'				=> __( 'Parent Services Category:', 'fs-company' ),
		'new_item_name'					=> __( 'New Services Category', 'fs-company' ),
		'add_new_item'					=> __( 'Add New Services Category', 'fs-company' ),
		'edit_item'						=> __( 'Edit Services Category', 'fs-company' ),
		'update_item'					=> __( 'Update Services Category', 'fs-company' ),
		'view_item'						=> __( 'View Services Category', 'fs-company' ),
		'separate_items_with_commas'	=> __( 'Separate items with commas', 'fs-company' ),
		'add_or_remove_items'			=> __( 'Add or remove items', 'fs-company' ),
		'choose_from_most_used'			=> __( 'Choose from the most used', 'fs-company' ),
		'popular_items'					=> __( 'Popular Services Category', 'fs-company' ),
		'search_items'					=> __( 'Search Services Category', 'fs-company' ),
		'not_found'						=> __( 'Not Found', 'fs-company' ),
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


