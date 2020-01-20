<?php
global $jws_theme_options;
$image_default ='';// isset($jws_options['jws_theme_image_default']) ? $jws_options['jws_theme_image_default'] : '';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php 
		//$jws_theme_options['jws_theme_blog_post_excerpt_more'] = '';
		if (has_post_thumbnail() || $image_default) { ?>
        <div class="tb-blog-image">
            <?php
			$image_full = '';
			if(has_post_thumbnail()){
				$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
				$image_full = $attachment_image[0];
				if($crop_image){
					$image_resize = matthewruddy_image_resize( $attachment_image[0], $width_image, $height_image, true, false );
					echo '<img style="width:100%;" class="bt-image-cropped" src="'. esc_attr($image_resize['url']) .'" alt="">';
				}else{
					the_post_thumbnail();
				}
			}else{
				if($image_default['url']){
					$image_full = $image_default['url'];
					if($jws_blog_crop_image){
						$image_resize = matthewruddy_image_resize( $image_default['url'], $width_image, $height_image, true, false );
						echo '<img style="width:100%;" class="bt-image-cropped" src="'. esc_attr($image_resize['url']) .'" alt="">';
					}else{
						echo '<img alt="Image-Default" class="attachment-thumbnail wp-post-image" src="'. esc_attr($image_default['url']) .'">';
					}
				}
			}
			?>
			<a href="<?php the_permalink();  ?>"><i class="fa fa-plus" aria-hidden="true"></i> </a>
        </div>
    <?php } ?>
	<div class="tb-content-block">
		<?php if($show_title) echo jws_theme_title_render(); ?>
		<?php if($show_desc) echo '<div class="blog-desc">'.jws_theme_content_render($excerpt_length,$excerpt_more).'</div>'; ?>
		<?php if($show_info) echo jws_theme_info_bar_render(); ?>
	</div>
</article>