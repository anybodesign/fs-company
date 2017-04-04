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
	 

// Site logo white
	
	$wp_customize->add_setting('site_logo_white');
	
	$wp_customize->add_control( new WP_Customize_Image_control($wp_customize, 'site_logo_white_ctrl', array(
		'label'			=> __('Site White Logo', 'fs-company'),
		'description'	=> __('White version of your logo for the home page.', 'fs-company'),		
		'section'		=> 'title_tagline',
		'settings'		=> 'site_logo_white',
	)));
	
	
	
	 
}
add_action('customize_register', 'fs_company_customize_register');