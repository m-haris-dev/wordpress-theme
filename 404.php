<?php
/**
 *
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty
 */
get_header();
?>
<section class="attorneys-banner-bg">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-12 bg-attorney-img">
        <img src="<?php echo get_stylesheet_directory_uri().'/assets/images/attorneys-banner.jpg'; ?>" alt="image" class="img-fluid">
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="attorneys-heading">
            <h2>Oops! Page Not Found</h2>
            <p>It seems we can’t find what you’re looking for.</p>
            <div class="banner-rt-btn tier-div">
              <a href="<?php echo esc_url(get_site_url()); ?>"><span><?php echo esc_html("Bring me back home"); ?></span> <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.png" class="ad-img"></a>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>