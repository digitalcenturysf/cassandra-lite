<?php 
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cassandra_lite_widgets_init() { 
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar','cassandra-lite' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.','cassandra-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s popular_area">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="site-section-area"><h2>',
		'after_title'   => '</h2></div>',
	) ); 
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget','cassandra-lite' ),
		'id'            => 'sidebar-f',
		'description'   => esc_html__( 'Add widgets here.','cassandra-lite' ),
		'before_widget' => '<div id="%1$s" class=" %2$s footer_bx ">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'cassandra_lite_widgets_init' );

/**
 *	Register Fonts
 */
function cassandra_lite_fonts_url() {
    $cassandra_lite_font = '';
	$open_sans = _x( 'on', 'Open Sans font: on or off','cassandra-lite' );
	$Montserrat = _x( 'on', 'Montserrat font: on or off','cassandra-lite' );
	$Arimo = _x( 'on', 'Arimo font: on or off','cassandra-lite' );
	$Playfair_Display = _x( 'on', 'Playfair Display font: on or off','cassandra-lite' );
	if ( 'off' !== $open_sans || 'off' !== $Roboto ) {
		$font_families = array();
		if ( 'off' !== $open_sans ) {
			$font_families[] = 'Open Sans: 400,300,600,700,800';
		}
		if ( 'off' !== $Montserrat ) {
			$font_families[] = 'Montserrat: 400,700';
		}
		if ( 'off' !== $Arimo ) {
			$font_families[] = 'Arimo: 400,400i,700,700i';
		}
		if ( 'off' !== $Playfair_Display ) {
			$font_families[] = 'Playfair Display: 400,400i,700,700i,900,900i';
		}
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' )
		);
		$cassandra_lite_font = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}
    return esc_url_raw( $cassandra_lite_font );
}