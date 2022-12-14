<?php
/**
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */
  $slug = 'templates/gallery/content'; ?>
<div class="container">
    <?php get_template_part( $slug , 'gallery' );  ?>
</div>
<div class="artist">
    <div class="col-lg-4 col-md-4 col-sm-4">
        <?php if ( has_post_thumbnail() ) {the_post_thumbnail();}?>
    </div>
    <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="artist-detail-content">
            <h3>
                <?php the_title(); ?>
            </h3>
            <?php the_content(); ?>
        </div>
        <!--//artist-detail-content-->
    </div>
</div>
<!--\\artist-->