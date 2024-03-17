<?php
get_header();
if (have_rows("event_header", "option")) {
	while (have_rows("event_header", "option")) : the_row();
		$banner_img = get_sub_field("banner_image");
		$breadcrumb = get_sub_field("breadcrumb");
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
<section class="profile-tabs-sec event1-inner-pg">
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="back-opt">
                <a href="<?php echo get_site_url(); ?>/event/"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/left-back-arrow.jpg" alt="image" class="img-fluid">Back</a>
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
                  <div class="flex-assign">
                    <div class="flex-assign-para">
                        <ul>
                            <?php if(!empty(get_field("event_organizer"))){?><li><strong>Organizer:</strong> <?php echo get_field("event_organizer"); ?></li><?php } 
                            if(!empty(get_field("event_location"))){?><li><strong>Location:</strong> <?php echo get_field("event_location"); ?></li><?php } 
                            if(!empty(get_field("event_date"))){?><li><strong>Date:</strong> <?php echo get_field("event_date"); ?></li><?php } 
                            if(!empty(get_field("event_start_time") && get_field("event_end_time") )){?><li><strong>Time:</strong> <?php echo date("h:i A", strtotime( get_field("event_start_time") )) .'-'. date("h:i A", strtotime( get_field("event_end_time") )); ?></li><?php } ?>
							<?php
							if(!empty(get_field("event_pdf_links"))){
							?>
							<li class="anderson-event-links">
							<strong>Download: </strong>
							<?php
								while (have_rows("event_pdf_links")) : the_row();
								$add_link = get_sub_field('add_link');
								$link_title = get_sub_field('add_text');
								if($add_link) {
								?>
								<a href="<?php echo esc_url($add_link); ?>" target="_blank">
									<?php echo esc_html($link_title); ?>
								</a>
								<?php
								}
								endwhile;
							?>
							</li>
							<?php
							}
							?>
                        </ul>
                        <?php
              	      	$event_cta = get_field('event_cta');
                  
		                if($event_cta) {
		                    $link_url = isset($event_cta['url']) && $event_cta['url'] ? $event_cta['url'] : '';
		                    $link_title = isset($event_cta['title']) && $event_cta['title'] ? $event_cta['title'] : '';
		                    $link_target = isset($event_cta['target']) && $event_cta['target'] ? $event_cta['target'] : '_self';
		                  ?>
		                    <div class="publication-butn event1a-btn">
		                      <a class="rd-more-btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
		                        <span><?php echo esc_html($link_title); ?> <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.png" class="ad-img"></span>
		                      </a>
		                    </div>
		                    <p class="only-pdf-show">Register: <?php echo esc_url($link_url); ?></p>
		                  <?php
	                	}
                        ?>
                    </div>
                    <div class="print-content-inner">
                        <ul>
                        	<li><a onclick="window.print()" href="javascript:void(0)"><i class="fa fa-print" aria-hidden="true"></i> Print</a></li>
                        	<li>
                        	<?php echo do_shortcode('[icalendar title="'.get_the_title().'" start_date="'.get_field("event_date").get_field("event_start_time").'" end_date="'.get_field("event_date").get_field("event_end_time").'" location="'.get_field("event_location").'"]'); ?>
                        	</li>
                        </ul>
                    </div>
                  </div>
                  <div class="tech-content">
                  	<div class="event-content">
                    	<?php echo wpautop( get_the_content() ); ?>
                	</div>
                    <?php
					$speakers = get_field('speakers');
					if ($speakers) {
					?>
					<h6>SPEAKERS:</h6>
					<?php
					    foreach ($speakers as $row) {
					        echo '<ul>';
					        if(!empty( $row['link'] )){
					        echo '<a href="'.$row['link'].'"><li class="cort-col">'.$row['name'].'</li></a> <li class="cort-col only-pdf-show">'.$row['name'].'</li>';
					    	}
					    	else{
					    	echo '<li class="cort-col">'.$row['name'].'</li>';
					    	}
					        echo '<li>'.$row['designation'].'</li>';
					        echo '<li>'.$row['short_intro'].'</li></ul>';
					    }
					}
                	?>
                  </div>
                  <?php
                  if(!empty(get_field("event_notice"))){
                  ?>
                  <div class="appropriate-program">
                  	<?php echo get_field("event_notice"); ?>
                  </div>
                  <?php
              	  }
                  ?>
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
     	$practice_ids = get_field("related_practice_areas");
        if(!empty( $practice_ids )){
     	?>     		
          <div class="right-side-col">

          	<?php
		         $args = array(
					'post_type'      => 'practice-area',
					'post__in' => $practice_ids,
					'orderby'   => array(
					    'date' =>'DESC',)
					);
					$attorney = new WP_Query($args);
					if ($attorney->have_posts()) {
					?>
					<h5>Related Practice Areas</h5>
					<ul>
					<?php
						while ($attorney->have_posts()) {
						$attorney->the_post();
						?>
						<li><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></li>
						<?php
						}
					?>
					</ul>
					<?php
					}
					wp_reset_postdata();
		         ?>
          </div>
          <?php
      		}
		
			  $post_id = get_the_ID(); // Get the current post's ID

			  // Get the terms associated with the current post for a specific taxonomy
			  $terms = wp_get_post_terms($post_id, 'event_topic'); // Replace 'your_taxonomy_name' with the actual taxonomy name
			  
			  // Prepare an array of term slugs from the retrieved terms
			  $term_slugs = array();
			  foreach ($terms as $term) {
				  $term_slugs[] = $term->slug;
			  }
			if(!empty($term_slugs)){
          ?>
          <div class="right-side-col reserve-right-col">
            <h5>Related Events</h5>
            <ul>
            <?php
			  $args = array(
				'post_type'      => 'event',
				'posts_per_page' => 2,
				'post__not_in'   => array(get_the_ID()),
				'orderby'        => 'date',
				'order'          => 'DESC',
				'tax_query'      => array(
					array(
						'taxonomy' => 'event_topic',
						'field'    => 'slug',
						'terms'    => $term_slugs,
						'operator' => 'IN',
					),
				),
			);

              $events = new WP_Query($args);
              if ($events->have_posts()) {
                while ($events->have_posts()) {
                $events->the_post();
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
			}
		  ?>
        </div>
      </div>
  </div>
</section>
<?php
get_footer();
?>