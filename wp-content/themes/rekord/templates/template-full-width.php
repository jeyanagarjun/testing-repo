<?php
/**
 * Template Name: Full Width
 *
 * @author    xvelopers
 * @package   rekord
 * @version   1.0.0
 */


get_header();
get_template_part('templates/global/wrapper', 'start');
	
	while ( have_posts() ) : the_post();

	?>
		<h1 class="text-primary mb-3"><?php the_title(); ?></h1>
		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->

		<?php
					wp_link_pages( array(
						'before'      => '<div class="page-links mb-5"><div>',
						'after'       => '</div></div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
					) );
				?>
		<?php
		
	endwhile; // end of the loop.

	if (get_post_meta($post->ID, 'show_comment_form', true) != 'no'):
		if ( comments_open() || '0' != get_comments_number() )
			comments_template();
	endif;

	get_template_part('templates/global/wrapper', 'end');
	
get_footer(); ?>