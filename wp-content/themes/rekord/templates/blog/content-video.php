<?php
/**
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */
?>

<div class="card">
    <figure class="card-img figure">
        <div class="img-wrapper">
            <?php 
                if ( has_post_thumbnail() ) {the_post_thumbnail(@$imageSize ?: "full", array('class' => 'img-fluid'));}
             ?>
        </div>
        <div class="img-overlay"></div>
        <div class="has-bottom-gradient">
            <div class="d-flex">
                <div class="card-img-overlay">
                    <div class="pt-3 pb-3">
                        <a href="<?php the_permalink(); ?>">
                            <figure class="float-left mr-3 mt-1">
                                <i class="icon-play s-36"></i>
                            </figure>
                            <div>
                                <h5><?php the_title(); ?></h5>
                                <small>
                                    <?php
                printf( _nx( '1 Comment', '%1$s Comments', get_comments_number(), 'comments title','rekord' ),
                number_format_i18n( get_comments_number() ));

              
                ?>
                                </small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </figure>
    <div class="bottom-gradient bottom-gradient-thumbnail"></div>
</div>