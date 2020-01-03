<?php
global $tb_options;
$image_default = isset($tb_options['tb_blog_image_default']) ? $tb_options['tb_blog_image_default'] : '';
?>
<li id="post-<?php the_ID(); ?>" class="<?php esc_attr(implode(' ', $class_columns));?> "<?php post_class(); ?>>
    <?php if (has_post_thumbnail() || $image_default) { ?>
        <a class="tb-gallery-image">
            <?php
			$image_full = '';
			if(has_post_thumbnail()){
				$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
				$image_full = $attachment_image[0];
				if($crop_image){
					$image_resize = matthewruddy_image_resize( $attachment_image[0], $width_image, $height_image, true, false );
					/*
					add_image_size( 'gallery-img-size', $width_image, $height_image, true); 
					the_post_thumbnail('gallery-img-size',array('class' => 'tb-image-cropped'));
					remove_image_size( 'gallery-img-size');
*/
					echo '<img style="width:100%;" class="tb-image-cropped" src="'. esc_attr($image_resize['url']) .'" alt="">';
				}else{
					the_post_thumbnail();
				}
			}else{
				if($image_default['url']){
					$image_full = $image_default['url'];
					if($tb_blog_crop_image){
						$image_resize = matthewruddy_image_resize( $image_default['url'], $width_image, $height_image, true, false );
						echo '<img style="width:100%;" class="bt-image-cropped" src="'. esc_attr($image_resize['url']) .'" alt="">';
					}else{
						echo '<img alt="Image-Default" class="attachment-thumbnail wp-post-image" src="'. esc_attr($image_default['url']) .'">';
					}
				}
			}
			?>
			
        </a>
		<div class="colorbox-wrap">
			<div class="colorbox-inner">
				<?php if($show_popup) : ?><a class="cb-popup view-image" title="<?php the_title() ?>" href="<?php echo esc_url($image_full); ?>">
					<i class="fa fa-plus"></i>
				</a>
				<?php echo jws_theme_get_template_popup($image_full); endif ?>
				
			</div>
		</div>
		
    <?php } ?>
	
</li>