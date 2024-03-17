<?php

get_header();

if (have_rows("newsletter_header", "option")) {

	while (have_rows("newsletter_header", "option")) : the_row();

		$banner_img = get_sub_field("banner_image");

		$breadcrumb = get_sub_field("breadcrumb");

        $pinned_post_id = get_sub_field("pinned_newsletter");

	endwhile;

}

$newsletter_cat = get_terms('newsletter_cat', array('hide_empty' => false));	

$search_query = isset($_GET['search']) ? sanitize_text_field($_GET['search']) : '';

$news_cat_get = isset($_GET['cat']) ? sanitize_text_field($_GET['cat']) : '';

global $post;

$post_slug = $post->post_name;	

?>

<section class="attorneys-banner-bg">

	<div class="container-fluid">

	  <div class="row">

	    <div class="col-lg-6 col-md-6 col-sm-6 col-12 bg-attorney-img">

	      <img src="<?php echo $banner_img; ?>" alt="image" class="img-fluid">

	    </div>

	    <div class="col-lg-6 col-md-6 col-sm-6 col-12">

	      <div class="attorneys-heading">

	          <h2>Newsletters</h2>

	          <ul>

	              <li><a href="javascript:void(0)"><?php echo $breadcrumb; ?></a></li>

	              <li class="breadcrumb-slash">/</li>

	              <li><a href="javascript:void(0)" class="active-tab">Newsletters</a></li>

	          </ul>

	      </div>

	    </div>

	  </div>

	</div>

</section>



<section class="forms-sec-bg news-search-forms">

    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                <div class="filter-forms">

                    <form>

                        <div class="search-form">

                            <div class="search-form-field">

                                <input name="search" type="text" class="form-control" placeholder="Search newsletters" value="<?php echo $search_query; ?>">

                                <div class="search-form-bar">

                                    <a href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i>

                                    </a>

                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary">Search</button>

                            <?php

                            if(!empty( $search_query ) || ( $news_cat_get ) ){

                            ?>

                            	<a class="btn btn-primary btn-reset" href="<?php echo get_site_url().'/newsletter/'; ?>">Reset</a>

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



<section class="profile-tabs-sec newsletter-pg-sec">

    <div class="container-fluid">

      <div class="row">

        <div class="col-lg-8 col-md-8 col-sm-8 col-12">

        <?php



        $args_pinned = array(

            'post_type' => 'newsletter',

            'post__in' => array($pinned_post_id),

        );

        $query_pinned = new WP_Query($args_pinned);

        

        if(empty( $news_cat_get )){



            if ($query_pinned->have_posts()){

                while ($query_pinned->have_posts()){

                    $query_pinned->the_post();

                    $news_cat = get_the_terms(get_the_ID(), 'newsletter_cat');

                ?>

                <div class="insured-boxes-flex" onclick="location.href='<?php echo get_the_permalink(); ?>';">

                        <div class="insured-pin-marker"><a href="javascript:void(0)"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/right-pin-marker.png" alt="image" class="img-fluid"></a></div>

                    <div class="insured-main-content">

                        <h6><?php echo get_the_title(); ?></h6>

                        <p>

                        <?php

                        if ($news_cat && !is_wp_error($news_cat)) {

                            $news_names = array();

                            foreach ($news_cat as $newscat) {

                                $news_names[] = $newscat->name;

                            }

                            echo implode(', ', $news_names);

                        }

                        ?>

                        </p>

                    </div>

                    <div class="brown-icon-img">

                      <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/blue-arrow.png" alt="image" class="img-fluid"></a>

                    </div>

                </div>

                <?php

                }

            }





	        $args = array(

			'post_type'      => 'newsletter',

			's' => $search_query,

			'posts_per_page' => -1,

            'post__not_in' => array($pinned_post_id),

			'orderby'   => array(

			    'date' =>'DESC',)

			);

        }

        else{



        $args = array(

		'post_type'      => 'newsletter',

		's' => $search_query,

		'tax_query' => array(

	        array(

	            'taxonomy' => 'newsletter_cat',

	            'field'    => 'slug',

	            'terms'    => $news_cat_get,

	        ),

        ),

		'posts_per_page' => -1,

		'orderby'   => array(

		    'date' =>'DESC',)

		);



    	}

		$newsletter = new WP_Query($args);

		if ($newsletter->have_posts()) {

			while ($newsletter->have_posts()) {

            $newsletter->the_post();

            $news_cat = get_the_terms(get_the_ID(), 'newsletter_cat');

	        ?>

            <div class="insured-boxes-flex" onclick="location.href='<?php echo get_the_permalink(); ?>';">

                <div class="insured-main-content">

                    <h6><?php echo get_the_title(); ?></h6>

                    <p>

                    <?php

                    if ($news_cat && !is_wp_error($news_cat)) {

					    $news_names = array();

					    foreach ($news_cat as $newscat) {

					        $news_names[] = $newscat->name;

					    }

					    echo implode(', ', $news_names);

					}

                    ?>

                    </p>

                </div>

                <div class="brown-icon-img">

                  <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/blue-arrow.png" alt="image" class="img-fluid"></a>

                </div>

            </div>

	        <?php

	        }

	        wp_reset_postdata();

		}

		else{

			echo '<p style="text-align: center; width: 100%;">No matches were found.</p>';

		}

        $news_posts = get_posts($args);
        $news_count = count($news_posts);
        if($news_count > 20){
        ?>
        <div class="loadmorebtnarea">
            <div class="load-more-btn">
                <a href="javascript:void(0)" class="load-more"><span>Load More</span> <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.png" alt="image" class="img-fluid"></a>
            </div>
        </div>
        <?php
        }

        ?>

        </div>

        

        <div class="col-lg-4 col-md-4 col-sm-4 col-12">

          <div class="right-side-col">

            <h5>Newsletters</h5>

            <ul>

            <?php

            foreach ($newsletter_cat as $data) {

            	if($data->slug == $news_cat_get){

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

    </div>

</section>

<?php get_footer(); ?>

<script type="text/javascript">

	// LOAD MORE SCRIPT BEGIN

        $(function () {

        $(".newsletter-pg-sec .insured-boxes-flex").slice(0, 20).show();

        $("body").on('click touchstart', '.load-more', function (e) {

          e.preventDefault();

          $(".newsletter-pg-sec .insured-boxes-flex:hidden").slice(0, 10).slideDown();

          if ($(".newsletter-pg-sec .insured-boxes-flex:hidden").length == 0) {

            $(".load-more").css('visibility', 'hidden');

          }

        //   $('html,body').animate({

        //     scrollTop: $(this).offset().top

        //   }, 1000);

        });

      });

    // LOAD MORE SCRIPT END

</script>