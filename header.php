<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<header id="masthead" class="site-header">
		<div class="container">
			<div class="site-branding">
				<?php
				if (has_custom_logo()) {
					the_custom_logo();
				} else {
					echo '<a href="' . esc_url(home_url('/')) . '" rel="home"><img src="path/to/default-logo.svg" alt="' . get_bloginfo('name') . '"></a>';
				}
				?>
			</div>
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
    			<span class="hamburger fas fa-bars"></span>
			</button>

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-close fas fa-times"></button> <!-- Close Button -->
				<?php
				wp_nav_menu(array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'menu_class'     => 'menu-list',
					'container'      => false,
				));
				?>
				<!-- Hamburger Socials -->
			<div class="social-media">
				<a href="your-facebook-url"><i class="fab fa-facebook"></i></a>
				<a href="your-twitter-url"><i class="fab fa-twitter"></i></a>
				<a href="your-instagram-url"><i class="fab fa-instagram"></i></a>
				<!-- Add more social icons as needed -->
			</div>
			</nav>
		</div>
	</header>

