<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Cassandra
 */ 
get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main"> 
			<!-- contact_map_area start here -->
			<div class="blog_page_area">
			  <div class="container">
			    <div class="row"> 
			      <div class="blog_page">
			        <div class="newsBlg-area">
			          <div class="container">
			            <div class="row">
							<?php
							if ( have_posts() ) : 
								/* Start the Loop */
								while ( have_posts() ) : the_post();
									/*
									 * Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
									get_template_part( 'template-parts/content', get_post_format() ); 
								endwhile; 
							else :
								get_template_part( 'template-parts/content', 'none' );
							endif; ?> 
			            </div>
			          </div>
			        </div>
			        <div class="pagination_area">
			           <?php cassandra_lite_pagination(); ?> 
			        </div>
			      </div>  
			      <div class="side_bar_wrapper">
			        <div class="side_bar"> 
						<?php get_sidebar(); ?>
			        </div>
			      </div> 
			    </div>
			  </div>
			</div>
			<!-- blog page end here -->  
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer();
