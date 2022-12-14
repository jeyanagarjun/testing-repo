<?php
/**
 *  Favorites Plugin Overide Settings
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */

if(class_exists('Favorites')):
    $multidimensional_options = array(
      'button_element_type' => 'span',
      'posttypes'=>array(
        'post' => array( 'display' => true),
        'track' => array('display' => true),
        'album' => array('display' => true),
        'event' => array('display' => true),
        'artist' => array('display' => true),
        'video' => array('display' => true),
       ),
       'buttontext' => '<i class="icon-heart-o s-icon"></i>',
       'buttontextfavorited'=>'<i class="icon-heartbeat s-icon"></i>',
    
    );
     update_option('simplefavorites_display',$multidimensional_options);
    endif;