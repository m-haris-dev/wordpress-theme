<?php

get_header();

$office_slug = get_queried_object()->slug;

$office_name = get_queried_object()->name;

$office_taxonomy = get_queried_object()->taxonomy;

$office_id = get_queried_object()->term_id;

if (have_rows("location_settings", 'term_' . $office_id)) {

  while (have_rows("location_settings", 'term_' . $office_id)) : the_row();

    $background_image = get_sub_field("background_image");

    $featured_attorney = get_sub_field("featured_attorney");

  endwhile;

}

?>

<section class="attorneys-banner-bg">

  <div class="container-fluid">

    <div class="row">

      <div class="col-lg-6 col-md-6 col-sm-6 col-12 bg-attorney-img">

        <img src="<?php echo $background_image; ?>" alt="image" class="img-fluid">

      </div>

      <div class="col-lg-6 col-md-6 col-sm-6 col-12">

        <div class="attorneys-heading">

            <h2>Office Locations</h2>

            <ul>

                <li><a href="javascript:void(0)">Who We Are</a></li>

                <li class="breadcrumb-slash">/</li>

                <li><a href="<?php echo get_home_url().'/'.$office_taxonomy; ?>">Office Locations</a></li>

                <li>/</li>

                <li><a href="javascript:void(0)" class="active-tab"><?php echo $office_name; ?></a></li>

            </ul>

        </div>

      </div>

    </div>

  </div>

</section>



<section class="profile-tabs-sec new-locations">

  <div class="row off-loc">

      <div class="col-lg-12 col-md-12 col-sm-12 col-12">

        <?php

        if(!empty($featured_attorney)){

        $titles = get_the_terms($featured_attorney->ID, 'title');

        $offices = get_the_terms($featured_attorney->ID, 'office');

        if (have_rows('business_card_details', $featured_attorney->ID)) {

          while (have_rows('business_card_details', $featured_attorney->ID)) : the_row();

          $card_email = get_sub_field("email");

          $card_phone = get_sub_field("phone_number");

          $card_fax = get_sub_field("fax_number");

          $card_address = get_sub_field("address");

          $card_notes = get_sub_field("notes");

          endwhile;

        }

        if ($offices && !is_wp_error($offices)) {

          $office_names = array();

          foreach ($offices as $office) {

              $office_names[] = $office->name;

          }  

        }

        ?>

          <div class="mg-dir-flex">

              <div class="mg-img">

                  <img src="<?php echo get_the_post_thumbnail_url($featured_attorney->ID)?>" alt="image" class="img-fluid">

              </div>

              <div class="mg-content">

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

                  <div class="location-content">

                      <ul>

                        <?php if(!empty($card_phone)){?><li><a href="tel:<?php echo $card_phone; ?>"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $card_phone; ?></a></li><?php } ?>

                        <?php if(!empty($card_email)){?><li><a href="mailto:<?php echo $card_email; ?>"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $card_email; ?></a></li><?php } ?>

                        <li><?php echo do_shortcode('[vcard name="'.$featured_attorney->post_title.'" company="Anderson Kill" job_title="'.implode(', ', $title_names).'" email="'.$card_email.'" business_no="'.$card_phone.'" business_fax="'.$card_fax.'" business_address="'.$card_address.'" notes="'.$card_notes.'"]'); ?></li>

                      </ul>

                  </div>

              </div>

          </div>

        <?php

        }

        ?>

      </div>

  </div>

  <div class="row attr-scr">

  <?php

$args = array(
  'post_type' => 'attorney',
  'posts_per_page' => -1,
  'meta_key' => 'attorney_last_word',
  'orderby' => 'meta_value',
  'order' => 'ASC',
  'tax_query' => array(
      array(
          'taxonomy' => 'office',
          'field'    => 'slug',
          'terms'    => $office_slug,
      ),
      array(
          'taxonomy' => 'title', // Custom taxonomy name
          'field'    => 'slug',
          'terms'    => array(
              'advisor',
              'in-memoriam',
              'law-clerk',
              'professional-staff',
              'retired',
          ),
          'operator' => 'NOT IN', // Exclude the specified terms
      ),
  ),
);



  $query = new WP_Query($args);

  $posts = get_posts($args);

  $count = count($posts);

  if ($query->have_posts()) {

      while ($query->have_posts()) {

      $query->the_post();

      $featured_image_url = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_stylesheet_directory_uri().'/assets/images/people-default.jpg';

      $titles = get_the_terms(get_the_ID(), 'title');

      $offices = get_the_terms(get_the_ID(), 'office');

    ?>

    <div class="col-lg-4 col-md-4 col-sm-4 col-12" onclick="location.href='<?php echo get_the_permalink(); ?>';">

      <div class="attorneys-card">

          <img src="<?php echo $featured_image_url; ?>" alt="image" class="img-fluid">

          <div class="card-content-flex">

            <div class="card-content-text">

              <h6><?php echo get_the_title().' '.get_field('title_suffix'); ?></h6>

              <p>

              <?php

              if ($titles && !is_wp_error($titles)) {

                  $title_names = array();

                  foreach ($titles as $title) {

                      $title_names[] = $title->name;

                  }

                  echo implode(', ', $title_names);

              }

              ?>

              ,

              <?php

              if ($offices && !is_wp_error($offices)) {

                  $office_names = array();

                  foreach ($offices as $office) {

                      $office_names[] = $office->name;

                  }

                  echo implode(', ', $office_names);

              }?>

              </p>

            </div>

            <div class="card-arrow">

              <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/blue-arrow.png" alt="image" class="img-fluid"></a>

            </div>

          </div>

      </div>

    </div>

    <?php

    }

    wp_reset_postdata();

  }

  ?>



  </div>

  <?php

  if($count >= 9){  
  ?>

  <div class="load-more-btn">

    <a href="javascript:void(0)" class="load-more"><span>Load More</span> <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.png" alt="image" class="img-fluid"></a>

  </div>

  <?php

  }

  ?>

</section>



<?php

get_footer();

?>

<script type="text/javascript">

  $(function () {

    $(".attr-scr .col-lg-4").slice(0, 9).show();

    $("body").on('click touchstart', '.load-more', function (e) {

      e.preventDefault();

      $(".attr-scr .col-lg-4:hidden").slice(0, 9).slideDown();

      if ($(".attr-scr .col-lg-4:hidden").length == 0) {

        $(".load-more").css('visibility', 'hidden');

      }

      // $('html,body').animate({

      //   scrollTop: $(this).offset().top

      // }, 1000);

    });

  });

</script>