<?php if ( !defined('ABSPATH') ) die();
/**
 * Template Name: Page for Services
 *
 * @package WordPress
 * @subpackage FS_Company
 * @since FS Company 1.0
 */
 __( 'Page for Services', 'fs-company' );
get_header(); ?>

				<main id="primary" class="content-area" role="main">
				
				<?php while ( have_posts() ) : the_post(); ?>
				
					<?php get_template_part( 'template-parts/page', 'banner' ); ?>

					<?php get_template_part( 'template-parts/page', 'content' ); ?>

				<?php endwhile; ?>
					
				<?php 
					
					// Custom Post type Loop 
					
					$args_cpt = array(
						'posts_per_page' 	=> -1,
						'post_type' 		=> 'service',
						'order'				=> 'DESC'
					);
					$query_cpt = new WP_Query($args_cpt);
				?>						
			
				<?php if ($query_cpt->have_posts()) : ?>

					<div class="row x-center inner">
						
						<?php while ($query_cpt->have_posts()) : $query_cpt->the_post(); ?>
						<div class="col-4">
							<?php get_template_part( 'template-parts/content','cpt' ); ?>
						</div>					
						<?php endwhile; ?>
						
					</div>
				
				<?php else: ?>
				
					<div class="row inner">
						
						<?php get_template_part( 'template-parts/content', 'none' ); ?>
						
					</div>
				
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>

				</main> <?php // END primary ?>



<?php get_footer(); ?>