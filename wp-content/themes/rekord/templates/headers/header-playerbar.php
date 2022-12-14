<?php
/**
 * @author    xvelopers
 * @package   rekord
 * @version   1.0.0
 */
?>

<!--navbar-->
<nav class="navbar-wrapper shadow <?php echo get_theme_mod('top_bar') ? 'top-bar':'navbar-bottom-fixed'; ?>">
    <div class="navbar navbar-expand player-header justify-content-between  bd-navbar">
        <div class="d-flex align-items-center">
            <?php if (!get_theme_mod('rekord_top_menu') && has_nav_menu('main-menu') ) : ?>
            <div class="ml-2 mr-2">
                <a href="#" data-toggle="push-menu" class="paper-nav-toggle pp-nav-toggle paper-nav-toggle-sidenav d-xl-none">
                    <i></i>
                </a>
            </div>
            <?php endif; ?>

            <?php   
                if(!get_theme_mod('rekord_top_menu')){   
                    set_query_var( 'logo_classes', 'd-none d-lg-block' );
                    get_template_part('templates/headers/header', 'logo');
                } 
            ?>

        </div>

        <?php
        if (get_theme_mod('rekord_player')) :
             get_template_part('templates/headers/header', 'player') ;
        endif; 
        ?>
        <!--Top Menu Start -->
        <div class="navbar-custom-menu">
			
            <ul class="nav navbar-nav">

                <!-- Right Sidebar Toggle Button -->
                <?php if(rekord_has_posts('track') ): ?>
                <li class="searchOverlay-wrap">
                    <a href="#" id="btn-searchOverlay" class="nav-link mr-3 btn--searchOverlay no-ajaxy">
                       
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

</nav>
<?php do_action('rekord_after_nav'); ?>


<!--search-->
<?php get_template_part('templates/headers/header', 'search'); ?>