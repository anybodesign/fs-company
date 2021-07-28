<?php if ( !defined('ABSPATH') ) die();
/**
 * The front page template file.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FS_Company
 * @since FS Company 1.0
 */
 	$order = get_theme_mod('display_cpt_after');

get_header(); ?>

			<?php 
				
				get_template_part( 'template-parts/front', 'slider' );
				
				if ( $order != true ) {
					get_template_part( 'template-parts/front', 'cpt' );
				}
				
				if ( has_blocks( $post->post_content ) ) {
					get_template_part( 'template-parts/front', 'edito' );
				}
				
				if ( $order == true ) {
					get_template_part( 'template-parts/front', 'cpt' );
				}
			?>

<?php get_footer(); ?>