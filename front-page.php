<?php get_header(); ?>

	<main role="main" aria-label="Content">

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<?php if( have_rows('slides') ): ?>

				<section class="slideshow">
					<ul class="slides">

						<?php while( have_rows('slides') ): the_row(); ?>

							<li class="slide">
								<?php 
									$image = get_sub_field('image');
									$texte = get_sub_field('texte'); 
									$linkID = get_sub_field('lien'); 
								?>

								<div class="thumbnail">
									<?php if (!empty($image)): ?>		
										<img class="avatar" src="<?= esc_url(wp_get_attachment_image_url( $image, 'large' )); ?>">
									<?php else: ?>
										<img class="avatar" src="<?= esc_url(get_the_post_thumbnail_url( $linkID, 'large' )); ?>">
									<?php endif; ?>
								</div>

								<div class="content">
									<?php $texte = get_sub_field('texte'); $linkID = get_sub_field('lien'); ?>
									<?php if ( get_post_type($linkID) == 'post'): ?>
										<h3 class="main-cat">Actus</h3>
										<?php if (!empty($texte)): ?>
											<p><?= get_sub_field('texte') ?></p>
										<?php else: ?>
											<p><?= get_the_excerpt($linkID) ?></p>	
										<?php endif ?>
										
										<a class="button" href="<?= get_permalink( $linkID )?>"><?= __('Voir <i class="maricon-plus"></i>', 'html5blank') ?></a>
									<?php else: ?>
										<?php $product = wc_get_product( $linkID ); ?>
										<h3 class="main-cat">Produit</h3>
										<?php if (!empty($texte)): ?>
											<p><?= get_sub_field('texte') ?></p>
										<?php elseif (!empty($product->get_short_description())): ?>
											<p><?= $product->get_short_description(); ?></p>	
										<?php else: ?>
											<p><?= $product->get_description(); ?></p>	
										<?php endif ?>
										
										<a class="button" href="<?= get_permalink( $linkID )?>"><?= __('Voir <i class="maricon-plus"></i>', 'html5blank') ?></a>
									<?php endif ?>
								</div>
							</li>

						<?php endwhile; ?>

					</ul>
				</section>

			<?php endif; ?>

			<section class="nouveautes">
				<h3><?= __('Nouveautés', 'html5blank') ?></h3>
				<div class="slider">
					<?php if( get_field('nouveautes') ): ?>
						<?= do_shortcode( '[products ids="'.implode(',', get_field('produits_nouveautes')).'"]' ) ?>
					<?php else: ?>
						<?= do_shortcode( '[recent_products per_page="12"]' ) ?>
					<?php endif; ?>
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
					<?php $actualite = get_field('actu')[0]; ?>
					<a href="<?= get_permalink($actualite) ?>">
						<h3><?= __('Actus', 'html5blank') ?></h3>
						<div class="thumbnail">
							<img src="<?= get_the_post_thumbnail_url($actualite,'medium') ?>" alt="">
						</div>
						<div class="content">
							<h2><?= get_the_title( $actualite ) ?></h2>
							<?php $post = get_post($actualite);
								setup_postdata($post);
								echo '<p>'.get_the_excerpt().'</p>';
								wp_reset_postdata(); ?>
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