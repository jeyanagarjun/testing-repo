<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @author    xvelopers
 * @package   rekord
 * @version   1.0.0
 */
?>

<?php if ( has_nav_menu('main-menu') ) : ?>
<aside class="main-sidebar fixed offcanvas shadow" data-toggle='offcanvas'>
<div class="sidebar">
   
      
        
        <ul class="sidebar-menu">
            <center style="padding-bottom: 30px;"><a href="https://watercoolerusa.wpengine.com/"><img src="http://watercoolerusa.wpengine.com/wp-content/uploads/2021/03/brandmark-design.png" style="width:75%;height:75%;" alt="" /></a></center>
                      
            <?php do_action('rekord_nav_item'); ?>
            <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'main-menu',
                        'menu'           => 'nav navbar-nav',
                        'container'      => 'false',
                        'items_wrap' => '%3$s',
                        'menu_class'     => 'sidebar-menu',
                        'fallback_cb'    => '',
                        'menu_id'        =>  'main-menu',
                        'depth'          => 2,
                    )
                );
                ?>
			<div id="share">
					
<!-- facebook -->
  <a class="facebook" href="https://www.facebook.com/92.7thebridge" target="blank"><i class="fa fa-facebook"></i></a>

  <!-- twitter -->
  <a class="twitter" href=" https://twitter.com/KGBR927" target="blank"><i class="fa fa-twitter"></i></a>

   <!-- linkedin -->
  <a class="linkedin" href="https://www.instagram.com/kgbr927/" target="blank"><i class="fa fa-instagram"></i></a>
  
  <!-- Mail -->
  <a class="pinterest" href="mailto:info@kgbr.com" target="blank"><i class="fa fa-envelope"></i></a>
          </div>              
        </ul>
	
    </div>
</aside>
<?php endif; ?>