<?php

/**
 * Template Name: Career Page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty
 */
get_header();
if (have_rows("career_header_setting")) {
	while (have_rows("career_header_setting")) : the_row();
		$banner_img = get_sub_field("banner_image");
	endwhile;
}
$active_tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : '1';
?>
<section class="attorneys-banner-bg">
	<div class="container-fluid">
	  <div class="row">
	    <div class="col-lg-6 col-md-6 col-sm-6 col-12 bg-attorney-img">
	      <img src="<?php echo $banner_img; ?>" alt="image" class="img-fluid">
	    </div>
	    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
	      <div class="attorneys-heading">
	          <h2><?php echo get_the_title(); ?></h2>
	      </div>
	    </div>
	  </div>
	</div>
</section>
<section class="profile-tabs-sec">
    <div class="container-fluid">
<?php
if (have_rows('career_tab')) {
	?>
	<div class="row">
	    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
	      <div class="profile-tabs-bg">
	        <ul class="nav nav-tabs" role="tablist">
	        <?php
	        $count = 1;
	        while (have_rows('career_tab')) : the_row();
				if (get_row_layout() == 'tab_content') {
			?>
			<li class="nav-item">
	            <a class="nav-link <?php if($count == $active_tab){ echo "active"; } ?>" data-toggle="tab" href="#tabs-<?php echo $count; ?>" role="tab"><span><?php echo get_sub_field("tab_title"); ?></span></a>
          	</li>
			<?php
				}
			$count++;
			endwhile;
	        ?>	
	        </ul>
	      </div>
	    </div>
	</div>

	<div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
    	    <div class="tab-content">
    	    <?php
	        $count = 1;
	        while (have_rows('career_tab')) : the_row();
				if (get_row_layout() == 'tab_content') {
			?>
			<div class="tab-pane <?php if($count == $active_tab){ echo "active"; } ?>" id="tabs-<?php echo $count; ?>" role="tabpanel">

        		<?php
        		while (have_rows('inner_content')) : the_row();

				if (get_row_layout() == 'content_with_image') {
				?>
				<div class="row att-cont-row">
		            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
		                <div class="attorney-content-box">
		                <?php 
		                if(!empty( get_sub_field("heading") )){ 
		                ?>	
		                    <h4><?php echo get_sub_field("heading"); ?></h4>
		                <?php 
		            	}
		            	if(!empty( get_sub_field("sub_heading") )){
		            	?>
		            		<h6><?php echo get_sub_field("sub_heading"); ?></h6>
		            	<?php
		            	}
		            	if(!empty( get_sub_field("content") )){
		            	?>
		            		<p><?php echo get_sub_field("content"); ?></p>
		            	<?php
		            	}
		            	if(!empty( get_sub_field("button") )){
		            	?>
		            	<div class="career-bt">
		            	<?php
		            	$button_link = get_sub_field('button');                  
		                    $link_url = isset($button_link['url']) && $button_link['url'] ? $button_link['url'] : '';
		                    $link_title = isset($button_link['title']) && $button_link['title'] ? $button_link['title'] : '';
		                    $link_target = isset($button_link['target']) && $button_link['target'] ? $button_link['target'] : '_self';
		                ?>
	                      	<a href="<?php echo esc_url($link_url); ?>" class="btn btn-primary current-jobs-btn" target="<?php echo esc_attr($link_target); ?>">
	                      		<span> <?php echo esc_html($link_title); ?> <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/png-arrow.png" alt="image" class="img-fluid"></span>
		                    </a>
	                    </div>
		            	<?php
		            	}
		            	?>
		                    
		                </div>
		            </div>
		            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
		            	<?php
		            	if(!empty( get_sub_field("image") )){
		            	?>
		            	<img src="<?php echo get_sub_field("image"); ?>" alt="image" class="img-fluid">
		            	<?php
		            	}
		            	?>
		            </div>
		        </div>
				<?php	
				}
				if (get_row_layout() == 'bullet_section') {
				?>
				<div class="ad-kl-content careers-inner-sec">
					<?php
					if(!empty( get_sub_field("heading") )){
					?>
					<h4 class="health-heading"><?php echo get_sub_field("heading"); ?></h4>
					<?php	
					}
					if(!empty( get_sub_field("content") )){
					?>
					<p><?php echo get_sub_field("content"); ?></p>
					<?php
					}
					if(!empty( get_sub_field("list_items") )){
						while (have_rows('list_items')) : the_row();
						?>
						<div class="career-listinf-div">
						<?php
						if(!empty( get_sub_field("title") )){
						?>
						<h6><?php echo get_sub_field("title"); ?></h6>
						<?php
						}
						if(!empty( get_sub_field("description") )){
						?>
						<p><?php echo get_sub_field("description"); ?></p>
						<?php
						}
						?>
		            	</div>
						<?php
						endwhile;
					}
					?>
	        	</div>
				<?php	
				}

				endwhile;
        		?>

            </div>
			<?php
				}
			$count++;
			endwhile;
	        ?>
    	    </div>
    	</div>
    </div>
	<?php
	
}
?>
	</div>
</section>

<section class="profile-tabs-sec">
    <div class="container-fluid">


    <div class="row" style="display: none;">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
    	    <div class="tab-content">

	            <div class="tab-pane active" id="tabs-1" role="tabpanel">

			    	<div class="row att-cont-row">
			            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
			                <div class="attorney-content-box">
			                    <h4>attorneys</h4>
			                    <h6>Why Laterals Do Well At Anderson Kill</h6>
			                    <p>Laterals benefit from Anderson Kill’s entrepreneurial approach to law and growing legal practices. Anderson Kill seeks to grow with the addition of superior lawyers with strong practices in New York, Newark, Philadelphia, Washington DC, Denver, Los Angeles, and Stamford. Laterals have expanded their practices with the support of our national platform. Leadership opportunities for new practices are available, and laterals will not face a formal retirement age. We are a firm with a national practice handling high-value matters.</p>
			                </div>
			            </div>
			            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
			                <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/att-cont.jpg" alt="image" class="img-fluid">
			            </div>
			        </div>

			        <div class="ad-kl-content careers-inner-sec">
			            <h4 class="health-heading">Anderson Kill Offers Laterals a Solid Platform for Growth</h4>
			            <p>Laterals gain from a stable, nationally known law firm. Anderson Kill was founded in 1969 on the principles of integrity, excellence in the practice of law, and straightforward solutions to complex legal issues. The firm's attorneys approach engagements aggressively and have earned a reputation for combining corporate polish and assertive advocacy.</p>

			            <div class="career-listinf-div">
			                <h6>Client Base</h6>
			                <p>Laterals benefit from a firm which represents the nation's largest public and private entities, including companies in financial services, retail, oil & gas, telecommunications, construction, food supply, technology, pharmaceutical and life sciences, and utilities, municipalities and state governments, religious and not-for-profit organizations, small companies, and individuals.</p>
			            </div>
			            <div class="career-listinf-div">
			                <h6>Growth Orientation</h6>
			                <p>Laterals gain from a conflict-free platform to expand many practices. We conduct a national seminar program and employ a professional marketing team with specialized experience in growing legal practices. We conduct formal partner "Rainmaking" programs to grow the practices of new partners.</p>
		            	</div>
		        	</div>
            
		        	<div class="row att-cont-row">
			            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
			                <div class="attorney-content-box">
			                    <h4>CURRENT JOB OPENINGS</h4>
			                    <p>Attorneys or groups seeking to grow their practices in an exceptional work environment should consider Anderson Kill.  Our current job openings are listed below.  For more information regarding partner or group opportunities, please contact Kate Tylis, our Legal Talent Acquisition Consultant, at ktylis@andersonkill.com.  For more information regarding summer associate or associate opportunities, please contact Carolyn McGoran at cmcgoran@andersonkill.com.  All communications will remain confidential.</p>
			                    <div class="career-bt">
			                      <a href="javascript:void(0)" class="btn btn-primary current-jobs-btn"><span> see current opening <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/png-arrow.png" alt="image" class="img-fluid"></span></a>
			                    </div>
			                </div>
			            </div>
			            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
			                <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/cr-jobs.jpg" alt="image" class="img-fluid">
			            </div>
			        </div>

	            </div>

	            <div class="tab-pane" id="tabs-2" role="tabpanel">

			    	<div class="row att-cont-row">
			            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
			                <div class="attorney-content-box">
			                    <h4>attorneys 2</h4>
			                    <h6>Why Laterals Do Well At Anderson Kill</h6>
			                    <p>Laterals benefit from Anderson Kill’s entrepreneurial approach to law and growing legal practices. Anderson Kill seeks to grow with the addition of superior lawyers with strong practices in New York, Newark, Philadelphia, Washington DC, Denver, Los Angeles, and Stamford. Laterals have expanded their practices with the support of our national platform. Leadership opportunities for new practices are available, and laterals will not face a formal retirement age. We are a firm with a national practice handling high-value matters.</p>
			                </div>
			            </div>
			            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
			                <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/att-cont.jpg" alt="image" class="img-fluid">
			            </div>
			        </div>

			        <div class="ad-kl-content careers-inner-sec">
			            <h4 class="health-heading">Anderson Kill 2 Offers Laterals a Solid Platform for Growth</h4>
			            <p>Laterals gain from a stable, nationally known law firm. Anderson Kill was founded in 1969 on the principles of integrity, excellence in the practice of law, and straightforward solutions to complex legal issues. The firm's attorneys approach engagements aggressively and have earned a reputation for combining corporate polish and assertive advocacy.</p>

			            <div class="career-listinf-div">
			                <h6>Client Base</h6>
			                <p>Laterals benefit from a firm which represents the nation's largest public and private entities, including companies in financial services, retail, oil & gas, telecommunications, construction, food supply, technology, pharmaceutical and life sciences, and utilities, municipalities and state governments, religious and not-for-profit organizations, small companies, and individuals.</p>
			            </div>
			            <div class="career-listinf-div">
			                <h6>Growth Orientation</h6>
			                <p>Laterals gain from a conflict-free platform to expand many practices. We conduct a national seminar program and employ a professional marketing team with specialized experience in growing legal practices. We conduct formal partner "Rainmaking" programs to grow the practices of new partners.</p>
		            	</div>
		        	</div>
            
		        	<div class="row att-cont-row">
			            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
			                <div class="attorney-content-box">
			                    <h4>CURRENT JOB OPENINGS</h4>
			                    <p>Attorneys or groups seeking to grow their practices in an exceptional work environment should consider Anderson Kill.  Our current job openings are listed below.  For more information regarding partner or group opportunities, please contact Kate Tylis, our Legal Talent Acquisition Consultant, at ktylis@andersonkill.com.  For more information regarding summer associate or associate opportunities, please contact Carolyn McGoran at cmcgoran@andersonkill.com.  All communications will remain confidential.</p>
			                    <div class="career-bt">
			                      <a href="javascript:void(0)" class="btn btn-primary current-jobs-btn"><span> see current opening <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/png-arrow.png" alt="image" class="img-fluid"></span></a>
			                    </div>
			                </div>
			            </div>
			            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
			                <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/cr-jobs.jpg" alt="image" class="img-fluid">
			            </div>
			        </div>

	            </div>

	        </div>
	    </div>
	</div>

  </div>
</section>

<?php
get_footer();
?>
<script>
	var hash = window.location.hash;

$(".nav-tabs").find("li a").each(function(key, value) {
  if (hash === $(value).attr('href')) {
    $(value).tab('show');
  }

  $(value).click(function() {
    location.hash = $(this).attr('href');
  });
});
</script>