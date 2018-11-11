<?php
/**
 * Cmb2 Metabox Fileds
 */

add_action( 'cmb2_admin_init', 'cassandra_metabox' ); 
function cassandra_metabox() { 

	//  prefix
	$prefix = '_cassandra_'; 
 
	/**=====================================================================
	 * metabox for page banner
	 =====================================================================*/ 
	$cmb2_Post_Banner = new_cmb2_box( array(
		'id'           => $prefix . '_cassandra_posts_settings',
		'title'        => esc_html__( 'Post Settings','cassandra-lite' ),
		'object_types' => array( 'post'), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true
	) ); 
	$cmb2_Post_Banner->add_field( array(
	    'name'             =>  esc_html__( 'Sub Title','cassandra-lite' ),
	    'id'               => $prefix.'subtitle',
	    'type'             => 'text',
	    'default'          => ''
	) ); 

	/**=====================================================================
	 * metabox for page banner
	 =====================================================================*/ 
	$cmb2_Page_Banner = new_cmb2_box( array(
		'id'           => $prefix . '_cassandra_page_settings',
		'title'        => esc_html__( 'Header Settings','cassandra-lite' ),
		'object_types' => array( 'page'), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true
	) ); 

	$cmb2_Page_Banner->add_field( array(
	    'name'             =>  esc_html__( 'Top Header','cassandra-lite' ),
	    'id'               => $prefix.'top_header',
	    'type'             => 'radio_inline',
	    'default'          => 'no',
	    'options'          => array(
	        'yes'       => esc_html__( 'Show','cassandra-lite' ),
	        'no'       => esc_html__( 'Hide','cassandra-lite' ) 
	    ),
	) ); 

	$cmb2_Page_Banner->add_field( array(
	    'name'             =>  esc_html__( 'Page Title','cassandra-lite' ),
	    'id'               => $prefix.'page_title',
	    'type'             => 'radio_inline',
	    'default'          => 'yes',
	    'options'          => array(
	        'yes'       => esc_html__( 'Show','cassandra-lite' ),
	        'no'       => esc_html__( 'Hide','cassandra-lite' ) 
	    ),
	) ); 
	
	$cmb2_Page_Banner->add_field( array(
	    'name'             =>  esc_html__( 'Banner Variation','cassandra-lite' ),
	    'id'               => $prefix.'header_style',
	    'type'             => 'radio_inline',
	    'default'          => 'bnr',
	    'options'          => array(
	        'none'            => esc_html__( 'None','cassandra-lite' ),
	        'bnr'             => esc_html__( 'Banner','cassandra-lite' ), 
	        'postsldr'        => esc_html__( 'Post Slider','cassandra-lite' ), 
	        'revsldr'         => esc_html__( 'Revolution Slider','cassandra-lite' ), 
	        'bnrtrnsfull'         => esc_html__( 'Transparent Fullscreen','cassandra-lite' ) 
	    ),
	) ); 
	$cmb2_Page_Banner->add_field( array(
		'name'    => esc_html__( 'Banner Style','cassandra-lite' ),
		'id'      => $prefix . 'pg_bnr_style',
		'type'    => 'radio_inline',
		'options' => array(
			'bnrtrns'   => esc_html__( 'Transparent','cassandra-lite' ),
			'nor'   => esc_html__( 'Normal','cassandra-lite' ) 
		),
		'default' => 'nor' 
	) ); 
	$cmb2_Page_Banner->add_field( array(
		'name'    => esc_html__( 'Slider Style','cassandra-lite' ),
		'id'      => $prefix . 'pg_slider_styl',
		'type'    => 'radio_inline',
		'options' => array(
			'1'   => esc_html__( 'One','cassandra-lite' ),
			'2'   => esc_html__( 'Two','cassandra-lite' ) 
		),
		'default' => '1' 
	) ); 
	$cmb2_Page_Banner->add_field( array(
	    'name'             =>  esc_html__( 'Slider Category','cassandra-lite' ),
	    'id'               => $prefix.'page_psldr_cat', 
	    'desc'             => esc_html__( 'Select a slider category to disiplay slider from your specified category.','cassandra-lite' ),
	    'type'             => 'select',
	    'options_cb'       => 'cassandra_slider_terms',
	) ); 

	$cmb2_Page_Banner->add_field( array(
	    'name'             =>  esc_html__( 'Banner Image','cassandra-lite' ),
	    'id'               => $prefix.'page_banner',
	    'desc'             => esc_html__( 'Upload individual page banner','cassandra-lite' ),
	    'type'             => 'file',
	) );
	$cmb2_Page_Banner->add_field( array(
	    'name'             =>  esc_html__( 'Banner Image','cassandra-lite' ),
	    'id'               => $prefix.'page_banner_trans',
	    'desc'             => esc_html__( 'Upload individual page banner','cassandra-lite' ),
	    'type'             => 'file',
	) );
	$cmb2_Page_Banner->add_field( array(
	    'name'             =>  esc_html__( 'Banner Title','cassandra-lite' ),
	    'id'               => $prefix.'page_banner_ttl',
	    'desc'             => esc_html__( 'Write Title here.','cassandra-lite' ),
	    'type'             => 'text',
	) );
	$cmb2_Page_Banner->add_field( array(
	    'name'             =>  esc_html__( 'Banner SubTitle (Top)','cassandra-lite' ),
	    'id'               => $prefix.'page_banner_sbttl',
	    'desc'             => esc_html__( 'Write Subtitle here.','cassandra-lite' ),
	    'type'             => 'text',
	) );
	$cmb2_Page_Banner->add_field( array(
	    'name'             =>  esc_html__( 'Title','cassandra-lite' ),
	    'id'               => $prefix.'page_trans_ttl',
	    'desc'             => esc_html__( 'Write title here.','cassandra-lite' ),
	    'type'             => 'text',
	) );
	$cmb2_Page_Banner->add_field( array(
	    'name'             =>  esc_html__( 'Sub Title','cassandra-lite' ),
	    'id'               => $prefix.'page_trans_sbttl',
	    'desc'             => esc_html__( 'Write subtitle here.','cassandra-lite' ),
	    'type'             => 'text',
	) );
	$cmb2_Page_Banner->add_field( array(
	    'name'             =>  esc_html__( 'Short Text','cassandra-lite' ),
	    'id'               => $prefix.'page_trans_shorttxt',
	    'desc'             => esc_html__( 'Write short text here.','cassandra-lite' ),
	    'type'             => 'textarea',
	) );
	$cmb2_Page_Banner->add_field( array(
	    'name'             =>  esc_html__( 'Button Title','cassandra-lite' ),
	    'id'               => $prefix.'page_trans_btn',
	    'desc'             => esc_html__( 'Write button title here.','cassandra-lite' ),
	    'type'             => 'text',
	) );
	$cmb2_Page_Banner->add_field( array(
	    'name'             =>  esc_html__( 'Button Link','cassandra-lite' ),
	    'id'               => $prefix.'page_trans_btnlnk',
	    'desc'             => esc_html__( 'Write button link here.','cassandra-lite' ),
	    'type'             => 'text',
	) );

	if (class_exists('RevSlider')) {
		global $wpdb;
		$cassandra_rev_tbl_name = esc_sql( 'revslider_sliders' );
		$cassandra_rev_tbl = $wpdb->prefix . $cassandra_rev_tbl_name;
		$cassandra_rs = $wpdb->get_results( "SELECT id, title, alias FROM $cassandra_rev_tbl ORDER BY id ASC LIMIT 999" ); 
		$cassandra_revsliders = array();
		if ($cassandra_rs) {
			foreach ( $cassandra_rs as $cassandra_slider ) {
				$cassandra_revsliders[$cassandra_slider->alias] = $cassandra_slider->alias;
			}
		} else {
			$cassandra_revsliders["No sliders found"] = esc_html__('No Alias found','cassandra-lite');
		}
		$cmb2_Page_Banner->add_field( array(
		    'name'             =>  esc_html__('Rev Slider Alias','cassandra-lite' ), 
		    'id'               => $prefix.'rev_slidr_alias',
		    'type'             => 'select',
		    'options'          => $cassandra_revsliders,
		    'default'          => '',
		    'desc'         	   => esc_html__( 'Select any One, Which One You want to display','cassandra-lite' ),
			'show_option_none' => true,
		) );
	}

	/**=====================================================================
	 * metabox for page footer
	 =====================================================================*/ 
	$cmb2_PageF_Banner = new_cmb2_box( array(
		'id'           => $prefix . '_cassandra_page_f_settings',
		'title'        => esc_html__( 'Footer Settings','cassandra-lite' ),
		'object_types' => array( 'page'), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true
	) ); 
 
	$cmb2_PageF_Banner->add_field( array(
	    'name'             =>  esc_html__( 'Newsletter','cassandra-lite' ),
	    'id'               => $prefix.'newsletter',
	    'type'             => 'radio_inline',
	    'default'          => 'yes',
	    'options'          => array(
	        'yes'       => esc_html__( 'Show','cassandra-lite' ),
	        'no'       => esc_html__( 'Hide','cassandra-lite' ) 
	    ),
	) ); 
	$cmb2_PageF_Banner->add_field( array(
	    'name'             =>  esc_html__( 'Clients Logo','cassandra-lite' ),
	    'id'               => $prefix.'clinetslogo',
	    'type'             => 'radio_inline',
	    'default'          => 'yes',
	    'options'          => array(
	        'yes'       => esc_html__( 'Show','cassandra-lite' ),
	        'no'       => esc_html__( 'Hide','cassandra-lite' ) 
	    ),
	) ); 


	/**=====================================================================
	 * metabox for page sidebar
	 =====================================================================*/  
	$cmb2_post_sidebar = new_cmb2_box( array(
		'id'           => $prefix . '_cassandra_posts_sidebar',
		'title'        => esc_html__( 'Post Sidebar','cassandra-lite' ),
		'object_types' => array( 'page'), // Post type
		'context'      => 'side',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		//'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	) );

	$cmb2_post_sidebar->add_field( array(
	    'name'             =>  esc_html__( 'Sidebar Type','cassandra-lite' ),
	    'id'               => $prefix.'post_sidebar',
	    'desc'             => esc_html__( 'Select any one. which you want to display','cassandra-lite' ),
	    'type'             => 'select',
	    'default'          => 'right',
	    'options'          => array(
	        'left'    => esc_html__( 'Left Sidebar','cassandra-lite' ),
	        'right'   => esc_html__( 'Right Sidebar','cassandra-lite' ),
	        'fullw'   => esc_html__( 'Box Width','cassandra-lite' ),
	        'fulls'   => esc_html__( 'Full Width','cassandra-lite' )
	    ),
	) );  

	/**=====================================================================
	 * metabox for slider
	 =====================================================================*/  
	$cmb2_post_sidebar = new_cmb2_box( array(
		'id'           => $prefix . '_cassandra_posts_slider',
		'title'        => esc_html__( 'Slider Options','cassandra-lite' ),
		'object_types' => array( 'sliders'), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true,  
	) );
	$cmb2_post_sidebar->add_field( array(
		'name'    => esc_html__( 'Slider Style','cassandra-lite' ),
		'id'      => $prefix . 'pst_slider_styl',
		'type'    => 'radio_inline',
		'options' => array(
			'1'   => esc_html__( 'One','cassandra-lite' ),
			'2'   => esc_html__( 'Two','cassandra-lite' ) 
		),
		'default' => '1' 
	) ); 
	$cmb2_post_sidebar->add_field( array(
	    'name'             =>  esc_html__( 'Text Line 1','cassandra-lite' ),
	    'id'               => $prefix.'sldr_ln_1',
	    'type'             => 'text', 
	    'default'          => '' 
	) ); 
	$cmb2_post_sidebar->add_field( array(
	    'name'             =>  esc_html__( 'Text Line 2','cassandra-lite' ),
	    'id'               => $prefix.'sldr_ln_2',
	    'type'             => 'text', 
	    'default'          => '' 
	) ); 
	$cmb2_post_sidebar->add_field( array(
	    'name'             =>  esc_html__( 'Text Line 3','cassandra-lite' ),
	    'id'               => $prefix.'sldr_ln_3',
	    'type'             => 'text', 
	    'default'          => '' 
	) ); 
	$cmb2_post_sidebar->add_field( array(
	    'name'             =>  esc_html__( 'Text Line 4','cassandra-lite' ),
	    'id'               => $prefix.'sldr_ln_4',
	    'type'             => 'text', 
	    'default'          => '' 
	) ); 
	$cmb2_post_sidebar->add_field( array(
	    'name'             =>  esc_html__( 'Text Line 5','cassandra-lite' ),
	    'id'               => $prefix.'sldr_ln_5',
	    'type'             => 'textarea', 
	    'default'          => '' 
	) ); 
	$cmb2_post_sidebar->add_field( array(
	    'name'             =>  esc_html__( 'Shop Now Button Text','cassandra-lite' ),
	    'id'               => $prefix.'shopnow',
	    'type'             => 'text', 
	    'default'          => '' 
	) ); 
	$cmb2_post_sidebar->add_field( array(
	    'name'             =>  esc_html__( 'Shop Now Button Url','cassandra-lite' ),
	    'id'               => $prefix.'shopnow_url',
	    'type'             => 'text', 
	    'default'          => '' 
	) ); 
	$cmb2_post_sidebar->add_field( array(
	    'name'             =>  esc_html__( 'View Button Text','cassandra-lite' ),
	    'id'               => $prefix.'viewbuttn',
	    'type'             => 'text', 
	    'default'          => '' 
	) ); 
	$cmb2_post_sidebar->add_field( array(
	    'name'             =>  esc_html__( 'View Button Url','cassandra-lite' ),
	    'id'               => $prefix.'viewbuttn_url',
	    'type'             => 'text', 
	    'default'          => '' 
	) ); 
 
	/**=====================================================================
	 * metabox for testimonial
	 =====================================================================*/  
	$cmb2_post_sidebar = new_cmb2_box( array(
		'id'           => $prefix . '_cassandra_testimonial_slider',
		'title'        => esc_html__( 'Testimonial Options','cassandra-lite' ),
		'object_types' => array( 'testimonials'), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true,  
	) );

	$cmb2_post_sidebar->add_field( array(
	    'name'             =>  esc_html__( 'Desgination','cassandra-lite' ),
	    'id'               => $prefix.'testi_desig',
	    'type'             => 'text', 
	    'default'          => '' 
	) ); 

 

}

