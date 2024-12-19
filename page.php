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
                        <div style="text-align: justify";>
                        <?php the_content();?>
                        </div>
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