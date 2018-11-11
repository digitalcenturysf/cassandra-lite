<?php
/**
 * Cassandra functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cassandra
 */

/**=====================================================================
 * Constant & definitions
 =======================================================================*/
define('CASSANDRA_NAME', wp_get_theme()->get( 'Name' ));
define('CASSANDRA_STYLE', get_template_directory_uri().'/assets/css/');
define('CASSANDRA_SCRIPT', get_template_directory_uri().'/assets/js/'); 
define('CASSANDRA_DIR', get_template_directory() ); 

/**=====================================================================
 * Includes Theme Config
 ======================================================================*/  
if ( file_exists( CASSANDRA_DIR . '/lib/theme-config/theme-config.php' ) ) {
	require CASSANDRA_DIR . '/lib/theme-config/theme-config.php';
}

/**=====================================================================
 * Theme Core Functions
 ======================================================================*/  
if ( file_exists( CASSANDRA_DIR . '/lib/theme-core-functions/theme-core-functions.php' ) ) { 
	require CASSANDRA_DIR . '/lib/theme-core-functions/theme-core-functions.php';
}

/**=====================================================================
 * Implement the Custom Header feature.
 =====================================================================*/
if ( file_exists( CASSANDRA_DIR . '/inc/custom-header.php' ) ) {
	require CASSANDRA_DIR . '/inc/custom-header.php';
}

/**=====================================================================
 * Custom template tags for this theme.
 =====================================================================*/
if ( file_exists( CASSANDRA_DIR . '/inc/template-tags.php' ) ) {
	require CASSANDRA_DIR . '/inc/template-tags.php';
} 

/**=====================================================================
 * Custom functions that act independently of the theme templates.
 =====================================================================*/
if ( file_exists( CASSANDRA_DIR . '/inc/extras.php' ) ) {
	require CASSANDRA_DIR . '/inc/extras.php';
}  

/**=====================================================================
 * Customizer additions.
 =====================================================================*/
if ( file_exists( CASSANDRA_DIR . '/inc/customizer.php' ) ) {
	require CASSANDRA_DIR . '/inc/customizer.php';
}   

/**=====================================================================
 * Load Jetpack compatibility file.
 =====================================================================*/
if ( file_exists( CASSANDRA_DIR . '/inc/jetpack.php' ) ) {
	require CASSANDRA_DIR . '/inc/jetpack.php';
}    
