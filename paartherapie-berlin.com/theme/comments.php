<?php
/**
 * The template for displaying Comments.
 */
?>
<div id="comments" class="comments-post-<?php the_ID(); ?>">
	<?php if( have_comments() || comments_open() || pings_open() ) : ?>

	<?php if ( get_comments_number() > 0 ) : ?>
		<h2 class="comments__heading"><?php echo mentalpress_pretty_comments_number(); ?></h2>
	<?php endif; ?>

	<?php if ( have_comments() ) : ?>

		<div class="comments-container">
			<?php wp_list_comments( array( 'callback' => 'mentalpress_comment', 'avatar_size' => '150' ) ); ?>
		</div>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
			<nav id="comment-nav-below" class="text-center  text-uppercase" role="navigation">
				<h3 class="assistive-text"><?php echo __( 'Comment Navigation' , 'mentalpress_wp'); ?></h3>
				<div class="nav-previous  pull-left"><?php previous_comments_link( __( '&larr; Older Comments' , 'mentalpress_wp') ); ?></div>
				<div class="nav-next  pull-right"><?php next_comments_link( __( 'Newer Comments &rarr;' , 'mentalpress_wp') ); ?></div>
			</nav>
		<?php endif; ?>

		<?php
			//If there are no comments and comments are closed, let's leave a note.
			// But we only want the note on posts and pages that had comments in the first place.
			if ( ! comments_open() && get_comments_number() ) :
		?>
			<p class="nocomments"><?php _e( 'Comments for this post are closed.', 'mentalpress_wp'); ?></p>
		<?php
			endif;
		?>

	<?php endif; // have_comments() ?>

	<?php
		//display the title only if the comments are opened
		if ( comments_open() ) :
	?>
		<h2 class="comments__heading"><?php echo __('Write a Comment', 'mentalpress_wp'); ?></h2>
	<?php endif; ?>

	<?php
		$commenter = wp_get_current_commenter();
		$req       = get_option( 'require_name_email' );
		$req_html  = $req ? '<span class="required theme-clr">*</span>' : '';
		$req_aria  = $req ? ' aria-required="true" required' : '';
		$consent   = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

		$fields    = array(
			'author' => sprintf( '<div class="row"><div class="col-xs-12  col-sm-6  form-group"><label for="author">%1$s%2$s</label><input id="author" name="author" type="text" value="%3$s" class="form-control" %4$s /></div></div>',
				__( 'First and Last name', 'mentalpress_wp'),
				$req_html,
				esc_attr( $commenter['comment_author'] ),
				$req_aria
			),
			'email'  => sprintf( '<div class="row"><div class="col-xs-12  col-sm-6  form-group"><label for="email">%1$s%2$s</label><input id="email" name="email" type="email" value="%3$s" class="form-control" %4$s /></div></div>',
				__( 'E-mail Address', 'mentalpress_wp'),
				$req_html,
				esc_attr( $commenter['comment_author_email'] ),
				$req_aria
			),
			'url'    => sprintf( '<div class="row"><div class="col-xs-12  col-sm-6  form-group"><label for="url">%1$s</label><input id="url" name="url" type="url" value="%2$s" class="form-control" /></div></div>',
				__( 'Website', 'mentalpress_wp'),
				esc_attr( $commenter['comment_author_url'] )
			),
			'cookies' => sprintf( '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes" %1$s /> <label for="wp-comment-cookies-consent">%2$s</label></p>',
				$consent,
				esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'mentalpress_wp' )
			),
		);

		$comments_args = array(
			'fields'        => $fields,
			'id_submit'     => 'comments-submit-button',
			'class_submit'  => 'submit  btn  btn-primary  text-uppercase',
			'comment_field' => sprintf( '<div class="row"><div class="col-xs-12  form-group"><label for="comment">%1$s%2$s</label><textarea id="comment" name="comment" class="form-control" rows="8" aria-required="true"></textarea></div></div>',
					_x( 'Your comment', 'noun', 'mentalpress_wp'),
					$req_html
				),
			'title_reply'   => '',
		);

		// https://developer.wordpress.org/reference/functions/comment_form/
		comment_form( $comments_args );

	else : ?>
	<div class="comments__closed">
		<?php _e( 'Comments for this post are closed.' , 'mentalpress_wp'); ?>
	</div>
<?php
	endif;
?>

</div>
