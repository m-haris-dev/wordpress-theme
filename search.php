<?php
/**
 *
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty
 */
get_header();
$current_page_url = home_url($wp->request);
$search_s = isset($_GET['s']) ? $_GET['s'] : '';
if (have_rows("news_header", "option")) {
    while (have_rows("news_header", "option")) : the_row();
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
            <h2>Search</h2>
            <ul>
                <li><a href="javascript:void(0)"><?php echo $breadcrumb; ?></a></li>
                <li class="breadcrumb-slash">/</li>
                <li><a href="javascript:void(0)" class="active-tab"><?php echo $search_s; ?></a></li>
            </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="set-bg-5">
    <div class="container-fluid">
        <div class="row section-5-responsive-1 section-5-row-1">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form role="search" method="get" action="<?php echo get_home_url(); ?>" class="wp-block-search__button-outside wp-block-search__text-button wp-block-search">
                    <label for="wp-block-search__input-1" class="wp-block-search__label">Search</label>
                    <div class="wp-block-search__inside-wrapper ">
                        <input type="search" id="wp-block-search__input-1" class="wp-block-search__input wp-block-search__input" name="s" value="<?php echo $search_s; ?>" placeholder="" required="">
                        <button type="submit" class="wp-block-search__button wp-element-button">Search</button>
                    </div>
                </form>
            </div>
        <?php
        $args = array(
            's' => $search_s,
            'posts_per_page' => -1,
        );

            $services = new WP_Query($args);

            if ($services->have_posts()){
                while ($services->have_posts()) {
                $services->the_post(); 
                $services_Id = get_the_ID();
        ?>  
            <div class="col-lg-4 col-md-4 col-sm-12
                col-12">
                <div class="tap-slider-set-1">
                    <h4><?php echo get_the_title(); ?></h4>
                    <p><?php echo get_the_excerpt(); ?></p>
                    <a href="<?php echo get_permalink(); ?>">READ MORE</a>
                </div>
            </div>
        <?php
                wp_reset_postdata();
                }
            }
            else{
                echo "We could not find any results for your search. You can give it another try through the search form below.";
            }
        ?>    
        </div>
    </div>
</section>

<?php
get_footer();
?>