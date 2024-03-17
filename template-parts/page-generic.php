<?php

/**
 * Template Name: Generic Page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty
 */
get_header();
if (have_rows("page_header_banner")) {
	while (have_rows("page_header_banner")) : the_row();
		$banner_img = get_sub_field("banner_image");
		$breadcrumbs = get_sub_field("breadcrumbs");
	endwhile;
}
$page_width = get_field("page_width");
if($page_width == "full"){
	$width_classes = "col-lg-12 col-md-12 col-sm-12 col-12";
	$status_sidebar = "hide"; 
}
elseif ($page_width == "sidebar") {
	$width_classes = "col-lg-8 col-md-8 col-sm-8 col-12"; 
	$status_sidebar = "show";
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
            <h2><?php echo get_the_title(); ?></h2>
            <?php if(!empty($breadcrumbs)){ ?>
            <ul>
                <li><?php echo $breadcrumbs; ?></li>
                <li class="breadcrumb-slash">/</li>
                <li class="active-tab"><?php echo get_the_title(); ?></li>
            </ul>
            <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="client-services-sec-bg">
    <div class="container-fluid">
    	<div class="row generic-content">
    		
    		<div class="<?php echo $width_classes; ?>">
    			
    		<?php
    		if (have_rows("page_sections")) {
				while (have_rows("page_sections")) : the_row();
				
				if (get_row_layout() == "right_image_and_left_content") {
					get_template_part('template-parts/section/right_image_and_left_content');
				}

				if (get_row_layout() == "left_image_and_right_content") {
					get_template_part('template-parts/section/left_image_and_right_content');
				}

				if (get_row_layout() == "only_content") {
					get_template_part('template-parts/section/only_content');
				}

				if (get_row_layout() == "testimonial_slider") {
					get_template_part('template-parts/section/testimonial_slider');
				}

				if (get_row_layout() == "2_column_lists_and_1_column_image") {
					get_template_part('template-parts/section/2_column_lists_and_1_column_image');
				}

				if (get_row_layout() == "two_column_content") {
					get_template_part('template-parts/section/two_column_content');
				}

				if (get_row_layout() == "left_double_image_and_right_content") {
					get_template_part('template-parts/section/left_double_image_and_right_content');
				}

				if (get_row_layout() == "empty_break_space") {
					echo '<div class="generic-empty-space" style="height:'.get_sub_field("space").'px;"></div>';
				}

				endwhile;
			}
    		?>

    		</div>

    		<?php
    		if($status_sidebar == "show"){
    			get_template_part('template-parts/section/sidebar');
    		}
    		?>

    	</div>
    </div>
</section>
<?php get_footer(); ?>
<script type="text/javascript">

$(function () {
    $(".responsive-testimonials .testimonial-content").slice(0, 2).show();
    $("body").on('click touchstart', '.load-more', function (e) {
      e.preventDefault();
      $(".responsive-testimonials .testimonial-content:hidden").slice(0, 1).slideDown();
      if ($(".responsive-testimonials .testimonial-content:hidden").length == 0) {
        $(".load-more").css('visibility', 'hidden');
      }
      $('html,body').animate({
        scrollTop: $(this).offset().top
      }, 1000);
    });
});

// $('.responsive-testimonials').slick({
// 	dots: true,
// 	arrows: false,
// 	// autoplay: true,
// 	infinite: true,
// 	speed: 300,
// 	slidesToShow: 2,
// 	slidesToScroll: 1,
// 	responsive: [
// 	  {
// 	    breakpoint: 1024,
// 	    settings: {
// 	      slidesToShow: 2,
// 	      slidesToScroll: 1,
// 	      infinite: true,
// 	      dots: true
// 	    }
// 	  },
// 	  {
// 	    breakpoint: 600,
// 	    settings: {
// 	      slidesToShow: 2,
// 	      slidesToScroll: 1
// 	    }
// 	  },
// 	  {
// 	    breakpoint: 480,
// 	    settings: {
// 	      slidesToShow: 1,
// 	      slidesToScroll: 1
// 	    }
// 	  }
// 	]
// });
</script>