<?php

/**
 * Template Name: Location Page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty
 */
?>

<?php
get_header();
if (have_rows("office_header_setting")) {
	while (have_rows("office_header_setting")) : the_row();
		$banner_img = get_sub_field("background_image");
		$breadcrumb = get_sub_field("breadcrumb_title");
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
<?php
$term_ids = get_field("select_office_location");
$taxonomy = "office";
if(!empty( $term_ids )){
?>
<section class="profile-tabs-sec locations-tabs">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="profile-tabs-bg">
            <ul class="nav nav-tabs" role="tablist">
            <?php
            $count = 1;
            foreach ($term_ids as $term_id) {
            $term = get_term($term_id, $taxonomy);
            ?>	
              <li class="nav-item">
                <a class="nav-link <?php if($count == 1){ echo "active"; } ?>" data-toggle="tab" href="#tabs-<?php echo $count; ?>" role="tab"><span><?php echo $term->name; ?></span></a>
              </li>
            <?php
            $count++;
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
          	$count = 1;
          	foreach ($term_ids as $term_id) {
            $term = get_term($term_id, $taxonomy);
            if (have_rows("location_settings", 'term_' . $term_id)) {
				while (have_rows("location_settings", 'term_' . $term_id)) : the_row();
					$address = get_sub_field("address");
					$contact_number = get_sub_field("contact_number");
					$email = get_sub_field("email");
					$image = get_sub_field("image");
					$google_map_iframe = get_sub_field("google_map_iframe");
					$featured_attorney = get_sub_field("featured_attorney");
				endwhile;
			} 
          	?>
        	<div class="tab-pane <?php if($count == 1){ echo "active"; } ?>" id="tabs-<?php echo $count; ?>" role="tabpanel">
              <div class="row location-flex">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                	<?php
                	if(!empty($image)){
                	?>
                    	<img src="<?php echo $image; ?>" alt="image" class="img-fluid">
                    <?php
                	}
                    ?>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="location-content">
                        <h4><?php echo $term->name; ?></h4>
                        <ul>
                        	<?php
                        	if(!empty($address)){
                        	?>
                        	<li><a href="javascript:void(0)"><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $address; ?></a></li>
                        	<?php
                        	}
                        	if(!empty($contact_number)){
                        	?>
                        	<li><a href="tel:<?php echo $contact_number; ?>"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $contact_number; ?></a></li>
                        	<?php
                        	}
                        	if(!empty($email)){
                        	?>
                        	<li><a href="mailto:<?php echo $email; ?>"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $email; ?></a></li>
                        	<?php
                        	}
                        	?>
                          
                        </ul>
                    </div>
                </div>
              </div>
              <div class="row map-loc">
                <div class="col-lg-7 col-md-7 col-sm-7 col-12">
                	<?php
                	if(!empty($featured_attorney)){
                	?>
                    <div class="mg-dir-flex">
                        <div class="mg-img">
                            <img src="<?php echo get_the_post_thumbnail_url($featured_attorney->ID)?>" alt="image" class="img-fluid">
                        </div>
                        <div class="mg-content">
                       	<?php
                       	$titles = get_the_terms($featured_attorney->ID, 'title');
                       	?>
                       	<div class="mg-divider">
                            <h6><?php echo $featured_attorney->post_title.' '.get_field('title_suffix', $featured_attorney->ID); ?></h6>
                            <span><?php if ($titles && !is_wp_error($titles)) {
							    $title_names = array();
							    foreach ($titles as $title) {
							        $title_names[] = $title->name;
							    }
							    echo implode(', ', $title_names);
							} ?></span>
                        </div>
                            <div class="lm-btn">
                              <a href="<?php echo get_home_url().'/'.$term->taxonomy.'/'.$term->slug; ?>" class="btn btn-primary"><span>VIEW ALL ATTORNEYS</span> <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/png-arrow.png" alt="image" class="img-fluid"></a>
                            </div>
                        </div>
                    </div>
                    <?php
                	}
                    ?>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-12">
                <?php
               	if(!empty($google_map_iframe)){
               	?>
               	<div class="google-map">
                    <iframe src="<?php echo $google_map_iframe; ?>" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
               	<?php
               	}
                ?>
                    
                </div>
              </div>
            </div>
            <?php
            $count++;
    		}
            ?>
          </div>
        </div>
      </div>
    </div>
</section>

<?php 
}
get_footer(); ?>