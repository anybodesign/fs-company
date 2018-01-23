<?php
/**
 * FS Company Customizer functionality
 *
 * @package WordPress
 * @subpackage FS_Company
 * @since FS Company 1.0
 */
 

// Customizer Settings
 
function fs_company_customize_register($wp_customize) {

	// Add Front Page Section

/*
	$wp_customize->add_section('fs_frontpage_section', array(
		'title' 		=> __('Front Page', 'fs-company'),
		'description' 	=> __('Front Page customisation', 'fs-company'),
		'priority'		=> 50,
	));
*/
	 

	// Site logo white
	
	$wp_customize->add_setting('site_logo_white');
	
	$wp_customize->add_control( new WP_Customize_Image_control($wp_customize, 'site_logo_white_ctrl', array(
		'label'			=> __('Site White Logo', 'fs-company'),
		'description'	=> __('White version of your logo for the home page.', 'fs-company'),		
		'section'		=> 'title_tagline',
		'settings'		=> 'site_logo_white',
	)));
	

	// Display CPT
	
	$wp_customize->add_setting('display_cpt', array(
		'default'	=> false,
		'sanitize_callback'	=> 'fsc_customizer_sanitize_checkbox',				
	));
	
	$wp_customize->add_control('display_cpt_ctrl', array(
		'type'			=> 'checkbox',
		'label'			=> __('Display your custom posts on the front page', 'fs-company'),
		'section'		=> 'static_front_page',
		'settings'		=> 'display_cpt',
	));
	
	
	// CPT page
	
	$wp_customize->add_setting( 'select_cpt_page', array(
	  'capability' 			=> 'edit_theme_options',
	  'sanitize_callback' 	=> 'fs_sanitize_dropdown_pages',
	));
	
	$wp_customize->add_control( 'select_cpt_page_ctrl', array(
	  'type' 			=> 'dropdown-pages',
	  'section' 		=> 'static_front_page', 
	  'label'			=> __( 'Custom Posts Page', 'fs-company' ),
	  'description' 	=> __( 'Select the page where your custom posts are.', 'fs-company' ),
	  'settings'		=> 'select_cpt_page',
	));

	// CPT button text
	
	$wp_customize->add_setting('cpt_btn_text', array(
		'default'				=> '',
		'sanitize_callback'		=> 'sanitize_text_field'
	));
	$wp_customize->add_control('cpt_btn_text_ctrl', array(
		'label'			=> __('Custom posts button text', 'fs-company'),
		'description'	=> __('Add a custom text for the "See All" button.', 'fs-company'),
		'section'		=> 'static_front_page',
		'settings'		=> 'cpt_btn_text',
	));	
	
	 
}
add_action('customize_register', 'fs_company_customize_register');


// Sanitize /////////

// Dropdown

function fs_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );

  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}	

// Checkbox

function fsc_customizer_sanitize_checkbox( $input ) {
	if ( $input === true || $input === '1' ) {
		return '1';
	}
	return '';
}


// Customizer Colors Output

function fs_company_colors() {
	?>
	<style>
		.front-slider-text a { 
			background-color: <?php echo get_theme_mod('primary_color', '#9c0'); ?> 
		}
		.front-slider-text a:hover,
		.front-slider-text a:focus { 
			color: <?php echo get_theme_mod('primary_color', '#9c0'); ?> 
		}
	</style>
	<?php
}
add_action('wp_head','fs_company_colors');
