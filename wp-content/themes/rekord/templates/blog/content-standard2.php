<?php
/**
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */
?>
<div class="relative">
    <div class="mb-2 no-b p-3" data-bg-size="cover"
        style="background-image:url('<?php echo get_the_post_thumbnail_url() ?>') !important;">
        <div class="<?php echo has_post_thumbnail() ? 'has-bottom-gradient' : ''; ?>">
            <div class="card-body">
                <h5 class="card-title text-truncate"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h5>
                <p class="card-text">
                    <?php echo rekord_get_excerpt(100); ?>
                </p>
            </div>
           
            <div class="p-3 d-none d-lg-block">
            <?php if(get_query_var('author_info')) :?>
                <figure class="avatar avatar-md float-left mr-3 mt-1">
                    <?php 
                        echo  get_avatar( get_the_author_meta( 'user_email' ), '50', '', '', array( 'class' => array( 'circle') ) );
                             ?>
                </figure>
                <div>
                    <h6> <?php the_author_meta('display_name'); ?></h6>
                    <?php the_author_meta('user_email'); ?>
                </div>
                <?php endif; ?>
            </div>
             
        </div>

    </div>
    <?php if ( has_post_thumbnail() ) :?>
    <div class="bottom-gradient"></div>
    <?php endif; ?>
</div>