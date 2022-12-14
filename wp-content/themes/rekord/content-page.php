<?php
/**
 * The template used for displaying page content in page.php
 *
 * @author    xvelopers
 * @package   rekord
 * @version   1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
        <?php the_content(); ?>
    </div><!-- .entry-content -->

    <?php
        	wp_link_pages( array(
                'before'      => '<div class="page-links mb-5"><div>',
                'after'       => '</div></div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ) );
        ?>
</article><!-- #post-## -->