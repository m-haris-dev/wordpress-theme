<?php
get_header();
if (have_rows("industry_group_header", "option")) {
  while (have_rows("industry_group_header", "option")) : the_row();
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
            <h2>Industry Groups</h2>
            <ul>
                <li><a href="javascript:void(0)"><?php echo $breadcrumb; ?></a></li>
                <li class="breadcrumb-slash">/</li>
                <li><a href="javascript:void(0)" class="active-tab">Industry Groups</a></li>
            </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="client-services-sec-bg">
  <div class="container-fluid">
    <div class="row generic-content">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
      <?php
      $args = array(
        'post_type'      => 'industry-group',
        'posts_per_page' => -1,
        'orderby'   => array(
            'date' =>'DESC',),
      );

      $groups = new WP_Query($args);
      $count = 0;
      if ($groups->have_posts()) {
        while ($groups->have_posts()) {
        $groups->the_post();
        $featured_image_url = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : '';
        $count++;
        $post_class = ($count % 2 == 0) ? 'aff-sec-row' : 'even-sec-row';
        if($post_class == "aff-sec-row"){
        ?>
        <div class="row <?php echo $post_class; ?>">
          <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <?php if(!empty( $featured_image_url )){ ?>
              <img src="<?php echo $featured_image_url; ?>" alt="image" class="img-fluid ">
            <?php } ?>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <h4><?php echo get_the_title(); ?></h4>
            <div><p><?php echo get_the_excerpt(); ?></p>
            </div>
            <div class="banner-rt-btn tier-div">
              <a href="<?php echo esc_url(get_the_permalink()); ?>"><span><?php echo esc_html("Read More"); ?></span> <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.png" class="ad-img"></a>
            </div>
          </div>
          
        </div>
        <?php
        }
        else{
        ?>
        <div class="row <?php echo $post_class; ?>">
          <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <h4><?php echo get_the_title(); ?></h4>
            <div><p><?php echo get_the_excerpt(); ?></p>
            </div>
            <div class="banner-rt-btn tier-div">
              <a href="<?php echo esc_url(get_the_permalink()); ?>"><span><?php echo esc_html("Read More"); ?></span> <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.png" class="ad-img"></a>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <?php if(!empty( $featured_image_url )){ ?>
              <img src="<?php echo $featured_image_url; ?>" alt="image" class="img-fluid ">
            <?php } ?>
          </div>
        </div>
        <?php
          }
        }
      }
      ?>
        
      </div>

    </div>
  </div>
</section>
<?php echo get_footer(); ?>