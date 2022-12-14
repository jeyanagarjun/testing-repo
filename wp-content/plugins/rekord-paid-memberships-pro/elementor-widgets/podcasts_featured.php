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
    class Rekord_Podcasts_Featured extends Widget_Base {
        
        public function get_name() {
            return 'podcasts_featured';
        }
        
        public function get_title() {
            return __( 'Podcasts Featured', 'elementor' );
        }




        
        protected function _register_controls() {
            
           

            $this->start_controls_section(
                'settings',
                [
                    'label' => __( 'Carousel Settings', 'rekord' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

    
            $this->add_control(
                'lg_items',
                [
                    'label' => __( 'Items On Desktop', 'rekord' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 10,
                    'step' => 1,
                    'default' => 1,
                ]
            );
            $this->add_control(
                'md_items',
                [
                    'label' => __( 'Items On Tablet', 'rekord' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 10,
                    'step' => 1,
                    'default' => 1,
                ]
            );
            $this->add_control(
                'sm_items',
                [
                    'label' => __( 'Items On Mobile', 'rekord' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 10,
                    'step' => 1,
                    'default' => 1,
                ]
            );
          

            $this->add_control(
                'auto',
                [
                    'label' => __( 'Auto', 'rekord' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Yes', 'your-plugin' ),
                    'label_off' => __( 'No', 'your-plugin' ),
                    'return_value' => 'true',
                    'default' => 'false',
                ]
            );
            $this->add_control(
                'loop',
                [
                    'label' => __( 'Loop', 'rekord' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Yes', 'your-plugin' ),
                    'label_off' => __( 'No', 'your-plugin' ),
                    'return_value' => 'true',
                    'default' => 'true',
                ]
            );


            $this->add_control(
                'pager',
                [
                    'label' => __( 'Pager', 'rekord' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'your-plugin' ),
                    'label_off' => __( 'Hide', 'your-plugin' ),
                    'return_value' => 'true',
                    'default' => 'false',
                ]
            );

            $this->add_control(
                'controls',
                [
                    'label' => __( 'Controls', 'rekord' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'your-plugin' ),
                    'label_off' => __( 'Hide', 'your-plugin' ),
                    'return_value' => 'true',
                    'default' => 'true',
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
           
           
      
            ?>


<section class="playlist">
    <div class="lightSlider" data-item="<?php echo !empty($settings['lg_items']) ? $settings['lg_items'] : 1 ?>"
        data-pause="8000" data-pauseonhover="true"
        data-item-lg="<?php echo !empty($settings['md_items']) ? $settings['md_items'] : 1; ?>"
        data-item-md="<?php echo !empty($settings['md_items']) ? $settings['md_items'] : 1 ; ?>"
        data-item-sm="<?php echo !empty($settings['sm_items'])? $settings['sm_items'] : 1 ; ?>"
        data-auto="<?php echo $settings['auto'] ? $settings['auto']: false; ?>"
        data-pager="<?php echo $settings['pager'] ? $settings['pager'] : false; ?>"
        data-controls="<?php echo $settings['controls'] ? $settings['controls'] : false; ?>"
        data-loop=" <?php echo $settings['loop']?  $settings['loop'] : false; ?> ">

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
                  'taxonomy' => 'podcast-categories',
                  'field' => 'term_id',         
                  'terms' => $settings['categories'],              
              )
              );
      }


        $q = new \WP_Query( $args );
        if ($q->have_posts()) : while ($q->have_posts()) : $q->the_post(); 
            
            get_template_part('templates/podcast/podcast', 'featured'); 
        
        endwhile; endif;  wp_reset_postdata(); 
    

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

    lightSlider();


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