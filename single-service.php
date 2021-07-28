<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying all custom posts.
 *
 * @package WordPress
 * @subpackage FS_Company
 * @since FS Company 1.5
 */
get_header(); ?>

			<?php while ( have_posts() ) : the_post(); ?>
			
				<?php get_template_part( 'template-parts/page', 'banner' ); ?>
				<div class="page-wrap">
					<div class="custom-post-content">
						<?php the_content(); ?>
					</div>
				</div>
				
			<?php endwhile; ?>
	
<?php get_footer(); ?>