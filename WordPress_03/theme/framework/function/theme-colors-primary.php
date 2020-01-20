<?php
/**
 * @package 	WordPress
 * @subpackage 	Psychology Help
 * @version 	1.1.2
 * 
 * Theme Primary Color Schemes Rules
 * Created by CMSMasters
 * 
 */


function psychology_help_theme_colors_primary() {
	$cmsmasters_option = psychology_help_get_global_options();
	
	
	$cmsmasters_color_schemes = cmsmasters_color_schemes_list();
	
	
	$custom_css = "/**
 * @package 	WordPress
 * @subpackage 	Psychology Help
 * @version 	1.1.2
 * 
 * Theme Primary Color Schemes Rules
 * Created by CMSMasters
 * 
 */

";
	
	
	foreach ($cmsmasters_color_schemes as $scheme => $title) {
		$rule = (($scheme != 'default') ? "html .cmsmasters_color_scheme_{$scheme} " : '');
		
		
		$custom_css .= "
/***************** Start {$title} Color Scheme Rules ******************/

	/* Start Main Content Font Color */
	" . (($scheme == 'default') ? "body," : '') . "
	" . (($scheme != 'default') ? ".cmsmasters_color_scheme_{$scheme}," : '') . "
	{$rule}input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	{$rule}textarea, 
	{$rule}.cmsmasters_post_author_info a, 
	{$rule}.cmsmasters_slider_post_author a, 
	{$rule}.cmsmasters_slider_post_meta_info a, 
	{$rule}.cmsmasters_slider_project_footer a, 
	{$rule}.cmsmasters_post_meta_info a,
	{$rule}.cmsmasters_post_user_name a, 
	{$rule}.cmsmasters_post_cont_info a, 
	{$rule}.cmsmasters_post_tags a, 
	{$rule}.cmsmasters_post_category a, 
	{$rule}.cmsmasters_project_category a, 
	{$rule}.cmsmasters_project_footer > span > a, 
	{$rule}.cmsmasters_slider_post_category a, 
	{$rule}.cmsmasters_slider_project_category a, 
	{$rule}.copyright, 
	{$rule}.headline_inner .cmsmasters_breadcrumbs_inner a:hover, 
	{$rule}.cmsmasters_stats.stats_mode_bars.stats_type_horizontal .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_counter_wrap,
	{$rule}.headline_inner .cmsmasters_breadcrumbs_inner, 
	{$rule}.share_posts a,
	{$rule}select,
	{$rule}.pl_content .pl_subtitle,
	{$rule}body .cmsmasters-form-builder .check_parent input[type=checkbox] + label,
	{$rule}body .cmsmasters-form-builder .check_parent input[type=radio] + label,
	{$rule}small,
	{$rule}.widget ul li a,
	{$rule}.cmsmasters_profile_subtitle,
	{$rule}.wpcf7-list-item-label,
	{$rule}.copyright,
	{$rule}.project_details_item .project_details_item_desc a,
	{$rule}.project_details_item .project_details_item_desc,
	{$rule}.profile_details_item .profile_details_item_desc a,
	{$rule}.profile_details_item .profile_details_item_desc,
	{$rule}.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_counter_wrap,
	{$rule}.post_comments .cmsmasters_comment_item_cont_info > a,
	{$rule}.cmsmasters_items_filter_list li a,
	{$rule}.cmsmasters_archive_item_user_name a,
	{$rule}.cmsmasters_archive_item_date_wrap abbr a,
	{$rule}.cmsmasters_archive_item_category a,
	{$rule}.cmsmasters_tabs.lpr .cmsmasters_tabs_wrap .tab_comments .color_2, 
	{$rule}option {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_color']) . "
	}
	
	{$rule}input::-webkit-input-placeholder {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_color']) . "
	}
	
	{$rule}input:-moz-placeholder {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_color']) . "
	}
	/* Finish Main Content Font Color */
	
	/* Start Primary Color */
	" . (($scheme == 'default') ? "#slide_top," : '') . "
	{$rule}a,
	{$rule}.profile_social_icons_list a:hover,
	{$rule}.cmsmasters_slider_post_meta_info a:before,
	{$rule}.cmsmasters_slider_post_meta_info .cmsmastersView:before,
	{$rule}.cmsmasters_slider_project_footer .cmsmastersView:before,
	{$rule}.cmsmasters_slider_project_footer a:before,
	{$rule}.cmsmasters_post_meta_info a:before,
	{$rule}.cmsmasters_post_meta_info .cmsmastersView:before,
	{$rule}.cmsmasters_post_meta_info a:hover:before,
	{$rule}.cmsmasters_post_user_name:before,
	{$rule}.cmsmasters_post_date:before,
	{$rule}.cmsmasters_slider_post_date:before,
	{$rule}.cmsmasters_slider_post_author:before,
	{$rule}.cmsmasters_project_footer span > a:hover:before, 
	{$rule}.cmsmasters_project_footer span > a:before, 
	{$rule}.cmsmasters_dropcap.type1,
	{$rule}input[type=submit], 
	{$rule}input[type=button], 
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_top:before,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_heading_left .icon_box_heading:before,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_icon .cmsmasters_icon_list_icon:before,
	{$rule}.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner:before, 
	{$rule}#wp-calendar thead th,
	{$rule}.bypostauthor > .comment-body .alignleft:before,
	{$rule}.cmsmasters_prev_arrow,
	{$rule}.cmsmasters_currency,
	{$rule}.cmsmasters_price,
	{$rule}.cmsmasters_coins,
	{$rule}.cmsmasters_coins,
	{$rule}.cmsmasters_wrap_pagination ul li .page-numbers:hover,
	{$rule}.cmsmasters_wrap_pagination ul li .page-numbers.current,
	{$rule}.cmsmasters_wrap_pagination ul li .page-numbers.next, 
	{$rule}.cmsmasters_wrap_pagination ul li .page-numbers.prev,
	{$rule}.cmsmasters_archive_item_date_wrap:before,
	{$rule}.cmsmasters_archive_item_user_name:before,
	{$rule}button:hover:before,
	{$rule}.cmsmasters_comments a:before, 
	{$rule}.cmsmasters_likes a:before,
	{$rule}.cmsmasters_post_comments:before,
	{$rule}.cmsmasters_tabs .cmsmasters_tabs_list .cmsmasters_tabs_list_item.current_tab a,
	{$rule}.cmsmasters_tabs .cmsmasters_tabs_list .cmsmasters_tabs_list_item.current_tab a:hover,
	{$rule}.cmsmasters_next_arrow, 
	{$rule}.header_mid .social_wrap a,
	{$rule}.post_nav > span a:hover + span {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
	}
	
	" . (($scheme == 'default') ? "mark," : '') . "
	" . (($scheme != 'default') ? ".cmsmasters_color_scheme_{$scheme} mark," : '') . "
	{$rule}.cmsmasters_dropcap.type2,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_top:before,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_left_top:before,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_left:before,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_bg .cmsmasters_icon_list_item .cmsmasters_icon_list_icon,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_icon .cmsmasters_icon_list_item:hover .cmsmasters_icon_list_icon,
	{$rule}.cmsmasters_stats.stats_mode_bars .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner, 
	{$rule}.cmsmasters_button:before, 
	{$rule}.cmsmasters_button:after, 
	{$rule}.button:before, 
	{$rule}.button:after, 
	{$rule}button:before,
	{$rule}button:after,
	{$rule}.cmsmasters-form-builder .check_parent input[type=radio] + label:after,
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=radio] + span.wpcf7-list-item-label:after,
	{$rule}.cmsmasters_prev_arrow:hover,
	{$rule}.cmsmasters_next_arrow:hover,
	{$rule}.notice_close,
	{$rule}#slide_top:after,
	{$rule}input[type=submit]:hover, 
	{$rule}input[type=button]:hover, 
	{$rule}.header_bot .bot_nav > li > a:before,
	{$rule}.cmsmasters_post_tags > a, 
	{$rule}.cmsmasters-form-builder .check_parent input[type=checkbox] + label:after,
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=checkbox] + span.wpcf7-list-item-label:after,
	{$rule}.cmsmasters_toggle_wrap:hover .cmsmasters_toggle_plus, 
	{$rule}.cmsmasters_toggle_wrap.current_toggle .cmsmasters_toggle_plus, 
	{$rule}.cmsmasters_toggle_wrap .cmsmasters_toggle_plus .cmsmasters_toggle_plus_hor, 
	{$rule}.cmsmasters_toggle_wrap .cmsmasters_toggle_plus .cmsmasters_toggle_plus_vert, 
	{$rule}table thead th,
	{$rule}table thead td,
	{$rule}.cmsmasters_prev_post > a:hover + .cmsmasters_prev_arrow,
	{$rule}.cmsmasters_next_post > a:hover + .cmsmasters_next_arrow,
	{$rule}.cmsmasters_wrap_pagination ul li .page-numbers.next:hover,
	{$rule}.cmsmasters_wrap_pagination ul li .page-numbers.prev:hover {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_border .cmsmasters_icon_list_item .cmsmasters_icon_list_icon:after,
	{$rule}.cmsmasters_prev_arrow:hover,
	{$rule}table thead th,
	{$rule}table thead td,
	{$rule}.button, 
	{$rule}button,
	{$rule}input[type=submit], 
	{$rule}input[type=button], 
	{$rule}.cmsmasters_button,
	{$rule}.cmsmasters_items_filter_but.current,
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_but.current:hover,
	{$rule}.cmsmasters_items_sort_but.current,
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_sort_but.current:hover,
	{$rule}.cmsmasters_tabs .cmsmasters_tabs_list .cmsmasters_tabs_list_item.current_tab,
	{$rule}.cmsmasters_next_arrow:hover,
	{$rule}.cmsmasters_toggle_wrap:hover .cmsmasters_toggle_plus, 
	{$rule}.cmsmasters_toggle_wrap.current_toggle .cmsmasters_toggle_plus,
	{$rule}.cmsmasters_stats.stats_mode_bars.stats_type_vertical .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner,
	{$rule}.cmsmasters_prev_post > a:hover + .cmsmasters_prev_arrow,
	{$rule}#slide_top,
	{$rule}.cmsmasters_next_post > a:hover + .cmsmasters_next_arrow,
	{$rule}.cmsmasters_wrap_pagination ul li .page-numbers.next:hover,
	{$rule}.cmsmasters_wrap_pagination ul li .page-numbers.prev:hover,
	{$rule}select:focus {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
	}
	/* Finish Primary Color */
	
	
	/* Start Highlight Color */
	{$rule}a:hover,
	{$rule}#tribe-events-bar #tribe-bar-views label.button:hover,
	{$rule}.cmsmasters_breadcrumbs_inner a,
	{$rule}.cmsmasters_tabs .cmsmasters_tabs_list .cmsmasters_tabs_list_item > a:hover,
	{$rule}h1 a:hover,
	{$rule}h2 a:hover,
	{$rule}h3 a:hover,
	{$rule}h4 a:hover,
	{$rule}h5 a:hover,
	{$rule}h6 a:hover,
	{$rule}.cmsmasters_items_sort_block .cmsmasters_items_sort_but:hover, 
	{$rule}.cmsmasters_tabs.lpr .cmsmasters_tabs_wrap ul > li .cmsmasters_lpr_tabs_cont a:hover, 
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_category > li > ul li a:hover,
	{$rule}.cmsmasters_toggle_title > a:hover,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > a:hover,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > ul > li > a:hover,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > ul > li > ul li a:hover,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_category > li > a:hover,
	{$rule}.post_nav > span a:hover, 
	{$rule}.widget.widget_recent_entries ul li a:hover, 
	{$rule}.widget_recent_comments .recentcomments a:hover, 
	{$rule}.cmsmasters_tabs.lpr .cmsmasters_tabs_wrap .tab_comments a:hover, 
	{$rule}.cmsmasters_img_rollover > a:hover, 
	{$rule}.widget_custom_contact_info_entries a:hover, 
	{$rule}.widget_nav_menu > div > ul li a:hover, 
	{$rule}.widget .current_page_item a, 
	{$rule}#wp-calendar tfoot a:hover,
	{$rule}.cmsmasters_twitter_item_content a:hover,
	{$rule}.widget_custom_twitter_entries .tweet_list li a:hover, 
	{$rule}.cmsmasters_items_filter_block .cmsmasters_items_filter_but:hover, 
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_archive > li > a:hover, 
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_archive > li > ul li a:hover, 
	{$rule}.footer_inner .social_wrap .social_wrap_inner a:hover, 
	{$rule}a.cmsmasters_cat_color:hover,
	{$rule}.subpage_nav > span {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_hover']) . "
	}
	
	{$rule}.notice_close:hover {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_hover']) . "
	}
	
	/* Finish Highlight Color */
	
	
	/* Start Headings Color */
	" . (($scheme == 'default') ? ".headline_outer," : '') . "
	" . (($scheme == 'default') ? ".headline_outer a:hover," : '') . "
	{$rule}h1,
	{$rule}h2,
	{$rule}h3,
	{$rule}h4,
	{$rule}h5,
	{$rule}h6,
	{$rule}h1 a,
	{$rule}h2 a,
	{$rule}h3 a,
	{$rule}h4 a,
	{$rule}h5 a,
	{$rule}h6 a,
	{$rule}fieldset legend,
	{$rule}blockquote footer,
	{$rule}table caption,
	{$rule}.cmsmasters_stats.stats_mode_bars.stats_type_horizontal .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner,
	{$rule}.cmsmasters_stats.stats_mode_bars.stats_type_vertical .cmsmasters_stat_wrap .cmsmasters_stat_title,
	{$rule}.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_counter_wrap,
	{$rule}.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_title,
	{$rule}#wp-calendar caption,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > a,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > ul > li > ul li a,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > ul > li > a,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > ul > li > ul li a:before,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_category > li > a,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_category > li > ul li a:before,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_archive > li a:before, 
	{$rule}.search_bar_wrap .search_button, 
	{$rule}.cmsmasters_wrap_pagination ul li .page-numbers, 
	{$rule}.cmsmasters_items_sort_block .cmsmasters_items_sort_but, 
	{$rule}.cmsmasters_items_filter_block .cmsmasters_items_filter_but, 
	{$rule}.cmsmasters_items_filter_list li.current a,
	{$rule}.cmsmasters_items_filter_list li a:hover,
	{$rule}.post_comments .cmsmasters_comment_item_cont_info > a:hover, 
	{$rule}.post_nav > span a, 
	{$rule}.cmsmasters_contact_form, 
	{$rule}label, 
	{$rule}.cmsmasters_img_rollover > a, 
	{$rule}.cmsmasters_post_author_info a:hover, 
	{$rule}.cmsmasters_slider_post_author a:hover, 
	{$rule}.cmsmasters_project_footer > span > a.active, 
	{$rule}.cmsmasters_project_footer > span > a:hover, 
	{$rule}.cmsmasters_slider_post_meta_info span > a.active,
	{$rule}.cmsmasters_slider_post_meta_info span > a:hover,
	{$rule}.cmsmasters_slider_project_footer span > a:hover,
	{$rule}.cmsmasters_slider_project_footer span > a.active,
	{$rule}.cmsmasters_post_meta_info span > a.active,
	{$rule}.cmsmasters_post_meta_info span > a:hover,
	{$rule}.cmsmasters_post_cont_info > a:hover, 
	{$rule}.cmsmasters_post_user_name > a:hover, 
	{$rule}.cmsmasters_post_tags > a, 
	{$rule}.cmsmasters_post_category > a:hover, 
	{$rule}.cmsmasters_project_category > a:hover, 
	{$rule}.cmsmasters_slider_post_category > a:hover, 
	{$rule}.cmsmasters_slider_project_category > a:hover, 
	{$rule}table tfoot th, 
	{$rule}table tfoot td, 
	{$rule}.cmsmasters_tabs .cmsmasters_tabs_list .cmsmasters_tabs_list_item > a, 
	{$rule}.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat_title, 
	{$rule}.color_2,
	{$rule}.cmsmasters_tabs.lpr .cmsmasters_tabs_wrap ul > li .cmsmasters_lpr_tabs_cont a,
	{$rule}.cmsmasters_likes a.active,
	{$rule}.project_details_item .project_details_item_title,
	{$rule}.profile_details_item .profile_details_item_title,
	{$rule}.project_details_item .project_details_item_desc a:hover,
	{$rule}.profile_details_item .profile_details_item_desc a:hover,
	{$rule}.project_features_item .project_features_item_title,
	{$rule}.profile_features_item .profile_features_item_title,
	{$rule}.project_features_item .project_features_item_desc a:hover,
	{$rule}.profile_features_item .profile_features_item_desc a:hover,
	{$rule}.cmsmasters_toggle_title > a,
	{$rule}.widget ul li a:hover,
	{$rule}.widget .current-cat a,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_archive > li,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_archive > li > a,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_archive > li > ul li a,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_category > li > ul li a,
	{$rule}.cmsmasters_archive_item_user_name a:hover,
	{$rule}.cmsmasters_archive_item_date_wrap abbr a:hover,
	{$rule}.cmsmasters_archive_item_category a:hover,
	{$rule}.widget_recent_entries ul li a, 
	{$rule}.widget_custom_contact_info_entries span, 
	{$rule}.widget_custom_contact_info_entries div:before, 
	{$rule}.widget_custom_contact_info_entries a, 
	{$rule}.widget_nav_menu > div > ul li a, 
	{$rule}#wp-calendar tfoot a, 
	{$rule}.widget_recent_comments .recentcomments a, 
	{$rule}.cmsmasters_tabs.lpr .cmsmasters_tabs_wrap .tab_comments a, 
	{$rule}.widget_custom_twitter_entries .tweet_list, 
	{$rule}button:before,
	{$rule}.cmsmasters_twitter_item_content,
	{$rule}.cmsmasters_twitter_item_content a,
	{$rule}.widget_custom_twitter_entries .tweet_list li a, 
	{$rule}.cmsmasters_twitter_wrap .published,
	{$rule}.cmsmasters_twitter_wrap .twr_icon,
	{$rule}.share_posts a:hover {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_heading']) . "
	}
	
	{$rule}.cmsmasters_icon_list_items .cmsmasters_icon_list_item .cmsmasters_icon_list_icon,
	{$rule}.cmsmasters_post_tags > a:hover, 
	{$rule}form .formError .formErrorContent {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_heading']) . "
	}
	/* Finish Headings Color */
	
	
	/* Start Main Background Color */
	{$rule}mark,
	{$rule}form .formError .formErrorContent,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_left_top:before,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_left:before,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_top:before,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_border .cmsmasters_icon_list_item .cmsmasters_icon_list_icon:before,
	{$rule}.cmsmasters_wrap_pagination ul li .page-numbers.next:hover,
	{$rule}.cmsmasters_wrap_pagination ul li .page-numbers.prev:hover,
	{$rule}.button:hover, 
	{$rule}input[type=submit]:hover, 
	{$rule}input[type=button]:hover, 
	{$rule}button:hover,
	{$rule}.cmsmasters_button:hover,
	{$rule}#slide_top:hover:before,
	{$rule}.cmsmasters_post_tags > a:hover, 
	{$rule}.notice_close:hover,
	{$rule}.notice_close,
	{$rule}.cmsmasters_stats.stats_mode_bars.stats_type_vertical .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner:before,
	{$rule}table thead th,
	{$rule}table thead td,
	{$rule}.cmsmasters_prev_arrow:hover,
	{$rule}.cmsmasters_next_arrow:hover,
	{$rule}#wp-calendar tbody tr td#today,
	{$rule}.cmsmasters_next_post > a:hover + .cmsmasters_next_arrow,
	{$rule}.cmsmasters_prev_post > a:hover + .cmsmasters_prev_arrow {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}#wp-calendar thead th,
	" . (($scheme == 'default') ? "body," : '') . "
	" . (($scheme == 'default') ? ".headline_outer," : '') . "
	" . (($scheme != 'default') ? ".cmsmasters_color_scheme_{$scheme}," : '') . "
	" . (($scheme == 'default') ? ".middle_inner," : '') . "
	{$rule}.bottom_bg, 
	{$rule}select,
	{$rule}option, 
	{$rule}.cmsmasters_twitter_wrap, 
	{$rule}#slide_top,
	{$rule}.post.cmsmasters_timeline_type .cmsmasters_post_info,
	{$rule}.cmsmasters_items_filter_list li a,
	{$rule}.cmsmasters_items_sort_block .cmsmasters_items_sort_but,
	{$rule}.cmsmasters_items_sort_block .cmsmasters_items_sort_but:hover,
	{$rule}.cmsmasters_prev_arrow,
	{$rule}.cmsmasters_next_arrow,
	{$rule}.cmsmasters_toggle_wrap.current_toggle .cmsmasters_toggle_plus .cmsmasters_toggle_plus_hor, 
	{$rule}.cmsmasters_toggle_wrap:hover .cmsmasters_toggle_plus .cmsmasters_toggle_plus_hor, 
	{$rule}.cmsmasters_toggle_wrap:hover .cmsmasters_toggle_plus .cmsmasters_toggle_plus_vert, 
	{$rule}.cmsmasters_owl_slider .owl-pagination .owl-page,
	{$rule}.cmsmasters_img_rollover_wrap .cmsmasters_img_rollover {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_bg']) . "
	}
	
	
	.cmsmasters_items_filter_block .cmsmasters_items_filter_but,
	.cmsmasters_items_filter_block .cmsmasters_items_filter_but:hover,
	input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	.cmsmasters_img_rollover > a, 
	textarea {
		background:transparent;
	}
	/* Finish Main Background Color */
	
	
	/* Start Alternate Background Color */
	{$rule}.cmsmasters_dropcap.type2,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_icon .cmsmasters_icon_list_icon_wrap {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_alternate']) . "
	}
	
	
	{$rule}fieldset,
	{$rule}fieldset legend,
	{$rule}.cmsmasters_featured_block,
	{$rule}.cmsmasters_price_wrap,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_top,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_left,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_icon .cmsmasters_icon_list_icon,
	{$rule}.gallery-item .gallery-icon,
	{$rule}.gallery-item .gallery-caption,
	{$rule}.cmsmasters_img.with_caption {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_alternate']) . "
	}
	/* Finish Alternate Background Color */
	
	
	/* Start Borders Color */
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li:before,
	{$rule}.blog.timeline:before,
	{$rule}.cmsmasters_quotes_grid:before,
	{$rule}.cmsmasters_quotes_grid:after,
	{$rule}.cmsmasters_quotes_vert,
	{$rule}.error_page .content_wrap .error_wrapper:before,
	{$rule}.cmsmasters_clients_slider .owl-item:before,
	{$rule}.cmsmasters_quote_cap > span,
	{$rule}.cmsmasters_stats.stats_mode_bars.stats_type_horizontal .cmsmasters_stat_wrap:before,
	{$rule}.post.cmsmasters_timeline_type:before {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_border']) . "
	}
	
	" . (($scheme == 'default') ? ".headline_outer," : '') . "
	{$rule}input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	{$rule}textarea,
	{$rule}select,
	{$rule}option,
	{$rule}hr,
	{$rule}.cmsmasters_post_author_info,
	{$rule}.cmsmasters-form-builder .check_parent input[type=radio] + label:before,
	{$rule}.cmsmasters-form-builder .check_parent input[type=checkbox] + label:before,
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=radio] + span.wpcf7-list-item-label:before,
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=checkbox] + span.wpcf7-list-item-label:before,
	{$rule}.copyright_wrap,
	{$rule}.cmsmasters_divider,
	{$rule}.cmsmasters_widget_divider,
	{$rule}.cmsmasters_img.with_caption,
	{$rule}.cmsmasters_icon_wrap .cmsmasters_simple_icon, 
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_top,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_left,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_icon_list_type_block .cmsmasters_icon_list_item,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_bg .cmsmasters_icon_list_icon:after,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_icon .cmsmasters_icon_list_icon:after, 
	{$rule}.cmsmasters_items_sort_but, 
	{$rule}.about_author_inner, 
	{$rule}.cmsmasters_items_filter_but, 
	{$rule}.post_comments .cmsmasters_comment_item, 
	{$rule}.cmsmasters_wrap_pagination ul li .page-numbers.next, 
	{$rule}.cmsmasters_wrap_pagination ul li .page-numbers.prev,
	{$rule}.blog.opened-article .post,
	{$rule}.cmsmasters_timeline_type .cmsmasters_post_cont_info,
	{$rule}.cmsmasters_prev_arrow,
	{$rule}.cmsmasters_post_cont_info,
	{$rule}.cmsmasters_post_cont_info > span,
	{$rule}.cmsmasters_post_cont_info > a,
	{$rule}.cmsmasters_post_info,
	{$rule}table th,
	{$rule}table td,
	{$rule}.cmsmasters_pricing_item_inner,
	{$rule}.cmsmasters_price_wrap,
	{$rule}.cmsmasters_quotes.cmsmasters_quotes_grid,
	{$rule}.cmsmasters_quotes_list,
	{$rule}.cmsmasters_quote,
	{$rule}.cmsmasters_toggles.toggles_mode_accordion .cmsmasters_toggle_wrap,
	{$rule}.cmsmasters_toggle_plus,
	{$rule}.cmsmasters_project_header,
	{$rule}.cmsmasters_clients_grid,
	{$rule}.cmsmasters_clients_items,
	{$rule}.cmsmasters_clients_item,
	{$rule}.cmsmasters_archive_item_info,
	{$rule}.cmsmasters_archive_item_type,
	{$rule}.cmsmasters_archive_item_date_wrap,
	{$rule}.cmsmasters_archive_item_user_name,
	{$rule}.cmsmasters_profile_header,
	{$rule}.cmsmasters_clients_slider,
	{$rule}.widget_nav_menu > div > ul > li > ul > li > a,
	{$rule}.widget_nav_menu > div > ul li > a,
	{$rule}.sidebar .widget,
	{$rule}.footer_bg,
	{$rule}.post_nav,
	{$rule}.cmsmasters_profile.vertical .profile, 
	{$rule}.cmsmasters_post_meta_info,
	{$rule}#wp-calendar caption,
	{$rule}.widget_custom_twitter_entries .tweet_list > li,
	{$rule}.cmsmasters_twitter_wrap,
	{$rule}.cmsmasters_sidebar .widget,
	{$rule}.cmsmasters_items_filter_wrap a.button:hover,
	{$rule}.portfolio.opened-article .project .project_sidebar > div,
	{$rule}.profiles.opened-article .profile .profile_sidebar > div,
	{$rule}.portfolio.opened-article .project,
	{$rule}.profiles.opened-article .profile,
	{$rule}#page.cmsmasters_boxed,
	{$rule}.cmsmasters_tabs .cmsmasters_tabs_list .cmsmasters_tabs_list_item,
	{$rule}.cmsmasters_profile.horizontal .pl_content,
	{$rule}.cmsmasters_next_arrow {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_border']) . "
	}
	/* Finish Borders Color */
	
	
	/* Start Secondary Color */
	{$rule}.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner, 
	{$rule}#wp-calendar tbody tr td#today, 
	{$rule}.owl-pagination .owl-page.active, 
	{$rule}.owl-pagination .owl-page:hover {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_secondary_color']) . "
	}
	
	{$rule}.pl_social_list a:hover,
	{$rule}blockquote:before,
	{$rule}.header_mid .social_wrap a:hover,
	{$rule}.profile_social_icons_list a,
	{$rule}.footer_inner .social_wrap .social_wrap_inner a {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_secondary_color']) . "
	}	
	
	{$rule}.cmsmasters_owl_slider .owl-pagination .owl-page:hover, 
	{$rule}.cmsmasters_owl_slider .owl-pagination .owl-page.active, 
	{$rule}textarea:focus, 
	{$rule}.tag-sticky-2 .cmsmasters_post_cont_info, 
	{$rule}.tag-sticky-2 .cmsmasters_post_cont_info > span, 
	{$rule}.tag-sticky-2 .cmsmasters_post_author_info, 
	{$rule}.cmsmasters_owl_slider .owl-pagination .owl-page, 
	{$rule}input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]):focus {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_secondary_color']) . "
	} 
	/* Finish Secondary Color */
	
	/* Start Custom Rules */
	{$rule}::selection {
		" . cmsmasters_color_css('background', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_bg']) . ";
	}
	
	{$rule}::-moz-selection {
		" . cmsmasters_color_css('background', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_bg']) . "
	}
	";
	
	
	$custom_css .= "
	/* Finish Custom Rules */

/***************** Finish {$title} Color Scheme Rules ******************/


/***************** Start {$title} Button Color Scheme Rules ******************/
	
	{$rule}.cmsmasters_button.cmsmasters_but_bg_hover {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_bg_hover:hover, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_bg_hover {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_bg']) . "
	}
	
	
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_left, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_right, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_top, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_bottom, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_vert, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_hor, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_diag {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_left:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_right:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_top:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_bottom:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_vert:hover, 
	{$rule}.cmsmasters_button.cm.sms_but_bg_expand_hor:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_diag:hover, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_bg_slide_left, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_bg_slide_right, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_bg_slide_top, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_bg_slide_bottom, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_bg_expand_vert, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_bg_expand_hor, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_bg_expand_diag {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_left:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_right:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_top:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_bottom:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_vert:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_hor:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_diag:after {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
	}
	
	
	{$rule}.cmsmasters_button.cmsmasters_but_shadow {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_shadow:hover, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_shadow {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_bg']) . "
	}
	
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_dark_bg, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_light_bg, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_divider {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_dark_bg:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_light_bg:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_divider:hover, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_dark_bg, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_light_bg, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_divider {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_divider:after {
		" . cmsmasters_color_css('border-right-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse:before {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse:after {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse:hover, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_inverse {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse:hover:before, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_inverse:before {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse:hover:after, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_inverse:after {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
	}
	
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_slide_left, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_slide_right {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_slide_left:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_slide_right:hover, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_slide_left, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_slide_right {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_bg']) . "
	}
	
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_left, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_right, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_top, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_bottom {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_left:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_right:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_top:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_bottom:hover, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_hover_slide_left, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_hover_slide_right, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_hover_slide_top, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_hover_slide_bottom {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_bg']) . "
	}

/***************** Finish {$title} Button Color Scheme Rules ******************/


";
	}
	
	
	return apply_filters('psychology_help_theme_colors_primary_filter', $custom_css);
}

