<div class="main-bg">
  <footer>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <?php
        if (have_rows("newsletter", "option")) {
          while (have_rows("newsletter", "option")) : the_row();
          if(!empty( get_sub_field("heading") )){
        ?>  
          <div class="footer-box-bg">
            <div class="footer-box-content">
              <h4><?php echo get_sub_field("heading"); ?></h4>
              <p><?php echo get_sub_field("content"); ?></p>
            </div>
            <div class="subscription-box">
                <?php 
                // echo do_shortcode('[contact-form-7 id="51" title="Newsletter"]'); 
                ?>
                <div class="footer-subscription">
                  <a href="<?php echo get_permalink(726); ?>" class="rd-more-btn"><span>Subscribe</span> <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.png" class="ad-img"></a>  
                </div>
            </div>
          </div>
        <?php
          }
          endwhile;
        }
        ?>
          <div class="social-icon-box">
          <?php
          if (have_rows("quick_links", "option")) {
          ?>
            <div class="quick-links">
              <ul>
                <?php
                  while (have_rows("quick_links", "option")) : the_row();
                  $quick_links = get_sub_field('links', 'option');
                  
                  if($quick_links) {
                    $link_url = isset($quick_links['url']) && $quick_links['url'] ? $quick_links['url'] : '';
                    $link_title = isset($quick_links['title']) && $quick_links['title'] ? $quick_links['title'] : '';
                    $link_target = isset($quick_links['target']) && $quick_links['target'] ? $quick_links['target'] : '_self';
                  ?>
                    <li>
                      <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                        <?php echo esc_html($link_title); ?>
                      </a>
                    </li>
                  <?php
                  }
                  endwhile;
                ?>
              </ul>
            </div>
          <?php
          }
          ?>
            <div class="divide-line"></div>
            <?php
              if (have_rows('social_media', 'option')) {
              ?>
              <div class="social-icons">
                <ul class="footer-social-icons">
                  <?php
                  while (have_rows('social_media', 'option')) : the_row();
                  ?>
                    <li><a href="<?php the_sub_field('social_link', 'option'); ?>" target="_blank"><i class="fa <?php the_sub_field('social_profile', 'option'); ?>" aria-hidden="true"></i></a></li>
                  <?php
                  endwhile;
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
  </footer>
  <?php
  if (have_rows("copyright_section", "option")) {
    while (have_rows("copyright_section", "option")) : the_row();
  ?>
  <section class="copy-right-sec">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
          <?php if(!empty( get_sub_field("logo") )){
          ?>
          <a href="javascript:void(0)"><img src="<?php echo get_sub_field("logo"); ?>" alt="image" class="img-fluid"></a>
          <?php  
          }?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12"> 
          <p><?php echo get_sub_field("content"); ?></p>
        </div>
      </div>
    </div>
  </section>
  <?php
    endwhile;
  }
  ?>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
  /*MENUBAR SCRIPT BEGIN*/
  const navbarMenu = document.getElementById("menu");
  const burgerMenu = document.getElementById("burger");
  const headerMenu = document.getElementById("header");
  const overlayMenu = document.querySelector(".overlay");
  if (burgerMenu && navbarMenu) {
     burgerMenu.addEventListener("click", () => {
        burgerMenu.classList.toggle("is-active");
        navbarMenu.classList.toggle("is-active");
     });
  }
  window.addEventListener("resize", () => {
     if (window.innerWidth >= 992) {
        if (navbarMenu.classList.contains("is-active")) {
           navbarMenu.classList.remove("is-active");
           overlayMenu.classList.remove("is-active");
        }
     }
  });
/*MENUBAR SCRIPT END*/
        /*DROPDOWN SCRIPT BEGIN*/
        function handleDropdown(dropdown) {
        const links = dropdown.querySelectorAll('.dropdown-list a');
        const span = dropdown.querySelector('span');
        const subDropdown = document.querySelectorAll(".sub-dropdown-list")
        dropdown.addEventListener('mouseenter', function () {
          this.classList.add('is-active');
        });
        dropdown.addEventListener('mouseleave', function () {
          this.classList.remove('is-active');
          subDropdown.forEach((subdropdowns)=>{
            subdropdowns.classList.remove("is-active");
          })
        });
        links.forEach((element) => {
        element.addEventListener('click', function (evt) {
        evt.preventDefault(); 
        const link = evt.currentTarget.getAttribute('href');
        if (link) {
          window.location.href = link;
        }
            });
          });
        }

        // SUBDROPDOWN SCRIPT
        const parentAnchors = document.querySelectorAll('.menu-item');
          parentAnchors.forEach((parent) => {
            const subDropdown = parent.querySelector('.sub-dropdown-list');
            const diffbg = parent.querySelector(".diff-bg");

            diffbg && diffbg.addEventListener('mouseenter', function () {
              subDropdown.classList.add('is-active');
            });
          });
        // SUBDROPDOWN SCRIPT


        const dropdownWrappers = document.querySelectorAll('.dropdown-wrapper');
        dropdownWrappers.forEach((dd) => {
          handleDropdown(dd);
        });
        /*DROPDOWN SCRIPT END*/
</script> 
<?php wp_footer(); ?>
</body>
</html>    