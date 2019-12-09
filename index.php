<?php get_header(); ?>

	<main role="main" aria-label="Content">
		
		<h2 class="page-title"><?= __('Actus', 'html5blank') ?></h2>
		
		<section class="articles container row">

			<!-- section -->
			<?php get_template_part('loop'); ?>
			<!-- /section -->

		</section>
		<?php get_template_part('pagination'); ?>

	</main>

<?php get_footer(); ?>
