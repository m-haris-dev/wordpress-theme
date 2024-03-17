<?php

/**
 * Template Name: Service Page
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
<?php
if (have_rows("service_content")) {
    while (have_rows("service_content")) : the_row();
?>
<section class="what-we-do-services-sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="services-content">
                    <h2><?php echo get_sub_field("heading"); ?></h2>
                    <p><?php echo get_sub_field("content"); ?></p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="sc-imgs">
                <?php if(!empty( get_sub_field("image_one") )){ ?>
                    <img src="<?php echo get_sub_field("image_one"); ?>" alt="image" class="img-fluid">
                <?php } if(!empty( get_sub_field("image_two") )){ ?>
                    <img src="<?php echo get_sub_field("image_two"); ?>" alt="image" class="img-fluid">
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    endwhile;
}
if (have_rows("practice_area_tab")) {
    while (have_rows("practice_area_tab")) : the_row();
?>
<section class="practice-area-sec" id="practice-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="area-practice-heading">
                    <h2><?php echo get_sub_field("heading"); ?></h2>
                </div>
            </div>
        </div>
        <div class="row">

            <?php
            $practice_areas = get_sub_field('add_practice_areas');

            if ($practice_areas) {
                $total_practice_areas = count($practice_areas);
                $halfway = ceil($total_practice_areas / 2);
                $column1 = array_slice($practice_areas, 0, $halfway);
                $column2 = array_slice($practice_areas, $halfway);

                echo '<div class="col-lg-6 col-md-6 col-sm-6 col-12">';
                foreach ($column1 as $practice_area) {
                ?>
                <div class="drop-box">
                    <div class="dropbox-heading">
                      <h5><?php echo get_the_title($practice_area["add"]); ?></h5>
                    </div>
                    <?php
                    if(!empty($practice_area["is_child"])){                    
                    ?>
                    <div class='profile dropbox-arrow'>
                      <a href="javascript:void(0)"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </div>
                    <?php
                    if(!empty($practice_area["child_add"])){
                    ?>
                    <div class='profiledropdown'>
                      <ul>
                        <?php
                        $child_ids = $practice_area["child_add"];
                        $args = array(
                        'post_type'      => 'practice-area',
                        'post__in' => $child_ids,
                        'orderby'   => array(
                            'post__in' =>'ASC',)
                        );
                        $practicearea = new WP_Query($args);
                        if ($practicearea->have_posts()) {
                            while ($practicearea->have_posts()) {
                            $practicearea->the_post();
                            ?>
                            <li class='option'><a href="<?php echo get_permalink($practicearea->ID); ?>"><?php echo get_the_title($practicearea->ID); ?></a></li>
                            <?php
                            }
                            wp_reset_postdata(); 
                        }
                        ?>                        
                      </ul>
                    </div>
                    <?php
                    }

                    }
                    else{
                    ?>
                    <div class="dropbox-arrow">
                      <a href="<?php echo get_permalink($practice_area["add"]); ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.png" alt="image" class="img-fluid"></a>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <?php
                }
                echo '</div>';

                echo '<div class="col-lg-6 col-md-6 col-sm-6 col-12">';
                foreach ($column2 as $practice_area) {
                ?>
                <div class="drop-box">
                    <div class="dropbox-heading">
                      <h5><?php echo get_the_title($practice_area["add"]); ?></h5>
                    </div>
                    <?php
                    if(!empty($practice_area["is_child"])){                    
                    ?>
                    <div class='profile dropbox-arrow'>
                      <a href="javascript:void(0)"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </div>
                    <?php
                    if(!empty($practice_area["child_add"])){
                    ?>
                    <div class='profiledropdown'>
                      <ul>
                        <?php
                        $child_ids = $practice_area["child_add"];
                        $args = array(
                        'post_type'      => 'practice-area',
                        'post__in' => $child_ids,
                        'orderby'   => array(
                            'post__in' =>'ASC',)
                        );
                        $practicearea = new WP_Query($args);
                        if ($practicearea->have_posts()) {
                            while ($practicearea->have_posts()) {
                            $practicearea->the_post();
                            ?>
                            <li class='option'><a href="<?php echo get_permalink($practicearea->ID); ?>"><?php echo get_the_title($practicearea->ID); ?></a></li>
                            <?php
                            }
                            wp_reset_postdata();
                        }
                        ?>                        
                      </ul>
                    </div>
                    <?php
                    }

                    }
                    else{
                    ?>
                    <div class="dropbox-arrow">
                      <a href="<?php echo get_permalink($practice_area["add"]); ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.png" alt="image" class="img-fluid"></a>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <?php
                }
                echo '</div>';
            }
            ?>

        </div>
    </div>
</section>
<?php
    endwhile;
}
if (have_rows("industry_teams_section")) {
   while (have_rows("industry_teams_section")) : the_row();
   ?>
<section class="industry-team-sec" id="industry-group">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <img src="<?php echo get_sub_field("image"); ?>" alt="image" class="img-fluid">
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="industry-content">
          <h4><?php echo get_sub_field("heading"); ?></h4>
          <?php
            $industry_ids = get_sub_field("add_industry_team");
            $args = array(
            'post_type'      => 'industry-group',
            'post__in' => $industry_ids,
            'orderby'   => array(
                'post__in' =>'ASC',)
            );
            $industryteam = new WP_Query($args);
            if ($industryteam->have_posts()) {
                while ($industryteam->have_posts()) {
                $industryteam->the_post();
                ?>
                <div class="drop-box">
                    <div class="dropbox-heading">
                      <h5><?php echo get_the_title($industryteam->ID); ?></h5>
                    </div>
                    <div class="dropbox-arrow">
                      <a href="<?php echo get_permalink($industryteam->ID); ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.png" alt="image" class="img-fluid">
                      </a>
                    </div>
                </div>
                <?php
                }
                wp_reset_postdata();
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
   <?php 
   endwhile;     
}

if (have_rows("market_focused_section")) {
   while (have_rows("market_focused_section")) : the_row();
   ?>
<section class="industry-team-sec" id="market-focused">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="industry-content">
          <h4><?php echo get_sub_field("heading"); ?></h4>
          <?php
            $market_ids = get_sub_field("add_market_focused");
            $args = array(
            'post_type'      => 'market-focused',
            'post__in' => $market_ids,
            'orderby'   => array(
                'post__in' =>'ASC',)
            );
            $marketfocused = new WP_Query($args);
            if ($marketfocused->have_posts()) {
                while ($marketfocused->have_posts()) {
                $marketfocused->the_post();
                ?>
                <div class="drop-box">
                    <div class="dropbox-heading">
                      <h5><?php echo get_the_title($marketfocused->ID); ?></h5>
                    </div>
                    <div class="dropbox-arrow">
                      <a href="<?php echo get_permalink($marketfocused->ID); ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.png" alt="image" class="img-fluid">
                      </a>
                    </div>
                </div>
                <?php
                }
                wp_reset_postdata();
            }
          ?>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <img src="<?php echo get_sub_field("image"); ?>" alt="image" class="img-fluid">
      </div>
    </div>
  </div>
</section>
   <?php 
   endwhile;     
}

get_footer();
?>
<script type="text/javascript">
$(function() {
    var profiles = $('.profile');
    var profiledropdowns = $('.profiledropdown');
    
    profiles.on('click', function() {
        var profile = $(this);
        var profiledropdown = profile.next('.profiledropdown');
        
        if (profiledropdown.hasClass('fade')) {
            profiledropdown.removeClass('fade').addClass('fade_reverse');
        } else if (profiledropdown.hasClass('fade_reverse')) {
            profiledropdown.removeClass('fade_reverse').addClass('fade');
        } else {
            profiledropdown.addClass('fade');
        }
    });
}); 
</script>