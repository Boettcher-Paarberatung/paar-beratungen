<?php
/**
 * @package 	WordPress
 * @subpackage 	Psychology Help
 * @version 	1.1.2
 * 
 * 404 Error Page Template
 * Created by CMSMasters
 * 
 */


get_header();


$cmsmasters_option = psychology_help_get_global_options();

?>

</div>

<!-- _________________________ Start Content _________________________ -->
<div class="content_wrap fullwidth">
	<div class="error_wrapper">
		<div class="error_title_wrap">
			<div class="error_bg">
				<div class="error_inner">
					<h1 class="error_title">404</h1>
				</div>
			</div>
		</div>
		<div class="error_content_wrap">
			<?php 
				echo '<h2 class="error_subtitle">' . esc_html__("We're sorry, but the page you were looking for doesn't exist.", 'psychology-help') . '</h2>';
				
				
				if ($cmsmasters_option['psychology-help' . '_error_search']) { 
					get_search_form(); 
				}
				
				
				if ($cmsmasters_option['psychology-help' . '_error_sitemap_button'] && $cmsmasters_option['psychology-help' . '_error_sitemap_link'] != '') {
					echo '<div class="error_button_wrap"><a href="' . esc_url($cmsmasters_option['psychology-help' . '_error_sitemap_link']) . '" class="button">' . esc_html__('Sitemap', 'psychology-help') . '</a></div>';
				}
			?>
		</div>
	</div>
<!-- _________________________ Finish Content _________________________ -->

<?php 
get_footer();

