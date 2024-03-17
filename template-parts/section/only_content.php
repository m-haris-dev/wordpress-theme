<div class="row only-content ad-kl-content">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
    <?php
    if(!empty( get_sub_field("main_heading") )){
    ?>
        <h4><?php echo get_sub_field("main_heading"); ?></h4>
    <?php
	}
	if(!empty( get_sub_field("sub_heading") )){
	?>
		<h6><?php echo get_sub_field("sub_heading"); ?></h6>
	<?php
	}
	if(!empty( get_sub_field("content") )){
	?>
	<div><?php echo get_sub_field("content"); ?></div>
	<?php
	}
	$btn = get_sub_field("button");
	if($btn) {
	    $link_url = isset($btn['url']) && $btn['url'] ? $btn['url'] : '';
	    $link_title = isset($btn['title']) && $btn['title'] ? $btn['title'] : '';
	    $link_target = isset($btn['target']) && $btn['target'] ? $btn['target'] : '_self';
	  ?>
	  <div class="banner-rt-btn tier-div">
	    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><span><?php echo esc_html($link_title); ?></span> <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.png" class="ad-img"></a>
	  </div>
	  <?php
	}
    ?>
    </div>
</div>