<?php
/**
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.3.8
 *  @since     1.3.8
 */

 $slug = 'templates/track/track';
 $options=  get_query_var('options');
?>
<li
    class="track post mb-1 list-group-item">
    <div class="d-flex align-items-center">
    <?php  get_template_part( $slug, 'url' );?>
    <?php get_template_part( 'templates/user/dashboard/common/item');  ?>
        <div class="d-flex ml-auto align-items-center" >
        <div class="dropleft">
            <a  href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="icon-more"></i>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item"
                     href="<?php echo esc_url( get_page_link(get_theme_mod('page_track_save')) ); ?>?post=<?php the_ID(); ?>&title=<?php _e('Update Track','rekord'); ?>">
                     <?php _e('Edit','rekord'); ?>
                </a>
                <a   class="dropdown-item delete-post"  href="#" data-id="<?php the_ID() ?>"
                    data-confirm="<?php esc_html_e('Are you sure you want to delete this?','rekord'); ?>"
                    data-nonce="<?php echo wp_create_nonce('my_delete_post_nonce') ?>">
                    <?php _e('Delete','rekord'); ?>
                </a>
            </div>
                </div>
        </div>
    </div>
</li>
