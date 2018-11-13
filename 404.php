<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Cassandra
 */
get_header(); ?>	
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="main-content fr0">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="error-content text-center">
								<h1><?php esc_html_e('404','cassandra-lite'); ?></h1>
								<p><?php  
								 esc_html_e("Unfortunately the page you were looking for could not be found.","cassandra-lite"); 
								?></p>
								<a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary"><?php esc_html_e("Back To Home","cassandra-lite"); ?></a>
							</div>
						</div>
					</div>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
