<?php
/**
 * Plugin Name: Login Module
 * Plugin URI: http://xvelopers.com/xv-login
 * Description: A login plugin for wordpress 
 * Version: 1.0
 * Author: xvelopers
 * Author URI: http://xvelopers.com
 * License: GPL2
 */
	function xv_xv_ajax_login_init(){
	
	 wp_register_script('ajax-auth-script',   get_template_directory_uri() . '/assets/js/auth.js', array('jquery') ); 
	 wp_enqueue_script('ajax-auth-script');

        wp_localize_script('ajax-auth-script', 'ajax_auth_object', array( 
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'redirecturl' => $_SERVER['REQUEST_URI'],
            'loadingmessage' => __('Sending user info, please wait...','rekord')
        ));
		
	    // Enable the user with no privileges to run xv_ajax_login() in AJAX
		add_action( 'wp_ajax_nopriv_ajaxlogin', 'xv_ajax_login' );
		add_action( 'wp_ajax_nopriv_ajaxregister', 'xv_ajax_register' );
	}

	// Execute the action only if the user isn't logged in
	if(!class_exists('bbPress')){
			if (!is_user_logged_in()) {
				add_action('init', 'xv_xv_ajax_login_init');
			}
	}else{
		if(is_user_logged_in()){
				add_action('init', 'xv_xv_ajax_login_init');
		}
	}

	
	function xv_ajax_login(){
	    // First check the nonce, if it fails the function will break
	    check_ajax_referer( 'ajax-login-nonce', 'security' );
	    // Nonce is checked, get the POST data and sign user on
	    $info = array();
	    $info['user_login'] = $_POST['username'];
	    $info['user_password'] = $_POST['password'];
	    $info['remember'] = true;

	    $user_signon = wp_signon( $info, false );
	    if ( is_wp_error($user_signon) ){
	        echo json_encode(array('loggedin'=>false, 'message'=>__('Wrong username or password.','rekord')));
	    } else {
		
	    echo json_encode(array('loggedin'=>true, 'message'=>__('Login successful, redirecting...','rekord')));
	    }
	    die();
    }
    
    function rekord_login_link(){
        get_template_part('templates/auth/header', 'login-btn') ;
    }
    add_action('rekord_nav_item','rekord_login_link');

    function rekord_login_modal(){
        get_template_part('templates/auth/modal', 'login') ;
    }
    add_action('rekord_after_nav','rekord_login_modal');