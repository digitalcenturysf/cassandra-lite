<?php


/**=====================================================================
 * Cassandra Pagination
 =====================================================================*/
 
if ( ! function_exists( 'cassandra_pagination' ) ){ 

	function cassandra_pagination() {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}
		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );
		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}
		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';
		// Set up paginated links.
		$links = paginate_links( array(
			'base'      => $pagenum_link,
			'format'    => $format,
			'total'     => $GLOBALS['wp_query']->max_num_pages,
			'current'   => $paged,
			'mid_size'  => 3,
    		'show_all'  => False,
			'add_args'  => array_map( 'urlencode', $query_args ),
			'prev_text' => '<i class="fa fa-angle-double-left" aria-hidden="true"></i>',
			'next_text' => '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
			'type'      => 'list',
		) );

		if ( $links ) :
		 printf(esc_html__('%s','cassandra-lite'),$links);
		endif;
	}
}

/**=====================================================================
 * Cassandra Comment List 
=====================================================================*/
 
function cassandra_comments_list($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
	  <div class="blog_author_area clearfix">
	    <figure><?php echo get_avatar( $comment, 170 ); ?>
	      <button><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?></button>
	    </figure>
	    <div class="author_details author_details2">
	      <h4><?php comment_author_link() ?><span><?php printf( __( '%1$s at %2$s','cassandra-lite' ), get_comment_date( '', $comment ),  get_comment_time() ); ?></span></h4>
			<?php if ($comment->comment_approved == '0') : ?>
				<p><em><?php esc_html_e('Your comment is awaiting moderation.','cassandra-lite'); ?></em></p>
			<?php endif; ?>
	      <?php comment_text(); ?>
	    </div>
	  </div>
<?php } 


/**=====================================================================
 * Comment box title change
=====================================================================*/
 
add_filter( 'comment_form_defaults', 'cassandra_comment_form_allowed_tags' );
function cassandra_comment_form_allowed_tags( $defaults ) {

	$defaults['title_reply'] = wp_kses( __('<span>Get In</span> Touch  with Us','cassandra-lite'  ), array('span'=> array('class' => array())) );
	$defaults['title_reply_before'] =  '<div class="site-section-area"><h2>';
	$defaults['title_reply_after'] =  '</h2></div>';
    $defaults['comment_notes_before'] =  esc_html__( '','cassandra-lite' );
    $defaults['comment_field'] = '';
	$defaults['label_submit'] =  esc_html__( 'Comment Now','cassandra-lite' );
	return $defaults;

}


/**=====================================================================
 * Comment form field order
=====================================================================*/
 
add_action( 'comment_form_after_fields', 'cassandra_add_textarea' );
add_action( 'comment_form_logged_in_after', 'cassandra_add_textarea' );

function cassandra_add_textarea()
{
    echo '<li class="msg"><textarea id="comment" name="comment" cols="45" rows="6" placeholder="Your Comment" maxlength="65525"  required="required"></textarea></li>';
}


/**=====================================================================
 * remove comment fields
=====================================================================*/
 
function cassandra_remove_comment_fields($fields) {
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

    unset($fields['url']);

    $fields['author'] = '<li><input id="author" placeholder="Full Name" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
    '" size="30"' . $aria_req . ' /></li>';
    $fields['email'] = '<li><input id="email" placeholder="Email Address" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '" size="30"' . $aria_req . ' /></li>';
    $fields['url'] = '<li><input id="url" placeholder="Website Url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
    '" size="30" /></li>';
    return $fields;
}
add_filter('comment_form_default_fields','cassandra_remove_comment_fields');


/**=====================================================================
 *  nav menus
=====================================================================*/
 // main menu
function media_main_menu(){
	wp_nav_menu( array(
		'theme_location'    => 'mainmenu',
		'depth'             => 3,
		'container'         => false,
		'menu_id'        	=> 'media_menu',
		'menu_class'        => 'nav navbar-nav',
		'walker'       		=> new Cassandra_lite_Walker(),
		'fallback_cb'       => 'media_default_menu'
	));
}
 
/**=====================================================================
 * fallback menu
=====================================================================*/
 
if(is_user_logged_in()):
	function media_default_menu() {
		?>
		<ul class="nav navbar-nav"> 
			<li>
		        <a href="<?php echo esc_url(admin_url('nav-menus.php')); ?>"><?php esc_html_e( 'Add Menu','cassandra-lite' ); ?></a> 
		    </li>                
		</ul>
		<?php
	}
endif;

 
/**=====================================================================
 * BreadCrumb
=====================================================================*/
function cassandra_breadcrumb(){
	global $post,$cassandra;
	if(isset($cassandra['blog-title2'])){
		$cassandra_blog_title=  $cassandra['blog-title2'];
	}else{
		$cassandra_blog_title=  esc_html__('Blog','cassandra-lite');
	}

	if(is_front_page() && is_home()){
		echo esc_html($cassandra_blog_title);

	}elseif(is_home() || is_page()){
		if(is_page()){
		    if(''!=get_post_meta($post->ID,'_cassandra_page_banner_ttl',true)){
		        $cassandra_ptitle = get_post_meta($post->ID,'_cassandra_page_banner_ttl',true);
			}else{
				$cassandra_ptitle =  get_the_title();
			}
		}else{
			$cassandra_ptitle =  $cassandra_blog_title;
		}
	  printf( esc_html__('%s','cassandra-lite'),$cassandra_ptitle);
	}elseif(is_single()){
		if(isset($cassandra['single-title2']) && (''!=$cassandra['single-title2'])){
			printf(  $cassandra['single-title2'] );
		}else{
			the_title();
		}
	}elseif(is_search()){
		if(isset($cassandra['srch-title2']) && (''!=$cassandra['srch-title2'])){
			printf( $cassandra['srch-title2'] );
		}else{
			printf( get_search_query()  );
		}
	}elseif(is_category() || is_tag()) {
		if(isset($cassandra['archv-title2']) && (''!=$cassandra['archv-title2'])){
			printf(esc_html__('%s','cassandra-lite'),$cassandra['archv-title2']);
		}else{
			single_cat_title("", true);
		}
	}elseif(is_archive()){ 
 		if ( class_exists('WooCommerce' ) ){
 			if(is_shop() || is_product_category() || is_product_tag() ){
	 			if(isset($cassandra['shop-title2']) && (''!=$cassandra['shop-title2'])){
					printf($cassandra['shop-title2']);
				}else{
	 				woocommerce_page_title();  
	 			} 
 			}else{ echo get_the_date('F Y'); } 
 		}else{ 
 			if(isset($cassandra['archv-title2']) && (''!=$cassandra['archv-title2'])){
				printf($cassandra['archv-title2']);
			}else{
 				echo get_the_date('F Y'); 
 			}
		}
	}elseif(is_404()){ esc_html_e('404 Error','cassandra-lite');}else{ the_title();}
}
/**=====================================================================
 * BreadCrumb sub (Top) Title 1
=====================================================================*/
function cassandra_breadcrumb_1(){
	global $post,$cassandra;
	if(isset($cassandra['blog-title'])){
		$cassandra_blog_title=  $cassandra['blog-title'];
	}else{
		$cassandra_blog_title=  esc_html__('New Collection','cassandra-lite');
	}

	if(is_front_page() && is_home()){
		echo esc_html($cassandra_blog_title);

	}elseif(is_home() || is_page()){
		if(is_page()){
		    if(''!=get_post_meta($post->ID,'_cassandra_page_banner_sbttl',true)){
		        $cassandra_ptitle = get_post_meta($post->ID,'_cassandra_page_banner_sbttl',true);
			}else{
				$cassandra_ptitle =  get_the_title();
			}
		}else{
			$cassandra_ptitle =  $cassandra_blog_title;
		}
	  printf( esc_html__('%s','cassandra-lite'),$cassandra_ptitle);
	}elseif(is_single()){
		if(isset($cassandra['single-title']) && (''!=$cassandra['single-title'])){
			printf(  $cassandra['single-title'] );
		}else{
			the_title();
		}
	}elseif(is_search()){
		if(isset($cassandra['srch-title']) && (''!=$cassandra['srch-title'])){
			printf( $cassandra['srch-title'] );
		}else{
			printf( get_search_query()  );
		}
	}elseif(is_category() || is_tag()) {
		if(isset($cassandra['archv-title']) && (''!=$cassandra['archv-title'])){
			printf(esc_html__('%s','cassandra-lite'),$cassandra['archv-title']);
		}else{
			single_cat_title("", true);
		}
	}elseif(is_archive()){
 		if ( class_exists('WooCommerce' ) ){
 			if(is_shop() || is_product_category() || is_product_tag() ){
	 			if(isset($cassandra['shop-title']) && (''!=$cassandra['shop-title'])){
					printf($cassandra['shop-title']);
				}else{
	 				woocommerce_page_title();  
	 			} 
 			}else{ echo get_the_date('F Y'); } 
 		}else{ 
 			if(isset($cassandra['archv-title']) && (''!=$cassandra['archv-title'])){
				printf($cassandra['archv-title']);
			}else{
 				echo get_the_date('F Y'); 
 			}
		}
	}elseif(is_404()){ esc_html_e('404 Error','cassandra-lite');}else{ the_title();}
}
  
// woocommerce min cart
function cassandra_woocommere_min_cart(){
	global $woocommerce;
?>
    <div class="cart-area"><a href="<?php if ( class_exists( 'WooCommerce' ) ) { echo wc_get_cart_url(); }else{ echo '#'; } ?>">
      <h3><span><?php if ( class_exists( 'WooCommerce' ) ) { echo $woocommerce->cart->cart_contents_count; }else{ echo '0'; } ?></span></h3>
      <div>
        <h4><?php esc_html_e('My Cart','cassandra-lite'); ?></h4>
        <h5><?php if ( class_exists( 'WooCommerce' ) ) { echo $woocommerce->cart->get_cart_total(); }else{ echo '0.00'; } ?></h5>
      </div>
      </a>
    </div>  
	<?php

}
 
// product item count with ajax
add_filter( 'woocommerce_add_to_cart_fragments', 'cassandra_woocommerce_header_add_to_cart_fragment' );
function cassandra_woocommerce_header_add_to_cart_fragment( $fragments ) {
		global $woocommerce;
	ob_start();
	?>
     <div class="cart-area"><a href="<?php if ( class_exists( 'WooCommerce' ) ) { echo wc_get_cart_url(); }else{ echo '#'; } ?>">
      <h3><span><?php if ( class_exists( 'WooCommerce' ) ) { echo $woocommerce->cart->cart_contents_count; }else{ echo '0'; } ?></span></h3>
      <div>
        <h4><?php esc_html_e('My Cart','cassandra-lite'); ?></h4>
        <h5><?php if ( class_exists( 'WooCommerce' ) ) { echo $woocommerce->cart->get_cart_total(); }else{ echo '0.00'; } ?></h5>
      </div>
      </a>
    </div>  
	
	<?php
	$fragments['div.cart-area'] = ob_get_clean();
	return $fragments;
}
// remove vc shortcode
function cassandra_short_text_remove_shortcode($start=0,$end=50,$dot=''){
	global $post;
	/* Get Post congtent */
	$content = $post->post_content;
	/* Remove visual composer shortcode like [vc_row] link that */
	$desc = strip_tags(do_shortcode($post->post_content));
	/* Remove empty spaces */
	$desc = trim(preg_replace('/\s+/',' ', $desc ));
	/* Get content with limit */
	$desc = mb_strimwidth($desc, $start, $end, '');
	$desc = substr($desc,0,strrpos($desc,' ')).$dot;
	echo $desc;
}

/**=====================================================================
 * Cassandra Slider Category Query
=====================================================================*/
 
function cassandra_slider_terms(){
	$trade_all_terms = array();
	$trade_term_name = array();
	$trade_term_slug = array();
	$trade_terms = get_terms( 'slider_cat' );
	if ( ! empty( $trade_terms ) && ! is_wp_error( $trade_terms ) ){
	    foreach ( $trade_terms as $trade_term ) {
	        $trade_term_name[] =  $trade_term->name;
	        $trade_term_slug[] =  $trade_term->slug;
	    }
	}
	$trade_all_terms =  array_combine($trade_term_slug,$trade_term_name);
	if(empty($trade_all_terms)){
		return $trade_all_terms = array( 'none' => 'None.');
	}else{
		return $trade_all_terms;
	}
}