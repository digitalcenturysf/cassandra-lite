<?php 

class CassandraFrameworkOpt{

    // demo choose
    public function cassandra_demo_setup(){
        global $cassandra;  
        if((isset($cassandra['demo-chose'])) && (''!=$cassandra['demo-chose'])){ 
            return $cassandra['demo-chose'];
        }else{
            return 1;
        }   
    } 

    // logo 
    public function cassandra_logo(){
        global $cassandra;  
        if((isset($cassandra['logo-up']['url'])) && (''!=$cassandra['logo-up']['url'])){ 
            return '<img src="'.$cassandra['logo-up']['url'].'" tilte="cassandra"/>';
        }else{
            return '<img src="'.get_template_directory_uri().'/assets/images/logo.png" alt="Logo"/>';
        }   
    } 
 
    // logo width
    public function cassandra_logo_width(){
        global $cassandra;  
        if(isset($cassandra['logo-width'])){
            return $cassandra['logo-width'];
        }else{
            return '158px';
        }   
    }  
    // logo height
    public function cassandra_logo_height(){
        global $cassandra;  
        if(isset($cassandra['logo-height'])){
            return $cassandra['logo-height'];
        }else{
            return '52px';
        }   
    }  

    // menu cart icon
    public function cassandra_cart_ico(){
        global $cassandra;  
        if(isset($cassandra['cart-ico'])){
            return $cassandra['cart-ico'];
        }else{
            return 0;
        }   
    }  
    // brand enable
    public function cassandra_brand_enable(){
        global $cassandra;  
        if(isset($cassandra['brnd-switch'])){
            return $cassandra['brnd-switch'];
        }else{
            return 0;
        }   
    }  
    // newsletter enable
    public function cassandra_newsletter_enable(){
        global $cassandra;  
        if(isset($cassandra['subscr-switch'])){
            return $cassandra['subscr-switch'];
        }else{
            return 0;
        }   
    }  
    // newsletter enable
    public function cassandra_widget_enable(){
        global $cassandra;  
        if(isset($cassandra['wdgt-switch'])){
            return $cassandra['wdgt-switch'];
        }else{
            return 0;
        }   
    }  

    // subscribe text
    public function cassandra_subscribe_text(){
        global $cassandra;  
        if(isset($cassandra['sub-msg'])){
            return $cassandra['sub-msg'];
        }else{
            return '';
        }   
    }  

    // footer brand
    public function cassandra_footer_brand(){
        global $cassandra;  
        ?>
            <?php if(isset($cassandra['brand-1']['url'])): ?> 
                <li><img src="<?php echo esc_url($cassandra['brand-1']['url']); ?>" alt="partner logo"></li>
            <?php endif; ?>
            <?php if(isset($cassandra['brand-2']['url'])): ?>
                <li><img src="<?php echo esc_url($cassandra['brand-2']['url']); ?>" alt="partner logo"></li>
            <?php endif; ?>
            <?php if(isset($cassandra['brand-3']['url'])): ?>
                <li><img src="<?php echo esc_url($cassandra['brand-3']['url']); ?>" alt="partner logo"></li>
            <?php endif; ?>
            <?php if(isset($cassandra['brand-4']['url'])): ?>
                <li><img src="<?php echo esc_url($cassandra['brand-4']['url']); ?>" alt="partner logo"></li>
            <?php endif; ?>
            <?php if(isset($cassandra['brand-5']['url'])): ?>
                <li><img src="<?php echo esc_url($cassandra['brand-5']['url']); ?>" alt="partner logo"></li>
            <?php endif; ?>
            <?php if(isset($cassandra['brand-6']['url'])): ?>
                <li><img src="<?php echo esc_url($cassandra['brand-6']['url']); ?>" alt="partner logo"></li>
            <?php endif; ?>
        <?php
    }  

    // top header
    public function cassandra_top_header(){
        global $cassandra;
        $cassandra_hdr_top_swd = (!empty($cassandra['tophd-switch'])) ? $cassandra['tophd-switch'] : 0;
        if(is_page()){       
            $cassandra_top_hdr = get_post_meta(get_the_ID(),'_cassandra_top_header',true);
            $cassandra_header = get_post_meta(get_the_ID(),'_cassandra_pg_bnr_style',true); 
            $cassandra_header_fls = get_post_meta(get_the_ID(),'_cassandra_header_style',true); 
            if($cassandra_top_hdr=='yes'):
                ?>
                  <div class="header-top-area <?php echo (($cassandra_header=='bnrtrns') || ($cassandra_header_fls=='bnrtrnsfull')) ? 'trans' : ''; ?>">
                    <div class="container">
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="header-top-left">
                            <ul>
                                <?php if(isset($cassandra['phone-txt']) && (''!=$cassandra['phone-txt'])): ?> 
                                  <li><i class="fa fa-phone" aria-hidden="true"></i><?php printf(esc_html__('%s','cassandra-lite'),$cassandra['phone-txt']); ?></li>
                                <?php endif; ?>
                                <?php if(isset($cassandra['email-txt']) && (''!=$cassandra['email-txt'])): ?>
                                  <li><i class="fa fa-envelope-o" aria-hidden="true"></i><?php printf(esc_html__('%s','cassandra-lite'),$cassandra['email-txt']); ?></li>
                                <?php endif; ?> 
                            </ul>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="header-top-right">
                            <div class="lang"><a href="#" class="dropdown-toggle" data-toggle="dropdown" id="lang_option" ><img src="<?php echo get_template_directory_uri(); ?>/assets/images/lang.png" alt="language icon"> English <i class="fa fa-angle-down"></i> </a>|
                              <div class="dropdown-menu" aria-labelledby="lang_option"> <a href="#">Spanish</a> <a href="#">Chinese</a> <a href="#">Arabic</a> </div>
                            </div>
                            <div class="currency"><a href="#" class="dropdown-toggle" data-toggle="dropdown" id="currency_option" >$USD <i class="fa fa-angle-down"></i> </a>|
                              <div class="dropdown-menu" aria-labelledby="currency_option"> <a href="#">Euro</a> <a href="#">Yuan</a> <a href="#">AED</a> </div>
                            </div>
                            <div class="account"><a href="#" class="dropdown-toggle" data-toggle="dropdown" id="accout_option" ><i class="fa fa-user"></i> My Account <i class="fa fa-angle-down"></i></a>
                                <div class="dropdown-menu" aria-labelledby="accout_option">   
                                    <?php if(is_user_logged_in()): ?>
                                        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ).'edit-account'; ?>">My Profile</a>
                                        <a href="<?php echo wp_logout_url( home_url() ); ?>">LogOut</a> 
                                    <?php else: ?>
                                        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">LogIn</a> 
                                        <a href="<?php echo get_permalink(wc_get_page_id('myaccount')). '?action=register' ?>">Register</a> 
                                    <?php endif; ?>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
            endif;
        }else{    
            if($cassandra_hdr_top_swd==1):
                ?>
                  <div class="header-top-area">
                    <div class="container">
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="header-top-left">
                            <ul>
                                <?php if(isset($cassandra['phone-txt']) && (''!=$cassandra['phone-txt'])): ?> 
                                  <li><i class="fa fa-phone" aria-hidden="true"></i><?php printf(esc_html__('%s','cassandra-lite'),$cassandra['phone-txt']); ?></li>
                                <?php endif; ?>
                                <?php if(isset($cassandra['email-txt']) && (''!=$cassandra['email-txt'])): ?>
                                  <li><i class="fa fa-envelope-o" aria-hidden="true"></i><?php printf(esc_html__('%s','cassandra-lite'),$cassandra['email-txt']); ?></li>
                                <?php endif; ?> 
                            </ul>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="header-top-right">
                            <div class="lang"><a href="#" class="dropdown-toggle" data-toggle="dropdown" id="lang_option" ><img src="<?php echo get_template_directory_uri(); ?>/assets/images/lang.png" alt="language icon"> English <i class="fa fa-angle-down"></i> </a>|
                              <div class="dropdown-menu" aria-labelledby="lang_option"> <a href="#">Spanish</a> <a href="#">Chinese</a> <a href="#">Arabic</a> </div>
                            </div>
                            <div class="currency"><a href="#" class="dropdown-toggle" data-toggle="dropdown" id="currency_option" >$USD <i class="fa fa-angle-down"></i> </a>|
                              <div class="dropdown-menu" aria-labelledby="currency_option"> <a href="#">Euro</a> <a href="#">Yuan</a> <a href="#">AED</a> </div>
                            </div>
                            <div class="account"><a href="#" class="dropdown-toggle" data-toggle="dropdown" id="accout_option" ><i class="fa fa-user"></i> My Account <i class="fa fa-angle-down"></i></a>
                                <div class="dropdown-menu" aria-labelledby="accout_option">   
                                    <?php if(is_user_logged_in()): ?>
                                        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ).'edit-account'; ?>">My Profile</a>
                                        <a href="<?php echo wp_logout_url( home_url() ); ?>">LogOut</a> 
                                    <?php else: ?>
                                        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">LogIn</a> 
                                        <a href="<?php echo get_permalink(wc_get_page_id('myaccount')). '?action=register' ?>">Register</a> 
                                    <?php endif; ?>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
            endif;
        }
    }  

    // blog page enable
    public function cassandra_enable_banner(){
        global $cassandra;  
        if(is_home() ){
            if(isset($cassandra['blog-enable'])){
                return $cassandra['blog-enable'];
            }else{
                return false;
            }   
        }elseif(is_search()){ 
            if(isset($cassandra['search-enable'])){
                return $cassandra['search-enable'];
            }else{
                return false;
            }  
        }elseif(is_single()){ 
            if(isset($cassandra['single-enable'])){
                return $cassandra['single-enable'];
            }else{
                return false;
            }  
        }elseif(is_archive()){ 
            if ( class_exists('WooCommerce' ) ){
                if(is_shop() || is_product_category() || is_product_tag() ){  
                    if(isset($cassandra['shop-enable'])){
                        return $cassandra['shop-enable'];
                    }else{
                        return false;
                    } 
                }else{
                    if(isset($cassandra['archive-enable'])){
                        return $cassandra['archive-enable'];
                    }else{
                        return false;
                    } 
                } 
            }else{ 
                if(isset($cassandra['archive-enable'])){
                    return $cassandra['archive-enable'];
                }else{
                    return false;
                } 
            }
        }else{
            return false;
        }
    } 
 
    // blog page sidabar
    public function cassandra_sidebar_banner(){
        global $cassandra;  
        if(is_home() ){
            if(isset($cassandra['blog-sidebar'])){
                return $cassandra['blog-sidebar'];
            }else{
                return 'right';
            }   
        }elseif(is_search()){ 
            if(isset($cassandra['srch-sidebar'])){
                return $cassandra['srch-sidebar'];
            }else{
                return 'right';
            }  
        }elseif(is_single()){ 
            if(isset($cassandra['single-sidebar'])){
                return $cassandra['single-sidebar'];
            }else{
                return 'right';
            }  
        }elseif(is_archive()){ 
            if(isset($cassandra['archv-sidebar'])){
                return $cassandra['archv-sidebar'];
            }else{
                return 'right';
            }  
        }else{
            return 'right';
        }
    } 
 
    // blog page banner
    public function cassandra_enable_banner_url(){
        global $cassandra;  
        if(is_home() ){
            if((isset($cassandra['blog-banner']['url'])) && ($cassandra['blog-banner']['url']!='')){
                return $cassandra['blog-banner']['url'];
            }else{
                return get_template_directory_uri() . "/assets/images/bg2.jpg";
            }   
        }elseif(is_search()){ 
            if(isset($cassandra['srch-banner']['url'])){
                return $cassandra['srch-banner']['url'];
            }else{
                return get_template_directory_uri() . "/assets/images/bg2.jpg";
            }  
        }elseif(is_single()){ 
            if(isset($cassandra['single-banner']['url'])){
                return $cassandra['single-banner']['url'];
            }else{
                return get_template_directory_uri() . "/assets/images/bg2.jpg";
            }  
        }elseif(is_archive()){ 
            if ( class_exists('WooCommerce' ) ){
                if(is_shop() || is_product_category() || is_product_tag() ){ 
                    if(isset($cassandra['shop-banner']['url'])){
                        return $cassandra['shop-banner']['url'];
                    }else{
                        return get_template_directory_uri() . "/assets/images/bg2.jpg";
                    } 
                }else{
                    if(isset($cassandra['archv-banner']['url'])){
                        return $cassandra['archv-banner']['url'];
                    }else{
                        return get_template_directory_uri() . "/assets/images/bg2.jpg";
                    } 
                } 
            }else{ 
                if(isset($cassandra['archv-banner']['url'])){
                    return $cassandra['archv-banner']['url'];
                }else{
                    return get_template_directory_uri() . "/assets/images/bg2.jpg";
                } 
            }

        }else{
            return get_template_directory_uri() . "/assets/images/bg2.jpg";
        }
    }  

    // copyright text here.
    public function cassandra_copyright_text_here(){
        global $cassandra;  
        if(isset($cassandra['copyright-text'])){
            return $cassandra['copyright-text'];
        }else{
            return '<span>Cassandra</span> - Copyright 2017. Developed by <span><a href="#" target="_blank">digitalcenturysf</a></span>';
        }   
    }  

}
