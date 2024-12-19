<?php
/*
Template Name: News Detail Page
*/
?>
<?php get_header();?>
<?php if(have_posts()):
    while (have_posts()): the_post();?>
        <div id="slider_Wrap" style="background: url(<?php bloginfo('template_url');?>/images/finalized/Alpine.jpg);
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
                    <h1>Main Title</h1>
                    <h4>FEB 03, 2021</h4>
                  </div>
                  <div class="innerContent">
                    <img
                      src="<?php bloginfo('template_url');?>/images/island.jpg"
                      class="img-responsive"
                      alt="image"
                    />
                    <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      Aliquam optio facere accusamus fuga, quo veritatis, enim
                      modi voluptates architecto officiis vel, dolorum magni
                      aspernatur excepturi alias veniam maiores incidunt labore?
                    </p>
                    <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      Aliquam optio facere accusamus fuga, quo veritatis, enim
                      modi voluptates architecto officiis vel, dolorum magni
                      aspernatur excepturi alias veniam maiores incidunt labore?
                    </p>
                    <ul>
                      <li>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      </li>
                      <li>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      </li>
                      <li>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      </li>
                      <li>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      </li>
                      <li>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      </li>
                      <li>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      </li>
                      <li>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      </li>
                      <li>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      </li>
                    </ul>
                    <h3>Sub Heading</h3>
                    <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      Aliquam optio facere accusamus fuga, quo veritatis, enim
                      modi voluptates architecto officiis vel, dolorum magni
                      aspernatur excepturi alias veniam maiores incidunt labore?
                    </p>
                    <div class="newGallery">
                      <h3>Gallery</h3>
                      <div class="row">
                        <div class="col-sm-4 col-xs-6 galCov">
                          <img
                            src="<?php bloginfo('template_url');?>/images/Manaslu.jpg"
                            class="img-responsive"
                            alt="image"
                          />
                        </div>
                        <div class="col-sm-4 col-xs-6 galCov">
                          <img
                            src="<?php bloginfo('template_url');?>/images/Manaslu.jpg"
                            class="img-responsive"
                            alt="image"
                          />
                        </div>
                        <div class="col-sm-4 col-xs-6 galCov">
                          <img
                            src="<?php bloginfo('template_url');?>/images/Manaslu.jpg"
                            class="img-responsive"
                            alt="image"
                          />
                        </div>
                        <div class="col-sm-4 col-xs-6 galCov">
                          <img
                            src="<?php bloginfo('template_url');?>/images/Manaslu.jpg"
                            class="img-responsive"
                            alt="image"
                          />
                        </div>
                        <div class="col-sm-4 col-xs-6 galCov">
                          <img
                            src="<?php bloginfo('template_url');?>/images/Manaslu.jpg"
                            class="img-responsive"
                            alt="image"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-3 similarMain">
                  <h1>Similar News</h1>
                  <div class="similarNews">
                    <section id="featuredWrap" class="latesNews">
                      <div class="row">
                        <div class="col-md-12 col-sm-12 mainTrip">
                          <div class="fea_trip clearfix">
                            <a
                              href="http://www.sherpaprakash.com.np/ace/european-mountain/"
                            >
                              <img
                                src="http://www.sherpaprakash.com.np/ace/wp-content/uploads/2020/04/Prakash-Werfener-Hutte-www.sherpaprakash.com_.np_-e1585770811330.jpg"
                                class="img-responsive wp-post-image"
                                alt=""
                              />
                            </a>
                            <div
                              class="feature_info clearfix"
                              style="height: 191px"
                            >
                              <div class="feature_title">
                                <h3>
                                  <a
                                    href="http://www.sherpaprakash.com.np/ace/european-mountain/"
                                    >European Mountain</a
                                  >
                                </h3>
                                <h5>FEB 03, 2021</h5>
                              </div>
                              <div class="offer">
                                <a
                                  href="http://www.sherpaprakash.com.np/ace/european-mountain/"
                                >
                                  <h3>
                                    view more
                                    <i class="fas fa-long-arrow-alt-right"></i>
                                  </h3>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12 col-sm-12 mainTrip">
                          <div class="fea_trip clearfix">
                            <a
                              href="http://www.sherpaprakash.com.np/ace/mountaineering-training/"
                            >
                              <img
                                src="http://www.sherpaprakash.com.np/ace/wp-content/uploads/2021/03/Prakash-sherpa-Nepal-scaled.jpg"
                                class="img-responsive wp-post-image"
                                alt=""
                              />
                            </a>
                            <div
                              class="feature_info clearfix"
                              style="height: 191px"
                            >
                              <div class="feature_title">
                                <h3>
                                  <a
                                    href="http://www.sherpaprakash.com.np/ace/mountaineering-training/"
                                    >Mountaineering Training</a
                                  >
                                </h3>
                                <h5>FEB 03, 2021</h5>
                              </div>
                              <div class="offer">
                                <a
                                  href="http://www.sherpaprakash.com.np/ace/mountaineering-training/"
                                >
                                  <h3>
                                    view more
                                    <i class="fas fa-long-arrow-alt-right"></i>
                                  </h3>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12 col-sm-12 mainTrip">
                          <div class="fea_trip clearfix">
                            <a
                              href="http://www.sherpaprakash.com.np/ace/nepal-at-a-glance/"
                            >
                              <img
                                src="http://www.sherpaprakash.com.np/ace/wp-content/uploads/2020/02/Alpine-Course-www.sherpaprakash.com_.np-climbing-.jpg"
                                class="img-responsive wp-post-image"
                                alt=""
                              />
                            </a>
                            <div
                              class="feature_info clearfix"
                              style="height: 191px"
                            >
                              <div class="feature_title">
                                <h3>
                                  <a
                                    href="http://www.sherpaprakash.com.np/ace/nepal-at-a-glance/"
                                    >Nepal at a glance</a
                                  >
                                </h3>
                                <h5>FEB 03, 2021</h5>
                              </div>
                              <div class="offer">
                                <a
                                  href="http://www.sherpaprakash.com.np/ace/nepal-at-a-glance/"
                                >
                                  <h3>
                                    view more
                                    <i class="fas fa-long-arrow-alt-right"></i>
                                  </h3>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php endwhile; endif;?>

<?php get_footer();?>
