<?php
/**
 * The Template for displaying all blog posts.
 *
 * @author    xvelopers
 * @package   rekord
 * @version   1.0.0
 */

get_header();
?>
<!--Page Content-->
<main>
    <div class="container relative animatedParent animateOnce">
        <div class="animated fadeInUpShort p-md-5 pt-3 pb-3">
            <section>
                <?php if(is_active_sidebar('default')): ?>
                <div class="relative mb-5">
                    <h1 class="mb-2 text-primary"><?php esc_html_e('WaterCooler Blog', 'rekord');?></h1>
                </div>
                <?php endif; ?>


                <div class="row">
                    <?php if(is_active_sidebar('default')): ?>
                    <div class="col-md-8">
                        <?php else: ?>
                        <div class="col-md-10 offset-md-1">
                            <div class="relative mb-5">
                                <h1 class="mb-2 text-primary"><?php esc_html_e('WaterCooler Blog', 'rekord');?></h1>
                            </div>
                            <?php endif; ?>

                            <?php
                    while (have_posts()): the_post();

                        get_template_part('templates/blog/content', 'blog');

                    endwhile; // end of the loop.
                    //DISPLAY MODE - NUMBER OF ITEMS TO BE DISPLAY - PAGINATION
                    if (function_exists("rekord_get_pagination")) {rekord_get_pagination();}
                    ?>

                        </div>
                        <?php if(is_active_sidebar('default')): ?>
                        <div class="col-md-4">
                            <?php get_sidebar(); ?>
                        </div>
                        <?php endif; ?>
					</div>
                    </div>
            </section>
        </div>
    </div>
</main>
<!--@Page Content-->

<?php get_footer();?>