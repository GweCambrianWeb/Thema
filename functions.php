<?php
/**
 * thema functions and definitions
 *
 * @package thema
 */

if ( ! function_exists( 'thema_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function thema_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on thema, use a find and replace
	 * to change 'thema' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'thema', get_template_directory() . '/languages' );

	//Mynnu bod y plugin "Polylang" yn cael ei lwytho
	require_once dirname( __FILE__ ) . '/required-plugins/class-tgm-plugin-activation.php';

	add_action( 'tgmpa_register', 'thema_gychwynnol_register_required_plugins' );

	function thema_gychwynnol_register_required_plugins() {

		/**
		* Array of plugin arrays. Required keys are name and slug.
		* If the source is NOT from the .org repo, then source is also required.
		*/
		$plugins = array(

				// Yr ategion sydd angen eu llwytho o repository WordPress
				array(
						'name'      => 'Polylang',
						'slug'      => 'polylang',
						'required'  => true,
				),

		);

		/**
		* Array of configuration settings. Amend each line as needed.
		* If you want the default strings to be available under your own theme domain,
		* leave the strings uncommented.
		* Some of the strings are added into a sprintf, so see the comments at the
		* end of each line for what each argument will be.
		*/
		$config = array(
				'default_path' => '',                      // Default absolute path to pre-packaged plugins.
				'menu'         => 'tgmpa-install-plugins', // Menu slug.
				'has_notices'  => true,                    // Show admin notices or not.
				'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
				'dismiss_msg'  => 'Rhaid cael yr ategyn yma wedi ei weithredu.',                      // If 'dismissable' is false, this message will be output at top of nag.
				'is_automatic' => true,                   // Automatically activate plugins after installation or not.
				'message'      => 'Llwytho yr ategion angenrheidiol.',                      // Message to output right before the plugins table.
				'strings'      => array(
						'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
						'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
						'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
						'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
						'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
						'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
						'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
						'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
						'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
						'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
						'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
						'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
						'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
						'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
						'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
						'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
						'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
						'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
				)
		);

		tgmpa( $plugins, $config );

	}/*
	A oes modd cael yr ieithoedd wedi eu gosod yn awtomatig yn Polylang?
	*/





	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'thema' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'thema_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // thema_setup
add_action( 'after_setup_theme', 'thema_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function thema_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'thema_content_width', 640 );
}
add_action( 'after_setup_theme', 'thema_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function thema_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'thema' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'thema_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function thema_scripts() {
	wp_enqueue_style( 'thema-style', get_stylesheet_uri() );

	wp_enqueue_script( 'thema-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'thema-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'thema_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/*

Adio tudalen groeso unwaith mae'r thema wedi ei weithredu.

Gweler yma - http://premium.wpmudev.org/blog/plugin-welcome-screen/

*/


register_activation_hook( __FILE__, 'thema_gweithredu_tud_groeso' );

add_action("after_switch_theme", "thema_gweithredu_tud_groeso", 10 ,  2);

function thema_gweithredu_tud_groeso() {
	set_transient( '_tud_groeso_ailgyfeirio_gweithredu', true, 30 );
}

add_action( 'admin_init', 'thema_ailgyfeirio_tud_groeso_ar_weithredu' );

function thema_ailgyfeirio_tud_groeso_ar_weithredu() {

	// Bail if no activation redirect
	if ( !get_transient( '_tud_groeso_ailgyfeirio_gweithredu' ) ) {
		return;
	}

	// Delete the redirect transient
	delete_transient( '_tud_groeso_ailgyfeirio_gweithredu' );

	// Bail if activating from network, or bulk
	if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
		return;
	}

	// Ailgyfeirio i dudalen groeso
	wp_safe_redirect( add_query_arg( array( 'page' => 'tudalen-groeso-thema' ), admin_url( 'index.php' ) ) );

}

add_action('admin_menu', 'thema_tudalen_groeso');

function thema_tudalen_groeso() {
	add_dashboard_page(
	'Croeso i Thema',
	'Croeso i Thema',
	'read',
	'tudalen-groeso-thema',
	'cynnwys_tud_groeso_thema'
	);
}

function cynnwys_tud_groeso_thema() {

	?>
	<style>
	.thema-tudgroeso-cynhwysyn{
		margin:100px auto;
		width: 80%;
		border: 0px solid black;
		}
	.thema-tudgroeso-trydydd{
		width:250px;
		float:left;
	}
	</style>
	<div class = "thema-tudgroeso-cynhwysyn">
	<?php
	echo '<h1>'.__('Croeso i Thema', 'thema').'</h1>';

	echo '<p>'.__("Diolch am ddewis Thema! Mae'r thema yma wedi ei ddatblygu i fod yn hawdd i'w defnyddio i bawb, gydag amlieithrwydd yn greiddiol.", 'thema').'</p>';

	echo '<div class = "thema-tudgroeso-trydydd">';
	echo '<h2>'.__('Cychwyn', 'thema').'</h2>';

	echo '<p>'.__('Cychwyn ar ddefnyddio Thema.','thema').'</p>';

	echo'</div>';

	echo'<div class = "thema-tudgroeso-trydydd">';
	echo'<h2>'._('Help', 'thema').'</h2>';

	echo '<p>'.__('Os oes angen help arnoch i ddefnyddio Thema, dyma dudalennau a all helpu:','thema').'</p>';
/*
Rhestr  o links i help.
*/

	echo '</div>';

	echo '<div class = "thema-tudgroeso-trydydd">';
	echo '<h2>'.__('Tiwtorialau', 'thema').'</h2>';

/*
Tiwtorialau ar gyfer defnyddwyr.
*/


	echo'</div>';

  echo '</div>';

	}


add_action( 'admin_head', 'thema_tynnu_tud_groeso_o_ddewislen' );

function thema_tynnu_tud_groeso_o_ddewislen() {
	remove_submenu_page( 'index.php', 'tudalen-groeso-thema' );
}

/*

Adio Paneli yn y bwrdd dash.

*/

add_action('wp_dashboard_setup', 'thema_gychwynnol_gosod_panel_dashfwrdd');

function thema_gychwynnol_gosod_panel_dashfwrdd() {

	global $wp_meta_boxes;

	$teitl_dashfwrdd_help = __("Help a'r Thema");

	add_meta_box('thema_gychwynnol_dash_help', $teitl_dashfwrdd_help, 'thema_gychwynnol_dashfwrdd_help', 'dashboard', 'side', 'high');

}


function thema_gychwynnol_dashfwrdd_help() {
	echo '<h1>'.__('Croeso i Thema.', 'thema').'</h1>';
	echo '<p>'.__("Mae Thema wedi ei weithredu. Croeso i WordPress amlieithog.", 'thema').'</p>';
	echo __('<iframe width="100%" height = "300px" src="https://www.youtube.com/embed/w9OhG7Wx1CY" frameborder="0" allowfullscreen></iframe>', 'thema');
}

/*
A DYLAI HWN FOD YN YR "OPTIONS"? - "Defnyddio steil y thema ar gyfer y dudalen logio mewn?"
*/

/*
Llwytho steil ar gyfer y dudalen admin
*/
function llwytho_css_steil_admin() {
    wp_enqueue_style( 'steil-login-amgen', get_template_directory_uri() . '/steil-admin.css' );
}
add_action( 'login_enqueue_scripts', 'llwytho_css_steil_admin' );
