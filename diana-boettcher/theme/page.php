<?php get_header();?>

<div class="container article">
	<div class="row">

		<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('<p id="breadcrumbs">','</p>');
			}
		?>

		<div class="col-md-9">

			<?php if(have_posts()) : ?>

				<?php while (have_posts()) : the_post(); ?>

					<div class="content">

						<h1><?php the_title(); ?></h1>
						<p><?php the_content(); ?></p>

					</div>

				<?php endwhile; ?>

			<?php endif; ?>

		</div>

		<?php get_sidebar(); ?>

	</div>
</div>

<?php get_footer();?>