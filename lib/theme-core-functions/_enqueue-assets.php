<?php 
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**=============================================================
 * Enqueue scripts and styles.
 *==============================================================*/
function cassandra_lite_scripts() {
	global $cassandra; 	 
	
	// LOAD FONTS
	wp_enqueue_style( 'cassandra-fonts', cassandra_lite_fonts_url(), array(), '1.0.0' );


	// LOAD STYLE SHEET 
	wp_enqueue_style( 'cassandra-default', cassandra_lite_STYLE . 'default-style.css' );
	wp_enqueue_style( 'bootstrap', cassandra_lite_STYLE . 'bootstrap.css' );
    wp_enqueue_style( 'font-awesome', cassandra_lite_STYLE . 'font-awesome.css' ); 
    wp_enqueue_style( 'cassandra-style', get_stylesheet_uri() ); 
	wp_enqueue_style( 'cassandra-responsive', cassandra_lite_STYLE . 'responsive.css' );

     // Internet Explorer HTML5 support 
    wp_enqueue_script( 'html5shiv', cassandra_lite_SCRIPT .'html5shiv.js', array(), '3.7.0', false);
    wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

    // Internet Explorer 8 media query support
    wp_enqueue_script( 'respond',  cassandra_lite_SCRIPT .'respond.js', array(), '1.4.2', false);
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

    // LOAD SCRIPT 
    wp_enqueue_script( 'bootstrap', cassandra_lite_SCRIPT . 'bootstrap.js', array('jquery'), '20151215', true );  
	wp_enqueue_script( 'cassandra-main', cassandra_lite_SCRIPT . 'main.js', array(), '20151215', true );
	wp_enqueue_script( 'cassandra-navigation', cassandra_lite_SCRIPT . 'navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'cassandra-skip-link-focus-fix', cassandra_lite_SCRIPT . 'skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// inline style css
    $cassandra_lite_text_color = get_theme_mod( 'header_textcolor' );

    if(isset($cassandra_lite_text_color) && !empty($cassandra_lite_text_color)){ 
        $cassandra_lite_custom_css .= "
            .navbar-inverse .navbar-nav li a{
                color:#{$cassandra_lite_text_color};
            }
        ";
    } 
    $cassandra_lite_hdr_img = get_header_image();
    if(isset($cassandra_lite_hdr_img) && !empty($cassandra_lite_hdr_img)){ 
        $cassandra_lite_custom_css .= "
			.header-top-inner{
                background: #09090B url({$cassandra_lite_hdr_img}) center center no-repeat; 
			}
        ";
    } 
    $cassandra_lite_custom_css .= "{$cassandra_lite_adv_css}";
    wp_add_inline_style( 'cassandra-style', $cassandra_lite_custom_css );


}
add_action( 'wp_enqueue_scripts', 'cassandra_lite_scripts' );

// widget js
function cassandra_lite_about_us_widgetscript() {
    wp_enqueue_media();
    wp_enqueue_script('cassandra-widget', cassandra_lite_SCRIPT . 'widget.js', false, '1.0', true);
}
add_action('admin_enqueue_scripts', 'cassandra_lite_about_us_widgetscript');

