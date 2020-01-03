<?php  
/**Tesminal slider template 1
*Image left
*/
?>
<div id="tb-testimonial-1" class="tb-testimonial-1">
	<ul class="slides">
		<?php while ( $wp_query->have_posts() ) { $wp_query->the_post(); ?>
			<li class="tb-item">
				<div class="images_content">
					<?php if(has_post_thumbnail( get_the_ID() )) { ?>
					   <a href="<?php the_permalink(); ?>">
						<div class="tb-thumbb tb-imageb">
						<?php
						 $image_full = '';
						 if(has_post_thumbnail()){
						  $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
						  $image_full = $attachment_image[0];
						  if($crop_image){
						   $image_resize = matthewruddy_image_resize( $attachment_image[0], $width_image, $height_image, true, false );
						   echo '<img style="width:100%;" class="register_image" src="'. esc_attr($image_resize['url']) .'" alt="register_image">';
						  }else{
						   the_post_thumbnail(array(320,200),array('class' => 'register_image'));
						  }
						 }?>
						</div>
					   </a>
				  <?php } ?>
					<div class="title_content"> 
						<?php if($show_title) { ?>
							<h5 class="tb-name"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5> 
						<?php } ?>
						<?php if($show_excerpt) {?>
							<div class="tb-excerpt thumbnail-left"><?php the_excerpt(); ?></div> 	
						<?php } ?>
					</div>
				</div>
			</li>
		<?php } wp_reset_postdata(); ?>
	</ul>
</div>