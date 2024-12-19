<?php get_header(); ?>
<?php if (have_posts()):
    while (have_posts()):
        the_post(); ?>

        <div id="slider_Wrap" style="background: url(<?php the_post_thumbnail_url('full') ?>);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
    background-attachment: fixed;">
            <section id="chooseWrap">
                <?php require_once 'float-menu.php'; ?>

            </section>
            <section id="overlay">
                <div class="overlayInner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <!--<h1> <span><?php the_title(); ?></span></h1>-->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <section id="detailWrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="detailTop">

                            <h1><?php the_title(); ?></h1>
                            <div class="topOverview">
                                <?php the_content(); ?>
                            </div>



                            <a href="#" class="btn btn_book" data-toggle="modal" data-target="#book">Make an enquiry</a>
                            <!-- The modal -->
                            <div class="modal fade" id="book" tabindex="-1" role="dialog" aria-labelledby="modalLabelLarge"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title" id="modalLabelLarge">Enquire Now</h4>
                                        </div>

                                        <div class="modal-body">
                                            <?php echo do_shortcode('[contact-form-7 id="5290" title="Book"]'); ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="additionalInfo" style="background-image: url(<?php bloginfo('template_url'); ?>/images/fo_bg.jpg)">
                <div class="container">
                    <div class="row">
                        <?php
                        $grade = get_field('grade');

                        $easy = "Easy walk on lower elevation";
                        $moderate = "Requires 5-7 hours walk in the mountain area, must be physically fit ";
                        $hard = "Requires 5-7 hours walk in the high elevation with high passes, must be physically fit ";

                        ?>


                        <div class="col-sm-3 col-xs-6 col-lg-2 tripInfo" data-toggle="tooltip" data-placement="bottom"
                            data-original-title="<?php if ($grade == 'easy') {
                                echo $easy;
                            }
                            if ($grade == 'moderate') {
                                //                                                                                                                                                 echo $moderate;
                            }
                            if ($grade == 'hard') {
                                echo $hard;
                            } ?>">
                            <div class="infoIcon">
                                <div class="iconInner">
                                    <i class="fas fa-chart-area"></i>
                                </div>
                            </div>
                            <div class="infoTrip">
                                <p>Difficulty Level</p>
                                <h3><?php echo ucfirst(get_field('grade')); ?></h3>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-6 col-lg-2 tripInfo">
                            <div class="infoIcon">
                                <div class="iconInner">
                                    <i class="fas fa-sun"></i>
                                </div>
                            </div>
                            <?php $season = get_field('season');
                            if ($season): ?>
                                <div class="infoTrip">
                                    <p>Best Season</p>
                                    <h3><?php echo $season; ?></h3>
                                </div>
                            <?php endif; ?>

                        </div>
                        <div class="col-sm-3 col-xs-6 col-lg-2 tripInfo">
                            <div class="infoIcon">
                                <div class="iconInner">
                                    <i class="far fa-clock"></i>
                                </div>
                            </div>
                            <?php $duration = get_field('duration');
                            if ($duration): ?>
                                <div class="infoTrip">
                                    <p>Duration</p>
                                    <h3><?php echo $duration; ?></h3>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-3 col-xs-6 col-lg-2 tripInfo">
                            <div class="infoIcon">
                                <div class="iconInner">
                                    <i class="fas fa-mountain"></i>
                                </div>
                            </div>
                            <?php $elevation = get_field('elevation');
                            if ($elevation): ?>
                                <div class="infoTrip">
                                    <p>Elevation</p>
                                    <h3><?php echo $elevation; ?></h3>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-3 col-xs-6 col-lg-2 tripInfo">
                            <div class="infoIcon">
                                <div class="iconInner">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <?php $group = get_field('group');
                            if ($group): ?>
                                <div class="infoTrip">
                                    <p>Group Size</p>
                                    <h3><?php echo $group; ?></h3>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-3 col-xs-6 col-lg-2 tripInfo">
                            <div class="infoIcon">
                                <div class="iconInner">
                                    <i class="fas fa-map"></i>
                                </div>
                            </div>
                            <?php $trip_type = get_field('trip_type');
                            if ($trip_type): ?>
                                <div class="infoTrip">
                                    <p>Trip Type</p>
                                    <h3><?php echo $trip_type; ?></h3>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">

                    <?php $images = get_field('gallery'); ?>

                    <div id="explore" class="col-md-10 col-md-offset-1 ex_child">
                        <!-- Swiper -->
                        <?php if ($images): ?>
                            <div class="swiper-container top_gallery gallery-top">
                                <div class="swiper-wrapper">
                                    <?php foreach ($images as $image): ?>
                                        <div class="swiper-slide" data-swiper-autoplay="4000">
                                            <img src="<?php echo $image['url']; ?>" class="img-responsive"
                                                alt="<?php echo $image['alt']; ?>">
                                            <div class="sliderBorder"></div>
                                        </div>
                                    <?php endforeach; ?>
                                    <!-- Add Arrows -->

                                </div>
                                <!-- <div class="swiper-button-next swiper-button-white"></div>
                                    <div class="swiper-button-prev swiper-button-white"></div> -->
                                <div class="swiper-pagination"></div>
                            </div>

                            <div class="swiper-container thumb_gallery gallery-thumbs">
                                <div class="swiper-wrapper">
                                    <?php foreach ($images as $image): ?>
                                        <div class="swiper-slide"><img src="<?php echo $image['url']; ?>" class="img-responsive"
                                                alt="<?php echo $image['alt']; ?>"></div>
                                    <?php endforeach; ?>
                                </div>
                            </div><?php endif; ?>
                        <!-- trip details  -->
                        <div class="tripDetails">
                            <div class="tripYear">
                                <h2 class="title"><?php echo get_field('trip_year'); ?> <br>
                                    <?php echo get_field('trip_type'); ?></h2>
                                <ul>
                                    <?php $start_on = get_field('start_on');
                                    if (!empty($start_on)): ?>
                                        <li><?php echo $start_on; ?></li><?php endif; ?>
                                    <?php $start_from = get_field('start_from');
                                    if (!empty($start_from)): ?>
                                        <li><?php echo $start_from; ?></li><?php endif; ?>
                                    <?php $regular_departure_date = get_field('regular_departure_date');
                                    if (!empty($regular_departure_date)): ?>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-1">
                                                <li><b>Regular Departure Date:&nbsp;<?php echo $regular_departure_date; ?></b></li>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-1">
                                                <?php $premium_departure_date = get_field('premium_departure_date');
                                                if (!empty($premium_departure_date)): ?>
                                                    <li>
                                                        <p>Premium Departure Date:&nbsp;<?php echo $premium_departure_date; ?></p>
                                                    </li><?php endif; ?>
                                            </div>

                                        </div>
                                    <?php endif; ?>

                                    <!--                                                <?php $price = get_field('price');
                                    if (!empty($price)): ?><li class="tripPrice"><?php echo $price; ?></li><?php endif; ?> -->

                                </ul>

                            </div>
                            <div id="faqWrap" class="detailGap">
                                <div class="faqMob">
                                    <!-- accordion  -->
                                    <div class="accordion" id="accordionExample">
                                        <div class="card">
                                            <div class="card-head" id="heading-1">
                                                <h2 class="mb-0" data-toggle="collapse" data-target="#collapse-1"
                                                    aria-expanded="true" aria-controls="collapse-1">
                                                    Overview
                                                </h2>
                                            </div>

                                            <div id="collapse-1" class="collapse" aria-labelledby="heading-1"
                                                data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <div class="innerContent" style="text-align: justify;" ;>
                                                        <?php echo get_field('overview'); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-head" id="heading-6">
                                                <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapse-6"
                                                    aria-expanded="false" aria-controls="collapse-6">
                                                    Itinerary
                                                </h2>
                                            </div>
                                            <div id="collapse-6" class="collapse" aria-labelledby="heading-5"
                                                data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <!--new itineray design -->


                                                    <div class="itinerary_box_Wrap">
                                                        <div class="dayColunm">
                                                            <h4>Day</h4>
                                                        </div>
                                                        <div class="panel-group" id="panels" role="tablist">
                                                            <li class="timeline-line"></li>
                                                            <?php if (have_rows('detailed_itinerary')):
                                                                $accordion++; ?>

                                                                <?php while (have_rows('detailed_itinerary')):
                                                                    the_row();
                                                                    $collapse++; ?>
                                                                    <?php if ($collapse == 0): ?>
                                                                        <div class="panel panel-default">
                                                                            <div class="itinery_content collapsed" data-toggle="collapse"
                                                                                data-parent="#panels"
                                                                                data-target="#panel-<?php echo $collapse; ?>">
                                                                                <div class="dayCount"><?php the_sub_field("day"); ?></div>
                                                                                <h4><?php the_sub_field("trip_title"); ?></h4>
                                                                            </div>
                                                                            <div id="panel-<?php echo $collapse; ?>"
                                                                                class="panel-collapse collapse">
                                                                                <div class="timeline-content">
                                                                                    <p><?php the_sub_field("trip_details"); ?></p>
                                                                                    <div class="moreInfoBox">

                                                                                        <?php if (get_sub_field("altitude")): ?>
                                                                                            <div class="boxInfo">
                                                                                                <b>Altitude</b>
                                                                                                <?php the_sub_field("altitude"); ?>
                                                                                            </div>
                                                                                        <?php endif; ?>

                                                                                        <?php if (get_sub_field("activities")): ?>
                                                                                            <div class="boxInfo">
                                                                                                <b>Activities</b>
                                                                                                <?php the_sub_field("activities"); ?>
                                                                                            </div>
                                                                                        <?php endif; ?>

                                                                                        <?php if (get_sub_field("accommodation")): ?>
                                                                                            <div class="boxInfo">
                                                                                                <b>Accommodation</b>
                                                                                                <?php the_sub_field("accommodation"); ?>
                                                                                            </div>
                                                                                        <?php endif; ?>


                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>




                                                                    <?php endif;
                                                                    if ($collapse != 0): ?>

                                                                        <div class="panel panel-default">
                                                                            <div class="itinery_content collapsed" data-toggle="collapse"
                                                                                data-parent="#panels"
                                                                                data-target="#panel-<?php echo $collapse; ?>">
                                                                                <div class="dayCount"> <?php the_sub_field("day"); ?></div>
                                                                                <h4><?php the_sub_field("trip_title"); ?></h4>
                                                                            </div>
                                                                            <div id="panel-<?php echo $collapse; ?>"
                                                                                class="panel-collapse collapse">
                                                                                <div class="timeline-content">
                                                                                    <p><?php the_sub_field("trip_details"); ?></p>
                                                                                    <div class="moreInfoBox">
                                                                                        <?php if (get_sub_field("altitude")): ?>
                                                                                            <div class="boxInfo">
                                                                                                <b>Altitude</b>
                                                                                                <?php the_sub_field("altitude"); ?>
                                                                                            </div>
                                                                                        <?php endif; ?>

                                                                                        <?php if (get_sub_field("activities")): ?>
                                                                                            <div class="boxInfo">
                                                                                                <b>Activities</b>
                                                                                                <?php the_sub_field("activities"); ?>
                                                                                            </div>
                                                                                        <?php endif; ?>

                                                                                        <?php if (get_sub_field("accommodation")): ?>
                                                                                            <div class="boxInfo">
                                                                                                <b>Accommodation</b>
                                                                                                <?php the_sub_field("accommodation"); ?>
                                                                                            </div>
                                                                                        <?php endif; ?>

                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php endif; ?>

                                                                <?php endwhile; ?>
                                                            <?php endif; ?>




                                                        </div>


                                                    </div>
                                                    <div class="itinerary_box">
                                                        <div class="itinerary">
                                                            <?php echo get_field('itinerary'); ?>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-head" id="heading-3">
                                                <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapse-3"
                                                    aria-expanded="false" aria-controls="collapse-3">
                                                    Inclusions and Exclusions
                                                </h2>
                                            </div>
                                            <div id="collapse-3" class="collapse" aria-labelledby="heading-3"
                                                data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <div class="innerContent">
                                                        <!-- tabs  -->
                                                        <ul class="nav nav-pills">


                                                            <li class="active"><a href="#2c" data-toggle="tab">Inclusions</a>
                                                            <li><a href="#3c" data-toggle="tab">Exclusions</a>
                                                        </ul>

                                                        <div class="tab-content clearfix">

                                                            <div class="tab-pane active" id="2c">
                                                                <div class="tabInner tripTeam">
                                                                    <!-- <h3>Inclusion Cost</h3> -->
                                                                    <div class="include">
                                                                        <?php echo get_field('include'); ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="3c">
                                                                <div class="tabInner tripTeam">
                                                                    <!-- <h3>Exclusion Cost</h3> -->
                                                                    <div class="exclude">
                                                                        <?php echo get_field('exclude'); ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-head" id="heading-4">
                                                <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapse-4"
                                                    aria-expanded="false" aria-controls="collapse-4">
                                                    Cost Details
                                                </h2>
                                            </div>
                                            <div id="collapse-4" class="collapse" aria-labelledby="heading-3"
                                                data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <div class="innerContent">
                                                        <?php if (have_rows('trip_price')): ?>
                                                            <ul>
                                                                <?php while (have_rows('trip_price')):
                                                                    the_row();
                                                                    // Get subfield values
                                                                    $total_person = get_sub_field('total_person');
                                                                    $usd = get_sub_field('usd');
                                                                    $euro = get_sub_field('euro');
                                                                    $gbp = get_sub_field('gbp');
                                                                    ?>
                                                                    <li>
                                                                        <?php if ($total_person): ?>
                                                                            <?php echo esc_html($total_person); ?><br>
                                                                        <?php endif; ?>

                                                                        <?php if ($usd): ?>
                                                                            <strong>USD:</strong> $<?php echo esc_html($usd); ?><br>
                                                                        <?php endif; ?>

                                                                        <?php if ($euro): ?>
                                                                            <strong>Euro:</strong> €<?php echo esc_html($euro); ?><br>
                                                                        <?php endif; ?>

                                                                        <?php if ($gbp): ?>
                                                                            <strong>GBP:</strong> £<?php echo esc_html($gbp); ?><br>
                                                                        <?php endif; ?>
                                                                    </li>
                                                                <?php endwhile; ?>
                                                            </ul>
                                                        <?php else: ?>
                                                            <p>No trip prices available.</p>
                                                        <?php endif; ?>



                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-head" id="heading-26">
                                                <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapse-26"
                                                    aria-expanded="false" aria-controls="collapse-26">
                                                    Payment Details
                                                </h2>
                                            </div>
                                            <div id="collapse-26" class="collapse" aria-labelledby="heading-26"
                                                data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <div class="innerContent">
                                                        <div class="tab-pane" id="4p">
                                                            <div class="tabInner tripTeam">
                                                                <div class="account-num">
                                                                    <?php
                                                                    // Get the page object by ID
                                                                    $page_id = 9339;
                                                                    $page = get_post($page_id);

                                                                    // Check if the page exists
                                                                    if ($page) {
                                                                        // Get the title and content
                                                                        $page_title = get_the_title($page_id);
                                                                        $page_content = apply_filters('the_content', $page->post_content); // Apply content filters
                                                            
                                                                        echo '<h1>' . esc_html($page_title) . '</h1>';
                                                                        echo '<div>' . wp_kses_post($page_content) . '</div>';
                                                                    } else {
                                                                        echo 'Page not found.';
                                                                    }
                                                                    ?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

        </section>
        <section id="featuredWrap" class="detailFeature">
            <div class="container">
                <div class="row tripflex">
                    <div class="col-sm-12" align="center">
                        <h1 style="font-size: 25px;">Similar Expeditions</h1>
                    </div>
                    <div class="col-sm-12">

                        <div class="swiper-container mySwiper swiper-container-horizontal">
                            <div class="swiper-wrapper" style="">
                                <?php
                                global $wp_query;
                                $post_id = $wp_query->post->ID;

                                $args = array(
                                    'post_type' => 'expedition',
                                    'posts_per_page' => 15,
                                    'post_status' => 'publish',
                                    'post__not_in' => array($post_id),

                                    'orderby' => 'publish_date',
                                    'order' => 'DESC',
                                    'category__in' => wp_get_post_categories($post_id),

                                );
                                $the_query = new WP_Query($args); ?>
                                <?php while ($the_query->have_posts()):
                                    $the_query->the_post(); ?>
                                    <div class="swiper-slide mainTrip" style="width: 340px; margin-right: 30px;">
                                        <div class="fea_trip clearfix">
                                            <?php $summ = get_field('summitted_on'); ?>
                                            <?php if ($summ): ?>
                                                <span class="region" data-toggle="tooltip" data-placement="bottom"
                                                    title="Summitted on"><?php the_field('summitted_on'); ?></span>
                                            <?php endif; ?>
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('full', array("class" => "img-responsive")); ?>
                                            </a>
                                            <div class="feature_info clearfix">
                                                <div class="feature_title">
                                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                    <?php $days = get_field('duration');
                                                    $elevation = get_field('elevation'); ?>
                                                    <?php if ($days): ?>
                                                        <h5><?php echo $days; ?> | <?php echo $elevation; ?></h5><?php endif; ?>
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
    <?php endwhile;
endif; ?>
<script>
    document.addEventListener(
        "DOMContentLoaded", () => {

            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 3,
                spaceBetween: 30,
                loop: true,
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
        }
    )
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.2.1/js/swiper.min.js"
    integrity="sha512-y3xBRnPcYKl5rPeXr8jFALTW+vpeqXVqhNACy573tW3YBqocRygpJ042ukRPKxA2pbWp3YrvfWmWUXcEOgDIrw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var galleryThumbs = new Swiper('.gallery-thumbs', {
        spaceBetween: 10,
        slidesPerView: 4,
        loop: true,
        freeMode: true,
        loopedSlides: 5, //looped slides should be the same
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
    });
    var galleryTop = new Swiper('.gallery-top', {
        spaceBetween: 10,
        loop: true,
        loopedSlides: 5, //looped slides should be the same
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        thumbs: {
            swiper: galleryThumbs,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
    });
</script>
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

<?php get_footer(); ?>