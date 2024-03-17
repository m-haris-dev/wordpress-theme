<?php

get_header();

if (have_rows("book_header", "option")) {

  while (have_rows("book_header", "option")) : the_row();

    $banner_img = get_sub_field("banner_image");

    $breadcrumb = get_sub_field("breadcrumb");

    $pinned_post_id = get_sub_field("pinned_book");

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

            <h2>Books</h2>

            <ul>

                <li><a href="javascript:void(0)"><?php echo $breadcrumb; ?></a></li>

                <li class="breadcrumb-slash">/</li>

                <li><a href="javascript:void(0)" class="active-tab">Books</a></li>

            </ul>

        </div>

      </div>

    </div>

  </div>

</section>



<section class="profile-tabs-sec books-pg-sec">

    <div class="container-fluid">

      <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 col-12">

          <div class="row">

          	<?php

              $args_pinned = array(

                  'post_type' => 'book',

                  'post__in' => array($pinned_post_id),

              );

              $query_pinned = new WP_Query($args_pinned);



              if ($query_pinned->have_posts()){

                  while ($query_pinned->have_posts()){

                  $query_pinned->the_post();
                  $book_url = get_field("books_redirect_url");  
                  ?>

                  <div class="col-lg-12 col-md-12 col-sm-12 col-12" onclick="location.href='<?php if(!empty($book_url)){ echo $book_url; } else{ echo get_the_permalink(); } ?>';">

                    <div class="insured-boxes-flex">

                      <div class="insured-pin-marker"><a href="javascript:void(0)"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/right-pin-marker.png" alt="image" class="img-fluid"></a></div>

                      <div class="insured-main-content">

                          <h6><?php echo get_the_title(); ?></h6>

                          <ul>

                              <li>Andersonkill</li>

                              <li>/</li>

                              <li><?php echo get_the_date(); ?></li>

                          </ul>

                      </div>


                      <div class="brown-icon-img">

                          <a href="<?php if(!empty($book_url)){ echo $book_url; } else{ echo get_the_permalink(); } ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/blue-arrow.png" alt="image" class="img-fluid"></a>

                      </div>


                  </div>

                </div>

                  <?php

                  }

                  wp_reset_postdata();

              }



              $args = array(

                'post_type'      => 'book',

                'posts_per_page' => -1,

                'post__not_in' => array($pinned_post_id),

                'orderby'   => array(

                    'date' =>'DESC',),

              );



              $books = new WP_Query($args);

              if ($books->have_posts()) {

                while ($books->have_posts()) {

                $books->the_post();
                $book_url = get_field("books_redirect_url");

                ?>

                <div class="col-lg-12 col-md-12 col-sm-12 col-12" onclick="location.href='<?php if(!empty($book_url)){ echo $book_url; } else{ echo get_the_permalink(); } ?>';">

	              	<div class="insured-boxes-flex">

		                <div class="insured-main-content">

		                    <h6><?php echo get_the_title(); ?></h6>

		                    <ul>

		                        <li><?php echo get_field("books_title"); ?></li>

		                        <li>/</li>

		                        <li><?php echo get_the_date(); ?></li>

		                    </ul>

		                </div>

		                <div class="brown-icon-img">

		                    <a href="<?php if(!empty($book_url)){ echo $book_url; } else{ echo get_the_permalink(); } ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/blue-arrow.png" alt="image" class="img-fluid"></a>

		                </div>

		            </div>

	            </div>

                <?php

            	}

            }

            wp_reset_postdata();

        	?>	



        </div>



        <div class="load-more-btn">

            <a href="javascript:void(0)" class="load-more"><span>Load More</span> <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.png" alt="image" class="img-fluid"></a>

        </div>



        </div>



      </div>

    </div>

</section>



<?php

get_footer();

?>



<script type="text/javascript">

	// LOAD MORE SCRIPT BEGIN

        $(function () {

        $(".books-pg-sec .col-lg-12").slice(0, 10).show();

        $("body").on('click touchstart', '.load-more', function (e) {

          e.preventDefault();

          $(".books-pg-sec .col-lg-12:hidden").slice(0, 3).slideDown();

          if ($(".books-pg-sec .col-lg-12:hidden").length == 0) {

            $(".load-more").css('visibility', 'hidden');

          }

          // $('html,body').animate({

          //   scrollTop: $(this).offset().top

          // }, 1000);

        });

      });

    // LOAD MORE SCRIPT END

</script>