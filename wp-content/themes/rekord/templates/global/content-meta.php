<?php
/**
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */
?>
<div class="my-5 d-flex align-items-center">
    <div class="d-flex align-items-center">
        <figure class="avatar avatar-md float-left mr-3 mt-1">
            <?php echo get_avatar( get_the_author_meta('user_email'), $size = '50'); ?>
        </figure>
        <div>
            <h6><?php the_author(); ?></h6>
        </div>
    </div>
    <?php get_template_part('templates/global/share', 'plugins'); ?>
</div>