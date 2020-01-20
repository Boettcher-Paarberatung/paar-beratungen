<?php echo '<div class="container-fluid frontpage-first-talk" style="background:linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('.wp_get_attachment_image_src('827', 'full', 'true')['0'].'); background-position: center;" id="erstgespraech">'; ?>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3><?php echo get_theme_mod('frontpage_first_talk_title'); ?></h3>
					<p><?php echo get_theme_mod('frontpage_first_talk_text'); ?></p>
				</div>

				<?php for($x = 1; $x <= 3; $x++){	?>

					<?php if(get_theme_mod('frontpage_first_talk_'.$x.'_head')) { ?>

						<div class="col-md-4">
							<h4><?php echo get_theme_mod('frontpage_first_talk_'.$x.'_head'); ?></h4>
							<p><?php echo get_theme_mod('frontpage_first_talk_'.$x.'_text'); ?></p>
						</div>

					<?php } ?>

				<?php } ?>

			</div>
		</div>
	</div>
