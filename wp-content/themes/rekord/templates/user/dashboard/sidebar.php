<?php

get_template_part('templates/auth/loggedin', 'user'); 

wp_nav_menu(
    array(
        'theme_location' => isArtist() ? 'artist-menu' :'user-menu',
         'menu'          => 'nav navbar-nav',
        'container'      => 'false',
        'menu_class'     => 'user-menu',
        'fallback_cb'    => '',
        'menu_id'        =>  'user-menu',
        'depth'          => 1,
    )
);
 ?>