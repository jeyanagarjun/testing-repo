    <?php
     if(rekord_canAccess('track_play_subscriptions')){ ?>
        <a <?php echo rekord_getTrack(); ?>> 
            <?php rekord_play_icon_template( !empty($icon_classes) ? $icon_classes:'s-24' ); ?>
        </a>
     <?php } else{ ?>
        <a href="<?php echo pmpro_url("levels")?>">
           <?php rekord_play_icon_template(); ?>
        </a>

    <?php } ?>
    <?php  set_query_var( 'icon_classes', null ); ?>