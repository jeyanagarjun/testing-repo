<div>
    <?php 
        
        $slug = 'templates/favourites/favourites';
        
         ?>

    <div class="relative mb-5">

        <?php
                   if(!empty( get_theme_mod('xv_favourites'))) :
                   $types  = get_theme_mod('xv_favourites'); ?>

        <div class="card">
            <div class="card-header">
                <div class="mt-3">
                    <ul class=" nav nav-tabs ml-2 card-header-tabs nav-material responsive-tab" role="tablist">
                        <?php  foreach($types as $key=>$type) :  ?>
                        <li class="nav-item">
                            <a class="<?php echo esc_attr ($key==0) ? 'nav-link show active': 'nav-link'?>"
                                id="tabx-<?php echo esc_attr($key);  ?>" data-toggle="tab"
                                href="#tab-<?php echo esc_attr($key); ?>" role="tab" aria-selected="true">
                                <span class="text-capitalize"><?php echo esc_html($type,'rekord') ; ?></span>
                            </a>
                        </li>
                        <?php  endforeach;?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content" id="v-pills-tabContent1">
            <?php foreach($types as $key=>$type) : ?>
            <div class="<?php echo esc_attr ($key==0)  ? 'tab-pane fade show active': 'tab-pane fade'?>"
                id="tab-<?php echo esc_attr($key); ?>" role="tabpanel"
                aria-labelledby="tab-<?php  echo esc_attr($key); ?>">
                <?php   get_template_part($slug, $type.'s'); ?>
            </div>
            <?php endforeach;?>
        </div>
        <?php endif; ?>

    </div>
</div>