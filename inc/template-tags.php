<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package lab
 */

if ( ! function_exists( 'lab_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function lab_content_nav( $nav_id ) {
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

	$nav_class = ( is_single() ) ? 'navigation-post' : 'navigation-paging';

	?>
	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?>">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'lab' ); ?></h1>

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link( '<div class="previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'lab' ) . '</span> %title' ); ?>
		<?php next_post_link( '<div class="next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'lab' ) . '</span>' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'lab' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'lab' ) ); ?></div>
		<?php endif; ?>

	<?php endif; ?>

	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
}
endif; // lab_content_nav

if ( ! function_exists( 'lab_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function lab_comment( $comment ) { ?>

	<li <?php comment_class( 'row' ); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment clearfix">
     		<div class="columns small-4">
     		<?php 
				
     			$avatar_size = 68;
          		if ( '0' != $comment->comment_parent )
          			$avatar_size = 39;
											
          		echo get_avatar( $comment, $avatar_size ); ?>		
          		
          		<footer class="comment-meta">
          		     <div class="comment-author vcard">
          		     	<?php
          		
          		     		/* translators: 1: comment author, 2: date and time */
          		     		printf( __( '%1$s %2$s', 'lab' ),
          		     			sprintf( '<span class="fn">%s</span>', get_comment_author() ),
          		     			sprintf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
          		     				esc_url( get_comment_link( $comment->comment_ID ) ),
          		     				get_comment_time( 'c' ),
          		     				/* translators: 1: date, 2: time */
          		     				sprintf( __( '%1$s at %2$s', 'lab' ), get_comment_date(), get_comment_time() )
          		     			)
          		     		);
          		     	?>
          		
          		     	<?php edit_comment_link( __( 'Edit', 'lab' ), '<span class="edit-link">', '</span>' ); ?>
          		     </div><!-- .comment-author .vcard -->          		
          		</footer>          		
     		</div>

			<div class="comment-content columns small-7 small-offset-1">
     			<?php comment_text(); ?>
               </div>
		</article><!-- #comment-## --><?php
}

endif;

if ( ! function_exists( 'lab_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function lab_posted_on() {
	printf( __( 'Posted on <a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="byline"> by <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'lab' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'lab' ), get_the_author() ) ),
		get_the_author()
	);
}
endif;
/**
 * Returns true if a blog has more than 1 category
 */
function lab_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so lab_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so lab_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in lab_categorized_blog
 */
function lab_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'lab_category_transient_flusher' );
add_action( 'save_post', 'lab_category_transient_flusher' );