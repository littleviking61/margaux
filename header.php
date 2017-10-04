<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' : '; } ?><?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<link href="<?= get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
		<link href="<?= get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>" />
		<link href="https://file.myfontastic.com/hrssS8iZnJT2yGnqZLhU3Y/icons.css" rel="stylesheet">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?= get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper">

			<!-- header -->
			<div class="top-bar">
				<div class="container row">
					<?php edit_post_link('<i class="icon-edit"></i>'); ?>
					
					<div class="vcard">
						<p class="adr">
							<?= get_field('adresse_en-tete', 'option'); ?>
						</p>
					</div>

					<nav>
						<?php html5blank_nav('top-menu'); ?>

						<?php html5blank_nav('social-menu'); ?>


					</nav>
				</div>

			</div>

			<header class="header clear" role="banner">

				<div class="container row">
					<!-- logo -->
					<div class="logo">
						<a href="<?= home_url(); ?>">
							<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
							<img src="<?= get_template_directory_uri(); ?>/img/logo.png" alt="Logo" class="logo-img">
						</a>
					</div>
					<!-- /logo -->

					<!-- nav -->
					<nav class="nav" role="navigation">
						<?php html5blank_nav(); ?>
					</nav>
					<!-- /nav -->
				</div>

			</header>
			<!-- /header -->
