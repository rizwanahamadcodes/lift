<?php
/*
Template Name: Home Page
*/
?>
<?php get_header(); ?>
<section id="slider_Wrap">
    <section id="chooseWrap" class="affix">
       <?php require_once 'float-menu.php';?>
    </section>
    <div id="carousel" class="carousel slide carousel-fade" data-interval="4000" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php
            $x = 0;
            $y = 0;
            $aclass = '';
            $the_query = new WP_Query(array('post_type' => 'slider')); ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post();
                $x++;
            ?>
                <?php if ($x == 1) $aclass .= ' active';
                else $aclass = '';
                ?>
                <li data-target="#carousel" data-slide-to="<?php echo $y++; ?>" class="<?php echo $aclass; ?>"></li>
            <?php endwhile; ?>
            <?php wp_reset_query(); ?>
        </ol>
        <!-- Carousel items -->
        <div class="carousel-inner">
            <?php
            $c = 0;
            $class = '';
            $the_query = new WP_Query(array('post_type' => 'slider')); ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post();
                $c++;
            ?>
                <?php if ($c == 1) $class .= ' active';
                else $class = '';
                ?>
                <div class="item <?php echo $class; ?>">
                    <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
                    <div class="sliderLine">
                        <div class="mainLine"></div>
                    </div>
                    <img src="<?php echo $url; ?>" class="img-responsive" alt="<?php the_title(); ?>">
                    <div class="carousel-caption">
                        <h3><?php the_title(); ?></h3>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_query(); ?>
        </div>
        <!-- Carousel nav -->
        <a class="carousel-control left" href="#carousel" data-slide="prev"><span class="controll"></span></a>
        <a class="carousel-control right" href="#carousel" data-slide="next"><span class="controllright"></span></a>
    </div>
</section>
<?php if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <section id="h_aboutWrap">
            <div id="h_about">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4 col-sm-5 h_abt_left" align="right" data-aos="fade-up" data-aos-once='true'>
                            <?php
// Page ID you want to get the image for
$page_id = 7;

// Get the image field (array) using the page ID
$image = get_field('home_picture', $page_id);

if ($image) {
    // Get the image URL (full size)
    $image_url = $image['url'];

    // Get the alt text of the image
    $image_alt = $image['alt'];

    // Get different sizes (e.g., thumbnail, medium, large)
    $image_thumb = $image['sizes']['thumbnail'];
    $image_medium = $image['sizes']['medium'];
    $image_large = $image['sizes']['large'];

    // Output the image in HTML
    echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($image_alt) . '" class="img-responsive">';
}
?>


                        </div>
                        <div class="col-md-8 col-sm-7 h_abt_right">
                        <div style="text-align: justify;">
                            <!--<div class="heading">-->
                            <!--    <h1><?php the_field('heading'); ?></h1>-->
                            <!--    <h3><?php the_field('sub_heading'); ?></h3>-->
                            <!--</div>-->
                            <?php the_content(); ?>
</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php endwhile;
endif; ?>
<section id="offerWrap" class="divider_bg">
    <div class="container">
        <div class="row offer-flex">
            <?php if (have_posts()) :
                while (have_posts()) : the_post(); ?>
                    <div class="col-md-7 col-sm-12 offer-child">
                    <div style="text-align: justify;">
                        <?php the_field('content'); ?>
            </div>
                    </div>
            <?php endwhile;
            endif; ?>
            <div class="col-md-5 col-sm-12">
                <?php the_post_thumbnail('full', array("class" => "img-responsive")); ?>
                <div class="row">
                    <!--<?php $the_query = new WP_Query('page_id=3384'); ?>-->
                    <!--<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>-->
                    <!--    <div class="col-md-6 col-sm-6">-->
                    <!--        <div class="offer_cov">-->
                    <!--            <a href="<?php the_permalink(); ?>">-->
                    <!--                <?php the_post_thumbnail('full', array("class" => "img-responsive")); ?>-->
                    <!--            </a>-->
                    <!--            <div class="offer">-->
                    <!--                <a href="<?php the_permalink(); ?>">-->
                    <!--                    <h3>-->
                    <!--                        <?php the_title(); ?>-->
                    <!--                    </h3>-->
                    <!--                </a>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--<?php endwhile; ?>-->
                    <!--<?php $the_query = new WP_Query('page_id=2022'); ?>-->
                    <!--<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>-->
                    <!--    <div class="col-md-6 col-sm-6">-->
                    <!--        <div class="offer_cov">-->
                    <!--            <a href="<?php the_permalink(); ?>">-->
                    <!--                <?php the_post_thumbnail('full', array("class" => "img-responsive")); ?>-->
                    <!--            </a>-->
                    <!--            <div class="offer">-->
                    <!--                <a href="<?php the_permalink(); ?>">-->
                    <!--                    <h3>-->
                    <!--                        <?php the_title(); ?>-->
                    <!--                    </h3>-->
                    <!--                </a>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--<?php endwhile; ?>-->
                </div>
            </div>
        </div>
    </div>
</section>
<?php $the_query = new WP_Query('page_id=2822'); ?>
<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
    <section id="parallax_cov">
        <div class="parallax_caption">
            <h2><?php the_title(); ?> </h2>
            <p><?php the_field('sub_heading'); ?></p>
        </div>
        <?php
        $image = get_field('image'); ?>
        <div id="parallax_Wrap" style="background-image: url('<?php echo esc_url($image['url']); ?>');">
        </div>
    </section>
<?php endwhile; ?>
<section id="featuredWrap" class="detailFeature">
    <div class="container">
        <div class="row tripflex tripRev">
            <?php
            $id_p = 2822;
            $post = get_post($id_p);
            $content_p = apply_filters('get_the_excerpt', $post->post_excerpt);
            $title_p = apply_filters('the_title', $post->post_title);
            ?>
            <div class="col-sm-4 featureTitle">
                <h1><?php echo $title_p; ?></h1>
                <div style="text-align: justify;">
                <p><?php echo $content_p; ?></p>
        </div>
                <a href="<?php the_permalink($id_p); ?>" class="btn_more">Read More</a>
            </div>
            <div class="col-sm-8">
                <div class="featureSliderWrap">
                    <div class="swiper-container mySwiper2">
                        <div class="swiper-wrapper">
                            <?php
                           $args = array(
                            'post_type' => 'trekking',
                            'posts_per_page' => -1,
                            'post_status' => 'publish', // Make sure you're only getting published posts
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
                                                $elevation = get_field('elevation'); 
                                                $cost=get_field('regular_cost');
                                                ?>
                                                <?php if ($days) : ?> <h4><?php echo $days; ?> | <?php echo $cost; ?></h4><?php endif; ?>
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
    </div>
</section>
<!-- 7000 M ko yesma add garnu -->
<?php $the_query = new WP_Query('page_id=9466'); ?>
<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
    <section id="parallax_cov">
        <div class="parallax_caption">
            <h2><?php the_title(); ?> </h2>
            <p><?php the_field('sub_heading'); ?></p>
        </div>
        <?php
        $image = get_field('image'); ?>
        <div id="parallax_Wrap" style="background-image: url('<?php echo esc_url($image['url']); ?>');">
        </div>
    </section>
<?php endwhile; ?>
<section id="featuredWrap" class="detailFeature">
    <div class="container">
        <div class="row tripflex">
            <?php
            $id = 9466;
            $post = get_post($id);
            $content = apply_filters('get_the_excerpt', $post->post_excerpt);
            $title = apply_filters('the_title', $post->post_title);
            ?>
            <div class="col-sm-4 featureTitle">
                <h1><?php echo $title; ?></h1>
                <div style="text-align: justify;">
                <p><?php echo $content; ?></p>
                                                </div>

                <a href="<?php the_permalink($id); ?>" class="btn_more">Read More</a>
            </div>
            <div class="col-sm-8">
                <div class="featureSliderWrap">
                    <div class="swiper-container mySwiper1">
                        <div class="swiper-wrapper">
                            <?php
                            $args =  array(
                                'post_type'   => array('peak'),
                                'posts_per_page' => 25,
                                
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
                                                $elevation = get_field('elevation');   
                                                $cost=get_field('regular_cost');
                                                ?>
                                                <?php if ($days) : ?> <h4><?php echo $days; ?> | <?php echo $cost; ?></h4><?php endif; ?>
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
    </div>
</section>
<!-- end -->
<?php $the_query = new WP_Query('page_id=2022'); ?>
<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
    <section id="parallax_cov">
        <div class="parallax_caption">
            <h2><?php the_title(); ?> </h2>
            <p><?php the_field('sub_heading'); ?></p>
        </div>
        <?php
        $image = get_field('image'); ?>
        <div id="parallax_Wrap" style="background-image: url('<?php echo esc_url($image['url']); ?>');">
        </div>
    </section>
<?php endwhile; ?>
<section id="featuredWrap" class="detailFeature">
    <div class="container">
        <div class="row tripflex">
            <?php
            $id_e = 2022;
            $post = get_post($id_e);
            $content_e = apply_filters('get_the_excerpt', $post->post_excerpt);
            $title_e = apply_filters('the_title', $post->post_title);
            ?>
            <div class="col-sm-4 featureTitle">
                <h1><?php echo $title_e; ?></h1>
                <div style="text-align: justify;">
                <p><?php echo $content_e; ?></p>
                                                </div>
                <a href="<?php the_permalink($id_e); ?>" class="btn_more">Read More</a>
            </div>
            <div class="col-sm-8">
                <div class="featureSliderWrap">
                    <div class="swiper-container mySwiper3">
                        <div class="swiper-wrapper">
                            <?php
                            $args =  array(
                                'post_type'   => array('expedition'),
                                'posts_per_page' => 25,
                                
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
                                                $elevation = get_field('elevation');   
                                                $cost=get_field('regular_cost');
                                                ?>
                                                <?php if ($days) : ?> <h4><?php echo $days; ?> | <?php echo $cost; ?></h4><?php endif; ?>
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
    </div>
</section>
<?php $the_query = new WP_Query('page_id=2817'); ?>
<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
    <section id="parallax_cov">
        <div class="parallax_caption">
            <h2><?php the_title(); ?> </h2>
            <p><?php the_field('sub_heading'); ?></p>
        </div>
        <?php
        $image = get_field('image'); ?>
        <div id="parallax_Wrap" style="background-image: url('<?php echo esc_url($image['url']); ?>');">
        </div>
    </section>
<?php endwhile; ?>

<?php $the_query = new WP_Query('page_id=5905'); ?>

<?php get_footer(); ?>
<script>
    var swiper = new Swiper(".mySwiper1", {
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
<script>
    var swiper = new Swiper(".mySwiper2", {
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
<script>
    var swiper = new Swiper(".mySwiper3", {
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
<script>
    var swiper = new Swiper(".mySwiper4", {
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