<?php
/**
 * Main blog page
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
				<?php get_template_part( 'part-main-title' ); ?>

					<?php
						if ( have_posts() ):
							while ( have_posts() ):
								the_post();
					?>

					<article <?php post_class( 'post-inner clearfix' ); ?>>
						<?php if( has_post_thumbnail() ) : ?>
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'img-responsive' ) ); ?>
							</a>
						<?php endif; ?>
						<div class="meta-data">
							<?php if( has_category() ) : ?>
								<span class="meta-data__categories"><?php the_category( ' ' ); ?></span>
							<?php endif; ?>
							<?php if( has_tag() ) : ?>
								<span class="meta-data__tags"><?php _e( '', 'mentalpress_wp'); ?> <?php the_tags( '', ' &bull; ' ); ?></span>
							<?php endif; ?>
							<time datetime="<?php the_time( 'c' ); ?>" class="meta-data__date"><?php echo get_the_date(); ?></time>
							<span class="meta-data__author"><?php _e( 'By', 'mentalpress_wp'); ?> <?php the_author(); ?></span>
							<span class="meta-data__comments"><a href="<?php comments_link(); ?>"><?php mentalpress_pretty_comments_number(); ?></a></span>
						</div>
						<h2 class="hentry__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="hentry__content">
							<?php the_content( sprintf( '<span class="read-more  read-more--post">%s</span>', __('Read more', 'mentalpress_wp') ) ); ?>
						</div>
						<?php if ( strlen( get_the_title() ) < 1 ) : ?>
							<a href="<?php the_permalink(); ?>"><?php _e( 'Link to this post', 'mentalpress_wp'); ?></a>
						<?php endif; ?>
					</article>

					<?php
							endwhile;
						else:
					?>

					<h3><?php _e( 'Sorry, no results found.', 'mentalpress_wp'); ?></h3>

					<?php
						endif;
					?>

					<?php
						the_posts_pagination(
							array(
								'prev_text' => '<i class="fa fa-caret-left"></i>',
								'next_text' => '<i class="fa fa-caret-right"></i>'
							) );
					?>

				</div>
				<?php
					if ( 'all_pages' === get_theme_mod( 'display_latest_posts', 'all_pages' ) ) {
						get_template_part( 'part-latest-posts' );
					}
				?>
			</div>
			<div class="col-xs-12  col-md-3<?php echo 'left' === $sidebar ? '  col-md-pull-9' : ''; ?>">
				<div class="sidebar">
					<?php
						get_template_part( 'part-main-menu' );
						dynamic_sidebar( 'blog-sidebar' );
					?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
