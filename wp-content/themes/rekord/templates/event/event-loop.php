<?php
/**
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */


        $start_date  = rekord_get_field( "start_date" ); 
        $date  = $month ='';
        if(!empty( $start_date)){
            $date   =  explode(" ", $start_date);
        $day    =  str_replace("," , "" , $date[1]);
        $month  = $date[0]; 
      
        }
        
?>
<div class="relative">
    <div class="mb-2 card no-b p-3"
        style="background-image:url('<?php echo get_the_post_thumbnail_url() ?>') !important;">
        <div class="has-bottom-gradient">
            <div>
                <?php if(!empty($start_date) ){ ?>
                <div class="mr-3 float-left text-center">
                    <div class="s-36"><?php echo esc_html($day,'rekord'); ?></div>
                    <span><?php echo esc_html($month,'rekord'); ?></span>
                </div>
                <?php } ?>
                <div>
                    <div>
                        <a href="<?php the_permalink(); ?>">
                            <h4 class="text-primary"><?php the_title(); ?></h4>
                        </a>
                    </div>
                    <small><?php  echo rekord_get_field('location')['address']; ?></small>
                    <div class="mt-2">
                        <i class="icon-clock-o mr-1"> </i>
                        <?php  rekord_the_field('start_time'); ?>
                        <?php if(!empty($endTime =rekord_get_field('end_time'))) echo ' - ' . $endTime;?>
                    </div>
                </div>

            </div>
            <?php 
            $thumb = false;
            $thisPost  = $post;
            if ( has_post_thumbnail() ) $thumb = true; ?>
            <?php $artists = rekord_get_field('artists'); ?>
            <?php if( $artists ): ?>
            <div class="mt-3"><small><?php esc_html_e('Artist Performing','rekord'); ?></small></div>
            <?php endif;?>
            <div class="d-flex justify-content-between my-3">
                <?php  get_template_part( 'templates/event/event', 'artists' ); ?>

                <?php $post  = $thisPost; ?>
                <div class="float-right">
                    <a href="<?php the_permalink(); ?>"
                        class="float-right"><?php esc_html_e('View Details' ,'rekord'); ?></a>
                </div>
            </div>
        </div>

    </div>

    <?php if ($thumb ) :?>
    <div class="bottom-gradient"></div>
    <?php endif; ?>
</div>