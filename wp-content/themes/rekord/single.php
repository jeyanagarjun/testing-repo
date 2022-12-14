<?php
/**
 * The Template for displaying all single posts.
 *
 * @author    xvelopers
 * @package   rekord
 * @version   1.0.0
 */

get_header(); ?>


<main>
    <div class="container-fluid relative animatedParent animateOnce no-p">
        <div class="animated fadeInUpShorts mb-5">
            <?php while ( have_posts() ) : the_post(); ?>
            <!--Banner-->
            <?php if ( has_post_thumbnail() ): ?>
            <div class="relative xv-slide" data-bg-possition="top"
                style="background-image:url( <?php echo get_the_post_thumbnail_url() ?>)">
                <div class="bottom-gradient "></div>
            </div>
            <?php endif ;?>
            <!--@Banner-->

            <div class="row p-3">
                <div class="col-lg-8 offset-lg-2 p-3">
                    <div class="entry-content">
                        <?php get_template_part( 'content', 'single' ); ?>
                    </div>
                    <?php
                        wp_link_pages( array(
                            'before'      => '<div class="page-links mb-5"><div>',
                            'after'       => '</div></div>',
                            'link_before' => '<span>',
                            'link_after'  => '</span>',
                        ) );
                     ?>
                    <div>
                        <?php
                        /* translators: used between list items, there is a space after the comma */
                        $tags_list = get_the_tag_list( '', esc_html__( ', ', 'rekord' ) );
                        if ( $tags_list ) :
			        ?>
                        <span class="tags-links">
                            <?php printf( esc_html__( 'Tagged:  %1$s', 'rekord' ), $tags_list ); ?>
                        </span>
                    </div>
                    <?php endif; // End if $tags_list ?>

                    <?php
                    //  If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() )
                    comments_template();
                    ?>

                </div>
            </div>

            <?php endwhile; // end of the loop. ?>


        </div>
    </div>
</main>

<?php get_footer(); ?>