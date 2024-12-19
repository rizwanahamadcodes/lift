<?php
/*
Template Name: Tours
*/
?>
<?php get_header();?>
<?php if(have_posts()):
    while (have_posts()): the_post();?>
        <!--<div id="slider_Wrap">-->
        <!--    <section id="overlay">-->
        <!--        <?php the_post_thumbnail('full', array("class"=>"img-responsive"));?>-->
        <!--    </section>-->
            
        <!--</div>-->
                <div id="slider_Wrap" style="background: url(<?php the_post_thumbnail_url('full')?>);
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
                                         <!--<h1> <span><?php the_title();?></span></h1>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <section id="detailWrap">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 collectionTOp" data-aos="fade-up">

                        <h1><?php the_title();?></h1>
                    
                        <h3><?php the_field('heading');?></h3>
                         <?php the_content();?>

                            </div>
                
                        </div>
                    </div>
                </section>




                <section id="featuredWrap" class="latesNews">
            <div class="container">
              <div class="row tripflex">
                <div class="col-sm-12" style="
    margin-left: 1rem;
">
                </div>
                <?php
                    $args =  array(
                        'post_type'   => array( 'expedition'),
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            'relation' => 'OR',
                            array(
                                'taxonomy' => 'expedition_category',
                                'field' => 'id',
                                'terms' =>'50',
                                'include_children' => false,
                                'operator' => 'IN',
                            ),
                        )
                    );
                $the_query = new WP_Query($args); ?>
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                  <div class="col-md-4 col-sm-4 mainTrip">
                    <div class="fea_trip clearfix">
                      <?php $summ = get_field('summitted_on'); ?>
                      <?php if ($summ) : ?>
                        <!--<span class="region" data-toggle="tooltip" data-placement="bottom" title="Summitted on"><?php the_field('summitted_on'); ?></span>-->
                      <?php endif; ?>
                      <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('full', array("class" => "img-responsive")); ?>
                      </a>
                      <div class="feature_info clearfix">
                        <div class="feature_title">
                          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                          <?php $days= get_field('duration'); $elevation=get_field('elevation');?>
                        <?php if ($days):?> <h5><?php echo $days;?> | <?php echo $elevation;?></h5><?php endif;?>
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
            </div>
          </section>






        <!-- <section id="featuredWrap" class="detailFeature detailInnerFea">
            <div class="container">
                <div class="row tripflex">
                <div class="col-sm-12" style="
    margin-left: 1rem;
">
                                    <div class="swiper-container mySwiper">
                                        <div class="swiper-wrapper">
                                            <?php
                    $args =  array(
                        'post_type'   => array( 'expedition'),
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            'relation' => 'OR',
                            array(
                                'taxonomy' => 'expedition_category',
                                'field' => 'id',
                                'terms' =>'50',
                                'include_children' => false,
                                'operator' => 'IN',
                            ),
                        )
                    );
                    $the_query = new WP_Query( $args);?>
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
                        <div class="swiper-slide">
                            <div class="fea_trip clearfix">
                                <?php $summ= get_field('summitted_on');?>
                        <?php if ($summ):?>
                        <span class="region" data-toggle="tooltip" data-placement="bottom" title="Summitted on"><?php the_field('summitted_on');?></span>
                        <?php endif;?>
                                <a href="<?php the_permalink();?>">
                                    <?php the_post_thumbnail('full', array("class"=>"img-responsive"));?>
                                </a>
                                <div class="feature_info clearfix">
                                  <div class="feature_title">
                            <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                          <?php $days= get_field('duration'); $elevation=get_field('elevation');?>
                        <?php if ($days):?> <h5><?php echo $days;?> | <?php echo $elevation;?></h5><?php endif;?>
                            </div>
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
                                   
                                        <div class="swiper-button-next swiper-button-white"></div>
                                        <div class="swiper-button-prev swiper-button-white"></div>
                                    </div>
                                </div>
                </div>
            </div>
        </section> -->
    <?php endwhile; endif;?>
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
<?php //echo do_shortcode('[wp_social_ninja id="8678" platform="instagram"]'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div style="text-align:center;">
<a href ="https://www.instagram.com/"><i class="fa fa-instagram" style="font-size: 25px;color:#f28c00; font-weight: 900;"></i> Veiw on Instagram</a>    
</div>
</div>
<?php get_footer();?>