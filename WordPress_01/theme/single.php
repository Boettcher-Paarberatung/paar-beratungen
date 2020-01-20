<?php get_header();?>

<div class="container article">
	<div class="row">

		<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('<p id="breadcrumbs">','</p>');
			}
		?>

		<?php if(have_posts()) : ?>

			<?php while (have_posts()) : the_post(); ?>

				<div class="col-md-9">

					<h1><?php the_title(); ?></h1>

			    <div class="caption">
			    	<span><?php the_date(); ?></span>
			    	<span><?php the_author(); ?></span>
			    </div>

					<?php if(!in_category('Infografik')){ ?>

						<div class="thumbnail">
							<?php the_post_thumbnail('large'); ?>
							<?php the_post_thumbnail_caption(); ?>
				  	</div>

				  <?php } ?>

					<div class="content">
						<p><?php the_content(); ?></p>
					</div>

				</div>

			<?php endwhile; ?>

		<?php endif; ?>

		<?php get_sidebar(); ?>

	</div>
</div>

<?php get_footer();?>

