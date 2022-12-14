<?php
/**
 *  Events Single Page
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */

  get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>


<div class="container-fluid relative animatedParent animateOnce no-p">
    <div class="animated fadeInUpShort  parallel">
        <div class="row grid">
            <div class="col-md-7">
                <div class="p-5 ">
                    <div class="slimScroll" data-color="rgb(255, 23, 68)" data-visible="true" data-size="5"
                        data-Opacity=".9">
                        <div class="mb-5">
                            <div class="d-lg-flex align-items-center">
                                <h1 class="mb-2"><?php the_title(); ?></h1>
                                <?php get_template_part('templates/global/share', 'plugins'); ?>
                            </div>

                            <div class="d-flex align-items-center mt-4">
                                <div>
                                    <i class="icon-placeholder-3 mr-1"></i>
                                    <span><?php echo rekord_get_field('location')['address']; ?></span>
                                </div>
                                <div class="ml-3">
                                    <i class="icon-clock mr-2"></i>
                                    <?php rekord_the_field( "start_date" ); ?>
                                    <?php  rekord_the_field('start_time'); ?>
                                    <?php if(!empty($endTime =rekord_get_field('end_time'))) echo ' - ' . $endTime; ?>
                                </div>
                            </div>
                        </div>
                        <?php get_template_part('templates/event/event','countdown'); ?>
                        <div class="pt-3">
                            <?php get_template_part( 'templates/event/event', 'button' ); ?>
                        </div>
                        <div class="my-5">
                            <?php the_content(); ?>
                        </div>
                        <?php $artists = rekord_get_field('artists'); ?>
                        <?php if( $artists ): ?>
                        <div class="relative my-5">
                            <h3 class="mb-2 text-primary"><?php esc_html_e('Performers','rekord'); ?></h3>
                        </div>
                        <div class="row mb-5">
                            <?php foreach( $artists as $post):  ?>
                            <div class="col-md-4 my-3">
                                <div class="text-center">
                                    <figure class="avatar avatar-xl">
                                        <?php if ( has_post_thumbnail() ) {the_post_thumbnail('small', array('class' => 'circle img-fluid'));} ?>
                                    </figure>
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="my-1"> <?php the_title(); ?></div>
                                    </a>
                                    <div><?php rekord_the_field('designation'); ?></div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; wp_reset_postdata();?>
                        <div class="p-5 m-5"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 height-full">
                <!-- Google Map -->
                <div class="g-map" data-id="contact-map"
                    data-address="<?php echo esc_attr(rekord_get_field('location')['address']) ; ?>" data-zoomlvl="12"
                    data-maptype="HYBRID">
                </div>
                <!-- Contact List -->
            </div>
        </div>
    </div>
    <!--@Banner-->
</div>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>