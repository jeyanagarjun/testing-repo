<?php

/**
*Template Name: Artist With User Role
 * @author    xvelopers
 * @package   rekord
 * @version   1.4.6
*/
get_header();
$slug = 'templates/artist/artist';

$args = array(
    'role'    => 'rekord_artist',
    'orderby' => 'user_nicename',
    'order'   => 'ASC'
);
$users = get_users( $args );



?>
<!--Page Content-->
<main>
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="animated fadeInUpShort p-md-5 p-3">
            <div class="relative mb-5">
                <h1 class="mb-2 text-primary"><?php the_title(); ?></h1>
                <?php
					while ( have_posts() ) : the_post();

						get_template_part( 'content', 'page' );

					endwhile; // end of the loop.
                    ?>


                <?php $terms =  rekord_get_terms('artist','artist-categories'); ?>

                <?php foreach($users  as $key=>$user) : ?>

                <!-- <div
                    class="avatar avatar-md avatar-letter-<?php echo esc_html(strtolower($term) , 'rekord'); ?> my-5 primary-color">
                </div> -->
                <div class="row">
                    <?php
                    
                    // $args = array( 'post_type'=>'artist','posts_per_page' => -1,'paged'=>$paged, ); 

                    // if(!empty($term)){
                    //     $args['tax_query'] = 
                    //     array(
                    //         array(
                    //             'taxonomy' => 'artist-categories',   // taxonomy name
                    //             'field' => 'term_id',           // term_id, slug or name
                    //             'terms' => $key,                  // term id, term slug or term name
                    //         )
                    //         );
                    // }
                   // query_posts($args);  ?>
                  

               <div class="col-md-4 mb-3">
    <figure class="avatar avatar-md float-left mr-3 mt-1">
        <a href="<?php echo get_author_posts_url( $user->ID); ?>">
            <img src="<?php echo esc_url( get_avatar_url( $user->ID ) );?>" class="img-fluid circle">
         </a>
    </figure>
    <div>
        <h6> <a href="<?php echo get_author_posts_url( $user->ID); ?>">
                <?php echo $user->display_name; ?>
            </a>
        </h6>
        <?php //  get_template_part('templates/artist/artist','relations-count'); ?>
    </div>
</div>

                </div>


                <?php endforeach; ?>


            </div>
        </div>
    </div>
</main>
<!--@Page Content-->
<?php get_footer(); ?>