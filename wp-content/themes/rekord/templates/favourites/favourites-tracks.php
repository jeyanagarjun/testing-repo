<?php
/**
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */

    $tracksFilter = array('post_type' => array('track'));
    $tracksIds  = get_user_favorites($user_id = null, $site_id = null, $include_links = true, $filters = $tracksFilter);

if(!empty($tracksIds)) :  ?>

<ul class="playlist mt-2 p-0">
    <?php 
        $args = array('post_type'=>'track', 'post__in' => $tracksIds,'posts_per_page' => -1);                            
        $q = new WP_Query( $args );
        if ($q->have_posts()) : while ($q->have_posts()) : $q->the_post();

            
                $options = set_query_var('options', [
                    'list_classes'=>'list-group-item mb-1',
                    'show_time'=>true,
                    'show_favourite'=>true,
                    'show_thumb'=>true,
                    'show_artists'=>true,
                    'show_button'=>true,
                    'show_share'=>true,
                    ]
                    );
            get_template_part( 'templates/track/track', 'list' ); 

         endwhile;
        else: 
            get_template_part(  'templates/favourites/favourites', 'none' );
        endif;  
        wp_reset_postdata();   ?>
</ul>
<?php endif; ?>