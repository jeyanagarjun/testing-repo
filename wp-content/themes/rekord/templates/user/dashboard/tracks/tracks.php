<?php
/**
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.3.8
 *  @since     1.3.0
 */

?>
<?php get_template_part('templates/user/tracks/track', 'alert') ; ?>

<ul class="list-group playlist">
<?php
  if(is_user_logged_in()): 
  $current_user = get_current_user_id();

  $args = array('post_type'=>'track','post_status'=>'publish,draft','paged'=>$paged, 'author'=>$current_user ,'posts_per_page'=>-1); 

      $q = new WP_Query($args);  

      if ($q->have_posts()) : while ($q->have_posts()) : $q->the_post();
      
            get_template_part( 'templates/user/dashboard/tracks/track' , 'list' ); 

        endwhile; 
      
        else:
          get_template_part('templates/user/dashboard/tracks/no', 'tracks'); 

    endif;  
    wp_reset_postdata(); 
  endif;
?>
</ul>