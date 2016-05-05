<?php
/**
 * Template Name: Service
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Metropolis Cycles
 */

get_header(); ?>

	<div class="content-area">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php if( have_rows('service_levels') ) : ?>

			    <?php while ( have_rows('service_levels') ) : ?>

			        <?php the_row(); ?>

			        <?php if( get_row_layout() == 'service_level' ) : ?>

						<?php the_sub_field('service_name'); ?>
						$<?php the_sub_field('service_price'); ?>
			            <?php the_sub_field('service_description'); ?>

			        <?php endif; ?>

			    <?php endwhile; ?>

			<?php endif; ?>

		<?php endwhile; // end of the loop. ?>

	</div><!-- #primary -->

<?php get_footer(); ?>
