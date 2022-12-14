<?php
/**
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */

if (!empty(get_theme_mod('xv_favourites')) && in_array($post->post_type, get_theme_mod('xv_favourites')) && class_exists('Favorites')) {?>
<a href="#" class="snackbar fav-snackbar relative" data-text="<?php esc_attr_e('Added to favourites','rekord'); ?>"
    data-text2="<?php esc_attr_e('Removed from favourites','rekord');?>" data-pos="top-right" data-showAction="true"
    data-actionText="<?php esc_attr_e('Ok','rekord'); ?>" data-actionTextColor="#fff" data-backgroundColor="#0c101b">
    <?php the_favorites_button($post->ID) ; ?>
    <span class="fav-count"><?php echo get_favorites_count($post->ID); ?></span>
</a>

<?php } ?>