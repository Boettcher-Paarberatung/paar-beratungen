/**
 * @package 	WordPress
 * @subpackage 	Psychology Help
 * @version		1.0.5
 * 
 * Visual Content Composer Schortcodes Extend
 * Created by CMSMasters
 * 
 */
 



/**
 * Posts Slider Extend
 */

var posts_slider_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_posts_slider.fields) {

	if (id === 'blog_metadata') {
		cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['choises'] = {
			'title' : 		cmsmasters_shortcodes.choice_title, 
			'excerpt' : 	cmsmasters_shortcodes.choice_excerpt, 
			'date' : 		cmsmasters_shortcodes.choice_date, 
			'categories' : 	cmsmasters_shortcodes.choice_categories, 
			'author' : 		cmsmasters_shortcodes.choice_author, 
			'comments' : 	cmsmasters_shortcodes.choice_comments, 
			'likes' : 		cmsmasters_shortcodes.choice_likes, 
			'views' : 		composer_shortcodes_extend.choice_view, 
			'more' : 		cmsmasters_shortcodes.choice_more 
		};
		
		
		posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else {
		posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	}
	
	
	if (id === 'columns') {
		
		posts_slider_new_fields['controls'] = { 
			type : 		'checkbox', 
			title : 	composer_shortcodes_extend.posts_slider_controls_enable_title, 
			descr : 	'', 
			def : 		'', 
			required : 	false, 
			width : 	'half', 
			choises : { 
						'true' : 	cmsmasters_shortcodes.choice_enable 
			}
		};
		
		posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else {
		posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	}
	
	
	if (id === 'columns') {
		delete cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['depend'];
		
		posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else {
		posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_posts_slider.fields = posts_slider_new_fields;



/**
 * Blog Extend
 */

var blog_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_blog.fields) {
	if (id === 'layout_mode') {
		cmsmastersShortcodes.cmsmasters_blog.fields[id]['choises']['puzzle'] = composer_shortcodes_extend.blog_field_layout_mode_puzzle;
		
		
		blog_new_fields[id] = cmsmastersShortcodes.cmsmasters_blog.fields[id];
	} else {
		blog_new_fields[id] = cmsmastersShortcodes.cmsmasters_blog.fields[id];
	}
	
	
	if (id === 'metadata') {
		cmsmastersShortcodes.cmsmasters_blog.fields[id]['choises'] = {
			'date' : 		cmsmasters_shortcodes.choice_date, 
			'categories' : 	cmsmasters_shortcodes.choice_categories, 
			'author' : 		cmsmasters_shortcodes.choice_author, 
			'comments' : 	cmsmasters_shortcodes.choice_comments, 
			'likes' : 		cmsmasters_shortcodes.choice_likes, 
			'views' : 		composer_shortcodes_extend.choice_view, 
			'more' : 		cmsmasters_shortcodes.choice_more 
		};
		
		
		blog_new_fields[id] = cmsmastersShortcodes.cmsmasters_blog.fields[id];
	} else {
		blog_new_fields[id] = cmsmastersShortcodes.cmsmasters_blog.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_blog.fields = blog_new_fields;



/**
 * Progress Bar
 */

var stat_new_fields = {};


for (var id in cmsmastersMultipleShortcodes.cmsmasters_stat.fields) {
	
	if (id === 'color') { 
		stat_new_fields['bg'] = { 
			type : 		'rgba', 
			title : 	composer_shortcodes_extend.prog_bar_field_bar_bg_title, 
			descr : 	'', 
			def : 		'', 
			required : 	false, 
			width : 	'half'
		};
		stat_new_fields[id] = cmsmastersMultipleShortcodes.cmsmasters_stat.fields[id];
	} else { 
		stat_new_fields[id] = cmsmastersMultipleShortcodes.cmsmasters_stat.fields[id];
	}
}


cmsmastersMultipleShortcodes.cmsmasters_stat.fields = stat_new_fields; 
