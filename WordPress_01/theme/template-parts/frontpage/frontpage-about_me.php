<?php if(get_theme_mod('frontpage_about_me_text')){ ?>
	<div class="container-fluid frontpage-about-me" id="ueber-mich">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-lg-offset-3 col-md-9 col-md-offset-3 col-sm-12 col-xs-12">
					<h2><?php echo get_theme_mod('frontpage_about_me_title'); ?></h2>
				</div>
				<div class="col-md-3 col-sm-12 col-xs-12 img-container">
					<img class="img-circle img-thumbnail" src="<?php echo esc_url( get_theme_mod('frontpage_about_me_image')); ?>" alt="Diana Boettcher">
				</div>
				<div class="col-md-9 col-sm-12 col-xs-12">
					<p><?php echo get_theme_mod('frontpage_about_me_text'); ?></p>
					<a href="<?php echo get_page_link('1289'); ?>" class="link">
						<?php echo get_theme_mod('frontpage_about_me_button'); ?>
					</a>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
