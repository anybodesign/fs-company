<?php if ( !defined('ABSPATH') ) die();
/**
 * @package WordPress
 * @subpackage FS_Company
 * @since FS Company 1.0
 */
?>

				<div class="front-section" id="front_edito">
					<div class="inner">
	
					<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
						
					</div>					
				</div>