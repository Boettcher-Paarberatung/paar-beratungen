<?php
if ( post_password_required() ) {
	return;
}
$jws_theme_show_post_comment = (int) isset($jws_theme_options['jws_theme_post_show_post_comment']) ?  $jws_theme_options['jws_theme_post_show_post_comment']: 1;
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
	
		<fieldset class="comments-title font-medicare-3">
			<legend><?php comments_number( wp_kses( __('Comment','medicare'),array('label')), wp_kses( __('<label>1</label> Comment ','medicare'),array('label')), wp_kses( __('<label>%</label> Comments','medicare'),array('label'))); ?></legend>
		</fieldset>
	<?php  endif;?>
	<?php  if($jws_theme_show_post_comment){?>	<a href="#respond" class="leavereplybutton">Leave your comment</a> <?php  } ?>
	<?php if ( have_comments() ) : ?>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation col-xs-12 col-sm-12 col-md-12 col-lg-12" role="navigation">
			<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'medicare' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'medicare' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'medicare' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size' => 60,
					'callback' => 'jws_theme_custom_comment',
					'reply_text' => '<i class="fa fa-mail-reply"></i>',
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'medicare' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'medicare' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'medicare' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'medicare' ); ?></p>
	<?php endif; ?>

	<?php
		$commenter = wp_get_current_commenter();
		
		$fields =  array(
			'author' =>
				'<p class="comment-form-author"><label>' . esc_html__("Name", 'medicare') . ' <span>*</span></label><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" /></p>',

			'email' =>
				'<p class="comment-form-email"><label>' . esc_html__("Email", 'medicare') . ' <span>*</span></label><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" /></p>',

			'url' => '<p class="comment-form-url"><label>' . esc_html__("Website", 'medicare') . '</label><input id="url" name="url" type="text" value="' . esc_attr(  $commenter['comment_author_url'] ) .
				'" size="30" aria-required="true" /></p>',
		);
		
		$args = array(
			'id_form'           => 'commentform',
			'id_submit'         => 'submit',
			'class_submit'      => 'submit',
			'name_submit'       => 'submit',
			'title_reply'       => wp_kses( __( '<span>Leave your comment</span>', 'medicare' ),array('span')),
			'title_reply_to'    => esc_html__( 'Leave a comment %s', 'medicare' ),
			'cancel_reply_link' => esc_html__( '', 'medicare' ),
			'label_submit'      => esc_html__( 'Send Message', 'medicare' ),
			'format'            => 'xhtml',

			'comment_field' =>  '<p class="comment-form-comment"><label>' . esc_html__("Content", 'medicare') . ' <span>*</span></label><textarea id="comment" name="comment" cols="60" rows="6" aria-required="true">' . '</textarea></p>',

			'must_log_in' => '<p class="must-log-in">' .
			  sprintf(
				wp_kses( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'medicare' ),array('a')),
				wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
			  ) . '</p>',

			'logged_in_as' => '<p class="logged-in-as">' .
			  sprintf(
			  wp_kses(__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'medicare' ),array('a')),
				admin_url( 'profile.php' ),
				$user_identity,
				wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
			  ) . '</p>',

			'comment_notes_before' => esc_html__( '', 'medicare' ),

			'comment_notes_after' => esc_html__( '', 'medicare' ),

			'fields' => apply_filters( 'comment_form_default_fields', $fields ),
		  );
		if ( !have_comments() ) $args['title_reply'] = '';

		comment_form($args);
	?>

</div><!-- #comments -->
