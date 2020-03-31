<?php if ( !defined('ABSPATH') ) die();
/**
 * @package WordPress
 * @subpackage FS_Company
 * @since FS Company 1.0
 */
?>

				<div class="front-edito" id="front_edito">
					<div class="row inner">
	
					<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
						
					</div>					
				</div>