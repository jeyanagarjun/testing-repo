<?php
/**
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */
?>
<!--Share Icons-->
<?php if(!empty(get_theme_mod('social_share')) &&  count(get_theme_mod('social_share')) > 0):  ?>
<a href="#" class="ml-3 sharer"> <i class="icon-share-1 s-24"></i></a>
<div class="sharer-bar d-flex justify-content-around">
    <?php foreach(get_theme_mod('social_share') as $s): 
            $attr = '';
            if($s == 'fb' && !empty(get_theme_mod('social_share_facebook_api'))){
                $attr = 'data-fb-api-id='.get_theme_mod('social_share_facebook_api').'';
            }
            
            ?>
    <a href="#" class="social_share no-ajaxy" data-title="<?php the_title_attribute(); ?>" data-url="
          <?php the_permalink(); ?>" data-image="<?php echo get_the_post_thumbnail_url(); ?>"
        data-type="<?php echo esc_attr($s,'rekord');?>" <?php echo esc_attr($attr,'rekord'); ?>>
        <i class="<?php echo esc_attr(rekord_get_share_icon($s)); ?>"></i>
    </a>
    <?php endforeach ; ?>
</div>
<?php endif; ?>