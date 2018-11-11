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
 * @package cassandra
 */
if(is_page()){
	$cassandra_pg_sidbr = get_post_meta(get_the_ID(),'_cassandra_post_sidebar',true);
}else{
	$cassandra_pg_sidbr = '';
}
$cassandra_opt = new CassandraFrameworkOpt();
$cassandra_demo = $cassandra_opt->cassandra_demo_setup();
get_header(); ?>
 
	<div id="primary" class="content-area">
		<main id="main" class="site-main"> 
			<div class="blog_details_area fwd <?php echo ($cassandra_demo==2) ? 'demo-2' : ''; ?>"> 
			<?php if($cassandra_pg_sidbr =='fulls'): ?>
	            <?php
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'page' );
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endwhile; // End of the loop.
				?>
			<?php else: ?> 
				<!-- contact_map_area start here -->
					<div class="blog_page_area page_area">
					  <div class="container">
					    <div class="row">
				      	<?php if($cassandra_pg_sidbr=='left'): ?> 
					      <div class="side_bar_wrapper flft">
					        <div class="side_bar"> 
								<?php get_sidebar(); ?>
					        </div>
					      </div>
				      	<?php endif; ?>
						<div class="blog_page <?php echo ($cassandra_pg_sidbr=='left') ? esc_attr('flrt') : ''; ?> <?php echo ($cassandra_pg_sidbr=='fullw') ? esc_attr('fwd') : ''; ?>">
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
				      	<?php if( ($cassandra_pg_sidbr!='left') && ($cassandra_pg_sidbr!='fullw')  && ($cassandra_pg_sidbr!='fulls') ): ?>
					      <div class="side_bar_wrapper">
					        <div class="side_bar"> 
								<?php get_sidebar(); ?>
					        </div>
					      </div>
				      	<?php endif; ?> 
				    </div>
				  </div>
				</div>
				<!-- blog page end here --> 

	        <?php endif; ?>
	        </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
 
