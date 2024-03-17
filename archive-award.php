<?php
get_header();
if (have_rows("award_header", "option")) {
	while (have_rows("award_header", "option")) : the_row();
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
	          <h2>Honors And Awards</h2>
	          <ul>
	              <li><a href="javascript:void(0)"><?php echo $breadcrumb; ?></a></li>
	              <li class="breadcrumb-slash">/</li>
	              <li><a href="javascript:void(0)" class="active-tab">Honors And Awards</a></li>
	          </ul>
	      </div>
	    </div>
	  </div>
	</div>
</section>

<section class="honor-sec-bg">
    <div class="container-fluid">
        <div class="row">
    	<?php
    	$args = array(
			'post_type'      => 'award',
			'posts_per_page' => -1,
			'orderby'   => array(
			    'date' =>'DESC',)
			);
			$award = new WP_Query($args);
			$count = 1;
			if ($award->have_posts()) {
				while ($award->have_posts()) {
	            $award->the_post();
	            ?>
	            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
	              <div class="main-honor-box">
	                  <a href="<?php echo get_the_permalink(); ?>">
	                  	<h5><?php echo get_the_title(); ?></h5>
	                  </a>
	                  <?php
	                  if(!empty( get_the_post_thumbnail_url() )){
	                  echo '<div class="group-flex">';	
	                  }
	                  ?>
					<div class="content-award">
						<?php
						if(!empty(get_field("award_short_description", get_the_id() ))){
							echo get_field("award_short_description", get_the_id() );
						}else{ 
							echo "<p>". get_the_excerpt() ."</p>"; 
						}
						?>
					</div>
	                  <?php
	                  if(!empty( get_the_post_thumbnail_url() )){
	                  echo '<img src="'.get_the_post_thumbnail_url().'" alt="images" class="img-fluid">';
	                  echo '</div>';
	                  }
					  if(empty(get_field("award_ribbon_hide", get_the_id() ))){
	                  ?>
	                  <div class="badge-img">
	                      <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/honor-badge.jpg" alt="image" class="img-fluid">
	                  </div>
					  <?php } ?>
	              </div>
	          	</div>
	            <?php
	        	}
	        	wp_reset_postdata();
	        }

    	?>

    	</div>

    	<div class="load-more-btn">
	        <a href="javascript:void(0)" class="load-more"><span>Load More</span> <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.png" alt="image" class="img-fluid"></a>
	    </div>

    </div>
</section>

<?php echo get_footer(); ?>

<script type="text/javascript">
$(function () {
	$(".honor-sec-bg .col-lg-12").slice(0, 20).show();
	$("body").on('click touchstart', '.load-more', function (e) {
	  e.preventDefault();
	  $(".honor-sec-bg .col-lg-12:hidden").slice(0, 20).slideDown();
	  if ($(".honor-sec-bg .col-lg-12:hidden").length == 0) {
	    $(".load-more").css('visibility', 'hidden');
	  }
// 	  $('html,body').animate({
// 	    scrollTop: $(this).offset().top
// 	  }, 1000);
	});
});
</script>