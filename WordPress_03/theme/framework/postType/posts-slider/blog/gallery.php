<?php
/**
 * @package 	WordPress
 * @subpackage 	Psychology Help
 * @version		1.0.0
 * 
 * Posts Slider Gallery Post Format Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_metadata = explode(',', $cmsmasters_post_metadata);

$title = in_array('title', $cmsmasters_metadata) ? true : false;
$excerpt = in_array('excerpt', $cmsmasters_metadata) ? true : false;
$date = in_array('date', $cmsmasters_metadata) ? true : false;
$categories = (get_the_category() && (in_array('categories', $cmsmasters_metadata))) ? true : false;
$author = in_array('author', $cmsmasters_metadata) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsmasters_metadata))) ? true : false;
$likes = in_array('likes', $cmsmasters_metadata) ? true : false;
$more = in_array('more', $cmsmasters_metadata) ? true : false;
$views = in_array('views', $cmsmasters_metadata) ? true : false;


$cmsmasters_post_images = explode(',', str_replace(' ', '', str_replace('img_', '', get_post_meta(get_the_ID(), 'cmsmasters_post_images', true))));


?>

<!--_________________________ Start Gallery Article _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="cmsmasters_slider_post_cont">
	<?php 
		if (!post_password_required()) {
			echo '<div class="thumb_wrap">';
				
				if (sizeof($cmsmasters_post_images) >= 1) {
					psychology_help_thumb(get_the_ID(), 'cmsmasters-project-thumb', true, false, true, true, true, true, $cmsmasters_post_images[0]);
				} elseif (has_post_thumbnail()) {
					psychology_help_thumb(get_the_ID(), 'cmsmasters-project-thumb', true, false, true, false, true, true, false);
				}
				
			echo '</div>';
		}
		
		
		echo '<div class="cmsmasters_slider_post_cont_wrap">';
			
			if ($date || $author) {
				echo '<div class="cmsmasters_post_author_info entry-meta">';
					
					$date ? psychology_help_get_slider_post_date('post') : '';
					
					$author ? psychology_help_get_slider_post_author('post') : '';
					
				echo'</div>';
			}
			
			
			$title ? psychology_help_slider_post_heading(get_the_ID(), 'post', 'h4') : '';
			
			
			if ($categories) {
				echo '<div class="cmsmasters_post_cont_info entry-meta">';

					$categories ? psychology_help_get_slider_post_category(get_the_ID(), 'category', 'post') : '';
					
				echo '</div>';
			}
			
			
			$excerpt ? psychology_help_slider_post_exc_cont('post') : '';
			
			
			if ($more || $likes || $comments || $views) {
				echo '<footer class="cmsmasters_slider_post_footer entry-meta">';
				
					$more ? psychology_help_slider_post_more(get_the_ID()) : '';
					
					if ($likes || $comments || $views) {
						echo '<div class="cmsmasters_slider_post_meta_info">';
							
							$comments ? psychology_help_get_slider_post_comments('post') : '';
							
							$likes ? psychology_help_slider_post_like('post') : '';
							
							$views ? psychology_help_get_slider_post_views('post') : '';
							
						echo '</div>';
					}
					
				echo '</footer>';
			}
			
		echo '</div>';
	?>
	</div>
</article>
<!--_________________________ Finish Gallery Article _________________________ -->

