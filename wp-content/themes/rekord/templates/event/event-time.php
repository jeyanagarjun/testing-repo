<?php
/**
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */
?>
<i class="icon-clock-o mr-1"> </i>
<?php  rekord_the_field('start_time'); ?>
<?php if(!empty($endTime =rekord_get_field('end_time'))) echo ' - ' . $endTime;?>