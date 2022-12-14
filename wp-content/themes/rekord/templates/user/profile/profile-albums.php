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
// args
$args = array(
    'author'        =>  $user->ID,
	'numberposts'	=> -1,
	'post_type'		=> 'album',
);


// query
$the_query = new WP_Query( $args );

?>
<?php if( $the_query->have_posts() ): ?>
<div class="row has-items-overlay playlist" data-item="4" data-item-lg="3" data-item-md="3" data-item-sm="2"
    data-auto="false" data-pager="false" data-controls="true" data-loop="false">

    <?php while ( $the_query->have_posts() ) : $the_query->the_post();   ?>
            <div class="col-md-3">
            <?php  get_template_part(  'templates/album/album', 'loop' ); ?>
            </div>
            
   <?php endwhile; ?>

</div>
<?php
 else : 
    get_template_part(  'templates/global/no', 'posts' );
 endif; ?>
<?php wp_reset_postdata();	 // Restore global post data stomped by the_post(). ?>