<?php
/**
 * @package rekord
 * @since rekord 1.0
 */

/**
 * Enqueue scripts and styles.
 */
function rekord_scripts() {


    /*----------------------------------------------------------------
     *  Define  Directory Paths
     *-----------------------------------------------------------------*/


    $dir_fonts      =   get_template_directory_uri() . '/assets/fonts/';
    $dir_css       =   get_template_directory_uri() . '/assets/css/';
    $dir_css_admin =   get_template_directory_uri() . '/admin/assets/css/';
    $dir_js        =   get_template_directory_uri() . '/assets/js/';

    /*----------------------------------------------------------------
     *  Enqueue styles.
     *-----------------------------------------------------------------*/


    $css_files = array(
        'app'            => 'app.css',   
        'rekord-wp-core'        => 'wp-core.css',         
    );

    foreach ($css_files as $key => $value) {

        wp_enqueue_style($key  ,  $dir_css . $value);

    }


    if (class_exists('Woocommerce')){
        wp_enqueue_style( 'woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css' );
    }

        
    wp_enqueue_style( 'rekord-style'     ,  get_stylesheet_uri());
    
    //Elementor Plugin Styles
    if (get_theme_mod('ajaxify') && did_action( 'elementor/loaded' ) ) {
        wp_enqueue_style('elementor-frontend');
      
        //Add all elementor generated css 
        foreach( glob(wp_get_upload_dir()['basedir']. '/elementor/css/*.css') as $file ) {
        $filename = substr($file, strrpos($file, '/') + 1);
        $file =  wp_get_upload_dir()['baseurl'].'/elementor/css/'.$filename;
            wp_enqueue_style( $filename, $file );
        }
    }


    /*----------------------------------------------------------------
     *  Enqueue Scripts.
     *-----------------------------------------------------------------*/

    //libs 
    wp_enqueue_script( 'modernizr',   $dir_js .'libs/' . 'modernizr.js', array(), '3.5.0', false );


    $js_files = array(
        'jquery-easing-js'            => 'jquery.easing.js',
        'jquery-waitforimages-js'     => 'jquery.waitforimages.js',
        'popper-js'                   => 'popper.js',
        'bootstrap'                   => 'bootstrap.min.js',
        'nprogress-js'                => 'nprogress.js',
        'lightSlider-js'              => 'lightslider.min.js',
        'lightgallery-js'             => 'lightgallery.min.js',
        'stickyfill-js'               => 'stickyfill.min.js',
        'wavesurfer-js'               => 'wavesurfer.js',
        'snackbar-js'                 => 'snackbar.min.js',
        'isotope-js'                  => 'isotope.js',
        'jquery-scrollto-js'          => 'jquery.scrollto.min.js',
        'css3-animate-it-js'          =>  'css3-animate-it.js',
        'jquery-countdown-js'         => 'jquery.countdown.min.js',
        'jquery-responsivetabs-js'    => 'jquery.responsivetabs.js',
        'jquery-slimscroll-js'        => 'jquery.slimscroll.js',
        'search-js'                   => 'search.js',
        'sidebar-js'                  => 'sidebar.js',
        'jsshare'                     => 'jsshare.js',
        'dl-menu'                     => 'jquery.dlmenu.js'
    );

  

    foreach ($js_files as $key => $value) {
        wp_enqueue_script( $key ,  $dir_js .'libs/' . $value, array( 'jquery' ), '', true );
    }

    //Ajax Enable / Disable
    if (get_theme_mod('ajaxify')) {
        $js_ajax_files = array(
            'history-js'                  => 'history.js',
            'ajaxify-html5-js'            => 'ajaxify-html5.js',
        );
        foreach ($js_ajax_files as $key => $value) {
            wp_enqueue_script( $key ,  $dir_js .'libs/' . $value, array( 'jquery' ), '', true );
        }

          //Woo Scripts
        if (class_exists('Woocommerce')){
            wp_dequeue_script('wc-single-product');
        }
        wp_enqueue_script( 'rekord-wc-single-product' ,  get_template_directory_uri() . '/assets/js/' . 'wc-single-product.js', array(), '', true ); 
        
    }



      
    //main.js
    wp_enqueue_script( 'rekord-main' ,  $dir_js . 'main.js', array( 'jquery' ), '', true );

    if(!empty(get_theme_mod('rekord_ajax_callback'))){
        $rekord_ajax_callback = get_theme_mod('rekord_ajax_callback');
        wp_add_inline_script( 'rekord-main',
        'jQuery(document).ready(function($) {
        $(window).on("statechangecomplete", function() {'. $rekord_ajax_callback .' });
        });'
        ,'rekord-main');
    }
    wp_localize_script( 'rekord-main', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );




    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){

        wp_enqueue_script( 'comment-reply' );

    }
    if ( !empty(get_theme_mod('google_map_api_key'))) {
        wp_enqueue_script( 'rekord-googleapis', 'https://maps.googleapis.com/maps/api/js?&key='.get_theme_mod('google_map_api_key', 'option').'&libraries=places' );
      }
}
add_action( 'wp_enqueue_scripts', 'rekord_scripts' );

/*----------------------------------------------------------------
*  Backend JS & CSS
*-----------------------------------------------------------------*/
function rekord_admin_scripts($hook) {

    $dir_css_admin =   get_template_directory_uri() . '/admin/assets/css/';
    $dir_js_admin =   get_template_directory_uri() . '/admin/assets/js/';

    if ( !empty(get_theme_mod('google_map_api_key'))) {
        wp_enqueue_script( 'rekord-googleapis', 'https://maps.googleapis.com/maps/api/js?&key='.get_theme_mod('google_map_api_key', 'option').'&libraries=places' );
    }
}

add_action('admin_enqueue_scripts', 'rekord_admin_scripts');