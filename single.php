<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cassandra
 */

$cassandra_opt = new CassandraFrameworkOpt();
$cassandra_sidebar = $cassandra_opt->cassandra_sidebar_banner();
$cassandra_demo = $cassandra_opt->cassandra_demo_setup();
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
			if ( have_posts() ) : 
				/* Start the Loop */
			while ( have_posts() ) : the_post(); ?> 
			<!-- contact_map_area start here -->
			<div class="blog_page_area <?php echo ($cassandra_demo==2) ? 'demo-2' : ''; ?>">
			  <div class="container">
			    <div class="row"> 
				  <?php if($cassandra_demo !=2): ?> 
				      <?php if( $cassandra_sidebar =='left' ): ?>
					      <div class="side_bar_wrapper flft">
					        <div class="side_bar"> 
								<?php get_sidebar(); ?>
					        </div>
					      </div>
				      <?php endif; ?>
			      <?php endif; ?>
			      <div class="blog_page <?php echo ( $cassandra_sidebar =='left' ) ? esc_attr('flrt') : ''; ?>">
			        <div class="blog_details_area <?php echo (($cassandra_demo==2) && is_singular('post')) ? 'blg-2' : ''; ?>">
						<?php if($cassandra_demo != 2): ?>
				        	<?php if(has_post_thumbnail()): ?>
						        <figure><?php the_post_thumbnail('cassandra-blog-single'); ?></figure>
						    <?php endif; ?>
						<?php endif; ?>
			          <div class="blog_title clr">
			            <div class="blog_title_lft">
			              <p><img src="<?php echo get_template_directory_uri(); ?>/assets/images/cal-icon.png" alt="calender"></p>
			              <h3><?php echo get_the_date('d'); ?><span><?php echo get_the_date('F Y'); ?></span></h3>
			            </div>
			            <div class="blog_title_rht"> 
			              <h5><?php echo get_post_meta(get_the_ID(),'_cassandra_subtitle',true); ?></h5>
			              <h3><?php the_title(); ?></h3>
			              <h6 class="text-uppercase">
			              	<i class="fa fa-user-md"></i> <span><?php esc_html_e('By','cassandra-lite'); ?> <?php the_author(); ?></span> 
			              	<?php if(has_tag()) { ?>
			              		<i class="fa fa-tag "></i> <?php the_tags( '', ', ', '<br />' ); ?>
							<?php } ?>
			              </h6>
			            </div>
			          </div>
						<?php if($cassandra_demo==2): ?>
				        	<?php if(has_post_thumbnail()): ?>
						        <figure><?php the_post_thumbnail('cassandra-blog-single'); ?></figure>
						    <?php endif; ?>
						<?php endif; ?>
			          <div class="blog_para">
			            <?php the_content();
					        wp_link_pages( array(
					            'before' => '<div class="page-links">' . esc_html__( 'Pages:','cassandra-lite' ),
					            'after'  => '</div>',
					        ) ); 

					        global $numpages;
					        if ( is_singular() && $numpages > 1 ) {
					              if ( is_singular( 'attachment' ) ) {
					                // Parent post navigation.
					                the_post_navigation( array(
					                  'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link','cassandra-lite' ),
					                ) );
					              } elseif ( is_singular( 'post' ) ) {
					                // Previous/next post navigation.
					                the_post_navigation( array(
					                  'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next','cassandra-lite' ) . '</span> ' .
					                    '<span class="screen-reader-text">' . esc_html__( 'Next post:','cassandra-lite' ) . '</span> ' .
					                    '<span class="post-title">%title</span>',
					                  'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous','cassandra-lite' ) . '</span> ' .
					                    '<span class="screen-reader-text">' . esc_html__( 'Previous post:','cassandra-lite' ) . '</span> ' .
					                    '<span class="post-title">%title</span>',
					                ) );
					              }
					        } ?>
			          </div>
			          <div class="blog_social_area">
			            <div class="share_txt"><?php esc_html_e('Share This:','cassandra-lite'); ?></div>
			            <div class="social_icon"> 
			            	<a href="<?php echo esc_url('http://www.facebook.com/sharer.php?u='.get_the_permalink().'&amp;title='.get_the_title()); ?>"><i class="fa fa-facebook-f"></i></a> 
			            	<a href="<?php echo esc_url('http://twitter.com/home/?status='.get_the_title().' - '.get_the_permalink()); ?>"><i class="fa fa-twitter"></i></a> 
			            	<a href="<?php echo esc_url('https://plus.google.com/share?url='.get_the_permalink().'&amp;title='.get_the_title()); ?>"><i class="fa fa-google-plus"></i></a>
			            	<a href="<?php echo esc_url('http://pinterest.com/pin/create/button/?url='.get_the_permalink().'&amp;title='.get_the_title()); ?>"><i class="fa fa-pinterest-p"></i></a> 
			            	<a href="<?php echo esc_url('http://www.linkedin.com/shareArticle?mini=true&amp;title='.get_the_title().'&amp;url='.get_the_permalink()); ?>"><i class="fa fa-linkedin"></i></a>
			            </div>
			          </div>
			          	<?php 
						$exposed_author = get_the_author_meta('description');
						if($exposed_author!=''): ?>
						  <div class="blog_author_area clearfix">
						    <figure><?php echo get_avatar( get_the_author_meta( 'ID' ), 170 ); ?> </figure>
						    <div class="author_details">
						      <h4><?php the_author(); ?></h4>
						      <p><?php the_author_meta('description'); ?></p>
						    </div>
						  </div>
						<?php endif; ?>
						<?php  
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						?>  
			        </div>
			      </div>
					<?php if($cassandra_demo !=2): ?> 
				      <?php if( $cassandra_sidebar !='left' ): ?>
					      <div class="side_bar_wrapper">
					        <div class="side_bar"> 
								<?php get_sidebar(); ?>
					        </div>
					      </div>
				      <?php endif; ?>
			      	<?php endif; ?>
			    </div>
			  </div>
			</div>
			<!-- blog page end here -->  
		<?php endwhile; endif; ?> 
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
