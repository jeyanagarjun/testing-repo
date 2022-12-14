<?php
/**
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.4.0
 *  @since     1.0.0
 */

$slug = 'templates/track/track';
if(class_exists('ACF') && rekord_has_posts('track') ):
?>
<!-- Right Sidebar -->
<aside class="control-sidebar fixed ">
    <div class="slimScroll">
        <div class="sidebar-header">
            <h4><?php echo !empty(get_theme_mod('playlist_title')) ? get_theme_mod('playlist_title') :esc_html_e('PlayList','rekord'); ?>
            </h4>
            <p><?php echo get_theme_mod('playlist_subtitle');  ?></p>
        
            <a href="#"  class="paper-nav-toggle sidebar-action active"><i></i></a>
        </div>
        <div class="p-3">
            <ul id="playlist" class="playlist list-group list-group-flush playlist-sidebar">
                <?php 
             $args = array( 'post_type'=>'track','posts_per_page' => get_theme_mod('playlist_posts') ,'post_status'=>'publish'); 

             
             if(!empty(get_theme_mod('playlist_categories'))){
                 $args['tax_query'] = 
                 array(
                     array(
                         'taxonomy' => 'track-categories',   // taxonomy name
                         'field' => 'term_id',           // term_id, slug or name
                         'terms' => get_theme_mod('playlist_categories'),                  // term id, term slug or term name
                     )
                     );
             }
             $q = new WP_Query($args);  
       
               if ($q->have_posts()) : while ($q->have_posts()) : $q->the_post(); 
    
               ?>
                <li class="list-group-item my-1">
                    <div class="d-flex align-items-center">
                        <div>
                            <?php get_template_part( $slug , 'url' );  ?>
                        </div>
                        <div class="col-10">
                            <?php if(rekord_track_has_thumbnail()): ?>
                            <figure class="avatar-md float-left mr-3 mt-1">
                                <?php get_template_part( $slug , 'featured-image' );  ?>
                            </figure>
                            <?php endif; ?>
                            <h6 class="text-truncate track-title"><?php the_title(); ?></h6>
                            <?php get_template_part( $slug, 'artists' ); ?>

                        </div>
                        <small class="ml-auto"> <?php echo rekord_get_field('track_time'); ?></small>
                    </div>
                </li>
                <?php  endwhile; endif;  wp_reset_postdata(); ?>
            </ul>
        </div>
    </div>
</aside>
<!-- /.right-sidebar -->
<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
<div class="control-sidebar-bg shadow  fixed"></div>

<?php endif; ?>