<?php
/**
 * 404 page
 *
 * @package MentalPress
 */

get_header();

$sidebar = get_field( 'sidebar' );

if ( ! $sidebar ) {
	$sidebar = 'left';
}

?>

	<div class="container">
		<div class="row">
			<div class="col-xs-12<?php echo 'left' === $sidebar ? '  col-md-9 col-md-push-3' : ''; echo 'right' === $sidebar ? '  col-md-9' : ''; ?>" role="main">
				<div class="content-container">
					<div class="main-title">
						<h1 class="main-title__primary"><?php _e( 'Looks Like Something Went Wrong!' , 'mentalpress_wp'); ?></h1>
						<h3 class="main-title__secondary"><?php _e( 'The page you were looking for is not here.' , 'mentalpress_wp'); ?></h3>
					</div>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/404.png" alt="404 Picture" class="error-404">
					<p>
						<?php printf(
							/* translators: the first %s for line break, the second and third %s for link to home page wrap */
							__( '%s Go %s Home %s or try to search' , 'mentalpress_wp'),
							'<br />',
							'<b><a href="' . esc_url( home_url( '/' ) ) . '">',
							'</a></b>'
						); ?>:
					</p>
					<div class="widget_search">
						<?php echo get_search_form(); ?>
					</div>
				</div>
			</div>
			<div class="col-xs-12  col-md-3<?php echo 'left' === $sidebar ? '  col-md-pull-9' : ''; ?>">
				<div class="sidebar">
					<?php
						get_template_part( 'part-main-menu' );
						dynamic_sidebar( 'regular-page-sidebar' );
					?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
