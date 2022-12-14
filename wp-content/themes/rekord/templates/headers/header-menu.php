<?php
/**
 * @author    xvelopers
 * @package   rekord
 * @version   1.0.0
 */
?>


<!--navbar-->
<nav class="mainnav navbar navbar-default justify-content-between">
  <div class="relative <?php echo (get_theme_mod('rekord_menu_style') == 'center') ? 'navbar-center' : 'container px-md-5'; ?>">
        <?php 
         
        get_template_part('templates/headers/header', 'logo'); ?>
        <div class="d-flex align-items-center">
            <?php if ( has_nav_menu('main-menu') ) : ?>
            <div class="ml-2 mr-2">
            <a class="offcanvas dl-trigger paper-nav-toggle" type="button" data-toggle="offcanvas"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i></i>
                </a>
            </div>
            <?php endif; ?>
         
        </div>
        <div class="paper_menu">
        <div id="dl-menu" class="xv-menuwrapper responsive-menu">
        <ul class="dl-menu align-items-center">
        <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'main-menu',
                        'menu'           => 'nav navbar-nav',
                        'container'      => 'false',
                        'items_wrap'     => '%3$s',
                        'menu_class'     => 'sidebar-menu',
                        'fallback_cb'    => '',
                        'menu_id'        =>  'main-menu',
                        'depth'          => 4,
                        //'walker' => new rekord_Walker_Nav_Menu()
                    )
                );
                ?>
                <?php do_action('rekord_nav_item'); ?>
            </ul>
        </div>
        </div>
     
    </div>
</nav>
<?php do_action('rekord_after_nav'); ?>
