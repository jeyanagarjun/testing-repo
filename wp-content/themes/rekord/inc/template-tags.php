<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package rekord
 */

if ( ! function_exists( 'rekord_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable.
 */
function rekord_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = ( is_single() ) ? 'post-navigation' : 'paging-navigation';

	?>
<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo esc_attr($nav_class); ?>">
    <h1 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'rekord' ); ?></h1>

    <?php if ( is_single() ) : // navigation links for single posts ?>

    <?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'rekord' ) . '</span> %title' ); ?>
    <?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'rekord' ) . '</span>' ); ?>

    <?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

    <?php if ( get_next_posts_link() ) : ?>
    <div class="nav-previous">
        <?php next_posts_link( esc_html__( '<span class="meta-nav">&larr;</span> Older posts', 'rekord' ) ); ?></div>
    <?php endif; ?>

    <?php if ( get_previous_posts_link() ) : ?>
    <div class="nav-next">
        <?php previous_posts_link( esc_html__( 'Newer posts <span class="meta-nav">&rarr;</span>', 'rekord' ) ); ?>
    </div>
    <?php endif; ?>

    <?php endif; ?>

</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
<?php
}
endif; // rekord_content_nav

if ( ! function_exists( 'rekord_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */


function rekord_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }?>
<<?php echo esc_html($tag); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>
    id="comment-<?php comment_ID() ?>"><?php 
    if ( 'div' != $args['style'] ) { ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body my-4"><?php
    } ?>
        <div class="d-flex">
            <?php  if ( $args['avatar_size'] != 0 ) :  
             echo  get_avatar( $comment, $args['avatar_size'],'','', array( 'class' => array( 'mr-4', 'mt-1' ) ) );
             endif; ?>
            <div>
                <div>
                    <?php 
           
           printf('<h6 class="mb-1">%s</h6>', get_comment_author_link() ); ?>
                </div><?php 
       if ( $comment->comment_approved == '0' ) { ?>
                <em
                    class="comment-awaiting-moderation mt-2"><?php esc_html_e( 'Your comment is awaiting moderation.','rekord' ); ?></em><br /><?php 
       } ?>

                <?php comment_text(); ?>


                <div class="reply"><?php 
                comment_reply_link( 
                    array_merge( 
                        $args, 
                        array( 
                            'add_below' => $add_below, 
                            'depth'     => $depth, 
                            'max_depth' => $args['max_depth'] 
                        ) 
                    ) 
                ); ?>
                </div>
            </div>


        </div>

        <?php 
    if ( 'div' != $args['style'] ) : ?>
    </div><?php 
    endif;
}



endif; // ends check for rekord_comment()

if ( ! function_exists( 'rekord_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function rekord_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) )
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	printf( esc_html__( '<span class="posted-on">Posted on %1$s</span><span class="byline"> by %2$s</span>', 'rekord' ),
		sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		)
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 */
function rekord_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so rekord_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so rekord_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in rekord_categorized_blog.
 */
function rekord_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'rekord_category_transient_flusher' );
add_action( 'save_post',     'rekord_category_transient_flusher' );

/*
| ----------------------------------------------------------------------------------
| Post / Page Password Form
| ----------------------------------------------------------------------------------
*/
add_filter('the_password_form', 'rekord_password_form');
function rekord_password_form()
{
    global $post;
    $label = 'pwbox-' . (empty($post->ID) ? rand() : $post->ID);
    $o     = '<div class="card"> <div class="card-body">
    <form class="protected-post-form" action="' . get_option('siteurl') . '/wp-login.php?action=postpass" method="post">
    ' . __("This content is password protected. To view it please enter your password below", 'rekord') . '
        <div class="form-row">  
            <div class="form-group col-md-6">
                    <label class="pass-label" for="' . $label . '">' . __("PASSWORD:", 'rekord') . ' </label>
                    <input name="post_password" id="' . $label . '" type="password" class="form-control"/>
            </div>
        </div><input type="submit" name="Submit" class="button btn btn-primary" value="' . esc_attr__("Submit", 'rekord') . '" />
    </form></div></div>';
    return $o;
} 