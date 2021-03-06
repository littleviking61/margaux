<?php $first = 'first-actu'; ?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<?php if (is_search()): ?>
		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class() ?>>

			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">

				<?php if ( has_post_thumbnail()) : ?>
					<div class="thumbnail">
						<?php the_post_thumbnail('medium'); ?>
					</div>
				<?php endif; ?>

				<div class="content">



					<h2>
						<?php the_title(); ?>
					</h2>
					<span class="date">
						<?php if (get_post_type() === 'product'): $_product = wc_get_product( get_the_id() );?>
							€<?= $_product->get_price() ?>
						<?php else: ?>
							<time datetime="<?php the_time('Y-m-d'); ?> <?php the_time('H:i'); ?>">
								<?php the_time('d/m/y'); ?>
							</time>
						<?php endif ?>
					</span>

					<p>
						<?php the_excerpt(); ?>
					</p>
				
					<span class="button circle big">
						<i class="maricon-plus"></i>
					</span>
				
				</div>

			</a>

		</article>
		<!-- /article -->
	<?php else: ?>	
		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(has_post_thumbnail() ? $first : ''); ?>>

			<a class="flipper" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">

				<?php if ( has_post_thumbnail()) : ?>
					<div class="thumbnail front">
						<?php the_post_thumbnail($first !== 'flip-container' ? 'large' : 'medium'); ?>
					</div>
				<?php endif; ?>

				<div class="content back">

					<span class="date">
						<time datetime="<?php the_time('Y-m-d'); ?> <?php the_time('H:i'); ?>">
							<?php the_time('d/m/y'); ?>
						</time>
					</span>

					<h2>
						<?php the_title(); ?>
					</h2>

					<?php if ($first !== 'flip-container') $first = 'flip-container';?>
					<?php the_content(); ?>
				
					<span class="button circle big">
						<i class="maricon-plus"></i>
					</span>
				
				</div>

			</a>

		</article>
		<!-- /article -->
	<?php endif ?>

<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
