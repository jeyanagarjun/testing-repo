<?php


/**
 *  rekord theme support functions
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
  $content_width = 640; /* pixels */

if ( ! function_exists( 'rekord_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function rekord_setup() {

  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   * If you're building a theme based on rekord, use a find and replace
   * to change 'rekord' to the name of your theme in all the template files
   */
  

  $domain = 'rekord';

    load_theme_textdomain( $domain, WP_LANG_DIR . '/rekord/' );
    load_theme_textdomain( $domain, get_stylesheet_directory() . '/languages/' );
    load_theme_textdomain( $domain, get_template_directory() . '/languages/' );


  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'post-formats', array('video' ) );
  // Add wp title support
  add_theme_support( 'title-tag' );
  add_theme_support( 'custom-logo' );
  add_theme_support( 'align-wide' );

  /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link http://codex.WordPress.org/Function_Reference/add_theme_support#Post_Thumbnails
   */
  add_theme_support( 'post-thumbnails');
    
  // This theme uses wp_nav_menu() in one location.
  register_nav_menus( array(
    'main-menu' => esc_html__( 'Main Menu', 'rekord' ),
    'user-menu' => esc_html__( 'User Dashboard Menu', 'rekord' ),
    'artist-menu' => esc_html__( 'Artist Dashboard Menu', 'rekord' ),
  ) );


  // Setup the WordPress core custom background feature.
  add_theme_support( 'custom-background', apply_filters( 'rekord_custom_background_args', array(
    'default-color' => 'ffffff',
    'default-image' => '',
  ) ) );
}
endif; // rekord_setup

add_action( 'after_setup_theme', 'rekord_setup' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function rekord_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'rekord_pingback_header' );

/**
 *  Author Support to Custom Post types
 */
function rekord_author_support_to_posts() {
  add_post_type_support( 'track', 'author' ); 
}
add_action( 'init', 'rekord_author_support_to_posts' );