<?php
/**
 * @package 	WordPress
 * @subpackage 	Psychology Help
 * @version		1.1.2
 * 
 * Main Theme Functions File
 * Created by CMSMasters
 * 
 */


/*** START EDIT THEME PARAMETERS HERE ***/

// Theme Settings System Fonts List
if (!function_exists('psychology_help_system_fonts_list')) {
	function psychology_help_system_fonts_list() {
		$fonts = array( 
			"Arial, Helvetica, 'Nimbus Sans L', sans-serif" => 'Arial', 
			"Calibri, 'AppleGothic', 'MgOpen Modata', sans-serif" => 'Calibri', 
			"'Trebuchet MS', Helvetica, Garuda, sans-serif" => 'Trebuchet MS', 
			"'Comic Sans MS', Monaco, 'TSCu_Comic', cursive" => 'Comic Sans MS', 
			"Georgia, Times, 'Century Schoolbook L', serif" => 'Georgia', 
			"Verdana, Geneva, 'DejaVu Sans', sans-serif" => 'Verdana', 
			"Tahoma, Geneva, Kalimati, sans-serif" => 'Tahoma', 
			"'Lucida Sans Unicode', 'Lucida Grande', Garuda, sans-serif" => 'Lucida Sans', 
			"'Times New Roman', Times, 'Nimbus Roman No9 L', serif" => 'Times New Roman', 
			"'Courier New', Courier, 'Nimbus Mono L', monospace" => 'Courier New', 
		);
		
		
		return $fonts;
	}
}



// Theme Settings Google Fonts List
if (!function_exists('psychology_help_get_google_fonts_list')) {
	function psychology_help_get_google_fonts_list() {
		$fonts = array( 
			'' => esc_html__('None', 'psychology-help'), 
			'Titillium+Web:300,300italic,400,400italic,600,600italic,700,700italic' => 'Titillium Web', 
			'Roboto:300,300italic,400,400italic,500,500italic,700,700italic' => 'Roboto', 
			'Roboto+Condensed:400,400italic,700,700italic' => 'Roboto Condensed', 
			'Open+Sans:300,300italic,400,400italic,700,700italic' => 'Open Sans', 
			'Open+Sans+Condensed:300,300italic,700' => 'Open Sans Condensed', 
			'Droid+Sans:400,700' => 'Droid Sans', 
			'Droid+Serif:400,400italic,700,700italic' => 'Droid Serif', 
			'PT+Sans:400,400italic,700,700italic' => 'PT Sans', 
			'PT+Sans+Caption:400,700' => 'PT Sans Caption', 
			'PT+Sans+Narrow:400,700' => 'PT Sans Narrow', 
			'PT+Serif:400,400italic,700,700italic' => 'PT Serif', 
			'Ubuntu:400,400italic,700,700italic' => 'Ubuntu', 
			'Ubuntu+Condensed' => 'Ubuntu Condensed', 
			'Headland+One' => 'Headland One', 
			'Source+Sans+Pro:300,300italic,400,400italic,600,600italic,700,700italic' => 'Source Sans Pro', 
			'Lato:400,400italic,700,700italic' => 'Lato', 
			'Cuprum:400,400italic,700,700italic' => 'Cuprum', 
			'Oswald:300,400,700' => 'Oswald', 
			'Yanone+Kaffeesatz:300,400,700' => 'Yanone Kaffeesatz', 
			'Lobster' => 'Lobster', 
			'Lobster+Two:400,400italic,700,700italic' => 'Lobster Two', 
			'Questrial' => 'Questrial', 
			'Raleway:300,400,500,600,700' => 'Raleway', 
			'Dosis:300,400,500,700' => 'Dosis', 
			'Cutive+Mono' => 'Cutive Mono', 
			'Quicksand:300,400,700' => 'Quicksand', 
			'Montserrat:400,700' => 'Montserrat', 
			'Cookie' => 'Cookie', 
		);
		
		
		return $fonts;
	}
}



// Theme Settings Text Transforms List
if (!function_exists('psychology_help_text_transform_list')) {
	function psychology_help_text_transform_list() {
		$list = array( 
			'none' => esc_html__('none', 'psychology-help'), 
			'uppercase' => esc_html__('uppercase', 'psychology-help'), 
			'lowercase' => esc_html__('lowercase', 'psychology-help'), 
			'capitalize' => esc_html__('capitalize', 'psychology-help'), 
		);
		
		
		return $list;
	}
}



// Theme Settings Text Decorations List
if (!function_exists('psychology_help_text_decoration_list')) {
	function psychology_help_text_decoration_list() {
		$list = array( 
			'none' => esc_html__('none', 'psychology-help'), 
			'underline' => esc_html__('underline', 'psychology-help'), 
			'overline' => esc_html__('overline', 'psychology-help'), 
			'line-through' => esc_html__('line-through', 'psychology-help'), 
		);
		
		
		return $list;
	}
}



// Theme Settings Custom Color Schemes
if (!function_exists('psychology_help_custom_color_schemes_list')) {
	function psychology_help_custom_color_schemes_list() {
		$list = array( 
			'first' => esc_html__('Custom 1', 'psychology-help'), 
			'second' => esc_html__('Custom 2', 'psychology-help'), 
			'third' => esc_html__('Custom 3', 'psychology-help') 
		);
		
		
		return $list;
	}
}

/*** STOP EDIT THEME PARAMETERS HERE ***/



// Require Files Function
if (!function_exists('psychology_help_locate_template')) {
	function psychology_help_locate_template($template_names, $require_once = true, $load = true) {
		$located = '';
		
		
		foreach ((array) $template_names as $template_name) {
			if (!$template_name) {
				continue;
			}
			
			
			if (file_exists(get_stylesheet_directory() . '/' . $template_name)) {
				$located = get_stylesheet_directory() . '/' . $template_name;
				
				
				break;
			} elseif (file_exists(get_template_directory() . '/' . $template_name)) {
				$located = get_template_directory() . '/' . $template_name;
				
				
				break;
			}
		}
		
		
		if ($load && $located != '') {
			if ($require_once) {
				require_once($located);
			} else {
				require($located);
			}
		}
		
		
		return $located;
	}
}


// Theme Plugin Support Constants
if (class_exists('Cmsmasters_Content_Composer')) {
	define('CMSMASTERS_CONTENT_COMPOSER', true);
} else {
	define('CMSMASTERS_CONTENT_COMPOSER', false);
}

if (class_exists('woocommerce')) {
	define('CMSMASTERS_WOOCOMMERCE', false);
} else {
	define('CMSMASTERS_WOOCOMMERCE', false);
}

if (class_exists('Tribe__Events__Main')) {
	define('CMSMASTERS_EVENTS_CALENDAR', true);
} else {
	define('CMSMASTERS_EVENTS_CALENDAR', false);
}

if (class_exists('PayPalDonations')) {
	define('CMSMASTERS_PAYPALDONATIONS', false);
} else {
	define('CMSMASTERS_PAYPALDONATIONS', false);
}

if (class_exists('Cmsmasters_Donations')) {
	define('CMSMASTERS_DONATIONS', false);
} else {
	define('CMSMASTERS_DONATIONS', false);
}

if (function_exists('timetable_events_init')) {
	define('CMSMASTERS_TIMETABLE', false);
} else {
	define('CMSMASTERS_TIMETABLE', false);
}

if (class_exists('TC')) {
	define('CMSMASTERS_TC_EVENTS', false);
} else {
	define('CMSMASTERS_TC_EVENTS', false);
}

if (class_exists('Cmsmasters_Events_Schedule')) {
	define('CMSMASTERS_EVENTS_SCHEDULE', false);
} else {
	define('CMSMASTERS_EVENTS_SCHEDULE', false);
}


// CMSMasters Importer Compatibility
define('CMSMASTERS_IMPORTER', true);

// Theme Colored Categories Constant
define('CMSMASTERS_COLORED_CATEGORIES', false);

// Theme Projects Compatible
define('CMSMASTERS_PROJECT_COMPATIBLE', true);

// Theme Profiles Compatible
define('CMSMASTERS_PROFILE_COMPATIBLE', true);

// Developer Mode Constant
define('CMSMASTERS_DEVELOPER_MODE', false);

// Change FS Method
if (!defined('FS_METHOD')) {
	define('FS_METHOD', 'direct');
}



// Theme Image Thumbnails Size
if (!function_exists('psychology_help_get_image_thumbnail_list')) {
	function psychology_help_get_image_thumbnail_list() {
		$list = array( 
			'cmsmasters-small-thumb' => array( 
				'width' => 		65, 
				'height' => 	65, 
				'crop' => 		true 
			), 
			'cmsmasters-square-thumb' => array( 
				'width' => 		300, 
				'height' => 	300, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Square', 'psychology-help') 
			), 
			'cmsmasters-blog-masonry-thumb' => array( 
				'width' => 		580, 
				'height' => 	375, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Masonry Blog', 'psychology-help') 
			), 
			'cmsmasters-project-thumb' => array( 
				'width' => 		580, 
				'height' => 	390, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Project', 'psychology-help') 
			), 
			'cmsmasters-profile-thumb' => array( 
				'width' => 		580, 
				'height' => 	440, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Profile', 'psychology-help') 
			), 
			'cmsmasters-project-masonry-thumb' => array( 
				'width' => 		580, 
				'height' => 	9999, 
				'title' => 		esc_attr__('Masonry Project', 'psychology-help') 
			), 
			'post-thumbnail' => array( 
				'width' => 		860, 
				'height' => 	480, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Featured', 'psychology-help') 
			), 
			'cmsmasters-masonry-thumb' => array( 
				'width' => 		860, 
				'height' => 	9999, 
				'title' => 		esc_attr__('Masonry', 'psychology-help') 
			), 
			'cmsmasters-full-thumb' => array( 
				'width' => 		1160, 
				'height' => 	750, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Full', 'psychology-help') 
			), 
			'cmsmasters-project-full-thumb' => array( 
				'width' => 		1160, 
				'height' => 	750, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Project Full', 'psychology-help') 
			), 
			'cmsmasters-full-masonry-thumb' => array( 
				'width' => 		1160, 
				'height' => 	9999, 
				'title' => 		esc_attr__('Masonry Full', 'psychology-help') 
			) 
		);
		
		
		if (CMSMASTERS_EVENTS_CALENDAR) {
			$list['cmsmasters-event-thumb'] = array( 
				'width' => 		580, 
				'height' => 	420, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Event', 'psychology-help') 
			);
		}
		
		
		return $list;
	}
}



// Theme Settings All Color Schemes List
if (!function_exists('psychology_help_all_color_schemes_list')) {
	function psychology_help_all_color_schemes_list() {
		$list = array( 
			'default' => 		esc_html__('Default', 'psychology-help'), 
			'header' => 		esc_html__('Header', 'psychology-help'), 
			'navigation' => 	esc_html__('Navigation', 'psychology-help'), 
			'header_top' => 	esc_html__('Header Top', 'psychology-help'), 
			'footer' => 		esc_html__('Footer', 'psychology-help') 
		);
		
		
		$out = array_merge($list, psychology_help_custom_color_schemes_list());
		
		
		return apply_filters('cmsmasters_all_color_schemes_list_filter', $out);
	}
}



// Theme Settings Color Schemes Default Colors
if (!function_exists('psychology_help_color_schemes_defaults')) {
	function psychology_help_color_schemes_defaults() {
		$list = array( 
			'default' => array( // content default color scheme
				'color' => 				'#6b6b6b', 
				'link' => 				'#b89b90', 
				'hover' => 				'#686868', 
				'heading' => 			'#303030', 
				'bg' => 				'#ffffff', 
				'alternate' => 			'#fafafa', 
				'border' => 			'#e8e8e8', 
				'secondary_color' =>	'#e1d2cd'
			), 
			'header' => array( // Header color scheme
				'mid_color' => 		'#35333a', 
				'mid_link' => 		'#363636', 
				'mid_hover' => 		'#b89b90', 
				'mid_bg' => 		'#ffffff', 
				'mid_bg_scroll' => 	'#ffffff', 
				'mid_border' => 	'#e9e9e9', 
				'bot_color' => 		'#35333a', 
				'bot_link' => 		'#363636', 
				'bot_hover' => 		'#b89b90', 
				'bot_bg' => 		'#ffffff', 
				'bot_bg_scroll' => 	'#ffffff', 
				'bot_border' => 	'#e9e9e9' 
			), 
			'navigation' => array( // Navigation color scheme
				'title_link' => 			'#363636', 
				'title_link_hover' => 		'#b89b90', 
				'title_link_current' => 	'#b89b90', 
				'title_link_subtitle' => 	'#a2a2a2', 
				'title_link_bg' => 			'rgba(255,255,255,0)', 
				'title_link_bg_hover' => 	'rgba(255,255,255,0)', 
				'title_link_bg_current' => 	'rgba(255,255,255,0)', 
				'title_link_border' => 		'#e9e9e9', 
				'dropdown_text' => 			'#ababab', 
				'dropdown_bg' => 			'#ffffff', 
				'dropdown_border' => 		'#e9e9e9', 
				'dropdown_link' => 			'#363636', 
				'dropdown_link_hover' => 	'#363636', 
				'dropdown_link_subtitle' => '#a2a2a2', 
				'dropdown_link_highlight' => '#fafafa', 
				'dropdown_link_border' => 	'#e9e9e9' 
			), 
			'header_top' => array( // Header Top color scheme
				'color' => 					'#35333a', 
				'link' => 					'#363636', 
				'hover' => 					'#6f6f6f', 
				'bg' => 					'#ffffff', 
				'border' => 				'#e9e9e9', 
				'title_link' => 			'#363636', 
				'title_link_hover' => 		'#6f6f6f', 
				'title_link_bg' => 			'rgba(255,255,255,0)', 
				'title_link_bg_hover' => 	'rgba(255,255,255,0)', 
				'title_link_border' => 		'rgba(255,255,255,0)', 
				'dropdown_bg' => 			'#ffffff', 
				'dropdown_border' => 		'#e9e9e9', 
				'dropdown_link' => 			'#363636', 
				'dropdown_link_hover' => 	'#363636', 
				'dropdown_link_highlight' => '#fafafa', 
				'dropdown_link_border' => 	'#e9e9e9' 
			), 
			'footer' => array( // Footer color scheme
				'color' => 				'rgba(255,255,255,0.4)', 
				'link' => 				'#ffffff', 
				'hover' => 				'#b89b90', 
				'heading' => 			'#ffffff', 
				'bg' => 				'#2d2d2d', 
				'alternate' => 			'#333333', 
				'border' => 			'#424242', 
				'secondary_color' => 	'#e1d2cd' 
			), 
			'first' => array( // custom color scheme 1
				'color' => 				'#ffffff', 
				'link' => 				'#b89b90', 
				'hover' => 				'#ffffff', 
				'heading' => 			'#ffffff', 
				'bg' => 				'#ffffff', 
				'alternate' => 			'#fafafa', 
				'border' => 			'#ededed', 
				'secondary_color' => 	'#e1d2cd' 
			), 
			'second' => array( // custom color scheme 2
				'color' => 				'rgba(255,255,255,0.7)', 
				'link' => 				'#b89b90', 
				'hover' => 				'#ffffff', 
				'heading' => 			'#ffffff', 
				'bg' => 				'#2d2d2d', 
				'alternate' => 			'#2d2d2d', 
				'border' => 			'#ededed', 
				'secondary_color' => 	'#e1d2cd' 
			), 
			'third' => array( // custom color scheme 3
				'color' => 				'rgba(255,255,255,0.7)', 
				'link' => 				'#b89b90', 
				'hover' => 				'#ffffff', 
				'heading' => 			'#ffffff', 
				'bg' => 				'#2d2d2d', 
				'alternate' => 			'#2d2d2d', 
				'border' => 			'#ededed', 
				'secondary_color' => 	'#e1d2cd' 
			) 
		);
		
		
		return $list;
	}
}



// CMSMasters Framework Directories Constants
define('CMSMASTERS_FRAMEWORK', 'framework');
define('CMSMASTERS_ADMIN', CMSMASTERS_FRAMEWORK . '/admin');
define('CMSMASTERS_SETTINGS', CMSMASTERS_ADMIN . '/settings');
define('CMSMASTERS_OPTIONS', CMSMASTERS_ADMIN . '/options');
define('CMSMASTERS_ADMIN_INC', CMSMASTERS_ADMIN . '/inc');
define('CMSMASTERS_CLASS', CMSMASTERS_FRAMEWORK . '/class');
define('CMSMASTERS_FUNCTION', CMSMASTERS_FRAMEWORK . '/function');
define('CMSMASTERS_COMPOSER', 'cmsmasters-c-c');
define('CMSMASTERS_DEMO_FILES_PATH', get_template_directory() . '/framework/admin/inc/demo-content/');



// Load Framework Parts
psychology_help_locate_template(CMSMASTERS_CLASS . '/Browser.php', true);

if (class_exists('Cmsmasters_Theme_Importer')) {
	require_once(CMSMASTERS_ADMIN_INC . '/demo-content-importer.php');
}

psychology_help_locate_template(CMSMASTERS_ADMIN_INC . '/config-functions.php', true);

psychology_help_locate_template(CMSMASTERS_FUNCTION . '/theme-functions.php', true);

psychology_help_locate_template(CMSMASTERS_SETTINGS . '/cmsmasters-theme-settings.php', true);

psychology_help_locate_template(CMSMASTERS_OPTIONS . '/cmsmasters-theme-options.php', true);

psychology_help_locate_template(CMSMASTERS_ADMIN_INC . '/admin-scripts.php', true);

psychology_help_locate_template(CMSMASTERS_ADMIN_INC . '/plugin-activator.php', true);

psychology_help_locate_template(CMSMASTERS_CLASS . '/widgets.php', true);

psychology_help_locate_template(CMSMASTERS_FUNCTION . '/breadcrumbs.php', true);

psychology_help_locate_template(CMSMASTERS_FUNCTION . '/likes.php', true);

psychology_help_locate_template(CMSMASTERS_FUNCTION . '/views.php', true);

psychology_help_locate_template(CMSMASTERS_FUNCTION . '/pagination.php', true);

psychology_help_locate_template(CMSMASTERS_FUNCTION . '/single-comment.php', true);

psychology_help_locate_template(CMSMASTERS_FUNCTION . '/theme-fonts.php', true);

psychology_help_locate_template(CMSMASTERS_FUNCTION . '/theme-colors-primary.php', true);

psychology_help_locate_template(CMSMASTERS_FUNCTION . '/theme-colors-secondary.php', true);

psychology_help_locate_template(CMSMASTERS_FUNCTION . '/template-functions.php', true);

psychology_help_locate_template(CMSMASTERS_FUNCTION . '/template-functions-post.php', true);

psychology_help_locate_template(CMSMASTERS_FUNCTION . '/template-functions-project.php', true);

psychology_help_locate_template(CMSMASTERS_FUNCTION . '/template-functions-profile.php', true);

psychology_help_locate_template(CMSMASTERS_FUNCTION . '/template-functions-shortcodes.php', true);

psychology_help_locate_template(CMSMASTERS_FUNCTION . '/template-functions-widgets.php', true);


$cmsmasters_wp_version = get_bloginfo('version');

if (version_compare($cmsmasters_wp_version, '5', '>=') || function_exists('is_gutenberg_page')) {
	require_once(get_template_directory() . '/gutenberg/cmsmasters-module-functions.php');
}


// Theme Colored Categories Functions
if (CMSMASTERS_COLORED_CATEGORIES) {
	psychology_help_locate_template(CMSMASTERS_FUNCTION . '/theme-colored-categories.php', true);
}


if (class_exists('Cmsmasters_Content_Composer')) {
	psychology_help_locate_template(CMSMASTERS_COMPOSER . '/filters/cmsmasters-c-c-atts-filters.php', true);
}


// CMSMASTERS Donations functions
if (CMSMASTERS_DONATIONS) {
	psychology_help_locate_template('cmsmasters-donations/function/template-functions-donation.php', true);
}

// Woocommerce functions
if (CMSMASTERS_WOOCOMMERCE) {
	psychology_help_locate_template('woocommerce/cmsmasters-woo-functions.php', true);
}

// Events functions
if (CMSMASTERS_EVENTS_CALENDAR) {
	psychology_help_locate_template('tribe-events/cmsmasters-events-functions.php', true);
}

// CMSMasters Events Schedule functions
if (CMSMASTERS_EVENTS_SCHEDULE) {
	psychology_help_locate_template('cmsmasters-events-schedule/cmsmasters-events-schedule-functions.php', true);
}



// Load Theme Local File
if (!function_exists('psychology_help_load_theme_textdomain')) {
	function psychology_help_load_theme_textdomain() {
		load_theme_textdomain('psychology-help', get_template_directory() . '/' . CMSMASTERS_FRAMEWORK . '/languages');
	}
}

// Load Theme Local File Action
if (!has_action('after_setup_theme', 'psychology_help_load_theme_textdomain')) {
	add_action('after_setup_theme', 'psychology_help_load_theme_textdomain');
}



// Framework Activation & Data Import
if (!function_exists('psychology_help_theme_activation')) {
	function psychology_help_theme_activation() {
		if (get_option('cmsmasters_active_theme') != 'psychology-help') {
			add_option('cmsmasters_active_theme', 'psychology-help', '', 'yes');
			
			
			psychology_help_add_global_options();
			
			
			psychology_help_add_global_icons();
			
			
			wp_redirect(esc_url(admin_url('admin.php?page=cmsmasters-settings&upgraded=true')));
		}
	}
}

add_action('after_switch_theme', 'psychology_help_theme_activation');



// Framework Deactivation
if (!function_exists('psychology_help_theme_deactivation')) {
	function psychology_help_theme_deactivation() {
		delete_option('cmsmasters_active_theme');
	}
}

// Framework Deactivation Action
if (!has_action('switch_theme', 'psychology_help_theme_deactivation')) {
	add_action('switch_theme', 'psychology_help_theme_deactivation');
}



// Plugin Activation Regenerate Styles
if (!function_exists('psychology_help_plugin_activation')) {
	function psychology_help_plugin_activation($plugin, $network_activation) {
		update_option('cmsmasters_plugin_activation', 'true');
		
		
		if ($plugin == 'classic-editor/classic-editor.php') {
			update_option('classic-editor-replace', 'no-replace');
		}
	}
}

add_action('activated_plugin', 'psychology_help_plugin_activation', 10, 2);


if (!function_exists('psychology_help_plugin_activation_regenerate')) {
	function psychology_help_plugin_activation_regenerate() {
		if (!get_option('cmsmasters_plugin_activation')) {
			add_option('cmsmasters_plugin_activation', 'false');
		}
		
		if (get_option('cmsmasters_plugin_activation') != 'false') {
			psychology_help_regenerate_styles();
			
			update_option('cmsmasters_plugin_activation', 'false');
		}
	}
}

add_action('init', 'psychology_help_plugin_activation_regenerate');


function psychology_help_run_reinit_import_options($post_id, $key, $value) {
	if (!get_post_meta($post_id, 'cmsmasters_heading', true)) {
		$custom_post_meta_fields = psychology_help_get_custom_all_meta_fields();
		
		foreach ($custom_post_meta_fields as $field) {
			if ( 
				$field['type'] != 'tabs' && 
				$field['type'] != 'tab_start' && 
				$field['type'] != 'tab_finish' && 
				$field['type'] != 'content_start' && 
				$field['type'] != 'content_finish' 
			) {
				update_post_meta($post_id, $field['id'], $field['std']);
			}
		}
	}
	
	
	if ($key === 'cmsmasters_composer_show' && $value === 'true') {
		update_post_meta($post_id, 'cmsmasters_gutenberg_show', 'true');
	}
}

add_action('import_post_meta', 'psychology_help_run_reinit_import_options', 10, 3);
