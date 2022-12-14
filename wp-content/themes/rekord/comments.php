<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rekord
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<?php
$fields =  array(
	'title_reply'=> esc_html__('Reply', 'rekord'),
	'comment_notes_before' => '',
	'comment_notes_after' => '',
	'label_submit' => esc_html__( 'Post Comment', 'rekord'),
	'fields' => apply_filters( 'comment_form_default_fields', array (
		'author' => '
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
				<div class="form-line">
					<input class="form-control" type="text" placeholder="'. esc_attr__( 'Name', 'rekord').'" name="author" id="author" value="' . esc_attr( $commenter['comment_author'] ).
				'" size="60" required />
					</div>
				</div>
		    </div>
		 ',

		'email' =>'
			 <div class="col-md-6">
				<div class="form-group">
					<div class="form-line">
						<input class="form-control" type="email" placeholder="'. esc_attr__( 'Email', 'rekord').'"  name="email" id="email" value="' . esc_attr(  $commenter['comment_author_email'] ).
					'" size="30"  required />
					</div>
				</div>
	    	</div>
	    ',

		'url' =>'
			  <div class="col-md-12">
			  <div class="form-group">
                <div class="form-line">
						<input class="form-control" type="text" placeholder="'. esc_attr__( 'Website', 'rekord').'" name="url" id="url" value="' . esc_attr( $commenter['comment_author_url'] ).
				'" size="30" />
						</div>
				</div>
		    </div>
		 </div>	
	    ', )),

	'comment_field' =>'
	    	<div class="row">
				 <div class="col-md-12">
				 	<div class="form-group">
                   	  <div class="form-line">
						<textarea id="comment" placeholder="'. esc_attr__( 'Write Something...', 'rekord').'" class="form-control r-0" name="comment" cols="45" rows="5" required></textarea>
						</div>
					</div>
				</div>
		    </div>'


);
?>
<div id="comments" class="comments-area">

    <?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
    <h3 class="comments-title my-5">
        <span class="icon-list-1 s-24 text-primary mr-3"></span>
        <?php
				   printf( _nx( '1 Comment', '%1$s Comments', get_comments_number(), 'comments title','rekord' ),
				   number_format_i18n( get_comments_number() ));

				 
					?>

    </h3><!-- .comments-title -->

    <?php the_comments_navigation(); ?>

    <ol class="comment-list">
        <?php
			wp_list_comments( array(
                'callback' => 'rekord_comment' ,
			    'style'      => 'ol',
				'short_ping' => true,
			) );
			?>
    </ol><!-- .comment-list -->

    <?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>

    <p class="no-comments card p-3"><?php esc_html_e( 'Comments are closed.', 'rekord' ); ?></p>

    <?php
		endif;

    endif; // Check for have_comments().
    ?>
    <div class="post-comments my-5 form-material">
        <?php  comment_form($fields); ?>
    </div>


</div><!-- #comments -->