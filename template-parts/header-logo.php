<?php
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

					<?php if ( is_front_page() && get_theme_mod('site_logo_white') ) { // white version  ?>
					<style>
						@media only screen and (min-width: 50em) {
							.logo { content: url(<?php echo(get_theme_mod('site_logo_white', 'none')); ?>); }
						}
					</style>
					<?php } ?>
				
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php _e('Go to Home Page', 'fs-blog'); ?>">
						<?php if(get_theme_mod('site_logo')) { ?>
						<img class="logo" src="<?php echo(get_theme_mod('site_logo', 'none')); ?>" alt="<?php echo esc_url(bloginfo('name')); ?> logo">
						<?php } ?>
						<span><?php bloginfo( 'name' ); ?></span>
					</a>