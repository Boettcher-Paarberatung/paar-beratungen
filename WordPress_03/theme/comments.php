<?php
/**
 * @package 	WordPress
 * @subpackage 	Psychology Help
 * @version		1.1.2
 * 
 * Comments Template
 * Created by CMSMasters
 * 
 */


if (post_password_required()) { 
	echo '<p class="nocomments">' . esc_html__('This post is password protected. Enter the password to view comments.', 'psychology-help') . '</p>';
	
	
    return;
}


if (comments_open()) {
	if (have_comments()) {
		echo '<aside id="comments" class="post_comments">' . "\n" . 
			'<h2 class="post_comments_title">';
		
		
		comments_number(esc_attr__('No Comments', 'psychology-help'), esc_attr__('Comment', 'psychology-help') . ' (1)', esc_attr__('Comments', 'psychology-help') . ' (%)');
		
		
		echo '</h2>' . "\n";
		
		
		if (get_previous_comments_link() || get_next_comments_link()) {
			echo '<aside class="project_navi">';
				
				if (get_previous_comments_link()) {
					echo '<span class="fl">';
						
						previous_comments_link('&larr; ' . esc_attr__('Older Comments', 'psychology-help'));
						
					echo '</span>';
				}
				
				
				if (get_next_comments_link()) {
					echo '<span class="fr">';
						
						next_comments_link(esc_attr__('Newer Comments', 'psychology-help') . ' &rarr;');
						
					echo '</span>';
				}
				
			echo '</aside>';
		}
		
		
		echo '<ol class="commentlist">' . "\n";
		
		
		wp_list_comments(array( 
			'type' => 'comment', 
			'callback' => 'mytheme_comment' 
		));
		
		
		echo '</ol>' . "\n";
		
		
		if (get_previous_comments_link() || get_next_comments_link()) {
			echo '<aside class="project_navi">';
				
				if (get_previous_comments_link()) {
					echo '<span class="fl">';
						
						previous_comments_link('&larr; ' . esc_attr__('Older Comments', 'psychology-help'));
						
					echo '</span>';
				}
				
				
				if (get_next_comments_link()) {
					echo '<span class="fr">';
						
						next_comments_link(esc_attr__('Newer Comments', 'psychology-help') . ' &rarr;');
						
					echo '</span>';
				}
				
			echo '</aside>';
		}
		
		
		echo '</aside>';
	}
	
	
	$form_fields =  array( 
		'author' => '<p class="comment-form-author">' . "\n" . 
			'<input type="text" id="author" name="author" value="' . esc_attr($commenter['comment_author']) . '" size="35"' . ((isset($aria_req)) ? $aria_req : '') . ' placeholder="' . esc_attr__('Your name', 'psychology-help') . (($req) ? ' *' : '') . '" />' . "\n" . 
		'</p>' . "\n", 
		'email' => '<p class="comment-form-email">' . "\n" . 
			'<input type="text" id="email" name="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="35"' . ((isset($aria_req)) ? $aria_req : '') . ' placeholder="' . esc_attr__('Your email', 'psychology-help') . (($req) ? ' *' : '') . '" />' . "\n" . 
		'</p>' . "\n"
	);
	
	
	if (get_option('show_comments_cookies_opt_in') == '1') {
		$form_fields['cookies'] = '<p class="comment-form-cookies-consent">' . "\n" . 
			'<input type="checkbox" id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" value="yes"' . (empty($commenter['comment_author_email']) ? '' : ' checked="checked"') . ' />' . "\n" . 
			'<label for="wp-comment-cookies-consent">' . esc_html__('Save my name, email, and website in this browser for the next time I comment.', 'psychology-help') . '</label>' . "\n" . 
		'</p>' . "\n";
	}
	
	
	comment_form(array( 
		'fields' => 			apply_filters('comment_form_default_fields', $form_fields), 
		'comment_field' => 		'<p class="comment-form-comment">' . 
									'<textarea name="comment" id="comment" cols="67" rows="2" placeholder="' . esc_attr__('Message', 'psychology-help') . '"></textarea>' . 
								'</p>', 
		'must_log_in' => 		'<p class="must-log-in">' . 
									esc_html__('You must be', 'psychology-help') . 
									' <a href="' . esc_url(wp_login_url(apply_filters('the_permalink', get_permalink()))) . '">' 
										. esc_html__('logged in', 'psychology-help') . 
									'</a> ' 
									. esc_html__('to post a comment', 'psychology-help') . 
								'.</p>' . "\n", 
		'logged_in_as' => 		'<p class="logged-in-as">' . 
									esc_html__('Logged in as', 'psychology-help') . 
									' <a href="' . esc_url(admin_url('profile.php')) . '">' . 
										$user_identity . 
									'</a>. ' . 
									'<a class="all" href="' . esc_url(wp_logout_url(apply_filters('the_permalink', get_permalink()))) . '" title="' . esc_attr__('Log out of this account', 'psychology-help') . '">' . 
										esc_html__('Log out?', 'psychology-help') . 
									'</a>' . 
								'</p>' . "\n", 
		'comment_notes_before' => 	'<p class="comment-notes">' . 
										esc_html__('Your email address will not be published.', 'psychology-help') . 
									'</p>' . "\n", 
		'comment_notes_after' => 	'', 
		'id_form' => 				'commentform', 
		'id_submit' => 				'submit', 
		'title_reply' => 			esc_attr__('Leave a Reply', 'psychology-help'), 
		'title_reply_to' => 		esc_attr__('Leave your comment to', 'psychology-help'), 
		'cancel_reply_link' => 		esc_attr__('Cancel Reply', 'psychology-help'), 
		'label_submit' => 			esc_attr__('Add Comment', 'psychology-help') 
	));
}

