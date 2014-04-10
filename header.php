<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package casando_sem_grana_theme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php //wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		<section class="section-header">
			<div class="site-branding">
				<h1 class="site-title">
					<a href="<?php //echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php //bloginfo( 'name' ); ?>
						<!-- <img  src="<?php //bloginfo( "template_url" ); ?>/images/logo.png"> -->
						<img id="logo" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
					</a>
				</h1>

				<h2 class="site-description"><?php //bloginfo( 'description' ); ?></h2>

				<div id="img-left">
					<div id="conh-morando"></div><!-- #conh-morando -->
				</div><!-- #feed -->

				<div id="img-left"></div><!-- #img-left -->
				<div id="img-right"></div><!-- #img-right -->

			</div><!-- .site-branding -->
		</section><!-- .section-header -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h1 class="menu-toggle"><?php //_e( 'Menu', 'casando_sem_grana_theme' ); ?></h1>
			<a class="skip-link screen-reader-text" href="#content"><?php //_e( 'Skip to content', 'casando_sem_grana_theme' ); ?></a>
			<?php //wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">