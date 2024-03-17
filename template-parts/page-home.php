<?php

/**
 * Template Name: Home Page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty
 */
?>

<?php
get_header();
if (have_rows('home')) {
  while (have_rows('home')) : the_row();

    if (get_row_layout() == 'banner_section') {

      if (have_rows("banner")) {  
?>
      <div id="carouselExampleFade" class="carousel slide carousel-fade"  data-ride="carousel">
        <div class="carousel-inner">
        <?php
        $i = 1;
        while (have_rows("banner")) : the_row();
        ?>
        <div class="carousel-item pc-height <?php if($i == 1){ echo "active"; } ?>" data-interval="5000">
            <div class="overlay-main">
              <img src="<?php echo get_sub_field("image"); ?>" alt="image" class="img-fluid cg1-img">
              <div class="overlay-div"></div>
            </div>
            <div class="carousel-caption">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-6 col-md-0 col-sm-6 col-0">
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-6 col-12">
                    <div class="tier-div">
                      <h1 style="color:<?php echo get_sub_field('heading_color'); ?>"><?php echo get_sub_field("heading"); ?></h1>
                      <?php
                      $btn = get_sub_field("button");
                      if($btn) {
                        $link_url = isset($btn['url']) && $btn['url'] ? $btn['url'] : '';
                        $link_title = isset($btn['title']) && $btn['title'] ? $btn['title'] : '';
                        $link_target = isset($btn['target']) && $btn['target'] ? $btn['target'] : '_self';
                      ?>
                      <div class="banner-rt-btn">
                        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><span><?php echo esc_html($link_title); ?></span> <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.png" class="ad-img"></a>
                      </div>
                      <?php
                      }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php
        $i++;  
        endwhile;
        ?>  

        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleFade" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleFade" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
        </button>
      </div>
<?php
      }

    }
if (get_row_layout() == 'who_we_are_section') {    
?>
<section class="who-we-are-sec">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="content-flex">
          <div class="content-heading">
            <?php 
            if(!empty( get_sub_field("main_heading") )){ ?>
              <h2><?php echo get_sub_field("main_heading"); ?></h2>
            <?php 
            }
            if(!empty( get_sub_field("sub_heading") )){ ?>
              <h5><?php echo get_sub_field("sub_heading"); ?></h5>
            <?php 
            } 
            ?>
          </div>
          <div class="content-text">
            <?php echo get_sub_field("content");
            $btn = get_sub_field("button");
            if($btn) {
              $link_url = isset($btn['url']) && $btn['url'] ? $btn['url'] : '';
              $link_title = isset($btn['title']) && $btn['title'] ? $btn['title'] : '';
              $link_target = isset($btn['target']) && $btn['target'] ? $btn['target'] : '_self';
            ?>
            <div class="banner-rt-btn">
              <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><span><?php echo esc_html($link_title); ?></span> <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.png" class="ad-img"></a>
            </div>
            <?php
            }
            if(!empty(get_sub_field("image"))){
            ?>
            <style type="text/css">
              .who-we-are-sec:after{ background-image:url(<?php echo get_sub_field("image"); ?>); }
            </style>
            <?php
            } 
            ?>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-0 col-sm-0 col-12"></div>
    </div>
  </div>
</section>
<?php
}
if (get_row_layout() == 'what_we_do_section') { 
?>
<section class="what-we-do-sec">
  <div class="overlay-bg"></div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="what-we-do-heading">
          <?php 
            if(!empty( get_sub_field("main_heading") )){ ?>
              <h2><?php echo get_sub_field("main_heading"); ?></h2>
            <?php 
            }
            if(!empty( get_sub_field("sub_heading") )){ ?>
              <p><?php echo get_sub_field("sub_heading"); ?></p>
            <?php 
            } 
          ?>
        </div>
      </div>
    </div>
    <div class="row">
      <?php
      if(have_rows("image_box")){
        while (have_rows("image_box")) : the_row();
        ?>
        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
          <div class="what-we-do-box">
            <?php
            if(!empty(get_sub_field("image"))){
            ?>
            <span><img src="<?php echo get_sub_field("image"); ?>" alt="image" class="img-fluid"></span>
            <?php
            }

              if(!empty( get_sub_field("heading") )){ ?>
                <h4><?php echo get_sub_field("heading"); ?></h4>
              <?php 
              }
              if(!empty( get_sub_field("content") )){ ?>
                <p><?php echo get_sub_field("content"); ?></p>
              <?php 
              } 
              $btn = get_sub_field("button");
              if($btn) {
                $link_url = isset($btn['url']) && $btn['url'] ? $btn['url'] : '';
                $link_title = isset($btn['title']) && $btn['title'] ? $btn['title'] : '';
                $link_target = isset($btn['target']) && $btn['target'] ? $btn['target'] : '_self';
              ?>
                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?> <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.png" class="ad-img"></a>
              <?php
              }
            ?>
          </div>
        </div>
        <?php
        endwhile;
      }
      ?>
    </div>
  </div>
</section>
<?php
}
if (get_row_layout() == 'insights_section') { 
?>
<div class="paged">
  <div class="nesttabs">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-3 col-12">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <?php
          if(!empty( get_sub_field("main_heading") )){ ?>
            <h2 class="insights-heading"><?php echo get_sub_field("main_heading"); ?></h4>
          <?php 
          }
          ?>
          <a class="nav-link" id="v-pills-all-tab" data-toggle="pill" href="#v-pills-all" role="tab"
            aria-controls="v-pills-profile" aria-selected="false">
            <div class="descrip">
              <h5 class="mb-1">All</h5>
            </div>
          </a>
          <a class="nav-link" id="v-pills-publications-tab" data-toggle="pill" href="#v-pills-publications" role="tab"
            aria-controls="v-pills-profile" aria-selected="false">
            <div class="descrip">
              <h5 class="mb-1">Articles</h5>
            </div>
          </a>
          <a class="nav-link" id="v-pills-events-tab" data-toggle="pill" href="#v-pills-events" role="tab"
            aria-controls="v-pills-profile" aria-selected="false">
            <div class="descrip">
              <h5 class="mb-1">Events</h5>
            </div>
          </a>
          <a class="nav-link" id="v-pills-news-tab" data-toggle="pill" href="#v-pills-news" role="tab"
            aria-controls="v-pills-profile" aria-selected="false">
            <div class="descrip">
              <h5 class="mb-1">News</h5>
            </div>
          </a>
          <a class="nav-link" id="v-pills-video-tab" data-toggle="pill" href="#v-pills-video" role="tab"
            aria-controls="v-pills-profile" aria-selected="false">
            <div class="descrip">
              <h5 class="mb-1">Videos</h5>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-9 col-md-9 col-sm-9 col-12 nesttabscontent">
        <div class="tab-content" id="v-pills-tabContent">

          <div class="tab-pane fade active show" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
            <div class="tabs-inner-sldier">
              <div class="slider responsive">
              <?php
              $post_types = array('publication', 'event', 'post', 'video');
              $number_of_posts = 4;

              foreach ($post_types as $post_type) {
                  $args = array(
                      'post_type' => $post_type,
                      'posts_per_page' => $number_of_posts,
                      'orderby' => 'date',
                      'order' => 'DESC',
                  );

                  $latest_posts_query = new WP_Query($args);

                  if ($latest_posts_query->have_posts()) {
                      while ($latest_posts_query->have_posts()) {
                          $latest_posts_query->the_post();
                          $featured_image_url = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_stylesheet_directory_uri().'/assets/images/sli1.png';
                          $post_type = get_post_type( get_the_ID());
                          $video_url_get = get_field("video_post_type_url", get_the_ID() );
                          ?>
                          <div <?php if( $post_type == "video" ){?>onclick="window.open('<?php echo $video_url_get; ?>','mywindow');"<?php } else{?> onclick="location.href='<?php echo get_the_permalink(); ?>';" <?php }?> >
                            <div class="slider-box">
                              <img src="<?php echo $featured_image_url; ?>" alt="image" class="img-fluid">
                              <h6><?php echo get_the_title(); ?></h6>
                              <?php
                              if( $post_type == "video" ){
                              ?>
                              <a target="_blank" href="<?php echo get_field("video_post_type_url", get_the_ID() ); ?>">Video Play <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.jpg"
                                  class="img-fluid small-right-arrow"></a>
                              <?php
                              }
                              else{
                              ?>
                              <a href="<?php echo get_the_permalink(); ?>">Read more <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.jpg"
                                  class="img-fluid small-right-arrow"></a>
                              <?php
                              }
                              ?>
                            </div>
                          </div>
                          <?php
                      }
                      wp_reset_postdata();
                  } else {
                      // No posts found for this post type
                  }
              }
              ?>
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="v-pills-news" role="tabpanel" aria-labelledby="v-pills-news-tab">
            <div class="tabs-inner-sldier">
              <div class="slider responsive">
              <?php
              $args = array(
                'post_type'      => 'post',
                'posts_per_page' => 4,
                'orderby'   => array(
                    'date' =>'DESC',)
              );
              $posts = new WP_Query($args);
              if ($posts->have_posts()) {
                while ($posts->have_posts()) {
                $posts->the_post();
                $featured_image_url = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_stylesheet_directory_uri().'/assets/images/sli1.png';
                ?>  
                <div onclick="location.href='<?php echo get_the_permalink(); ?>';">
                  <div class="slider-box">
                    <img src="<?php echo $featured_image_url; ?>" alt="image" class="img-fluid">
                    <h6><?php echo get_the_title(); ?></h6>
                    <a href="<?php echo get_the_permalink(); ?>">Read more <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.jpg"
                        class="img-fluid small-right-arrow"></a>
                  </div>
                </div>

                <?php
                }
              }
              wp_reset_postdata();  
              ?>  
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="v-pills-publications" role="tabpanel" aria-labelledby="v-pills-publications-tab">
            <div class="tabs-inner-sldier">
              <div class="slider responsive">
              <?php
              $args = array(
                'post_type'      => 'publication',
                'posts_per_page' => 4,
                'orderby'   => array(
                    'date' =>'DESC',)
              );
              $publication = new WP_Query($args);
              if ($publication->have_posts()) {
                while ($publication->have_posts()) {
                $publication->the_post();
                $featured_image_url = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_stylesheet_directory_uri().'/assets/images/sli1.png';
                ?>  
                <div onclick="location.href='<?php echo get_the_permalink(); ?>';">
                  <div class="slider-box">
                    <img src="<?php echo $featured_image_url; ?>" alt="image" class="img-fluid">
                    <h6><?php echo get_the_title(); ?></h6>
                    <a href="<?php echo get_the_permalink(); ?>">Read more <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.jpg"
                        class="img-fluid small-right-arrow"></a>
                  </div>
                </div>

                <?php
                }
              }
              wp_reset_postdata();  
              ?>
                
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="v-pills-events" role="tabpanel" aria-labelledby="v-pills-events-tab">
            <div class="tabs-inner-sldier">
              <div class="slider responsive">
                <?php
                  $args = array(
                    'post_type'      => 'event',
                    'posts_per_page' => 4,
                    'orderby'   => array(
                        'date' =>'DESC',)
                  );
                  $event = new WP_Query($args);
                  if ($event->have_posts()) {
                    while ($event->have_posts()) {
                    $event->the_post();
                    $featured_image_url = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_stylesheet_directory_uri().'/assets/images/sli1.png';
                    ?>  
                    <div onclick="location.href='<?php echo get_the_permalink(); ?>';">
                      <div class="slider-box">
                        <img src="<?php echo $featured_image_url; ?>" alt="image" class="img-fluid">
                        <h6><?php echo get_the_title(); ?></h6>
                        <a href="<?php echo get_the_permalink(); ?>">Read more <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.jpg"
                            class="img-fluid small-right-arrow"></a>
                      </div>
                    </div>

                    <?php
                    }
                  }
                  wp_reset_postdata();  
                ?>
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="v-pills-video" role="tabpanel" aria-labelledby="v-pills-video-tab">
            <div class="tabs-inner-sldier">
              <div class="slider responsive">
                <?php
                  $args = array(
                    'post_type'      => 'video',
                    'posts_per_page' => 4,
                    'orderby'   => array(
                        'date' =>'DESC',)
                  );
                  $event = new WP_Query($args);
                  if ($event->have_posts()) {
                    while ($event->have_posts()) {
                    $event->the_post();
                    $featured_image_url = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_stylesheet_directory_uri().'/assets/images/sli1.png';
                    $video_url_get = get_field("video_post_type_url", get_the_ID() );
                    ?>  
                    <div onclick="window.open('<?php echo $video_url_get; ?>','mywindow');">
                      <div class="slider-box">
                        <img src="<?php echo $featured_image_url; ?>" alt="image" class="img-fluid">
                        <h6><?php echo get_the_title(); ?></h6>
                        <a href="<?php echo $video_url_get; ?>">Video Play <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.jpg"
                            class="img-fluid small-right-arrow"></a>
                      </div>
                    </div>

                    <?php
                    }
                  }
                  wp_reset_postdata();  
                ?>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
<?php
}
if (get_row_layout() == 'testimonial_section') { 
?>
<section class="testimonial-sec-bg">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="testimonials-heading">
          <?php
          if(!empty( get_sub_field("main_heading") )){ ?>
            <h2><?php echo get_sub_field("main_heading"); ?></h2>
          <?php
          }
          ?>
        </div>
        <div class="testimonials-slider">
          <div class="slider responsive-testimonials">
          <?php
          $args = array(
            'post_type'      => 'testimonial',
            'posts_per_page' => 3,
            'orderby'   => array(
                'date' =>'DESC',)
          );
          $testimonial = new WP_Query($args);
          if ($testimonial->have_posts()) {
            while ($testimonial->have_posts()) {
            $testimonial->the_post();
            ?>
            <div>
              <div class="testimonials-box">
                <p>"<?php echo get_the_content(); ?>"</p>
                <h6><?php echo get_the_title(); ?></h6>
              </div>
            </div>
            <?php
            }
          }
          wp_reset_postdata();
          ?>  
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
}
?>
<?php
endwhile;
}
get_footer();
?>
<script type="text/javascript">
  $('.responsive').slick({
    dots: false,
    arrows: true,
    autoplay: true,
    infinite: true,
    speed: 600,
    slidesToShow: 2,
    slidesToScroll: 1,
    nextArrow: '<div class="a-sl-right-arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div>', 
    prevArrow: '<div class="a-sl-left-arrow"><i class="fa fa-angle-left" aria-hidden="true"></i></di>',
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
  window.addEventListener('DOMContentLoaded', function () {
    var firstLink = document.querySelector('.nav-link');
    firstLink.classList.add('active');
  });
  $('.responsive-testimonials').slick({
    dots: true,
    arrows: false,
    // autoplay: true,
    infinite: true,
    speed: 300,
    slidesToShow: 2,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
</script>