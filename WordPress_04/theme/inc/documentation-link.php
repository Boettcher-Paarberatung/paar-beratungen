<?php
/**
 * Add the link to documentation under Appearance in the wp-admin
 */

if ( ! function_exists( 'mentalpress_add_docs_page' ) ) {
	function mentalpress_add_docs_page() {
		add_theme_page(
			_x( 'Documentation', 'backend', 'mentalpress_wp' ),
			_x( 'Documentation', 'backend', 'mentalpress_wp' ),
			'',
			'proteusthemes-theme-docs',
			'mentalpress_docs_page_output'
		);
	}
	add_action( 'admin_menu', 'mentalpress_add_docs_page' );

	function mentalpress_docs_page_output() {
		?>
		<div class="wrap">
			<h2><?php _ex( 'Documentation', 'backend', 'mentalpress_wp' ); ?></h2>

			<p>
				<strong><a href="http://www.proteusthemes.com/docs/mentalpress/" class="button button-primary " target="_blank"><?php _ex( 'Click here to see online documentation of the theme!', 'backend', 'mentalpress_wp' ); ?></a></strong>
			</p>
		</div>
		<?php
	}
}