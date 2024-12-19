<?php
/*
Template Name: Contact Page
*/
?>
<?php get_header(); ?>
<?php if (have_posts()):
    while (have_posts()):
        the_post(); ?>
        <div id="slider_Wrap" style="background: url(<?php the_post_thumbnail_url('full') ?>);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
    background-attachment: fixed;">
            <section id="chooseWrap" class="affix">
                <?php require_once 'float-menu.php'; ?>

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
        <section id="contactWrap">
            <div class="container">
                <div class="row contact">
                    <div class="col-lg-7 col-md-7 col-sm-7 entry equalht">
                        <div class="title-border">
                            <h2>Contact us</h2>
                        </div>
                        <div class="form-group">
                            <?php echo do_shortcode('[contact-form-7 id="6a5810c" title="Contact form 1"]'); ?>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 equalht left-discp">


                        <?php

                        if (have_rows('contacts')):

                            while (have_rows('contacts')):
                                the_row();


                                $country = get_sub_field('country');
                                $address = get_sub_field('address_1');
                                $pox_box = get_sub_field('pox_box');
                                $phone = get_sub_field('phone');
                                $email = get_sub_field('emails');
                                $email_1 = get_sub_field('emails_1');

                                ?>
                                <div class="c-info">
                                    <h2><?php echo $country; ?></h2>
                                    <ul>
                                        <li> <i class="fas fa-map-marker-alt"></i> <?php echo $pox_box; ?><?php echo $address; ?> </li>
                                        <li><a href="tel:<?php echo $phone; ?>"><i class="fas fa-phone"></i> <?php echo $phone; ?></a>
                                        </li>
                                        <li><a href="mailto:<?php echo $email; ?>"><i class="fas fa-envelope"></i>
                                                <?php echo $email; ?></a></li>
                                        <li><a href="mailto:<?php echo $email_1; ?>"><i
                                                    class="fas fa-envelope"></i><?php echo $email_1; ?></a></li>
                                    </ul>
                                </div>
                                <?php

                                // End loop.
                            endwhile;

                            // No value.
                        else:
                            // Do something...
                        endif;
                        ?>
                        <div class="mapwrap">
                            <?php the_field('map'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="chooseDivider"></section>
    <?php endwhile; endif; ?>

<?php get_footer(); ?>