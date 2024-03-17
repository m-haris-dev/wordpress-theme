<?php
if(!empty( get_sub_field("no_of_testimonials") )){
  $test_nos = get_sub_field("no_of_testimonials");
}
else{
  $test_nos = -1;
}
?>
<section class="testimonial-sec-bg">
  <!-- <div class="container-fluid"> -->
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="testimonials-slider">
          <div class="slider responsive-testimonials">
          <?php
          $args = array(
            'post_type'      => 'testimonial',
            'posts_per_page' => $test_nos,
            'orderby'   => array(
                'date' =>'DESC',)
          );
          $testimonial = new WP_Query($args);
          if ($testimonial->have_posts()) {
            while ($testimonial->have_posts()) {
            $testimonial->the_post();
            ?>
            <div class="testimonial-content">
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

      <div class="load-more-btn">
        <a href="javascript:void(0)" class="load-more"><span>Load More</span> <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.png" alt="image" class="img-fluid"></a>
      </div>

    </div>
    
  <!-- </div> -->
</section>