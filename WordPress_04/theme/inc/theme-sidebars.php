<?php
/**
 * Register sidebars for MentalPress
 *
 * @package MentalPress
 */

function mentalpress_mentalpress_sidebars() {
	// Blog Sidebar
	register_sidebar(
		array(
			'name'          => _x( 'Blog Sidebar', 'backend', 'mentalpress_wp' ),
			'id'            => 'blog-sidebar',
			'description'   => _x( 'Sidebar on the blog layout.', 'backend', 'mentalpress_wp' ),
			'class'         => 'blog  sidebar',
			'before_widget' => '<div class="widget  %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="sidebar__headings">',
			'after_title'   => '</h4>'
		)
	);

	// Regular Page Sidebar
	register_sidebar(
		array(
			'name'          => _x( 'Regular Page Sidebar', 'backend', 'mentalpress_wp' ),
			'id'            => 'regular-page-sidebar',
			'description'   => _x( 'Sidebar on the regular page.', 'backend', 'mentalpress_wp' ),
			'class'         => 'sidebar',
			'before_widget' => '<div class="widget  %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="sidebar__headings">',
			'after_title'   => '</h4>'
		)
	);

	// woocommerce shop sidebar
	if ( is_woocommerce_active() ) {
		register_sidebar(
			array(
				'name'          => _x( 'Shop Sidebar', 'backend' , 'mentalpress_wp'),
				'id'            => 'shop-sidebar',
				'description'   => _x( 'Sidebar for the shop page', 'backend' , 'mentalpress_wp'),
				'class'         => 'sidebar',
				'before_widget' => '<div class="widget  %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="sidebar__headings">',
				'after_title'   => '</h4>'
			)
		);
	}

	// Header
	register_sidebar(
		array(
			'name'          => _x( 'Header', 'backend', 'mentalpress_wp' ),
			'id'            => 'header-widgets',
			'description'   => _x( 'Header area for Icon Box and Social Icons widgets.', 'backend', 'mentalpress_wp' ),
			'before_widget' => '<div class="widget  header-widgets__widget  %2$s">',
			'after_widget'  => '</div>'
		)
	);

	// Footer
	$footer_widgets_num = count( mentalpress_footer_widgets_layout_array() );

	// only register if not 0
	if ( $footer_widgets_num > 0 ) {
		register_sidebar(
			array(
				'name'          => _x( 'Footer', 'backend', 'mentalpress_wp' ),
				'id'            => 'footer-widgets',
				'description'   => sprintf( _x( 'Footer area works best with %d widgets. This number can be changed in the Appearance &rarr; Customize &rarr; Theme Options &rarr; Footer.', 'backend', 'mentalpress_wp' ), $footer_widgets_num ),
				'before_widget' => '<div class="col-xs-12  col-md-%%d"><div class="widget  %2$s">', // %%d is replaced dynamically in filter 'dynamic_sidebar_params'
				'after_widget'  => '</div></div>',
				'before_title'  => '<h6 class="footer-top__headings">',
				'after_title'   => '</h6>'
			)
		);
	}
}
add_action( 'widgets_init', 'mentalpress_mentalpress_sidebars' );