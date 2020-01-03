<?php
$jws_theme_options = $GLOBALS['jws_theme_options'];
$image_default = isset($jws_theme_options['jws_theme_blog_image_default']) ? $jws_theme_options['jws_theme_blog_image_default'] : '';
if(is_home()){
	$jws_theme_show_post_title = 1;
	$jws_theme_show_post_desc = 1;
	$jws_theme_show_post_info = 1;
}elseif (is_single()) { 
	$jws_theme_blog_crop_image = (int) isset($jws_theme_options['jws_theme_post_crop_image']) ? $jws_theme_options['jws_theme_post_crop_image'] : 0;
	$jws_theme_blog_image_width = (int) isset($jws_theme_options['jws_theme_post_image_width']) ? $jws_theme_options['jws_theme_post_image_width'] : 870;
	$jws_theme_blog_image_height = (int) isset($jws_theme_options['jws_theme_post_image_height']) ? $jws_theme_options['jws_theme_post_image_height'] : 430;
	$jws_theme_show_post_title = (int) isset($jws_theme_options['jws_theme_post_show_post_title']) ? $jws_theme_options['jws_theme_post_show_post_title'] : 1;
	$jws_theme_show_post_info = (int) isset($jws_theme_options['jws_theme_post_show_post_info']) ? $jws_theme_options['jws_theme_post_show_post_info'] : 1;
	$jws_theme_show_post_tag = (int) isset($jws_theme_options['jws_theme_post_show_post_tags']) ? $jws_theme_options['jws_theme_post_show_post_tags'] : 1;
	$jws_theme_post_show_post_author = (int) isset($jws_theme_options['jws_theme_post_show_post_author']) ? $jws_theme_options['jws_theme_post_show_post_author'] : 1;
	$jws_theme_post_show_post_about_author = (int) isset($jws_theme_options['jws_theme_post_show_post_about_author']) ? $jws_theme_options['jws_theme_post_show_post_about_author'] : 1;
	$jws_theme_post_show_social_share = (int) isset($jws_theme_options['jws_theme_post_show_social_share']) ? $jws_theme_options['jws_theme_post_show_social_share'] : 1;
	$jws_theme_show_post_desc = 1;	
	$jws_theme_post_show_post_nav = (int) isset($jws_theme_options['jws_theme_post_show_post_nav']) ?  $jws_theme_options['jws_theme_post_show_post_nav']: 0;
}else{
	$jws_theme_blog_crop_image = isset($jws_theme_options['jws_theme_blog_crop_image']) ? $jws_theme_options['jws_theme_blog_crop_image'] : 0;
	$jws_theme_blog_image_width = (int) isset($jws_theme_options['jws_theme_blog_image_width']) ? $jws_theme_options['jws_theme_blog_image_width'] : 600;
	$jws_theme_blog_image_height = (int) isset($jws_theme_options['jws_theme_blog_image_height']) ? $jws_theme_options['jws_theme_blog_image_height'] : 400;
	$jws_theme_show_post_title = (int) isset($jws_theme_options['jws_theme_blog_show_post_title']) ? $jws_theme_options['jws_theme_blog_show_post_title'] : 1;
	$jws_theme_show_post_info = (int) isset($jws_theme_options['jws_theme_blog_show_post_info']) ? $jws_theme_options['jws_theme_blog_show_post_title'] : 1;
	$jws_theme_show_post_desc = (int) isset($jws_theme_options['jws_theme_blog_show_post_desc']) ? $jws_theme_options['jws_theme_blog_show_post_desc'] : 1;
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
    <?php if (has_post_thumbnail()) { ?>
        <div class="tb-blog-image">
            <!-- Get Thumb -->
			<div class="jws_thumbnail">
				<?php 
				$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
				$image_full = $attachment_image[0];
				if($jws_theme_blog_crop_image){
					$image_resize = matthewruddy_image_resize( $attachment_image[0], $jws_theme_blog_image_width, $jws_theme_blog_image_height, true, false );
					echo '<img style="width:100%;" class="bt-image-cropped" src="'. esc_attr($image_resize['url']) .'" alt="">';
				}
				else the_post_thumbnail();
				
				
		
		
		
				?>
				<?php /* the_post_thumbnail('medicare-blog-large-hard-crop'); */ ?>
			</div>
        </div>
    <?php } ?>
	
	<div class="tb-content-block">
		<?php if($jws_theme_show_post_title) echo jws_theme_title_render(); ?>
		<div class="clearfix">
			<?php if($jws_theme_show_post_info) echo jws_theme_blog_info_bar_render(); ?>
		</div>
		<?php if($jws_theme_show_post_desc) echo jws_theme_content_render(); ?>
		<div style="clear: both"></div>
		<div class="post-tags-social">
			<?php if( $jws_theme_show_post_tag ){ ?><div class="post-tags"><?php /*the_tags( '<i class="fa fa-tags"></i> ', ', ', '' );*/ the_tags( 'Related items: ', ', ', '' ); ?> </div><?php } ?>
			<?php  if(is_single() && $jws_theme_post_show_social_share) echo jws_theme_social_share_post_render(); ?>
		</div>
		<?php
		// Previous/next post navigation.
		if($jws_theme_post_show_post_nav){ 
			echo '<div class="tb-wrap-navi">';
			jws_theme_post_nav();
			echo '</div>';
		}
		?>
		<?php if(is_single() && $jws_theme_post_show_post_about_author) echo jws_theme_blog_author_render(); ?>
		
	</div>
	
</article>