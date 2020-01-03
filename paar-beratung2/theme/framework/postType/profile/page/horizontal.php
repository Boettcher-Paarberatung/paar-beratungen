<?php
/**
 * @package 	WordPress
 * @subpackage 	Psychology Help
 * @version		1.1.2
 * 
 * Profiles Page Horizontal Profile Format Template
 * Created by CMSMasters
 * 
 */


$columns_num = '';
	
if ($profile_columns == 1) {
	$columns_num = 'one_first';
} elseif ($profile_columns == 2) {
	$columns_num = 'one_half';
} elseif ($profile_columns == 3) {
	$columns_num = 'one_third';
} elseif ($profile_columns == 4) {
	$columns_num = 'one_fourth';
} 


$cmsmasters_profile_social = get_post_meta(get_the_ID(), 'cmsmasters_profile_social', true);

$cmsmasters_profile_subtitle = get_post_meta(get_the_ID(), 'cmsmasters_profile_subtitle', true);

?>

<!--_________________________ Start Horizontal Profile _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class($columns_num); ?>>
	<?php 
	if (has_post_thumbnail()) {
		psychology_help_thumb_rollover(get_the_ID(), 'cmsmasters-profile-thumb', false, true, true, false, false, false, false, false, true);
	}
	
	
	echo '<div class="pl_content">' . "\n" . 
		'<h4 class="entry-title">' . "\n" . 
			'<a href="' . esc_url(get_permalink()) . '">' . cmsmasters_title(get_the_ID(), false) . '</a>' . "\n" . 
		'</h4>' . "\n";
	
	
	if ($cmsmasters_profile_subtitle != '') {
		echo '<h6 class="pl_subtitle">' . esc_html($cmsmasters_profile_subtitle) . '</h6>' . "\n";
	}

	
	if (get_the_excerpt()) {
		echo '<div class="entry-content">' . "\n" . 
				get_the_excerpt() . 
		'</div>' . "\n"; 
	}
		echo '</div>';
	
	if ($cmsmasters_profile_social != '') {
		echo '<div class="pl_social">' . "\n" . 
			'<ul class="pl_social_list">' . "\n";
		
		
		foreach ($cmsmasters_profile_social as $social_icons) {
			$social_icon = explode('|', str_replace(' ', '', $social_icons));
			
			
			echo '<li>' . "\n\t" . 
				'<a href="' . esc_url($social_icon[1]) . '" class="' . $social_icon[0] . '" title="' . esc_attr($social_icon[2]) . '"' . (($social_icon[3] == 'true') ? ' target="_blank"' : '') . '></a>' . "\r" . 
			'</li>' . "\n";
		}
		
		
		echo '</ul>' . "\n" . 
		'</div>' . "\n";
	}
	?>
	<div class="cl"></div>
</article>
<!--_________________________ Finish Horizontal Profile _________________________ -->

