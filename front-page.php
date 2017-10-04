<?php get_header(); ?>

	<main role="main" aria-label="Content">

		<div class="container">

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<?php if( have_rows('slides') ): ?>

					<section class="slideshow">
						<ul class="slides row">

							<?php while( have_rows('slides') ): the_row(); ?>
								<li class="slide">
									<?php $image = get_sub_field('image'); ?>
									<img class="avatar" src="<?= esc_url(wp_get_attachment_image_url( $image, 'medium' )); ?>">

									<h3 class="main-cat">Actus</h3>

									<?php $texte = get_sub_field('texte'); ?>
									<?php if (!empty($texte)): ?>
										<p><?= get_sub_field('texte') ?></p>
									<?php else: ?>
										<p><?= get_the_excerpt(get_sub_field('lien')) ?></p>	
									<?php endif ?>

									<a href="<?= get_permalink( get_sub_field('lien') )?>"><?= __('Voir +', 'html5blank') ?></a>
								</li>
							<?php endwhile; ?>

						</ul>
					</section>

				<?php endif; ?>

				<section class="nouveautes">
					<h3><?= __('Nouveautés', 'html5blank') ?></h3>
					<?= do_shortcode( '[recent_products per_page="12" columns="4"]' ) ?>
				</section>

				<div class="row">
					<section class="coup-de-coeur">
						<h3><?= __('Coup de coeur', 'html5blank') ?></h3>
						<?= do_shortcode( '[product id="'.get_field('coup_de_coeur').'"]' ) ?>
					</section>

					<section class="recent-posts">
						<?php $actu = get_field('actu'); ?>
						<a href="<?= get_permalink($actu) ?>">
							<h3><?= __('Actus', 'html5blank') ?></h3>
							<img src="<?= get_the_post_thumbnail_url($actu,'medium') ?>" alt="">
							<h2><?= get_the_title( $actu ) ?></h2>
							<p><?= get_the_excerpt( $actu ) ?></p>
							<button class="circle">+</button>
						</a>
					</section>
				</div>
				
				<?php if( get_field('immanquables') ): ?>

					<section class="immanquables">
						<header>
							<h3><?= __('Les immanquables', 'html5blank') ?></h3>
							<h2><?= get_field('titre_immanquables') ?></h2>
							<p><?= get_field('texte_immanquables') ?></p>
						</header>
						
						<ul class="row">
							<?php $posts = get_field('produits_immanquables');
							if( $posts ): foreach( $posts as $post): ?>
									<li class="immanquable">
										<?= do_shortcode( '[product id="'.$post.'"]' ) ?>
									</li>
								<?php endforeach; ?>

							<?php endif; ?>
						</ul>
					</section>

				<?php endif; ?>
				
				<?php if (get_field('categorie_en_avant')): ?>

					<div class="row">
						<?php $cats = array(get_field('colonne_de_gauche'), get_field('colonne_de_droite'));
						foreach( $cats as $cat): ?>

							<section class="category-products">
								<h2><?= get_product_main_category(array($cat->term_id)) ?></h2>
								<h3><?= $cat->name ?></h3>
								<?= do_shortcode( '[product_category per_page="5" columns="3" category="'.$cat->slug.'"]' ) ?>

								<a href="<?= get_category_link($cat->term_id) ?>">+</a>
							</section>

						<?php endforeach; ?>

					</div>

				<?php endif ?>


			<?php endwhile; endif; ?>

		</div>
	</main>

<?php get_footer(); ?>