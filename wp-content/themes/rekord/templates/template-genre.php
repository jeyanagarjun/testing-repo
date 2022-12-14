<?php
/**
 * Template Name: Tracks Genre
 *
 * @author    xvelopers
 * @package   rekord
 * @version   1.0.0
 */


get_header();?>
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

                <div class="row">
                    <?php 
				
				$args = ['taxonomy' => 'track-categories'];
				$terms = get_categories($args); ?>

                    <?php foreach ($terms as $term) :?>



                    <?php  if ($term->parent == 0) : ?>
                    <div class="col-md-12">

                        <div class="my-5">
                            <?php 
						
						echo '<h3>'. esc_html($term->name) .'</h3>';
						echo '<p>'. esc_html($term->description) .'</p>'; 
						?>
                        </div>

                    </div>

                    <?php else: ?>

                    <div class="col-md-4 mb-3">
                        <div class="card p-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="col-8">
                                    <div class="mr-4 float-left">
                                        <i class="icon-windows s-36"></i>
                                    </div>
                                    <?php 	echo '<h6>'. esc_html($term->name) .'</h6>'; ?>

                                    <a href="<?php echo get_term_link($term, $taxonomy = 'track-categories' ) ?>">
                                        <?php 
						
										$args = array(
											'post_type' => 'track',
											'tax_query'=>  array(
												array(
													'taxonomy' => 'track-categories',   // taxonomy name
													'field' => 'term_id',           // term_id, slug or name
													'terms' => $term->term_id,                  // term id, term slug or term name
												)
												)
										  );
										
										
										  $the_query = new WP_Query( $args );

										  
										
										  ?>
                                        <small>
                                            <?php printf( _nx( '%s Track', '%s Tracks', $the_query->found_posts, 'rekord','rekord' ), $the_query->found_posts ); ?></small>
                                    </a>
                                </div>
                                <a href="<?php echo get_term_link($term, $taxonomy = 'track-categories' ) ?>"
                                    class="ml-auto"><i class="icon-link"></i></a>
                                <div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php endforeach; ?>
                </div>


                <div class="my-3">
                    <?php
                  if (function_exists("rekord_get_pagination")) {rekord_get_pagination();}
                   ?>
                </div>
            </div>
        </div>
    </div>
</main>
<!--@Page Content-->
<?php get_footer(); ?>