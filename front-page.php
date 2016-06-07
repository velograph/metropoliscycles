<?php
/**
 * Template Name: Front Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Metropolis Cycles
 */

get_header(); ?>

<script>

	jQuery(window).load(function(){
		var window_height = jQuery(window).height();
		var featured_image_height = jQuery('.front-page-featured-image').height();
		var header_height = jQuery('.header').height();
		var header_height_plus_padding = (header_height + 10) + 'px';
		var window_height_corrected = (window_height - header_height) + 'px';

		if (screen.width < 640) {
			jQuery('.headline-container').css('top', header_height_plus_padding);
			// jQuery('.headline-container').css('height', 'auto');
		}
		if (screen.width > 640) {
			jQuery('.headline-container').css('height', window_height_corrected);
		}
	});
	jQuery(window).resize(function(){
		var window_height = jQuery(window).height();
		var featured_image_height = jQuery('.front-page-featured-image').height();
		var header_height = jQuery('.header').height();
		var header_height_plus_padding = (header_height + 10) + 'px';
		var window_height_corrected = (window_height - header_height) + 'px';

		if (screen.width < 640) {
			jQuery('.headline-container').css('top', header_height_plus_padding);
			// jQuery('.headline-container').css('height', 'auto');
		}
		if (screen.width > 640) {
			jQuery('.headline-container').css('height', window_height_corrected);
		}
	});
	jQuery(document).ready(function(){
		jQuery('.front-page-gallery').slick({
			autoplay: true,
			arrows: false,
			dots: false,
		});
	});

</script>

	<?php while ( have_posts() ) : the_post(); ?>

		<div class="front-page-featured-image">

			<?php

			$images = get_field('gallery');

			if( $images ): ?>
			    <div class="front-page-gallery">
			        <?php foreach( $images as $image ): ?>
			            <div class="slide">
							<picture>
								<!--[if IE 9]><video style="display: none"><![endif]-->
								<source
									srcset="<?php echo $image['sizes']['portal-mobile']; ?>"
									media="(max-width: 500px)" />
								<source
									srcset="<?php echo $image['sizes']['portal-tablet']; ?>"
									media="(max-width: 860px)" />
								<source
									srcset="<?php echo $image['sizes']['portal-desktop']; ?>"
									media="(min-width: 861px)" />
								<!--[if IE 9]></video><![endif]-->
								<img data-lazy="<?php echo $image[0]; ?>">
							</picture>
			            </div>
			        <?php endforeach; ?>
			    </div>
			<?php endif; ?>


		</div>

		<div class="headline-container">

			<div class="headline">
				<?php the_field('headline'); ?>
			</div>

		</div>

		<div class="front-page-portals">

			<div class="portal-row">

				<div class="bikes">

					<div class="featured-image">
						<?php $mobile = wp_get_attachment_image_src(get_field('featured_image', 16), 'portal-mobile'); ?>
						<?php $tablet = wp_get_attachment_image_src(get_field('featured_image', 16), 'portal-tablet'); ?>
						<?php $desktop = wp_get_attachment_image_src(get_field('featured_image', 16), 'portal-desktop'); ?>
						<?php $retina = wp_get_attachment_image_src(get_field('featured_image', 16), 'portal-retina'); ?>

						<a href="/bikes">

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

							<div class="opacity-layer">&nbsp;</div>

							<div class="image-caption">
								<?php the_field('image_caption', 16); ?>
							</div>

						</a>

					</div>

					<h2>Bikes</h2>
					<h6>Browse By Category</h6>

					<?php
						//list terms in a given taxonomy
						$taxonomy = 'bike_cats';
						$tax_terms = get_terms(
							array(
								$taxonomy,
								'include' => array(1,2,3,5,12,14,15),
							)
						);
					?>
					<?php
						foreach ($tax_terms as $tax_term) : ?>
						<div class="portal-link">
							<?php echo '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '" title="' . sprintf( __( "View all posts in %s" ), $tax_term->name ) . '" ' . '>' . $tax_term->name.'</a>'; ?>
						</div>
					<?php endforeach; ?>

				</div>

				<div class="service">

					<div class="featured-image">

						<?php $mobile = wp_get_attachment_image_src(get_field('featured_image', 18), 'portal-mobile'); ?>
						<?php $tablet = wp_get_attachment_image_src(get_field('featured_image', 18), 'portal-tablet'); ?>
						<?php $desktop = wp_get_attachment_image_src(get_field('featured_image', 18), 'portal-desktop'); ?>
						<?php $retina = wp_get_attachment_image_src(get_field('featured_image', 18), 'portal-retina'); ?>

						<a href="/service">

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

							<div class="opacity-layer">&nbsp;</div>

							<div class="image-caption">
								<?php the_field('image_caption', 18); ?>
							</div>

						</a>

					</div>

					<h2>Service</h2>

					<div class="service-link">
						<a href="/service">
							<?php the_field('service_intro', 18); ?>
						</a>
					</div>

				</div>

			</div>

		</div>

	<?php endwhile; ?>

<?php get_footer(); ?>
