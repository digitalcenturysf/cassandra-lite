<?php

/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cassandra
 */
 
?>
 
<div id="post-<?php the_ID(); ?>" <?php post_class("news_cnt "); ?> > 
    <?php if(has_post_thumbnail()): ?>
      <div class="col-lg-6 col-sm-6 news_slider_img"> <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('', array('class'=>'')); ?></a> </div>
    <?php endif; ?>
    <div class="col-lg-<?php echo (has_post_thumbnail()) ? '6' : '12'; ?> col-sm-<?php echo (has_post_thumbnail()) ? '6' : '12'; ?> news_slider_txt">
      <figure><?php echo get_avatar( get_the_author_meta( 'ID' ), 60 ); ?> </figure>
      <h6><?php esc_html_e('Posted By','cassandra-lite'); ?> <?php the_author(); ?>    -    <?php cassandra_posted_on(); ?></h6>
      <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
      <p><?php cassandra_short_text_remove_shortcode(0,$end=230,'...'); ?></p>
      <div class="news_btn_area"> <a href="blog_details.html">
        <a href="<?php the_permalink(); ?>" class="cmn-btn2"><?php esc_html_e('Read More','cassandra-lite'); ?></a>
        </a> <a href="<?php the_permalink(); ?>"><span><i class="fa fa-mail-forward"></i></span></a> 
      </div>
    </div>
</div>
