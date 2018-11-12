<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cassandra
 */
$cassandra_opt = new CassandraFrameworkOpt(); 
$cassandra_ftr_copy = $cassandra_opt->cassandra_copyright_text_here(); 
?> 
	</div><!-- #content -->
   
	<!-- footer area start here -->
	<div class="copyright_area">
	  <div class="">
	    <div>
	     <?php printf(esc_html__('%s','cassandra-lite'),$cassandra_ftr_copy); ?>
	    </div>
	  </div>
	</div>
</div><!-- #page --> 
<?php wp_footer(); ?>
</body>
</html>
