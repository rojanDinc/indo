<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?= get_bloginfo('name');?><?php wp_title( '|', true, 'left' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
	<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
	<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js?ver=3.7.0" type="text/javascript"></script>
<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header" role="banner">
			<nav class="navbar" role="navigation" aria-label="main navigation">
				<div class="navbar-brand">
					<?php  if ( get_header_image() ) : ?>
						<a class="navbar-item" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" class="header-image"
								width="<?php echo esc_attr( get_custom_header()->width ); ?>"
								height="<?php echo esc_attr( get_custom_header()->height ); ?>"
								alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>
							<?php else: ?>
							<a class="navbar-item" href="<?php esc_url( home_url( '/' ) ) ?>">
								<img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
							</a>
							<?php endif; ?>

					<a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
						data-target="navbarBasicExample">
						<span aria-hidden="true"></span>
						<span aria-hidden="true"></span>
						<span aria-hidden="true"></span>
					</a>
				</div>

				<div id="navbarBasicExample" class="navbar-menu">
					<div class="navbar-end">
						<?php
							wp_nav_menu( array(
								'theme_location'    => 'primary',
								'depth'             => 2,
								'container'         => false,
								// 'items_wrap'        => 'div',
								'menu_class'        => 'navbar-menu',
								'menu_id'           => 'primary-menu',
								'after'             => "</div>",
								'walker'            => new Navwalker()),
							);
						?>
					</div>
				</div>
			</nav>
		</header><!-- #masthead -->

		<div id="main" class="wrapper">