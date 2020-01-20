<?php $options = _WSH()->option();
	mindron_bunch_global_variable();
	$icon_href = (mindron_set( $options, 'site_favicon' )) ? mindron_set( $options, 'site_favicon' ) : get_template_directory_uri().'/images/favicon.png';
 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ):?>
	<link rel="shortcut icon" href="<?php echo esc_url($icon_href);?>" type="image/x-icon">
	<link rel="icon" href="<?php echo esc_url($icon_href);?>" type="image/x-icon">
<?php endif;?>
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="page-wrapper">
 	
    <?php if(mindron_set($options, 'preloader')):?>
		<!-- Preloader -->
		<div class="preloader"></div>
	<?php endif;?>
 	
    <?php 
      $header = mindron_set( $options, 'header_style' );
      $header_style = mindron_set( $options, 'header_style' );
      $header_style1 = mindron_set( $_GET, 'header_style' );
      $header_style2 = ( $header_style1) ? $header_style1 : $header_style;
      $header_style = ( $header_style2) ? $header_style2 : 'header_v1';

      if ( 'header_v2' === $header_style ) :

      get_template_part( 'includes/modules/header_v2' );

      elseif('header_v3' === $header_style):

      get_template_part( 'includes/modules/header_v3' );

      else:

      get_template_part( 'includes/modules/header_v1' );
      endif;
    
    ?>