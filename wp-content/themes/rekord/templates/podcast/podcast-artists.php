<?php
/**
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */
?>
<?php $artists = rekord_get_field('track_artists'); ?>
<?php if( $artists ): ?>
<div class="avatar-group">
    <?php 
    foreach($artists as $post):
        setup_postdata($post);  
        ?>
    <figure class="avatar no-shadow">
        <?php if ( has_post_thumbnail() ) {the_post_thumbnail('small', array('class' => 'circle img-fluid'));} ?>
    </figure>
    <?php endforeach; ?>
</div>
<?php wp_reset_postdata();

// IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif;?>