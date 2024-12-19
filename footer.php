</main>
<footer>
  <section id="featuredWrap" class="detailFeature testimonial"
    style="background-image: url(<?php bloginfo('template_url'); ?>/images/fo_bg.jpg)">
    <div class="container">
      <div class="row tripflex">
        <div class="col-sm-12">
          <div class="testiHeading">
            <h1>TESTIMONIALS</h1>
            <h4>Our customers say</h4>
          </div>
        </div>
        <div class="col-sm-12 " style="margin-left: 1rem;">
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
                  if (array_key_exists('client_name', $testimonialMeta))
                    $testimonialClientName = $testimonialMeta['client_name'];
                  if (array_key_exists('source', $testimonialMeta))
                    $testimonialClientCompany = $testimonialMeta['source'];
                  if (array_key_exists('link', $testimonialMeta))
                    $testimonialClientLink = $testimonialMeta['link'];
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
                            <h4><?php the_field('clients_name'); ?></h4>
                            <h6><?php the_field('mountains'); ?></h6>
                            <?php
                            $rating = get_field('rating');

                            if ($rating) {
                              $average_stars = round($rating * 2) / 2;

                              $drawn = 5;

                              echo '<div class="star-rating">';

                              // full stars.
                              for ($i = 0; $i < floor($average_stars); $i++) {
                                $drawn--;
                                echo '<svg aria-hidden="true" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"/></svg>';
                              }

                              // half stars.
                              if ($rating - floor($average_stars) === 0.5) {
                                $drawn--;
                                echo '<svg aria-hidden="true" data-prefix="fas" data-icon="star-half-alt" class="svg-inline--fa fa-star-half-alt fa-w-17" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 536 512"><path fill="currentColor" d="M508.55 171.51L362.18 150.2 296.77 17.81C290.89 5.98 279.42 0 267.95 0c-11.4 0-22.79 5.9-28.69 17.81l-65.43 132.38-146.38 21.29c-26.25 3.8-36.77 36.09-17.74 54.59l105.89 103-25.06 145.48C86.98 495.33 103.57 512 122.15 512c4.93 0 10-1.17 14.87-3.75l130.95-68.68 130.94 68.7c4.86 2.55 9.92 3.71 14.83 3.71 18.6 0 35.22-16.61 31.66-37.4l-25.03-145.49 105.91-102.98c19.04-18.5 8.52-50.8-17.73-54.6zm-121.74 123.2l-18.12 17.62 4.28 24.88 19.52 113.45-102.13-53.59-22.38-11.74.03-317.19 51.03 103.29 11.18 22.63 25.01 3.64 114.23 16.63-82.65 80.38z"/></svg>';
                              }

                              // empty stars.
                              for ($i = 0; $i < $drawn; $i++) {
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

  <section class="padded-section our-partners-section">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">


          <?php
          // Get the page object for the page with ID 2980
          $page_id = 7;
          $page = get_post($page_id);  // Fetch the post object (which works for pages too)
          
          // Ensure the page exists before proceeding
          if ($page):
            // Get the page title
            $page_title = get_the_title($page_id);

            // Get the page content (the main content)
            $page_content = apply_filters('the_content', $page->post_content); // Apply WordPress content filters
          
            // Output the page title and content
            ?>

            <h2 class="text-center partners-heading">In Association</h2>
            <?php
          else:
            echo 'Page not found.';
          endif;
          ?>

          <div class="partners-wrapper">
            <div class="partners-track">
              <?php
              $gallery_field = get_field('client_gallery', $page_id); // Replace 'your_gallery_field_name' with the actual field name
              if ($gallery_field):

                foreach ($gallery_field as $image):
                  // Get the image URL
                  $image_url = $image['url'];

                  // Get the image title (if available)
                  $image_title = isset($image['title']) ? $image['title'] : 'No title available';

                  // Get the image caption (if available)
                  $image_caption = isset($image['caption']) ? $image['caption'] : 'No caption available';

                  // Output the image information
                  echo '<a href=""> <img class="partner-img" src="' . esc_url($image_url) . '" alt="' . esc_attr($image_title) . '"></a>';
                  //echo '<h3>' . esc_html($image_title) . '</h3>';
                  //echo '<p>' . esc_html($image_caption) . '</p>';
              
                endforeach;
              else:
                echo 'No gallery found for this page.';
              endif;
              ?>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="footer-section padded-section">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="subscribe-row">
            <div class="brand-column">
              <a href="<?php echo esc_url(home_url()); ?>"> <!-- Link to the homepage -->
                <h2 class="footer-brand-name">
                  <?php echo esc_html(get_bloginfo('name')); ?> <!-- Site Title -->
                </h2>
              </a>
              <div class="footer-brand-description">
                <?php echo esc_html(get_bloginfo('description')); ?> <!-- Site Tagline -->
              </div>
            </div>



          </div>
          <div class="footer-links-row">
            <div class="footer-column">

              <h5 class="footer-column-title">Quick Link</h5>
              <?php
              wp_nav_menu(array(
                'menu' => 'Main Menu', // Do not fall back to first non-empty menu.
                'theme_location' => 'primary',
                'fallback_cb' => false, // Do not fall back to wp_page_menu()
                'container' => false,
                'items_wrap' => '<ul>%3$s</ul>'
              ));
              ?>
            </div>

            <div class="footer-column">

              <h5 class="footer-column-title">Terms and Conditions</h5>
              <?php
              wp_nav_menu(array(
                'menu' => 'Bottom', // Do not fall back to first non-empty menu.
                'theme_location' => 'footer',
                'fallback_cb' => false, // Do not fall back to wp_page_menu()
                'container' => false,
                'items_wrap' => '<ul>%3$s</ul>'
              ));
              ?>
            </div>

            <div class="footer-column">
              <h5 class="footer-column-title">
                <?php echo get_the_title(1795); ?> <!-- Get Page Title -->
              </h5>

              <?php
              // Check if ACF repeater field 'office_address' has rows
              if (have_rows('contacts', 35)):
                the_row(); // Move to the first row
                $address = get_sub_field('address_1'); // Address
                $phone = get_sub_field('phone');   // Phone
                $emails1 = get_sub_field('emails');  // Mobile
                $emails2 = get_sub_field('emails_1');  // Emails
                ?>

                <h5 class="footer-column-title contact-us-title">
                  Contact Us
                </h5>
                <ul class="footer-contact-list">

                  <?php if ($address): ?>
                    <li>
                      <i class="fa fa-map-marker"></i> <?php echo $address; ?>
                    </li>
                  <?php endif; ?>

                  <?php if ($phone): ?>
                    <li>

                      <i class="fa fa-phone"></i>
                      <div><?php echo esc_html($phone); ?>
                      </div>
                    </li>
                  <?php endif; ?>

                  <?php if ($emails1): ?>
                    <li>
                      <a href="mailto:<?php echo esc_attr($emails1); ?>">
                        <i class="fa fa-envelope"></i> <?php echo esc_html($emails1); ?>
                      </a>

                    </li>
                  <?php endif; ?>

                  <?php if ($emails2): ?>
                    <li>

                      <a href="mailto:<?php echo esc_attr($emails2); ?>">
                        <i class="fa fa-envelope"></i> <?php echo esc_html($emails2); ?>
                      </a>

                    </li>
                  <?php endif; ?>

                </ul>

              <?php else: ?>
                <p>No office address available.</p>
              <?php endif; ?>
            </div>
            <div class="socials-column">
              <h5 class="footer-column-title">Follow us on</h5>

              <ul>
                <?php
                // Fetch data using WP_Query
                $the_query = new WP_Query('page_id=35'); // Replace with the appropriate page ID
                if ($the_query->have_posts()):
                  while ($the_query->have_posts()):
                    $the_query->the_post();
                    ?>

                    <?php
                    $insta = get_field('instagram');
                    $fb = get_field('facebook');
                    $u = get_field('youtube');

                    ?>
                    <?php if ($insta): ?>
                      <li>
                        <a href="<?php the_field('instagram'); ?>" target="_blank">
                          <i class="fab fa-instagram"></i>
                        </a>
                      </li>
                    <?php endif; ?>
                    <?php if ($fb): ?>
                      <li>
                        <a href="<?php the_field('facebook'); ?>" target="_blank">
                          <i class="fab fa-facebook-f"></i>
                        </a>
                      </li>
                    <?php endif; ?>
                    <?php if ($u): ?>
                      <li>
                        <a href="<?php the_field('youtube'); ?>" target="_blank">
                          <i class="fab fa-youtube"></i>
                        </a>
                      </li>
                    <?php endif; ?>

                  <?php endwhile;
                  wp_reset_postdata();
                endif;
                ?>
              </ul>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="copyright-section">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 text-center">
          &copy; <?php echo esc_html(get_bloginfo('name')) . ' ' . date('Y'); ?>. All Rights Reserved.
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