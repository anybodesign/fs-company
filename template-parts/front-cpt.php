<?php if ( !defined('ABSPATH') ) die();
/**
 * @package WordPress
 * @subpackage FS_Company
 * @since FS Company 1.0
 */
?>

<?php if(get_theme_mod('display_cpt') == true) { ?>
					
					<?php 
						
						// Custom Post type Loop 
						
						$args_cpt = array(
							'posts_per_page' 	=> 6,
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

							<?php if(get_theme_mod('select_cpt_page')) { ?>
							<div class="col-12 txtc">
								<?php $ctp_link = get_theme_mod('select_cpt_page'); ?>
								
								<a href="<?php echo get_permalink($ctp_link); ?>" class="action-btn">
									<?php if(get_theme_mod('cpt_btn_text')) {
										echo get_theme_mod('cpt_btn_text'); 
									} else {
										echo _e('See All','fs-company'); 	
									} ?>
								</a>
							</div>					
							<?php } ?>
							
						</div>
						
					</div>					

					<?php endif; ?>
					<?php wp_reset_postdata(); ?>

<?php } ?>