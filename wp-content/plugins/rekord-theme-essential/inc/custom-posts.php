<?php 

/*
 * Version:     1.3.6
 * Author:      Nomi
 */

if ( ! function_exists('rekord_post_type_video') ) {
    function rekord_post_type_video() {
        global $xv_data;
        if(isset($xv_data['video_slug']) && !empty($xv_data['video_slug'])){
            $video_slug = $xv_data['video_slug'];
        }
        $labels = array(
            'name'               => _x( 'Videos', 'Videos','rekord'),
            'singular_name'      => _x( 'Video', 'Video','rekord'),
            'add_new'            => _x( 'Add New', 'Video','rekord'),
            'add_new_item'       => __( 'Add New','rekord'),
            'edit_item'          => __( 'Edit','rekord' ),
            'new_item'           => __( 'New','rekord' ),
            'all_items'          => __( 'All','rekord' ),
            'view_item'          => __( 'View','rekord' ),
            'search_items'       => __( 'Search Member','rekord' ),
            'not_found'          => __( 'Nothing found','rekord' ),
            'not_found_in_trash' => __( 'Nothing found in the Trash','rekord' ), 
            'parent_item_colon'  => '',
            'menu_name'          => __('Videos','rekord'),
        );
        $args = array(
            'labels'        => $labels,
            'description'   => '',
            'public'        => true,
            
            'menu_position' => 12,
            'supports'      => array( 'title','editor','thumbnail','comments'),
            'has_archive'   => false,
            'rewrite' => array( 'slug' => 'vidoes', 'with_front' => true ),
        );
        register_post_type( 'video', $args ); 
    }
    add_action( 'init', 'rekord_post_type_video' );
}


/////////////////////////////////////GALLERY CUSTOM POST/////////////////////////////////////
if ( ! function_exists('rekord_post_type_gallery') ) {
    function rekord_post_type_gallery() {
        $labels = array(
            'name'               => _x( 'Gallery', 'Items','rekord'  ),
            'singular_name'      => _x( 'Gallery', 'Item','rekord'  ),
            'add_new'            => _x( 'Add New', 'Item' ,'rekord' ),
            'add_new_item'       => __( 'Add New Item','rekord' ),
            'edit_item'          => __( 'Edit Item','rekord' ),
            'new_item'           => __( 'New Item','rekord' ),
            'all_items'          => __( 'All Items','rekord' ),
            'view_item'          => __( 'View Item','rekord' ),
            'search_items'       => __( 'Search Items','rekord' ),
            'not_found'          => __( 'No Items found','rekord' ),
            'not_found_in_trash' => __( 'No Items found in the Trash','rekord' ), 
            'parent_item_colon'  => '',
            'menu_name'          => __('Gallery','rekord')
        );
        $args = array(
            'labels'        => $labels,
            'description'   => '',
            'public'        => true,
            
            'menu_position' => 13,
            'supports'      => array( 'title','editor','thumbnail'),
            'has_archive'   => false,
            'rewrite' => array( 'slug' => 'gallery', 'with_front' => true ),
        );
        register_post_type( 'gallery', $args ); 
             $set = get_option('gallery');
        if ($set !== true){
            flush_rewrite_rules(false);
            update_option('gallery',true);
        }
    }
    add_action( 'init', 'rekord_post_type_gallery' );
}


add_action( 'init', 'my_taxonomies_gallery_category', 0 );
function my_taxonomies_gallery_category() {
    $labels = array(
        'name'              => _x( 'Items Categories', 'Categories','rekord'  ),
        'singular_name'     => _x( 'Product Type', 'Categories','rekord'  ),
        'search_items'      => __( 'Search Gallery Categories','rekord' ),
        'all_items'         => __( 'All Gallery Categories','rekord' ),
        'parent_item'       => __( 'Parent Gallery Type','rekord' ),
        'parent_item_colon' => __( 'Parent Gallery Type:','rekord' ),
        'edit_item'         => __( 'Edit Gallery Type','rekord' ), 
        'update_item'       => __( 'Update Gallery Type','rekord' ),
        'add_new_item'      => __( 'Add New Gallery Type','rekord' ),
        'new_item_name'     => __( 'New Gallery Type','rekord' ),
        'menu_name'         => __( 'Categories','rekord' ),
        'taxonomies' => array( 'gallery-categories' ),
        
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'gallery-categories','with_front' => true ),
        'capability_type' => 'post',
    );
    register_taxonomy( 'gallery-categories',array('gallery'), $args  );
 
}


function rekord_custom_post_track() {
    global $xv_data; 
    $track_slug = '';
    if(isset($xv_data['track_slug']) && !empty($xv_data['track_slug'])){
        $track_slug = $xv_data['track_slug'];
    }
    $labels = array(
        'name'               => _x( 'Tracks','Tracks','rekord'  ),
        'singular_name'      => _x( 'Tracks', 'Track','rekord'  ),
        'add_new'            => _x( 'Add New', 'Item' ,'rekord' ),
        'add_new_item'       => __( 'Add New Item','rekord' ),
        'edit_item'          => __( 'Edit Item','rekord' ),
        'new_item'           => __( 'New Item','rekord' ),
        'all_items'          => __( 'All Items','rekord' ),
        'view_item'          => __( 'View Item','rekord' ),
        'search_items'       => __( 'Search Items','rekord' ),
        'not_found'          => __( 'No Items found','rekord' ),
        'not_found_in_trash' => __( 'No Items found in the Trash','rekord' ), 
        'parent_item_colon'  => '',
        'menu_name'          => __('Tracks','rekord'),
    );
    $args = array(
        'labels'        => $labels,
        'description'   => '',
        'public'        => true,
        
        'menu_position' => 13,
        'supports'      => array( 'title','editor', 'thumbnail','comments', 'author'),
        'has_archive'   => false,
        'rewrite' => array('slug'=> $track_slug),
                  
        // 'taxonomies' => array('post_tag') ,
    );
    register_post_type( 'track', $args ); 
}
add_action( 'init', 'rekord_custom_post_track' );



add_action( 'init', 'create_track_taxonomies', 0 );
function create_track_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Track Categories', 'Track Categories','rekord'  ),
        'singular_name'     => _x( 'Track Category', 'Track Category','rekord'  ),
        'search_items'      => __( 'Search Track Category','rekord'  ),
        'all_items'         => __( 'All Track Categories','rekord'  ),
        'parent_item'       => __( 'Parent Track Category','rekord'  ),
        'parent_item_colon' => __( 'Parent Track Category','rekord'  ),
        'edit_item'         => __( 'Edit Track Category','rekord'  ),
        'update_item'       => __( 'Update Track Category','rekord'  ),
        'add_new_item'      => __( 'Add New Track Category','rekord'  ),
        'new_item_name'     => __( 'New Track Category Name','rekord'  ),
        'menu_name'         => __( 'Track Categories','rekord'  ),
        'taxonomies' => array( 'track-categories' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'track-categories','with_front' => true ),
        'capability_type' => 'post',
        'capabilities' => array(
            'edit_post' => 'edit_track',
            'edit_posts' => 'edit_tracks',
            'edit_others_posts' => 'edit_other_tracks',
            'publish_posts' => 'publish_tracks',
            'read_post' => 'read_track',
            'read_private_posts' => 'read_private_tracks',
            'delete_post' => 'delete_track'
        ),
    // as pointed out by iEmanuele, adding map_meta_cap will map the meta correctly 
    'map_meta_cap' => true

    );

    register_taxonomy( 'track-categories', array( 'track' ), $args );
}



/////////////////////////////////////ALBUM CUSTOM POST/////////////////////////////////////


function rekord_custom_post_album() {
    global $xv_data;
  
    $album_slug = '';
    if(isset($xv_data['album_slug']) && !empty($xv_data['album_slug'])){
        $album_slug = $xv_data['album_slug'];
    }
    $labels = array(
        'name'               => _x( 'Albums', 'Items','rekord'  ),
        'singular_name'      => _x( 'Album', 'Item','rekord'  ),
        'add_new'            => _x( 'Add New', 'Item' ,'rekord' ),
        'add_new_item'       => __( 'Add New Item','rekord' ),
        'edit_item'          => __( 'Edit Item','rekord' ),
        'new_item'           => __( 'New Item','rekord' ),
        'all_items'          => __( 'All Items','rekord' ),
        'view_item'          => __( 'View Item','rekord' ),
        'search_items'       => __( 'Search Items','rekord' ),
        'not_found'          => __( 'No Items found','rekord' ),
        'not_found_in_trash' => __( 'No Items found in the Trash','rekord' ), 
        'parent_item_colon'  => '',
        'menu_name'          => __('Albums','rekord'),
    );
    $args = array(
        'labels'        => $labels,
        'description'   => '',
        'public'        => true,
        
        'menu_position' => 13,
        'supports'      => array( 'title', 'thumbnail','editor' ),
        'has_archive'   => false,
        'rewrite' => array('slug'=> $album_slug),
    );
    register_post_type( 'album', $args ); 
}
add_action( 'init', 'rekord_custom_post_album' );



add_action( 'init', 'create_album_taxonomies', 0 );
function create_album_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Album Categories', 'Album Categories','rekord'  ),
        'singular_name'     => _x( 'Album Category', 'Album Category','rekord'  ),
        'search_items'      => __( 'Search Category','rekord'  ),
        'all_items'         => __( 'All Categories','rekord'  ),
        'parent_item'       => __( 'Parent Category','rekord'  ),
        'parent_item_colon' => __( 'Parent Category','rekord'  ),
        'edit_item'         => __( 'Edit Category','rekord'  ),
        'update_item'       => __( 'Update Category','rekord'  ),
        'add_new_item'      => __( 'Add New Category','rekord'  ),
        'new_item_name'     => __( 'New Category Name','rekord'  ),
        'menu_name'         => __( 'Album Categories','rekord'  ),
        'taxonomies' => array( 'album-categories' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'album-categories','with_front' => true ),
        'capability_type' => 'post',
    );

    register_taxonomy( 'album-categories', array( 'album', ), $args );
}


///////////////////ARTIST CUSTOM POST TYPE//////////////////////////////////////////////
if ( ! function_exists('rekord_post_type_artist') ) {
    function rekord_post_type_artist() {
        global $xv_data;
        $artist_name = 'Artist';
        $artist_slug = 'artists';
        if(isset($xv_data['artist_name']) && !empty($xv_data['artist_slug'])){
            $artist_name = $xv_data['artist_name'];
        }
        if(isset($xv_data['artist_slug']) && !empty($xv_data['artist_slug'])){
            $artist_slug = $xv_data['artist_slug'];
        }

        $labels = array(
            'name'               => _x( 'Artists',  'Artists','rekord' ),
            'singular_name'      => _x( 'Artist', 'Artist','rekord'  ),
            'add_new'            => _x( 'Add New', 'Artist','rekord'  ),
            'add_new_item'       => __( 'Add New'. $artist_name,'rekord' ),
            'edit_item'          => __( 'Edit '. $artist_name,'rekord' ),
            'new_item'           => __( 'New '. $artist_name,'rekord' ),
            'all_items'          => __( 'All '. $artist_name,'rekord' ),
            'view_item'          => __( 'View'. $artist_name,'rekord' ),
            'search_items'       => __( 'Search','rekord' ),
            'not_found'          => __( 'No  found','rekord' ),
            'not_found_in_trash' => __( 'No Artist found in the Trash','rekord' ), 
            'parent_item_colon'  => '',
            'menu_name'          =>  $artist_name,
        );
        $args = array(
            'labels'        => $labels,
            'description'   => '',
            'public'        => true,
            
            'menu_position' => 14,
            'supports'      => array( 'title','editor', 'thumbnail' ),
            'has_archive'   => false,
            'rewrite' => array('slug' => 'artists'),
        );
        register_post_type( 'artist', $args ); 
    }
    add_action( 'init', 'rekord_post_type_artist' );
}


add_action( 'init', 'create_artist_taxonomies', 0 );
function create_artist_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Artist Categories', 'Artist Categories','rekord'  ),
        'singular_name'     => _x( 'Artist Category', 'Artist Category','rekord'  ),
        'search_items'      => __( 'Search Category','rekord'  ),
        'all_items'         => __( 'All Categories','rekord'  ),
        'parent_item'       => __( 'Parent Category','rekord'  ),
        'parent_item_colon' => __( 'Parent Category','rekord'  ),
        'edit_item'         => __( 'Edit Category','rekord'  ),
        'update_item'       => __( 'Update Category','rekord'  ),
        'add_new_item'      => __( 'Add New Category','rekord'  ),
        'new_item_name'     => __( 'New Category Name','rekord'  ),
        'menu_name'         => __( 'Artist Categories','rekord'  ),
        'taxonomies' => array( 'artist-categories' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'artist-categories','with_front' => true ),
        'capability_type' => 'post',
    );

    register_taxonomy( 'artist-categories', array( 'artist'), $args );
}
///////////////////////////////////Events////////////////////////////////
if ( ! function_exists('rekord_post_type_event') ) {
    function rekord_post_type_event() {
        global $xv_data;
        $event_name = __('Events','rekord');
        $event_slug = 'event';
            if(isset($xv_data['event_name']) && !empty($xv_data['event_name'])){
             $event_name = $xv_data['event_name'];
            }
            if(isset($xv_data['event_slug']) && !empty($xv_data['event_slug'])){
                $event_slug = $xv_data['event_slug'];
            }
        $labels = array(
            'name'               => _x('Events', 'Events','rekord'  ),
            'singular_name'      => _x( 'Event', 'Event','rekord'  ),
            'add_new'            => _x( 'Add New', 'Event','rekord'  ),
            'add_new_item'       => __( 'Add New','rekord' ),
            'edit_item'          => __( 'Edit '.$event_name,'rekord' ),
            'new_item'           => __( 'New '.$event_name,'rekord' ),
            'all_items'          => __( 'All '.$event_name,'rekord' ),
            'view_item'          => __( 'View'.$event_name,'rekord' ),
            'search_items'       => __( 'Search '.$event_name,'rekord' ),
            'not_found'          => __( 'Nothing found','rekord' ),
            'not_found_in_trash' => __( 'Nothing found in the Trash','rekord' ),
            'parent_item_colon'  => '',
            'menu_name'          =>  $event_name,
        );
        $args = array(
            'labels'            => $labels,
            'description'       => '',
            'public'            => true,
            
            'publicly_queryable'=> true,
            'menu_position'     => 15,
            'supports'      => array( 'title','thumbnail','editor' ),
            'has_archive'   => true,
            'rewrite' => array('slug' => $event_slug,'with_front' => false),
        );

        register_post_type( 'event', $args );
        $set = get_option('event');
        if ($set !== true){
            flush_rewrite_rules(false);
            update_option('event',true);
        }
    }
    add_action( 'init', 'rekord_post_type_event' );
}
    add_action( 'init', 'my_taxonomies_event_category', 0 );
    function my_taxonomies_event_category() {
        $labels = array(
                        'name'              => _x( 'Event Categories', 'Categories','rekord'  ),
                        'singular_name'     => _x( 'Event Type', 'Categories','rekord'  ),
                        'search_items'      => __( 'Search Event Categories','rekord' ),
                        'all_items'         => __( 'All Event Categories','rekord' ),
                        'parent_item'       => __( 'Parent Event Type','rekord' ),
                        'parent_item_colon' => __( 'Parent Event Type:','rekord' ),
                        'edit_item'         => __( 'Edit Event Type','rekord' ),
                        'update_item'       => __( 'Update Event Type','rekord' ),
                        'add_new_item'      => __( 'Add New Event Type','rekord' ),
                        'new_item_name'     => __( 'New Event Type','rekord' ),
                        'menu_name'         => __( 'Categories','rekord' ),
                        'taxonomies' => array( 'event-categories' ),
                        
                        );
        $args = array(
                      'hierarchical'      => true,
                      'labels'            => $labels,
                      'show_ui'           => true,
                      
                      'show_admin_column' => true,
                      'query_var'         => true,
                      'rewrite'           => array( 'slug' => 'event-categories','with_front' => true ),
                      'capability_type' => 'post',
                      );
        register_taxonomy( 'event-categories',array('event'), $args  );
        
    }
/////////////////////////////////////Podcast CUSTOM POST/////////////////////////////////////


function rekord_custom_post_podcast() {
    global $xv_data;
  
    $podcast_slug = '';
    if(isset($xv_data['podcast_slug']) && !empty($xv_data['podcast_slug'])){
        $podcast_slug = $xv_data['podcast_slug'];
    }
    $labels = array(
        'name'               => _x( 'Podcasts', 'Items','rekord'  ),
        'singular_name'      => _x( 'Podcast', 'Item','rekord'  ),
        'add_new'            => _x( 'Add New', 'Item' ,'rekord' ),
        'add_new_item'       => __( 'Add New Item','rekord' ),
        'edit_item'          => __( 'Edit Item','rekord' ),
        'new_item'           => __( 'New Item','rekord' ),
        'all_items'          => __( 'All Items','rekord' ),
        'view_item'          => __( 'View Item','rekord' ),
        'search_items'       => __( 'Search Items','rekord' ),
        'not_found'          => __( 'No Items found','rekord' ),
        'not_found_in_trash' => __( 'No Items found in the Trash','rekord' ), 
        'parent_item_colon'  => '',
        'menu_name'          => __('Podcasts','rekord'),
    );
    $args = array(
        'labels'        => $labels,
        'description'   => '',
        'public'        => true,
        
        'menu_position' => 13,
        'supports'      => array( 'title', 'thumbnail','editor' ),
        'has_archive'   => false,
        'rewrite' => array('slug'=> $podcast_slug),
    );
    register_post_type( 'podcast', $args ); 
}
add_action( 'init', 'rekord_custom_post_podcast' );



add_action( 'init', 'create_podcast_taxonomies', 0 );
function create_podcast_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Podcast Categories', 'Podcast Categories','rekord'  ),
        'singular_name'     => _x( 'Podcast Category', 'Podcast Category','rekord'  ),
        'search_items'      => __( 'Search Category','rekord'  ),
        'all_items'         => __( 'All Categories','rekord'  ),
        'parent_item'       => __( 'Parent Category','rekord'  ),
        'parent_item_colon' => __( 'Parent Category','rekord'  ),
        'edit_item'         => __( 'Edit Category','rekord'  ),
        'update_item'       => __( 'Update Category','rekord'  ),
        'add_new_item'      => __( 'Add New Category','rekord'  ),
        'new_item_name'     => __( 'New Category Name','rekord'  ),
        'menu_name'         => __( 'Podcast Categories','rekord'  ),
        'taxonomies' => array( 'podcast-categories' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'podcast-categories','with_front' => true ),
        'capability_type' => 'post',
    );

    register_taxonomy( 'podcast-categories', array( 'podcast', ), $args );
}


add_action('init', function () {
    add_rewrite_rule('^gallery/page/([0-9]+)','index.php?pagename=gallery&paged=$matches[1]', 'top');
    flush_rewrite_rules();
}, 1000);