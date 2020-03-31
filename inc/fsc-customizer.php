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

	$wp_customize->add_section('fs_cpt_section', array(
		'title' 		=> __('Custom Post Type', 'fs-company'),
		'description' 	=> __('Settings for your custom content', 'fs-company'),
		'priority'		=> 50,
	));
	$wp_customize->add_section('fs_tax_section', array(
		'title' 		=> __('Custom Taxonomy', 'fs-company'),
		'description' 	=> __('Settings for your custom taxonomy', 'fs-company'),
		'priority'		=> 50,
	));
	
	
	
	// CPT Names 
	
	$wp_customize->add_setting('cpt_name_text', array(
		'default'				=> '',
		'sanitize_callback'		=> 'sanitize_text_field'
	));
	$wp_customize->add_control('cpt_name_text', array(
		'label'			=> __('Custom Posts Name - Singular', 'fs-company'),
		'section'		=> 'fs_cpt_section',
		'settings'		=> 'cpt_name_text',
	));

	$wp_customize->add_setting('cpt_plural_text', array(
		'default'				=> '',
		'sanitize_callback'		=> 'sanitize_text_field'
	));
	$wp_customize->add_control('cpt_plural_text', array(
		'label'			=> __('Custom Posts Name - Plural', 'fs-company'),
		'section'		=> 'fs_cpt_section',
		'settings'		=> 'cpt_plural_text',
	));
	
	$wp_customize->add_setting('cpt_slug', array(
		'default'				=> '',
		'sanitize_callback'		=> 'sanitize_text_field'
	));
	$wp_customize->add_control('cpt_slug', array(
		'label'			=> __('Custom Posts Slug (lowercase)', 'fs-company'),
		'section'		=> 'fs_cpt_section',
		'settings'		=> 'cpt_slug',
	));	

	// Display CPT
	
	$wp_customize->add_setting('display_cpt', array(
		'default'	=> false,
		'sanitize_callback'	=> 'fsc_customizer_sanitize_checkbox',				
	));
	$wp_customize->add_control('display_cpt', array(
		'type'			=> 'checkbox',
		'label'			=> __('Display your custom posts on the front page', 'fs-company'),
		'section'		=> 'fs_cpt_section',
		'settings'		=> 'display_cpt',
	));
	
	// CPT page
	
	$wp_customize->add_setting( 'select_cpt_page', array(
	  'capability' 			=> 'edit_theme_options',
	  'sanitize_callback' 	=> 'fs_sanitize_dropdown_pages',
	));
	$wp_customize->add_control( 'select_cpt_page', array(
	  'type' 			=> 'dropdown-pages',
	  'section' 		=> 'fs_cpt_section', 
	  'label'			=> __( 'Custom Posts Page', 'fs-company' ),
	  'description' 	=> __( 'Select the page for your custom posts.', 'fs-company' ),
	  'settings'		=> 'select_cpt_page',
	));

	// CPT button text
	
	$wp_customize->add_setting('cpt_btn_text', array(
		'default'				=> '',
		'sanitize_callback'		=> 'sanitize_text_field'
	));
	$wp_customize->add_control('cpt_btn_text', array(
		'label'			=> __('Custom posts button text', 'fs-company'),
		'description'	=> __('Add a custom text for the "See All" button.', 'fs-company'),
		'section'		=> 'fs_cpt_section',
		'settings'		=> 'cpt_btn_text',
	));	
	
	
		
	
	// Tax Names 
	
	$wp_customize->add_setting('tax_name_text', array(
		'default'				=> '',
		'sanitize_callback'		=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tax_name_text', array(
		'label'			=> __('Custom Taxonomy Name - Singular', 'fs-company'),
		'section'		=> 'fs_tax_section',
		'settings'		=> 'tax_name_text',
	));

	$wp_customize->add_setting('tax_plural_text', array(
		'default'				=> '',
		'sanitize_callback'		=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tax_plural_text', array(
		'label'			=> __('Custom Taxonomy Name - Plural', 'fs-company'),
		'section'		=> 'fs_tax_section',
		'settings'		=> 'tax_plural_text',
	));
	
	$wp_customize->add_setting('tax_slug', array(
		'default'				=> '',
		'sanitize_callback'		=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tax_slug', array(
		'label'			=> __('Custom Taxonomy slug (lowercase)', 'fs-company'),
		'section'		=> 'fs_tax_section',
		'settings'		=> 'tax_slug',
	));


	// Site logo white
	
	$wp_customize->add_setting('site_logo_white');
	
	$wp_customize->add_control( new WP_Customize_Image_control($wp_customize, 'site_logo_white', array(
		'label'			=> __('Site White Logo', 'fs-company'),
		'description'	=> __('White version of your logo for the home page.', 'fs-company'),		
		'section'		=> 'title_tagline',
		'settings'		=> 'site_logo_white',
	)));
	

	
	 
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
