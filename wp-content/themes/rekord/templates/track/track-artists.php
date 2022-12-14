<div class="track-artists">
    <?php 
    $artists = rekord_get_field('track_artists');
    if(!empty($artists)) :
    echo '<small><a href="'.$artists[0]->guid.'">'.$artists[0]->post_title.'</a></small>';

    endif;
    
    if(!empty($artists) && $count = sizeof($artists) > 1){ ?>

    <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <small>
            <i class="icon-add ml-2" data-toggle="tooltip" data-placement="bottom">
            </i> <?php   printf(sprintf(esc_html__('%s More', 'rekord'),$count,$count)); ?>
        </small>
    </a>
    <div class="dropdown">
        <div class="dropdown-menu">
            <?php foreach(array_slice($artists, 1) as $artist){ ?>
            <a class="dropdown-item"
                href="<?php echo esc_url($artist->guid,'rekord'); ?>"><?php echo esc_html($artist->post_title,'rekord'); ?></a>
            <?php } ?>
        </div>
    </div>
    <?php  }  ?>
</div>