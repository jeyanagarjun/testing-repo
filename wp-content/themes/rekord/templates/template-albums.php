<?php
/**
 * Template Name: Albums
 *
 * @author    xvelopers
 * @package   rekord
 * @version   1.0.0
 */

get_header();?>
<main>
    <div class="container relative animatedParent animateOnce">
        <div class="animated fadeInUpShort p-5 ml-lg-5 mr-lg-5">
            <section>
                <div class="relative mb-5">
                    <h1 class="mb-2 text-primary"><?php the_title(); ?></h1>
                    <?php
					while ( have_posts() ) : the_post();

						get_template_part( 'content', 'page' );

					endwhile; // end of the loop.
					?>
                </div>
                <div class="row has-items-overlay">
                    <?php
                     $postsPerPage = rekord_get_field('posts_number');
                     $postsOrder= rekord_get_field('posts_order');
                     query_posts(array('post_type'=>'album','paged'=>$paged, 'posts_per_page'=> $postsPerPage,'order' => $postsOrder));  

                     if (have_posts()) : while (have_posts()) : the_post();  ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 my-2">
                        <?php   get_template_part(  'templates/album/album', 'loop' );?>
                    </div>

                    <?php  endwhile; endif;   ?>
                </div>
                <div class="my-3">
                    <?php if (function_exists("rekord_get_pagination")) rekord_get_pagination();?>
                </div>
            </section>
        </div>
    </div>
</main>
<?php get_footer(); ?>