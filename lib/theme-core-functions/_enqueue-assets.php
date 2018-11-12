<?php 
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**=============================================================
 * Enqueue scripts and styles.
 *==============================================================*/
function cassandra_scripts() {
	global $cassandra; 	
    $cassandra_opt = new CassandraFrameworkOpt();
    $cassandra_demo = $cassandra_opt->cassandra_demo_setup();
	
	// LOAD FONTS
	wp_enqueue_style( 'cassandra-fonts', cassandra_fonts_url(), array(), '1.0.0' );


	// LOAD STYLE SHEET 
	wp_enqueue_style( 'cassandra-default', CASSANDRA_STYLE . 'default-style.css' );
	wp_enqueue_style( 'bootstrap', CASSANDRA_STYLE . 'bootstrap.min.css' );
    wp_enqueue_style( 'font-awesome', CASSANDRA_STYLE . 'font-awesome.min.css' );
	wp_enqueue_style( 'owl-carousel', CASSANDRA_STYLE . 'owl.carousel.min.css' );
    wp_enqueue_style( 'cassandra-style', get_stylesheet_uri() );
    if($cassandra_demo==2){
        wp_enqueue_style( 'cassandra-style-d2', CASSANDRA_STYLE . 'style-d2.css' );
    }
    if($cassandra_demo==3){
        wp_enqueue_style( 'cassandra-style-d3', CASSANDRA_STYLE . 'style-d3.css' );
    }
	wp_enqueue_style( 'cassandra-responsive', CASSANDRA_STYLE . 'responsive.css' );

     // Internet Explorer HTML5 support 
    wp_enqueue_script( 'html5shiv', CASSANDRA_SCRIPT .'html5shiv.js', array(), '3.7.0', false);
    wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

    // Internet Explorer 8 media query support
    wp_enqueue_script( 'respond',  CASSANDRA_SCRIPT .'respond.js', array(), '1.4.2', false);
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

    // LOAD SCRIPT 
    wp_enqueue_script( 'bootstrap', CASSANDRA_SCRIPT . 'bootstrap.min.js', array('jquery'), '20151215', true );
    wp_enqueue_script( 'countdown', CASSANDRA_SCRIPT . 'countdown.js', array(), '20151215', true );
	wp_enqueue_script( 'owl-carousel', CASSANDRA_SCRIPT . 'owl.carousel.js', array(), '20151215', true );
	wp_enqueue_script( 'cassandra-main', CASSANDRA_SCRIPT . 'main.js', array(), '20151215', true );
	wp_enqueue_script( 'cassandra-navigation', CASSANDRA_SCRIPT . 'navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'cassandra-skip-link-focus-fix', CASSANDRA_SCRIPT . 'skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// inline style css
	$cassandra_custom_css = "";
    $cassandra_adv_css = (isset($cassandra['custom_css'])) ? $cassandra['custom_css'] : '' ;

    if(isset($cassandra['logo-width']) && !empty($cassandra['logo-width'])){
    	$cassandra_logo_wd = $cassandra['logo-width'];
        $cassandra_custom_css .= "
			a.navbar-brand img{
				width:{$cassandra_logo_wd};
			}
        ";
    }
    if(isset($cassandra['logo-height']) && !empty($cassandra['logo-height'])){
    	$cassandra_logo_ht = $cassandra['logo-height'];
        $cassandra_custom_css .= "
			a.navbar-brand img{
				height:{$cassandra_logo_ht};
			}
        ";
    }
    if((isset($cassandra['wdgt-bg-clr']) && !empty($cassandra['wdgt-bg-clr'])) || (isset($cassandra['wdgt-bg-img']['url']) && !empty($cassandra['wdgt-bg-img']['url']))){
        $cassandra_wdgt_bg = $cassandra['wdgt-bg-clr'];
    	$cassandra_wdgt_bgImg = $cassandra['wdgt-bg-img']['url'];
        if($cassandra_wdgt_bgImg){
            $cassandra_custom_css .= "
                .footer-area{
                    background: {$cassandra_wdgt_bg} url({$cassandra_wdgt_bgImg}) center top no-repeat; 
                }
            ";
        }else{
            $cassandra_custom_css .= "
                .footer-area{
                    background:{$cassandra_wdgt_bg};
                }
            ";
        } 
    }
    if(isset($cassandra['wdgt-scl-bgc']) && !empty($cassandra['wdgt-scl-bgc'])){
    	$cassandra_scl_bgc = $cassandra['wdgt-scl-bgc'];
        $cassandra_custom_css .= "
			.footer-area .footer_bx1 .social_icon a{
				background:{$cassandra_scl_bgc};
			}
        ";
    }
    if(isset($cassandra['wdgt-scl-clr']) && !empty($cassandra['wdgt-scl-clr'])){
    	$cassandra_scl_clr = $cassandra['wdgt-scl-clr'];
        $cassandra_custom_css .= "
			.footer-area .footer_bx1 .social_icon a{
				color:{$cassandra_scl_clr};
			}
        ";
    }
    if(isset($cassandra['wdgt-scl-hvrclr']) && !empty($cassandra['wdgt-scl-hvrclr'])){
    	$cassandra_scl_bgcH = $cassandra['wdgt-scl-hvrclr'];
        $cassandra_custom_css .= "
			.footer-area .footer_bx1 .social_icon a:hover{
				color:{$cassandra_scl_bgcH};
			}
        ";
    }
    if(isset($cassandra['fwdgt-1']['url']) && !empty($cassandra['fwdgt-1']['url'])){
    	$cassandra_scl_wdgt1 = $cassandra['fwdgt-1']['url'];
        $cassandra_custom_css .= "
			.footer_bx:nth-child(1){
			    background: url({$cassandra_scl_wdgt1}) right 40px top no-repeat;
			}
        ";
    }
    if(isset($cassandra['fwdgt-2']['url']) && !empty($cassandra['fwdgt-2']['url'])){
    	$cassandra_scl_wdgt2 = $cassandra['fwdgt-2']['url'];
        $cassandra_custom_css .= "
			.footer_bx:nth-child(2){
			    background: url({$cassandra_scl_wdgt2}) right 40px top no-repeat;
			}
        ";
    }
    if(isset($cassandra['fwdgt-3']['url']) && !empty($cassandra['fwdgt-3']['url'])){
    	$cassandra_scl_wdgt3 = $cassandra['fwdgt-3']['url'];
        $cassandra_custom_css .= "
			.footer_bx:nth-child(3){
			    background: url({$cassandra_scl_wdgt3}) right 40px top no-repeat;
			}
        ";
    }
    if(isset($cassandra['fwdgt-4']['url']) && !empty($cassandra['fwdgt-4']['url'])){
        $cassandra_scl_wdgt4 = $cassandra['fwdgt-4']['url'];
        $cassandra_custom_css .= "
            .footer_bx:nth-child(4){
                background: url({$cassandra_scl_wdgt4}) right 40px top no-repeat;
            }
        ";
    }

    // page banner
    if(is_page()){
        $cassandra_bnr_img = get_post_meta(get_the_ID(),'_cassandra_page_banner',true);
        $cassandra_bnrtrns_img = get_post_meta(get_the_ID(),'_cassandra_page_banner_trans',true);
        $cassandra_header = get_post_meta(get_the_ID(),'_cassandra_header_style',true);
        $cassandra_header_pg = get_post_meta(get_the_ID(),'_cassandra_pg_bnr_style',true);
        if(isset($cassandra_bnr_img) && !empty($cassandra_bnr_img)){ 
            if(($cassandra_header_pg=='bnrtrns') && ($cassandra_header=='bnr')){
                $cassandra_custom_css .= " 
                    .header_bg_area{ 
                        background: url({$cassandra_bnr_img}) center top no-repeat; 
                    }   
                ";
            }elseif($cassandra_header=='bnrtrnsfull'){
                $cassandra_custom_css .= " 
                    .home_header_bg_area{ 
                        background: url({$cassandra_bnrtrns_img}) center top no-repeat; 
                    }  
                ";
            }else{
                $cassandra_custom_css .= " 
                    .header-top-inner{ 
                        background: #09090B url({$cassandra_bnr_img}) center center no-repeat; 
                    } 
                ";
            } 
        }
    }elseif(is_archive()){
        if ( class_exists('WooCommerce' ) ){
            if(is_shop() || is_product_category() || is_product_tag() ){
                $cassandra_bnr_img = $cassandra_opt->cassandra_enable_banner_url(); 
                if(isset($cassandra_bnr_img) && !empty($cassandra_bnr_img)){ 
                    $cassandra_custom_css .= "
                        .header-top-inner{
                            background: #09090B url({$cassandra_bnr_img}) center center no-repeat;
                        }
                    ";
                }
            }else{ 
                $cassandra_bnr_img = $cassandra_opt->cassandra_enable_banner_url(); 
                if(isset($cassandra_bnr_img) && !empty($cassandra_bnr_img)){ 
                    $cassandra_custom_css .= "
                        .header-top-inner{
                            background: #09090B url({$cassandra_bnr_img}) center center no-repeat;
                        }
                    ";
                }
            } 
        }else{ 
            $cassandra_bnr_img = $cassandra_opt->cassandra_enable_banner_url(); 
            if(isset($cassandra_bnr_img) && !empty($cassandra_bnr_img)){ 
                $cassandra_custom_css .= "
                    .header-top-inner{
                        background: #09090B url({$cassandra_bnr_img}) center center no-repeat;
                    }
                ";
            }
        }
    }else{       
        $cassandra_bnr_img = $cassandra_opt->cassandra_enable_banner_url(); 
        if(isset($cassandra_bnr_img) && !empty($cassandra_bnr_img)){ 
            $cassandra_custom_css .= "
                .header-top-inner{
                    background: #09090B url({$cassandra_bnr_img}) center center no-repeat;
                }
            ";
        } 
    }



    $cassandra_custom_css .= "{$cassandra_adv_css}";
    wp_add_inline_style( 'cassandra-style', $cassandra_custom_css );


}
add_action( 'wp_enqueue_scripts', 'cassandra_scripts' );

// widget js
function cassandra_about_us_widgetscript() {
    wp_enqueue_media();
    wp_enqueue_script('cassandra-widget', CASSANDRA_SCRIPT . 'widget.js', false, '1.0', true);
}
add_action('admin_enqueue_scripts', 'cassandra_about_us_widgetscript');

