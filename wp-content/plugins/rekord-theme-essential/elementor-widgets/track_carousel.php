<?php
namespace RekordThemeEssential\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Track Carousel
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
    class Track_Carousel extends Widget_Base {
        
        public function get_name() {
            return 'track';
        }
        
        public function get_title() {
            return __( 'Track Carousel', 'elementor' );
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
                'carousel_settings',
                [
                    'label' => __( 'Carousel Settings', 'rekord' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'style',
                [
                    'label' => __( 'Carousel Style', 'rekord' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'label_block' => true,
                    'default' => 'full',
                    'options' => [
                        'mini'  => __( 'Mini', 'rekord' ),
                        'full' => __( 'full', 'rekord' ),
                    ],
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
                    'max' => 20,
                    'step' => 1,
                    'default' => 3,
                ]
            );
            $this->add_control(
                'sm_items',
                [
                    'label' => __( 'Items On Mobile', 'rekord' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 20,
                    'step' => 1,
                    'default' => 2,
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
                'settings',
                [
                    'label' => __( 'Post Settings', 'rekord' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
    
         

            $this->add_control(
                'posts_per_page',
                [
                    'label' => __( 'Number of Posts', 'rekord' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 6,
                    'max' => 30,
                    'step' => 5,
                    'default' => 8,
                ]
            );

            $this->add_control(
                'track_categories',
                [
                    'label' => __( 'Track Categories', 'rekord' ),
                    'type' => \Elementor\Controls_Manager::SELECT2,
                    'multiple' => true,
                    'options' => rekord_get_terms('track','track-categories'),
                   // 'default' => [ 'title', 'description' ],
                ]
            );
            // $this->add_control(
            //     'album_categories',
            //     [
            //         'label' => __( 'Album Categoreis', 'rekord' ),
            //         'type' => \Elementor\Controls_Manager::SELECT2,
            //         'multiple' => false,
            //         'options' => rekord_get_terms('album','album-categories'),
            //        // 'default' => [ 'title', 'description' ],
            //     ]
            // );
    
            $this->add_control(
                'albums',
                [
                    'label' => __( 'Albums', 'rekord' ),
                    'type' => \Elementor\Controls_Manager::SELECT2,
                    'multiple' => false,
                    'options' => rekord_get_posts_list('album'),
                   // 'default' => [ 'title', 'description' ],
                ]
            );

    
            $this->end_controls_section();
            
        }
        
        protected function render() {
            $settings = $this->get_settings_for_display();
            $slug = 'templates/track/track';


      
            ?>

<!--New Releases-->
<section>
    <div class="d-flex relative align-items-center justify-content-between">
        <div class="mb-4">
            <h4><?php echo  $settings['title']; ?></h4>
            <p><?php echo  $settings['subtitle']; ?></p>
        </div>

        <?php if(!empty($settings['view_all_label'])): ?>
        <a href="<?php echo $settings['view_all_url']['url'] ?>">
        <?php echo  $settings['view_all_label'] ?>
            <i class="<?php echo get_theme_mod('layout_rtl') ?  'icon-angle-left mr-3': 'icon-angle-right ml-3' ;?>"></i>
        </a>
        <?php endif; ?>
  
    </div>

    <div class="lightSlider has-items-overlay playlist" data-item="6" data-pause="30000" data-pauseonhover="true"
        data-item-lg="<?php echo $settings['lg_items']; ?>" data-item-md="<?php echo $settings['md_items']; ?>"
        data-item-sm="<?php echo $settings['sm_items']; ?>" data-auto="<?php echo $settings['auto']; ?>"
        data-pager="<?php echo $settings['pager']; ?>" data-controls="<?php echo $settings['controls']; ?>"
        data-loop="<?php echo $settings['loop']; ?>">
        <?php 


      $args = array( 'post_type'=>'track','posts_per_page' => $settings['posts_per_page'] ); 

        if(!empty($settings['track_categories'])){
            $args['tax_query'] = 
            array(
                array(
                    'taxonomy' => 'track-categories',   // taxonomy name
                    'field' => 'term_id',           // term_id, slug or name
                    'terms' => $settings['track_categories'],                  // term id, term slug or term name
                )
                );
        }
            


      if(!empty($settings['albums'])){
       
 $args['meta_query']	= array(
    array(
        'key' => 'track_album',
        'value' => $settings['albums'],
        'compare' => 'LIKE'
        )
    );
      }

        $q = new \WP_Query($args);  

        if ($q->have_posts()) : while ($q->have_posts()) : $q->the_post(); 
         $artists = rekord_get_field('track_artists');
         $album = rekord_get_field('track_album');
        ?>

        <?php if($settings['style'] == 'mini') :?>
            <div>
                <figure class="mb-2">
                    <div class="img-wrapper r-10">
                    <?php
             
                    get_template_part(  $slug, 'featured-image' );  ?>
                        <div class="img-overlay text-white p-5">
                            <div class="center-center">
                            <?php 
                                        set_query_var( 'icon_classes', 's-48' );
                                        get_template_part( $slug, 'url' ); 
                                    
                                 ?>
                            </div>
                        </div>
                    </div>
                </figure>
            </div>
        <?php else: ?>
        <div>
            <figure>
                <div class="img-wrapper">
                    <?php
                    get_template_part(  $slug, 'featured-image' );  ?>
                    <div class="img-overlay text-white">
                        <div class="figcaption">
                            <div class="d-flex hover-actions justify-content-between">      
                               
                            </div>
                            <div class="text-center mt-5">
                                <h5 class="text-truncate track-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                <span><?php
                                if(!empty($artists)){
                                    echo $artists[0]->post_title;
                                }
                                 ?></span>

                            </div>
                        </div>
                    </div>
                   <!--  <div class="figure-title text-center p-2">
                <h6 class="text-truncate"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                        <span><?php
                        if(!empty($artists)){
                        echo $artists[0]->post_title;
                        } ?></span>
                    </div> -->

                </div>

            </figure>

        </div>
        <div>
            <h5 class="text-truncate track-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                    <?php the_content(); ?></div>
        <?php endif;  ?>



        <?php  endwhile; endif; wp_reset_postdata();  wp_reset_query();  ?>

        <?php
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