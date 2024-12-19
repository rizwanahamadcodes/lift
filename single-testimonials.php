<?php
/*
Template Name: Testimonial Page
*/
?>
<?php get_header(); ?>
<?php if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <div id="slider_Wrap" style="background: url(<?php the_post_thumbnail_url('full') ?>);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
    background-attachment: fixed;">
            <section id="chooseWrap">
            <?php require_once 'float-menu.php';?>

            </section>
            <section id="overlay">
                <div class="overlayInner">
                    <div class="contaner">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1> <span><?php the_field('mountains'); ?></span></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <section id="featuredWrap" class="detailFeature testimonial" style="background-image: url(<?php bloginfo('template_url'); ?>/images/fo_bg.jpg)">
            <div class="container">
                <div class="row tripflex">
                    <div class="col-lg-4 col-md-4 col-sm-1">
                        <div class="certificates">
                            <?php
                            $image = get_field('certificate');
                            if (!empty($image)) : ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-1">
                        <div class="swiper-slide">

                            <div class="testi clearfix">
                                <article id="post-<?php the_ID(); ?>" <?php post_class('testimonial'); ?>>
                                    <div class="testi_client">
                                        <span class="client_name">

                                            <div class="client_nameBox">

                                                <p><?php the_content(); ?></p>
                                                <div class="client-border">
                                                    <div class="border-space">
                                                    <h3><b><?php the_field('clients_name'); ?></b></h3>
                                                    <?php the_field('country'); ?><span><?php echo get_the_date(); ?></span>
                                                    <h4><?php the_field('mountains'); ?></h4>
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
                                                    
                                                </div>
                                            </div>
                                        </span>
                                    </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
        </section>
<?php endwhile;
endif; ?>
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
<?php get_footer(); ?>