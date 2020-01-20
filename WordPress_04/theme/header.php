<?php
/**
 * The Header for MentalPress Theme
 *
 * @package MentalPress
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

	<div class="top  js-top-bar">
	<?php if ( 'no' !== get_theme_mod( 'top_bar_visibility', 'yes' ) ) : ?>
		<div class="top__background  js-top-bg"></div>
	<?php endif; ?>
		<div class="container">
			<!-- Top Tagline from WordPress -->
			<div class="top__tagline">
				<?php echo get_bloginfo( 'description' ); ?>
			</div>
			<!-- Top Menu -->
			<nav class="top__menu">
				<?php
					if ( has_nav_menu( 'top-bar-menu' ) ) {
						wp_nav_menu( array(
							'theme_location' => 'top-bar-menu',
							'container'      => false,
							'menu_class'     => 'top-navigation js-dropdown'
						) );
					}
				?>
			</nav>
		</div>
	</div>

	<div class="container">
		<header class="header">
			<!-- Logo -->
			<div class="logo">
				<a href="<?php echo esc_url( home_url() ); ?>">
					<?php
						$logo              = get_theme_mod( 'logo_img', false );
						$logo2x            = get_theme_mod( 'logo2x_img', false );
						$logo_width_height = get_theme_mod( 'logo_width_height', '' );

						if ( ! empty( $logo ) ) :
					?>
						<img src="<?php echo esc_url( $logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" srcset="<?php echo esc_attr( $logo ); ?><?php echo empty ( $logo2x ) ? '' : ', ' . esc_url( $logo2x ) . ' 2x'; ?>" class="img-responsive" <?php echo sanitize_text_field( $logo_width_height ); ?> />
					<?php
						else :
					?>
						<h1><?php bloginfo( 'name' ); ?></h1>
					<?php
						endif;
					?>
				</a>
			</div>

			<?php if ( has_nav_menu( 'main-menu' ) ) : ?>
				<a href="#main-navigation" class="navbar-toggle">
					<span class="navbar-toggle__text"><?php _e( 'MENU', 'mentalpress_wp' ); ?></span>
					<span class="navbar-toggle__icon-bar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</span>
				</a>
			<?php endif; ?>
			<!-- Header Widgets -->
			<div class="header-widgets">
				<?php dynamic_sidebar( 'header-widgets' ); ?>
			</div>
		</header>
	</div>
