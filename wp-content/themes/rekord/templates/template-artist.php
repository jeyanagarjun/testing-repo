<?php

/**
*Template Name: Artist
 * @author    xvelopers
 * @package   rekord
 * @version   1.4.6
*/
get_header();
$slug = 'templates/artist/artist';
?>
<!--Page Content-->
<main>
    <div class="container relative animatedParent animateOnce">
        <div class="animated fadeInUpShort p-md-5 p-3">
            <div class="relative mb-5">
                <h1 class="mb-2 text-primary"><?php the_title(); ?></h1>
                <?php
					while ( have_posts() ) : the_post();

						get_template_part( 'content', 'page' );

					endwhile; // end of the loop.
                    ?>


                <?php $terms =  rekord_get_terms('artist','artist-categories'); ?>

                <?php foreach($terms  as $key=>$term) : ?>
                <div
                    class="avatar avatar-md avatar-letter-<?php echo esc_html(strtolower($term) , 'rekord'); ?> my-5 primary-color">
                </div>
                <div class="row">
                    <?php
                    
                    $args = array( 'post_type'=>'artist','posts_per_page' => -1,'paged'=>$paged, ); 

                    if(!empty($term)){
                        $args['tax_query'] = 
                        array(
                            array(
                                'taxonomy' => 'artist-categories',   // taxonomy name
                                'field' => 'term_id',           // term_id, slug or name
                                'terms' => $key,                  // term id, term slug or term name
                            )
                            );
                    }
                    query_posts($args);  ?>
                    <?php if (have_posts()) : while (have_posts()) : the_post();?>

                <?php get_template_part($slug, 'loop') ;?>
                    <?php  endwhile; endif;   ?>
                </div>


                <?php endforeach; ?>


            </div>
        </div>
    </div>
</main>
<!--@Page Content-->
<?php get_footer(); ?>