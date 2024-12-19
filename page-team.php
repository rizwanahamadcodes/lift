<?php get_header(); ?>
<?php
$images = get_field('gallery', 4372);
$id = array_key_exists("id", $_GET) ? $_GET["id"] : "";
if (is_array($images)) {
  foreach ($images as $image) {
    if ($image['id'] == $id) {
        $bgImage = get_field('hero_image',$id) ? get_field('hero_image',$id)['url'] : 'https://www.alpinistclimberexpeditions.com/wp-content/uploads/2020/02/South-ridge-of-Mt-Dixon-sherpaprakash.com_.np_-e1582621421211.jpg';
?>
      <div id="slider_Wrap" style="background: url(<?=$bgImage?>);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
    background-attachment: fixed;">
           <section id="chooseWrap" class="affix">
           <?php require_once 'float-menu.php';?>

    </section>
        <section id="overlay">
          <div class="overlayInner">
            <div class="contaner">
              <div class="row">
                <div class="col-sm-12">
                  <!--<h1> <span><?php the_title(); ?></span></h1>-->
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <section>
        <div class="container" style="margin-top: 2rem">
          <div class="row">
            <div class="col-lg-5 col-md-5">
              <img src="<?= $image['url'] ?>" alt="profile" width="100%" height="100%" style="object-fit: cover" />
            </div>
            <div class="col-lg-7 col-md-7 text-left mt-3">
              <div>
                <h2 style="
    font-weight: bold;
"><?= $image["title"] ?></h2>
                <p><?= $image["caption"] ?></p>
              </div>
              <div>
                <p style="
    text-align: justify;
">
                  <?php echo esc_html($image['description']); ?>
                </p>
<?php 
$image = get_field('hero_image');
if( !empty( $image ) ): ?>
    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /> 
<?php endif; ?>
              
              </div>
             
            </div>

      </section>

      <!--<section>-->
              <!-- faq -->
      <!--<div div="container">-->
      <!--  <div class="faq-head">-->
      <!--    <div>-->
      <!--    <div class="question">How do I verify my email?</div>-->
      <!--    <div class="answercont">-->
      <!--      <div class="answer">-->
      <!--        Click the link in the verification email from mailto:verify@codepen.io-->
      <!--        (be sure to check your spam folder or other email tabs if it's not in-->
      <!--        your inbox). Or, send an email with the subject "Verify" to-->
      <!--        mailto:verify@codepen.io from the email address you use for your CodePen-->
      <!--        account.Click the link in the verification email from mailto:verify@codepen.io-->
      <!--        (be sure to check your spam folder or other email tabs if it's not in-->
      <!--        your inbox). Or, send an email with the subject "Verify" to-->
      <!--        mailto:verify@codepen.io from the email address you use for your CodePen-->
      <!--        account.Click the link in the verification email from mailto:verify@codepen.io-->
      <!--        (be sure to check your spam folder or other email tabs if it's not in-->
      <!--        your inbox). Or, send an email with the subject "Verify" to-->
      <!--        mailto:verify@codepen.io from the email address you use for your CodePen-->
      <!--        account.Click the link in the verification email from mailto:verify@codepen.io-->
      <!--        (be sure to check your spam folder or other email tabs if it's not in-->
      <!--        your inbox). Or, send an email with the subject "Verify" to-->
      <!--        mailto:verify@codepen.io from the email address you use for your CodePen-->
      <!--        account.Click the link in the verification email from mailto:verify@codepen.io-->
      <!--        (be sure to check your spam folder or other email tabs if it's not in-->
      <!--        your inbox). Or, send an email with the subject "Verify" to-->
      <!--        mailto:verify@codepen.io from the email address you use for your CodePen-->
      <!--        account.<br /><br />-->

      <!--        <a href="https://blog.codepen.io/documentation/features/email-verification/#how-do-i-verify-my-email-2">How to Verify Email Docs</a>-->
      <!--      </div>-->
      <!--    </div>-->
      <!--    </div>-->
      <!--    <div>-->
      <!--    <div class="question">How do I verify my email?</div>-->
      <!--    <div class="answercont">-->
      <!--      <div class="answer">-->
      <!--        Click the link in the verification email from mailto:verify@codepen.io-->
      <!--        (be sure to check your spam folder or other email tabs if it's not in-->
      <!--        your inbox). Or, send an email with the subject "Verify" to-->
      <!--        mailto:verify@codepen.io from the email address you use for your CodePen-->
      <!--        account.Click the link in the verification email from mailto:verify@codepen.io-->
      <!--        (be sure to check your spam folder or other email tabs if it's not in-->
      <!--        your inbox). Or, send an email with the subject "Verify" to-->
      <!--        mailto:verify@codepen.io from the email address you use for your CodePen-->
      <!--        account.Click the link in the verification email from mailto:verify@codepen.io-->
      <!--        (be sure to check your spam folder or other email tabs if it's not in-->
      <!--        your inbox). Or, send an email with the subject "Verify" to-->
      <!--        mailto:verify@codepen.io from the email address you use for your CodePen-->
      <!--        account.Click the link in the verification email from mailto:verify@codepen.io-->
      <!--        (be sure to check your spam folder or other email tabs if it's not in-->
      <!--        your inbox). Or, send an email with the subject "Verify" to-->
      <!--        mailto:verify@codepen.io from the email address you use for your CodePen-->
      <!--        account.Click the link in the verification email from mailto:verify@codepen.io-->
      <!--        (be sure to check your spam folder or other email tabs if it's not in-->
      <!--        your inbox). Or, send an email with the subject "Verify" to-->
      <!--        mailto:verify@codepen.io from the email address you use for your CodePen-->
      <!--        account.<br /><br />-->

      <!--        <a href="https://blog.codepen.io/documentation/features/email-verification/#how-do-i-verify-my-email-2">How to Verify Email Docs</a>-->
      <!--      </div>-->
      <!--    </div>-->
      <!--    </div>-->
      <!--    <div>-->
      <!--    <div class="question">How do I verify my email?</div>-->
      <!--    <div class="answercont">-->
      <!--      <div class="answer">-->
      <!--        Click the link in the verification email from mailto:verify@codepen.io-->
      <!--        (be sure to check your spam folder or other email tabs if it's not in-->
      <!--        your inbox). Or, send an email with the subject "Verify" to-->
      <!--        mailto:verify@codepen.io from the email address you use for your CodePen-->
      <!--        account.Click the link in the verification email from mailto:verify@codepen.io-->
      <!--        (be sure to check your spam folder or other email tabs if it's not in-->
      <!--        your inbox). Or, send an email with the subject "Verify" to-->
      <!--        mailto:verify@codepen.io from the email address you use for your CodePen-->
      <!--        account.Click the link in the verification email from mailto:verify@codepen.io-->
      <!--        (be sure to check your spam folder or other email tabs if it's not in-->
      <!--        your inbox). Or, send an email with the subject "Verify" to-->
      <!--        mailto:verify@codepen.io from the email address you use for your CodePen-->
      <!--        account.Click the link in the verification email from mailto:verify@codepen.io-->
      <!--        (be sure to check your spam folder or other email tabs if it's not in-->
      <!--        your inbox). Or, send an email with the subject "Verify" to-->
      <!--        mailto:verify@codepen.io from the email address you use for your CodePen-->
      <!--        account.Click the link in the verification email from mailto:verify@codepen.io-->
      <!--        (be sure to check your spam folder or other email tabs if it's not in-->
      <!--        your inbox). Or, send an email with the subject "Verify" to-->
      <!--        mailto:verify@codepen.io from the email address you use for your CodePen-->
      <!--        account.<br /><br />-->

      <!--        <a href="https://blog.codepen.io/documentation/features/email-verification/#how-do-i-verify-my-email-2">How to Verify Email Docs</a>-->
      <!--      </div>-->
      <!--    </div>-->
      <!--    </div>-->
      <!--  </div>-->
      <!--</div>-->
      <!--</section>-->
 <div class="container">
<p><?php echo get_field('before_faqs',$id); ?></p> </div>
 <section>
                                                            <!-- faq -->

                                                          
                                                             
                                                                    <?php
                                                                    $faqs = get_field('faqs', $id);
                                                                    if (is_array($faqs)) {
                                                                        foreach ($faqs as $index => $daily) {
                                                                    ?>
                                                                     <div class="container">
                                                              
                                                                            <div class="question"><?= $daily['title'] ?></div>
                                                                            <div class="answercont">
                                                                                <div class="answer">
                                                                                    
                                                                                    <?= $daily['content'] ?>


                                                                           </div> 
                                                                                </div> 
                                                                                </div>
                                                                            
                                                                           
                                                                           
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>

                                                        </section>
                                                         <div class="container">
                                              <p><?php echo get_field('after_faqs',$id); ?></p>    </div>       

      <!-- adding New Image Section -->
      <section id="parallax_cov">
        <div class="parallax_caption">
          <h2>Mera Peak </h2>
          <p>the highest trekking peak in Nepal</p>
        </div>
        <div id="parallax_Wrap" style="background-image: url('https://www.alpinistclimberexpeditions.com/wp-content/uploads/2021/11/Prakash-Sherpa-Kyajo-Ri-6186m-expeditions-Alpinist-Climber-Expeditions-1-scaled-e1652006877838.jpg');">
        </div>
      </section>
<?php
      break;
    }
  }
}
?>

 <section id="featuredWrap" class="detailFeature">
            <div class="container">
                <div class="row tripflex">
                    <div class="col-sm-12" align="center">
                    <h1 style="font-size: 25px;">Similar Trips</h1>
                    </div>
                    <div class="col-sm-12">

                        <div class="swiper-container mySwiper">
                            <div class="swiper-wrapper">
                                <?php
                                global $wp_query;
                                $post_id = $wp_query->post->ID;

                                $args = array(
                                    'post_type' => 'expedition',
                                    'posts_per_page' => 15,
                                    'post_status'       => 'publish',
                                    'post__not_in' => array($post_id),

                                    'orderby'           => 'publish_date',
                                    'order'             => 'DESC',
                                    'category__in' => wp_get_post_categories($post_id),

                                );




                                $the_query = new WP_Query($args); ?>
                                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                    <div class="swiper-slide mainTrip">
                                        <div class="fea_trip clearfix">
                                            <?php $summ = get_field('summitted_on'); ?>
                                            <?php if ($summ) : ?>
                                                <span class="region" data-toggle="tooltip" data-placement="bottom" title="Summitted on"><?php the_field('summitted_on'); ?></span>
                                            <?php endif; ?>
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('full', array("class" => "img-responsive")); ?>
                                            </a>
                                            <div class="feature_info clearfix">
                                                <div class="feature_title">
                                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                    <?php $days = get_field('duration');
                                                    $elevation = get_field('elevation'); ?>
                                                    <?php if ($days) : ?> <h5><?php echo $days; ?> | <?php echo $elevation; ?></h5><?php endif; ?>
                                                </div>
                                                <?php the_field('short_content'); ?>
                                                <div class="offer">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <h3>
                                                            view more <i class="fas fa-long-arrow-alt-right"></i>
                                                        </h3>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>

                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next swiper-button-white"></div>
                            <div class="swiper-button-prev swiper-button-white"></div>
                        </div>
                    </div>


                </div>
            </div>
        </section>

<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
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
<div style="margin-top: 50px; margin-bottom: 50px;">
<h1 style="text-align:center;">Our Instagram</h1>
<?php echo do_shortcode('[wp_social_ninja id="8678" platform="instagram"]'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div style="text-align:center;">
<a href ="https://www.instagram.com/alpinistclimberexpeditions"><i class="fa fa-instagram" style="font-size: 25px;color:#f28c00; font-weight: 900;"></i> Veiw on Instagram</a>    
</div>
</div>
<?php get_footer(); ?>

<script>
    let question = document.querySelectorAll(".question");
  
    question.forEach((question) => {
      question.addEventListener("click", (event) => {
        const active = document.querySelector(".question.active");
        if (active && active !== question) {
          active.classList.toggle("active");
          active.nextElementSibling.style.maxHeight = 0;
        }
        question.classList.toggle("active");
        const answer = question.nextElementSibling;
        if (question.classList.contains("active")) {
          answer.style.maxHeight = answer.scrollHeight + "px";
        } else {
          answer.style.maxHeight = 0;
        }
      });
    });
  </script>