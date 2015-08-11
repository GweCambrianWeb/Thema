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

	$wp_customize->add_section("cyfryngau-cymdeithasol", array(
      "title" => __("Cyfryngau Cymdeithasol", "thema"),
			"description" => __("Rhowch URL y cyfryngau cymdeithasol yma er mwyn cael linc iddyn nhw o'ch gwefan.", "thema"),
      "priority" => 30,
  ));

	// Add settings for each social media

	//add setting for Facebook
	$wp_customize->add_setting("url-facebook", array(
        "default" => "http://facebook.com/",
        "transport" => "postMessage",
    ));

	$wp_customize->add_control(new WP_Customize_Control(
	      $wp_customize,
	      "url-facebook",
	      array(
            "label" => __("Facebook", "url-facebook"),
            "section" => "cyfryngau-cymdeithasol",
            "type" => "text",
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
