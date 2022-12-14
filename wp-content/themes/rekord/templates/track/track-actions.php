<?php $slug = 'templates/track/track';
    $options=  get_query_var('options');
?>
  <div class="d-flex align-items-center ">
<?php if(isset($options['show_time']) && $options['show_time']): ?>
                    <span class="col mr-2 track-time">
                        <?php get_template_part( $slug, 'time' );  ?>
                    </span>
                    <?php endif;  ?>
                    <?php if(isset($options['show_share']) && $options['show_share']): ?>
                    <div class="col">
                        <?php get_template_part( $slug, 'share' );  ?>
                    </div>
                    <?php endif;  ?>
                    <?php if(isset($options['show_favourite']) && $options['show_favourite']): ?>
                    <div class="col">
                        <?php get_template_part(  'templates/favourites/favourites', 'button' );  ?>
                    </div>
                    <?php endif;  ?>
                    <?php 
                    if(isset($options['show_download']) && $options['show_download'] && rekord_get_field('allow_download')): ?>
                    <div class="col">
                        <?php get_template_part(  $slug, 'download' );  ?>
                    </div>
                    <?php endif;  ?>
                    <?php if(isset($options['show_description']) && $options['show_description'] &&  !empty( get_the_content() )): ?>
                    <div class="col">
                        <a data-toggle="collapse" href="#collapse-<?php the_ID(); ?>">
                            <i class="icon-edit-1"></i>
                        </a>
                    </div>
                    <?php endif;  ?>


                    <?php if(isset($options['show_edit']) && $options['show_edit']): ?>
                    <div class="col">
                        <a
                            href="<?php echo esc_url( get_page_link(get_theme_mod('page_track_save')) ); ?>?post=<?php the_ID(); ?>">
                            <i class=" icon-edit"></i>
                        </a>
                    </div>
                    <?php endif;  ?>

                    <?php   if(isset($options['show_delete']) && $options['show_delete']): ?>
                    <div class="col">

                        <?php if( current_user_can('delete_post', get_the_ID())) : ?>
                        <?php $nonce = wp_create_nonce('my_delete_post_nonce') ?>

                        <a href="#" data-id="<?php the_ID() ?>"
                            data-confirm="<?php esc_html_e('Are you sure you want to delete this?','rekord'); ?>"
                            data-nonce="<?php echo wp_create_nonce('my_delete_post_nonce') ?>" class="delete-post"><i
                                class="icon-close"></i></a>
                        <?php endif ?>

                    </div>
                    <?php endif;  ?>
                    
                    </div>
                    <div class="ml-auto">
                    <div class="ml-3 relative">
                        <?php if(isset($options['show_button']) && $options['show_button']): ?>

                        <?php get_template_part( $slug, 'button' );  ?>

                        <?php endif;  ?>
                    </div>
                </div>

                <?php if(isset($options['show_status']) && $options['show_status']): ?>
                <?php if($post->post_status  ==  'draft') : ?>
                <span class="badge badge-warning"><?php esc_html_e('Pending','rekord'); ?></span>

                <?php endif; ?>
                <?php endif; ?>