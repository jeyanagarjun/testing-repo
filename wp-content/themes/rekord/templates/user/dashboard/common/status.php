<?php
/**
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.3.8
 *  @since     1.3.8
 */
?>
<div>
    <em class="s-10"> 
        <?php if($post->post_status  ==  'draft') : ?>
            <i class="icon-circle mr-2 text-yellow s-10"></i><?php esc_html_e('Pending','rekord'); ?>
        <?php 

    elseif($post->post_status  ==  'publish') :  ?>
        <i class="icon-circle mr-2 text-green s-10"></i><?php esc_html_e('Published','rekord'); ?>
    <?php endif; ?>
    </em>
</div>