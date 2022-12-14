<?php
/**
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */

 
$args = rekord_relation_args('track' , 'track_albums');
$the_query = new WP_Query( $args );
?>
<?php if( $the_query->have_posts() ): ?>
<div class="playlist">
    <ul class="list-group">
        <?php while ( $the_query->have_posts() ) : $the_query->the_post();  
             $options = set_query_var('options', [
                'show_time'=>true,
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
<?php endif; ?>

<?php wp_reset_postdata();	?>