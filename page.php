<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Cassandra
 */ 
get_header(); ?>
 
	<div id="primary" class="content-area">
		<main id="main" class="site-main"> 
			<div class="blog_details_area fwd ">  
				<!-- contact_map_area start here -->
				<div class="blog_page_area page_area">
					<div class="container">
						<div class="row"> 
							<div class="blog_page">
				        		<div class="blog_details_area">  
									<?php
									if ( have_posts() ) : 
										/* Start the Loop */ 
										while ( have_posts() ) : the_post();
											get_template_part( 'template-parts/content', 'page' );
											// If comments are open or we have at least one comment, load up the comment template.
											if ( comments_open() || get_comments_number() ) :
												comments_template();
											endif; 
										endwhile; // End of the loop. 
									else :
										get_template_part( 'template-parts/content', 'none' );
									endif; ?>  
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
	        </div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer();
 
