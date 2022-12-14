<?php
/**
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */

// args
$args = array(
	'numberposts'	=> -1,
	'post_type'		=> 'album',
	'meta_query'	=> array(
        array(
            'key' => 'album_artists',
            'value' => '"' . get_the_ID() . '"',
            'compare' => 'LIKE'
            )
        )
);


// query
$the_query = new WP_Query( $args );

?>
<?php if( $the_query->have_posts() ): ?>
<div class="lightSlider has-items-overlay playlist" data-item="4" data-item-lg="3" data-item-md="3" data-item-sm="2"
    data-auto="false" data-pager="false" data-controls="true" data-loop="false">

    <?php while ( $the_query->have_posts() ) : $the_query->the_post();  
        
             get_template_part(  'templates/album/album', 'loop' );
    endwhile; ?>

</div>
<?php endif; ?>

<?php wp_reset_postdata();	 // Restore global post data stomped by the_post(). ?>