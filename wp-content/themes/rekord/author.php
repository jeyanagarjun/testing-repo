<?php
/**
 *  Artist Single Page
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */
   get_header();
   $slug = 'templates/user/profile/profile';

?>

<!--Page Content-->
<main>
    <div class="container-fluid relative animatedParent animateOnce p-0">
        <div class="animated fadeInUpShort">
        
            <?php get_template_part( $slug , 'header' ); 
            
            if(isArtist()){
                $types =  get_theme_mod('page_artist_profile_tabs');
            }else{
                $types =  get_theme_mod('page_profile_tabs');
            }
            ?>
            <?php  
            if(!empty( $types)) :?>
                <div class="container px-5">
                    <div class="tab-content" id="v-pills-tabContent1">
                        <?php foreach($types as $key=>$type) : ?>
                        <div class="<?php echo esc_attr ($key==0)  ? 'tab-pane fade show active': 'tab-pane fade'?>"
                            id="tab-<?php echo esc_attr($key); ?>" role="tabpanel"
                            aria-labelledby="tab-<?php  echo esc_attr($key); ?>">
                            <?php  get_template_part($slug, $type); ?>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>