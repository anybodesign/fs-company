<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying custom taxonomy archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FS_Company
 * @since FS Company 1.0
 */

get_header(); ?>

				<main id="primary" class="content-area" role="main">
				
					<?php get_template_part( 'template-parts/page', 'banner' ); ?>
					<?php get_template_part( 'template-parts/page', 'content' ); ?>
					
					<div class="row x-center inner">
						
						<?php while (have_posts()) : the_post(); ?>
						<div class="col-4">
							<?php get_template_part( 'template-parts/content','cpt' ); ?>
						</div>					
						<?php endwhile; ?>
						
					</div>

				</main> <?php // END primary ?>


<?php get_footer(); ?>