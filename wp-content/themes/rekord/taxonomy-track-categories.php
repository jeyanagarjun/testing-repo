<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.WordPress.org/Template_Hierarchy
 *
 * @author    xvelopers
 * @package   rekord
 * @version   1.0.0
 */
get_header(); ?>

<main>
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="animated fadeInUpShort p-md-5 p-3">

            <?php if (have_posts()) : ?>

            <div class="row">
                <div class="col-md-8">
                    <header class="relative mb-5">
                        <h1 class="mb-2 text-primary">
                            <?php single_cat_title(); ?>
                        </h1>
                        <?php
                    // Show an optional term description.
                    $term_description = term_description();
                    if (!empty($term_description)) :
                        printf('<p class="taxonomy-description">%s</p>', $term_description);
                    endif;
                    ?>
                    </header>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <ul class="list-group playlist">
                        <?php while (have_posts()) : the_post(); 
                                $options = set_query_var('options', [
                                    'show_thumb' => true,
                                    'show_artists'=>true,
                                    'show_time'=>true,
                                    'show_button'=>true,
                                    'show_share'=>true,
                                    ]
                                );
                  
                                get_template_part('templates/track/track', 'list');  
                        
                                 endwhile; 
                        ?>
                    </ul>
                    <?php 
                    if (function_exists("rekord_get_pagination")):
                    rekord_get_pagination();
                    endif; ?>
                </div>
            </div>



            <?php else : ?>

            <?php get_template_part('content', 'none'); ?>

            <?php endif; ?>

        </div>
    </div>
</main>
<?php get_footer(); ?>