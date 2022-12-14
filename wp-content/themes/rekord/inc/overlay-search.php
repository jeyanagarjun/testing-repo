<?php
/**
 *  Tracks Search
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */


// the ajax function
add_action('wp_ajax_rekord_data_fetch' , 'rekord_data_fetch');
add_action('wp_ajax_nopriv_rekord_data_fetch','rekord_data_fetch');
function rekord_data_fetch(){

    $the_query = new WP_Query( array( 
        'post_status'     => 'publish',
        'posts_per_page' => -1, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'track' ) );
    if( $the_query->have_posts() ) :?>
<ul class="list-group playlist">
    <?php
                        while( $the_query->have_posts() ): $the_query->the_post(); 
                        $options = set_query_var('options', [
                        'show_time'=>true,
                        'show_thumb'=>true,
                    
                        ]
                    );
                get_template_part( 'templates/track/track', 'list' ); ?>

    <?php endwhile; wp_reset_postdata();  ?>

</ul>
<?php else:

get_template_part('templates/global/content', 'none');

                endif;
    die();
}

// add the ajax fetch js
add_action( 'wp_footer', 'rekord_ajax_fetch' );
function rekord_ajax_fetch() {
?>
<script type="text/javascript">
function fetch() {
    jQuery.ajax({
        url: '<?php echo admin_url('admin-ajax.php'); ?>',
        type: 'post',
        data: {
            action: 'rekord_data_fetch',
            keyword: jQuery('#keyword').val()
        },
        success: function(data) {
            jQuery('#datafetch').html(data);
            waveSurgerPlaylist();
        }
    });

}
</script>

<?php
}