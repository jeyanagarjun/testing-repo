<?php if(get_theme_mod('frontend_auth')): ?>
<?php if(is_user_logged_in()):
        $user = wp_get_current_user();
        if ( $user ) :?>

<li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children parent dropdown menu-item-1357">
    
    <?php if(get_theme_mod('rekord_top_menu')){ ?>
    <a href="#" class="nav-link" data-toggle="dropdown">
        <figure class="avatar">
            <img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>"
                alt="">
        </figure>
        <i class="icon-more_vert"></i>
    </a>
    <?php }else{ ?>

    <div class="d-flex align-items-center mb-3">
        <a href="#" class="nav-link" data-toggle="dropdown">
            <figure class="avatar ml-2">
                <img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>"
                    alt="">
            </figure>
        </a>
        <div class="ml-2">
        <h6><?php echo esc_html( $user->display_name )  ?></h6>
        <div>
        <small>
        <a class="no-ajaxy" href="<?php echo wp_logout_url(home_url()); ?>">
           <?php _e('Log Out', 'rekord'); ?></a>
        </small>
        </div>
        </div>
        <i class="icon-more_vert"></i>
    </div>
    <?php } ?>
    <ul class="sub-menu">
   
        <?php
                wp_nav_menu(
                array(
                    'theme_location' => 'user-menu',
                    'menu'           => 'nav navbar-nav',
                    'container'      => 'false',
                    'menu_class'     => 'user-menu',
                    'fallback_cb'    => '',
                    'menu_id'        =>  'user-menu',
                    'depth'          => 1,
                )
            );
         ?>
         <?php if(get_theme_mod('rekord_top_menu')){ ?>
          <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-1188 current_page_item menu-item-1171">
        <a class="no-ajaxy" href="<?php echo wp_logout_url(home_url()); ?>"><i class="icon icon-sign s-18"></i>
           <?php _e('Log Out', 'rekord'); ?></a>
        </li>
         <?php } ?>
    </ul>
</li>
<?php  endif;  else: ?>

<li>
    <a class="btn btn-primary nav-btn" href="#" data-toggle="modal" data-target="#loginModal">
      <?php _e( 'Sign In','rekord') ; ?>
    </a>
</li>
<li>
    <a class="btn btn-primary nav-btn" href="<?php echo esc_url( get_page_link(get_theme_mod('page_user_register')) ); ?>">
      <?php _e( 'Register','rekord') ; ?>
    </a>
</li>

<?php endif; ?>

<?php endif ; ?>