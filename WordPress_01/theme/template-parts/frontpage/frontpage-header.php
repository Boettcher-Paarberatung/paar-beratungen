<div class="container-fluid">
	<div class="row" >
		<div class="frontpage-atf" style="background-image:url('<?php echo esc_url( get_theme_mod('frontpage_header_image')); ?>')">
			<div class="container">
				<div class="row">
					<div class="frontpage-container col-lg-6 col-md-6 col-sm-9 col-xs-12">
			      <h1 class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><?php echo get_theme_mod('frontpage_header_title'); ?></h1>
						<ul class="list-unstyled frontpage-proof col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<?php echo get_theme_mod('frontpage_header_list'); ?>
						</ul>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<?php echo do_shortcode('[latepoint_book_button caption="Termin vereinbaren"]') ?>
						</div>
						<p class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<?php echo get_theme_mod('frontpage_header_subtitle'); ?>
						</p>
			    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="row frontpage-media">
		<div class="container">
			<div class="row">
				<?php get_template_part('template-parts/frontpage/frontpage-media'); ?>
			</div>
		</div>
	</div>
</div>
