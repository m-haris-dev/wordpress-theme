<?php

get_header();

if (have_rows("newsletter_header", "option")) {

	while (have_rows("newsletter_header", "option")) : the_row();

		$banner_img = get_sub_field("banner_image");

		$breadcrumb = get_sub_field("breadcrumb");

	endwhile;

}

$newsletter_cat = get_terms('newsletter_cat', array('hide_empty' => false));

$news_cat = get_the_terms(get_the_ID(), 'newsletter_cat');			

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



<section class="profile-tabs-sec newsletter-pg-sec">

        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                    <div class="back-opt">

                        <a href="<?php echo get_site_url().'/newsletter/'; ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/left-back-arrow.jpg" alt="image" class="img-fluid">Back</a>

                    </div>



                  <?php

                    $custom_logo_id = get_theme_mod( 'custom_logo' );

                    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );

                    if(!empty($image[0])){

                    ?>

                      <img src="<?php echo $image[0]; ?>" alt="images" class="img-fluid only-pdf-show"/>

                    <?php

                    }

                  ?>  

                </div>

            </div>

          <div class="row">

            <div class="col-lg-8 col-md-8 col-sm-8 col-12">

                <div class="publication-sec-content">

                    <div class="publication-inner-text">

                      <h4 class="page-heading"><?php echo get_the_title(); ?></h4>

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

                        <ul>

                            <li><strong>Published On:</strong> <?php echo get_the_date(); ?></li>

                        </ul>

                        </div>

                        <div class="print-content-inner publication-butn">

                        <?php

                        if(!empty( get_field( "newsletter_pdf_link" ) )){

                        ?>

                            <a href="<?php echo get_field( "newsletter_pdf_link" ); ?>" target="_blank" class="rd-more-btn"><span>Download PDF</span> <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.png" class="ad-img"></a>

                        <?php

                    	}

                        ?>

                            <ul>

                                <li><a href="javascript:void(0)" onclick="window.print()"><i class="fa fa-print" aria-hidden="true"></i> Print</a></li>

                                <li><a href="<?php echo get_permalink(726); ?>"><i class="fa fa-envelope" aria-hidden="true"></i>Subscribe</a></li>

                            </ul>

                    </div>

                  </div>

                  <div class="key-points-text">

                  	<?php

                  	if(have_rows("newsletter_key_points")){

                  	?>

                  	<h4>Key Points:</h4>

                  	<ul class="key-point-list">

                  	<?php

                  	while(have_rows("newsletter_key_points")): the_row();

                  	?>

                  	<li class="pointer-text"><?php echo get_sub_field("list"); ?></li>

                  	<?php

                  	endwhile;	

                  	}

                  	?>

                  	</ul>

                    

                    <div class="newsletter-content">

                    	<?php echo wpautop( get_the_content() ); ?>

                    </div>



                  </div>

            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-12">

        <?php

        $attorny_ids = get_field("related_attorney");

        if(!empty( $attorny_ids )){

        ?>  

        <div class="right-side-col">

             <?php

          $args = array(
            'post_type'      => 'attorney',
            'post__in' => $attorny_ids,
            'posts_per_page' => -1,
            'orderby'   => 'post__in',
          );

          $attorney = new WP_Query($args);

          if ($attorney->have_posts()) {

          ?>

          <h5>Related People</h5>

          <?php

            while ($attorney->have_posts()) {

            $attorney->the_post();

            ?>

            <div class="pra-div-flex">

                          <div class="pra-div-img">

                            <?php if(!empty( get_the_post_thumbnail_url() )){ ?>

                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="image" class="img-fluid">

                              <?php } ?>

                          </div>

                          <div class="pra-div-content">

                              <h6><?php echo get_the_title().' '.get_field('title_suffix'); ?></h6>

                              <a href="<?php echo get_the_permalink(); ?>">View More<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.jpg" alt="image" class="img-fluid"></a>

                          </div>

                      </div>

            <?php

            }

          }

          wp_reset_postdata();

             ?>

        </div>

      <?php

      }

      ?>



    </div>

          </div>

        </div>

        </div>

    </section>



<?php get_footer(); ?>