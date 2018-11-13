<?php
/**
 * Cassandra functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Cassandra
 */
/**=====================================================================
 * Constant & definitions
 =======================================================================*/
define('CASSANDRA_LITE_NAME', wp_get_theme()->get( 'Name' ));
define('CASSANDRA_LITE_STYLE', get_template_directory_uri().'/assets/css/');
define('CASSANDRA_LITE_SCRIPT', get_template_directory_uri().'/assets/js/'); 
define('CASSANDRA_LITE_DIR', get_template_directory() ); 


/**=====================================================================
 * Theme Core Functions
 ======================================================================*/  
if ( file_exists( CASSANDRA_LITE_DIR . '/lib/theme-core-functions/theme-core-functions.php' ) ) { 
	require CASSANDRA_LITE_DIR . '/lib/theme-core-functions/theme-core-functions.php';
}
/**=====================================================================
 * Implement the Custom Header feature.
 =====================================================================*/
if ( file_exists( CASSANDRA_LITE_DIR . '/inc/custom-header.php' ) ) {
	require CASSANDRA_LITE_DIR . '/inc/custom-header.php';
}
/**=====================================================================
 * Custom template tags for this theme.
 =====================================================================*/
if ( file_exists( CASSANDRA_LITE_DIR . '/inc/template-tags.php' ) ) {
	require CASSANDRA_LITE_DIR . '/inc/template-tags.php';
} 
/**=====================================================================
 * Custom functions that act independently of the theme templates.
 =====================================================================*/
if ( file_exists( CASSANDRA_LITE_DIR . '/inc/extras.php' ) ) {
	require CASSANDRA_LITE_DIR . '/inc/extras.php';
}  
/**=====================================================================
 * Customizer additions.
 =====================================================================*/
if ( file_exists( CASSANDRA_LITE_DIR . '/inc/customizer.php' ) ) {
	require CASSANDRA_LITE_DIR . '/inc/customizer.php';
}   
/**=====================================================================
 * Load Jetpack compatibility file.
 =====================================================================*/
if ( file_exists( CASSANDRA_LITE_DIR . '/inc/jetpack.php' ) ) {
	require CASSANDRA_LITE_DIR . '/inc/jetpack.php';
}    
