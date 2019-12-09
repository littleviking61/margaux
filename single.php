<?php get_header(); ?>

	<main role="main" aria-label="Content">

		<h2 class="page-title">
			<a href="<?= get_permalink(25) ?>"><?= __('Actus', 'html5blank') ?></a>
		</h2>

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- section -->
			<section class="container">
				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<!-- post thumbnail -->
					<?php $gallery = get_field('gallery'); ?>
					<?php if(count($gallery) > 0) : ?>
						<div class="thumbnail gallery">
							<?php foreach( $gallery as $image ): ?>
	                 <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
	        		<?php endforeach; ?>
						</div>
					<?php elseif ( has_post_thumbnail()) : ?>
						<div class="thumbnail">
							<?php the_post_thumbnail('full'); ?>
						</div>
					<?php endif; ?>
					<!-- /post thumbnail -->
					
					<div class="content">
						<span class="date">
							<time datetime="<?php the_time('Y-m-d'); ?> <?php the_time('H:i'); ?>">
								<?php the_time('d/m/y'); ?>
							</time>
						</span>
						
						<!-- post title -->
						<h2><?php the_title(); ?></h2>
						<!-- /post title -->

						<?php the_content(); // Dynamic Content ?>
					</div>

				</article>
				<!-- /article -->
			</section>
			<!-- /section -->

			<?php if( get_field('afficher_produits_lies') && get_field('produits') ): ?>
				<section class="full related-products">
					<h3><?= get_field('titre') ?></h3>
					<?php if (count(get_field('produits')) > 1): ?>
							<div class="slider" data-slide="<?= count(get_field('produits')) > 4 ? 4 : count(get_field('produits')) ?>">
								<?= do_shortcode( '[products ids="'.implode(',', get_field('produits')).'"]' ) ?>
						</div>
					<?php else: ?>
						<?= do_shortcode( '[products ids="'.implode(',', get_field('produits')).'"]' ) ?>
					<?php endif ?>				
				</section>
			<?php endif; ?>

			<?php endwhile; ?>

			<?php else: ?>
			<!-- section -->
			<section class="container">
				<!-- article -->
				<article>

					<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

				</article>
				<!-- /article -->
			</section>
			<!-- /section -->

			<?php endif; ?>

	</main>

<?php get_footer(); ?>
