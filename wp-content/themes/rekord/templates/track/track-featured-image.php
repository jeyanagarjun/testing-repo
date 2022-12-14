<?php 
 $album_img = '';
if(!empty( $thumbnailSize)){
    $thumbnailSize =$thumbnailSize;


}else{
    $thumbnailSize ='';
}
if ( has_post_thumbnail() ) {
    the_post_thumbnail( $thumbnailSize, array('class' => 'img-fluid r-3 track-image'));
    }elseif(!empty(rekord_get_field('track_albums')[0])){
          $album_img = rekord_get_field('track_albums')[0];
          echo  wp_get_attachment_image(get_post_thumbnail_id($album_img),$thumbnailSize,$thumbnailSize, array( "class" => "img-fluid r-3 track-image" ) );
    }
?>