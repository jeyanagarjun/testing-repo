<?php
/**
 *  Rekord 1 Click Importer
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */

function rekord_import_files() {
	return array(
	  array(
		'import_file_name'             => 'Demo Import 1',
		'categories'                   => array( 'Category 1', 'Category 2' ),
		'local_import_file'            =>  trailingslashit( get_template_directory() )  . 'inc/demo-data/content.xml',
		'local_import_widget_file'     =>  trailingslashit( get_template_directory() )  . 'inc/demo-data/widgets.wie',
		'local_import_customizer_file' =>  trailingslashit( get_template_directory() )  . 'inc/demo-data/customizer.dat',
		'import_preview_image_url'     =>   get_template_directory_uri() . '/inc/demo-data/screenshot.jpg',
		'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'rekord' ),
	  ),
	);
  }
  add_filter( 'pt-ocdi/import_files', 'rekord_import_files' );

function rekord_after_import_setup() {
	// Assign menus to their locations.
	$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
	set_theme_mod( 'nav_menu_locations', array(
			'main-menu' => $main_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home Page' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'rekord_after_import_setup' );