<?php
/**
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */

$term_list = wp_get_post_terms($post->ID, 'album-categories', array("fields" => "names")); ?>
<?php 
    $saved_data = get_post_meta($post->ID,'attach_artist',true);
    $artist = '--';
    if(!empty($saved_data )){
        $artist =  get_post($saved_data[0])->post_title; 
    }

    ?>

<figure>
    <div class="img-wrapper">
        <?php if ( has_post_thumbnail() ) {the_post_thumbnail('', array('class' => 'img-fluid'));} ?>
        <div class="img-overlay text-white text-center">
            <a href="<?php the_permalink(); ?>">
                <div class="figcaption mt-3">
                    <i class="icon-link s-48"></i>
                    <h5 class="mt-5"><?php the_title(); ?></h5>
                    <span><?php echo esc_html($artist, 'rekord'); ?></span>
                </div>
            </a>
        </div>
        <div class="figure-title text-center p-2">
            <h5><?php the_title(); ?></h5>
            <span><?php echo esc_html($artist, 'rekord'); ?></span>
        </div>
    </div>
</figure>