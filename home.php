<?php

/**

 *

 *

 * @package WordPress

 * @subpackage Twenty_Twenty

 * @since Twenty Twenty

 */

get_header();

$practices = get_terms('practice_area', array('hide_empty' => false));

$industries = get_terms('industry_group', array('hide_empty' => false));

$markets = get_terms('market_focus', array('hide_empty' => false));

$offices = get_terms('office', array('hide_empty' => false));

$news_types = get_terms('category', array('hide_empty' => false));

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

            <h2>News</h2>

            <ul>

                <li><a href="javascript:void(0)"><?php echo $breadcrumb; ?></a></li>

                <li>/</li>

                <li><a href="javascript:void(0)" class="active-tab">News</a></li>

            </ul>

        </div>

      </div>

    </div>

  </div>

</section>



<section class="forms-sec-bg news-search-forms">

    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                <div class="filter-forms">

            	

            	<form id="news-form" method="post">



                    <div class="filter-forms">	

                        <div class="search-form">

                            <div class="search-form-field">

                                <input type="text" class="form-control" name="search" id="search-input" placeholder="Search for News">

                                <div class="search-form-bar">

                                    <a href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i>

                                    </a>

                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary">Search</button>

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

                        

                    <div class="select-dropdown">

                        <div class="select-form-dropdown">

                            <select id="office" name="office" class="form-control">

                                <option value="">By Office</option>

                                <?php

                                 foreach ($offices as $office) {

							        echo '<option value="' . $office->slug . '">' . $office->name . '</option>';

							    }

                                ?>

                            </select>

                        </div>

                        <div class="select-form-dropdown">

                            <select id="news_types" name="news_types" class="form-control">

                                <option value="">By News Type</option>

                                <?php

                                 foreach ($news_types as $news_type) {

							        echo '<option value="' . $news_type->slug . '">' . $news_type->name . '</option>';

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



<div class="container text-center" id="news-loader">

	<img class="d-none" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/loader.gif" style="width: 60px;">	

</div>



<section class="profile-tabs-sec news-pg-sec">

    <div class="container-fluid">

		<div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-12">

            	<div class="row" id="news-results">



            	</div>

        	</div>



    	</div>

    </div>

</section>

<?php

get_footer();

?>

<script type="text/javascript">

$(function () {

    $("#news-results .col-12").slice(0, 9).show();

    $("body").on('click touchstart', '.load-more', function (e) {

      e.preventDefault();

      $("#news-results .col-12:hidden").slice(0, 9).slideDown();

      if ($("#news-results .col-12:hidden").length == 0) {

        $(".load-more").css('visibility', 'hidden');

      }

    //   $('html,body').animate({

    //     scrollTop: $(this).offset().top

    //   }, 1000);

    });

});

</script>