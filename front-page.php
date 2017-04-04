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
					<?php 
						
						// Slider Loop 
						
						$args_slider = array(
							'posts_per_page' 	=> -1,
							'post_type' 		=> 'slide',
							'order'				=> 'ASC'
						);
						$query_slider = new WP_Query($args_slider);
					?>						
				
					<?php if ($query_slider->have_posts()) : ?>
						
					<div id="fullpage">
						<div class="fullpage-section">
												
							<div class="front-slider">
		
								<?php while ($query_slider->have_posts()) : $query_slider->the_post(); ?>

									<?php if ( '' != get_the_post_thumbnail() ) { 
										$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); 
									} ?>

									<div class="front-slider-item" style="background-image: url(<?php echo $large_image_url[0]; ?>)">
										<div class="front-slider-content">
											<h2 class="front-slider-title"><?php the_title(); ?></h2>
											<div class="front-slider-text">
												<?php the_content(); ?>
											</div>
										</div>
									</div>
	
								<?php endwhile; ?>
		
							</div>
		
							<a href="#front_cpt" class="scroll-btn"><?php _e('Scroll Down','fs-company'); ?></a>
						</div>
					</div>
					
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
					

<?php // CUSTOM POSTS ?>
					
					<?php 
						
						// Custom Post type Loop 
						
						$args_cpt = array(
							'posts_per_page' 	=> 3,
							'post_type' 		=> 'service',
							'order'				=> 'DESC'
						);
						$query_cpt = new WP_Query($args_cpt);
					?>						
				
					<?php if ($query_cpt->have_posts()) : ?>
					
					<div class="front-cpt" id="front_cpt">

						<div class="row x-center inner">
							
							<div class="col-12">
							<?php
								$obj = get_post_type_object( 'service' );
								echo '<h2>' . $obj->labels->name . '</h2>';
							?>
							</div>	
							
							<?php while ($query_cpt->have_posts()) : $query_cpt->the_post(); ?>
							<div class="col-4 mid-6">
								<?php get_template_part( 'template-parts/content','cpt' ); ?>
							</div>					
							<?php endwhile; ?>
	
						</div>
						
					</div>					

					<?php endif; ?>
					<?php wp_reset_postdata(); ?>



<?php // PAGE CONTENT ?>

					<div class="front-edito">
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