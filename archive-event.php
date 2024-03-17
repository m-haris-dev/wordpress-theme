<?php

/**

 *

 *

 * @package WordPress

 * @subpackage Twenty_Twenty

 * @since Twenty Twenty

 */

get_header();

if (have_rows("event_header", "option")) {

	while (have_rows("event_header", "option")) : the_row();

		$banner_img = get_sub_field("banner_image");

		$breadcrumb = get_sub_field("breadcrumb");

    $pinned_event_id = get_sub_field("pinned_event");

	endwhile;

}

$event_topic = get_terms('event_topic', array('hide_empty' => false));  

$search_query = isset($_GET['search']) ? sanitize_text_field($_GET['search']) : '';

$event_topic_get = isset($_GET['cat']) ? sanitize_text_field($_GET['cat']) : '';

?>

<section class="attorneys-banner-bg">

	<div class="container-fluid">

	  <div class="row">

	    <div class="col-lg-6 col-md-6 col-sm-6 col-12 bg-attorney-img">

	      <img src="<?php echo $banner_img; ?>" alt="image" class="img-fluid">

	    </div>

	    <div class="col-lg-6 col-md-6 col-sm-6 col-12">

	      <div class="attorneys-heading">

	          <h2>Events</h2>

	          <ul>

	              <li><a href="javascript:void(0)"><?php echo $breadcrumb; ?></a></li>

	              <li class="breadcrumb-slash">/</li>

	              <li><a href="javascript:void(0)" class="active-tab">Events</a></li>

	          </ul>

	      </div>

	    </div>

	  </div>

	</div>

</section>

<?php

$today = date('Ymd');

$args_event_pinned = array(
  'post_type' => 'event',
  'post__in' => array($pinned_event_id),
);

if(empty( $event_topic_get )){

  $args_upcoming = array(

      'post_type'      => 'event',

      's' => $search_query,

      'meta_key'       => 'event_date',

      'meta_value'     => $today,

      'meta_compare'   => '>=',

      'orderby'        => 'meta_value',

      'order'          => 'ASC',

      'posts_per_page' => -1,

      'post__not_in' => array($pinned_event_id),

  );

  $args_past = array(

      'post_type'      => 'event',

      's' => $search_query,

      'meta_key'       => 'event_date',

      'meta_value'     => $today,

      'meta_compare'   => '<',

      'orderby'        => 'meta_value',

      'order'          => 'DESC',

      'posts_per_page' => -1,

  );

}else{

  $args_upcoming = array(

      'post_type'      => 'event',

      's' => $search_query,

      'meta_key'       => 'event_date',

      'meta_value'     => $today,

      'meta_compare'   => '>=',

      'orderby'        => 'meta_value',

      'order'          => 'ASC',

      'posts_per_page' => -1,

      'post__not_in' => array($pinned_event_id),

      'tax_query' => array(

          array(

              'taxonomy' => 'event_topic',

              'field'    => 'slug',

              'terms'    => $event_topic_get,

          ),

        ),

  );

  $args_past = array(

      'post_type'      => 'event',

      's' => $search_query,

      'meta_key'       => 'event_date',

      'meta_value'     => $today,

      'meta_compare'   => '<',

      'orderby'        => 'meta_value',

      'order'          => 'DESC',

      'posts_per_page' => -1,

      'tax_query' => array(

          array(

              'taxonomy' => 'event_topic',

              'field'    => 'slug',

              'terms'    => $event_topic_get,

          ),

        ),

  );

}


$up_pinned_event = new WP_Query($args_event_pinned);
$upcoming_event = new WP_Query($args_upcoming);
$past_event = new WP_Query($args_past);

?>

<section class="forms-sec-bg news-search-forms">

    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                <div class="filter-forms">

                    <form>

                        <div class="search-form">

                            <div class="search-form-field">

                                <input name="search" type="text" class="form-control" placeholder="Search event" value="<?php echo $search_query; ?>">

                                <div class="search-form-bar">

                                    <a href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i>

                                    </a>

                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary">Search</button>

                            <?php

                            if(!empty( $search_query ) || ( $event_topic_get ) ){

                            ?>

                              <a class="btn btn-primary btn-reset" href="<?php echo get_site_url().'/events/'; ?>">Reset</a>

                            <?php

                            }

                            ?>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="profile-tabs-sec events-tabs-sec">

    <div class="container-fluid">

    <?php

    if(!empty( $upcoming_event->have_posts() || $past_event->have_posts() )){

    ?>

      <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 col-12">

          <div class="profile-tabs-bg">

            <ul class="nav nav-tabs" role="tablist">

            <?php if ($upcoming_event->have_posts()) { ?>

              <li class="nav-item">

                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"><span>UPCOMING EVENTS</span></a>

              </li>

            <?php 

        	}

        	if ($past_event->have_posts()) { 

        	?>

              <li class="nav-item">

                <a class="nav-link <?php if (empty( $upcoming_event->have_posts() )) { echo "active"; } ?> " data-toggle="tab" href="#tabs-2" role="tab"><span>PAST EVENTS</span></a>

              </li>

            <?php

    		}

            ?>

            </ul>

          </div>

        </div>

      </div>

      <div class="row">

        <div class="col-lg-8 col-md-8 col-sm-8 col-12">

          <div class="tab-content">

            <?php if ($upcoming_event->have_posts()) { ?>

            <div class="tab-pane events-upcoming active" id="tabs-1" role="tabpanel">

              <div class="row">

              	<?php

          while ($up_pinned_event->have_posts()) {
					$up_pinned_event->the_post();
					$featured_image_url = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_stylesheet_directory_uri().'/assets/images/events2.png';
					?>
					<div class="col-lg-12 col-md-12 col-sm-12 col-12" onclick="location.href='<?php echo get_the_permalink(); ?>';">
	                    <div class="events-schedule">
	                        <div class="event-schedule-img">
                              <div class="pin-mark"><a href="javascript:void(0)">
                                  <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/marker--icon.png" alt="image" class="img-fluid"></a>
                              </div>
	                            <img src="<?php echo $featured_image_url; ?>" alt="image" class="img-fluid">
	                        </div>
	                        <div class="event-schedule-content">
	                            <h5><?php echo get_the_title(); ?></h5>
	                            <ul>
                              <?php if(!empty(get_field("event_organizer"))){?><li><?php echo get_field("event_organizer"); ?></li> <li>/</li><?php } ?>
                              <li><?php echo get_field("event_date"); ?></li>
	                            </ul>
	                            <a href="<?php echo get_the_permalink(); ?>">LEARN MORE <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/png-arrow.png" alt="image" class="img-fluid png-arrow-icon"></a>
	                        </div>
	                    </div>
	                </div>
					<?php
					}

					wp_reset_postdata();

					while ($upcoming_event->have_posts()) {
					$upcoming_event->the_post();
					$featured_image_url = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_stylesheet_directory_uri().'/assets/images/events2.png';
					?>
					<div class="col-lg-12 col-md-12 col-sm-12 col-12" onclick="location.href='<?php echo get_the_permalink(); ?>';">
	                    <div class="events-schedule">
	                        <div class="event-schedule-img">
	                            <img src="<?php echo $featured_image_url; ?>" alt="image" class="img-fluid">
	                        </div>
	                        <div class="event-schedule-content">
	                            <h5><?php echo get_the_title(); ?></h5>
	                            <ul>
                              <?php if(!empty(get_field("event_organizer"))){?><li><?php echo get_field("event_organizer"); ?></li> <li>/</li><?php } ?>
                              <li><?php echo get_field("event_date"); ?></li>
	                            </ul>
	                            <a href="<?php echo get_the_permalink(); ?>">LEARN MORE <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/png-arrow.png" alt="image" class="img-fluid png-arrow-icon"></a>
	                        </div>
	                    </div>
	                </div>
					<?php
					}

					wp_reset_postdata();

              	?>

              </div>

              <div class="load-more-btn">

              	<span id="events-upcoming-loadmore"></span>

              </div>



              <!-- <div class="load-more-btn">

                <a href="javascript:void(0)" class="load-more"><span>Load MORE</span> <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.png" alt="image" class="img-fluid"></a>

            </div> -->

            </div>

        	<?php }

        	if ($past_event->have_posts()) {

        	?>

            <div class="tab-pane events-past <?php if (empty( $upcoming_event->have_posts() )) { echo "active"; } ?>" id="tabs-2" role="tabpanel">

                <div class="row">



                    <?php

					while ($past_event->have_posts()) {

					$past_event->the_post();

					$featured_image_url = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_stylesheet_directory_uri().'/assets/images/events2.png';

					?>

					<div class="col-lg-12 col-md-12 col-sm-12 col-12" onclick="location.href='<?php echo get_the_permalink(); ?>';">

	                    <div class="events-schedule">

	                        <div class="event-schedule-img">

	                            <img src="<?php echo $featured_image_url; ?>" alt="image" class="img-fluid">

	                        </div>

	                        <div class="event-schedule-content">

	                            <h5><?php echo get_the_title(); ?></h5>

	                            <ul>

                                <?php if(!empty(get_field("event_organizer"))){?><li><?php echo get_field("event_organizer"); ?></li> <li>/</li><?php } ?>

                                <li><?php echo get_field("event_date"); ?></li>

	                            </ul>

	                            <a href="<?php echo get_the_permalink(); ?>">details <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/png-arrow.png" alt="image" class="img-fluid png-arrow-icon"></a>

	                        </div>

	                    </div>

	                </div>

					<?php

					}

					wp_reset_postdata();

              		?>

                    

                  </div>

                <div class="load-more-btn">

              		<span id="events-past-loadmore"></span>

              	</div>  

            </div>

            <?php

    		}

            ?>

          </div>

        </div>

        

        <div class="col-lg-4 col-md-4 col-sm-4 col-12">

          <div class="right-side-col">

            <h5>Event Topic</h5>

            <ul>

            <?php

            foreach ($event_topic as $data) {

              if($data->slug == $event_topic_get){

              $class = "active";

              }

              else{

                $class = "";

              }

            echo '<a href="?cat=' . $data->slug . '"><li><small class="'.$class.'"></small>' . $data->name . '</li></a>';

        }

            ?>  

            </ul>

          </div>

        </div>



      </div>



      <?php



    }

    else{

      ?>

      <div class="row">

        <div class="col-lg-8 col-md-8 col-sm-8 col-12">

          <p style="text-align: center; width: 100%;">No matches were found.</p>

        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-12">

          <div class="right-side-col">

            <h5>Event Topic</h5>

            <ul>

            <?php

            foreach ($event_topic as $data) {

              echo '<a href="?cat=' . $data->slug . '"><li><small></small>' . $data->name . '</li></a>';

            }

            ?>  

            </ul>

          </div>

        </div>



      </div>

      <?php

    }

      ?>



    </div>

</section>

<?php

get_footer();

?>

<!-- <script type="text/javascript">

	$(function () {

        $(".upcoming-events .col-lg-12").slice(0, 4).show();

        $("body").on('click touchstart', '.load-more', function (e) {

          e.preventDefault();

          $(".upcoming-events .col-lg-12:hidden").slice(0, 1).slideDown();

          if ($(".upcoming-events .col-lg-12:hidden").length == 0) {

            $(".load-more").css('visibility', 'hidden');

          }

          $('html,body').animate({

            scrollTop: $(this).offset().top

          }, 1000);

        });

      });

</script> -->