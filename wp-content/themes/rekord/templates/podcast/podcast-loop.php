<?php
/**
 * @author    xvelopers
 * @package   rekord
 * @version   1.0.0
 */
?>
<div class="card mb-3">
    <div class="card-body">
        <div class=" d-flex align-items-center">
            <div class="col-8 p-0">
                <div class="float-left mr-3 mt-2">
                    <?php get_template_part('templates/track/track', 'url'); ?>
                </div>
                <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                <small>
                    <?php rekord_the_field('episode'); ?>
                    <?php
                    if(!empty(rekord_get_field('date'))):
                        echo ' - ' . rekord_get_field('date'); 
                        endif;
                   ?>
                </small>
            </div>
            <span class=" ml-auto"> <?php get_template_part('templates/track/track', 'time'); ?> </span>
            <div class="relative ml-3">
                <?php 
                if(rekord_get_field('allow_download')): ?>
                <?php get_template_part( 'templates/track/track', 'download' );  ?>
                <?php endif;  ?>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <div class=" d-none d-lg-block">
                <div class="mt-3">
                    <?php get_template_part('templates/podcast/podcast', 'artists'); ?>
                </div>
            </div>
            <div class="relative ml-auto mt-3">
                <?php  get_template_part( 'templates/global/social', 'share' ); ?>
            </div>
        </div>
    </div>
</div>