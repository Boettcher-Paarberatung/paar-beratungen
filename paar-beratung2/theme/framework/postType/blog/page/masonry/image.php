<?php
/**
 * @package 	WordPress
 * @subpackage 	Psychology Help
 * @version		1.0.0
 * 
 * Blog Page Masonry Image Post Format Template
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


$post_sort_categs = get_the_terms(0, 'category');

if ($post_sort_categs != '') {
	$post_categs = '';
	
	foreach ($post_sort_categs as $post_sort_categ) {
		$post_categs .= ' ' . $post_sort_categ->slug;
	}
	
	$post_categs = ltrim($post_categs, ' ');
}

?>

<!--_________________________ Start Image Article _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_masonry_type'); ?> data-category="<?php echo esc_attr($post_categs); ?>">
	<div class="cmsmasters_post_cont">
		<?php 
		if (!post_password_required()) {
			if ($cmsmasters_post_image_link != '') {
				psychology_help_thumb(get_the_ID(), 'cmsmasters-masonry-thumb', false, 'img_' . get_the_ID(), true, true, true, true, $cmsmasters_post_image_link);
			} elseif (has_post_thumbnail()) {
				psychology_help_thumb(get_the_ID(), 'cmsmasters-masonry-thumb', false, 'img_' . get_the_ID(), true, true, true, true, false);
			}
		}
		
		
		if ($date || $author) {
			echo '<div class="cmsmasters_post_author_info entry-meta">';
			
				$date ? psychology_help_get_post_date('page', 'default') : '';
				
				$author ? psychology_help_get_post_author('page') : '';
				
			echo'</div>';
		}
		
		
		psychology_help_post_heading(get_the_ID(), 'h4');
		
		
		if ($categories) {
			echo '<div class="cmsmasters_post_cont_info entry-meta' . ((!$more && theme_excerpt(20, false) == '') ? ' no_bdb' : '') . '">';
				
				$categories ? psychology_help_get_post_category(get_the_ID(), 'category', 'page') : '';
				
			echo '</div>';
		}
		
		
		psychology_help_post_exc_cont();
		
		
		if ($more || $likes || $comments || $views) {
			echo '<footer class="cmsmasters_post_footer entry-meta">';
				
				$more ? psychology_help_post_more(get_the_ID()) : '';
				
				echo '<div class="cmsmasters_post_footer_info' . ((!$more) ? ' no_mt' : '') . '">';
					
					
					if ($comments || $likes || $views) {
						echo '<div class="cmsmasters_post_meta_info">';
							
							$comments ? psychology_help_get_post_comments('page') : '';
							
							$likes ? psychology_help_get_post_likes('page') : '';
							
							$views ? psychology_help_get_post_views('page') : '';
							
						echo '</div>';
					}
					
					
				echo '</div>' . 
			'</footer>';
		}
	?>
	</div>
</article>
<!--_________________________ Finish Image Article _________________________ -->

