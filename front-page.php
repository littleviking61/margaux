<?php get_header(); ?>

	<main role="main" aria-label="Content">

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<?php if( have_rows('slides') ): ?>

				<section class="slideshow">
					<ul class="slides">

						<?php while( have_rows('slides') ): the_row(); ?>
							<li class="slide">
								<?php $image = get_sub_field('image'); ?>
								<div class="thumbnail">
									<img class="avatar" src="<?= esc_url(wp_get_attachment_image_url( $image, 'large' )); ?>">
								</div>

								<div class="content">
									<h3 class="main-cat">Actus</h3>

									<?php $texte = get_sub_field('texte'); ?>
									<?php if (!empty($texte)): ?>
										<p><?= get_sub_field('texte') ?></p>
									<?php else: ?>
										<p><?= get_the_excerpt(get_sub_field('lien')) ?></p>	
									<?php endif ?>
									
									<a class="button" href="<?= get_permalink( get_sub_field('lien') )?>"><?= __('Voir <i class="maricon-plus"></i>', 'html5blank') ?></a>
								</div>
							</li>
								<li class="slide">
								<?php $image = get_sub_field('image'); ?>
								<div class="thumbnail">
									<img class="avatar" src="<?= esc_url(wp_get_attachment_image_url( $image, 'large' )); ?>">
								</div>

								<div class="content">
									<h3 class="main-cat">Actus</h3>

									<?php $texte = get_sub_field('texte'); ?>
									<?php if (!empty($texte)): ?>
										<p><?= get_sub_field('texte') ?></p>
									<?php else: ?>
										<p><?= get_the_excerpt(get_sub_field('lien')) ?></p>	
									<?php endif ?>
									
									<a class="button" href="<?= get_permalink( get_sub_field('lien') )?>"><?= __('Voir <i class="maricon-plus"></i>', 'html5blank') ?></a>
								</div>
							</li>
						<?php endwhile; ?>

					</ul>
				</section>

			<?php endif; ?>

			<section class="nouveautes">
				<h3><?= __('Nouveautés', 'html5blank') ?></h3>
				<div class="slider">
					<?= do_shortcode( '[recent_products per_page="12"]' ) ?>
				</div>
			</section>

			<div class="row">
				<section class="coup-de-coeur">
					
					<?php 
						$content = do_shortcode( '[product id="'.get_field('coup_de_coeur').'"]' ) ;
						$content = str_replace('<div class="thumbnail"', '<h3 class="title">'. __('Coup de coeur', 'html5blank') .'</h3><div class="thumbnail"',$content);
						echo $content;
					?>
				</section>

				<section class="recent-posts">
					<?php $actu = get_field('actu'); ?>
					<a href="<?= get_permalink($actu) ?>">
						<h3><?= __('Actus', 'html5blank') ?></h3>
						<div class="thumbnail">
							<img src="<?= get_the_post_thumbnail_url($actu,'medium') ?>" alt="">
						</div>
						<div class="content">
							<h2><?= get_the_title( $actu ) ?></h2>
							<p><?= get_the_excerpt( $actu ) ?></p>
							<span class="button big"><i class="maricon-plus"></i></span>
						</div>
					</a>
				</section>
			</div>
			
			<?php if( get_field('immanquables') ): ?>

				<section class="immanquables full">
					<div class="container row">
						<header>
							<h3><?= __('Les immanquables', 'html5blank') ?></h3>
							<h2><?= get_field('titre_immanquables') ?></h2>
							<p><?= get_field('texte_immanquables') ?></p>
						</header>
						<?= do_shortcode( '[products ids="'.implode(',', get_field('produits_immanquables')).'"]' ) ?>
							
					</div>
				</section>

			<?php endif; ?>
			
			<?php if (get_field('categorie_en_avant')): ?>

				<div class="row">
					<?php $cats = array(get_field('colonne_de_gauche'), get_field('colonne_de_droite'));
					foreach( $cats as $cat): ?>

						<section class="category-products">
							<h3><?= get_product_main_category(array($cat->term_id)) ?></h3>
							<h2><?= $cat->name ?></h2>
							<?= do_shortcode( '[product_category per_page="6" columns="3" category="'.$cat->slug.'"]' ) ?>

							<a href="<?= get_category_link($cat->term_id) ?>">
								<img src="<?= get_template_directory_uri(); ?>/img/carre.png" alt="">
								<span class="button big">
									<i class="maricon-plus"></i>
								</span>
							</a>
						</section>

					<?php endforeach; ?>

				</div>

			<?php endif ?>


		<?php endwhile; endif; ?>

	</main>

<?php get_footer(); ?>