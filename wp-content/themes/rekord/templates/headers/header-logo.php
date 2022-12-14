
    <a class="navbar-brand <?php echo !empty($logo_classes) ? $logo_classes : ''; ?>" href="<?php echo esc_url(home_url('/')); ?>"
    title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">

    <?php
        // check to see if the logo exists and add it to the page
        if (get_theme_mod('custom_logo')): ?>

    <img class="d-inline-block align-top" src="<?php echo rekord_the_custom_logo(); ?>"
        alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
    <?php  else: ?>

    <div class="align-items-center s-14 l-s-2">
        <span><?php bloginfo('name');?></span>
    </div>

    <?php endif;?>

</a>