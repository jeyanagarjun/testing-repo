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
            <img src="<?php echo esc_url( get_avatar_url( $user->ID ) );?>" class="img-fluid circle">
         </a>
    </figure>
    <div>
        <h6> <a href="<?php the_permalink(); ?>">
                <?php echo $user->display_name; ?>
            </a>
        </h6>
        <?php //  get_template_part('templates/artist/artist','relations-count'); ?>
    </div>
</div>