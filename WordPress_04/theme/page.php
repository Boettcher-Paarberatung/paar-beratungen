<?php
/**
 * Main page page
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
					<?php
						the_post();
						get_template_part( 'part-main-title' );
					?>
					<div>
						<article <?php post_class(); ?>>
							<?php the_content(); ?>
						</article>
						<?php
							if ( comments_open( get_the_ID() ) ) {
								comments_template( '', true );
							}
						?>
					</div>

				</div>
				<?php
					if ( 'all_pages' == get_theme_mod( 'display_latest_posts', 'all_pages' ) ||
						( 'front_page' == get_theme_mod( 'display_latest_posts', 'all_pages' ) && get_the_ID() === absint( get_option( 'page_on_front' ) ) ) ) {
						get_template_part( 'part-latest-posts' );
					}
				?>
			</div>

			<?php if ( 'none' !== $sidebar ) : ?>
			<div class="col-xs-12  col-md-3<?php echo 'left' === $sidebar ? '  col-md-pull-9' : ''; ?>">
				<div class="sidebar">
					<?php
						get_template_part( 'part-main-menu' );
						dynamic_sidebar( 'regular-page-sidebar' );
					?>
				</div>
			</div>
			<?php endif; ?>

		</div>
	</div>

<?php get_footer(); ?>
