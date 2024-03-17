<?php
get_header();
$practices = get_terms('practice_area', array('hide_empty' => false));
$industries = get_terms('industry_group', array('hide_empty' => false));
$markets = get_terms('market_focus', array('hide_empty' => false));
$offices = get_terms('office', array('hide_empty' => false));
$titles = get_terms('title', array('hide_empty' => false));
if (have_rows("publication_header", "option")) {
    while (have_rows("publication_header", "option")) : the_row();
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
                    <h2>Articles</h2>
                    <ul>
                        <li><a href="javascript:void(0)"><?php echo $breadcrumb; ?></a></li>
                        <li class="breadcrumb-slash">/</li>
                        <li><a href="javascript:void(0)" class="active-tab">Articles</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="forms-sec-bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                
                <form id="article-form" method="post">

                    <div class="filter-forms">  
                        <div class="search-form">
                            <div class="search-form-field">
                                <input type="text" class="form-control" name="search" id="search-input" placeholder="Search for articles....">
                                <div class="search-form-bar">
                                    <a href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Find Articles</button>
                        </div>
                    </div>

                        <div class="select-dropdown">
                            <div class="select-form-dropdown">
                                <select id="practice_area" name="practice_area" class="form-control">
                                    <option value="">By Practice Area</option>
                                    <?php
                                     foreach ($practices as $practice) {
                                        echo '<option value="' . $practice->slug . '">' . $practice->name . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="select-form-dropdown">
                                <select id="industry_team" name="industry_team" class="form-control">
                                    <option value="">By Industry Group</option>
                                    <?php
                                     foreach ($industries as $industry) {
                                        echo '<option value="' . $industry->slug . '">' . $industry->name . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="select-form-dropdown">
                                <select id="market_focus" name="market_focus" class="form-control">
                                    <option value="">By Market Focus</option>
                                    <?php
                                     foreach ($markets as $market) {
                                        echo '<option value="' . $market->slug . '">' . $market->name . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="container text-center" id="article-loader">
    <img class="d-none" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/loader.gif" style="width: 60px;">   
</div>

<section class="attorneys-images-sec">
    <div class="container-fluid">
        <div class="row" id="article-results">
        </div>
        
    </div>
</section>

<?php
get_footer();
?>

<script type="text/javascript">
$(function () {
    $("#article-results .col-12").slice(0, 9).show();
    $("body").on('click touchstart', '.load-more', function (e) {
      e.preventDefault();
      $("#article-results .col-12:hidden").slice(0, 9).slideDown();
      if ($("#article-results .col-12:hidden").length == 0) {
        $(".load-more").css('visibility', 'hidden');
      }
    //   $('html,body').animate({
    //     scrollTop: $(this).offset().top
    //   }, 1000);
    });
});
</script>