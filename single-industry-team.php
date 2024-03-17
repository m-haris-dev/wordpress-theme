<?php

get_header();

?>

<section class="attorneys-banner-bg">

  <div class="container-fluid">

    <div class="row">

      <div class="col-lg-6 col-md-6 col-sm-6 col-12 bg-attorney-img">

        <img src="<?php if(!empty( get_field("banner_image") )){ echo get_field("banner_image"); } else { echo get_stylesheet_directory_uri() ?>/assets/images/insurance-banner.jpg <?php } ?>" alt="image" class="img-fluid">

      </div>

      <div class="col-lg-6 col-md-6 col-sm-6 col-12">

        <div class="attorneys-heading">

            <h2><?php echo get_the_title(); ?></h2>

            <ul>

                <li><a href="javascript:void(0)">What We Do</a></li>

                <li class="breadcrumb-slash">/</li>

                <li><a href="javascript:void(0)" class="active-tab"><?php echo get_the_title(); ?></a></li>

            </ul>

        </div>

      </div>

    </div>

  </div>

</section>

<section class="profile-tabs-sec">

	<div class="container-fluid">

		<div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-12">

              <div class="profile-tabs-bg">

                <ul class="nav nav-tabs" role="tablist">

           

                <?php

              	if (have_rows('tabs')) {

					while (have_rows('tabs')) : the_row();

						if (get_row_layout() == 'overview') {

						?>

						<li class="nav-item">

		                    <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"><span>Overview</span></a>

		                </li>

						<?php

						}

			    		if (get_row_layout() == 'experience') {

			    		?>

			    		<li class="nav-item">

		                    <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"><span>EXPERIENCE</span></a>

		                </li>

			    		<?php

			    		}

			    		if (get_row_layout() == 'attorney') {

			    		?>

			    		<li class="nav-item">

		                    <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"><span>PEOPLE</span></a>

		                </li>

			    		<?php	

			    		}

			    		if (get_row_layout() == 'news') {

			    		?>

			    		<li class="nav-item">

		                    <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab"><span>NEWS</span></a>

	                  	</li>

			    		<?php

			    		}

			    		if (get_row_layout() == 'events') {

			    		?>

			    		<li class="nav-item">

		                    <a class="nav-link" data-toggle="tab" href="#tabs-5" role="tab"><span>EVENTS</span></a>

	                  	</li>

			    		<?php	

			    		}

			    		if (get_row_layout() == 'publications') {

			    		?>

			    		<li class="nav-item">

		                    <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab"><span>PUBLICATIONS</span></a>

		                </li>

			    		<?php	

			    		}

			    	endwhile;

		    	}

	            ?>

          

                </ul>

              </div>

            </div>

        </div>

        <div class="row">

            <div class="col-lg-8 col-md-8 col-sm-8 col-12">

            

	            <div class="tab-content">

	                <?php

	                if (have_rows('tabs')) {

						while (have_rows('tabs')) : the_row();

							if (get_row_layout() == 'overview') {

							?>

							<div class="tab-pane active" id="tabs-1" role="tabpanel">

			                  <div class="pf-cls insurance-pg">

			                    <h4>Overview</h4>

			                    <?php

			                    if (have_rows('overview_sections')) {

									while (have_rows('overview_sections')) : the_row();

									if (get_row_layout() == 'heading_section') {

										echo '<h4>'.get_sub_field("heading").'</h4>';

									}

									if (get_row_layout() == 'content_section') {

										echo '<div class="overview-content-area">'.get_sub_field("content").'</div>';

									}

									if (get_row_layout() == 'video_popup') {

									?>

									<div class="link-play-flex">

				                        <a href="javascript:void(0)" class="circle-link"><?php echo get_sub_field("title"); ?></a>

				                        <a href="<?php echo get_sub_field("video_link"); ?>" data-fancybox="gallery" class="circle-btn"><i class="fa fa-play" aria-hidden="true"></i></a>

				                    </div>

									<?php	

									}

									?>

									<?php

									endwhile;

								}

			                    ?>

			                  </div>

			                  

			                </div>

							<?php

							}

							if (get_row_layout() == 'experience') {

							?>

							<div class="tab-pane" id="tabs-2" role="tabpanel">

			                  	<div class="pf-cls accordian-pf-cls">

				                  <h4>Experience</h4>

				                  <?php 

				                  	echo get_sub_field("add_experience");

				                  	$scroll_enable = get_sub_field("scrollbar");

				                  	if (have_rows('accordian')) {

				                  ?>

					                <div class="experience-accordian <?php if(!empty($scroll_enable)){ echo "scrollbar"; } ?>" id="style-3">

					                  <div class="wrapper center-block">

					                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

					                    <?php

					                    $i = 0;

					                    while (have_rows('accordian')) : the_row();

					                    ?>

					                    <div class="panel panel-default">

					                      <div class="panel-heading" role="tab" id="heading<?php echo $i; ?>">

					                        <h4 class="panel-title">

					                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" aria-expanded="false" aria-controls="collapse<?php echo $i; ?>">

					                            <?php echo get_sub_field("title"); ?>

					                          </a>

					                        </h4>

					                      </div>

					                      <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $i; ?>">

					                        <div class="panel-body">

					                          <?php echo get_sub_field("content"); ?>

					                        </div>

					                      </div>

					                    </div>

					                    <?php

					                    $i++;

					                	endwhile;

					                    ?>

					                  </div>

					                 </div>

					                </div>

					                <?php

					            	}

					                ?>

					            </div>

				          	</div>

							<?php

							}



							if (get_row_layout() == 'attorney') {

							?>

							<div class="tab-pane people-tab-pane" id="tabs-3" role="tabpanel">
			                  	<div class="pf-cls publication-tab">
			                    <h4>People</h4>
			                      <div class="at-tab">
			                        <div class="row">
			                        <?php
				                    $get_attorney = get_sub_field('select_attorney');
							        if( $get_attorney ){
										$count_people = count($get_attorney);
							            foreach( $get_attorney as $attorney ){
							            setup_postdata($get_attorney);
							            $featured_image_url = (has_post_thumbnail($attorney->ID)) ? get_the_post_thumbnail_url($attorney->ID) : get_stylesheet_directory_uri().'/assets/images/att1.jpg';
						                $titles = get_the_terms($attorney->ID, 'title');
						                $offices = get_the_terms($attorney->ID, 'office');
			                        ?>	
			                          <div class="col-lg-6 col-md-6 col-sm-6 col-12">
			                              <div class="attorneys-card">
			                                  <img src="<?php echo $featured_image_url; ?>" alt="image" class="img-fluid">
			                                  <div class="card-content-flex">
			                                      <div class="card-content-text">
			                                          <h6><?php echo get_the_title($attorney->ID).' '.get_field('title_suffix', $attorney->ID); ?></h6>
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
			                                          <a href="<?php echo get_the_permalink($attorney->ID); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blue-arrow.png" alt="image" class="img-fluid"></a>
			                                      </div>
			                                  </div>
			                              </div>
			                          </div>
			                        <?php
			                        	}
			                    	}
									if($count_people >= 8){
			                        ?>
									<div class="load-more-btn">
										<a href="javascript:void(0)" class="load-more load-more-people"><span>Load More</span> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ad-right-angle.png" alt="image" class="img-fluid"></a>
									</div>
									<?php } ?>  
			                      </div>
			                      </div>
			                    </div>
			                </div>

							<?php

							}



							if (get_row_layout() == 'news') {

							?>

							<div class="tab-pane news-tab-pane" id="tabs-4" role="tabpanel">

			                  <div class="pf-cls publication-tab">

			                    <h4>News</h4>

			                    <div class="row">

			                    <?php

			                    $get_news = get_sub_field('select_news');
							        if( $get_news ){
									$count_news = count($get_news);
							            foreach( $get_news as $news ){

							            setup_postdata($get_news);

			                    ?>	

			                      <div class="col-lg-12 col-md-12 col-sm-12 col-12" onclick="location.href='<?php echo get_the_permalink($news->ID); ?>';">

			                        <div class="insured-boxes-flex">

			                          <div class="insured-main-content">

			                              <h6><?php echo get_the_title($news->ID); ?></h6>

			                              <ul>

			                                  <li><?php echo get_the_date( '', $news->ID ); ?></li>

			                              </ul>

			                          </div>

			                          <div class="brown-icon-img">

			                              <a href="<?php echo get_the_permalink($news->ID); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blue-arrow.png" alt="image" class="img-fluid"></a>

			                          </div>

			                      	</div>

			                      </div>

			                      <?php

				                      	wp_reset_postdata();
									}
									if($count_news >= 10){	
									?>
											<div class="load-more-btn">
	
											<a href="javascript:void(0)" class="load-more load-more-news"><span>Load More</span> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ad-right-angle.png" alt="image" class="img-fluid"></a>
	
										</div>
									<?php
									}

			                  	  	}
								?>

			                  	</div>

			                	

			                  </div>

			                </div>

							<?php

							}



							if (get_row_layout() == 'events') {

							?>

							<div class="tab-pane events-tab-pane" id="tabs-5" role="tabpanel">

				                <div class="pf-cls publication-tab">

				                    <h4>Events</h4>

				                    <div class="row">

			                    	<?php

			                    	$get_events = get_sub_field('select_events');
							        if( $get_events ){
										$count_events = count($get_events);
							            foreach( $get_events as $events ){

							            setup_postdata($get_events);

			                    	?>

				                    	<div class="col-lg-12 col-md-12 col-sm-12 col-12" onclick="location.href='<?php echo get_the_permalink($events->ID); ?>';">

					                      	<div class="insured-boxes-flex">

					                          <div class="insured-main-content">

					                              <h6><?php echo get_the_title($events->ID); ?></h6>

					                              <ul>

					                              	<?php

					                              	$attorny_ids = get_field("related_attorney", $events->ID);

        											if(!empty( $attorny_ids )){

        											$args = array(

													'post_type'      => 'attorney',

													'post__in' => $attorny_ids,

													'orderby'   => array(

													    'date' =>'DESC',)

													);

													$attorney = new WP_Query($args);	

					                              	?>

					                                  <li class="practices-events">

					                                  <?php

					                                  while ($attorney->have_posts()) {

													  	$attorney->the_post();

													  	echo '<span>'.get_the_title().' '.get_field('title_suffix', $attorney->ID).'</span>';

													  	wp_reset_postdata();

													  }

					                                  ?>	

					                                  </li>

					                                  <li>/</li>

					                                <?php

					                            	}

					                                ?>

					                                  <li><?php echo get_field("event_date", $events->ID); ?></li>

					                                  <?php if(get_field("event_location", $events->ID)){ ?>

					                                  <li>/</li>

					                                  <li><?php echo get_field("event_location", $events->ID); ?></li>

					                              	  <?php } ?>

					                              </ul>

					                          </div>

					                          <div class="brown-icon-img">

					                              <a href="<?php echo get_the_permalink($events->ID); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blue-arrow.png" alt="image" class="img-fluid"></a>

					                          </div>

					                      	</div>

					                    </div>

					                <?php

					                	wp_reset_postdata();

					            		}
										if($count_events >= 10){
											?>
										<div class="load-more-btn">
	
											<a href="javascript:void(0)" class="load-more load-more-events"><span>Load More</span> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ad-right-angle.png" alt="image" class="img-fluid"></a>
	
										</div>
										<?php
										}
					            	}
									?>	   	

					                </div>

					            </div>

					        </div>

							<?php

							}



							if (get_row_layout() == 'publications') {

							?>

							<div class="tab-pane publication-tab-pane" id="tabs-6" role="tabpanel">

			                    <div class="pf-cls publication-tab">

			                      <h4>Publications</h4>

			                      <div class="row">

			                      	<?php

			                      	$get_publications = get_sub_field('select_publications');
							        if( $get_publications ){
									$count_publication = count($get_publications);	
							            foreach( $get_publications as $publications ){

							            setup_postdata($publications);

			                      	?>

			                      	<div class="col-lg-12 col-md-12 col-sm-12 col-12" onclick="location.href='<?php echo get_the_permalink($publications->ID); ?>';">

			                          <div class="insured-boxes-flex">

			                            <div class="insured-main-content">

			                                <h6><?php echo get_the_title($publications->ID); ?></h6>

			                                <ul>

			                                    <li>
												<?php
												if(get_post_type($publications->ID) == "newsletter"){
													$news_cat = get_the_terms($publications->ID, 'newsletter_cat');
					
													if ($news_cat && !is_wp_error($news_cat)) {
					
														$news_names = array();
								
														foreach ($news_cat as $newscat) {
								
															$news_names[] = $newscat->name;
								
														}
								
														echo implode(', ', $news_names);
													}
					
												}else{
													echo get_field("publication_sub_title", $publications->ID);
												}
												?>
												</li>                                 

			                                </ul>

			                            </div>

			                            <div class="brown-icon-img">

			                                <a href="<?php echo get_the_permalink($publications->ID); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blue-arrow.png" alt="image" class="img-fluid"></a>

			                            </div>

			                          </div>

			                        </div>

			                        <?php

			                        	wp_reset_postdata();

			                    		}

										if($count_publication >= 10){
										?>
										<div class="load-more-btn">
	
											<a href="javascript:void(0)" class="load-more load-more-publication"><span>Load More</span> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ad-right-angle.png" alt="image" class="img-fluid"></a>
	
										</div>
										<?php
										}

			                    	}
									
									?>
			                      </div>

			                  	</div>

			                </div>

							<?php	

							}



						endwhile;

					}

	                ?>



		      	</div>

			

			</div>



			<div class="col-lg-4 col-md-4 col-sm-4 col-12">

			<?php

			if (have_rows('sidebar')) {

				while (have_rows('sidebar')) : the_row();

				$key_contacts = get_sub_field('key_contacts');

		        if( $key_contacts ){

				?>

					<div class="right-side-col">

	                    <h5>Key Contact(s)</h5>

	                    <?php            

			            foreach( $key_contacts as $contacts ){

			            setup_postdata($key_contacts);

	                    ?>

	                    <div class="pra-div-flex">

	                        <div class="pra-div-img">

	                        	<?php if( has_post_thumbnail($contacts->ID) ){ ?>

	                            	<img src="<?php echo get_the_post_thumbnail_url($contacts->ID); ?>" alt="image" class="img-fluid">

	                        	<?php } ?>

	                        </div>

	                        <div class="pra-div-content">

	                            <h6><?php echo get_the_title($contacts->ID).' '.get_field('title_suffix', $contacts->ID); ?></h6>

	                            <a href="<?php echo get_the_permalink($contacts->ID); ?>">View More<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ad-right-angle.jpg" alt="image" class="img-fluid"></a>

	                        </div>

	                    </div>        

			            <?php

			    		}

			    		wp_reset_postdata();

			            ?>

		            </div>

	        	<?php

	    		}

	    		

	    		endwhile;

	    	}

	            ?>

	            <div class="right-side-col">

                <h5>Related Practice Areas</h5>

		            <ul>

		            <?php

		            	$args = array(

		                'post_type'      => 'practice-area',

		                'posts_per_page' => 2,

		                'post__not_in' => array(get_the_ID()),

		                'orderby'   => array(

		                    'date' =>'DESC',)

		              );

		              $practice_areas = new WP_Query($args);

		              if ($practice_areas->have_posts()) {

		                while ($practice_areas->have_posts()) {

		                $practice_areas->the_post();

		                ?>

		                <li><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></li>

		                <?php

		            	}

		            }

		            wp_reset_postdata();

	            	?>	

		            </ul>

	          	</div>



	        <?php

	        if (have_rows('sidebar')) {

				while (have_rows('sidebar')) : the_row();

				$sub_practice_areas = get_sub_field('sub_practice_areas');

		        if( $sub_practice_areas ){

		        ?>

		        <div class="right-side-col">

                <h5>Sub Practice Areas</h5>

                <ul>

                <?php

                foreach( $sub_practice_areas as $sub_areas ){

	    	        setup_postdata($sub_practice_areas);

	    	        echo '<li><a href="'.get_the_permalink($sub_areas->ID).'">'.get_the_title($sub_areas->ID).'</a></li>';

			    }

			    wp_reset_postdata();

                ?>

               	</ul>

               	</div>

		        <?php

		        }

		    	endwhile;

		    }

	        ?>  	

              

			</div>



		</div>

	</div>

</section>

<?php

if (have_rows('bottom_section')) {

	while (have_rows('bottom_section')) : the_row();

		if (get_row_layout() == 'banner_image_section') {

		?>

		<section class="ask-banner-sec">

		  <div class="container-fluid">

		    <div class="row">

		      <div class="col-lg-6 col-md-6 col-sm-6 col-12 ask-banner-padd">

		        <img src="<?php echo get_sub_field("banner_image"); ?>" alt="image" class="img-fluid">

		      </div>

		      <div class="col-lg-6 col-md-6 col-sm-6 col-12">

		        <div class="ask-banner-content">

		          <h3><?php echo get_sub_field("heading"); ?></h3>

		          <p><?php echo get_sub_field("content"); ?></p>

		          <?php

		          if (have_rows('list_items')) {

		          ?>

		          <ul>

		          	<?php while (have_rows('list_items')) : the_row(); ?>

		            <li>

		              <h6><?php echo get_sub_field("title"); ?></h6>

		              <p><?php echo get_sub_field("content"); ?></p>

		            </li>

		        	<?php endwhile; ?>

		          </ul>

		          <?php

		       	   }

		           ?>

		        </div>

		      </div>

		    </div>

		  </div>

		</section>

		<?php

		}



		if (get_row_layout() == 'carousel_section') {

?>

		<section class="litigation-timeline-sec">

		    <div class="container-fluid">

		        <div class="row">

		            <div class="col-lg-12 col-md-12 col-sm-12 col-12">

		                <div class="litigation-slider">

		                    <div class="slider responsive">

	                    	<?php

	                    	if (have_rows('carousel')) {

	                    		while (have_rows('carousel')) : the_row();

	                    		if (have_rows('carousel_type')) {

		                    		while (have_rows('carousel_type')) : the_row();

		                    		if (get_row_layout() == 'full_content') {

		                    		?>

		                    		<div>

			                            <div class="timeline-slider">

			                                <h4><?php echo get_sub_field("heading"); ?></h4>

			                                <span><?php echo get_sub_field("date"); ?></span>

			                                <p><?php echo get_sub_field("content"); ?></p>

			                            </div>

			                        </div>

		                    		<?php

		                    		}

		                    		if (get_row_layout() == '3_mix_content') {

	                    			?>

	                    			<div>

			                            <h4 class="tm-col"><?php echo get_sub_field("heading"); ?></h4>

			                            <div class="timeline-slider">

			                                <div class="timeline-slider-flex">

			                                    <div class="timeline-slider-content">

			                                        <span><?php echo get_sub_field("first_date"); ?></span>

			                                		<p><?php echo get_sub_field("first_content"); ?></p>

			                                    </div>

			                                    <div class="timeline-slider-content">

			                                        <span><?php echo get_sub_field("second_date"); ?></span>

			                                		<p><?php echo get_sub_field("second_content"); ?></p>

			                                    </div>

			                                </div>

			                                <div class="timeline-slider-flex">

			                                    <div class="timeline-slider-content">

			                                        <span><?php echo get_sub_field("third_date"); ?></span>

			                                		<p><?php echo get_sub_field("third_content"); ?></p>

			                                    </div>

			                                </div>

			                            </div>

			                        </div>

	                    			<?php

		                    		}

		                    		endwhile;

		                    	}

	                    		endwhile;

	                    	}

	                    	?>



		                    </div>

		                </div>

		            </div>

		        </div>

		    </div>

		</section>

<?php

		}



	endwhile;

}



get_footer();

?>

<script type="text/javascript">



	$('.responsive').slick({

        dots: false,

        arrows: true,

        infinite: true,

        autoplay: true,

        speed: 300,

        slidesToShow: 1,

        slidesToScroll: 1,

        responsive: [

            {

            breakpoint: 1024,

            settings: {

                slidesToShow: 1,

                slidesToScroll: 1,

                infinite: true,

                dots: true

            }

            },

            {

            breakpoint: 600,

            settings: {

                slidesToShow: 1,

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



	$(function () {

		$(".people-tab-pane .col-12").slice(0, 8).show();

		$("body").on('click touchstart', '.load-more-people', function (e) {

		e.preventDefault();

		$(".people-tab-pane .col-12:hidden").slice(0, 8).slideDown();

		if ($(".people-tab-pane .col-12:hidden").length == 0) {

			$(".load-more-people").css('visibility', 'hidden');

		}

		// $('html,body').animate({

		//   scrollTop: $(this).offset().top

		// }, 1000);

		});

	});

	$(function () {

	    $(".events-tab-pane .col-lg-12").slice(0, 10).show();

	    $("body").on('click touchstart', '.load-more-events', function (e) {

	      e.preventDefault();

	      $(".events-tab-pane .col-lg-12:hidden").slice(0, 10).slideDown();

	      if ($(".events-tab-pane .col-lg-12:hidden").length == 0) {

	        $(".load-more-events").css('visibility', 'hidden');

	      }

	      // $('html,body').animate({

	      //   scrollTop: $(this).offset().top

	      // }, 1000);

	    });

  	});

  	$(function () {

        $(".news-tab-pane .col-lg-12").slice(0, 10).show();

        $("body").on('click touchstart', '.load-more-news', function (e) {

          e.preventDefault();

          $(".news-tab-pane .col-lg-12:hidden").slice(0, 10).slideDown();

          if ($(".news-tab-pane .col-lg-12:hidden").length == 0) {

            $(".load-more-news").css('visibility', 'hidden');

          }

          // $('html,body').animate({

          //   scrollTop: $(this).offset().top

          // }, 1000);

        });

    });

    $(function () {

	    $(".publication-tab-pane .col-lg-12").slice(0, 10).show();

	    $("body").on('click touchstart', '.load-more-publication', function (e) {

	      e.preventDefault();

	      $(".publication-tab-pane .col-lg-12:hidden").slice(0, 10).slideDown();

	      if ($(".publication-tab-pane .col-lg-12:hidden").length == 0) {

	        $(".load-more-publication").css('visibility', 'hidden');

	      }

	      // $('html,body').animate({

	      //   scrollTop: $(this).offset().top

	      // }, 1000);

	    });

	});	

</script>