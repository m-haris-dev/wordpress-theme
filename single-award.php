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

<section class="profile-tabs-sec event1-inner-pg">
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="back-opt">
                <a href="<?php echo get_site_url(); ?>/award/"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/left-back-arrow.jpg" alt="image" class="img-fluid">Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-12">
            <div class="publication-sec-content">
                <div class="publication-inner-text">
                  <h4 class="page-heading"><?php echo get_the_title(); ?></h4>
                  <p><?php echo get_field("news_sub_title"); ?></p>
                    <div class="flex-assign-para">
                        <ul>
                            <li><?php echo get_the_date(); ?></li>
                        </ul>
                    </div>
                  <div class="tech-content">
                    <?php echo wpautop( get_the_content() ); ?>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
        <?php
          $practice_ids = get_field("related_practice_areas");
            $args = array(
            'post_type'      => 'practice-area',
            'post__in' => $practice_ids,
            'orderby'   => array(
                'date' =>'DESC',)
            );
            $practices = new WP_Query($args);
            if (!empty( $practice_ids )) {
            ?>
            <div class="right-side-col">
              <h5>Related Practice Areas</h5>
              <ul>
              <?php
              while ($practices->have_posts()) {
                  $practices->the_post();
                  ?>
                  <a href="<?php echo get_the_permalink($practices->ID); ?>">
                    <li><?php echo get_the_title($practices->ID); ?></li>
                  </a>
                  <?php
              }
              wp_reset_postdata();
              ?>
              </ul>
            </div>
            <?php  
            }
        ?>
          
        </div>
      </div>
  </div>
  </div>
</section>
<?php 
get_footer(); 
?>