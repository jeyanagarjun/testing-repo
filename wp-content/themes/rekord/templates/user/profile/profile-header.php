
 <?php
    global $wp_query;
    $user = $wp_query->get_queried_object(); 
    $key = 'user_'.$user->id;
    $image = rekord_get_field('profile_cover', $key ); 
    $types  = get_theme_mod('page_profile_tabs');
?>
     
<section class="relative" data-bg-possition="center"
    style="background-image:url('<?php if( $image )  echo esc_url($image['url']); ?>');">
        <div class="has-bottom-gradient">
            <div class="container px-5">
                <div class="row pt-5">
                    <div class="col-md-2">
                        <div class="profile-img">
                        <img src="<?php echo esc_url( get_avatar_url( $user->ID,array("size"=>570 ) ) );?>" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="d-md-flex align-items-center justify-content-between">
                            <div>
                                <h1 class="mt-4 mb-3"><?php echo $user->display_name; ?></h1>
                                <?php  get_template_part('templates/artist/artist','relations-count'); ?>
                            </div>
                            <div class="ml-auto mb-2">
                                <?php get_template_part('templates/global/share', 'plugins'); ?>
                            </div>
                        </div>
                        <div class="text-white my-2">
                                <?php  rekord_the_field('description', $key ) ?>
                        </div>
                    </div>
                </div>
                <div class="my-3">
                    <ul class=" nav nav-tabs ml-2 mt-3  nav-material responsive-tab" role="tablist">
                        <?php  foreach($types as $key=>$type) :  ?>
                        <li class="nav-item">
                            <a class="<?php echo esc_attr ($key==0) ? 'nav-link show active': 'nav-link'?>"
                                id="tabx-<?php echo esc_attr($key);  ?>" data-toggle="tab"
                                href="#tab-<?php echo esc_attr($key); ?>" role="tab" aria-selected="true">
                                <span class="text-uppercase"><?php echo esc_html($type,'rekord') ; ?></span>
                            </a>
                        </li>
                        <?php  endforeach;?>
                    </ul>
                </div>
            </div>
        </div>
    <div class="bottom-gradient "></div>
</section>
            <!--@Banner-->