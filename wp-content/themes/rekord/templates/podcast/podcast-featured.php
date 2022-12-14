  <!--Banner-->
  <section class="relative xv-slide" data-bg-possition="center" data-bg-repeat="false"
      style="background-image:url('assets/img/demo/podcast.jpg');">
      <div class="has-bottom-gradient p-md-5 p-3">
          <div class="row">
              <div class="col-md-6 mt-5">
                  <div class="relative mb-5 text-white">
                      <h2> <?php rekord_the_field('episode'); ?></h2>
                      <h1 class="mb-2"><?php the_title(); ?></h1>
                  </div>


                  <div class="d-flex justify-content-between align-items-center playlist">
                      <a class="no-ajaxy media-url" href="assets/media/track1.mp3" data-wave="assets/media/track1.json">
                          <div class="mr-3">
                              <i class="icon-play s-48"></i>
                          </div>
                      </a>
                      <span class="badge badge-primary badge-pill">
                          <?php get_template_part('templates/track/track', 'time'); ?></span>

                      <div class="ml-auto">
                          <?php  get_template_part( 'templates/global/social', 'share' ); ?>
                      </div>
                  </div>

                  <div class="avatar-group my-5">
                      <?php get_template_part('templates/podcast/podcast', 'artists'); ?>
                  </div>
              </div>
          </div>
      </div>
      <div class="bottom-gradient "></div>
  </section>
  <!--@Banner-->