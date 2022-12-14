<?php
/**
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('card mb-3'); ?>>
    <div class="article-header">
        <div class="media">
            <div class="mr-4 ml-md-4 text-md-center mt-3">
                <div class="s-24"><?php the_time('j'); ?></div>
                <small><?php the_time('M, Y'); ?></small>
            </div>
            <div class="media-body">
                <div>
                    <a href="<?php the_permalink(); ?>">
                        <h2 class="h3 my-3 text-primary"> <?php the_title(); ?></h2>
                    </a>
                    <ul
                        class="align-baseline list-inline article-meta <?php if(empty(get_the_title())) echo 'pt-4'; ?>">
                        <?php if (has_category()) : ?>
                        <li class="list-inline-item"><i class="icon-folder text-primary mr-2"></i>
                            <?php echo get_the_category_list(', '); ?>
                        </li>
                        <?php endif; ?>
                        <li class="list-inline-item"><i class="icon-list-1 text-primary mr-2"></i>
                            <?php
                    printf( _nx( '1 Comment', '%1$s Comments', get_comments_number(), 'comments title','rekord' ),
                    number_format_i18n( get_comments_number() )); 
                ?>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php if ( has_post_thumbnail() ) : ?>
    <figure class="mb-3">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('', array('class' => 'img-fluid')); ?></a>
    </figure>
    <?php endif; ?>
    <div class="card-body p-4">
        <div class="mb-3">
            <?php if ( !empty( get_the_content() ) ) : ?>
            <p><?php echo rekord_get_excerpt( 200); ?></p>
            <?php endif; ?>
        </div>
        <div class="d-flex align-items-center mt-4">
            <div>
                <div class="avatar avatar-sm mr-2">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
                </div>
                <?php the_author(); ?>
            </div>
            <a href="<?php the_permalink(); ?>" class="ml-auto"><i
                    class="icon icon-link mr-2 "></i><?php esc_html_e('Read More','rekord') ?></a>
        </div>

    </div>
</article>