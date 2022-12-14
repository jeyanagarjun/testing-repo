<?php
/**
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */
?>
<ul class="project-filter nav nav-tabs card-header-tabs nav-material table-responsive mb-3" role="tablist">
    <li class="nav-item" data-filter="*">
        <a class="nav-link active show" href="#"><?php esc_html_e('All','rekord'); ?></a>
    </li>
    <?php $term_list = rekord_get_terms( "gallery",  "gallery-categories") ?>
    <?php if(!empty($term_list)):
     foreach($term_list as $key =>$term ) : ?>
    <li class="nav-item" data-filter=".type<?php echo esc_attr($key); ?>">
        <a class="nav-link"><?php echo esc_html($term);?></a>
    </li>
    <?php endforeach; endif;?>
</ul>