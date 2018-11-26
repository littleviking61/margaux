<?php get_header(); ?>

	<main role="main" aria-label="Content">
		<!-- section -->
		<div class="container">

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<section class="informations row">
					<div class="map" id="map" data-location="<?= get_field('location') ?>" data-zoom=14">
					</div>
					<div class="details">
						<img src="<?= esc_url(wp_get_attachment_image_url( get_field('logo'), 'large' )); ?>">
						<?php if( have_rows('informations') ):
    				while ( have_rows('informations') ) : the_row(); ?>
							<dl>
								<dt><?= get_sub_field('label') ?></dt>
								<dd><?= get_sub_field('info') ?></dd>
							</dl>
    				<?php endwhile; endif; ?>
						<div class="social-buttons">
							<?= __('Suivez nous sur') ?>
							<?php html5blank_nav('social-menu'); ?>
						</div>
					</div>

				</section>

			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>

		</div>
		<!-- /section -->
	</main>

<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBy4r1Y-kZ_4jIulnUNL-K6hXLF95SdrBY&callback=initMap">
</script>

<?php get_footer(); ?>
