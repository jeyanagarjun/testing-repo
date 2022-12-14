<?php
/**
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */

set_query_var( 'author', get_query_var('author'));

if(has_post_format( 'video' )) {
  
   get_template_part( 'templates/blog/content', 'video' );

}else{
   get_template_part( 'templates/blog/content', 'standard2' );
} 
?>