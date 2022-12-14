<?php
/**
 * The template for displaying Search Results pages.
 *
 * @author    xvelopers
 * @package   rekord
 * @version   1.0.0
 */

get_header(); ?>

<!--Page Content-->
<main>
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="animated fadeInUpShort p-md-5 p-3">
            <section>
                <div class="relative mb-5">
                    <h1 class="mb-2 text-primary">
                        <?php printf( esc_html__( 'Search', 'rekord' ), '<span>' . get_search_query() . '</span>' ); ?>
                    </h1>
                    <p><?php printf( esc_html__( 'Search Results for: %s', 'rekord' ), '<span>' . get_search_query() . '</span>' ); ?>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <?php if ( have_posts() ) : ?>

                        <?php /* Start the Loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'templates/blog/content', 'blog' ); ?>

                        <?php endwhile; ?>

                        <?php if (function_exists("rekord_get_pagination")) {rekord_get_pagination();} ?>
                        <?php else : ?>

                        <?php get_template_part( 'templates/global/content', 'none' ); ?>

                        <?php endif; ?>

                    </div>
                    <div class="col-md-4">
                        <?php get_sidebar(); ?>
                    </div>

                </div>
            </section>
        </div>
    </div>
</main>
<!--@Page Content-->

<?php get_footer();?>