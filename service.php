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

			<div class="intro-container">
				<div class="intro">
					<?php the_field('service_intro'); ?>
				</div>
			</div>

			<?php if( have_rows('service_levels') ) : ?>

				<div class="service-levels">

				    <?php while ( have_rows('service_levels') ) : ?>

				        <?php the_row(); ?>

				        <?php if( get_row_layout() == 'service_level' ) : ?>

							<div class="service">

								<h2><?php the_sub_field('service_name'); ?></h2>
								<h3>$<?php the_sub_field('service_price'); ?></h3>
								<div class="service-description">
					            	<?php the_sub_field('service_description'); ?>
								</div>

							</div>

				        <?php endif; ?>

				    <?php endwhile; ?>

				</div>

			<?php endif; ?>

		<?php endwhile; // end of the loop. ?>

	</div><!-- #primary -->

<?php get_footer(); ?>
