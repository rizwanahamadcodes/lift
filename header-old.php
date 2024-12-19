<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php wp_title(); ?></title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <?php wp_head(); ?>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->

        <!-- Page Content Holder -->
        <div id="content">
            <header>
                <nav id="sidebar">
                    <div id="dismiss">
                        <i class="fas fa-times"></i>
                    </div>

                    <div class="sidebar-header">
                        <h1></h1>
                    </div>
                    <?php
                    wp_nav_menu(array(
                        'menu' => 'Main Menu', // Do not fall back to first non-empty menu.
                        'theme_location' => 'primary',
                        'fallback_cb' => false, // Do not fall back to wp_page_menu()
                        'container' => false,
                        'items_wrap' => '<ul class="list-unstyled components">%3$s</ul>'
                    ));
                    ?>
                    <!--<div class="gflg"<?php //echo do_shortcode(''); ?></div>-->
                </nav>
                <nav id="navWrap" class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn navbar-btn">
                                <i class="fas fa-bars"></i>
                                <!--<span>Menu</span>-->
                            </button>
                        </div>
                        <a class="brand" href="<?php echo esc_url(home_url('/')); ?>">
                            <?php $the_query = new WP_Query('page_id=7'); ?>
                            <?php while ($the_query->have_posts()):
                                $the_query->the_post(); ?>
                                <?php
                                $image = get_field('logo');
                                if (!empty($image)): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>"
                                        alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                            <?php endwhile; ?>
                            <!--<h1><?php echo bloginfo('name'); ?></h1>-->
                            <!--<p><?php echo bloginfo('description'); ?></p>-->
                        </a>
                        <?php $the_query = new WP_Query('page_id=35'); ?>
                        <?php while ($the_query->have_posts()):
                            $the_query->the_post(); ?>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">

                                    <li class="s_hide"><a href="#" style="    text-align: left;"> PAN No. -
                                            <?php echo get_field('pan', 7); ?> <br> Comapny Regd. No. -
                                            <?php echo get_field('registration', 7); ?>
                                        </a>
                                    </li> <br>


                                </ul>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </nav>
            </header>
            <main>