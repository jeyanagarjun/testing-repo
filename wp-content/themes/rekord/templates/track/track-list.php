<?php $slug = 'templates/track/track';
    $options=  get_query_var('options');
?>
<li
    class="track post <?php echo (isset($options) && !empty($options['list_classes'])) ?$options['list_classes']: 'm-1 list-group-item';?>">
    <div class="d-flex align-items-center">
        <div>
            <?php 
            if($post->post_status == 'publish') : 
            get_template_part( $slug, 'url' ); 
            
            endif; ?>
        </div>
        <div class="d-flex align-items-center col-md-6">
            <?php if(isset($options['show_thumb']) && $options['show_thumb']): ?>
            <?php if(rekord_track_has_thumbnail()): ?>
            <figure class="avatar-md mr-3 ml-3 track-fiqure">
                <?php get_template_part( $slug, 'featured-image' );  ?>
            </figure>
            <?php endif; ?>
            <?php endif; ?>
            <div>
                <a href="<?php the_permalink(); ?>"><h6 class="track-title"><?php the_title(); ?></h6></a>
                <?php 
                if(isset($options['show_artists']) && $options['show_artists']):
                    get_template_part( $slug, 'artists' );
                endif;  
            ?>
             <!-- <?php if( !empty( get_the_content() )):
                  $content = get_the_content();
                  echo mb_strimwidth($content, 0, 40, '.'); 
                   endif; ?> --> 
            </div>
        </div>
        <div class="col-md-6 d-none d-lg-block">
            <div class="d-flex">
              
               <?php  get_template_part( $slug, 'actions' ); ?>

           
           
            </div>
        </div>
        <div class="ml-auto d-xl-none">
              
            
              <a  data-toggle="collapse" href="#collapsex-<?php the_ID(); ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="icon-more" >
              </i>
                    
      </a>
      </div>
    </div>

   
              <div class="collapse pt-4 pb-4" id="collapsex-<?php the_ID(); ?>">
              <?php  get_template_part( $slug, 'actions' ); ?>            
  </div>
    <div class="card card-body">
            <?php  the_content(); ?>
        </div>
      


    <?php if(isset($options['show_description']) && $options['show_description'] &&  !empty( get_the_content() )): ?>
    <div class="collapse" id="collapse-<?php the_ID(); ?>">
<!--         <div class="card card-body">
            <?php  the_content(); ?>
        </div> -->
    </div>
    <?php endif; ?>
</li>
<?php  set_query_var( 'options', null ); ?>