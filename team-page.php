<?php
/*
Template Name: Team Page
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
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <!--<h1> <span><?php the_title(); ?></span></h1>-->
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!--      <div
            class="modal fade"
            id="galleryModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="galleryModalTitle"
            aria-hidden="true"
          >
        <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="modalImageWrap">
                    <button
                      type="button"
                      class="close"
                      data-dismiss="modal"
                      aria-label="Close"
                    >
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="row">
                      <div class="col-sm-4">
                        <img
                          src=""
                          id="photo_modal"
                          class="img-fluid"
                          name="photo"
                        />
                      </div>
                      <div class="col-sm-8">
                        <h2 id="memberName"></h2>
                        <h5 id="memberPosition"></h5>
                        <div id="memberContent"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> 
          </div>-->
    <section id="teamWrap">
      <div class="container">
        <div class="row">
          <div class="col-md-12 teamDis">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?> <br/>
          </div>
        </div>
        <div class="row teamRow">
          <div class="col-sm-12">

          </div>
          <div class="col-sm-12">
            <div class="teamMain">
              <?php
              $images = get_field('office_team');
              if ($images) : ?>

                <?php foreach ($images as $image) :
                 
                ?>
                    <div class="team">
                        <div class="teamImg">
                          <img src="<?php echo esc_url($image['sizes']['large']); ?>" class="img-fluid" alt="<?php echo esc_attr($image['alt']); ?>">
                        </div>
                        <div class="lowerContent">
                          <h3><?php echo esc_html($image['title']); ?></h3>
                          <p><?php echo esc_html($image['caption']); ?></p>
                        </div>
                        <div class="hiddenContent">
                          <p>
                            <?php echo esc_html($image['description']); ?>
                          </p>
                        </div>
                
                    </div>
                <?php
                  
                endforeach;
                ?>
              <?php endif; ?>

            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="teamWrap">
      <div class="container">
        <div class="row">
          <div class="col-md-12 teamDis">
            <h1><?php the_field('guide-title') ?></h1>
            <?php the_field('giude_team_description') ?>
          </div>
        </div>
        <div class="row teamRow">
          <div class="col-sm-12">

          </div>
          <div class="col-sm-12">
            <div class="teamMain">
              <?php
              $images = get_field('staffs');
              if ($images) : ?>

                <?php foreach ($images as $image) :
                 
                ?>
                    <div class="team">
                        <div class="teamImg">
                          <img src="<?php echo esc_url($image['sizes']['large']); ?>" class="img-fluid" alt="<?php echo esc_attr($image['alt']); ?>">
                        </div>
                        <div class="lowerContent">
                          <h3><?php echo esc_html($image['title']); ?></h3>
                          <p><?php echo esc_html($image['caption']); ?></p>
                        </div>
                        <div class="hiddenContent">
                          <p>
                            <?php echo esc_html($image['description']); ?>
                          </p>
                        </div>
                
                    </div>
                <?php
                  
                endforeach;
                ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php endwhile;
endif; ?>
 
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

<?php get_footer(); ?>