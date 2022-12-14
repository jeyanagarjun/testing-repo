<?php
/**
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */
?>
<div class="col-md-4 mb-3">
    <figure class="avatar avatar-md float-left mr-3 mt-1">
        <a href="<?php the_permalink(); ?>">
            <?php if ( has_post_thumbnail() ) {the_post_thumbnail('', array('class' => 'img-fluid'));} ?></a>
    </figure>
    <div>
        <h6> <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h6>
        <?php   get_template_part('templates/artist/artist','relations-count'); ?>
    </div>
</div>