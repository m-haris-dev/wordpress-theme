<?php

/**
 * Template Name: Leadership Page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty
 */
get_header();
if (have_rows("leadership_header_setting")) {
	while (have_rows("leadership_header_setting")) : the_row();
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
	          <h2><?php echo get_the_title(); ?></h2>
	          <ul>
	              <li><a href="javascript:void(0)"><?php echo $breadcrumb; ?></a></li>
	              <li class="breadcrumb-slash">/</li>
	              <li><a href="javascript:void(0)" class="active-tab"><?php echo get_the_title(); ?></a></li>
	          </ul>
	      </div>
	    </div>
	  </div>
	</div>
</section>
<section class="attorneys-images-sec leadership-pg-sec">
    <div class="container-fluid">
	<?php
	if (have_rows('leaderships')) {
		while (have_rows('leaderships')) : the_row();
			if (get_row_layout() == 'add_leaderships') {
			?>
	        <div class="executive-members">
	        <?php if(!empty( get_sub_field("heading") )){ ?><h4><?php echo get_sub_field("heading"); ?></h4><?php } ?>
	        </div>
	        <div class="row">
	        <?php

			$get_attorney = get_sub_field('select_attorney');
			if( $get_attorney ){
				$count_people = count($get_attorney);
				foreach( $get_attorney as $attorney ){
				setup_postdata($get_attorney);
				?>
				<div class="col-lg-4 col-md-4 col-sm-4 col-12">
	                <div class="attorneys-card" onclick="location.href='<?php echo get_the_permalink($attorney->ID); ?>';">
	                    <img src="<?php echo get_the_post_thumbnail_url($attorney->ID); ?>" alt="image" class="img-fluid">
	                    <div class="card-content-flex">
	                        <div class="card-content-text">
	                            <h6><?php echo get_the_title($attorney->ID).' '.get_field('title_suffix', $attorney->ID);; ?></h6>
	                        </div>
	                        <div class="card-arrow">
	                            <a href="<?php echo get_the_permalink($attorney->ID); ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/blue-arrow.png" alt="image" class="img-fluid"></a>
	                        </div>
	                    </div>
	                </div>
	            </div>
				<?php
				wp_reset_postdata();
				}
			}

	        ?>	
	           
	        </div>
			<?php
			}
		endwhile;
	}
	?>	
    </div>
</section>
<?php
get_footer();
?>