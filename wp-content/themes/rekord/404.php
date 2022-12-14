<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @author    xvelopers
 * @package   rekord
 * @version   1.0.0
 */
get_header();?>

<main>
    <div class="container">
        <div class="col-xl-8 mx-lg-auto">
            <div class="pt-5 p-t-100 text-center">
                <h1 class="text-primary"><?php esc_html_e('oops!','rekord'); ?></h1>
                <p class="section-subtitle">
                    <?php esc_html_e('Something went wrong. The page you are looking for is gone','rekord'); ?>
                </p>
                <p class="s-256"><?php esc_html_e('404!','rekord'); ?></p>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>