<div class="container-fluid frontpage-testamonials" style="background:linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url('<?php echo wp_get_attachment_image_src('826', 'full', 'true')[0]; ?>') no-repeat center center" id="erfahrungen">
	<div class="container">
		<?php echo build_reviews('reviews'); ?>
		<div class="row all-blogposts">
			<a class="btn btn-red" href="<?php echo get_page_link('753'); ?>">
				<?php echo get_theme_mod('frontpage_about_me_button'); ?>
			</a>
		</div>
	</div>
</div>
