<?php
/**
 * FS Company Customizer functionality
 *
 * @package WordPress
 * @subpackage FS_Company
 * @since FS Company 1.0
 */
 
// Customizer JS

add_action( 'customize_preview_init', 'fsc_customizer_scripts' );
function fsc_customizer_scripts() {
	wp_enqueue_script(
		'fsc-customizer',
	    	FSCHILD_THEME_URL . '/js/fsc-customizer.js',
	    	array( 'customize-preview' ), 
	    	false, 
	    	true
	);
}

// Customizer Settings
 
function fs_company_customize_register($fs_customize) {

	
	// Add Front Page Section

	$fs_customize->add_section('fs_cpt_section', array(
		'title' 		=> __('Custom Post Type', 'fs-company'),
		'description' 	=> __('Settings for your custom content', 'fs-company'),
		'priority'		=> 50,
	));
	$fs_customize->add_section('fs_tax_section', array(
		'title' 		=> __('Custom Taxonomy', 'fs-company'),
		'description' 	=> __('Settings for your custom taxonomy', 'fs-company'),
		'priority'		=> 50,
	));
	
	
	
	// CPT Names 
	
	$fs_customize->add_setting('cpt_name_text', array(
		'default'				=> '',
		'transport'			=> 'postMessage',
		'sanitize_callback'		=> 'sanitize_text_field'
	));
	$fs_customize->add_control('cpt_name_text', array(
		'label'			=> __('Custom Posts Name - Singular', 'fs-company'),
		'section'		=> 'fs_cpt_section',
		'settings'		=> 'cpt_name_text',
	));

	$fs_customize->add_setting('cpt_plural_text', array(
		'default'				=> '',
		'transport'			=> 'postMessage',
		'sanitize_callback'		=> 'sanitize_text_field'
	));
	$fs_customize->add_control('cpt_plural_text', array(
		'label'			=> __('Custom Posts Name - Plural', 'fs-company'),
		'section'		=> 'fs_cpt_section',
		'settings'		=> 'cpt_plural_text',
	));
	
	$fs_customize->add_setting('cpt_slug', array(
		'default'				=> '',
		'transport'			=> 'postMessage',
		'sanitize_callback'		=> 'sanitize_text_field'
	));
	$fs_customize->add_control('cpt_slug', array(
		'label'			=> __('Custom Posts Slug (lowercase)', 'fs-company'),
		'section'		=> 'fs_cpt_section',
		'settings'		=> 'cpt_slug',
	));	


	// Display CPT
	
	$fs_customize->add_setting('display_cpt', array(
		'default'			=> false,
		'sanitize_callback'	=> 'fsc_customizer_sanitize_checkbox',				
	));
	$fs_customize->add_control('display_cpt', array(
		'type'			=> 'checkbox',
		'label'			=> __('Display your custom posts on the front page', 'fs-company'),
		'section'		=> 'fs_cpt_section',
		'settings'		=> 'display_cpt',
	));
	
	$fs_customize->add_setting('display_cpt_after', array(
		'default'			=> false,
		'sanitize_callback'	=> 'fsc_customizer_sanitize_checkbox',				
	));
	$fs_customize->add_control('display_cpt_after', array(
		'type'			=> 'checkbox',
		'label'			=> __('Display your custom posts after the edito', 'fs-company'),
		'section'		=> 'fs_cpt_section',
		'settings'		=> 'display_cpt_after',
	));
	
	$fs_customize->add_setting('cpt_number', array(
		'default'				=> 3,
		'sanitize_callback'		=> 'sanitize_text_field'
	));
	$fs_customize->add_control('cpt_number', array(
		'type'			=> 'number',
		'label'			=> __('Number of Custom Posts to display on the frontpage', 'fs-company'),
		'section'		=> 'fs_cpt_section',
		'settings'		=> 'cpt_number',
	));
	
	$fs_customize->add_setting(
		'cpt_cols', 
		array(
			'default' => 'col-3',
			'sanitize_callback' => 'fs_customizer_sanitize_radio_layout',
		)
	);
	$fs_customize->add_control(
		'cpt_cols', 
		array(
			'type' => 'radio',
			'label' => __( 'Number of columns', 'fs-company' ),
			'section' => 'fs_cpt_section',
			'choices' => array(
				'col-3' => __( '3 columns', 'fs-company' ),
				'col-4' => __( '4 columns', 'fs-company' ),
			),
		)
	);

	
	// CPT page
	
	$fs_customize->add_setting( 'select_cpt_page', array(
	  'capability' 			=> 'edit_theme_options',
	  'sanitize_callback' 	=> 'fs_sanitize_dropdown_pages',
	));
	$fs_customize->add_control( 'select_cpt_page', array(
	  'type' 			=> 'dropdown-pages',
	  'section'			=> 'fs_cpt_section', 
	  'label'			=> __( 'Custom Posts Page', 'fs-company' ),
	  'description' 	=> __( 'Select the page for your custom posts.', 'fs-company' ),
	  'settings'			=> 'select_cpt_page',
	));


	// CPT button
	
	$fs_customize->add_setting('display_btn', array(
		'default'			=> false,
		'sanitize_callback'	=> 'fsc_customizer_sanitize_checkbox',				
	));
	$fs_customize->add_control('display_btn', array(
		'type'			=> 'checkbox',
		'label'			=> __('Display a button linking to your Custom Posts Archive', 'fs-company'),
		'section'		=> 'fs_cpt_section',
		'settings'		=> 'display_btn',
	));
	
	$fs_customize->add_setting('cpt_btn_text', array(
		'default'				=> '',
		'transport'				=> 'postMessage',
		'sanitize_callback'		=> 'sanitize_text_field'
	));
	$fs_customize->add_control('cpt_btn_text', array(
		'label'			=> __('Custom posts button text', 'fs-company'),
		'description'	=> __('Add a custom text for the "See All" button.', 'fs-company'),
		'section'		=> 'fs_cpt_section',
		'settings'		=> 'cpt_btn_text',
	));	
	
	
		
	
	// Tax Names 
	
/*
	$fs_customize->add_setting('tax_name_text', array(
		'default'				=> '',
		'sanitize_callback'		=> 'sanitize_text_field'
	));
	$fs_customize->add_control('tax_name_text', array(
		'label'			=> __('Custom Taxonomy Name - Singular', 'fs-company'),
		'section'		=> 'fs_tax_section',
		'settings'		=> 'tax_name_text',
	));

	$fs_customize->add_setting('tax_plural_text', array(
		'default'				=> '',
		'sanitize_callback'		=> 'sanitize_text_field'
	));
	$fs_customize->add_control('tax_plural_text', array(
		'label'			=> __('Custom Taxonomy Name - Plural', 'fs-company'),
		'section'		=> 'fs_tax_section',
		'settings'		=> 'tax_plural_text',
	));
	
	$fs_customize->add_setting('tax_slug', array(
		'default'				=> '',
		'sanitize_callback'		=> 'sanitize_text_field'
	));
	$fs_customize->add_control('tax_slug', array(
		'label'			=> __('Custom Taxonomy slug (lowercase)', 'fs-company'),
		'section'		=> 'fs_tax_section',
		'settings'		=> 'tax_slug',
	));
*/


	// Site logo white
	
	$fs_customize->add_setting('site_logo_white');
	
	$fs_customize->add_control( new WP_Customize_Image_control($fs_customize, 'site_logo_white', array(
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

// Radio 

function fs_customizer_sanitize_radio_layout( $input ) {
    if( !in_array( $input, array( 'col-3', 'col-4' ) ) ) {
        $input = 'col-3';
    }
    return $input;
}