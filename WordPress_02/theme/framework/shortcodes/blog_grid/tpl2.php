<?php
global $jws_theme_options;
$image_default = isset($jws_theme_options['jws_theme_image_default']) ? $jws_theme_options['jws_theme_image_default'] : '';
?>

<article <?php post_class(); ?>>
	<div class="tb-post-item">
		<?php if($show_thumb) { ?>
			<div class="tb-thumb tb-image">
				<a href="<?php the_permalink(); ?>" class = "img-blog-link">
					<?php if(has_post_thumbnail()){
						$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
						$image_full = $attachment_image[0];
						if($crop_image){
							$image_resize = matthewruddy_image_resize( $attachment_image[0], $width_image, $height_image, true, false );
							echo '<img style="width:100%;" class="bt-image-cropped" src="'. esc_attr($image_resize['url']) .'" alt="">';
						}else{
							the_post_thumbnail();
						}
					}else{
						echo '<img style="width:100%;" class="bt-image-cropped" src="'. esc_attr($image_default['url']) .'" alt="">';
					}
					?>
					</a>
				<a href="<?php the_permalink(); ?>" class = "icon-hover">
					<i class="fa fa-plus"></i></a>
			</div>
		<?php } ?>
		<div class="tb-content">
			<?php if($show_title) { ?>
				<a href="<?php the_permalink(); ?>"><h4 class="tb-title"><?php the_title(); ?></h4></a>
			<?php } ?>
			<?php if($show_excerpt) { ?>
				<div class="tb-excerpt">
					<?php echo jws_theme_custom_excerpt(intval($excerpt_lenght), $excerpt_more); ?>
				</div>
			<?php } ?>
			<?php if($readmore_text) { ?>
				<a class="tb-readmore <?php if( $readmore_block ) echo ' block';?>" href="<?php the_permalink(); ?>"><?php echo esc_attr( $readmore_text ); ?></a>
			<?php } ?>
			<!-- Date -->
			<?php if($show_info) { ?>
			<div class ="more-info">
				<?php 
				$archive_year  = get_the_time('Y'); 
				$archive_month = get_the_time('m'); 
				$archive_day   = get_the_time('d'); 
				$archive_all = get_the_time('');   
				?>
				<a href="<?php echo esc_url(get_day_link($archive_year, $archive_month, $archive_day)); ?>">
					<span class="blog-date"><?php echo get_the_time('M').' '.get_the_time('d').'. '.get_the_time('Y').'. ';?></span></a>
					<span class="author-name"><?php esc_html_e('by ', 'medicare'); the_author_posts_link(); ?></span>
			</div>
			<?php } ?>
		</div>
	</div>
</article>