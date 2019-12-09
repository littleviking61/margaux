<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?></title>

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

			<div class="search-bar">
				<form role="search" method="get" id="searchform" action="<?= home_url( '/' ) ?>">
    			<input type="text" placeholder="Search" name="s" id="s" />
    			<button type="submit" id="searchsubmit"><i class="maricon-arrow"></i></button>
    		</form>
			</div>

			<header class="header clear" role="banner">

				<div class="container row">

					<nav class="show-on-mobile switch">
						<ul>
					    <li>
                <a href="#switch">
                  <span class="open">
                  	<i class="maricon-navicon"></i>
                  </span>
						    	<span class="close">
						    		<i class="maricon-close"></i>
						    	</span>
                </a>
					    </li>
				    	<li>
				    		<a href="#search">
				    			<span class="open">
                  	<i class="maricon-search"></i>
                  </span>
						    	<span class="close">
						    		<i class="maricon-close"></i>
						    	</span>
				    		</a>
              </li>
						</ul>
					</nav>

					<!-- logo -->
					<div class="logo">
						<a href="<?= home_url(); ?>">
							<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
							<img src="<?= get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" class="logo-img">
						</a>
					</div>
					<!-- /logo -->

					<!-- nav -->
					<nav class="nav" role="navigation">
						<?php html5blank_nav(); ?>
						<div class="show-on-mobile">
							<?php html5blank_nav('top-menu'); ?>
							<?php html5blank_nav('social-menu'); ?>
						</div>
					</nav>
					<!-- /nav -->

					<nav class="show-on-mobile admin">
						<ul>
						    <li class="<?= get_the_ID() == 7 ? ' current-menu-item' : ''; ?>">
						    	<a href="/mon-compte"><i class="maricon-account"></i></a>
						    </li>
						    <li class="<?= get_the_ID() == 5 ? ' current-menu-item' : ''; ?>">
						    	<a href="/panier"><i class="maricon-panier"></i></a>
                </li>
						</ul>
					</nav>

				</div>

			</header>
			<!-- /header -->
