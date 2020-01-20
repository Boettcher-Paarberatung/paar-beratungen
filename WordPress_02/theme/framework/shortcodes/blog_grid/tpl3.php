<article <?php post_class(); ?>>
	<div class="tb-post-item">
		<?php if($show_thumb) { ?>
			<a href="<?php the_permalink(); ?>">
				<div class="tb-thumb tb-image">
				<?php  
					$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
					$image_full = $attachment_image[0];
					if($crop_image){
						$image_resize = matthewruddy_image_resize( $image_full, $width_image, $height_image, true, false );
						echo '<img style="width:100%;" class="bt-image-cropped" src="'. esc_attr($image_resize['url']) .'" alt="">';
					}else{
						the_post_thumbnail( array(170,170), array('class'=>'img-responsive') );
					}
					/*if($crop_image){$width =  $width_image; $height = $height_image;}
						else{$width =  170; $height = 170;}
						the_post_thumbnail( array($width,$height), array('class'=>'img-responsive') ); */?>
				</div>
			</a>
		<?php } ?>
		<div class="tb-content">
			<?php if($show_info) { ?>
				<div class="tb-info">
					<?php echo jws_theme_info_bar_render(); ?>
				</div>
			<?php } ?>
			<?php if($show_title) { ?>
				<a href="<?php the_permalink(); ?>"><h4 class="tb-title"><?php the_title(); ?></h4></a>
			<?php } 
			/**/?>

			<?php if($show_more_info){?>
				<?php
					$dt_position = get_post_meta( get_the_ID(), 'jws_theme_doctor_position', true ); //true: single value / false: get as array
					if( $dt_position ) { ?>
						<div class="position"> <?php echo esc_attr($dt_position); ?> </div>
					<?php } 
				?>
				<?php
					$dt_social = get_post_meta(get_the_ID(), 'jws_theme_doctor_social', true );
					if( $dt_social ) { ?>
						<div class="social-info"> <?php echo $dt_social; ?>
						</div>
					<?php } 
				?>
			<?php } 
			/*remove excerpt*/?>
			<?php if($readmore_text) { ?>
				<a class="tb-readmore <?php if( $readmore_block ) echo ' block';?>" href="<?php the_permalink(); ?>"><?php echo esc_attr( $readmore_text ); ?></a>
			<?php } ?>
		</div>
	</div>
</article>