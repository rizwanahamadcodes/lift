<?php get_header(); ?>
<?php if (have_posts()):
    while (have_posts()):
        the_post(); ?>

        <?php
        // Get the ACF image field value
        $image = get_field('image');
        // Check if the image exists and get its URL
        $image_url = !empty($image) ? esc_url($image['url']) : 'path/to/your/fallback-image.jpg';
        ?>

        <div id="slider_Wrap" style="background: url(<?php echo $image_url; ?>);
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
                                <h1> <span><?php the_title(); ?></span></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="member-wrapper">
                        <img class="member-image" src="<?php the_post_thumbnail_url('full'); ?>" />
                        <div class="member-details">
                            <?php the_content(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endwhile;
endif; ?>
<?php get_footer(); ?>