<?php get_header(); ?>

	<main role="main" aria-label="Content">
		<!-- section -->
		<div class="container">

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1><?php the_title() ?></h1>
				<section class="row">
					<ul class="brands">
					<?php 
						$terms = get_terms("pa_brand");
						foreach ( $terms as $term ) : //term_id, name, get_field('logo', $term->term_id)?>
							<li class="brand">
								<a href="<?= get_term_link($term->term_id) ?>">
									<?php if (!empty(get_field('logo', $term))): ?>
										<?= wp_get_attachment_image( get_field('logo', $term), 'thumbnail', false, ["title" => $term->name]); ?>	
									<?php else: ?>
										<?= $term->name ?>
									<?php endif ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
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

<?php get_footer(); ?>
