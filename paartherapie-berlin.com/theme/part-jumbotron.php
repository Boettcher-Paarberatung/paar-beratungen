<?php
	$bg_opacity = floatval( get_field( 'slider_caption_background_opacity' ) );
	if ( isset( $bg_opacity ) ) :
?>
<style type="text/css">
	@media (min-width: 992px) {
		.jumbotron-content {
			background-color: rgba(250, 250, 250, <?php echo $bg_opacity; ?> );
			<?php if ( 0 === $bg_opacity ) : ?>
				box-shadow: none;
			<?php endif; ?>
		}
		.jumbotron-content:hover {
			<?php if ( 0 == $bg_opacity ) : ?>
				background-color: rgba(250, 250, 250, 0);
				box-shadow: none;
			<?php else : ?>
				background-color: rgba(250, 250, 250, <?php echo min( ( $bg_opacity + 0.05 ), 1 ); ?> );
			<?php endif; ?>
		}
	}
</style>
<?php endif; ?>

<div class="jumbotron  jumbotron--<?php echo get_field( 'slider_with_captions' ) ? 'with-captions' : 'no-catption'; ?>">
	<div class="carousel  slide  fade" id="headerCarousel" data-ride="carousel" <?php printf( 'data-interval="%s"', get_field( 'auto_cycle' ) ? absint( get_field( 'cycle_interval' ) ) : 'false' ); ?>>
		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<?php
				$i = -1;
				while ( have_rows( 'slides' ) ) :
					the_row();
					$i++;

					$slide_image_srcset = mentalpress_get_slide_sizes( get_sub_field( 'slide_image' ) );
					$slide_link         = get_sub_field( 'slide_link' );

					$slider_src_img = wp_get_attachment_image_src( get_sub_field( 'slide_image' ), 'jumbotron-slider-s' );
			?>

				<div class="item <?php echo 0 === $i ? ' active' : ''; ?>">
				<?php if ( ! empty( $slide_link ) ) :?>
					<a href="<?php echo esc_url( $slide_link ); ?>" target="<?php echo ( get_sub_field( 'slide_open_link_in_new_window' ) ) ?  '_blank' : '_self' ?>">
				<?php endif; ?>
					<img src="<?php echo esc_url( $slider_src_img[0] ); ?>" srcset="<?php echo esc_attr( $slide_image_srcset ); ?>" sizes="(min-width: 768px) 720px, (min-width: 992px) 700px, (min-width: 1200px) 850px, calc(100vw-20px)" alt="<?php echo esc_attr( get_sub_field( 'slide_title' ) ); ?>">
				<?php if ( ! empty( $slide_link ) ) :?>
					</a>
				<?php endif; ?>
					<?php if ( get_field( 'slider_with_captions' ) ) : ?>
					<div class="jumbotron-content">
						<h1 class="jumbotron-content__title"><?php esc_html( the_sub_field( 'slide_title' ) ); ?></h1>
						<div class="jumbotron-content__description">
							<?php esc_html( the_sub_field( 'slide_text' ) ); ?>
						</div>
					</div>
					<?php endif; ?>
				</div>

			<?php
				endwhile;
			?>
		</div>

		<!-- Controls -->
		<a class="left  jumbotron__control" href="#headerCarousel" role="button" data-slide="prev">
			<i class="fa  fa-chevron-left"></i>
		</a>
		<a class="right  jumbotron__control" href="#headerCarousel" role="button" data-slide="next">
			<i class="fa  fa-chevron-right"></i>
		</a>
	</div>
</div>
