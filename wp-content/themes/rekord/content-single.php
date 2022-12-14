<?php
/**
 *  Rekord Singe Content
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
    <h1 class="font-weight-lighter"> <?php the_title(); ?> </h1>
    <?php get_template_part( 'templates/global/content', 'meta' ); ?>

    <div class="my-5">
        <?php the_content(); ?>
    </div>
</article>