<?php
/**
 *  Artist Single Page
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */


   get_header();

   $slug = 'templates/artist/artist';
   ?>


<!--Page Content-->
<main>
    <div class="container-fluid relative animatedParent animateOnce p-0">
        <div class="animated fadeInUpShort">

            <?php while ( have_posts() ) : the_post(); ?>
            <?php $term_list = wp_get_post_terms($post->ID, 'album-categories', array("fields" => "names")); ?>
            <?php $image = rekord_get_field('cover'); ?>
            <!--Banner-->
            <section class="relative" data-bg-possition="center"
                style="background-image:url('<?php if( $image )  echo esc_url($image['url']); ?>');">
                <div class="has-bottom-gradient">
                    <div class="row pt-5 ml-lg-5 mr-lg-5">
                        <div class="col-md-10 offset-1">
                            <div class="row my-5 pt-5">
                                <div class="col-md-2">
                                    <?php if ( has_post_thumbnail() ) {the_post_thumbnail('', array('class' => 'img-fluid circle'));} ?>
                                </div>
                                <div class="col-md-10">
                                    <div class="d-md-flex align-items-center justify-content-between">
                                        <div>
                                            <h1 class="mt-4 mb-3"><?php the_title(); ?></h1>
                                            <?php   get_template_part('templates/artist/artist','relations-count'); ?>
                                        </div>
                                        <div class="ml-auto mb-2">
                                            <?php get_template_part('templates/global/share', 'plugins'); ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="text-white my-2">
                                                <?php  rekord_the_field('short_summery'); ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom-gradient "></div>
            </section>
            <!--@Banner-->

            <div class="p-3 p-lg-5">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <?php  the_content(); ?>
                        <?php if(rekord_get_field('show_artist_tracks')): ?>
                        <div class="my-3">
                            <?php get_template_part( $slug , 'albums' ); ?>
                        </div>
                        <?php endif; ?>
                        <?php
                        if(rekord_get_field('show_artist_tracks'))
                          get_template_part( $slug , 'tracks' ); 
                         ?>
                    </div>
                </div>
            </div>

            <?php endwhile; // end of the loop. ?>

        </div>
    </div>
</main>

<?php get_footer(); ?>