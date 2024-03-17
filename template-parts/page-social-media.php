<?php

/**
 * Template Name: Social Media Page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty
 */
get_header();
if (have_rows("services_header_setting")) {
	while (have_rows("services_header_setting")) : the_row();
		$banner_img = get_sub_field("banner_image");
		$pagetitle = get_sub_field("title");
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
	      <div class="attorneys-heading profile-pg">
	          <h2><?php echo $pagetitle; ?></h2>
	          <p><?php echo get_the_title(); ?></p>
	      </div>
	    </div>
	  </div>
	</div>
</section>

<section class="profile-tabs-sec">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="profile-tabs-bg">
                <ul class="nav nav-tabs" role="tablist">
                <?php
                if (have_rows("social_media_feeds")) {
                  $i = 1;
                  while (have_rows("social_media_feeds")) : the_row();
                ?>
                <li class="nav-item">
                  <a class="nav-link <?php if($i == 1){ echo "active"; }?>" data-toggle="tab" href="#tabs-<?php echo $i; ?>" role="tab">
                    <span><?php echo get_sub_field("title"); ?></span>
                  </a>
                </li>
                <?php
                  $i++;
                  endwhile;
                }
                ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="tab-content">

              <?php
              if (have_rows("social_media_feeds")) {
                $i = 1;
                while (have_rows("social_media_feeds")) : the_row();
                ?>
                <div class="tab-pane <?php if($i == 1){ echo "active"; }?>" id="tabs-<?php echo $i; ?>" role="tabpanel">
	                <div class="twitter-tab">
                    <h4><?php echo get_sub_field("title"); ?></h4>
	                </div>
	                <?php echo do_shortcode( get_sub_field("shortcode") ); ?>
                </div>
                <?php
                $i++;
                endwhile;
              }
              ?>

              </div>
            </div>
          </div>
        </div>
        </div>
    </section>
<?php get_footer(); ?>