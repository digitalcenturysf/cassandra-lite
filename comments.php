<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cassandra
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
	    <div class="site-section-area">
            <h2><span>Cassandra</span> 			
            <?php
				printf( // WPCS: XSS OK.
					esc_html( _nx( 'Comments ( 01 )', 'Comments ( %1$s )', get_comments_number(), 'comments title','cassandra-lite' ) ),
					number_format_i18n( get_comments_number() )
				);
			?></h2>
        </div>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?> 
			<div class="nav-links"> 
				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments','cassandra-lite' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments','cassandra-lite' ) ); ?></div>
			</div><!-- .nav-links --> 
		<?php endif; // Check for comment navigation. ?>
        <ul class="media-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ul',
					'callback' => 'cassandra_comments_list' 
				) );
			?>
        </ul>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?> 
			<div class="nav-links">
				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments','cassandra-lite' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments','cassandra-lite' ) ); ?></div>
			</div><!-- .nav-links --> 
		<?php
		endif; // Check for comment navigation.
	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.','cassandra-lite' ); ?></p>
	<?php
	endif; ?>
      <div class="blog_comment">
        <div class="product_comment spacer">
          <div class="container">
            <div class="row"> 
              <div class="comment_frm">
                <?php comment_form(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>

 