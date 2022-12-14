<?php
namespace RekordThemeEssential\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Post Carousel
 *
 * Elementor widget for Rekord
 *
 * @since 1.0.0
 */
    class Rekord_Podcasts extends Widget_Base {
        
        public function get_name() {
            return 'podcasts_carousel';
        }
        
        public function get_title() {
            return __( 'Podcasts', 'elementor' );
        }



        
        protected function _register_controls() {
            
            $this->start_controls_section(
                'header_section',
                [
                    'label' => __( 'Header', 'rekord' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
    
            $this->add_control(
                'title',
                [
                    'label' => __( 'Title', 'rekord' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'placeholder' => __( 'Type your title here', 'rekord' ),
                ]
            );

            $this->add_control(
                'subtitle',
                [
                    'label' => __( 'Sub Title', 'rekord' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'placeholder' => __( 'Type your title here', 'rekord' ),
                ]
            );

            $this->add_control(
                'view_all_label',
                [
                    'label' => __( 'View All Link Label', 'rekord' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'placeholder' => __( 'Type your title here', 'rekord' ),
                ]
            );

            $this->add_control(
                'view_all_url',
                [
                    'label' => __( 'View All Link', 'rekord' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => __( 'https://your-link.com', 'rekord' ),
                    'show_external' => true,
                    'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true,
                    ],
                ]
            );
               
            $this->end_controls_section();
    
            
            $this->start_controls_section(
                'Posts Settings',
                [
                    'label' => __( 'Post Settings', 'rekord' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

         
            
            
            $this->add_control(
                'posts_per_page',
                [
                    'label' => __( 'Number Of Posts', 'rekord' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 30,
                    'step' => 1,
                    'default' => 5,
                ]
            );
         
            $this->add_control(
                'categories',
                [
                    'label' => __( 'Categories', 'rekord' ),
                    'type' => \Elementor\Controls_Manager::SELECT2,
                    'multiple' => true,
                    'options' => rekord_get_terms('podcast','podcast-categories'),
                   // 'default' => [ 'title', 'description' ],
                ]
            );

            $this->end_controls_section();
            
        }
        
        protected function render() {
            $settings = $this->get_settings_for_display();
            $slug = 'templates/track/track';
            
            $wrapperClasses = '';
            if($settings['enable_carousel'] === 'yes'){
                $wrapperClasses = 'lightSlider';
            }


      
            ?>

<section class="playlist p-md-5 p-3">

    <?php
     if(!empty($settings['title'])
     || !empty($settings['subtitle']) 
     || !empty($settings['view_all_label'])  ): ?>
    <div class="d-flex relative align-items-center justify-content-between">
        <div class="mb-4">
            <h4><?php echo  $settings['title']; ?></h4>
            <p><?php echo  $settings['subtitle']; ?></p>
        </div>
        <a href="<?php echo $settings['view_all_url']['url'] ?>">
        <?php echo  $settings['view_all_label'] ?>
            <i class="<?php echo get_theme_mod('layout_rtl') ?  'icon-angle-left mr-3': 'icon-angle-right ml-3' ;?>"></i>
        </a>
    </div>
    <?php endif; ?>
    <div>
        <?php

        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;


      $args = array(
          'post_type'=>'podcast',
          'posts_per_page' => $settings['posts_per_page'],
          'paged' => $paged ,
         /// 'offset'=>$settings['offset'],
        ); 

    
      if(!empty($settings['categories'])){
          $args['tax_query'] = 
          array(
              array(
                  'taxonomy' => 'podcast-categories',   // taxonomy name
                  'field' => 'term_id',           // term_id, slug or name
                  'terms' => $settings['categories'],                  // term id, term slug or term name
              )
              );
      }


        $q = new \WP_Query( $args );
        
       ?>
        <div class="row">
            <?php if ($q->have_posts()) : while ($q->have_posts()) : $q->the_post();  ?>
            <div class="col-md-4">
                <?php  get_template_part('templates/podcast/podcast', 'loop'); ?>
            </div>
            <?php endwhile; endif;  wp_reset_postdata(); ?>
        </div>


        <?php 
        if ($settings['pagination'] == 'yes' && function_exists("xv_get_pagination")) {
        echo '<div class="my-3">';
            xv_get_pagination($q,$paged);
            echo '</div>';
        }


        if ( \Elementor\Plugin::instance()->editor->is_edit_mode() ) {
        $this->render_editor_script();
        }

        ?>

    </div>
</section>

<!--@New Releases-->
<?php
        }
     
        
    /**
	 * Render masonry script
	 * 
	 * @access protected
	 */


	protected function render_editor_script() { ?>
<script type="text/javascript">
jQuery(document).ready(function($) {

    //    if (!$(".xv-slide").hasClass("active")) {
    lightSlider();
    //  }
});
</script>

<style>
#elementor .animated.go {
    animation-fill-mode: both !important;
}
</style>

<?php
    }

        }