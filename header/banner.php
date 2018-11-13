<?php 
if(is_page()){
	$cassandra_lite_header_pg = get_post_meta(get_the_ID(),'_cassandra_lite_pg_bnr_style',true);
}else{ 
	global $cassandra; 
	$cassandra_lite_header_pg = $cassandra['bnrtrnsys'];
}
?>
<!-- header-top-inner area start here -->
<div class="header-top-inner <?php echo ($cassandra_lite_header_pg=='bnrtrns') ? 'bntrns' : ''; ?>">
  <div class="container">
    <div class="row">
      <h6><?php echo cassandra_lite_breadcrumb_1(); ?></h6>
      <h2><?php echo cassandra_lite_breadcrumb(); ?></h2>
    </div>
  </div>
</div>
<!-- header-top-inner area end here --> 
