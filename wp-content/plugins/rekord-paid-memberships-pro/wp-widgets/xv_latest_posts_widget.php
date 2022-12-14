<?php
/**
 * @author    xvelopers
 * @package   rekord
 * @version   1.0.0
 */


class xv_latest_posts_wgt extends WP_Widget
{
  function __construct()
  {
    $widget_ops = array('classname' => 'xv_latest_posts_wgt' );
    parent::__construct('xv_latest_posts_wgt', __('Latest Posts','rekord'), $widget_ops);
  }
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'content' => '','count'=>'' ) );
      
      if( $instance) {
             $title = esc_attr($instance['title']);
             $count = esc_attr($instance['count']);
          
    } else {
             $title = '';
             $count = '';
            
           
    }
?>
<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'rekord'); ?><input class="widefat"
            id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>"
            type="text" value="<?php echo  esc_attr($title); ?>" /></label></p>
<p>
    <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Number Of Posts:', 'rekord'); ?></label>
    <input id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>"
        type="text" value="<?php echo $count; ?>" />
</p>

<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    
    // Retrieve Fields
    $instance['title']     = strip_tags($new_instance['title']);
    $instance['count']     = strip_tags($new_instance['count']);
    $instance['checkbox']  = strip_tags($new_instance['checkbox']);
    $instance['select']    = strip_tags($new_instance['select']);
    $instance['select_cat']= strip_tags($new_instance['select_cat']);

    
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
  
   
    if(!empty($instance['count'])){
      $count  = apply_filters('count',$instance['count']);
  }
 if( isset($count) && is_numeric($count) ) {
     $number_of_posts = $count;
 }
   else{ 
      $number_of_posts = 3;
  } 
?>
<div class="recent-posts">

    <div class="card-header transparent b-b  pl-3">
        <h5> <?php if (!empty( $instance['title'])){
           $title    =   apply_filters('widget_title', $instance['title']);
          echo $title;} else{ _e('Recent Posts','rekord');} ?></h5>
    </div>

    <div>
        <ul class="playlist list-group list-group-flush">
            <?php


      global $post;
     $catquery = new WP_Query( 'posts_per_page='. --$number_of_posts);
     
    if ( have_posts() ) : while($catquery->have_posts()) : $catquery->the_post(); ?>

            <li class="list-group-item">
                <div class="d-flex align-items-center">
                    <div class="col">
                        <figure class="avatar-lg float-left  mr-3">
                            <?php if ( has_post_thumbnail() ) {the_post_thumbnail( array(75,75), array('class' => 'r3 img-fluid') );}?>
                        </figure>
                        <h6><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h6>
                        <small><?php _e('Date','rekord'); ?>: <?php the_time('F j, Y') ?></small>
                    </div>

                </div>
            </li>


            <?php endwhile; wp_reset_query();?>
        </ul>
    </div>
    <?php else : ?>
    <p><?php _e('Sorry, no posts were found','rekord'); ?>.</p>
    <?php endif;

     wp_reset_query();  ?>
</div> <!-- End Popular Posts -->

<?php
    echo $after_widget;
  }
}

function xv_latest_posts_wgt_initWidget ()
{
    return register_widget('xv_latest_posts_wgt');
}
add_action ('widgets_init', 'xv_latest_posts_wgt_initWidget');