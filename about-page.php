<?php
/*
Template Name: About Page
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
        <section id='aboutMainsec'>
            <section id="h_aboutWrap">
                <!--<?php the_post_thumbnail('full', array("class" => "img-responsive prakash")); ?>-->
                <div id="h_about">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4 col-sm-5 h_abt_left" align="right">
                                <img src="https://www.sherpaleaderstreks.com/wp-content/uploads/2023/12/Sherpa-png-1.png" class="img-responsive prakash" alt="logo">
                                <!-- <div class="pan">
  
							<?php $pan = get_field('pan');
                            if (!empty($pan)) : ?><b>PAN Number:</b>&nbsp;<?php echo $pan; ?><?php endif; ?>	
                        </div> -->
                            </div>


                            <div class="col-md-8 col-sm-7 h_abt_right">
                                <!--<div class="heading">-->
                                <!--    <h1><?php the_field('heading'); ?></h1>-->
                                <!--    <h3><?php the_field('sub_heading'); ?></h3>-->
                                <!--</div>-->
                                <div style="text-align:justify;">
                                <?php the_content(); ?>
</div>
                            </div>


                        </div>

                    </div>
                </div>
            </section>
            <section id="offerWrap" class="divider_bg">
                <div class="container">
                    <div class="row offer-flex">

                        <div class="col-md-7 col-sm-12 offer-child">
                            <div class="heading">
                                <?php $heading_txt = get_field('heading');
                                if ($heading_txt) : ?>
                                    <h3><span style="color: #fd9137;"><?php echo $heading_txt; ?></span></h3><?php endif; ?>
                                <?php the_field('content'); ?>
                            </div>
                        </div>

                        <?php
                        $image = get_field('image');
                        if (!empty($image)) : ?>
                            <div class="col-md-5 col-sm-12">
                                <img src="<?php echo esc_url($image['url']); ?>" class="img-responsive" alt="<?php echo esc_attr($image['alt']); ?>" />

                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </section>
            <section>
                <div class="container">
                    <div class="row why_us">
                        <?php

                        if (have_rows('about_services')) :

                            while (have_rows('about_services')) : the_row();

                                $title = get_sub_field('title');
                                $content = get_sub_field('content');
                                $background_image = get_sub_field('icon');


                        ?>

                                <div class="col-sm-4">
                                    <div class="whyInfo">
                                        <?php

                                        if (!empty($background_image)) : ?>

                                            <img src="<?php echo esc_url($background_image['url']); ?>" class="img-responsive" alt="icon" />
                                        <?php endif; ?>

                                        <h3><?php echo $title; ?></h3>
                                        <p>
                                            <?php echo $content; ?>
                                        </p>
                                    </div>
                                </div>

                        <?php endwhile;
                        endif; ?>

                    </div>
                </div>
            </section>
            <section id="parallax_cov">
                <div class="parallax_caption">
                    <h2>Mera Peak </h2>
                    <p>the highest trekking peak in Nepal</p>
                </div>
                <?php $bg = get_field('background_image'); ?>
                <div id="parallax_Wrap" style="background-image: url('<?php echo esc_url($bg['url']); ?>');">
                </div>
            </section>
        </section>
<?php endwhile;
endif; ?>

<div style="margin-top: 50px; margin-bottom: 50px;">
<h1 style="text-align:center;">Our Instagram</h1>
<?php echo do_shortcode('[wp_social_ninja id="8678" platform="instagram"]'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div style="text-align:center;">
<a href ="https://www.instagram.com/"><i class="fa fa-instagram" style="font-size: 25px;color:#f28c00; font-weight: 900;"></i> Veiw on Instagram</a>    
</div>
</div>
<?php get_footer(); ?>