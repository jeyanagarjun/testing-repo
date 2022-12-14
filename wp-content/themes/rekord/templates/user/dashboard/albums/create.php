<?php

wp_deregister_style( 'wp-admin' );

$redirect = esc_url( get_page_link(get_theme_mod('page_my_albums')) );

if(isset($_GET['post']) && isOwner($_GET['post'])) :
$options = array(
    'post_id' => $_GET['post'],
    'field_groups' => array('group_rekord_album_fields'),
    'form' => true,
    'return' => $redirect.'?status=updated&type=album',
    'submit_value' => esc_html__('Update Album','rekord'),

    'html_submit_button' => '<input type="submit" class="acf-button btn btn-primary my-4 ml-2" value="%s" />',
);
else:

$options = array(
    'post_id' => 'new_post',
    'field_groups' => array('group_rekord_album_fields'),
    'form' => true,
    'return' => $redirect.'?status=new&type=album',
    'submit_value' => esc_html__('Create Album','rekord'),
    'html_submit_button' => '
    <input name="type" value="album" type="hidden" />
    <input type="submit" class="acf-button btn btn-primary my-4 ml-2" value="%s" />',
);
endif; ?>
<div class="row">
    <div class="col-md-12">
        <div class="card p-3">
            <?php acf_form($options); ?>
        </div>
    </div>
</div>