			<!-- footer -->
			<footer class="footer" role="contentinfo">

				<div class="container row">

					<div class="detail row">
						<div class="logo">
							<a href="<?= home_url(); ?>">
								<img src="<?= get_template_directory_uri(); ?>/img/logo-footer.png" alt="Logo" class="logo-img">
							</a>
						</div>
					</div>
					
					<div class="vcard">
						<div>
							<p class="adr">
								<?= get_field('adresse_pied_de_page', 'option'); ?>
							</p>
							<!-- copyright -->
							<p class="copyright">
								&copy; <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?> -
								<a href="//wordpress.org">WordPress</a> - <a href="//nuagegraphik.com">Nuagegraphik</a>
							</p>
							<!-- /copyright -->
						</div>
					</div>

					<nav class="quick-menu">
						<?php html5blank_nav('footer-menu'); ?>
					</nav>

					<div class="horaire">
						<p>
							<?= get_field('horaire_douverture', 'option'); ?>
						</p>
					</div>

					<div class="social">
						<nav>
							<?php html5blank_nav('social-menu'); ?>
						</nav>
					</div>

				</div>
				
			</footer>
			<!-- /footer -->

		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

	</body>
</html>
