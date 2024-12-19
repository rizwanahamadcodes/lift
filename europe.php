<?php
/*
Template Name: Europe
*/
?>
<?php get_header();?>
<?php if(have_posts()):
    while (have_posts()): the_post();?>
        <div id="slider_Wrap">
            <section id="overlay">
                <?php the_post_thumbnail('full', array("class"=>"img-responsive"));?>
            </section>
        </div>
        <section id="detailWrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1><?php the_title();?></h1>
                        <?php the_content();?>
                    </div>

                    <?php $images = get_field('gallery'); ?>
                    <?php if($images):?>
                    <div id="explore" class="col-md-10 col-md-offset-1 ex_child">
                        <!-- Swiper -->
                        <div class="swiper-container top_gallery gallery-top">
                            <div class="swiper-wrapper">
                                <?php foreach( $images as $image ): ?>
                                    <div class="swiper-slide" data-swiper-autoplay="4000">
                                        <img src="<?php echo $image['url'];?>" class="img-responsive" alt="<?php echo $image['alt'];?>">
                                    </div>
                                <?php endforeach; ?>
                                <!-- Add Arrows -->

                            </div>
                            <div class="swiper-button-next swiper-button-white"></div>
                            <div class="swiper-button-prev swiper-button-white"></div>
                        </div>
                        <div class="swiper-container thumb_gallery gallery-thumbs">
                            <div class="swiper-wrapper">
                                <?php foreach( $images as $image ): ?>
                                    <div class="swiper-slide"><img src="<?php echo $image['url'];?>" class="img-responsive" alt="<?php echo $image['alt'];?>"></div>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <section id="featuredWrap">
            <div class="container">
                <div class="row tripflex">
                    <?php
                    $args =  array(
                        'post_type'   => array( 'expedition'),
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            'relation' => 'OR',
                            array(
                                'taxonomy' => 'expedition_category',
                                'field' => 'id',
                                'terms' =>'53',
                                'include_children' => false,
                                'operator' => 'IN',
                            ),
                        )
                    );
                    $the_query = new WP_Query( $args);?>
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
                        <div class="col-md-4 col-sm-4 mainTrip">
                            <div class="fea_trip clearfix">
                                <?php $summ= get_field('summitted_on');?>
                        <?php if ($summ):?>
                        <span class="region" data-toggle="tooltip" data-placement="bottom" title="Summitted on"><?php the_field('summitted_on');?></span>
                        <?php endif;?>
                                <a href="<?php the_permalink();?>">
                                    <?php the_post_thumbnail('full', array("class"=>"img-responsive"));?>
                                </a>
                                <div class="feature_info clearfix">
                                    <h3 class="feature_title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                                    <?php the_field('short_content');?>
                                    <div class="offer">
                                        <a href="<?php the_permalink();?>">
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
            </div>
        </section>
    <?php endwhile; endif;?>
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
        });
    </script>
<?php get_footer();?>