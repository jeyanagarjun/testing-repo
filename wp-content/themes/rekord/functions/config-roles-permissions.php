<?php
add_role('rekord_artist', __( 'Artist'));

function isArtist(){
  $user = wp_get_current_user();
  return  in_array( 'rekord_artist', (array) $user->roles );
}

function  rekord_isRole($role){
  $user = wp_get_current_user();
  return  in_array($role, (array) $user->roles );
}

function isOwner(){
  $post = get_post($id);
  return  $post->post_author->ID == $current_user->ID;
}

      
/**
 *  Media : Restric user to view their own uploads
 */
add_filter( 'posts_where', 'rekord_media_attachments' );
function rekord_media_attachments( $where ){
    global $current_user;

    if( is_user_logged_in() ){
         // logged in user, but are we viewing the library?
         if( isset( $_POST['action'] ) && ( $_POST['action'] == 'query-attachments' ) ){
            // here you can add some extra logic if you'd want to.
            $where .= ' AND post_author='.$current_user->data->ID;
        }
    }
    return $where;
}
/**
 *  Check who can edit post
 */
function rekord_can_edit_post($id){

  $post = get_post($id);

  $user = wp_get_current_user();


  return (in_array( 'rekord_artist', (array) $user->roles ) &&  $post->post_author->ID == $current_user->ID);

}
function rekord_can_create_post(){

  $user = wp_get_current_user();
  
  return (in_array( 'rekord_artist', (array) $user->roles ));
}

/**
 *  Subscriber Permissions
 */
add_action('wp', 'rekord_allow_subscriber_uploads');
      function rekord_allow_subscriber_uploads() {
       global $post;
        $artist = get_role('rekord_artist');
        // author caps
        $artist->add_cap('edit_track');
        $artist->add_cap('delete_track');
        $artist->add_cap('upload_files');


        // author caps
        $artist->add_cap('edit_album');
        $artist->add_cap('delete_album');
        

        $administrator = get_role('administrator');
        $administrator->add_cap('edit_track');
        $administrator->add_cap('delete_track');    
}

