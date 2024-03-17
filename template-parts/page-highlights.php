<?php

/**
 * Template Name: Highlight Page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty
 */
get_header();
if (have_rows("highlight_header_setting")) {
	while (have_rows("highlight_header_setting")) : the_row();
		$banner_img = get_sub_field("banner_image");
		$pagetitle = get_sub_field("title");
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
            <h2><?php echo get_the_title(); ?></h2>
            <ul>
                <li><a href="javascript:void(0)"><?php echo $pagetitle; ?></a></li>
                <li class="breadcrumb-slash">/</li>
                <li><a href="javascript:void(0)" class="active-tab"><?php echo get_the_title(); ?></a></li>
            </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
if (have_rows("highlight_section")) {
?>
<section class="year-end-sec">
    <div class="container">
    <?php
    while (have_rows("highlight_section")) : the_row();
    if (get_row_layout() == "2_column_content") {
    ?>
    <div class="row attorney-row <?php if(empty( get_sub_field("separator") )){ echo "new-attr-row"; } ?>">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="anderson-kl-content">
                <?php 
                if(!empty(get_sub_field("heading"))){ echo "<h4>".get_sub_field("heading")."</h4>"; }
                if(!empty(get_sub_field("content"))){ echo "<p>".get_sub_field("content")."</p>"; } 
                ?>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="anderson-kill-list">
                <ul>
                <?php
                while (have_rows("lists")) : the_row();
                	echo "<li>".get_sub_field("add")."</li>";
                endwhile;
                ?>
                </ul>
            </div>
        </div>
    </div> 
    <?php	
    }
    if (get_row_layout() == "highlight_heading") {
		if(!empty(get_sub_field("heading"))){
    ?>
		<h4 class="health-heading"><?php echo get_sub_field("heading"); ?></h4>
    <?php
		}
    }
    if (get_row_layout() == "address_detail") {
    ?>
    <div class="address-content">
        <?php if(!empty(get_sub_field("heading"))){ ?><h6><?php echo get_sub_field("heading"); ?></h6><?php } ?>
        <ul>
            <li><a href="mailto:wpassannante@andersonkill.com">wpassannante@andersonkill.com</a></li>
            <li><a href="tel:(212) 278-1328">(212) 278-1328</a></li>
        </ul>
    </div>
    <?php
	}
    if (get_row_layout() == "heading_with_content") {
    ?>
    <div class="ad-kl-content">
	    <?php 
	    if(!empty(get_sub_field("heading"))){ ?><h4><?php echo get_sub_field("heading"); ?></h4><?php }
	    echo get_sub_field("content");
	    ?>
    </div>
    <?php
    }	
    endwhile;
    ?>
    </div>
</section>
<?php
}

get_footer(); ?>