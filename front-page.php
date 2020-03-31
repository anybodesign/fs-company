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

get_header(); ?>

			<?php // SLIDER ?>
			<?php get_template_part( 'template-parts/front', 'slider' ); ?>
				
			<?php // CUSTOM POSTS ?>
			<?php get_template_part( 'template-parts/front', 'cpt' ); ?>

			<?php // PAGE CONTENT ?>
			<?php get_template_part( 'template-parts/front', 'edito' ); ?>

<?php get_footer(); ?>