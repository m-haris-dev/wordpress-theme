<?php
get_header();
if (have_rows("news_header", "option")) {
  while (have_rows("news_header", "option")) : the_row();
    $banner_img = get_sub_field("banner_image");
    $breadcrumb = get_sub_field("breadcrumb");
  endwhile;
}
$practice_areas = get_the_terms(get_the_ID(), 'practice_area');
$industry_teams = get_the_terms(get_the_ID(), 'industry_team');
$market_focuses = get_the_terms(get_the_ID(), 'market_focus');   
?>
<section class="attorneys-banner-bg">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-12 bg-attorney-img">
        <img src="<?php echo $banner_img; ?>" alt="image" class="img-fluid">
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="attorneys-heading">
            <h2>News</h2>
            <ul>
                <li><a href="javascript:void(0)"><?php echo $breadcrumb; ?></a></li>
                <li class="breadcrumb-slash">/</li>
                <li><a href="javascript:void(0)" class="active-tab">News</a></li>
            </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="profile-tabs-sec news3-inner-pg">
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="back-opt">
                <a href="<?php echo get_site_url(); ?>/news/"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/left-back-arrow.jpg" alt="image" class="img-fluid">Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-12">
            <div class="publication-sec-content">
                <div class="publication-inner-text">
                  <h4 class="page-heading"><?php echo get_the_title(); ?></h4>
                  <p><?php echo get_field("news_sub_title"); ?></p>
                    <div class="flex-assign-para">
                        <ul>
                            <li><?php echo get_the_date(); ?></li>
                        </ul>
                    </div>
                  <div class="tech-content">
                    <?php echo wpautop( get_the_content() ); ?>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
            <?php
            $attorney_ids = get_field("related_people");
            $args = array(
            'post_type'      => 'attorney',
            'post__in' => $attorney_ids,
            'orderby'   => array(
                'date' =>'DESC',)
            );
            $people = new WP_Query($args);
            if (!empty( $attorney_ids )) {
            ?>
            <div class="right-side-col">
                <h5>Related People</h5>
                <?php
                  while ($people->have_posts()) {
                  $people->the_post();
                  ?>
                  <div class="pra-div-flex">
                    <div class="pra-div-img">
                      <?php if(!empty( get_the_post_thumbnail_url($people->ID) )){ ?>
                        <img src="<?php echo get_the_post_thumbnail_url($people->ID); ?>" alt="image" class="img-fluid">
                      <?php } ?>
                    </div>
                    <div class="pra-div-content">
                        <h6><?php echo get_the_title($people->ID).' '.get_field('title_suffix', $people->ID); ?></h6>
                        <a href="<?php echo get_the_permalink($people->ID); ?>">View More<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.jpg" alt="image" class="img-fluid"></a>
                    </div>
                  </div>
                  <?php
                  }
                  wp_reset_postdata(); 
                ?>                
            </div>
          <?php } 

        if (!empty($practice_areas)) {
          ?>
          <div class="right-side-col">
          <h5>Related Practice Areas</h5>
          <ul>
          <?php
            foreach ($practice_areas as $practice_area) {
                $practice_area_post = get_page_by_title($practice_area->name, OBJECT, 'practice-area');
                if ($practice_area_post) {
                    echo '<a href="'.get_permalink($practice_area_post->ID).'"> <li>'.$practice_area_post->post_title.'</li> </a>';
                }
            }
            ?>
          </ul>
          </div>
            <?php
        }

        if (!empty($industry_teams)) {
          ?>
          <div class="right-side-col">
          <h5>Related Industry Team</h5>
          <ul>
          <?php
            foreach ($industry_teams as $industry_team) {
                $industry_team_post = get_page_by_title($industry_team->name, OBJECT, 'industry-team');

                if ($industry_team_post) {
                    echo '<a href="'.get_permalink($industry_team_post->ID).'"> <li>'.$industry_team_post->post_title.'</li> </a>';
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
          <h5>Related Market Focused Groups</h5>
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