<?php

$wp_query = new WP_Query();
$wp_query->query('posts_per_page=2');

if($wp_query->have_posts()) :

?>

	<div class="container frontpage-article" id="blog">
		<div class="row">
			<h3><?php echo get_theme_mod('frontpage_blog_title'); ?></h3>

				<?php	while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

				<div class="col-md-12 blog-card">
					<div class="thumbnail col-md-3">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail(array(512, 341)); ?>
						</a>
			    </div>
					<div class="caption col-md-9">
						<a class="title" href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
						<p><?php the_excerpt(); ?></p>
						<a class="link" href="<?php the_permalink(); ?>">
							<?php echo get_theme_mod('frontpage_about_me_button'); ?>
						</a>
					</div>
				</div>

			<?php endwhile; ?>

		</div>
		<div class="row all-blogposts">
			<a href="<?php echo get_post_type_archive_link('post'); ?>" class="btn btn-red"><?php echo get_theme_mod('frontpage_blog_button'); ?></a>
		</div>
	</div>

<?php endif; ?>
