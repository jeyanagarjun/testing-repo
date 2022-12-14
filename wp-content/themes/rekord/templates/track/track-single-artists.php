<?php
/**
 *
 * @author    xvelopers
 * @package   rekord
 * @version   1.0.0
 */

?>


<div class="row">
    <?php 
$artists  = rekord_get_field('track_artists'); 
foreach($artists as $artist):
$post = $artist;
setup_postdata($post);
?>

    <div class="col-md-4 mb-3">
        <div class="d-flex align-items-center">
            <div class="col-10">
                <figure class="avatar avatar-md float-left  mr-3 mt-1">
                    <?php if ( has_post_thumbnail() ) {the_post_thumbnail( array(75,75), array('class' => 'img-fluid') );}?>
                </figure>
                <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                <?php   get_template_part('templates/artist/artist','relations-count'); ?>
            </div>
        </div>
    </div>
    <?php endforeach; wp_reset_postdata(); ?>
</div>