<?php
/**
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */

    $start_date = rekord_get_field( "start_date" );
    $date = new DateTime($start_date);
?>
<div class="p-md-5 p-3">
    <div class="row">
        <div class="col-md-10 mt-5">
            <div class="relative mb-5 text-white">
                <h1 class="mb-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                <div class="d-flex align-items-center mt-4">
                    <div>
                        <i class="icon-placeholder-3 mr-1"></i>
                        <span><?php echo rekord_get_field('location')['address']; ?></span>
                    </div>
                    <div class="ml-3">
                        <i class="icon-clock mr-2"></i> <span>
                            <?php  rekord_the_field( "start_date" ); ?> ,
                            <?php  rekord_the_field('start_time'); ?>
                            <?php if(!empty($endTime =rekord_get_field('end_time'))) echo ' - ' . $endTime;?>
                        </span>
                    </div>
                </div>
            </div>

            <div class="countDown text-white" data-date="<?php echo esc_attr($date->format('d/m/Y')); ?>">
                <div class="bg-primary"><span class="weeks"><?php esc_html_e('0', 'rekord'); ?></span> <span
                        class="count-type">
                        <?php esc_html_e('Weeks', 'rekord'); ?></span>
                </div>
                <div class="bg-primary"><span class="days"><?php esc_html_e('317', 'rekord'); ?></span> <span
                        class="count-type">
                        <?php esc_html_e('Days', 'rekord'); ?></span>
                </div>
                <div class="bg-primary"><span class="hours"><?php esc_html_e('04', 'rekord'); ?></span> <span
                        class="count-type">
                        <?php esc_html_e('Hours', 'rekord'); ?></span>
                </div>
                <div class="bg-primary"><span class="minutes"><?php esc_html_e('57', 'rekord'); ?></span> <span
                        class="count-type">
                        <?php esc_html_e('Minutes', 'rekord'); ?></span></div>
                <div class="bg-primary"><span class="seconds"><?php esc_html_e('11', 'rekord'); ?></span> <span
                        class="count-type">
                        <?php esc_html_e('Seconds', 'rekord'); ?></span></div>
            </div>
            <div class="pt-3">
                <?php get_template_part( 'templates/event/event', 'button' ); ?>

            </div>


        </div>
    </div>
</div>