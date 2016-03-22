<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package thema
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'thema' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<?php
			$thema_logo = get_theme_mod('thema-logo-gwefan');
			?>

			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img class = "thema-logo" style = "max-width:200px; float:left;"src = "<?php echo $thema_logo; ?>"/><?php bloginfo( 'name' ); ?></a></h1>
			<p class="site-description"><?php bloginfo( 'description' ); ?></p>
		</div><!-- .site-branding -->
		<div class = "thema-language-switch">
			<?php
				if(function_exists('pll_the_languages')){
					$args = array(
						'show_names' => 1,
						'hide_current' => false
					);

					pll_the_languages($args);

				}
			 ?>
		</div>
		<?php
			$thema_url_twitter = get_theme_mod('thema-url-twitter');
			$thema_url_facebook = get_theme_mod('thema-url-facebook');
		 ?>
		<div class = "cyfryngau-cymdeithasol">

			<ul class = "thema-eiconnau-rhestr">
				<?php
				//Falle angen bod yn fwy picky yma? Os nad yw'r darn ar ol y url wedi ei lenwi?
				if ($thema_url_twitter != "http://twitter.com/"){ ?>
				<li><a class="twitter" href="<?php echo $thema_url_twitter; ?>"><i class="fa fa-twitter"></i></a></li>
				<?php } ?>
				<?php if ($thema_url_facebook != "http://facebook.com/"){ ?>
				<li><a class="facebook" href="<?php echo $thema_url_facebook; ?>"><i class="fa fa-facebook-square"></i></a></li>
				<?php } ?>
			</ul>
		</div>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Dewislen', 'thema' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
