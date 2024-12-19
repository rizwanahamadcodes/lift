</main>
        <footer>
          <section id="featuredWrap" class="detailFeature testimonial" style="background-image: url(<?php bloginfo('template_url'); ?>/images/fo_bg.jpg)">
            <div class="container">
              <div class="row tripflex">
                <div class="col-sm-12">
                  <div class="testiHeading">
                    <h1>TESTIMONIALS</h1>
                    <h4>Our customers say</h4>
                  </div>
                </div>
                <div class="col-sm-12 " style="
    margin-left: 1rem;
">
                  <div class="swiper-container slider3">
                    <div class="swiper-wrapper">

                      <!-- testimonial loop -->
                      <?php
                      $testimonialArgs = array(
                        'post_type' => 'testimonials',
                        'posts_per_page' => -1,
                        'orderBy' => 'date',
                        'order' => 'desc'
                      );

                      $testimonialPosts = new WP_Query($testimonialArgs);
                      while ($testimonialPosts->have_posts()) {
                        $testimonialPosts->the_post();
                        $testimonialClientLink = '#';
                        $testimonialClientName = '';
                        $testimonialClientCompany = '';
                        $testimonialClientImages = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');

                        $testimonialClientImage = is_array($testimonialClientImages) ? $testimonialClientImages[0] : '';

                        $testimonialMeta = get_post_meta(get_the_ID(), '_testimonial', true);
                        if (is_array($testimonialMeta)) {
                          if (array_key_exists('client_name', $testimonialMeta)) $testimonialClientName = $testimonialMeta['client_name'];
                          if (array_key_exists('source', $testimonialMeta)) $testimonialClientCompany = $testimonialMeta['source'];
                          if (array_key_exists('link', $testimonialMeta)) $testimonialClientLink = $testimonialMeta['link'];
                        }
                      ?>

                        <div class="swiper-slide">
                          <a href="<?= the_permalink() ?>">
                            <div class="testi clearfix">
                              <div class="testiMessage">
                                <?php echo wp_trim_words(get_the_content(), 45, '...[Read More]'); ?>
                              </div>
                              <div class="testi_client">
                                <span class="client_name">
                                  <div class="clientImg">
                                    <img src="<?= $testimonialClientImage ?>" class="img-fluid" alt="image" />
                                  </div>
                                  <div class="client_nameBox">
                                <h4><?php the_field('clients_name');?></h4>
                                  <h6><?php the_field('mountains');?></h6>
                                     <?php
	$rating = get_field( 'rating' );

	if ( $rating ) {
		$average_stars = round( $rating * 2 ) / 2;
	
		$drawn = 5;

		echo '<div class="star-rating">';
		
		// full stars.
		for ( $i = 0; $i < floor( $average_stars ); $i++ ) {
			$drawn--;
			echo '<svg aria-hidden="true" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"/></svg>';
		}

		// half stars.
		if ( $rating - floor( $average_stars ) === 0.5 ) {
			$drawn--;
			echo '<svg aria-hidden="true" data-prefix="fas" data-icon="star-half-alt" class="svg-inline--fa fa-star-half-alt fa-w-17" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 536 512"><path fill="currentColor" d="M508.55 171.51L362.18 150.2 296.77 17.81C290.89 5.98 279.42 0 267.95 0c-11.4 0-22.79 5.9-28.69 17.81l-65.43 132.38-146.38 21.29c-26.25 3.8-36.77 36.09-17.74 54.59l105.89 103-25.06 145.48C86.98 495.33 103.57 512 122.15 512c4.93 0 10-1.17 14.87-3.75l130.95-68.68 130.94 68.7c4.86 2.55 9.92 3.71 14.83 3.71 18.6 0 35.22-16.61 31.66-37.4l-25.03-145.49 105.91-102.98c19.04-18.5 8.52-50.8-17.73-54.6zm-121.74 123.2l-18.12 17.62 4.28 24.88 19.52 113.45-102.13-53.59-22.38-11.74.03-317.19 51.03 103.29 11.18 22.63 25.01 3.64 114.23 16.63-82.65 80.38z"/></svg>';
		}

		// empty stars.
		for ( $i = 0; $i < $drawn; $i++ ) {
			echo '<svg aria-hidden="true" data-prefix="far" data-icon="star" class="svg-inline--fa fa-star fa-w-18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M528.1 171.5L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6zM388.6 312.3l23.7 138.4L288 385.4l-124.3 65.3 23.7-138.4-100.6-98 139-20.2 62.2-126 62.2 126 139 20.2-100.6 98z"/></svg>';
		}

		echo '</div>';
	}
?>
                                  </div>
                                </span>
                              </div>
                            </div>
                          </a>
                        </div>

                      <?php
                      }
                      ?>

                    </div>
                    <div class="swiper-button-next swiper-button-white"></div>
                    <div class="swiper-button-prev swiper-button-white"></div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          
          <section id="tripfooterWrap">
            <div class="container">
              <div class="row tripfooter">
                <div class="col-sm-12">
                  <div class="row foot_main mainLineRow">
                    <div class="col-md-4 col-sm-4 clearfix quick mainLine">
                      <h3>Contact Us</h3>
                      <div class="foot_contact clearfix">
                        <?php $the_query = new WP_Query('page_id=35'); ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>


                          <?php
                          if (have_rows('contacts')) :

                            while (have_rows('contacts')) : the_row();
                          ?>
                              <div class="cont_cov">
                                <ul>
                                  <li><i class="fas fa-map-marker-alt"></i> <?php echo get_sub_field('pox_box'); ?> <?php echo get_sub_field('address_1'); ?> </li>
                                  <li> <a href="tel:<?php echo get_sub_field('phone'); ?>"><i class="fas fa-phone"></i> <?php echo get_sub_field('phone'); ?></li></a>
                                  <!-- <li> <a href="tel:+30 6971634917"><i class="fas fa-phone"></i> +30 6971634917</li></a> -->
                                  <li> <a href="mailto:<?php echo get_sub_field('emails'); ?>"><i class="fas fa-envelope"></i> <?php echo get_sub_field('emails'); ?></a> </li>
                                </ul>
                              </div>
                              <?php break;  ?>
                            <?php endwhile; ?>
                          <?php endif; ?>

                        <?php endwhile; ?>
                      </div>
                      <!-- Euro -->

                    </div>
                    <div class="col-md-4 col-sm-4 foot_logo mainLine">
                         <h3>Terms and Conditions</h3>
                       <?php
                      wp_nav_menu(array(
                        'menu'           => 'Bottom', // Do not fall back to first non-empty menu.
                        'theme_location' => 'footer',
                        'fallback_cb'    => false, // Do not fall back to wp_page_menu()
                        'container' => false,
                        'items_wrap' => '<ul>%3$s</ul>'
                      ));
                      ?>
                      <!--<p class="company-slogan">Pure Alpine Style Expeditions</p>-->
                    </div>
                    <div class="col-md-4 col-sm-4 clearfix quick mainLine" style="
    margin-left: 1rem;
">
                      <h3>QUICK LINKS</h3>
                      <?php
                      wp_nav_menu(array(
                        'menu'           => 'Main Menu', // Do not fall back to first non-empty menu.
                        'theme_location' => 'primary',
                        'fallback_cb'    => false, // Do not fall back to wp_page_menu()
                        'container' => false,
                        'items_wrap' => '<ul>%3$s</ul>'
                      ));
                      ?>

                    </div>
                  </div>
                </div>

                
                <div class="col-md-12 col-sm-12 foot_main subBox">
                  <!-- Begin Mailchimp Signup Form -->
                  <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
                  <style type="text/css">
                    #mc_embed_signup {
                      background: #fff;
                      clear: left;
                      font: 14px Helvetica, Arial, sans-serif;
                    }

                    /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
                  </style>
                  <h2 class="text-center">In Association</h2>

<style>
* {
  box-sizing: border-box;
}

.custom-row {
  display: flex;
  flex-wrap: wrap;
  justify-content: center; /* Center-align the columns */
}

.custom-column {
  flex: 0 0 16.66%; /* Set width to 16.66% for 6 columns in a row */
  padding: 5px;
  text-align: center; /* Center-align the image within the column */
}

/* Clearfix (clear floats) */
.custom-row::after {
  content: "";
  clear: both;
  display: table;
}
</style>

<div class="custom-row">
  <?php
  // Replace 'client_gallery' with the actual name of your ACF gallery field.
  $images = get_field('client_gallery','7');
  
  if ($images) {
    // Limit to the first 6 images to display in the row.
    $images = array_slice($images, 0, 6);
    
    foreach ($images as $image) {
      $image_url = $image['url'];
      $image_alt = $image['alt'];
      ?>
      <div class="custom-column">
        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" style="max-width:100px; max-height:100px; margin: 0 auto;">
      </div>
      <?php
    }
  }
  ?>
</div>
<div class="divider"></div>
<style>
    .divider {
  height: 1px; /* Adjust the height of the divider as needed */
  background-color: #ccc; /* Color of the divider line */
  margin: 50px 400px 50px 400px; /* Adjust the margin to control the space around the divider */
}

@media screen and (max-width: 600px) {
    .divider{
        margin: 20px;
    }
}
</style>

                  
                </div>
              </div>
            </div>
            <div class="clearfix social">
              <?php $the_query = new WP_Query('page_id=35'); ?>
              <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <div class="socialIcons">
                  
                  <a href="<?php the_field('instagram'); ?>"><i class="fab fa-instagram"></i></a>
                  <a href="<?php the_field('facebook'); ?>"><i class="fab fa-facebook-f"></i></a>
                  <a href="<?php the_field('youtube'); ?>"><i class="fab fa-youtube"></i></a>
                </div>
              <?php endwhile; ?>
              <div class="foot_line"></div>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-sm-12 reserved">
                  <p>©
                    <?php
                    $year = date("Y");

                    // Display the year
                    echo $year;

                    ?> Treks</p>
                </div>
              </div>
            </div>
          </section>
        </footer>
        </div>
        </div>
        <div class="overlay"></div>
        <?php wp_footer(); ?>
        <script>
          var swiper = new Swiper(".slider3", {
            slidesPerView: 2,
            spaceBetween: 30,
            paginationClickable: true,
            lazyLoading: true,
            nextButton: ".swiper-button-next",
            prevButton: ".swiper-button-prev",
            breakpoints: {
              // when window width is >= 320px
              320: {
                slidesPerView: 1,
                spaceBetween: 20,
              },
              // when window width is >= 480px
              480: {
                slidesPerView: 1,
                spaceBetween: 30,
              },
              // when window width is >= 640px
              640: {
                slidesPerView: 1,
                spaceBetween: 40,
              },
              1024: {
                slidesPerView: 2,
                spaceBetween: 40,
              },
            },
          });
        </script>

        </body>

        </html>