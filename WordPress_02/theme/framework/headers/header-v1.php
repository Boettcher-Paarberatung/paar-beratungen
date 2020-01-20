<?php
	$jws_theme_options = $GLOBALS['jws_theme_options'];
	$jws_theme_header_fixed = jws_theme_get_object_id('jws_theme_header_fixed');
	$jws_theme_header_full = jws_theme_get_object_id('jws_theme_header_full', true);
	$jws_theme_custom_menu =  jws_theme_get_object_id('jws_theme_custom_menu');
	$jws_theme_display_widget_top = jws_theme_get_object_id('jws_theme_display_widget_top');
	$jws_theme_header_class = array();
    if(($jws_theme_header_fixed && !is_single()) && !is_archive() &&!is_search()) $jws_theme_header_class[] = 'tb-header-fixed';
	/* if(is_single()){
		$jws_theme_header_class[] = 'tb-header-single';
	} */
    if($jws_theme_options['jws_theme_stick_header']) $jws_theme_header_class[] = 'tb-header-stick';
	
?>

<div class="tb-header-wrap tb-header-v1 <?php if( $jws_theme_header_full ) echo 'tb-layout-fullwidth ';echo esc_attr(implode(' ', $jws_theme_header_class)); ?>">
	<!-- Start Header Sidebar -->
	<?php if($jws_theme_display_widget_top) { ?>
		<div class="tb-header-top">
			<?php if( ! $jws_theme_header_full ) echo '<div class="container">'; ?>
				<div class="row">
					<!-- Start Sidebar Top Left -->
					<?php if(is_active_sidebar( 'tbtheme-header-top-widget-1' )){ ?>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<div class="tb-sidebar tb-sidebar-left">
								<?php 
									if(is_active_sidebar('tbtheme-header-top-widget-1'))
										dynamic_sidebar("tbtheme-header-top-widget-1");
								?>
							</div>
						</div>
					<?php } ?>
					<!-- End Sidebar Top Left -->
					<!-- Start Sidebar Top Right -->
					<?php if(is_active_sidebar( 'tbtheme-header-top-widget-2' )){ ?>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<div class="tb-sidebar tb-sidebar-right">
							<?php 
								if(is_active_sidebar('tbtheme-header-top-widget-2'))
									dynamic_sidebar("tbtheme-header-top-widget-2");
							?>
							</div>
						</div>
					<?php } ?>
					<!-- End Sidebar Top Right -->
				</div>
			<?php if( ! $jws_theme_header_full ) echo '</div>'; ?>
		</div>
	<?php } ?>
	<!-- End Header Sidebar -->
	<!-- Start Header Menu -->
	<?php if( $jws_theme_header_full ):?>
	<div class="tb-header-menu-db tb-relative">
	<?php endif; ?>
		<div class="tb-header-menu tb-header-menu-md">
			<div class="container">
				<div class="tb-header-menu-inner">
					<div class="row">
						<div class="<?php if( $jws_theme_header_full ) echo 'hidden-lg';?> col-xs-4 col-sm-4 col-md-3 text-left">
							<div class="tb-logo">
								<a href="<?php echo esc_url(home_url()); ?>">
									<?php jws_theme_logo(); ?>
								</a>
							</div>
						</div>
						<div class="col-xs-2 col-sm-2 col-md-6 text-center <?php if( $jws_theme_header_full ) echo 'col-lg-12';?>">
							<div class="tb-menu">
								<?php
								$arr = array(
									'theme_location' => 'main_navigation',
									'menu_id' => 'nav',
									'container_class' => 'tb-menu-list',
									'menu_class'      => 'tb-menu-list-inner',
									'echo'            => true,
									'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'depth'           => 0,
								);
								if($jws_theme_custom_menu){
									$arr['menu'] = $jws_theme_custom_menu;
								}
								if (has_nav_menu('main_navigation')) {
									wp_nav_menu( $arr );
								}else{ ?>
								<div class="menu-list-default">
									<?php wp_page_menu();?>
								</div>    
								<?php } ?>
								
								<?php if(is_active_sidebar('tbtheme-woo-sidebar')) { ?> 
									<div class="<?php if( $jws_theme_header_full ) echo 'hidden-lg';?> tb-menu-sidebar">
										<?php if( !$jws_theme_header_full ) dynamic_sidebar('tbtheme-woo-sidebar');?>
									</div>
								<?php } ?>
								
								<div class="tb-menu-control-mobi">
									<a href="javascript:void(0)"><i class="fa fa-bars"></i></a>
								</div>
							</div>
						</div>
						<?php if(is_active_sidebar('tbtheme-header-center-1')) { ?> 
						<div class="col-xs-6 col-sm-6 col-md-3 text-right">
							<div id="tb-lg-menu" class="tb-menu-sidebar">
								<?php dynamic_sidebar('tbtheme-header-center-1');?>
							</div>
						</div>	
					<?php } ?>
					</div>
				</div>
			</div>
			<?php if( $jws_theme_header_full ):?>
				<div class="visible-lg tb-menu-lg tb-logo pull-left">
					<a href="<?php echo esc_url(home_url()); ?>">
						<?php jws_theme_logo(); ?>
					</a>
				</div>
				<div class="visible-lg tb-menu tb-menu-lg pull-right">
					<?php if(is_active_sidebar('tbtheme-woo-sidebar')) { ?> 
						<div id="tb-lg-menu-sidebar" class="tb-menu-sidebar">
							<?php dynamic_sidebar('tbtheme-woo-sidebar');?>
						</div>
					<?php } ?>
				</div>
			<?php endif; ?>
		</div>
	<?php if( $jws_theme_header_full) echo '</div>'; ?>
	<!-- Header search full -->
	<div class="header-full-search">
		<div class="search-popup-vertical">
			<div class="tb-container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
						<form method="get" action="<?php echo esc_url( home_url( '/'  ) );?>">
							<h3 class="tb-title">Search</h3>
							<div class="tb-search-popup-field">
								<input class ="text_search" type="text" value="<?php echo get_search_query();?>" name="s" placeholder="<?php esc_html_e('Enter your search...','medicare');?>" />
								<?php  echo ""; // see more icon at http://fontawesome.io/cheatsheet/?>
								<button type="submit" id="searchsubmit"><i class="fa fa-search"></i></button>
								<?php  echo''; //<input class = "submit_all fa-input" type="submit" value="&#xf002;" />?>
							</div>
							<a href="#" class="close"><span>+</span></a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
		<!-- end search-->
	
</div>
<!-- End Header Menu -->
