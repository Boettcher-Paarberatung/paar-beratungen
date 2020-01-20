<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php global $jws_theme_options;?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php

		$favicon = $jws_theme_options['jws_theme_favicon_image'];
		if ( ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) && isset( $favicon['url']  ) ):
	?>
		<link rel="shortcut icon" href="<?php echo esc_url( $favicon['url'] ); ?>" />
	<?php endif; ?>

	<?php wp_head();?>
</head>
<?php 
$class_ex_body_background = jws_theme_get_object_id('jws_theme_ex_body_background');
 ?>
<body <?php if($class_ex_body_background) body_class('ex_body_background'); else body_class();?>>	
	<div id="jws_theme_wrapper">
		<?php
		//global $product;
		$jws_theme_display_top_sidebar = jws_theme_get_object_id('jws_theme_display_top_sidebar');
		if(is_active_sidebar( 'tbtheme-top-sidebar' ) && $jws_theme_display_top_sidebar){
		?>
			<div class="jws_theme_top_sidebar_wrap">
				<?php 
				//dynamic_sidebar("Top Sidebar"); 
				dynamic_sidebar("tbtheme-top-sidebar"); 
				?>
			</div>
		<?php
		}

	?>
	<?php jws_theme_header(); ?>
	<?php jws_theme_page_title();?>
	