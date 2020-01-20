<div id="tb-testimonial-image" class="flexslider" >
	<ul class="slides">
		<?php 
		while ( $wp_query->have_posts() ) { $wp_query->the_post();
			$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
			$image_resize = matthewruddy_image_resize( $attachment_image[0], 100, 100, true, false );
		?>
			<li class="tb-item" data-thumb ="<?php echo esc_attr($image_resize['url']); ?>">
				<div class="item_inner">
					<?php if($show_patient) { ?>
						<div class="tb-image-name text-center">
							<?php 
							$patient = esc_attr( get_post_meta(get_the_ID(), 'jws_theme_testimonial_patient', true) );
							echo '<p class="tb-patient">'. $patient.' - '. wp_kses_post('<span>Patient</span>','medicare').'</p>';
							?>
						</div>
					<?php }
					if($show_excerpt) {  ?>
						<div class="tb-excerpt text-center"><?php echo jws_theme_custom_excerpt( intval( $excerpt_length ), $excerpt_more); ?></div>
					<?php }?>
					<div class="clearfix"></div>
				</div>
			</li>
		<?php  } ?>
	</ul>
</div>
