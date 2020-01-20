<?php if(have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>

		<?php if(get_the_content()) : ?>

			<div class="frontpage-faq" id="faq">
				<div class="container">
					<div class="row">

						<div class="col-md-12">				
							<small><?php echo get_theme_mod('frontpage_text_label'); ?></small>
							<h3><?php echo get_theme_mod('frontpage_text_title'); ?></h3>
					
							<?php the_content(); ?>

						</div>
					</div>		
				</div>
			</div>

		<?php	endif; ?>

	<?php endwhile; ?>

<?php	endif; ?>