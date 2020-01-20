<?php get_header(); ?>
<?php
$jws_theme_options = $GLOBALS['jws_theme_options'];
/*$jws_theme_show_page_title = (int) isset($jws_theme_options['jws_theme_portfolio_show_page_title']) ? $jws_theme_options['jws_theme_portfolio_show_page_title'] : 1;
$jws_theme_show_page_breadcrumb = (int) isset($jws_theme_options['jws_theme_portfolio_show_page_breadcrumb']) ? $jws_theme_options['jws_theme_portfolio_show_page_breadcrumb'] : 1;

$jws_theme_show_post_nav = (int) isset($jws_theme_options['jws_theme_portfolio_show_post_nav']) ?  $jws_theme_options['jws_theme_portfolio_show_post_nav']: 1;
$jws_theme_show_post_comment = (int) isset($jws_theme_options['jws_theme_portfolio_show_post_comment']) ?  $jws_theme_options['jws_theme_portfolio_show_post_comment']: 1;
$jws_theme_portfolio_show_post_related = (int) isset($jws_theme_options['jws_theme_portfolio_show_post_related']) ?  $jws_theme_options['jws_theme_portfolio_show_post_related']: 1;
$jws_theme_portfolio_no_post_related = (int) isset($jws_theme_options['jws_theme_portfolio_no_post_related']) ?  $jws_theme_options['jws_theme_portfolio_no_post_related']: 3;
$columns = $jws_theme_portfolio_no_post_related > 0 ? $jws_theme_portfolio_no_post_related : 3;*/
$jws_theme_show_post_nav = (int) isset($jws_theme_options['jws_theme_portfolio_show_post_nav']) ?  $jws_theme_options['jws_theme_portfolio_show_post_nav']: 1;
?>
	<div class="main-content">
		<div class="container">
			<div class="row">
				<?php
				?>
				<!-- Start Content -->
				<div class="content tb-blog">
					<?php
					while ( have_posts() ) : the_post();
						$post_id = get_the_ID();
						get_template_part( 'framework/templates/portfolio/single/entry');
						// Previous/next post navigation.
						if($jws_theme_show_post_nav) jws_theme_post_nav();
						// If comments are open or we have at least one comment, load up the comment template.
					endwhile;
					?>
					<?php 
					wp_reset_postdata(); 
					?>
				</div>
				<!-- End Content -->
				
			</div>
		</div>
	</div>
<?php get_footer(); ?>