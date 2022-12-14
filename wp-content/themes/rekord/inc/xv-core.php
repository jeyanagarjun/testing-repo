<?php
/**
 * xvelopers's Theme Core Functions
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package rekord
 */

function rekord_the_custom_logo()
{
    
    if (function_exists('the_custom_logo')) {
        $custom_logo_id = get_theme_mod('custom_logo');
        $image          = wp_get_attachment_image_src($custom_logo_id, 'full');
        return $image[0];
    }
}
/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */

function rekord_page_menu_args($args)
{
    $args['show_home'] = true;
    return $args;
}

add_filter('wp_page_menu_args', 'rekord_page_menu_args');
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

function rekord_body_classes($classes)
{
    
    $classes[] = 'sidebar-mini sidebar-collapse sidebar-expanded-on-hover has-preloader';
    // Adds a class of group-blog to blogs with more than 1 published author.
    
    if (is_multi_author())
        $classes[] = 'group-blog';
   
    if (get_theme_mod('ajaxify')){
        $classes[] = 'ajaxify';
    }

   

    if (!get_theme_mod('main_bg') && get_theme_mod('theme_skin') == '#0c101b' ){
        $classes[] = 'theme-dark-bg';
    }
    return $classes;
}

add_filter('body_class', 'rekord_body_classes');

// add active class in selected page

add_filter('nav_menu_css_class', 'rekord_nav_class', 10, 2);

function rekord_nav_class($classes, $item)
{
    if (in_array('current-menu-item', $classes)) {
        $classes[] = 'active '; // your new class
    }
    
    return $classes;
}



//add parent menu class
//This function is responsible for adding "my-parent-item" class to parent menu item's
function add_menu_parent_class( $items ) {
    $parents = array();
    foreach ( $items as $item ) {
        //Check if the item is a parent item
        if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
            $parents[] = $item->menu_item_parent;
        }
    }
    

    foreach ( $items as $item ) {
        if ( in_array( $item->ID, $parents ) ) {
            //Add "menu-parent-item" class to parents

            // var_dump($item->title);
            // var_dump($item->menu_item_parent && $item->menu_item_parent > 0);
            // var_dump( $item->classes);
            $has_megamenu = in_array("megamenu", $item->classes);

            if (in_array("megamenu", $item->classes) && !($item->menu_item_parent && $item->menu_item_parent > 0)) {
                 $item->classes[] = 'parent';
                // var_dump($item->classes );
            }elseif(!$has_megamenu){
                $item->classes[] = 'parent';
            }

            // else(!in_array("megamenu", $item->classes)){
               
            // }



     
        }
    }
    
    return $items;
    }
    
    //add_menu_parent_class to menu
    add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );

// add dropdown class in menu

function rekord_menu_set_dropdown($sorted_menu_items, $args)
{
    $last_top = 0;
    foreach ($sorted_menu_items as $key => $obj) {
        
        // it is a top lv item?
        
        if (0 == $obj->menu_item_parent) {
            
            // set the key of the parent
            
            $last_top = $key;
        } else {
            $sorted_menu_items[$last_top]->classes['dropdown'] = 'dropdown';
        }
    }
    
    return $sorted_menu_items;
}

add_filter('wp_nav_menu_objects', 'rekord_menu_set_dropdown', 10, 2);


/*
 * Pagination code
 */

function rekord_get_pagination($wp_query = '', $paged = '', $pages = '', $range = 4)
{
    $showitems = ($range * 2) + 1;
    if (empty($paged)) {
        global $paged;
    }
    
    if (empty($paged))
        $paged = 1;
    // global $wp_query;
    if ($pages == '') {
        if (empty($wp_query)) {
            global $wp_query;
        }
        
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }
    
    if (1 != $pages) {
        echo "<ul class=\"pagination pt-4\">";
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
            echo "
        <li class='page-item'>
        <a class=\"page-link\" href='" . get_pagenum_link(1) . "'><i class='icon-angle-left'></i></a></li>";
        
        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                echo (esc_attr($paged) == $i) ? "<li class=\"page-item active\"><span class='page-link'>" . $i . "</span></li>" : "<li class='page-item'><a href='" . get_pagenum_link($i) . "' class=\"page-link inactive\">" . $i . "</a></li>";
            }
        }
        
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
            echo "
        <li class='page-item'>
        <a class=\"page-link\" href='" . get_pagenum_link($pages) . "'><i class='icon-angle-right'></i></a></li>";
        echo "</ul>\n";
    }
}


function rekord_breadcrumbs()
{
    $home   = esc_html__('Home', 'rekord'); // text for the 'Home' link
    $before = '<li class="active">'; // tag before the current crumb
    $sep    = '';
    $after  = '</li>'; // tag after the current crumb
    $output = '';
    if (!is_home() && !is_front_page() || is_paged()) {
        $output .= '<ol>';
        global $post;
        $homeLink = home_url();
        $output .= '<li><a href="' . $homeLink . '">' . $home . '</a> </li> ';
        if (is_category()) {
            global $wp_query;
            $cat_obj   = $wp_query->get_queried_object();
            $thisCat   = $cat_obj->term_id;
            $thisCat   = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
            if ($thisCat->parent != 0) {
                $output .= get_category_parents($parentCat, true, $sep);
            }
            
            $output .= $before . esc_html__('Archive by category "', 'rekord') . single_cat_title('', false) . '"' . $after;
        } elseif (is_day()) {
            $output .= '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ';
            $output .= '<li><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a>
    </li> ';
            $output .= $before . get_the_time('d') . $after;
        } elseif (is_month()) {
            $output .= '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ';
            $output .= $before . get_the_time('F') . $after;
        } elseif (is_year()) {
            $output .= $before . get_the_time('Y') . $after;
        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug      = $post_type->rewrite;
                $output .= '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>
    </li> ';
                $output .= $before . get_the_title() . $after;
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                $output .= '<li>' . get_category_parents($cat, true, $sep) . '</li>';
                $output .= $before . get_the_title() . $after;
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            
            
        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            $cat    = get_the_category($parent->ID);
            $cat    = $cat[0];
            $output .= get_category_parents($cat, true, $sep);
            $output .= '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li> ';
            $output .= $before . get_the_title() . $after;
        } elseif (is_page() && !$post->post_parent) {
            $output .= $before . get_the_title() . $after;
        } elseif (is_page() && $post->post_parent) {
            $parent_id   = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page          = get_page($parent_id);
                $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>' . $sep . '
    </li>';
                $parent_id     = $page->post_parent;
            }
            
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb) {
                $output .= $crumb;
            }
            
            $output .= $before . get_the_title() . $after;
        } elseif (is_search()) {
            $output .= $before . esc_html__('Search results for "', 'rekord') . get_search_query() . '"' . $after;
        } elseif (is_tag()) {
            $output .= $before . esc_html__('Posts tagged "', 'rekord') . single_tag_title('', false) . '"' . $after;
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            $output .= $before . esc_html__('Articles posted by ', 'rekord') . $userdata->display_name . $after;
        } elseif (is_404()) {
            $output .= $before . esc_html__('Error 404', 'rekord') . $after;
        }
        
        $output .= '</ol>';
        return $output;
    }
}



function rekord_get_thumbnail($width, $height)
{
    global $post;
    $thumb = esc_url("http://placehold.it/{$width}x{$height}");
    if (has_post_thumbnail()) {
        $image_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full");
        $image_url = $image_src[0];
        $thumb     = theme_thumb($image_url, $width, $height, 'c');
    }
    
    return $thumb;
}

function rekord_get_thumbnail_url($size = 'full')
{
    global $post;
    if (has_post_thumbnail()) {
        $image_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size);
        $image_url = $image_src[0];
    } else {
        $image_url = esc_attr__('No Image', 'rekord');
    }
    
    return esc_url($image_url);
}

function rekord_get_image_url($post_id)
{
    $image_src = wp_get_attachment_image_src($post_id, "full");
    $image_url = $image_src[0];
    return esc_url($image_url);
}



/*
| ----------------------------------------------------------------------------------
| Categories List
| ----------------------------------------------------------------------------------
*/

function rekord_get_post_type_categories($post_type = '')
{
    if (!empty($post_type)) {
        $args       = array(
            'orderby' => 'name',
            'parent' => 0
        );
        $categories = get_categories($args);
    } else {
        
        $categories                              = array();
        $categories[esc_html__('All', 'rekord')] = '';
        foreach ($categories as $term) {
            if (!empty($term->slug)) {
                $categories[] = $term->slug;
            }
        }
    }
    return $categories;
}


/*
| ----------------------------------------------------------------------------------
| Posts List
| ----------------------------------------------------------------------------------
*/
function rekord_get_posts_list($post_type = '')
{
    global $post;
    $args       = array(
        'numberposts' => -1,
        'post_type' => $post_type
    );
    $posts      = get_posts($args);
    $posts_list = array();
    foreach ($posts as $post):
        setup_postdata($post);
        $posts_list[$post->ID] = get_the_title($post->id);
    endforeach;
    return $posts_list;
}

add_filter('wp_list_categories', 'rekord_cat_count_span');
/*
| ----------------------------------------------------------------------------------
| Filters for default widgets
| ----------------------------------------------------------------------------------
*/
function rekord_cat_count_span($links)
{
    $links = str_replace('</a> (', '</a> <span class="cat-count float-right badge badge-primary">', $links);
    $links = str_replace(')', '</span>', $links);
    return $links;
}

add_filter('wp_list_archive', 'rekord_cat_count_spans');

function rekord_cat_count_spans($links)
{
    $links = str_replace('</a> (', '</a>(<span class="cat-count float-right badge badge-primary">', $links);
    $links = str_replace(')', '</span>)', $links);
    return $links;
}



/*
| ----------------------------------------------------------------------------------
| Term List
| ----------------------------------------------------------------------------------
*/
if (!function_exists('rekord_get_terms')) {
    function rekord_get_terms($type = "post", $taxonomy = "category")
    {
        
        $terms      = get_categories('taxonomy=' . $taxonomy . '&type=' . $type);
        $terms_list = array();
        foreach ($terms as $term) {
            $terms_list[$term->term_id] = $term->name;
        }
        return $terms_list;
    }
}

/*
| ----------------------------------------------------------------------------------
| Custom Excerpt
| ----------------------------------------------------------------------------------
*/
if (!function_exists('rekord_get_excerpt')) {
    function rekord_get_excerpt($count = 300)
    {
        global $post;
        $permalink = get_permalink($post->ID);
        $excerpt   = get_the_content();
        $excerpt   = strip_tags($excerpt);
        $excerpt   = strip_shortcodes($excerpt);
        $excerpt   = substr($excerpt, 0, $count);
        $excerpt   = substr($excerpt, 0, strripos($excerpt, " "));
        $excerpt   = $excerpt . '...';
        
        return $excerpt;
    }
}

//Wrap menu item
add_filter('nav_menu_item_args', function($args, $item, $depth)
{
    
    $icon = rekord_get_field('icon', $item);

    //Placeholder Icons
    $arr = array(
        esc_html__('Home','rekord'),
        esc_html__('a Blog page','rekord'),
        esc_html__('Level 1','rekord'),
        esc_html__('About The Tests','rekord'),
        esc_html__('Front Page','rekord'),
        esc_html__('Page A','rekord'),
    );
    
    if (empty($icon)) {
        $icons = rekord_icons();
        // $icon  = array_rand($icons, 1);
        if ($item->title == $arr[0]) {
            $icon = 'icon-home-1';
        } elseif ($item->title == $arr[1]) {
            $icon = 'icon-megaphone';
        } elseif ($item->title == $arr[2]) {
            $icon = 'icon-flag-3';
            
        } elseif ($item->title == $arr[3]) {
            $icon = 'icon-share-2';
        } elseif ($item->title == $arr[4]) {
            $icon = 'icon-newspaper';
        } elseif ($item->title == $arr[5]) {
            $icon = 'icon-resume';
        }
    }
    
    if ($args->theme_location == 'main-menu' || $args->theme_location == 'user-menu' ) {
        $title             = apply_filters('the_title', $item->title, $item->ID);
        $args->link_before = '<i class="menu-icon ' . $icon . '"></i><span>';
        $args->link_after  = '</span>';
        // if (get_theme_mod('layout_rtl')) {
        //     var_dump('sss');
        //     $args->link_before = '';
        //     $args->link_after  = '<i class="icon ' . $icon . ' s-24 ml-3" ></i>';
        // }
    }
    return $args;
}, 10, 3);



function add_description_to_menu($item_output, $item, $depth, $args) {
    if (strlen($item->description) > 0 ) {
        // append description after link
        $item_output .= sprintf('<span class="description">%s</span>', esc_html($item->description));
        ob_start();
        echo do_shortcode($item->description); //would normally get printed to the screen/output to browser
        $output = ob_get_contents();
        ob_end_clean();
        $item_output = $output;
 
        // insert description as last item *in* link ($input_output ends with "</a>{$args->after}")
        // $item_output = substr($item_output, 0, -strlen("</a>{$args->after}")) . sprintf('<span class="description">%s</span >', esc_html($item->description)) . "</a>{$args->after}";
    }

    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'add_description_to_menu', 10, 4);

//Comment Fileds Postion
function rekord_move_comment_field_to_bottom($fields)
{
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;
    return $fields;
}

add_filter('comment_form_fields', 'rekord_move_comment_field_to_bottom');


function rekord_get_share_icon($icon)
{
    switch ($icon) {
        case 'fb':
            return 'icon-facebook';
            break;
        case 'tw':
            return 'icon-twitter';
            break;
        case 'whatsapp':
            return 'icon-whatsapp';
            break;
        case 'email':
            return 'icon-envelope-o';
        case 'instagram':
            return 'icon-instagram';
            
            break;
    }
}

function rekord_relation_args($post_type, $key, $number_posts = -1)
{
    return array(
        'numberposts' => $number_posts,
        'post_type' => $post_type,
        'meta_query' => array(
            array(
                'key' => $key,
                'value' => '"' . get_the_ID() . '"',
                'compare' => 'LIKE'
            )
        )
    );
}

function rekord_relation_count($post_type, $key)
{
    $args      = rekord_relation_args($post_type, $key);
    $the_query = new WP_Query($args);
    return $the_query->post_count;
}


function rekord_get_fav_args($post_type)
{
    $filter = array(
        'post_type' => array(
            $post_type
        )
    );
    if (class_exists('Favorites')) {
        $filterIds = get_user_favorites($user_id = null, $site_id = null, $include_links = true, $filters = $filter);
        return array(
            'post_type' => $post_type,
            'post__in' => $filterIds,
            'posts_per_page' => -1
        );
    }
}

function rekord_has_posts($post_types = 'post')
{
    $hasposts = get_posts('post_type=' . $post_types);
    if (!empty($hasposts)) {
        return true;
    }
    return false;
}


function rekord_track_has_thumbnail(){
    if ( has_post_thumbnail() ) {
        return true;
        }elseif(!empty(rekord_get_field('track_albums')[0])){
            $album_img = rekord_get_field('track_albums')[0];
            $thumb = wp_get_attachment_image(get_post_thumbnail_id($album_img),'','', array( "class" => "img-fluid r-3 track-image" ) );
        
            if(!empty($thumb))
                return true;
        
        }
    return false;

}