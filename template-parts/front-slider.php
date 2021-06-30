<?php if ( !defined('ABSPATH') ) die();
/**
 * @package WordPress
 * @subpackage FS_Company
 * @since FS Company 1.0
 */
?>

				<?php
					
					// Slider Loop 
					
					$args_slider = array(
						'posts_per_page' 	=> -1,
						'post_type' 		=> 'slide',
						'order'				=> 'ASC'
					);
					$query_slider = new WP_Query($args_slider);
				?>						

				<?php if ( $query_slider->have_posts() || is_page_template( 'pagecustom-maintenance.php' ) ) { ?>
						
					<div id="fullpage">
						<div class="fullpage-section">
							
							<div class="front-slider">
								
							<?php 
								if ( is_page_template( 'pagecustom-maintenance.php' ) ) { 
									
									get_template_part( 'template-parts/front-slider', 'slide'); 
									
								} else {
									
									while ( $query_slider->have_posts()) : $query_slider->the_post();
									get_template_part( 'template-parts/front-slider', 'slide');
									endwhile;
									wp_reset_postdata(); 
								}
							?>
								
							</div>
							
							<?php if ( get_theme_mod('display_cpt') != false ) { 
								$scroll = '#front_cpt';
								} else {
								$scroll = '#front_edito';	
								}
							?>
							<?php if ( (has_blocks( $post->post_content ) || get_theme_mod('display_cpt') != false) && ! is_page_template( 'pagecustom-maintenance.php' ) ) { ?>
							<a href="<?php echo $scroll; ?>" class="scroll-btn" title="<?php _e('Scroll Down','fs-company'); ?>">
								<img src="<?php echo FSCHILD_THEME_URL; ?>/img/slick-arrow-2.svg" alt="">
							</a>
							<?php } ?>
						</div>
					</div>
					
				<?php } else { ?>
				
					<?php get_template_part( 'template-parts/page', 'banner' ); ?>
					
				<?php } ?>
				<?php wp_reset_postdata(); ?>