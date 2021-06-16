<?php if ( !defined('ABSPATH') ) die();
/**
 * @package WordPress
 * @subpackage FS_Company
 * @since FS Company 1.6.1
 */
?>

								<?php if ( '' != get_the_post_thumbnail() ) { 
									$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); 
								} ?>
								
								<?php 
									$slide_cats = get_the_terms( $post->ID, 'slide-category' ); 
									
									if ( ! empty( $slide_cats ) ) {
								    	$cat = $slide_cats[0]->slug;
									}
								?>
								
	                            <?php if ( wp_is_mobile() ) {
	                                $rwd = 'mobile';
	                            } else {
	                                $rwd = 'desktop';
	                            } ?>
									
									<div class="front-slider-item <?php echo esc_html($cat); ?> <?php echo esc_html($rwd); ?>" style="background-image: url(<?php echo $large_image_url[0]; ?>)">
										<div class="front-slider-content">
											<h2 class="front-slider-title"><?php the_title(); ?></h2>
											<div class="front-slider-text">
												<?php the_content(); ?>
											</div>
										</div>
									</div>