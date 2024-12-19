
<?php
/*
Template Name: Newsletter
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
                        <!-- Begin Mailchimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
	/* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div id="mc_embed_signup">
<form action="https://sherpaprakash.us19.list-manage.com/subscribe/post?u=323ef82c72a375d48af837502&amp;id=3ce9d360d0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
	<h2>Subscribe</h2>
	<div class="mc-field-group col-md-4">
	
	<input type="text" value="" name="FNAME" class="" id="mce-FNAME" placeholder="First Name">
</div>
<div class="mc-field-group col-md-4">
	<input type="text" value="" name="LNAME" class="" id="mce-LNAME" placeholder="Last Name">
</div>
<div class="mc-field-group col-md-4">
	<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email Address*">
</div>

	<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_323ef82c72a375d48af837502_3ce9d360d0" tabindex="-1" value=""></div>
    <div class="clear  col-md-12"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
    </div>
</form>
</div>

<!--End mc_embed_signup-->
                    </div>
    <?php endwhile; endif;?>

<?php get_footer();?>