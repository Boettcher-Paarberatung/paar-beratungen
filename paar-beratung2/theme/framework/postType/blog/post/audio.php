<?php
/**
 * @package 	WordPress
 * @subpackage 	Psychology Help
 * @version		1.1.2
 * 
 * Blog Post Audio Post Format Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = psychology_help_get_global_options();


$cmsmasters_post_title = get_post_meta(get_the_ID(), 'cmsmasters_post_title', true);

$cmsmasters_post_audio_links = get_post_meta(get_the_ID(), 'cmsmasters_post_audio_links', true);

?>

<!--_________________________ Start Audio Article _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="cmsmasters_post_cont">
	<?php 
		
		if (!post_password_required() && !empty($cmsmasters_post_audio_links) && sizeof($cmsmasters_post_audio_links) > 0) {
			$attrs = array(
				'preload' => 'none'
			);
			
			
			foreach ($cmsmasters_post_audio_links as $cmsmasters_post_audio_link_url) {
				$attrs[substr(strrchr($cmsmasters_post_audio_link_url, '.'), 1)] = $cmsmasters_post_audio_link_url;
			}
			
			
			echo '<div class="cmsmasters_audio">' . 
				wp_audio_shortcode($attrs) . 
			'</div>';
		}
		
		
		if ( 
			$cmsmasters_option['psychology-help' . '_blog_post_date'] || 
			$cmsmasters_option['psychology-help' . '_blog_post_author'] || 
			$cmsmasters_option['psychology-help' . '_blog_post_cat'] || 
			$cmsmasters_option['psychology-help' . '_blog_post_like'] || 
			$cmsmasters_option['psychology-help' . '_blog_post_comment'] || 
			$cmsmasters_option['psychology-help' . '_blog_post_view']
		) {
			echo '<div class="cmsmasters_post_cont_info entry-meta' . ((get_the_content() == '') ? ' no_bdb' : '') . '">';
				
				psychology_help_get_post_date('post');
				
				psychology_help_get_post_author('post');
				
				if ( 
					$cmsmasters_option['psychology-help' . '_blog_post_like'] || 
					$cmsmasters_option['psychology-help' . '_blog_post_comment'] || 
					$cmsmasters_option['psychology-help' . '_blog_post_view']
				) {
					echo '<div class="cmsmasters_post_meta_info">';
						
						psychology_help_get_post_comments('post');
						
						psychology_help_get_post_likes('post');
						
						psychology_help_get_post_views('post');
						
					echo '</div>';
				}
				
				psychology_help_get_post_category(get_the_ID(), 'category', 'post');
				
				
			echo '</div>';
		}
		
		if ($cmsmasters_post_title == 'true') {
			psychology_help_post_title_nolink(get_the_ID(), 'h2');
		}
		
		
		if (get_the_content() != '') {
			echo '<div class="cmsmasters_post_content entry-content">';
				
				the_content();
				
				
				wp_link_pages(array( 
					'before' => '<div class="subpage_nav" role="navigation">' . '<strong>' . esc_html__('Pages', 'psychology-help') . ':</strong>', 
					'after' => '</div>', 
					'link_before' => '<span>', 
					'link_after' => '</span>' 
				));
				
			echo '<div class="cl"></div>' . 
			'</div>';
		}
		
		if ($cmsmasters_option['psychology-help' . '_blog_post_tag']) {
			echo '<div class="cmsmasters_post_tags">';
				
				psychology_help_get_post_tags();
				
			echo '</div>';
		}
	?>
	</div>
</article>
<!--_________________________ Finish Audio Article _________________________ -->

