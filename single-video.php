<?php
get_header();
if (have_rows("news_header", "option")) {
	while (have_rows("news_header", "option")) : the_row();
		$banner_img = get_sub_field("banner_image");
		$breadcrumb = get_sub_field("breadcrumb");
	endwhile;
}		
?>
<section class="attorneys-banner-bg">
	<div class="container-fluid">
	  <div class="row">
	    <div class="col-lg-6 col-md-6 col-sm-6 col-12 bg-attorney-img">
	      <img src="<?php echo $banner_img; ?>" alt="image" class="img-fluid">
	    </div>
	    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
	      <div class="attorneys-heading">
	          <h2>Videos</h2>
	          <ul>
	              <li><a href="javascript:void(0)"><?php echo $breadcrumb; ?></a></li>
	              <li class="breadcrumb-slash">/</li>
	              <li><a href="javascript:void(0)" class="active-tab">Videos</a></li>
	          </ul>
	      </div>
	    </div>
	  </div>
	</div>
</section>

<section class="book-section">
	<div class="container-fluid">
	    <div class="row">
	        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
	        	<h4>No Content</h4>
	        </div>
	    </div>
	</div>
</section>

<?php get_footer(); ?>