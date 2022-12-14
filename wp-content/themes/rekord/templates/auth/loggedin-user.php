<?php 

if (is_user_logged_in()) { 
    $user = wp_get_current_user();
?>
<div class="mb-5">
    <figure class="avatar avatar-md float-left mr-3 mt-1">
        <img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>"
            alt="">
    </figure>
    <div>
        <h6>
            <?php  echo esc_html( $user->display_name ); ?>
        </h6>
        <small>
            <a class="no-ajaxy"
                href="<?php echo wp_logout_url(get_permalink()); ?>"><?php esc_html_e('Log Out', 'rekord'); ?></a></small>
    </div>
</div>
<?php } ?>