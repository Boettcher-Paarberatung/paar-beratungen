<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="gaid" content="<?php echo get_theme_mod('analytics_id'); ?>">
    <?php get_template_part('template-parts/header/header', 'tagmanager_1'); ?>
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="image/x-icon" />
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>

    <?php get_template_part('template-parts/header/header', 'tagmanager_2'); ?>

    <?php get_template_part('template-parts/header/header', 'navigation_top'); ?>

    <?php get_template_part('template-parts/header/header', 'navigation_menu'); ?>
