<?php
/**
 * Footer
 *
 * @package MentalPress
 */

$footer_widgets_layout = mentalpress_footer_widgets_layout_array();

?>

	<div class="footer-gradient"></div>
	<footer class="footer">
		<?php if ( ! empty( $footer_widgets_layout ) ) : ?>
			<div class="footer-top">
				<div class="container  footer-top__divider">
					<div class="row">
						<?php dynamic_sidebar( 'footer-widgets' ); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="footer-bottom">
			<div class="container">
				<div class="footer-bottom__left">
					<?php
						echo apply_filters( 'mentalpress/footer_left_txt', get_theme_mod( 'footer_left_txt', '<a href="https://www.proteusthemes.com/wordpress-themes/mentalpress/"><img src="' . get_template_directory_uri() . '/assets/images/logo-footer.png" alt="Logo Footer"/></a>' ) );


						if ( has_nav_menu( 'footer-bottom-menu' ) ) {
							wp_nav_menu( array(
								'theme_location' => 'footer-bottom-menu',
								'container'      => false,
								'menu_class'     => 'navigation--footer'
							) );
						}
					?>
				</div>
				<div class="footer-bottom__right">
					<?php echo apply_filters( 'mentalpress/footer_right_txt', get_theme_mod( 'footer_right_txt', '' ) ); ?>
				</div>
			</div>
		</div>
	</footer>

	<?php wp_footer(); ?>
	</body>
</html>
