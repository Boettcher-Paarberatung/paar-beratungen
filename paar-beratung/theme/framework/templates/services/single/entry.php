<?php
$jws_theme_options = $GLOBALS['jws_theme_options'];
$image_default = isset($jws_theme_options['jws_theme_blog_image_default']) ? $jws_theme_options['jws_theme_blog_image_default'] : '';
if(is_home()){
	$jws_theme_show_post_title = 1;
	$jws_theme_show_post_desc = 1;
	$jws_theme_show_post_info = 1;
	
}elseif (is_single()) {
	$jws_theme_blog_crop_image = isset($jws_theme_options['jws_theme_services_crop_image']) ? $jws_theme_options['jws_theme_services_crop_image'] : 0;
	$jws_theme_blog_image_width = (int) isset($jws_theme_options['jws_theme_services_image_width']) ? $jws_theme_options['jws_theme_services_image_width'] : 870;
	$jws_theme_blog_image_height = (int) isset($jws_theme_options['jws_theme_services_image_height']) ? $jws_theme_options['jws_theme_services_image_height'] : 430;
	$jws_theme_show_post_title = (int) isset($jws_theme_options['jws_theme_services_show_post_title']) ? $jws_theme_options['jws_theme_services_show_post_title'] : 1;
	$jws_theme_show_post_info = (int) isset($jws_theme_options['jws_theme_services_show_post_info']) ? $jws_theme_options['jws_theme_services_show_post_info'] : 1;
	$jws_theme_post_show_post_tags = (int) isset($jws_theme_options['jws_theme_services_show_post_tags']) ? $jws_theme_options['jws_theme_services_show_post_tags'] : 1;
	$jws_theme_post_show_post_author = (int) isset($jws_theme_options['jws_theme_services_show_post_author']) ? $jws_theme_options['jws_theme_services_show_post_author'] : 1;
	$jws_theme_post_show_post_about_author = (int) isset($jws_theme_options['jws_theme_services_show_post_about_author']) ? $jws_theme_options['jws_theme_services_show_post_about_author'] : 0;
	$jws_theme_show_post_desc = 1;
}else{
	$jws_theme_blog_crop_image = isset($jws_theme_options['jws_theme_services_crop_image']) ? $jws_theme_options['jws_theme_services_crop_image'] : 0;
	$jws_theme_blog_image_width = (int) isset($jws_theme_options['jws_theme_services_image_width']) ? $jws_theme_options['jws_theme_services_image_width'] : 600;
	$jws_theme_blog_image_height = (int) isset($jws_theme_options['jws_theme_services_image_height']) ? $jws_theme_options['jws_theme_services_image_height'] : 400;
	$jws_theme_show_post_title = (int) isset($jws_theme_options['jws_theme_services_show_post_title']) ? $jws_theme_options['jws_theme_services_show_post_title'] : 1;
	$jws_theme_show_post_info = (int) isset($jws_theme_options['jws_theme_services_show_post_info']) ? $jws_theme_options['jws_theme_services_show_post_info'] : 1;
	$jws_theme_show_post_desc = (int) isset($jws_theme_options['jws_theme_blog_show_post_desc']) ? $jws_theme_options['jws_theme_blog_show_post_desc'] : 1;
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
    <?php if (has_post_thumbnail()) { ?>
        <div class="tb-blog-image">
            <!-- Get Thumb -->
            <?php the_post_thumbnail('medicare-blog-large-hard-crop'); ?>
        </div>
    <?php } ?>
	
	<div class="tb-content-block">
		<div class="clearfix">
			<?php if($jws_theme_show_post_info) echo jws_theme_info_bar_render(); ?>
		</div>
		<?php if($jws_theme_show_post_title) echo jws_theme_title_render(); ?>
		<?php if($jws_theme_show_post_desc) echo jws_theme_content_render(); ?>
		<div style="clear: both"></div>
		<?php if(is_single() && $jws_theme_post_show_post_about_author) echo jws_theme_author_render(); ?>
	</div>
	
</article>