<?php if ( !defined('ABSPATH') ) die();
/**
 * @package WordPress
 * @subpackage FS_Company
 * @since FS Company 1.0
 */
?>

<?php if(get_theme_mod('display_cpt') == true) { ?>
					
					<?php 
						
						$nb = get_theme_mod('cpt_number');
						$cols = get_theme_mod('cpt_cols');
						$btn = get_theme_mod('display_btn');
						
						if ($cols) {
							$col_nb = $cols;
						} else {
							$col_nb = 'col-3';
						}
						
						// Custom Post type Loop 
						
						$args_cpt = array(
							'posts_per_page' 	=> $nb,
							'post_type' 		=> 'service',
							'order'				=> 'DESC'
						);
						$query_cpt = new WP_Query($args_cpt);
					?>						
				
					<?php if ($query_cpt->have_posts()) : ?>
					
					<div class="front-section <?php echo esc_attr($col_nb);?>" id="front_cpt">

						<div class="row inner">
							<?php
								$obj = get_post_type_object( 'service' );
								echo '<h2 class="front-section-title cpt-title">' . $obj->labels->name . '</h2>';
							?>
							<?php while ($query_cpt->have_posts()) : $query_cpt->the_post(); ?>
								<?php get_template_part( 'template-parts/block','cpt' ); ?>
							<?php endwhile; ?>
						</div>	

						<?php if(get_theme_mod('select_cpt_page')) { ?>
						<div class="row inner">
							<?php $ctp_link = get_theme_mod('select_cpt_page'); ?>
							
							<?php if ($btn == true) { ?>
							<a href="<?php echo get_permalink($ctp_link); ?>" class="action-btn cpt-btn">
								<?php if(get_theme_mod('cpt_btn_text')) {
									echo get_theme_mod('cpt_btn_text'); 
								} else {
									echo _e('See All','fs-company'); 	
								} ?>
							</a>
							<?php } ?>
						</div>					
						<?php } ?>

					</div>					

					<?php endif; ?>
					<?php wp_reset_postdata(); ?>

<?php } ?>