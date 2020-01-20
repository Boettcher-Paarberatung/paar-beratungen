<?php /* Template Name: Page with childs */ ?>

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

						<?php 
						
							$args = array(
								'post_parent' => get_the_ID(),
								'order'       => 'ASC'
							);
							$children = get_children($args); 

							foreach($children as $child){

								?>
	
								<div class="col-md-12">
									<div class="thumbnail">
										<div class="col-md-3">
											<?php echo get_the_post_thumbnail($child->ID, array(300, 300), array("class" => "img-circle img-responsive")); ?>
										</div>
							      <div class="col-md-9 caption">
							        <h4><?php echo $child->post_title; ?></h4>
							        <p><?php echo get_the_excerpt($child); ?></p>
							        <a class="link" href="<?php echo get_the_permalink($child); ?>">mehr erfahren</a>
							      </div>
							    </div>
								</div>

							<?php }	?>

					</div>

				<?php endwhile; ?>

			<?php endif; ?>

		</div>

		<?php get_sidebar(); ?>

	</div>
</div>

<?php get_footer();?>