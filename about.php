<?php
/**
 * Template Name: About
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
					<?php the_content(); ?>
				</div>
			</div>

			<?php if( have_rows('employees') ) : ?>

				<div class="employee-list">

				    <?php while ( have_rows('employees') ) : ?>

				        <?php the_row(); ?>

				        <?php if( get_row_layout() == 'employee' ) : ?>

							<div class="employee">

								<h3><?php the_sub_field('name'); ?></h3>

								<div class="employee-image">
									<?php $mobile = wp_get_attachment_image_src(get_sub_field('employee_picture'), 'portal-mobile'); ?>
									<?php $tablet = wp_get_attachment_image_src(get_sub_field('employee_picture'), 'portal-tablet'); ?>
									<?php $desktop = wp_get_attachment_image_src(get_sub_field('employee_picture'), 'portal-desktop'); ?>
									<?php $retina = wp_get_attachment_image_src(get_sub_field('employee_picture'), 'portal-retina'); ?>

									<picture>
										<!--[if IE 9]><video style="display: none"><![endif]-->
										<source
											srcset="<?php echo $mobile[0]; ?>"
											media="(max-width: 500px)" />
										<source
											srcset="<?php echo $tablet[0]; ?>"
											media="(max-width: 860px)" />
										<source
											srcset="<?php echo $desktop[0]; ?>"
											media="(max-width: 1180px)" />
										<source
											srcset="<?php echo $retina[0]; ?>"
											media="(min-width: 1181px)" />
										<!--[if IE 9]></video><![endif]-->
										<img srcset="<?php echo $image[0]; ?>">
									</picture>
								</div>

								<div class="employee-info">
									<p><span class="key">Expertise:</span> <span class="value"><?php the_sub_field('expertise'); ?></span></p>
									<p><span class="key">Certification:</span> <span class="value"><?php the_sub_field('certification'); ?></span></p>
									<p class="employee-bio"><?php the_sub_field('biography'); ?></p>
								</div>

							</div>

				        <?php endif; ?>

				    <?php endwhile; ?>

				</div>

			<?php endif; ?>

		<?php endwhile; // end of the loop. ?>

	</div><!-- #primary -->

<?php get_footer(); ?>
