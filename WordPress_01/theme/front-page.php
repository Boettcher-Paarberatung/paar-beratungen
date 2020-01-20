<?php get_header();?>

<div class="frontpage">

	<?php

	get_template_part('template-parts/frontpage/frontpage', 'header');
	//get_template_part('template-parts/frontpage/frontpage', 'about_me');
	get_template_part('template-parts/frontpage/frontpage', 'team');
	get_template_part('template-parts/frontpage/frontpage', 'forms');
	//get_template_part('template-parts/frontpage/frontpage', 'first_talk');
	get_template_part('template-parts/frontpage/frontpage', 'costs');
	get_template_part('template-parts/modules/call_to_action');
	get_template_part('template-parts/frontpage/frontpage', 'text');
	get_template_part('template-parts/frontpage/frontpage', 'blog'); ?>

</div>

<?php get_footer();?>
