<?php
/**
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */
?>

<?php

$start_date  = rekord_get_field( "start_date" ); 
$date =$day = $year =  $month ='';
if(!empty( $start_date)){
    $start_date  = rekord_get_field( "start_date" ); 
    $date   =  explode(" ", $start_date);
    $day    =  str_replace("," , "" , $date[1]);
    $month  = $date[0]; 
    $year  = $date[2]; 


}

   
?>
<li class="list-group-item my-1">
    <div class="row d-flex align-items-center">
        <div class="col-md-2 ">
            <div class="text-lg-center">
                <div class="s-24"><?php echo esc_html($day,'rekord'); ?></div>
                <span><?php echo esc_html($month,'rekord'); ?>,
                    <small><?php echo esc_html($year,'rekord'); ?></small></span>
            </div>
        </div>
        <div class="col-lg-5 my-3 my-lg-0">
            <a href="<?php the_permalink(); ?>">
                <h5 class="text-primary my-1"><?php the_title(); ?></h5>
            </a>
            <i class="icon-placeholder-3 mr-1 "></i> <?php echo rekord_get_field('location')['address']; ?>
        </div>

        <div class="col-lg-2 ">
            <?php
                //To Fix ACF loop issue. 
                $cpost = $post;  ?>
            <?php  get_template_part( 'templates/event/event', 'artists' );?>
            <?php $post = $cpost;  ?>
        </div>
        <div class=" col-lg-3 ml-auto my-3 text-lg-right">
            <?php  
                 set_query_var('btn_class','btn-md');
                get_template_part( 'templates/event/event', 'button' ); ?>
            <?php  get_template_part( 'templates/global/social', 'share' ); ?>
        </div>
    </div>
</li>