<?php 
  $cassandra_bnrtrns_ttl = get_post_meta(get_the_ID(),'_cassandra_page_trans_ttl',true); 
  $cassandra_bnrtrns_sbttl = get_post_meta(get_the_ID(),'_cassandra_page_trans_sbttl',true); 
  $cassandra_bnrtrns_srttxt = get_post_meta(get_the_ID(),'_cassandra_page_trans_shorttxt',true); 
  $cassandra_bnrtrns_btn = get_post_meta(get_the_ID(),'_cassandra_page_trans_btn',true); 
  $cassandra_bnrtrns_btnlnk = get_post_meta(get_the_ID(),'_cassandra_page_trans_btnlnk',true); 
?>
<div class="header-top-inner2">
  <div class="container">
    <div class="row">
      <div class="home_banner_txt">
        <h1><?php printf(esc_html__('%s','cassandra-lite'),$cassandra_bnrtrns_ttl); ?></h1>
        <h2><?php printf(esc_html__('%s','cassandra-lite'),$cassandra_bnrtrns_sbttl); ?></h2>
        <p><?php printf(esc_html__('%s','cassandra-lite'),$cassandra_bnrtrns_srttxt); ?></p>
        <h5>
          <a href="<?php echo esc_url($cassandra_bnrtrns_btnlnk); ?>" class="cmn-btn2"><?php printf(esc_html__('%s','cassandra-lite'),$cassandra_bnrtrns_btn); ?></a>
        </h5>
      </div>
    </div>
  </div>
</div>