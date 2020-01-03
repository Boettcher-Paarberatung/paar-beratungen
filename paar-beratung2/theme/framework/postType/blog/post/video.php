<?php
/**
 * @package 	WordPress
 * @subpackage 	Psychology Help
 * @version		1.1.2
 * 
 * Blog Post Video Post Format Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = psychology_help_get_global_options();


$cmsmasters_post_title = get_post_meta(get_the_ID(), 'cmsmasters_post_title', true);

$cmsmasters_post_video_type = get_post_meta(get_the_ID(), 'cmsmasters_post_video_type', true);

$cmsmasters_post_video_link = get_post_meta(get_the_ID(), 'cmsmasters_post_video_link', true);

$cmsmasters_post_video_links = get_post_meta(get_the_ID(), 'cmsmasters_post_video_links', true);


list($cmsmasters_layout) = psychology_help_theme_page_layout_scheme();

if ($cmsmasters_layout == 'fullwidth') {
	$cmsmasters_image_thumb_size = 'cmsmasters-full-thumb';
} else {
	$cmsmasters_image_thumb_size = 'post-thumbnail';
}

?>

<!--_________________________ Start Video Article _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="cmsmasters_post_cont">
	<?php
		if (!post_password_required()) {
			if ($cmsmasters_post_video_type == 'selfhosted' && !empty($cmsmasters_post_video_links) && sizeof($cmsmasters_post_video_links) > 0) {
				$video_size = cmsmasters_image_thumbnail_list();
				
				
				$attrs = array( 
					'preload'  => 'none', 
					'height'   => $video_size[$cmsmasters_image_thumb_size]['height'], 
					'width'    => $video_size[$cmsmasters_image_thumb_size]['width'] 
				);
				
				
				if (has_post_thumbnail()) {
					$video_poster = wp_get_attachment_image_src((int) get_post_thumbnail_id(get_the_ID()), $cmsmasters_image_thumb_size);
					
					
					$attrs['poster'] = $video_poster[0];
				}
				
				
				foreach ($cmsmasters_post_video_links as $cmsmasters_post_video_link_url) {
					$attrs[substr(strrchr($cmsmasters_post_video_link_url, '.'), 1)] = $cmsmasters_post_video_link_url;
				}
				
				
				echo '<div class="cmsmasters_video_wrap">' . 
					wp_video_shortcode($attrs) . 
				'</div>';
			} elseif ($cmsmasters_post_video_type == 'embedded' && $cmsmasters_post_video_link != '') {
				global $wp_embed;
				
				
				$video_size = cmsmasters_image_thumbnail_list();
				
				
				echo '<div class="cmsmasters_video_wrap">' . 
					do_shortcode($wp_embed->run_shortcode('[embed width="' . $video_size[$cmsmasters_image_thumb_size]['width'] . '" height="' . $video_size[$cmsmasters_image_thumb_size]['height'] . '"]' . $cmsmasters_post_video_link . '[/embed]')) . 
				'</div>';
			} elseif (has_post_thumbnail()) {
				psychology_help_thumb(get_the_ID(), $cmsmasters_image_thumb_size, true, false, true, false, true, true, false);
			}
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
<!--_________________________ Finish Video Article _________________________ -->

