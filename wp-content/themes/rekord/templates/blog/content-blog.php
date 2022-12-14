<?php
/**
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */

if(has_post_format( 'video' ) && has_post_thumbnail() ) { 
   get_template_part( 'templates/blog/content', 'video' );

}else{
   get_template_part( 'templates/blog/content', 'standard' );
} 
?>