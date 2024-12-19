<?php
/*
Template Name: Staffs
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
                                <?php //the_content(); ?>
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

                        <h1><?php the_title(); ?></h1>

                        <h3><?php the_field('heading'); ?></h3>
                        <?php the_content(); ?>

                    </div>

                </div>
            </div>
        </section>
        <?php
        $args = array(
            'post_type' => 'team',            // The custom post type
            'posts_per_page' => -1,                // Number of posts to display, -1 shows all posts
            'orderby' => 'date',            // Order by the publish date
            'order' => 'ASC',             // ASC for ascending (oldest first), DESC for newest first
            'tax_query' => array(
                array(
                    'taxonomy' => 'team_category', // The taxonomy name
                    'field' => 'slug',          // Use 'slug' to filter by term slug
                    'terms' => 'staffs',        // The term to filter by
                    'operator' => 'IN',            // 'IN' means we want posts that belong to this term
                ),
            ),
        );

        $team_query = new WP_Query($args); ?>

        <section id="detailWrap">
            <div class="container">
                <div class="row tripflex">
                    <div class="col-md-12 collectionTOp" data-aos="fade-up">
                        <?php
                        if ($team_query->have_posts()):
                            while ($team_query->have_posts()):
                                $team_query->the_post();
                                ?>
                                <a href="">
                                    <div class="col-md-4 col-sm-4 mainTrip">
                                        <div class="staff clearfix">

                                            <div class="img-responsive">
                                                <?php the_post_thumbnail('full'); ?>
                                            </div>
                                            <div class="staff-details">
                                                <h2 class="staff-name"><?php the_title(); ?></h2>
                                                <h3 class="staff-designation">Managing Director</h3>
                                            </div>

                                            <div class="team-excerpt"><?php //the_excerpt(); ?></div>
                                        </div>
                                    </div>
                                </a>
                                <?php
                            endwhile;
                        else:
                            echo '<p>No team members found in this category.</p>';
                        endif; ?>
                    </div>

                </div>
            </div>
        </section>
    <?php endwhile; endif;

get_footer();
?>