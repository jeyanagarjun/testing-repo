<?php
/**
 * Template Name: Gallery
 *
 * @author    xvelopers
 * @package   rekord
 * @version   1.0.0
 */



 
get_header();?>
<main>
    <div class="container relative animatedParent animateOnce no-p">
        <!--Banner-->
        <section class="relative section text-white" data-bg-possition="top"
            style="background:url(<?php echo rekord_get_field('cover')['url']; ?>)">
            <div class="has-bottom-gradient p-md-5 p-3">
                <?php while ( have_posts() ) : the_post();?>
                <div class="relative mb-5">
                    <h1 class="mb-2 text-primary"><?php the_title(); ?></h1>
                    <p><?php the_content(); ?></p>
                </div>
                <?php endwhile; // end of the loop ?>
                <div class="ml-3">

                    <?php get_template_part('templates/gallery/gallery', 'filter'); ?>

                </div>
            </div>
            <div class="bottom-gradient "></div>
        </section>
        <!--@Banner-->
        <div class="animated fadeInUpShort p-md-5 p-3 pull-up-lg">
            <?php get_template_part('templates/gallery/gallery', 'loop'); ?>

            <div class="my-3">
                <?php if (function_exists("rekord_get_pagination")) {rekord_get_pagination();} ?>
            </div>
        </div>
    </div>

</main>
<?php get_footer(); ?>