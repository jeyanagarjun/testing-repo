<?php
/**
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */
?>
<div id="filter-items" class="row masonry-container lightGallery">
    <?php query_posts(array('post_type'=>'gallery','paged'=>$paged));  ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php $termIds = wp_get_post_terms($post->ID, 'gallery-categories', array("fields" => "ids"));
                    $calasses = '';
                    foreach ( $termIds  as $id) :
                        $calasses .=' type'.$id;
                    endforeach;
                ?>

    <div class="col-md-4 mb-2 masonry-post <?php echo esc_attr($calasses); ?>">
        <figure>
            <div class="img-wrapper">
                <?php if ( has_post_thumbnail() ) {the_post_thumbnail('', array('class' => 'img-fluid'));} ?>
                <div class="img-overlay figure-caption text-white">
                    <div class="figcaption d-flex justify-content-around mt-2">

                        <?php  $image = wp_get_attachment_url(get_post_thumbnail_id(rekord_get_field('track_album')),'','', array( "class" => "img-fluid r-3" ) ); ?>


                        <a href="<?php echo esc_url($image,'rekord'); ?>" class="light-post no-ajaxy">
                            <i class="icon-zoom-in s-48"></i>
                        </a>


                    </div>
                </div>
            </div>
        </figure>
    </div>
    <?php  endwhile; endif;   ?>
</div>