<?php
/**
 * Template part for displaying custom posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FS_Company
 * @since FS Company 1.0
 */
?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						
						
						<header class="post-header">

							<?php if ( '' != get_the_post_thumbnail() ) { ?>
							<figure class="post-figure">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
								
								<figcaption class="post-caption">
									<a href="<?php the_permalink(); ?> "><span><?php the_title(); ?></span></a>
								</figcaption>
							</figure>
							<?php } ?>
							
						</header>
						
						<?php if ( is_single() ) { ?>
						<div class="post-content">
							<?php
								the_content(sprintf(
									
									wp_kses( __( 'Continue reading %s', 'fs-company' ), array( 'span' => array( 'class' => array() ) ) ),
									the_title( '<span class="screen-reader-text">"', '"</span>', false )
								));
							?>
						</div>
						<?php } ?>
						
					</article>