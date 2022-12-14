<?php
namespace RekordThemeEssential\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Rekord Slider
 *
 * Elementor widget for Rekord.
 *
 * @since 1.0.0
 */

    class Rekord_Slider extends Widget_Base {
        

        public function get_name() {
            return 'rekord_slider';
        }
        
        public function get_title() {
            return __( 'Rekord Slider', 'elementor' );
        }
        
        protected function _register_controls() {
            
            $this->start_controls_section(
                                          'content_section',
                                          [
                                          'label' => __( 'Content', 'rekord' ),
                                          'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                                          ]
                                          );
            
            $repeater = new \Elementor\Repeater();
            
            $repeater->add_control(
                                   'list_title', [
                                   'label' => __( 'Title', 'rekord' ),
                                   'type' => \Elementor\Controls_Manager::TEXT,
                                   'default' => __( 'List Title' , 'rekord' ),
                                   'label_block' => true,
                                   ]
                                   );

                    
                                   $repeater->add_control(
                                    'list_btn_label', [
                                    'label' => __( 'Button Label', 'rekord' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'default' => __( ' Buy Now At iTunes' , 'rekord' ),
                                    'label_block' => true,
                                    ]
                                    );
                        
            $repeater->add_control(
                'list_website_link',
                [
                    'label' => __( 'Link', 'rekord' ),
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
      
            $repeater->add_control(
                                   'list_image', [
                                   'label' => __( 'Choose Image', 'rekord' ),
                                   'type' => \Elementor\Controls_Manager::MEDIA,
                                   'default' => [
                                   'url' => \Elementor\Utils::get_placeholder_image_src(),
                                   ]
                                   ]
                                   );

            $repeater->add_control(
                                   'list_content', [
                                   'label' => __( 'Content', 'rekord' ),
                                   'type' => \Elementor\Controls_Manager::WYSIWYG,
                                   'default' => __( 'List Content' , 'rekord' ),
                                   'show_label' => false,
                                   ]
                                   );
    
            
            $this->add_control(
                               'list',
                               [
                               'label' => __( 'Repeater List', 'rekord' ),
                               'type' => \Elementor\Controls_Manager::REPEATER,
                               'fields' => $repeater->get_controls(),
                               'default' => [
                               [
                               'list_title' => __( 'Title #1', 'rekord' ),
                               'list_content' => __( 'Item content. Click the edit button to change this text.', 'rekord' ),
                               ],
                               [
                               'list_title' => __( 'Title #2', 'rekord' ),
                               'list_content' => __( 'Item content. Click the edit button to change this text.', 'rekord' ),
                               ],
                               ],
                               'title_field' => '{{{ list_title }}}',
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
			'section_style',
			[
				'label' => __( 'Style', 'rekord' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
       
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'label' => __( 'Title Typography', 'rekord' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} h1',
                'default'=>'#ffffff',
			]
        );
        $this->add_control(
			'heading_color',
			[
				'label' => __( 'Title Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'default'=>'#ffffff',
				'selectors' => [
					'{{WRAPPER}} h1.s-64' => 'color: {{VALUE}} !important',
				],
			]
        );
        
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => __( 'Content Typography', 'rekord' ),
                'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                'default'=>'#ffffff',
				'selector' => '{{WRAPPER}} .slidercontent p',
			]
        );
        $this->add_control(
			'content_color',
			[
				'label' => __( 'Content Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'default'=>'#ffffff',
				'selectors' => [
					'{{WRAPPER}} .slidercontent p' => 'color: {{VALUE}}  !important',
                ],
                
			]
        );
        
        // $this->add_group_control(
		// 	\Elementor\Group_Control_Typography::get_type(),
		// 	[
		// 		'name' => 'button_typography',
		// 		'label' => __( 'Button Typography', 'rekord' ),
		// 		'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
		// 		'selector' => '{{WRAPPER}} .btn',
		// 	]
        // );
        // $this->add_control(
		// 	'button_color',
		// 	[
		// 		'label' => __( 'Button Text Color', 'plugin-domain' ),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'scheme' => [
		// 			'type' => \Elementor\Scheme_Color::get_type(),
		// 			'value' => \Elementor\Scheme_Color::COLOR_1,
		// 		],
		// 		'selectors' => [
		// 			'{{WRAPPER}} .btn' => 'color: {{VALUE}} !importatnt',
		// 		],
		// 	]
        // );
        $this->add_control(
			'button_bg_color',
			[
				'label' => __( 'Button Background Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .btn' => 'background: {{VALUE}}',
                ],
                'default'=> '#ff1744',
			]
		);



		$this->end_controls_section();
        }
        
        protected function render() {
            $settings = $this->get_settings_for_display();
            


      
            ?>

<!--Banner Slider-->
<section>

    <div class="<?php echo $settings['heading_color']== '#ffffff' ?'text-white':'' ?>">

        <div class="lightSlider" data-item="<?php echo !empty($settings['lg_items']) ? $settings['lg_items'] : 1 ?>"
            data-pause="8000" data-pauseonhover="true"
            data-item-lg="<?php echo !empty($settings['md_items']) ? $settings['md_items'] : 1; ?>"
            data-item-md="<?php echo !empty($settings['md_items']) ? $settings['md_items'] : 1 ; ?>"
            data-item-sm="<?php echo !empty($settings['sm_items'])? $settings['sm_items'] : 1 ; ?>"
            data-auto="<?php echo $settings['auto'] ? $settings['auto']: false; ?>"
            data-pager="<?php echo $settings['pager'] ? $settings['pager'] : false; ?>"
            data-controls="<?php echo $settings['controls'] ? $settings['controls'] : false; ?>"
            data-loop=" <?php echo $settings['loop']?  $settings['loop'] : false; ?> ">
            <?php  foreach (  $settings['list'] as $item ) {?>
            <div class=" xv-slide" data-bg-possition="top"
                style="background-image:url('<?php echo $item['list_image']['url'] ?>');">
                <div class="has-bottom-gradient">
                    <div class="p-md-5 p-3">
                        <div class="row">

                            <div class="col-12 col-lg-6 fadeInRight animated go">
                                <div class="xv-slider-content clearfix">
                                    <h1 class="s-64 mt-5 font-weight-lighter"><?php echo $item['list_title']; ?></h1>
                                    <div class="slidercontent">
                                    <?php echo  $item['list_content']; ?>
                                    </div>
                                    <div class="pt-3">

                                        <?php  
                                        
                                              //URL
                                        $target = $item['list_website_link']['is_external'] ? ' target="_blank"' : '';
                                        $nofollow = $item['list_website_link']['nofollow'] ? ' rel="nofollow"' : '';

                                        echo '<a class="btn btn-primary btn-lg" href="' . $item['list_website_link']['url'] . '"' . $target . $nofollow . '>'. $item['list_btn_label'].' 
                                        
                                       </a>'; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom-gradient"></div>
            </div>
            <?php
					if ( \Elementor\Plugin::instance()->editor->is_edit_mode() ) {
                        $this->render_editor_script();
                    }
                
                
			
             } ?>
        </div>
    </div>
    <!--slider Wrap-->
</section>
<!--@Banner Slider-->
<?php
        }
     
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