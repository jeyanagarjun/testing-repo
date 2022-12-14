<?php
/**
 * Template Name: Events
 *
 * @author    xvelopers
 * @package   rekord
 * @version   1.0.0
 */


get_header();?>
<!--Page Content-->
<main>
    <div class="container relative animatedParent animateOnce">
        <div class="animated fadeInUpShort p-md-5 p-3">
            <div class="relative mb-5">
                <h1 class="mb-2 text-primary"><?php the_title(); ?></h1>
                <?php
					while ( have_posts() ) : the_post();

						get_template_part( 'content', 'page' );

					endwhile; // end of the loop.
                    ?>

                <div class="row">
                    <?php
                    $postsPerPage = rekord_get_field('posts_number');
                    $postsOrder= rekord_get_field('posts_order');
                    query_posts(array('post_type'=>'event','paged'=>$paged, 'posts_per_page'=> $postsPerPage,'order' => $postsOrder));  ?>
                    <?php if (have_posts()) : while (have_posts()) : the_post();?>

                    <div class="col-md-4">
                        <?php get_template_part( 'templates/event/event', 'loop' );?>
                    </div>

                    <?php  endwhile; endif;   ?>
                </div>
                <div class="my-3">
                    <?php
                  if (function_exists("rekord_get_pagination")) {rekord_get_pagination();}
                   ?>
                </div>
            </div>
        </div>
    </div>
</main>
<!--@Page Content-->
<?php get_footer(); ?>