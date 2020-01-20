<article <?php post_class(); ?>>
	<div class="tb-post-item">
		<?php 
			$col_6 = 'col-xs-6 col-sm-6 col-md-6 col-lg-6 ';
			if($show_thumb) { ?>
			<a href="<?php the_permalink(); ?>">
				<div class="tb-thumb tb-image ">
					<?php the_post_thumbnail(array(555,680)); ?>
				</div>
			</a>
		<?php } ?>
		<div class="tb-content">
			<?php if($show_info) { ?>
				<div class="tb-info ">
					<?php echo jws_theme_info_bar_render(); ?>
				</div>
			<?php } ?>
			<?php if($show_excerpt) { ?>
				<div class="tb-excerpt">
					<div class = "custom-excerpt">
						<!--<i class="fa fa-quote-left text-left"></i><br> -->
						<span class ="quote text-left"> &ldquo; </span>
						<p><?php echo jws_theme_custom_excerpt(intval($excerpt_lenght), $excerpt_more); ?> </p>
						<!-- <br><i class="fa fa-quote-right text-right"></i> -->
						<span class ="quote text-right"> &rdquo; </span>
					</div> 
				</div>
			<?php } ?>
			<?php if($show_title) { ?>
				<a href="<?php the_permalink(); ?>"><h4 class="tb-title"><?php the_title();?></h4></a>
			<?php } ?>
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
			<?php } ?>
		</div>
	</div>
</article>