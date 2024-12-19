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
              <section id="chooseWrap">
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
                
         <section id="latestDetail" class="secGap">
            <div class="container">
              <div class="row">
                <div class="col-sm-9 latestMain">
                  <div class="topHeading">
                    <h1><?php the_title();?></h1>
                    <?php $ele=get_field('elevation'); if(!empty($ele)):?><h3> <?php echo $ele; ?></h3><?php endif;?>
                    <h4><?php echo get_the_date( 'Y-m-d' ); ?> </h4>
                  </div>
                  <div class="innerContent">
                    <img
                      src="<?php the_post_thumbnail_url('full')?>"
                      class="img-responsive"
                      alt="image"
                    />
                   <?php the_content();?>
                    <div class="newGallery">
                      <h3>Gallery</h3>
                      <div class="row">
                                                                 <?php 
$images = get_field('gallery');
if( $images ): ?>
  
        <?php foreach( $images as $image ): ?>
                                            <div class="col-sm-4 col-xs-6 galCov">
                                                    <img src="<?php echo esc_url($image['sizes']['large']); ?>" class="img-fluid" alt="<?php echo esc_attr($image['alt']); ?>">
                                                </div>
                                
                                               
                                             <?php endforeach; ?>
<?php endif; ?> 
                        
                        
                        
                  
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-3 similarMain">
                  <h1>Similar News</h1>
                  <div class="similarNews">
                    <section id="featuredWrap" class="latesNews">
                      <div class="row">
                      <?php 
global $wp_query;
$post_id= $wp_query->post->ID;

    $newposts = new WP_Query( array(
    'post_type' => 'post', 
    'posts_per_page' =>5,
	'post_status'       => 'publish',
	'post__not_in' => array($post_id),
    
    'orderby'           => 'publish_date',
	'order'             => 'DESC',
	'category__in' => wp_get_post_categories( $post_id ), 
    
    ) );   

 


?>

   <?php if ($newposts->have_posts()) :
while ($newposts->have_posts() ) : $newposts->the_post();
           $url = wp_get_attachment_url( get_post_thumbnail_id() );
		?>	
                        <div class="col-md-12 col-sm-12 mainTrip">
                          <div class="fea_trip clearfix">
                             <a href="<?php the_permalink();?>">
                              <img src="<?php echo $url;?>"  class="img-responsive wp-post-image" alt="trip_img">
                              
                            </a>
                            <div
                              class="feature_info clearfix"
                              style="height: 191px"
                            >
                              <div class="feature_title">
                                    <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                                <h5><?php echo get_the_date( 'Y-m-d' ); ?> <?php $ele=get_field('elevation'); if(!empty($ele)):?>| <?php echo $ele; endif;?></h5>
                              </div>
                              <div class="offer">
                                <a href="<?php the_permalink();?>">
                                  <h3>
                                    view more
                                    <i class="fas fa-long-arrow-alt-right"></i>
                                  </h3>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php endwhile; endif;?>
                 
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </section>       
                
                
                
                
                
                
                
           
    <?php endwhile; endif;?> 
                      <?php get_footer();?>  