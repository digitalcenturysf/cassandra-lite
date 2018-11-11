<?php

/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cassandra
 */
 
?>

<div id="post-<?php the_ID(); ?>" <?php post_class("blog-section1 blog-section2 "); ?> >
	<?php 
	$cassandra_img_chk = 'noimgm0';
	if(has_post_thumbnail()): ?> 
		<figure><?php the_post_thumbnail('', array('class'=>'')); ?>
		  <div class="blg-fig-bx"> 
			<?php  
			$cassandra_terms = get_terms( 'category' , array( 'hide_empty' => 1 ) );
			if ( ! empty( $cassandra_terms ) && ! is_wp_error( $cassandra_terms ) ){ 
				$i=1;
				foreach ( $cassandra_terms as $cassandra_term ) {
					if($i>2) break;
					echo '<span><a href="' . get_term_link( $cassandra_term ) . '">' . $cassandra_term->name . '</a></span> '; 
					$i++;
				} 
			} 
			?>
		  </div>
		</figure>
    <?php 
    $cassandra_img_chk = '';
    endif; ?>  
	<h3 class="<?php echo esc_attr($cassandra_img_chk); ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<h5><?php cassandra_short_text_remove_shortcode(); ?></h5>
	<h6><?php esc_html_e('by','cassandra-lite'); ?> <span><a href="#"><?php the_author(); ?></a></span>&nbsp; &nbsp;    /&nbsp; &nbsp;    <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . esc_html__(' ago','cassandra-lite'); ?></h6>
</div> 

