<?php 
/**
 * Theme Core Functions 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
/**===============================================================================
 * Enqueue Theme Assets (Scripts & Styles)
 =================================================================================*/
if ( file_exists( cassandra_lite_DIR . '/lib/theme-core-functions/_enqueue-assets.php')) {
    require cassandra_lite_DIR . '/lib/theme-core-functions/_enqueue-assets.php';
}
/**===============================================================================
 * Register Functions
 =================================================================================*/
if ( file_exists( cassandra_lite_DIR . '/lib/theme-core-functions/_register.php')) { 
    require cassandra_lite_DIR . '/lib/theme-core-functions/_register.php';
}
/**===============================================================================
 * Helpers Functions
 =================================================================================*/
if ( file_exists( cassandra_lite_DIR . '/lib/theme-core-functions/_helpers.php')) { 
    require cassandra_lite_DIR . '/lib/theme-core-functions/_helpers.php';
}
/**===============================================================================
 * Helpers Functions
 =================================================================================*/
if ( file_exists( cassandra_lite_DIR . '/lib/theme-core-functions/_nav-walker.php')) { 
    require cassandra_lite_DIR . '/lib/theme-core-functions/_nav-walker.php';
}
/**===============================================================================
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 ===============================================================================*/
if ( ! function_exists( 'cassandra_lite_setup' ) ) :
function cassandra_lite_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on WP Framework, use a find and replace
	 * to change 'cassandra-lite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'cassandra-lite', get_template_directory() . '/languages' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	// Enable shortcodes in text widgets
	add_filter('widget_text','do_shortcode');
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
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' ); 
	add_image_size('cassandra-blog-single',850,413,true);
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'mainmenu' => esc_html__( 'Main Menu','cassandra-lite' ),
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
	 * Custom Logo
	 */ 
  	add_theme_support( 'custom-logo', array(
	   'height'      => 39,
	   'width'       => 139,
	   'flex-width'  => true,
       'flex-height' => true,'header-text' => array( 'logo-area' ),
	) );

	add_theme_support( 'custom-header', array(
		'flex-width'    => true, 
		'flex-height'    => true, 
		'default-image' => get_template_directory_uri() . '/assets/images/banner.jpg',
	) );
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css', cassandra_lite_fonts_url() ) );
	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'cassandra_lite_setup' );

/**===============================================================================
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 ===============================================================================*/
function cassandra_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cassandra_lite_content_width', 1170 );
}
add_action( 'after_setup_theme', 'cassandra_lite_content_width', 0 );
/**===============================================================================
 * Remove the Open Sans From Frontend & Backend
 =================================================================================*/ 
if (!function_exists('cassandra_lite_remove_wp_open_sans')) :
    function cassandra_lite_remove_wp_open_sans() {
        wp_deregister_style( 'open-sans' );
        wp_register_style( 'open-sans', false );
    }
    add_action('wp_enqueue_scripts', 'cassandra_lite_remove_wp_open_sans');
    // Uncomment below line to remove from the admin
    // add_action('admin_enqueue_scripts', 'cassandra_lite_remove_wp_open_sans');
endif;
