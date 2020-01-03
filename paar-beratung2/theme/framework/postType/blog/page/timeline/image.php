<?php
/**
 * @package 	WordPress
 * @subpackage 	Psychology Help
 * @version		1.0.0
 * 
 * Blog Page Timeline Image Post Format Template
 * Created by CMSMasters
 * 
 */	


$cmsmasters_post_metadata = explode(',', $cmsmasters_metadata);


$date = (in_array('date', $cmsmasters_post_metadata) || is_home()) ? true : false;
$categories = (get_the_category() && (in_array('categories', $cmsmasters_post_metadata) || is_home())) ? true : false;
$author = (in_array('author', $cmsmasters_post_metadata) || is_home()) ? true : false;
$views = (in_array('views', $cmsmasters_post_metadata) || is_home()) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsmasters_post_metadata) || is_home())) ? true : false;
$likes = (in_array('likes', $cmsmasters_post_metadata) || is_home()) ? true : false;
$more = (in_array('more', $cmsmasters_post_metadata) || is_home()) ? true : false;


$cmsmasters_post_image_link = get_post_meta(get_the_ID(), 'cmsmasters_post_image_link', true);

?>

<!--_________________________ Start Image Article _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_timeline_type'); ?>>
	<div class="cmsmasters_post_info entry-meta">
		<?php $date ? psychology_help_get_post_date('page', 'timeline') : ''; ?>
	</div>
	<div class="cmsmasters_post_cont">
	<?php 
		if (!post_password_required()) {
			if ($cmsmasters_post_image_link != '') {
				psychology_help_thumb(get_the_ID(), 'cmsmasters-masonry-thumb', false, 'img_' . get_the_ID(), true, true, true, true, $cmsmasters_post_image_link);
			} elseif (has_post_thumbnail()) {
				psychology_help_thumb(get_the_ID(), 'cmsmasters-masonry-thumb', false, 'img_' . get_the_ID(), true, true, true, true, false);
			}
		}
		
		
		if ($author || $categories) {
			echo '<div class="cmsmasters_post_cont_info entry-meta' . ((theme_excerpt(20, false) == '') ? ' no_bdb' : '') . '">';
				
				$author ? psychology_help_get_post_author('page') : '';
				
				$categories ? psychology_help_get_post_category(get_the_ID(), 'category', 'page') : '';
				
			echo '</div>';
		}
		
		
		psychology_help_post_heading(get_the_ID(), 'h3');
		
		
		psychology_help_post_exc_cont();
		
		
		if ($more || $likes || $comments || $views) {
			echo '<footer class="cmsmasters_post_footer entry-meta">' . 
				'<div class="cmsmasters_post_footer_info">';
				
				if ($comments || $likes || $views) {
					echo '<div class="cmsmasters_post_meta_info">';
						
						$comments ? psychology_help_get_post_comments('page') : '';
						
						$likes ? psychology_help_get_post_likes('page') : '';
						
						$views ? psychology_help_get_post_views('page') : '';
						
					echo '</div>';
				}
				
				$more ? psychology_help_post_more(get_the_ID()) : '';
				
			echo '</div>' . 
			'</footer>';
		}
	?>
		<div class="cl"></div>
	</div>
</article>
<!--_________________________ Finish Image Article _________________________ -->

