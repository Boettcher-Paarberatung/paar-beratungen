<?php
//$col_5 = 'hidden-xs hiden-sm col-md-5 col-lg-5 ';
$col_5 = 'hidden-sx col-sm-5 col-md-5 col-lg-5 ';
$col_12 = 'col-xs-12 col-sm-12 col-md-12 col-lg-12 ';
$col_7 = 'col-xs-12 col-sm-7 col-md-7 col-lg-7  ';
//$col_7 = 'col-xs-7 col-sm-7 col-md-7 col-lg-7  ';
$cont = 0;
?>
<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
	<?php  
	while ( $wp_query->have_posts() ) { $wp_query->the_post();?>
		<div class = "row">
			<div class="<?php echo esc_attr(implode(' ', $class_columns)) ?>">
				<article <?php post_class(); ?>>
					<div class="jws-post-item">
							<?php  if($show_thumb) { 
								if(has_post_thumbnail()){
									?> <div class="jws_image"><?php  
									$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
									$image_full = $attachment_image[0];
									if($crop_image){
										$image_resize = matthewruddy_image_resize( $attachment_image[0], $width_image, $height_image, true, false );
										echo '<img style="width:100%;" class="bt-image-cropped" src="'. esc_attr($image_resize['url']) .'" alt="">';
									}else{
										the_post_thumbnail();
									}
									?> </div><?php  
								}
								?>
							<?php } ?>
							
							<div class="jws-content">
								<?php if($show_title) { ?>
									<a href="<?php the_permalink(); ?>"><h2 class="jws-title"><?php the_title();?></h2></a>
								<?php } ?>
								<?php if($show_more_info){?>
									<?php
										$dt_position = get_post_meta( get_the_ID(), 'jws_theme_doctor_position', true ); //true: single value / false: get as array
										if( $dt_position =='founder' ) $dt_position = 'Ceo & Co-founder of Medicare';
										if( $dt_position ) { ?>
											<div class="position"> <h5><?php echo $dt_position; ?> </h5></div>
										<?php } 
								}?>
								<?php if($show_info) { ?>
									<div class="jws-info ">
										<?php echo jws_theme_info_bar_render(); ?>
									</div>
								<?php } ?>
								<?php if($show_excerpt) { ?>
									<div class="jws-excerpt">
										<div class = "custom-excerpt">
											<p><?php echo jws_theme_custom_excerpt(intval($excerpt_lenght), ''); ?> </p>
										</div> 
									</div>
								<?php } 
								$excerpt_more = $excerpt_more ? $excerpt_more : "Read more";
								?>
									<div class ="jws-read-more"> <a href="<?php the_permalink(); ?>"><?php echo $excerpt_more;?></a> </div>
							</div>  
							
					</div>
				</article>
			</div>
		</div>
	<?php }?>
</div>
