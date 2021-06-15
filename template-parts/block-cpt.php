<?php if ( !defined('ABSPATH') ) die();
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

				<article id="post-<?php the_ID(); ?>" <?php post_class('custom-post-block'); ?>>
					<a href="<?php the_permalink(); ?>">
						<div class="custom-post-figure">
							<?php the_post_thumbnail('screen-md'); ?>
							<span><?php _e('Learn More', 'fs-company'); ?></span>
						</div>
						<h3 class="custom-post-title">
							<?php the_title(); ?>
						</h3>
					</a>
				</article>