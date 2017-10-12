<?php get_header(); ?>

	<main role="main" aria-label="Content">

		<h2 class="page-title">
			<a href="<?= get_permalink(25) ?>"><?= __('Actus', 'html5blank') ?></a>
		</h2>

		<!-- section -->
		<section class="container">

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

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

			<?php endwhile; ?>

			<?php else: ?>

				<!-- article -->
				<article>

					<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

				</article>
				<!-- /article -->

			<?php endif; ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
