<?php
/* Define THEME */
if (!defined('JWS_THEME_URI_PATH')) define('JWS_THEME_URI_PATH', get_template_directory_uri());
if (!defined('JWS_THEME_ABS_PATH')) define('JWS_THEME_ABS_PATH', get_template_directory());
if (!defined('JWS_THEME_URI_PATH_FR')) define('JWS_THEME_URI_PATH_FR', JWS_THEME_URI_PATH.'/framework');
if (!defined('JWS_THEME_ABS_PATH_FR')) define('JWS_THEME_ABS_PATH_FR', JWS_THEME_ABS_PATH.'/framework');
if (!defined('JWS_THEME_URI_PATH_ADMIN')) define('JWS_THEME_URI_PATH_ADMIN', JWS_THEME_URI_PATH_FR.'/admin');
if (!defined('JWS_THEME_ABS_PATH_ADMIN')) define('JWS_THEME_ABS_PATH_ADMIN', JWS_THEME_ABS_PATH_FR.'/admin');
if ( !class_exists( 'ReduxFramework' ) ) {
    require_once( JWS_THEME_ABS_PATH . '/redux-framework/ReduxCore/framework.php' );
}
require_once (JWS_THEME_ABS_PATH_ADMIN.'/theme-options.php');
require_once (JWS_THEME_ABS_PATH_ADMIN.'/index.php');
/* Template Functions */
require_once JWS_THEME_ABS_PATH_FR . '/template-functions.php';
/* Template Functions */
require_once JWS_THEME_ABS_PATH_FR . '/templates/post-favorite.php';
require_once JWS_THEME_ABS_PATH_FR . '/templates/post-functions.php';
/* Lib resize images */
require_once JWS_THEME_ABS_PATH_FR.'/includes/resize.php';
/* Post Type */
require_once JWS_THEME_ABS_PATH_FR.'/post-type/testimonial.php';
require_once JWS_THEME_ABS_PATH_FR.'/post-type/portfolio.php';
require_once JWS_THEME_ABS_PATH_FR.'/post-type/services.php';
require_once JWS_THEME_ABS_PATH_FR.'/post-type/doctor.php';
require_once JWS_THEME_ABS_PATH_FR.'/post-type/gallery.php';
/* Function for Framework */
require_once JWS_THEME_ABS_PATH_FR . '/includes.php';
/* Function for OCDI */
function _sjmedicare_filter_fw_ext_backups_demos($demos)
	{
		$demos_array = array(
			'medicare' => array(
				'title' => esc_html__('Medicare Demo', 'medicare'),
				'screenshot' => 'http://gavencreative.com/import_demo/sjmedicare/screenshot.png',
				'preview_link' => 'http://sjmedicare.jwsuperthemes.com',
			),
		);
        $download_url = 'http://gavencreative.com/import_demo/sjmedicare/download-script/';
		foreach ($demos_array as $id => $data) {
			$demo = new FW_Ext_Backups_Demo($id, 'piecemeal', array(
				'url' => $download_url,
				'file_id' => $id,
			));
			$demo->set_title($data['title']);
			$demo->set_screenshot($data['screenshot']);
			$demo->set_preview_link($data['preview_link']);
			$demos[$demo->get_id()] = $demo;
			unset($demo);
		}
		return $demos;
	}
add_filter('fw:ext:backups-demo:demos', '_sjmedicare_filter_fw_ext_backups_demos');
/* Register Sidebar */
if (!function_exists('jws_theme_RegisterSidebar')) {
	function jws_theme_RegisterSidebar(){
		global $jws_theme_options;
		register_sidebar(array(
			'name' => esc_html__('MegaMenu_widget', 'medicare'),
			'id' => 'tbtheme-mega-menu-sidebar',
			'before_widget' => '<div id="%1$s" class="megamenu widget %2$s">',
			'after_widget' => '</div>',
			'description' => esc_html__('Add widget here to appear in the MegaMenu','medicare'),
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => esc_html__('Blog Sidebar', 'medicare'),
			'id' => 'tbtheme-blog-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
			'description' => esc_html__('Add widget here to appear in the Sidebar (blog)','medicare'),
		));
		register_sidebar(array(
			'name' => esc_html__('Service Right Sidebar', 'medicare'),
			'id' => 'tbtheme-services-right-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => esc_html__('Header Top Widget 1', 'medicare'),
			'id' => 'tbtheme-header-top-widget-1',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => esc_html__('Header Top Widget 2', 'medicare'),
			'id' => 'tbtheme-header-top-widget-2',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => esc_html__('Header Center 1', 'medicare'),
			'id' => 'tbtheme-header-center-1',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => esc_html__('Footer Top 1', 'medicare'),
			'id' => 'tbtheme-footer-top-1',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => esc_html__('Footer Center 1', 'medicare'),
			'id' => 'tbtheme-footer-center-1',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => esc_html__('Footer Center 2', 'medicare'),
			'id' => 'tbtheme-footer-center-2',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => esc_html__('Footer Center 3', 'medicare'),
			'id' => 'tbtheme-footer-center-3',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => esc_html__('Footer Center 4', 'medicare'),
			'id' => 'tbtheme-footer-center-4',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => esc_html__('Footer Center 5', 'medicare'),
			'id' => 'tbtheme-footer-center-5',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => esc_html__('Footer Bottom Left', 'medicare'),
			'id' => 'tbtheme-bottom-left',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => esc_html__('Footer Bottom Right', 'medicare'),
			'id' => 'tbtheme-bottom-right',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => esc_html__('About US', 'medicare'),
			'id' => 'tbtheme-about-us',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => esc_html__('Contact US address', 'medicare'),
			'id' => 'tbtheme-contact-us-address',
			'before_widget' => '<div id="%1$s" class="widget address_wg %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wg-address-title">',
			'after_title' => '</h3>',
		));
		register_sidebars(4,array(
			'name' => esc_html__('Custom Widget %d', 'medicare'),
			'id' => 'tbtheme-custom-widget',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '<div style="clear:both;"></div></div>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
			'description' => esc_html__('Add widget here to appear in your site','medicare'),
		));
		/* register_sidebar(array(
			'name' => esc_html__('Popup Newsletter Sidebar', 'medicare'),
			'id' => 'tbtheme-popup-newsletter-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
		)); */

		if (class_exists ( 'Woocommerce' )) {
			register_sidebar(array(
				'name' => esc_html__('Woocommerce Canvas Sidebar', 'medicare'),
				'id' => 'tbtheme-woo-canvas-sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="wg-title"><span>',
				'after_title' => '</span></h3>',
			));
			register_sidebar(array(
				'name' => esc_html__('Woocommerce Account Sidebar', 'medicare'),
				'id' => 'tbtheme-woo-account-sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="wg-title"><span>',
				'after_title' => '</span></h3>',
			));
			register_sidebar(array(
				'name' => esc_html__('Woocommerce Left Sidebar(see home page 8)', 'medicare'),
				'id' => 'tbtheme-woo-left-sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="wg-title">',
				'after_title' => '</h3>',
			));
			register_sidebar(array(
				'name' => esc_html__('Woocommerce Sidebar', 'medicare'),
				'id' => 'tbtheme-woo-sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="wg-title"><span>',
				'after_title' => '</span></h3>',
			));
			register_sidebar(array(
				'name' => esc_html__('Woocommerce Sidebar For FullWidth', 'medicare'),
				'id' => 'tbtheme-woo-sidebar-full',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="wg-title"><span>',
				'after_title' => '</span></h3>',
			));
			register_sidebar(array(
				'name' => esc_html__('Woocommerce Shop Sidebar', 'medicare'),
				'id' => 'tbtheme-woo-shop-sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="wg-title">',
				'after_title' => '</h3>',
			));
			register_sidebar(array(
				'name' => esc_html__('Woocommerce Shop Full Width Sidebar', 'medicare'),
				'id' => 'tbtheme-woo-archive-attr-sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="wg-title">',
				'after_title' => '</h3>',
			));
			register_sidebar(array(
				'name' => esc_html__('Woocommerce Shop Single Sidebar', 'medicare'),
				'id' => 'tbtheme-woo-single-sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="wg-title">',
				'after_title' => '</h3>',
			));
		}
	}
}
add_action( 'init', 'jws_theme_RegisterSidebar' );

/* Add Stylesheet And Script */
if (!function_exists('jws_theme_enqueue_style')) {
	function jws_theme_enqueue_style() {
		global $jws_theme_options;
		wp_enqueue_style( 'bootstrap.min', JWS_THEME_URI_PATH .'/assets/css/bootstrap.min.css' );
		wp_enqueue_style( 'flexslider', JWS_THEME_URI_PATH . '/assets/vendors/flexslider/flexslider.css' );
		wp_enqueue_style( 'jquery-fancybox', JWS_THEME_URI_PATH . '/assets/vendors/fancybox/jquery.fancybox.css' );
		wp_enqueue_style( 'colorbox', JWS_THEME_URI_PATH . '/assets/css/colorbox.css' );
		wp_enqueue_style( 'font-awesome', JWS_THEME_URI_PATH .'/assets/css/font-awesome.min.css' );
		wp_enqueue_style( 'pe-icon-stroke', JWS_THEME_URI_PATH .'/assets/vendors/pe-icon-7-stroke/css/pe-icon-7-stroke.css' );
		wp_enqueue_style('owl-carousel', JWS_THEME_URI_PATH . '/assets/vendors/owl-carousel/owl.carousel.css' );
		wp_enqueue_style( 'tb-core-min', JWS_THEME_URI_PATH .'/assets/css/tb.core.min.css' );
		wp_enqueue_style( 'main-style', JWS_THEME_URI_PATH .'/assets/css/main-style.css' );	 		
		wp_enqueue_style( 'medicare_font_icon', JWS_THEME_URI_PATH .'/assets/css/medicare_font_icon.css' );
		// Load the Internet Explorer specific stylesheet.
		wp_enqueue_style( 'ie', get_template_directory_uri() . '/css/ie.css' );
		wp_style_add_data( 'ie', 'conditional', 'IE 9' );

		wp_enqueue_style( 'style', get_stylesheet_uri() );
		if( isset( $jws_theme_options['jws_theme_box_style'] ) && $jws_theme_options['jws_theme_box_style'] ){
			wp_enqueue_style( 'box-style', JWS_THEME_URI_PATH.'/assets/css/box-style.css');
		}
		
	}
	add_action( 'wp_enqueue_scripts', 'jws_theme_enqueue_style' );
}

if (!function_exists('jws_theme_enqueue_script')) {
	function jws_theme_enqueue_script() {
		global $jws_theme_options;
		// wp_enqueue_script("jquery");
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		wp_enqueue_script( 'flexslider-min', JWS_THEME_URI_PATH.'/assets/vendors/flexslider/jquery.flexslider-min.js', array('jquery'), false, true );
		wp_enqueue_script( 'owl-carousel', JWS_THEME_URI_PATH.'/assets/vendors/owl-carousel/owl.carousel.min.js', array('jquery'), false, true );
		wp_enqueue_script( 'waypoint', JWS_THEME_URI_PATH.'/assets/vendors/waypoint/jquery.waypoints.min.js', array('jquery'), false, true );
		wp_enqueue_script( 'animated', JWS_THEME_URI_PATH.'/assets/js/animated.js', array('jquery','waypoint'), false, true );
		// wp_enqueue_script( 'jquery.mCustomScrollbar', JWS_THEME_URI_PATH.'/assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.js', array('jquery') );
		wp_enqueue_script( 'jquery-fancybox', JWS_THEME_URI_PATH.'/assets/vendors/fancybox/jquery.fancybox.js', array('jquery'), false, true );
		wp_enqueue_script( 'bootstrap-min', JWS_THEME_URI_PATH.'/assets/js/bootstrap.min.js', array('jquery'), false, true );
		wp_enqueue_script('jquery-colorbox', JWS_THEME_URI_PATH . "/assets/js/jquery.colorbox.js", array('jquery'),"1.5.5", true);
		wp_enqueue_script( 'tb-shortcodes', JWS_THEME_URI_PATH_FR.'/shortcodes/shortcodes.js', array('jquery'), false, true );
		wp_enqueue_script( 'parallax', JWS_THEME_URI_PATH.'/assets/js/parallax.js', array('jquery'), false, true );
		wp_enqueue_script( 'easytabs', JWS_THEME_URI_PATH.'/assets/js/jquery.easytabs.min.js', array('jquery'), false, true );
		wp_enqueue_script( 'match-height', JWS_THEME_URI_PATH.'/assets/vendors/match-height/jquery.matchHeight-min.js', array('jquery'), false, true );
		wp_register_script( 'countUP', JWS_THEME_URI_PATH.'/assets/js/jquery.incremental-counter.min.js', array('jquery'), false, true );
		wp_register_script( 'instafeed-custom', JWS_THEME_URI_PATH.'/assets/js/instafeed.min.js', array('jquery'), false, true );
		if( isset( $jws_theme_options['jws_theme_enabled_smooth_scroll'] ) && $jws_theme_options['jws_theme_enabled_smooth_scroll'] ){
			wp_enqueue_script( 'smooth-scroll', JWS_THEME_URI_PATH.'/assets/vendors/smooth-scroll/jquery.smooth-scroll.min.js', array('jquery'), false, true );	
		}
		wp_enqueue_script( 'main', JWS_THEME_URI_PATH .'/assets/js/main.js', array('jquery'), false, true );
		wp_register_script( 'cycle2', JWS_THEME_URI_PATH .'/assets/vendors/cycle2/jquery.cycle2.min.js', array('jquery'), false, true );
    	wp_register_script( 'cycle2-carousel', JWS_THEME_URI_PATH .'/assets/vendors/cycle2/jquery.cycle2.carousel.min.js', array('cycle2'), false, true );
    	wp_enqueue_script( 'jquery-cookie', JWS_THEME_URI_PATH .'/assets/vendors/jquery-cookie/jquery.cookie.js', array(), false, true );
		if( isset( $jws_theme_options['jws_theme_box_style'] ) && $jws_theme_options['jws_theme_box_style'] ){
			wp_enqueue_script( 'box-style', JWS_THEME_URI_PATH.'/assets/js/box-style.js', array('jquery','main'), false, true );
		}
		wp_enqueue_script( 'masonry.pkgd.min', JWS_THEME_URI_PATH.'/assets/js/masonry.pkgd.min.js', array('jquery'), false, true );
		wp_enqueue_script( 'mixitup', JWS_THEME_URI_PATH.'/assets/js/jquery.mixitup.min.js', array('jquery'), false, true );
		wp_localize_script(
		   'main',
		   'the_ajax_script',
			array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'assets_img' => JWS_THEME_URI_PATH.'/assets/images/',
				'primary_color' => $jws_theme_options['jws_theme_primary_color'],
				'show_popup_mail' => isset($jws_theme_options['jws_theme_show_popup']) ? (boolean)$jws_theme_options['jws_theme_show_popup'] : false
			)
		);
	}
	add_action( 'wp_enqueue_scripts', 'jws_theme_enqueue_script' );
}


function jws_theme_load_footer_css() {
	global $jws_theme_options;
	if( isset( $jws_theme_options['jws_theme_box_style'] ) && $jws_theme_options['jws_theme_box_style'] ){
	?>
		<style id='box-style-inline-css' type='text/css'>
			<?php
				$custom_style = get_transient( 'jws_theme_box_style' );
				if( !$custom_style ){
					$response = wp_remote_get( JWS_THEME_URI_PATH.'/assets/css/custom-style.css' );
					$custom_style = wp_remote_retrieve_body( $response );
					if( !empty( $custom_style ) ){
						set_transient( 'jws_theme_box_style', $custom_style );
						echo str_replace( '#eaa24e', $jws_theme_options['jws_theme_primary_color'], $custom_style );
					}
				}else{
					echo str_replace( '#eaa24e', $jws_theme_options['jws_theme_primary_color'], $custom_style );
				}

			?>
		</style>
	<?php
	}
}
add_action( 'wp_head', 'jws_theme_load_footer_css' );

/*Style Inline*/
require JWS_THEME_ABS_PATH_FR.'/style-inline.php';

/* Less */
if(jws_theme_get_option('jws_theme_less')){
    require_once JWS_THEME_ABS_PATH_FR.'/presets.php';
}

/* Widgets */
require_once JWS_THEME_ABS_PATH_FR.'/widgets/widgets.php';


/* More functions*/
require_once JWS_THEME_ABS_PATH_FR.'/morefunctions/more.php';
/* add social info to author*/
function add_contactmethods( $contactmethods ) {
// Add Twitter
$contactmethods['twitter'] = __('Twitter (without "@")','medicare');
//add Facebook
$contactmethods['facebook'] = __('Facebook','medicare');
//add Instagram
$contactmethods['instagram'] = __('Instagram','medicare');
//add linkid in
$contactmethods['linkedin'] = __('Linked In','medicare');
//add Youtube user
$contactmethods['ybuser'] =__( 'Youtube user','medicare');
//add Youtube channel
//$contactmethods['ybchannel'] = __('Youtube channel''medicare'); https://www.youtube.com/user/Microsoft/channels 



 
return $contactmethods;
}
add_filter('user_contactmethods','add_contactmethods',10,1);


