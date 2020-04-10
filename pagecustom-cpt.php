<?php if ( !defined('ABSPATH') ) die();
/**
 * Template Name: Custom content page
 *
 * @package WordPress
 * @subpackage FS_Company
 * @since FS Company 1.0
 */
get_header(); ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<?php 
					get_template_part( 'template-parts/page', 'banner' );
					get_template_part( 'template-parts/page', 'content' ); 
				?>
			<?php endwhile; ?>
				
			<?php 
				// Custom Post type Loop 
				
				$args_cpt = array(
					'posts_per_page' 	=> -1,
					'post_type' 		=> 'service'
				);
				$query_cpt = new WP_Query($args_cpt);
			?>						
		
			<?php if ($query_cpt->have_posts()) : ?>

				<div class="row inner">
					
					<?php while ($query_cpt->have_posts()) : $query_cpt->the_post(); ?>
						<?php get_template_part( 'template-parts/block','cpt' ); ?>
					<?php endwhile; ?>
					
				</div>
			
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>