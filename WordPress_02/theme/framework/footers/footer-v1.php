	<?php
		$jws_theme_display_footer = jws_theme_get_object_id('jws_theme_display_footer', true);

		$ft_top_columns = (int)jws_theme_get_option('jws_theme_footer_top_column');
		$ft_center_columns = (int)jws_theme_get_option('jws_theme_footer_center_column');
		$ft_columns = (int)jws_theme_get_option('jws_theme_footer_column');
		$ft_bottom_columns = (int)jws_theme_get_option('jws_theme_footer_bottom_column');

	if( $jws_theme_display_footer ){
			$jws_theme_footer_layout = jws_theme_get_object_id('jws_theme_footer_layout', true);
			$jws_theme_footer_full = jws_theme_get_object_id('jws_theme_footer_full');
	 ?>
	<div class="jws_theme_footer tb-footer-v1 <?php if( $jws_theme_footer_full ) echo 'tb-layout-fullwidth ';if(jws_theme_get_object_id('jws_theme_footer')) echo jws_theme_get_object_id('jws_theme_footer'); ?>">
		<!-- Start Footer Top -->
		<div class="footer-top">
			<div class="container">
				<div class="row same-height">
					<?php if( $ft_top_columns > 0): ?>
					<div class="<?php echo esc_attr( jws_theme_get_option('jws_theme_footer_top_col1') ); ?> jws_theme_footer_top_one">
						<?php if(is_active_sidebar('tbtheme-footer-top-1')){ dynamic_sidebar("tbtheme-footer-top-1"); } ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<!-- End Footer Top -->
		<!-- Start Footer Center -->
		<div class="footer-center">
			<div class="container">
				<div class="row">
					<?php if( $ft_center_columns > 0): ?>
					<div class="<?php echo esc_attr( jws_theme_get_option('jws_theme_footer_center_col1') ); ?> jws_theme_footer_center_1">
						<?php if(is_active_sidebar('tbtheme-footer-center-1')){ dynamic_sidebar("tbtheme-footer-center-1"); } ?>
					</div>
					<?php endif;
						if( $ft_center_columns > 1):
					 ?>
					<div class="<?php echo esc_attr( jws_theme_get_option('jws_theme_footer_center_col2') ); ?> jws_theme_footer_center_2">
						<?php if(is_active_sidebar('tbtheme-footer-center-2')){ dynamic_sidebar("tbtheme-footer-center-2");} ?>
					</div>
					<?php endif;
						if( $ft_center_columns > 2):
					 ?>
					<div class="<?php echo esc_attr( jws_theme_get_option('jws_theme_footer_center_col3') ); ?> jws_theme_footer_center_3">
						<?php if(is_active_sidebar('tbtheme-footer-center-3')){ dynamic_sidebar("tbtheme-footer-center-3");} ?>
					</div>
					<?php endif;
						if( $ft_center_columns > 3 ):
					?>
					<div class="<?php echo esc_attr( jws_theme_get_option('jws_theme_footer_center_col4') ); ?> jws_theme_footer_center_4 ">
						<?php if(is_active_sidebar('tbtheme-footer-center-4')){ dynamic_sidebar("tbtheme-footer-center-4");} ?>
					</div>
					<?php endif;
					if( $ft_center_columns > 4 ):?>
					<div class="<?php echo esc_attr( jws_theme_get_option('jws_theme_footer_center_col5') ); ?> jws_theme_footer_center_5 ">
						<?php if(is_active_sidebar('tbtheme-footer-center-5')){ dynamic_sidebar("tbtheme-footer-center-5");} ?>
					</div>
					<?php endif;?>
				</div>
			</div>
		</div>
		<!-- End Footer Center -->
		<!-- Start Footer Bottom -->
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<?php if($ft_bottom_columns > 0): ?>
					<div class="<?php echo esc_attr( jws_theme_get_option('jws_theme_footer_bottom_col1'));?> jws_theme_footer_bottom_left">
						<?php if(is_active_sidebar('tbtheme-bottom-left')){ dynamic_sidebar("tbtheme-bottom-left"); }?>
					</div>
					<?php endif;
					if( $ft_bottom_columns > 1 ):
					?>
					<div class="<?php echo esc_attr( jws_theme_get_option('jws_theme_footer_bottom_col2'));?> jws_theme_footer_bottom_right">
						<?php if(is_active_sidebar('tbtheme-bottom-right')){ dynamic_sidebar('tbtheme-bottom-right' ); }?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<!-- End Footer Bottom -->
	</div>
	<?php }
	?>
</div><!-- #wrap -->
<div id="tb-send_mail" class="tb-send-mail-wrap">
	<div class="tb-mail-inner">
		<?php if(is_active_sidebar('tbtheme-popup-newsletter-sidebar')){ dynamic_sidebar("tbtheme-popup-newsletter-sidebar"); }?>
		<a href="#tb-send_mail" id="tb-close-newsletter" class="tb-close-lightbox">x</a>
	</div>
</div>