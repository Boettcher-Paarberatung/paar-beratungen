<?php

	$mypages = get_pages( array('child_of' => 684, 'exclude' => array(738,735)));

?>

<div class="container frontpage-offer" id="therapieformen">
	<div class="row">
		<div class="col-md-12">
			<h2><?php echo get_theme_mod('frontpage_forms_title'); ?></h2>
		</div>
	</div>

	<div class="row">

	<?php

		foreach( $mypages as $page ) {
			$content = $page->post_content;

	?>

	<div class="col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12">
		<div class="thumbnail">
			<a href="<?php echo get_the_permalink($page); ?>">
				<?php echo get_the_post_thumbnail($page->ID, array(300, 300), array("class" => "img-circle img-responsive")); ?>
			</a>
			<div class="caption">
        <h4><?php echo $page->post_title; ?></h4>
        <p><?php echo get_the_excerpt($page); ?></p>
        <a class="link" href="<?php echo get_the_permalink($page); ?>">
					<?php echo get_theme_mod('frontpage_about_me_button'); ?>
				</a>
      </div>
    </div>
	</div>

	<?php	}	?>

	</div>

	<div class="row">
		<div class="col-md-12">
			<p>
				<?php echo get_theme_mod('frontpage_forms_text'); ?>
			</p>
		</div>
	</div>

</div>
