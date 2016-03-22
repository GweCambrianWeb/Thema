<?php
/**
 * thema Theme Customizer
 *
 * @package thema
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function thema_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	//$wp_customize->get_setting( 'thema-logo-gwefan' )->transport = 'postMessage';


	$wp_customize->add_section("cyfryngau-cymdeithasol", array(
      "title" => __("Cyfryngau Cymdeithasol", "thema"),
			"description" => __("Rhowch URL y cyfryngau cymdeithasol yma er mwyn cael linc iddyn nhw o'ch gwefan.", "thema"),
      "priority" => 30,
  ));

	//Logo y Wefan
	$wp_customize->add_section("logo-gwefan", array(
			"title" => __("Logo y Wefan", "thema"),
			"description" => __("Uwchlwythwch eich logo ar gyfer y wefan.", "thema"),
			"priority" => 30,
	));
	$wp_customize->add_setting("thema-logo-gwefan", array(
				"default" => get_template_directory_uri()."/images/Thema_Logo.png",
				"transport" => "refresh",
				"type" => "theme_mod",
				'sanitize_callback' => 'esc_url',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
		'thema-logo-gwefan', array(
	      "label" => __("Logo'r Wefan", "thema"),
				'section'    => 'title_tagline',
				'settings'   => 'thema-logo-gwefan',

		) ) );



	// Gosodiadau ar gyfer opsiynau Cyfryngau Cymdeithasol

	//Adio Gosodiadar gyfer Facebook
	$wp_customize->add_setting("thema-url-facebook", array(
        "default" => "http://facebook.com/",
        "transport" => "refresh",
				'sanitize_callback' => 'sanitize_text_field',
    ));

		// Adio Gosodiad Twitter
		$wp_customize->add_setting( 'thema-url-twitter' , array(
			'default' => 'http://twitter.com/',
			"transport" => "refresh",
			'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize, 'url-twitter',
			array(
		    'label' => __( 'Trydar', 'thema' ),
		    'section' => 'cyfryngau-cymdeithasol',
				'type' => 'text',
		    'settings' => 'thema-url-twitter',
		)));

	$wp_customize->add_control(new WP_Customize_Control(
	      $wp_customize, "url-facebook",
	      array(
            "label" => __("Facebook", "thema"),
            "section" => "cyfryngau-cymdeithasol",
            "type" => "text",
						"settings" => "thema-url-facebook",
	        )
	    ));

}

add_action( 'customize_register', 'thema_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function thema_customize_preview_js() {
	wp_enqueue_script( 'thema_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'thema_customize_preview_js' );
