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

				<div id="primary" class="content-area" role="main">
					
				<?php // SLIDER ?>
				
				<?php get_template_part( 'template-parts/front', 'slider' ); ?>
					

				<?php // CUSTOM POSTS ?>

				<?php get_template_part( 'template-parts/front', 'cpt' ); ?>


				<?php // PAGE CONTENT ?>

					<div class="front-edito" id="front_edito">
						<div class="row x-center inner">
		
						<?php while ( have_posts() ) : the_post(); ?>
							<div class="col-6">
								<?php the_content(); ?>
							</div>
						<?php endwhile; ?>
							
						</div>					
					</div>

				
				</div> <?php // END primary ?>

<?php get_footer(); ?>