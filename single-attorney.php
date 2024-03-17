<?php

get_header();

$titles = get_the_terms(get_the_ID(), 'title');

$offices = get_the_terms(get_the_ID(), 'office');

$practice_areas = get_the_terms(get_the_ID(), 'practice_area');

$industry_groups = get_the_terms(get_the_ID(), 'industry_group');

$market_focuses = get_the_terms(get_the_ID(), 'market_focus');

?>



<section class="attorneys-banner-bg">

  <div class="container-fluid">

    <div class="row">

      <div class="col-lg-6 col-md-6 col-sm-6 col-12 bg-attorney-img">

        <img src="<?php echo get_field('profile_banner_image') ?: get_stylesheet_directory_uri() . '/assets/images/attorneys-banner.jpg'; ?>" alt="image" class="img-fluid">

      </div>

      <div class="col-lg-6 col-md-6 col-sm-6 col-12">

        <div class="attorneys-heading profile-pg">

          <div class="border-bt">

            <h2><?php echo get_the_title().' '.get_field('title_suffix'); ?></h2>

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

			}



			if (have_rows('business_card_details')) {

				while (have_rows('business_card_details')) : the_row();

				$card_email = get_sub_field("email");

				$card_phone = get_sub_field("phone_number");

				$card_fax = get_sub_field("fax_number");

				$card_address = get_sub_field("address");

				$card_notes = get_sub_field("notes");

				endwhile;

			}

            ?>

        	</p>

          </div>

          <ul>

            <?php if(!empty($card_phone)){?><li><a href="tel:<?php echo $card_phone; ?>"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $card_phone; ?></a></li><?php } ?>

            <?php if(!empty($card_email)){?><li><a href="mailto:<?php echo $card_email; ?>"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $card_email; ?></a></li><?php } ?>

            <li><?php echo do_shortcode('[vcard name="'.get_the_title().'" company="Anderson Kill" job_title="'.implode(', ', $title_names).'" email="'.$card_email.'" business_no="'.$card_phone.'" business_fax="'.$card_fax.'" business_address="'.$card_address.'" notes="'.$card_notes.'"]'); ?></li>
			<li><a href="javascript:void(0)" onclick="window.print()" class="li-subscribe"><i class="fa fa-print" aria-hidden="true"></i> Print</a></li>
          </ul>
          <div class="back-opt">
            <a href="<?php echo get_site_url(); ?>/attorney/"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/left-back-arrow.jpg" alt="image" class="img-fluid">Back</a>
          </div>
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

              

              <li class="nav-item">

                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"><span>PROFILE</span></a>

              </li>

              <?php

              if (have_rows('profile_tabs')) {

				while (have_rows('profile_tabs')) : the_row();

	    		if (get_row_layout() == 'experience') {

              ?>

              	<li class="nav-item">

	                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"><span>EXPERIENCE</span></a>

              	</li>

              <?php

          		}

          		if (get_row_layout() == 'publications') {

              ?>

              	<li class="nav-item">

	                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"><span>PUBLICATIONS</span></a>

              	</li>

              <?php

          		}

          		if (get_row_layout() == 'speaking_engagements') {

              ?>

              	<li class="nav-item">

	                <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab"><span>SPEAKING ENGAGEMENTS</span></a>

              	</li>

              <?php

          		}

          		if (get_row_layout() == 'news') {

              ?>

              	<li class="nav-item">

	                <a class="nav-link" data-toggle="tab" href="#tabs-5" role="tab"><span>NEWS</span></a>

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

            <div class="tab-pane active" id="tabs-1" role="tabpanel">



              <div class="pf-cls">

                <h4>Profile</h4>

                <div class="attorney-pcontent">

                	<?php echo wpautop( get_the_content() ); ?>

            	</div>

              </div>

              

            </div>

            <?php 

            if (have_rows('profile_tabs')) {

				while (have_rows('profile_tabs')) : the_row();

				if (get_row_layout() == 'experience') {

				$scroll_enable = get_sub_field("scrollbar");

				?>

				<div class="tab-pane" id="tabs-2" role="tabpanel">

	              <div class="pf-cls <?php if(!empty($scroll_enable)){ echo "scrollbar"; } ?>" id="style-3">

	                <h4>Experience</h4>

	                <?php echo get_sub_field("add_experience"); ?>

	              </div>

	            </div>

				<?php	

				}

				if (get_row_layout() == 'publications') {

				$pub_ids = get_sub_field('select_publications');
				
				?>

				<div class="tab-pane" id="tabs-3" role="tabpanel">

	              <div class="pf-cls publication-tab" id="publication-tab">

	                <h4>Publications</h4>
					
	                <?php

	                $args = array(

					'post_type'      => array("publication", "newsletter"),

					'post__in' => $pub_ids,

					'posts_per_page' => -1,

					'orderby'   => array(

					    'date' =>'DESC',)

					);

					$publication = new WP_Query($args);

					if ($publication->have_posts()) {

						while ($publication->have_posts()) {

						$publication->the_post();
						$count_publication = $publication->found_posts;

						?>  

						<div class="publication-box" onclick="location.href='<?php echo get_the_permalink($publication->ID); ?>';">

						  <div class="publication-content">

						    <h5><?php echo get_the_title(); ?></h5>

						    <p><?php 
							if(get_post_type() == "newsletter"){
								$news_cat = get_the_terms($publication->ID, 'newsletter_cat');

								if ($news_cat && !is_wp_error($news_cat)) {

									$news_names = array();
			
									foreach ($news_cat as $newscat) {
			
										$news_names[] = $newscat->name;
			
									}
			
									echo implode(', ', $news_names);
									echo " / ";
								}

							}else{
								echo get_field("publication_sub_title", $publication->ID);
								echo " / ";
							}
							
							echo get_the_date(); ?></p>

						  </div>

						  <div class="sm-rgt-arrow">

						    <a href="<?php echo get_the_permalink(); ?>">Read More <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/blue-arrow.png" alt="images" class="img-fluid"></a>

						  </div>

						</div>

						<?php

						}

					}

					wp_reset_postdata();  

					if( $count_publication >= 10){
	                ?>
	                <div class="load-more-btn twitter-tab-btn">

	                	<span id="pub-tab-loadmore"></span>

	            	</div>
					<?php
					}
					?>
	              </div>

	            </div>

				<?php

				}



			if (get_row_layout() == 'speaking_engagements') {

				$engagements_ids = get_sub_field('select_engagements');

				?>

				<div class="tab-pane" id="tabs-4" role="tabpanel">

	              <div class="pf-cls publication-tab" id="event-tab">

	                <h4>Speaking Engagements</h4>

	                <?php

	                $args2 = array(

					'post_type'      => 'event',

					'post__in' => $engagements_ids,
					'posts_per_page' => -1,

					'orderby'   => array(

					    'date' =>'DESC',)

					);

					$event = new WP_Query($args2);
					$count_event = $event->found_posts;

					if ($event->have_posts()) {

						while ($event->have_posts()) {

						$event->the_post();

						?>  

						<div class="publication-box" onclick="location.href='<?php echo get_the_permalink($event->ID); ?>';">

						  <div class="publication-content">

						    <h5><?php echo get_the_title(); ?></h5>

						    <p><?php if(!empty( get_field("event_organizer") )){ echo get_field("event_organizer") .' / '; } echo get_field("event_date"); ?></p>

						  </div>

						  <div class="sm-rgt-arrow">

						    <a href="<?php echo get_the_permalink(); ?>">Read More <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/blue-arrow.png" alt="images" class="img-fluid"></a>

						  </div>

						</div>

						<?php

						}

					}

					wp_reset_postdata();  
					if($count_event >= 10){
	                ?>

	                <div class="load-more-btn twitter-tab-btn">

	                	<span id="event-tab-loadmore"></span>

	            	</div>
					<?php
					}
					?>
	              </div>

	            </div>

				<?php

			}



			if (get_row_layout() == 'news') {

				$news_ids = get_sub_field('select_news');

				?>

				<div class="tab-pane" id="tabs-5" role="tabpanel">

	              <div class="pf-cls publication-tab" id="news-tab">

	                <h4>News</h4>

	                <?php

	                $args3 = array(

					'post_type'      => 'post',

					'post__in' => $news_ids,
					'posts_per_page' => -1,

					'orderby'   => array(

					    'date' =>'DESC',)

					);

					$news = new WP_Query($args3);
					$count_news = $news->found_posts;

					if ($news->have_posts()) {

						while ($news->have_posts()) {

						$news->the_post();

						?>  

						<div class="publication-box" onclick="location.href='<?php echo get_the_permalink($news->ID); ?>';">

						  <div class="publication-content">

						    <h5><?php echo get_the_title(); ?></h5>

						    <p><?php echo get_the_date(); ?></p>

						  </div>

						  <div class="sm-rgt-arrow">

						    <a href="<?php echo get_the_permalink(); ?>">Read More <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/blue-arrow.png" alt="images" class="img-fluid"></a>

						  </div>

						</div>

						<?php

						}

					}

					wp_reset_postdata();  
					if($count_news >= 10){
	                ?>

	                <div class="load-more-btn twitter-tab-btn">

	                	<span id="news-tab-loadmore"></span>

	            	</div>

	                <?php
					}
					?>

	              </div>

	            </div>

				<?php

			}



				endwhile;

			}

            ?>

            

          </div>

        </div>

		<div class="col-lg-12 attorney-print-content">
		<?php
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
		if(!empty($image[0])){
		?>
			<img src="<?php echo $image[0]; ?>" alt="images" class="img-fluid only-pdf-show"/>
		<?php
		}
		?>
		<div class="attorneys-heading profile-pg">
			<?php
			$featured_image_url = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_stylesheet_directory_uri().'/assets/images/people-default.jpg';
			?>
			<img src="<?php echo $featured_image_url; ?>" alt="images" class="img-fluid only-pdf-show people-featured-pdf-show"/>
			<div class="border-bt">
			<h2><?php echo get_the_title().' '.get_field('title_suffix'); ?></h2>
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
			}
			if (have_rows('business_card_details')) {
				while (have_rows('business_card_details')) : the_row();
				$card_email = get_sub_field("email");
				$card_phone = get_sub_field("phone_number");
				$card_fax = get_sub_field("fax_number");
				$card_address = get_sub_field("address");
				$card_notes = get_sub_field("notes");
				endwhile;
			}
			?>
			</p>
			</div>
			<ul>
			<?php if(!empty($card_phone)){?><li><a href="tel:<?php echo $card_phone; ?>"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $card_phone; ?></a></li><?php } ?>
			<?php if(!empty($card_email)){?><li><a href="mailto:<?php echo $card_email; ?>"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $card_email; ?></a></li><?php } ?>
			</ul>
		</div>
		<?php
		if(!empty(get_the_content()) ){
		?>
			<h4>Profile</h4>
			<div class="attorney-pcontent">
				<?php echo wpautop( get_the_content() ); ?>
			</div>
		<?php
		}
		if (have_rows('profile_tabs')) {
			while (have_rows('profile_tabs')) : the_row();
				if (get_row_layout() == 'experience') {
				?>
				<h4>Experience</h4>
				<?php 
					echo get_sub_field("add_experience");
				}

				if (get_row_layout() == 'publications') {
				$pub_ids = get_sub_field('select_publications');
				?>
				<h4>Publications</h4>
				<?php
				$args = array(	
				'post_type'      => array("publication", "newsletter"),
				'post__in' => $pub_ids,
				'posts_per_page' => -1,
				'orderby'   => array(
					'date' =>'DESC',)
				);
				$publication = new WP_Query($args);
				if ($publication->have_posts()) {
					while ($publication->have_posts()) {
					$publication->the_post();
					?>  
					<div class="publication-box">
						<div class="publication-content">
						<h5><?php echo get_the_title(); ?></h5>
						<p><?php 
						if(get_post_type() == "newsletter"){
							$news_cat = get_the_terms($publication->ID, 'newsletter_cat');
							if ($news_cat && !is_wp_error($news_cat)) {
								$news_names = array();
								foreach ($news_cat as $newscat) {
									$news_names[] = $newscat->name;
								}
								echo implode(', ', $news_names);
								echo " / ";
							}
						}else{
							echo get_field("publication_sub_title", $publication->ID);
							echo " / ";
						}
						echo get_the_date(); ?></p>
						</div>
					</div>
					<?php
					}
				}
				wp_reset_postdata();  
				}
				
				if (get_row_layout() == 'speaking_engagements') {
					$engagements_ids = get_sub_field('select_engagements');
					?>
						<h4>Speaking Engagements</h4>
						<?php
						$args2 = array(
						'post_type'      => 'event',
						'post__in' => $engagements_ids,
						'posts_per_page' => -1,
						'orderby'   => array(
							'date' =>'DESC',)
						);
						$event = new WP_Query($args2);
						if ($event->have_posts()) {
							while ($event->have_posts()) {
							$event->the_post();
							?>  
							<div class="publication-box">
							  <div class="publication-content">
								<h5><?php echo get_the_title(); ?></h5>
								<p><?php if(!empty( get_field("event_organizer") )){ echo get_field("event_organizer") .' / '; } echo get_the_date(); ?></p>
							  </div>
							</div>
							<?php
							}
						}
						wp_reset_postdata();  
				}

				if (get_row_layout() == 'news') {
					$news_ids = get_sub_field('select_news');
					?>
						<h4>News</h4>
						<?php
						$args3 = array(
						'post_type'      => 'post',
						'post__in' => $news_ids,
						'posts_per_page' => -1,
						'orderby'   => array(
							'date' =>'DESC',)
						);
						$news = new WP_Query($args3);
						if ($news->have_posts()) {
							while ($news->have_posts()) {
							$news->the_post();
							?>  
							<div class="publication-box">
							  <div class="publication-content">
								<h5><?php echo get_the_title(); ?></h5>
								<p><?php echo get_the_date(); ?></p>
							  </div>
							</div>
							<?php
							}
						}
						wp_reset_postdata();  
				}
				
			endwhile;
		}
		?>
		</div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-12">

        <?php

        if (have_rows('sidebar')) {

			while (have_rows('sidebar')) : the_row();

		    	if (get_row_layout() == 'lists') {

		    	?>

		    	<div class="right-side-col">

		            <h5><?php echo get_sub_field("heading"); ?></h5>

		            <ul>

		            <?php

		            if (have_rows('bullets')) {

						while (have_rows('bullets')) : the_row();

		            ?>

			              <li><?php echo get_sub_field("add_bullets"); ?></li>

			        <?php

			        	endwhile;

			    	}

			        ?>

		            </ul>

		        </div>

		    	<?php	

			    }

			endwhile;

		}



/*start*/

if ($practice_areas && !is_wp_error($practice_areas)) {
    $primary_term_id = yoast_get_primary_term_id('practice_area', get_the_ID());
    $sorted_terms = [];
    if (empty($primary_term_id)) {
        usort($practice_areas, function ($a, $b) {
            return strcasecmp($b->name, $a->name);
        });
        $sorted_terms = $practice_areas;
    } else {
        foreach ($practice_areas as $term) {
            if ($term->term_id === $primary_term_id) {
                array_unshift($sorted_terms, $term);
            } else {
                $sorted_terms[] = $term;
            }
        }
    }
	?>
	<div class="right-side-col">
	<h5>Practice Areas</h5>
		<ul>
		<?php
		foreach ($sorted_terms as $term) {
			$practice_area_post = get_page_by_title($term->name, OBJECT, 'practice-area');
			if ($practice_area_post && isset($practice_area_post->ID, $practice_area_post->post_title)) {
				echo '<a href="' . esc_url(get_permalink($practice_area_post->ID)) . '"><li>' . esc_html($practice_area_post->post_title) . '</li> </a>';
			}
		}
		?>
		</ul>
	</div>
	<?php
}

if ($industry_groups && !is_wp_error($industry_groups)) {
    $ind_primary_term_id = yoast_get_primary_term_id('industry_group', get_the_ID());
    $sorted_terms = [];
    if (empty($ind_primary_term_id)) {
        usort($industry_groups, function ($a, $b) {
            return strcasecmp($b->name, $a->name);
        });
        $sorted_terms = $industry_groups;
    } else {
        foreach ($industry_groups as $term) {
            if ($term->term_id === $ind_primary_term_id) {
                array_unshift($sorted_terms, $term);
            } else {
                $sorted_terms[] = $term;
            }
        }
    }
	?>
	<div class="right-side-col">
	<h5>Industry Group</h5>
		<ul>
		<?php
		foreach ($sorted_terms as $term) {
			$industry_group_post = get_page_by_title($term->name, OBJECT, 'industry-group');
			if ($industry_group_post && isset($industry_group_post->ID, $industry_group_post->post_title)) {
				echo '<a href="' . esc_url(get_permalink($industry_group_post->ID)) . '"><li>' . esc_html($industry_group_post->post_title) . '</li> </a>';
			}
		}
		?>
		</ul>
	</div>
	<?php
}

if (!empty($market_focuses)) {

	?>

	<div class="right-side-col">

	<h5>Market Focused Groups</h5>

	<ul>

	<?php

    foreach ($market_focuses as $market_focus) {

        $market_focus_post = get_page_by_title($market_focus->name, OBJECT, 'market-focused');



        if ($market_focus_post) {

        	echo '<a href="'.get_permalink($market_focus_post->ID).'"> <li>'.$market_focus_post->post_title.'</li> </a>';

        }

    }

    ?>

	</ul>

	</div>

    <?php

}

        ?>	

        </div>

      </div>

    </div>

    </div>

</section>



<?php

get_footer();

?>