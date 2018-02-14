<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying site logo.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FS_Company
 * @since FS Company 1.0
 */
?>

				
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php _e('Go to Home Page', 'fs-blog'); ?>">
						<?php if ( get_theme_mod('site_logo_white') ) { // white version  ?>
							<?php if ( is_front_page() || is_page_template('pagecustom-maintenance.php') ) { ?>
							<img class="logo-white" src="<?php echo(get_theme_mod('site_logo_white', 'none')); ?>" alt="<?php echo esc_url(bloginfo('name')); ?>">
							<?php } ?>
						<?php } ?>
						
						<?php if ( get_theme_mod('site_logo') ) { ?>
						<img class="logo" src="<?php echo(get_theme_mod('site_logo', 'none')); ?>" alt="<?php echo esc_url(bloginfo('name')); ?>">
						<?php } else {
							echo esc_url(bloginfo('name'));
						} ?>
					</a>