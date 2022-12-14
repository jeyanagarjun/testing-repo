<?php
/**
 *  Single Video
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */

get_header(); ?>

<div class="container-fluid relative animatedParent animateOnce">
    <div class="animated fadeInUpShort p-4 mt-2">
        <div class="row">
            <div class="col-lg-8">
                <?php while ( have_posts() ) : the_post(); ?>
                <div class="video-responsive">
                    <div class="card no-b r-0">
                        <div class="card-body p-4">
                            <div class="d-lg-flex align-items-center">
                                <h1 class="my-3 h4"><?php the_title();?> </h1>
                                <?php get_template_part('templates/global/share', 'plugins'); ?>

                            </div>
                        </div>
                    </div>
                    <div class="embed-container">
                        <?php rekord_the_field('video'); ?>
                    </div>
                </div>
                <?php endwhile; // end of the loop. ?>
                <div class="card mt-1 mb-5">
                    <div class="card-body">
                        <?php
                            //  If comments are open or we have at least one comment, load up the comment template
                            if ( comments_open() || '0' != get_comments_number() )
                            comments_template();
                        ?>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <?php get_sidebar() ; ?>
            </div>
        </div>

    </div>
</div>

<?php get_footer(); ?>