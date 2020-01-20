<?php
/**
 * MentalPress functions and definitions
 *
 * @author Primoz Ciger <primoz@proteusnet.com>
 * @author Marko Prelec <marko.prelec@proteusnet.com>
 */

// Display informative message if PHP version is less than 5.3.2
if ( version_compare( phpversion(), '5.3.2', '<' ) ) {
	sprintf( 'This theme requires <strong>PHP 5.3.2+</strong> to run. Please contact your hosting company and ask them to update the PHP version of your site to at least PHP 5.3.2.<br> Your current version of PHP: <strong>%s</strong>', phpversion() );
}

// Composer autoloader
require_once( get_template_directory() . '/vendor/autoload.php' );


/**
 * Define the version variable to assign it to all the assets (css and js)
 */
define( 'MENTALPRESS_WP_VERSION', wp_get_theme()->get( 'Version' ) );


/**
 * Define the development constant
 */
if ( ! defined( 'MENTALPRESS_DEVELOPMENT' ) ) {
	define( 'MENTALPRESS_DEVELOPMENT', false );
}


/**
 * Settings for the NavXT plugin
 * @todo remove in future versions
 */
if ( ! defined( 'BCN_SETTINGS_USE_LOCAL' ) ) {
	define( 'BCN_SETTINGS_USE_LOCAL', true );
}


/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @see http://developer.wordpress.com/themes/content-width/Enqueue
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1140; /* pixels */
}


/**
 * Advanced Custom Fields calls to require the plugin within the theme
 */
locate_template( 'inc/acf.php', true, true );


/**
 * Theme support and thumbnail sizes
 */
if( ! function_exists( 'mentalpress_theme_setup' ) ) {
	function mentalpress_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on MentalPress, use a find and replace
		 * to change 'mentalpress_wp' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'mentalpress_wp', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// WooCommerce basic support
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		// Title tag support, since 4.1
		add_theme_support( 'title-tag' );

		// Custom Backgrounds
		add_theme_support( 'custom-background', array(
			'default-color' => 'f2f4f7',
			'default-image' => get_template_directory_uri() . '/assets/images/pattern.png'
		) );

		/**
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'jumbotron-slider-l', 850, 400, true );
		add_image_size( 'jumbotron-slider-s', 425, 200, true );
		add_image_size( 'latest-posts', 270, 190, true );
		// add_image_size( 'page-box', 360, 240, true ); //-> this was moved to proteuswidgets plugin

		// Menus
		add_theme_support( 'menus' );
		register_nav_menu( 'main-menu', _x( 'Main Menu', 'backend', 'mentalpress_wp' ) );
		register_nav_menu( 'top-bar-menu', _x( 'Top Bar Menu', 'backend', 'mentalpress_wp' ) );

		// Add theme support for Semantic Markup
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) );

		// add excerpt support for pages
		add_post_type_support( 'page', 'excerpt' );

		// Add CSS for the TinyMCE editor
		add_editor_style();
	}
	add_action( 'after_setup_theme', 'mentalpress_theme_setup' );
}


/**
 * Enqueue CSS stylesheets
 */
if( ! function_exists( 'mentalpress_enqueue_styles' ) ) {
	function mentalpress_enqueue_styles() {
		wp_enqueue_style( 'mentalpress-main', get_stylesheet_uri(), array(), MENTALPRESS_WP_VERSION );

		if ( is_ecwid_active() ) {
			wp_enqueue_style( 'mentalpress-ecwid', get_template_directory_uri() . '/ecwid.css', array( 'mentalpress-main' ), MENTALPRESS_WP_VERSION );
		}
	}
	add_action( 'wp_enqueue_scripts', 'mentalpress_enqueue_styles' );
}


/**
 * Enqueue Google Web Fonts.
 */
if ( ! function_exists( 'mentalpress_enqueue_google_web_fonts' ) ) {
	function mentalpress_enqueue_google_web_fonts() {
		wp_enqueue_style( 'google-fonts', mentalpress_google_web_fonts_url(), array(), null );
	}
	add_action( 'wp_enqueue_scripts', 'mentalpress_enqueue_google_web_fonts' );
}


/**
 * Enqueue JS scripts
 */
if( ! function_exists( 'mentalpress_enqueue_scripts' ) ) {
	function mentalpress_enqueue_scripts() {
		// modernizr for the frontend feature detection
		wp_enqueue_script( 'mentalpress-modernizr', get_template_directory_uri() . '/assets/js/modernizr.custom.20160315.js', array(), null );

		// picturefill for the support of the <picture> element today
		wp_enqueue_script( 'mentalpress-picturefill', get_template_directory_uri() . '/bower_components/picturefill/dist/picturefill.min.js', array( 'mentalpress-modernizr' ), '1.2.0' );

		// google maps
		wp_register_script( 'mentalpress-gmaps', mentalpress_get_google_maps_api_url(), array(), null, true );

		// requirejs
		wp_register_script( 'requirejs', get_template_directory_uri() . '/bower_components/requirejs/require.js', array(), null, true );

		// Array for main.js dependencies.
		$main_deps = array( 'jquery', 'underscore', 'mentalpress-gmaps' );

		// Main JS file, conditionally.
		if ( true === MENTALPRESS_DEVELOPMENT ) {
			$main_deps[] = 'requirejs';
			wp_enqueue_script( 'mentalpress-main', get_template_directory_uri() . '/assets/js/main.js', $main_deps, MENTALPRESS_WP_VERSION, true );
		}
		else {
			wp_enqueue_script( 'mentalpress-main', get_template_directory_uri() . '/assets/js/main.min.js', $main_deps, MENTALPRESS_WP_VERSION, true );
		}

		// main JS file

		// Pass data to the main script
		wp_localize_script( 'mentalpress-main', 'MentalPressVars', array(
			'pathToTheme'  => get_template_directory_uri(),
		) );

		// for nested comments
		if ( is_singular() && comments_open() ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'mentalpress_enqueue_scripts' );
}


/**
 * Register admin JS scripts
 */
if( ! function_exists( 'mentalpress_admin_enqueue_scripts' ) ) {
	function mentalpress_admin_enqueue_scripts() {
		// enqueue admin utils js
		wp_enqueue_script( 'mentalpress-admin-utils', get_template_directory_uri() . '/assets/js/admin.js', array( 'jquery', 'underscore', 'backbone' ) );

		// provide the global variable to the `mentalpress-admin-utils`
		wp_localize_script( 'mentalpress-admin-utils', 'MentalPressAdminVars', array(
			'pathToTheme' => get_template_directory_uri(),
		) );
	}
	add_action( 'admin_enqueue_scripts', 'mentalpress_admin_enqueue_scripts' );
}


/**
 * Require the files in the folder /inc/
 */
$mentalpress_files_to_require = array(
	'helpers',
	'theme-widgets',
	'theme-sidebars',
	'filters',
	'compat',
	'shortcodes',
	'theme-customizer',
	'custom-comments',
	'woocommerce',
	'theme-registration',
);

// Conditionally require the includes files, based if they exist in the child theme or not
foreach( $mentalpress_files_to_require as $file ) {
	locate_template ( "inc/{$file}.php", true, true );
}


/**
 * Require some files only when in admin
 */
if ( is_admin() ) {
	// other files
	$mentalpress_admin_files_to_require = array(
		// custom code
		'inc/tgm-plugin-activation',
		'inc/documentation-link',
	);

	foreach( $mentalpress_admin_files_to_require as $file ) {
		locate_template ( $file . '.php' , true, true );
	}
}
