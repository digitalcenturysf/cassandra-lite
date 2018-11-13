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
define('cassandra_lite_NAME', wp_get_theme()->get( 'Name' ));
define('cassandra_lite_STYLE', get_template_directory_uri().'/assets/css/');
define('cassandra_lite_SCRIPT', get_template_directory_uri().'/assets/js/'); 
define('cassandra_lite_DIR', get_template_directory() ); 


/**=====================================================================
 * Theme Core Functions
 ======================================================================*/  
if ( file_exists( cassandra_lite_DIR . '/lib/theme-core-functions/theme-core-functions.php' ) ) { 
	require cassandra_lite_DIR . '/lib/theme-core-functions/theme-core-functions.php';
}
/**=====================================================================
 * Implement the Custom Header feature.
 =====================================================================*/
if ( file_exists( cassandra_lite_DIR . '/inc/custom-header.php' ) ) {
	require cassandra_lite_DIR . '/inc/custom-header.php';
}
/**=====================================================================
 * Custom template tags for this theme.
 =====================================================================*/
if ( file_exists( cassandra_lite_DIR . '/inc/template-tags.php' ) ) {
	require cassandra_lite_DIR . '/inc/template-tags.php';
} 
/**=====================================================================
 * Custom functions that act independently of the theme templates.
 =====================================================================*/
if ( file_exists( cassandra_lite_DIR . '/inc/extras.php' ) ) {
	require cassandra_lite_DIR . '/inc/extras.php';
}  
/**=====================================================================
 * Customizer additions.
 =====================================================================*/
if ( file_exists( cassandra_lite_DIR . '/inc/customizer.php' ) ) {
	require cassandra_lite_DIR . '/inc/customizer.php';
}   
/**=====================================================================
 * Load Jetpack compatibility file.
 =====================================================================*/
if ( file_exists( cassandra_lite_DIR . '/inc/jetpack.php' ) ) {
	require cassandra_lite_DIR . '/inc/jetpack.php';
}    
