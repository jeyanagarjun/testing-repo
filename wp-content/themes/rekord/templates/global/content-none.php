<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.WordPress.org/Template_Hierarchy
 *
 * @author    xvelopers
 * @package   rekord
 * @version   1.0.0
 */
?>

<section class="no-results not-found">
    <h3 class="page-title"><?php esc_html_e( 'Nothing Found', 'rekord' ); ?></h1>
        <div class="page-content">
            <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

            <p><?php printf( esc_html__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'rekord' ), esc_url( admin_url( 'post-new.php' ) ) ); ?>
            </p>

            <?php elseif ( is_search() ) : ?>

            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'rekord' ); ?>
            </p>


            <?php else : ?>

            <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'rekord' ); ?>
            </p>

            <?php endif; ?>
        </div><!-- .page-content -->
</section><!-- .no-results -->