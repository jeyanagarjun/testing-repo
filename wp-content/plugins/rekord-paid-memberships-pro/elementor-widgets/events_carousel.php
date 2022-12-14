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
    class Events_Carousel extends Widget_Base {
        
        public function get_name() {
            return 'events_carousel';
        }
        
        public function get_title() {
            return __( 'Events Carousel', 'elementor' );
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
                'settings',
                [
                    'label' => __( 'Carousel Settings', 'rekord' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'enable_carousel',
                [
                    'label' => __( 'Enable Carousel', 'rekord' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Enable', 'your-plugin' ),
                    'label_off' => __( 'disable', 'your-plugin' ),
                    'return_value' => 'yes',
                    'default' => 'no',
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
                    'default' => 3,
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
                    'default' => 2,
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
                'style',
                [
                    'label' => __( 'Style', 'rekord' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'label_block' => true,
                    'default' => 'grid',
                    'options' => [
                        'list'  => __( 'List Style', 'rekord' ),
                        'grid' => __( 'Grid Style', 'rekord' ),
                    ],
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
            // $this->add_control(
            //     'offset',
            //     [
            //         'label' => __( 'Post Offset', 'rekord' ),
            //         'type' => \Elementor\Controls_Manager::NUMBER,
            //         'min' => 1,
            //         'max' => 50,
            //         'step' => 1,
            //         'default' => 0,
            //     ]
            // );
            $this->add_control(
                'pagination',
                [
                    'label' => __( 'Pagination', 'rekord' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Enable', 'your-plugin' ),
                    'label_off' => __( 'disable', 'your-plugin' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );
            $this->add_control(
                'categories',
                [
                    'label' => __( 'Categories', 'rekord' ),
                    'type' => \Elementor\Controls_Manager::SELECT2,
                    'multiple' => true,
                    'options' => rekord_get_terms('event','event-categories'),
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

<section>

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
    <div class="<?php echo  $wrapperClasses; ?> has-items-overlay" data-item="<?php echo $settings['lg_items']; ?>"
        data-pause="8000" data-pauseonhover="true" data-item-lg="<?php echo $settings['md_items']; ?>"
        data-item-md="<?php echo $settings['md_items']; ?>" data-item-sm="<?php echo $settings['sm_items']; ?>"
        data-auto="<?php echo $settings['auto']; ?>" data-pager="<?php echo $settings['pager']; ?>"
        data-controls="<?php echo $settings['controls']; ?>" data-loop="<?php echo $settings['loop']; ?>">
        <?php

        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;


      $args = array(
          'post_type'=>'event',
          'posts_per_page' => $settings['posts_per_page'],
          'paged' => $paged ,
         /// 'offset'=>$settings['offset'],
        ); 

    
      if(!empty($settings['categories'])){
          $args['tax_query'] = 
          array(
              array(
                  'taxonomy' => 'event-categories',   // taxonomy name
                  'field' => 'term_id',           // term_id, slug or name
                  'terms' => $settings['categories'],                  // term id, term slug or term name
              )
              );
      }


        $q = new \WP_Query( $args );
        
        if($settings['style'] == 'grid'){
        if ($q->have_posts()) : while ($q->have_posts()) : $q->the_post();
        get_template_part('templates/event/event', 'loop');
        endwhile; endif; wp_reset_query();
        }else{
        echo '<ul class="list-group no-b">';
            if ($q->have_posts()) : while ($q->have_posts()) : $q->the_post();
            get_template_part('templates/event/event', 'list');
            endwhile; endif; wp_reset_query();
            echo '</ul>';
        }

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
