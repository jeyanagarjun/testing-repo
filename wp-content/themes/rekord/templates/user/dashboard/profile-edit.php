<?php


/* Get user info. */
global $current_user, $wp_roles;
//get_currentuserinfo(); //deprecated since 3.1

/* Load the registration file. */
//require_once( ABSPATH . WPINC . '/registration.php' ); //deprecated since 3.1
$error = array();    
/* If profile was saved, update profile. */
if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {

 

    if ( !empty( $_POST['first-name'] ) )
        update_user_meta( $current_user->ID, 'first_name', esc_attr( $_POST['first-name'] ) );
    if ( !empty( $_POST['last-name'] ) )
        update_user_meta($current_user->ID, 'last_name', esc_attr( $_POST['last-name'] ) );
    if ( !empty( $_POST['description'] ) )
        update_user_meta( $current_user->ID, 'description', esc_attr( $_POST['description'] ) );
    if ( !empty( $_POST['url'] ) )
        update_user_meta( $current_user->ID, 'user_url', esc_attr( $_POST['url'] ) );

       
    //Save Acf custom fields
    $field_group_key = 'group_5ec3cacf24576';

    $fields = acf_get_fields($field_group_key);
    foreach($fields as $field){
        $key  = $field['key'];
        $name = $field['name']; 

        if ( !empty( $_POST['acf'][$key])){
            $value =  $_POST['acf'][$key];
            update_user_meta( $current_user->ID, $name, esc_attr($value) );
        } 
    }
  
        do_action('edit_user_profile_update', $current_user->ID);

    /* Redirect so the page will show updated info.*/
  /*I am not Author of this Code- i dont know why but it worked for me after changing below line to if ( count($error) == 0 ){ */
    // if ( count($error) == 0 ) {
    //     //action hook for plugins and extra fields saving
    //     do_action('edit_user_profile_update', $current_user->ID);
    //     wp_redirect( get_permalink() );
    //     exit;
    // }
}



?>

<div class="row">
    <div class="col-md-12">
        <div class="card p-4">
        <form method="post" class="form" action="<?php the_permalink(); ?>">
            <div class="row">
            <div class="col-md-6">
            <?php input(
                [
                    'label' =>  'First Name',
                    'name' =>   'first-name',
                    'required'=>true,
                    'value' =>   get_the_author_meta( 'first_name', $current_user->ID ),
                ] ) ;
             ?>
            </div>
            <div class="col-md-6">  
                <?php input(
                    [
                        'label' =>  'Last Name',
                        'name' =>   'last-name',
                        'required'=>true,
                        'value' =>  get_the_author_meta( 'last_name', $current_user->ID ) ,
                    ] ) ;
                ?>
            </div>
        </div>
            <?php  input(['label' =>  'Website','name' =>   'url', 'value' =>  get_the_author_meta( 'user_url', $current_user->ID ) ,] ) ;?>
            <?php textarea('Description','description',get_the_author_meta( 'description', $current_user->ID )) ; ?>
            

    
            <?php 
                        //action hook for plugin and extra fields
                        do_action('edit_user_profile',$current_user); 
                        $profileLink = home_url('user/'. $current_user->user_login);
                       
            
                    ?>
                    <div class="mt-5">
                        <input name="updateuser" type="submit" id="updateuser" class="btn btn-primary" value="<?php _e('Update', 'rekord'); ?>" />
                        <a  class="ml-3" href="<?php  echo esc_url ($profileLink); ?>"  target="_blank"><?php _e('View Profile' ,'rekord'); ?>
                        <?php wp_nonce_field( 'update-user' ) ?>
                        <input name="action" type="hidden" id="action" value="update-user" />
                      
                    </div>
        </form><!-- #adduser -->
        </div>
    </div>
</div>