<?php
namespace RekordThemeEssential\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Track Carousel
 *
 *
 * @since 1.0.0
 */
    class Rekord_Tabs extends Widget_Base {
        
        public function get_name() {
            return 'reckord_tabs';
        }
        
        public function get_title() {
            return __( 'Rekord Tabs', 'elementor' );
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

            $this->end_controls_section();
    

           


            $this->start_controls_section(
                'tabs',
                [
                'label' => __( 'Tabs', 'rekord' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
                );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                    'list_title', [
                    'label' => __( 'Tab Title', 'rekord' ),
                    'description' => __( 'Make it empty to display category name', 'rekord' ),
                    
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'List Title' , 'rekord' ),
                    'label_block' => true,
                    ]
            );
      
            $repeater->add_control(
                'list_content', [
                'label' => __( 'Tab Content', 'rekord' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                
                'label_block' => true,
                'default' => __( '' , 'rekord' ),
                ]
                );
            
            $repeater->add_control(
                'list_categories',
                [
                    'label' => __( 'Track Categories', 'rekord' ),
                    'type' => \Elementor\Controls_Manager::SELECT2,
                    'multiple' => true,
                    'separator'=> 'before',
                    'label_block' => true,
                    'options' => rekord_get_terms('track','track-categories'),
                // 'default' => [ 'title', 'description' ],
                ]
            );
            
            $repeater->add_control(
                'list_layout',
                [
                    'label' => __( 'Tracks Layout', 'rekord' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'label_block' => true,
                    'default' => 'list',
                    'options' => [
                        'list'  => __( 'List Style', 'rekord' ),
                        'grid' => __( 'Grid', 'rekord' ),
                    ],
                ]
            );

            $repeater->add_control(
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
            
        }
        
        protected function render() {
            $settings = $this->get_settings_for_display();
            $slug = 'templates/track/track';
            $items = $settings['list'];
            ?>

<div class="card no-b mb-md-3 p-2">
    <div class="card-header no-bg transparent">
        <div class="d-flex justify-content-between">
            <div class="align-self-center">
                <div class="d-flex">
                    <!--<i class="icon-music s-36 mr-3  mt-2"></i>-->
                    <div>
                        <h4><?php echo  $settings['title']; ?></h4>
                        <p><?php echo  $settings['subtitle']; ?></p>
                        <div class="mt-3">
                            <ul class="nav nav-tabs card-header-tabs nav-material responsive-tab mb-1" role="tablist">

                                <?php 
                                $terms =  '';
                                if(!empty($settings['track_categories']))
                                     $terms =  $settings['track_categories']; 
                                
                                    
                                ?>
                                <?php 
                                                    
                                      foreach ($items as $key=>$item ) {
                                          
                    
                                        // elseif(!empty( $terms )){
                                        //     $title= get_term( $terms[$key], 'track-categories' )->name;
                                        // }
                                        ?>
                                <li class="nav-item">
                                    <a class="<?php echo ($key==0) ? 'nav-link show active': 'nav-link'?>"
                                        id="tabx-<?php echo $key ?>" data-toggle="tab" href="#tab-<?php echo $key ?>"
                                        role="tab" aria-selected="true"><?php echo $item['list_title'] ?></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="card-body no-p">
        <div class="tab-content" id="v-pills-tabContent1">
            <?php  foreach ($items  as $key=>$item ) {?>
            <div class="<?php echo ($key==0)  ? 'tab-pane fade show active': 'tab-pane fade'?>"
                id="tab-<?php echo $key ?>" role="tabpanel" aria-labelledby="tab-<?php echo $key ?>">

                <?php 
                                                    if(!empty($item['list_content'])){
                                                        echo '  <div class="pl-lg-3 pr-lg-3"><div class="my-3">'. $item['list_content'].'</div></div>';
                                                    }
                                            ?>
                <div class="playlist">
                    <?php 
                                                $args = array( 'post_type'=>'track','posts_per_page' => $item['posts_per_page'] ); 
                                                if(!empty($item['list_categories'])){
                                                    $args['tax_query'] = 
                                                    array(
                                                        array(
                                                            'taxonomy' => 'track-categories',   // taxonomy name
                                                            'field' => 'term_id',           // term_id, slug or name
                                                            'terms' => $item['list_categories'],                  // term id, term slug or term name
                                                        )
                                                    );
                                                }

                                            $q = new \WP_Query($args);  ?>
                    <?php if($item['list_layout'] == 'list') {?>
                    <ul class="list-group">
                        <?php  if ($q->have_posts()) : while ($q->have_posts()) : $q->the_post();  
                            $options = set_query_var('options', [
                               'show_thumb' => true,
                               'show_artists'=>true,
                               'show_time'=>true,
                               'show_button'=>true,
                               'show_share'=>true,
                               'show_download'=>true,
                               ]
                            );
                         
                           get_template_part($slug, 'list');     
                         endwhile; endif;  wp_reset_query(); ?>
                    </ul>
                    <?php } else {?>

                    <div class="pl-lg-3 pr-lg-3">
                        <div class="card-body has-items-overlay">
                            <div class="row">
                                <?php  if ($q->have_posts()) : while ($q->have_posts()) : $q->the_post();  ?>
                                <div class="col-md-3 mb-3">
                                    <figure class="mb-2">
                                        <div class="img-wrapper r-10">
                                            <?php 
                                                                    // You wish to make $my_var available to the template part at `content-part.php`
                                                   set_query_var( 'icon_classes', 's-48' );
                                                                    set_query_var( 'thumbnailSize', 'large' );
                                                                    get_template_part( $slug , 'featured-image' );  ?>
                                            <div class="img-overlay text-white p-5">
                                                <div class="center-center">
                                                    <?php get_template_part( $slug , 'url' );  ?>
                                                </div>
                                            </div>
                                        </div>
                                    </figure>
                                    <div class="figure-title">
                                        <h6 class="text-truncate"><?php the_title(); ?></h6>
                                        <?php get_template_part( $slug, 'artists');  ?>
                                    </div>
                                </div>
                                <?php  endwhile; endif;  wp_reset_query(); ?>
                            </div>
                        </div>
                    </div>
                    <?php }//end layout if ?>

                </div>
                <!--playlist-->

            </div>
            <!--tab-pane-->
            <?php } ?>
        </div>
        <!--tab-content-->
    </div>
    <!--card-body-->
</div>

<?php
        }
             }
