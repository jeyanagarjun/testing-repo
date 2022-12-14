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
    class Events_Counter extends Widget_Base {
        
        public function get_name() {
            return 'events_counter';
        }
        
        public function get_title() {
            return __( 'Events Counter', 'elementor' );
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
                    'image', [
                    'label' => __( 'Choose Image', 'rekord' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ]
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
            ?>

<section class="relative xv-slide" data-bg-possition="left" data-bg-repeat="false"
    style="background-image:url('<?php echo $settings['image']['url'] ?>');">
    <div class="lightSlider has-items-overlay has-bottom-gradient" data-item="1" data-pause="8000"
        data-pauseonhover="true" data-auto="<?php echo $settings['auto']; ?>"
        data-pager="<?php echo $settings['pager']; ?>" data-controls="<?php echo $settings['controls']; ?>"
        data-loop="<?php echo $settings['loop']; ?>">
        <?php
      $args = array(
          'post_type'=>'event',
          'posts_per_page' => $settings['posts_per_page'],
    
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
        
       
        if ($q->have_posts()) : while ($q->have_posts()) : $q->the_post();
            get_template_part('templates/event/event', 'counter');
        endwhile; endif; wp_reset_query();


        if ( \Elementor\Plugin::instance()->editor->is_edit_mode() ) {
             $this->render_editor_script();
        }
        
        ?>

    </div>
    <div class="bottom-gradient "></div>
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