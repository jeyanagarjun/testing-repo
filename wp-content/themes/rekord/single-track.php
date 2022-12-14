<?php
/**
 *  Track single Page
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */


get_header();

  $slug_album = 'templates/album/album';
  $slug = 'templates/track/track';
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
                style="background-image:url('<?php if( $image ) echo esc_url($image['url']);  ?>');">
                <div class="has-bottom-gradient">
                    <div id="waveform" data-bar-width='3'
                        data-progress-color="<?php if ( ! empty(get_theme_mod( 'primary_color')) )  echo sanitize_hex_color(get_theme_mod( 'primary_color')); ?>">
                    </div>

                    <div class="row pt-5 ml-lg-5 mr-lg-5">
                        <div class="col-md-10 offset-1">
                            <div class="card p-5 dark-opacity">
                                <div class="row">
                                    <div class="col-md-2">
                                        <?php get_template_part( $slug, 'featured-image' );  ?>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="d-md-flex align-items-center justify-content-between">
                                            <h1 class="my-3 h3"><?php the_title(); ?></h1>
                                            <div class="ml-auto mb-2">
                                                <?php get_template_part('templates/global/share', 'plugins'); ?>
                                            </div>
                                        </div>

                                        <div class="d-flex my-4 playlist align-items-center justify-content-between">
                                            <?php
                                          set_query_var( 'icon_classes', 's-24 text-primary' );
                                          get_template_part( $slug, 'url' );  ?>


                                            <span class="col mr-2 track-time">
                                                <?php get_template_part( $slug, 'time' );  ?>
                                            </span>
                                            <?php
                                             if(rekord_get_field('allow_download')): ?>

                                            <?php get_template_part(  $slug, 'download' );  ?>

                                            <?php endif;  ?>

                                            <div class="ml-3">
                                                <?php get_template_part( $slug_album , 'button' );  ?>
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
            <?php 
            
       
            $artists  = rekord_get_field('track_artists'); ?>

            <div class="row pt-1 ml-lg-5 mr-lg-5">
                <div class="col-md-10 offset-1">
                    <div class="card">
                        <div class="card-header transparent">
                            <div class="mt-3">
                                <ul class=" nav nav-tabs ml-2 card-header-tabs nav-material responsive-tab"
                                    role="tablist">
                                    <?php if( !empty( get_the_content() )): ?>
                                    <li class="nav-item">
                                        <a class="nav-link show active" id="tabx-content" data-toggle="tab" href="#tab-content"
                                            role="tab" aria-selected="true">
                                            <span
                                                class="text-capitalize"><?php esc_html_e('Description','rekord') ; ?></span>
                                        </a>
                                    </li>
                                    <?php endif;?>
                                    <?php if(!empty($artists) ): ?>
                                    <li class="nav-item">
                                        <a class="nav-link " id="tabx-0" data-toggle="tab" href="#tab-0"
                                            role="tab" aria-selected="true">
                                            <span
                                                class="text-capitalize"><?php esc_html_e('Artists','rekord') ; ?></span>
                                        </a>
                                    </li>
                                    <?php endif;?>

                                    

                                    <?php if ( comments_open() || '0' != get_comments_number() ): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" id="tabx-1" data-toggle="tab" href="#tab-1" role="tab"
                                            aria-selected="true">
                                            <span
                                                class="text-capitalize"><?php esc_html_e('Comments','rekord') ; ?></span>
                                        </a>
                                    </li>
                                    <?php endif;?>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-1 p-5 mb-5">
                        <div class="tab-content" id="v-pills-tabContent1">
                            <?php if( !empty( get_the_content() )): ?>
                            <div class="tab-pane fade show active" id="tab-content" role="tabpanel" aria-labelledby="tab-content">
                                <?php  the_content(); ?>
                            </div>
                            <?php endif;?>
                            <?php if(!empty($artists) ): ?>
                            <div class="tab-pane fade " id="tab-0" role="tabpanel" aria-labelledby="tab-0">
                                <?php get_template_part( $slug , 'single-artists' );  ?>
                            </div>
                            <?php endif;?>

                            


                            <?php if ( comments_open() || '0' != get_comments_number() ): ?>
                            <div class="tab-pane fade" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
                                <?php  comments_template(); ?>
                            </div>
                            <?php endif;?>

                        </div>
                    </div>
                </div>
            </div>

            <?php endwhile; // end of the loop. ?>

        </div>
    </div>
</main>

<?php get_footer(); ?>