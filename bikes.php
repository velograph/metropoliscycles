<?php
/**
 * Template Name: Bikes
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

		<?php endwhile; ?>

		<?php
		$current_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
		$terms = get_terms( 'bike_cats', array(
			'hide_empty' => 1,
			'orderby' => 'name',
			'include' => array(11,12,13,14),
			'child_of' => $current_term->term_id,
		) );
		?>

		<?php
		// now run a query for each animal family
		foreach( $terms as $term ) {

			// Define the query
			$args = array(
				'post_type' => 'bike',
				'bike_cats' => $term->slug,
			);
			$query = new WP_Query( $args ); ?>

			<div class="taxonomy-image-title">

				<?php $term_name = $term->slug; ?>
				<?php $mobile = wp_get_attachment_image_src( get_field( $term_name ), 'portal-mobile'); ?>
				<?php $tablet = wp_get_attachment_image_src( get_field( $term_name ), 'portal-tablet'); ?>
				<?php $desktop = wp_get_attachment_image_src( get_field( $term_name ), 'portal-desktop'); ?>
				<?php $retina = wp_get_attachment_image_src( get_field( $term_name ), 'portal-retina'); ?>

				<picture class="taxonomy-image">
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

				<h2 class="taxonomy-title"><?php echo $term->name; ?></h2>

			</div>

			<div class="portal-container">

				<?php while ( $query->have_posts() ) : $query->the_post(); ?>

					<div class="portal" id="post-<?php the_ID(); ?>">

						<?php if( have_rows('featured_images') ) : ?>

							<div class="featured-image-container">

							    <?php while ( have_rows('featured_images') ) : ?>

							        <?php the_row(); ?>

							        <?php if( get_row_layout() == 'featured_image' ) : ?>

										<?php $mobile = wp_get_attachment_image_src(get_sub_field('image'), 'portal-mobile'); ?>
										<?php $tablet = wp_get_attachment_image_src(get_sub_field('image'), 'portal-tablet'); ?>
										<?php $desktop = wp_get_attachment_image_src(get_sub_field('image'), 'portal-desktop'); ?>
										<?php $retina = wp_get_attachment_image_src(get_sub_field('image'), 'portal-retina'); ?>

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

							        <?php endif; ?>

							    <?php endwhile; ?>

							</div>

						<?php endif; ?>

						<div class="bike-info">

							<h3><?php the_title(); ?></h3>

							<?php if(get_field('sizes_available') ) : ?>
								<div class="sizes-available">
									<span class="key">
										Sizes Available:
									</span>
									<span class="value">
										<?php the_field('sizes_available'); ?>
									</span>
								</div>
							<?php endif; ?>

							<?php if(get_field('specialty') ) : ?>
								<div class="specialty">
									<span class="key">
										Specialty:
									</span>
									<span class="value">
										<?php the_field('specialty'); ?>
									</span>
								</div>
							<?php endif; ?>

							<?php if(get_field('colors') ) : ?>
								<div class="colors">
									<span class="key">
										Available Colors:
									</span>
									<span class="value">
										<?php the_field('colors'); ?>
									</span>
								</div>
							<?php endif; ?>

							<?php if(get_field('description') ) : ?>
								<div class="description">
									<?php the_field('description'); ?>
								</div>
							<?php endif; ?>

							<?php if(get_field('brand_link') ) : ?>
								<div class="brand-link">
									<a href="<?php the_field('brand_link'); ?>" target="_blank">Learn More</a>
								</div>
							<?php endif; ?>

						</div>

					</div>

				<?php endwhile; ?>

			</div>

			<?php wp_reset_postdata(); } ?>

	</div>

<?php get_footer(); ?>
