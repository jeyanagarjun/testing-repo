<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @author    xvelopers
 * @package   rekord
 * @version   1.0.0
 */


get_header(); ?>
<main role="main">
    <div class="container relative animatedParent animateOnce">
        <div class="animated fadeInUpShort p-md-5 p-3">
            <div class="row">
                <?php if(is_active_sidebar('default')): ?>
                <div class="col-md-8">
                    <?php else: ?>
                    <div class="col-md-10 offset-md-1">
                        <?php endif; ?>
                        <h1 class="text-primary mb-3"><?php the_title(); ?></h1>
                        <?php
					while ( have_posts() ) : the_post();

						get_template_part( 'content', 'page' );

					endwhile; // end of the loop.

				
				
					?>
                        <?php

				if (get_post_meta($post->ID, 'show_comment_form', true) != 'no'):
					if ( comments_open() || '0' != get_comments_number() )
						comments_template();
				endif;
				?>
                    </div>
                    <?php if(is_active_sidebar('default')): ?>
                    <div class="col-md-4">
                        <?php get_sidebar(); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
</main>

<?php get_footer(); ?>