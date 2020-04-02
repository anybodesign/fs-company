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
				
					<?php if ($query_slider->have_posts()) : ?>
						
					<div id="fullpage">
						<div class="fullpage-section">
												
							<div class="front-slider">
		
								<?php while ($query_slider->have_posts()) : $query_slider->the_post(); ?>

									<?php if ( '' != get_the_post_thumbnail() ) { 
										$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); 
									} ?>
									
									<?php 
									$slide_cats = get_the_terms( $post->ID, 'slide-category' ); 
									
									if ( ! empty( $slide_cats ) ) {
								    	$cat = $slide_cats[0]->slug;
									}
									?>
									
		                            <?php if (wp_is_mobile()) {
		                                $mob = 'mobile';
		                            } else {
		                                $mob = 'desktop';
		                            } ?>
																		
									<div class="front-slider-item <?php echo esc_html($cat); ?> <?php echo esc_html($mob); ?>" style="background-image: url(<?php echo $large_image_url[0]; ?>)">
										<div class="front-slider-content">
											<h2 class="front-slider-title"><?php the_title(); ?></h2>
											<div class="front-slider-text">
												<?php the_content(); ?>
											</div>
										</div>
									</div>
	
								<?php endwhile; ?>
		
							</div>
							
							<?php if(get_theme_mod('display_cpt') != false) { 
								$scroll = '#front_cpt';
								} else {
								$scroll = '#front_edito';	
								}
							?>
							<a href="<?php echo $scroll; ?>" class="scroll-btn" title="<?php _e('Scroll Down','fs-company'); ?>">
								<img src="<?php echo FSCHILD_THEME_URL; ?>/img/slick-arrow.svg" alt="">
							</a>
						</div>
					</div>
					
					<?php else: ?>
					<?php get_template_part( 'template-parts/page', 'banner' ); ?>
					
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>