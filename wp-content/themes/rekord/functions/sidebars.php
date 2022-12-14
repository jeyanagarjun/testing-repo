<?php
/**
 *  rekord Register sidebars and footer areas
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */
  
/*----------------------------------------------------------------
   *  Register widgetized area and update sidebar with default widgets.
   *
   * @register  - All required sidebars and widget areas 
   *-----------------------------------------------------------------*/

add_action( 'widgets_init', 'rekord_widgets_init' );

function rekord_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar', 'rekord' ),
    'id'            => 'default',
     'before_widget' => '<aside id="%1$s" class="widget card p-4 mb-3 %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<div class="transparent b-b mb-3"><h5>',
      'after_title'   => '</h5></div>',
  ) );
	
}