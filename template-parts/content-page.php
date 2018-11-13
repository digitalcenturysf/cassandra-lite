<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cassandra
 */
if(is_page()){ 
	if(get_post_meta(get_the_ID(),'_cassandra_lite_page_title',true) !=null){
		$cassandra_lite_pg_title = get_post_meta(get_the_ID(),'_cassandra_lite_page_title',true);
	}else{
		$cassandra_lite_pg_title = 'yes';
	}
} 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if($cassandra_lite_pg_title =='yes'): ?>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	<?php endif; ?>
	<div class="entry-content">
		<?php
			the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:','cassandra-lite' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s','cassandra-lite' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
