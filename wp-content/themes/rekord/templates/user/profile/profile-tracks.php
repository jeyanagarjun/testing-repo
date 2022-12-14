<?php
/**
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */

 
global $wp_query;
$user = $wp_query->get_queried_object();
$args = array(
    'author'        =>  $user->ID,
	'numberposts'	=> -1,
	'post_type'		=> 'track',
);
$the_query = new WP_Query( $args );
?>


<?php if( $the_query->have_posts() ): ?>
<div class="playlist">
    <ul class="list-group">
        <?php while ( $the_query->have_posts() ) : $the_query->the_post();  
             $options = set_query_var('options', [
                'show_time'=>true,
                'show_thumb'=>true,
                'show_button'=>true,
                'show_share'=>true,
                'show_download'=>true,
                    'show_description'=>true,
                ]
             );
        get_template_part( 'templates/track/track', 'list' ); 
    endwhile; ?>
    </ul>
</div>
<?php
 else : 
    get_template_part(  'templates/global/no', 'posts' );
 endif; ?>

<?php wp_reset_postdata(); ?>