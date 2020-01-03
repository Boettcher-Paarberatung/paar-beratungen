<?php if ( has_nav_menu( 'main-menu' ) ) : ?>

	<nav id="main-navigation" class="main-navigation__container">

		<div class="main-navigation__title">
			<a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
			<?php _e( 'NAVIGATION', 'mentalpress_wp' ); ?>
		</div>

		<?php

		// create the main menu
		// set the default menu arguments
		$args = array(
			'theme_location' => 'main-menu',
			'container'      => false,
			'menu_class'     => 'main-navigation'
		);

		// get the sidebar location (default = left)
		$sidebar = get_field( 'sidebar' );
		if ( ! $sidebar ) {
			$sidebar = 'left';
		}

		if ( 'right' == $sidebar ) {
			$args['menu_class'] = 'main-navigation  main-navigation--inverse';
		}

		wp_nav_menu( $args );

		// display the featured page button if the page is selected in customizer
		$selected_page = sanitize_key( get_theme_mod( 'featured_page_select', 'none' ) );
		if ( 'none' !== $selected_page ) :
			$target = ( '1' == get_theme_mod( 'featured_page_open_in_new_window', '' ) ) ? '_blank' : '_self';

			if ( 'custom-url' == $selected_page ) :
		?>
			<a class="btn  btn-primary  btn-featured-page" target="<?php echo esc_attr( $target ); ?>" href="<?php echo esc_url( get_theme_mod( 'featured_page_custom_url', '#' ) ); ?>">
				<?php echo esc_html( get_theme_mod( 'featured_page_custom_text', 'Featured Page' ) ); ?>
			</a>
		<?php
			else :
		?>
			<a class="btn  btn-primary  btn-featured-page" target="<?php echo esc_attr( $target ); ?>" href="<?php echo get_permalink( $selected_page ); ?>">
				<?php echo get_the_title( absint( $selected_page ) );?>
			</a>
		<?php
			endif;
		endif;
		?>

	</nav>

<?php endif; ?>
