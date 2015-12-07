<?php
add_filter('comment_flood_filter', '__return_false');
require ('wp_bootstrap_navwalker.php');
add_action('after_setup_theme', 'mobiler_theme_setup');
function mobiler_theme_setup(){
    load_theme_textdomain('mobiler', get_template_directory() . '/languages');
	add_theme_support( 'post-thumbnails', array( 'page', 'post', 'slider' ) ); 
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_editor_style();
}


if ( ! isset( $content_width ) ) {
	$content_width = 650;
}

// definitions 
define('MY_WORDPRESS_FOLDER',$_SERVER['DOCUMENT_ROOT']);
define('MY_THEME_FOLDER',dirname(__FILE__));
define('MY_THEME_PATH','/' .'wp-content/themes/mobiler');


///////////////////////////////
// custom post for sliders
///////////////////////////////
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.5.2
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'               => 'Mobiler Sliders', // The plugin name.
			'slug'               => 'mobiler-sliders', // The plugin slug (typically the folder name).
			'source'             => get_stylesheet_directory() . '/lib/plugins/mobiler-sliders.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),

		array(
			'name'        => 'WordPress SEO by Yoast',
			'slug'        => 'wordpress-seo',
			'is_callable' => 'wpseo_init',
			'required'           => true,
		),
		
		array(
			'name'        => 'Character Countdown',
			'slug'        => 'character-countdown',
			'required'           => true,
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		
	);

	tgmpa( $plugins, $config );
}


///////////////////////////////
// menus
///////////////////////////////

include (MY_THEME_FOLDER . '/inc/menus.inc.php');
include (MY_THEME_FOLDER . '/inc/shortcodes.inc.php');

///////////////////////////////
// thumbs theme support
///////////////////////////////

add_theme_support( 'post-thumbnails', array( 'slider', 'post', 'page' ) );

///////////////////////////////
// custom thumb sizes
///////////////////////////////

add_image_size( 'homepage-carusel', 1170, 500, true );
add_image_size( 'above', 800, 350, true );
add_image_size( 'homepage-carusel-wide', 1600, 500, true );
add_image_size( 'theme-logo', 230, 400, false );
///////////////////////////////
// theme settings
///////////////////////////////
add_action('admin_enqueue_scripts', 'mobiler_admin_scripts');
 
function mobiler_admin_scripts() {
        wp_enqueue_media();
		wp_enqueue_style( 'mobiler-admin', get_template_directory_uri().'/css/mobiler-admin.css' );
        wp_register_script('my-admin-js', MY_THEME_PATH.'/js/my-admin.js', array('jquery'));
        wp_enqueue_script('my-admin-js');
    
}
include(MY_THEME_FOLDER . '/inc/themeSettings.inc.php');

/////////////////////////////////
// own widgets 
/////////////////////////////////

include(MY_THEME_FOLDER . '/inc/mobilerWidgets.inc.php');

/////////////////////////////////
// custom comments
/////////////////////////////////

include (MY_THEME_FOLDER .'/inc/comments.inc.php');
