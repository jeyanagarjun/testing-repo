<?php 
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rekord
 */

get_header();
?>

<main>
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="animated fadeInUpShort p-md-5 p-3">
            <?php if ( have_posts() ) : ?>

            <header class="page-header  mb-5">
                <?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
            </header><!-- .page-header -->

            <div class="row">
                <div class="col-md-8">

                    <?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
                get_template_part('templates/blog/content', 'blog');

			endwhile;

            if (function_exists("rekord_get_pagination")) :
                rekord_get_pagination();
            endif;

		else :

            get_template_part( 'templates/global/content', 'none' );

		endif;
		?></div>

                <div class="col-md-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
</main>
<?php get_footer(); ?>