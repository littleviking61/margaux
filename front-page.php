<?php get_header(); ?>

	<main role="main" aria-label="Content">
		<div class="container">

			<!-- section -->
			<section class="row">
				<?= do_shortcode( '[featured_products per_page=”8″ columns=”4″ orderby=”date” order=”desc”]' ) ?>
			</section>

			<section class="row">
				<?php get_template_part('loop'); ?>
			</section>

			<!-- /section -->

		</div>
	</main>

<?php get_footer(); ?>