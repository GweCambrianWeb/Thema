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
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( "Neidio i'r cynnwys", 'thema' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

			<div class = "thema-language-switch">
				<?php
				if(function_exists('pll_the_languages')){
					$thema_number_of_lang = count(pll_languages_list());
					if ($thema_number_of_lang >2){
						$dropdown = 1;
					}
					else{
						$dropdown = 0;
					}
					$args = array(
						'show_names' => 1,
						'hide_current' => false,
						'dropdown'=>$dropdown
					);

					pll_the_languages($args);
				}
				?>
			</div>

			<div class="site-branding">
				<?php $thema_logo = get_theme_mod('thema-logo-gwefan');	?>

				<!--<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">-->
					<div class = "thema-logo-div">
						<img class="thema-logo" src="<?php echo $thema_logo; ?>"/>
					</div>
					<div class="title-and-description">
						<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
						<p class="site-description"><?php bloginfo( 'description' ); ?></p>
					</div>
				<!--</a>-->
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
					<li><a class="twitter" href="<?php echo $thema_url_twitter; ?>" target = "_BLANK"><i class="fa fa-twitter"></i></a></li>
				<?php } ?>
				<?php if ($thema_url_facebook != "http://facebook.com/"){ ?>
					<li><a class="facebook" href="<?php echo $thema_url_facebook; ?>" target = "_BLANK"><i class="fa fa-facebook-square"></i></a></li>
				<?php } ?>
			</ul>
		</div><!-- .cyfryngau-cymdeithasol -->


		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button id="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Dewislen', 'thema' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
