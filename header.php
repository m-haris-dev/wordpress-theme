<?php

/**
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php
    if ( is_front_page() ){
      bloginfo('title')?> - <?php bloginfo('description'); 
    }
    elseif ( get_post_type( get_the_ID() ) == 'attorney' ) {
      echo wp_title().' '.get_field('title_suffix', get_the_ID());
    }
    else{
      wp_title();
    }
    ?> 
  </title>
  <?php
  if (have_rows("global_color_scheme", "option")) {
    while (have_rows("global_color_scheme", "option")) : the_row();
      $primary_color = get_sub_field("primary_color");
      $secondary_color = get_sub_field("secondary_color");
      $color_1 = get_sub_field("color_1");
      $color_2 = get_sub_field("color_2");
      $color_3 = get_sub_field("color_3");
    endwhile;
  }
  ?>
  <style>
    :root { --main-primary-color: <?php echo $primary_color; ?>; --main-secondary-color: <?php echo $secondary_color; ?>; --color-one: <?php echo $color_1; ?>; --color-two: <?php echo $color_2; ?>; --color-three: <?php echo $color_3; ?>; }
  </style>
  <link rel="icon" type="image/x-icon" href="images/fav-icon.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="header" id="header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="header-inner">
          <nav class="navbar container">
            <div class="burger" id="burger">
              <span class="burger-line"></span>
              <span class="burger-line"></span>
              <span class="burger-line"></span>
            </div>
            <div class="menu" id="menu">
              <ul class="menu-inner">
              <?php
              $array_menu = wp_get_nav_menu_items('left menu');
              $main_menu = buildTree($array_menu);
              if (!empty($main_menu)){
              ?>
                  <?php
                  foreach ($main_menu as $index => $item){
                  ?>
                      <li class="menu-item mobile-dropdown-hide">
                          <?php
                          $submenu_items = $item->wpse_children;
                          ?>
                          <a href="<?php echo $item->url; ?>" class="menu-link">
                            <div id="dropdown-wrapper" class="dropdown-wrapper" tabindex="1">
                              <span><?php echo $item->title; ?></span>
                          <?php
                          if (!empty($submenu_items)) {
                          ?>
                              <ul class="dropdown-list">
                                  <?php
                                  foreach ($submenu_items as $sub_menu_item) {
                                    if ($sub_menu_item->menu_item_parent == $item->ID) {
                                      $sub_inner_menu = $sub_menu_item->wpse_children;
                                ?>    
                                      <li class="<?php if (!empty($sub_inner_menu)) { echo "diff-bg"; } ?>">
                                        <a href="<?php echo $sub_menu_item->url; ?>"><?php echo $sub_menu_item->title; ?></a>
                                        <?php
                                        if (!empty($sub_inner_menu)) {
                                      ?>
                                      <ul class="sub-dropdown-list sublist-1">
                                      <?php
                                      foreach ($sub_inner_menu as $sub_inner_menu_item) {
                                        if ($sub_inner_menu_item->menu_item_parent == $sub_menu_item->ID) {
                                        ?>
                                        <li>
                                          <a href="<?php echo $sub_inner_menu_item->url; ?>"><?php echo $sub_inner_menu_item->title; ?></a>
                                        </li>
                                        <?php
                                        }
                                      }
                                      ?>
                                      </ul>
                                      <?php
                                      }
                                        ?>
                                      </li>
                                <?php
                                      
                                    }
                                  }
                                  ?>
                              </ul>
                          <?php
                          }
                          ?>
                            </div>
                          </a>
                      </li>
                  <?php
                  }
                  ?>
              <?php
              }

              if (!empty($main_menu)){
              ?>
                  <?php
                  foreach ($main_menu as $index => $item){
                  ?>
                      <li class="menu-item mobile-dropdown">
                          <?php
                          $submenu_items = $item->wpse_children;
                          ?>
                          <p>
                            <a class="btn btn-primary mobilewal-2" <?php if(empty($submenu_items)){ ?> href="<?php echo $item->url; ?>" <?php } elseif($item->url != "#"){ ?> href="<?php echo $item->url; ?>" <?php } ?>>
                              <?php echo $item->title; ?>
                            </a>
                            <?php if (!empty($submenu_items)) {?>
                            <a  data-toggle="collapse" href="#collapseExample<?php echo $index;?>" role="button" aria-expanded="false" aria-controls="collapseExample<?php echo $index;?>" >
                              <i class="fa fa-caret-square-o-down"></i>
                            </a>
                            <?php } ?>
                          </p>
                          <?php
                          if (!empty($submenu_items)) {
                          ?>  
                          <div class="collapse" id="collapseExample<?php echo $index;?>">
                            <div class="card card-body">
                              <ul class="mobile-dropdown-accordian">
                                  <?php
                                  foreach ($submenu_items as $sub_menu_item) {
                                      if ($sub_menu_item->menu_item_parent == $item->ID) {
                                      $sub_inner_menu = $sub_menu_item->wpse_children;
                                  ?>    
                                        <li>
                                          <a <?php if (!empty($sub_inner_menu)) {?> class="btn btn-primary" href="#inner-menu-<?php echo $item->ID; ?>" role="button" aria-expanded="false" aria-controls="inner-menu-<?php echo $item->ID; ?>" data-toggle="collapse" <?php } else{?> href="<?php echo $sub_menu_item->url; ?>" <?php } ?> ><?php echo $sub_menu_item->title; ?></a>
                                        </li>
                                  <?php
                                        if (!empty($sub_inner_menu)) {
                                        ?>
                                        <div class="collapse sub-collapse" id="inner-menu-<?php echo $item->ID; ?>">
                                          <div class="card card-body">
                                            <ul>
                                        <?php
                                        foreach ($sub_inner_menu as $sub_inner_menu_item) {
                                          if ($sub_inner_menu_item->menu_item_parent == $sub_menu_item->ID) {
                                          ?>
                                          <li>
                                            <a href="<?php echo $sub_inner_menu_item->url; ?>"><?php echo $sub_inner_menu_item->title; ?></a>
                                          </li>
                                          <?php
                                          }
                                        }
                                        ?>
                                            </ul>
                                          </div>
                                        </div>
                                        <?php
                                        }
                                      }
                                  }
                                  ?>
                              </ul>
                            </div>
                          </div>
                          <?php
                          }
                          ?>
                      </li>
                  <?php
                  }
                  ?>
              <?php
              }

              $array_menu2 = wp_get_nav_menu_items('right menu');
              $main_menu2 = buildTree($array_menu2);

              if (!empty($main_menu2)){
              ?>
                  <?php
                  foreach ($main_menu2 as $index => $item){
                  ?>
                      <li class="menu-item mobile-dropdown">
                          <?php
                          $submenu_items = $item->wpse_children;
                          ?>
                          <p>
                            <a class="btn btn-primary mobilewal-2" <?php if(empty($submenu_items)){ ?> href="<?php echo $item->url; ?>" <?php } elseif($item->url != "#"){ ?> href="<?php echo $item->url; ?>" <?php } ?>>
                              <?php echo $item->title; ?>
                            </a>
                            <?php if (!empty($submenu_items)) {?>
                            <a  data-toggle="collapse" href="#collapseExample<?php echo $index;?>" role="button" aria-expanded="false" aria-controls="collapseExample<?php echo $index;?>" >
                              <i class="fa fa-caret-square-o-down"></i>
                            </a>
                            <?php } ?>
                          </p>
                          <?php
                          if (!empty($submenu_items)) {
                          ?>  
                          <div class="collapse" id="collapseExample<?php echo $index;?>">
                            <div class="card card-body">
                              <ul class="mobile-dropdown-accordian">
                                  <?php
                                  foreach ($submenu_items as $sub_menu_item) {
                                      if ($sub_menu_item->menu_item_parent == $item->ID) {
                                  ?>    
                                        <li>
                                          <a href="<?php echo $sub_menu_item->url; ?>"><?php echo $sub_menu_item->title; ?></a>
                                        </li>
                                  <?php
                                      }
                                  }
                                  ?>
                              </ul>
                            </div>
                          </div>
                          <?php
                          }
                          ?>
                      </li>
                  <?php
                  }
                  ?>
              <?php
              }
              
              ?>   

              </ul>
            </div>
            <?php
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            if(!empty($image[0])){
            ?>
              <a href="<?php echo get_site_url(); ?>" class="brand"><img src="<?php echo $image[0]; ?>" alt="images" class="img-fluid"/></a>
            <?php
            }
            ?>
            <div class="menu">
              <ul class="menu-inner">
              <?php
              $array_menu = wp_get_nav_menu_items('right menu');
              $main_menu = buildTree($array_menu);
              if (!empty($main_menu)){
              ?>
                  <?php
                  foreach ($main_menu as $index => $item){
                  ?>
                      <li class="menu-item mobile-dropdown-hide">
                          <?php
                          $submenu_items = $item->wpse_children;
                          $custom_classes = $item->classes;
                          ?>
                          <a href="<?php echo $item->url; ?>" class="menu-link <?php if (isset($custom_classes[0])) {
                              $first_class = $custom_classes[0];
                              echo $first_class;}?>">
                            <div id="dropdown-wrapper" class="dropdown-wrapper" tabindex="1">
                              <span><?php echo $item->title; ?></span>
                          <?php
                          if (!empty($submenu_items)) {
                          ?>
                              <ul class="dropdown-list">
                                  <?php
                                  foreach ($submenu_items as $sub_menu_item) {
                                      if ($sub_menu_item->menu_item_parent == $item->ID) {
                                  ?>    
                                        <li>
                                          <a href="<?php echo $sub_menu_item->url; ?>"><?php echo $sub_menu_item->title; ?></a>
                                        </li>
                                  <?php
                                      }
                                  }
                                  ?>
                              </ul>
                          <?php
                          }
                          ?>
                            </div>
                          </a>
                      </li>
                  <?php
                  }
                  ?>
              <?php
              }
              ?>
            </ul>
          </div>

          </nav>
        </div>
      </div>
    </div>
  </div>
</header>
