<?php if(!is_front_page()) : ?>

	<div class="col-md-3 sidebar">

	  <?php if(is_active_sidebar('sidebar')) : ?>

			<ul class="sidebar">

				<h4><?php bloginfo('name'); ?></h4>

				<div class="img-container">

					<?php echo wp_get_attachment_image('1636', 'thumbnail' , FALSE, array("class" => "img-circle img-thumbnail")); ?>

				</div>

				<div class="text-container"><?php echo get_theme_mod('frontpage_header_title'); ?>

				</div>

				<?php dynamic_sidebar('sidebar'); ?>

			</ul>

		<?php endif; ?>

	</div>

<?php endif; ?>
