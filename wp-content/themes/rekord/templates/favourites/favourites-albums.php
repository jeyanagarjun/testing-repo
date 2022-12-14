<?php
/**
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */

 
    $filter = array('post_type' => array('album'));
    $filterIds  = get_user_favorites($user_id = null, $site_id = null, $include_links = true, $filters = $filter);
    if(!empty($filterIds)) :  ?>

<div class="row has-items-overlay my-3">
    <?php
        $args = array('post_type'=>'album', 'post__in' => $filterIds,'posts_per_page' => -1);     
                    
        $q = new WP_Query( $args );
        if ($q->have_posts()) : while ($q->have_posts()) : $q->the_post();
    ?>

    <div class="col-md-3">
        <?php  get_template_part(  'templates/album/album', 'loop' );?>

    </div>
    <?php endwhile;
            else: 
                get_template_part(  'templates/favourites/favourites', 'none' );
            endif;  
            wp_reset_postdata();   ?>
</div>
<?php endif; ?>