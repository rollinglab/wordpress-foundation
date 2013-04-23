	<div id="comments">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'lab' ); ?></p>
	</div><!-- #comments -->
	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>

	<?php if ( have_comments() ) : ?>
		<h2 id="comments-title">Follow-Up Messages</h2>
		
		<ol class="commentlist">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use lab_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define lab_comment() and that will be used instead.
				 * See lab_comment() in lab/functions.php for more.
				 */
				wp_list_comments( array(
				     'avatar_size' => 64,
				     'callback'    => 'lab_comment'
				));
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'lab' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'lab' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'lab' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php _e( 'Comments are closed.' , 'lab' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php
     	$commenter = wp_get_current_commenter();
     	$req = get_option( 'require_name_email' );
     	$aria_req = ( $req ? " aria-required='true'" : '' );
     	$args = array(
     	    'fields' => apply_filters( 'comment_form_default_fields', array(
     	         'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
	              'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' . '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',                     
     	         'url' => '' ) ),
     	    'comment_notes_before' => ''
     	);
          comment_form( $args ); ?>

</div><!-- #comments -->
