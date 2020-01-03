<?php 
/* Tesminal Template 2
* image on the left
*/

?>
<div id="tb-testimonial-2" class="tb-testimonial-2">
	<div class="tmn_carousel">
		<ul class="owl-carousel">
			<?php while ( $wp_query->have_posts() ) { $wp_query->the_post(); ?>
			<li class="tb-item">
				<?php if($show_image && has_post_thumbnail( get_the_ID() ) ):?>
					<div class="tb-image">
						<div class="tb-image-inner">
						 <?php the_post_thumbnail('thumbnail'); ?>
						</div>
					</div>
				<?php
				endif;
				if($show_excerpt) { ?>
					<div class="tb-excerpt">
						<?php echo jws_theme_custom_excerpt( intval( $excerpt_length ), $excerpt_more); 
						if($show_patient)
							$patient = '';
							$patient = esc_attr( get_post_meta(get_the_ID(), 'jws_theme_testimonial_patient', true) ); 
							echo '<p class="tb-patient">'. $patient.' - '.wp_kses_post('<span>Patient</span>','medicare').'</p>';
						?>
					</div>
				<?php } ?>
			</li>
			<?php } wp_reset_postdata(); ?>
		</ul>
	</div>
</div>