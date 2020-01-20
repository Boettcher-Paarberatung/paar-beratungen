<?php
/**
 * @package 	WordPress
 * @subpackage 	Psychology Help
 * @version 	1.1.2
 * 
 * Theme Fonts Rules
 * Created by CMSMasters
 * 
 */


function psychology_help_theme_fonts() {
	$cmsmasters_option = psychology_help_get_global_options();
	
	
	$custom_css = "/**
 * @package 	WordPress
 * @subpackage 	Psychology Help
 * @version 	1.1.2
 * 
 * Theme Fonts Rules
 * Created by CMSMasters
 * 
 */


/***************** Start Theme Font Styles ******************/

	/* Start Content Font */
	body,
	.copyright,
	.widget_custom_twitter_entries .tweet_list > li .tweet_text, 
	.cmsmasters_twitter_item_content,
	.widget_custom_contact_info_entries,
	.header_top_inner .meta_wrap {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_content_font_google_font']) . $cmsmasters_option['psychology-help' . '_content_font_system_font'] . ";
		font-size:" . $cmsmasters_option['psychology-help' . '_content_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['psychology-help' . '_content_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['psychology-help' . '_content_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_content_font_font_style'] . ";
	}
	
	.widget_custom_contact_info_entries span {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_content_font_font_size'] - 2) . "px;
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_content_font_line_height'] - 5) . "px;
	}
	
	.cmsmasters_twitter_item_content, 
	.widget_custom_twitter_entries .tweet_list > li .tweet_text {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_content_font_font_size'] + 1) . "px;
	}
	
	.header_top_inner .meta_wrap,
	.header_top_inner .meta_wrap a {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_content_font_font_size'] - 2) . "px;
		font-weight:" . $cmsmasters_option['psychology-help' . '_nav_dropdown_font_font_weight'] . ";
	}
	
	.cmsmasters_quote_subtitle_wrap > h6,
	.cmsmasters_quote_site a,
	.cmsmasters_quote_site {
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_content_font_line_height'] - 3) . "px;
	}
	
	.cmsmasters_items_filter_wrap .cmsmasters_items_sort_block .cmsmasters_items_sort_but,
	table tfoot td,
	table tfoot th,
	.cmsmasters_items_filter_wrap .cmsmasters_items_filter_block .cmsmasters_items_filter_but {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_content_font_font_size'] + 2) . "px;
	}
	
	table thead th {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_content_font_font_size'] + 4) . "px;
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_content_font_line_height'] + 4) . "px;
	}
	
	/* Finish Content Font */


	/* Start Link Font */
	a,
	.subpage_nav > strong,
	.subpage_nav > span,
	.subpage_nav > a {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_link_font_google_font']) . $cmsmasters_option['psychology-help' . '_link_font_system_font'] . ";
		font-size:" . $cmsmasters_option['psychology-help' . '_link_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['psychology-help' . '_link_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['psychology-help' . '_link_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_link_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['psychology-help' . '_link_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['psychology-help' . '_link_font_text_decoration'] . ";
	}
	
	.cmsmasters_wrap_pagination ul li .page-numbers {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_link_font_font_size'] + 2) . "px;
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_link_font_line_height'] + 2) . "px;
	}
	
	.header_top_inner nav > div > ul > li ul li > a {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_link_font_font_size'] - 3) . "px;
		font-weight:" . $cmsmasters_option['psychology-help' . '_nav_dropdown_font_font_weight'] . ";
	}
	
	.header_top .top_line_nav > li > a {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_link_font_font_size'] - 1) . "px;
	}
	
	a:hover {
		text-decoration:" . $cmsmasters_option['psychology-help' . '_link_hover_decoration'] . ";
	}
	
	.share_posts a {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_link_font_font_size'] - 1) . "px;
	}
	
	.cmsmasters_items_sort_but, 
	.cmsmasters_items_filter_but {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_link_font_font_size'] + 2) . "px;
		font-weight:" . $cmsmasters_option['psychology-help' . '_h6_font_font_weight'] . ";
	}
	
		
	@media only screen and (max-width: 1024px) {
		.header_top .top_nav_wrap .top_line_nav > li > a,
		.header_top .top_line_nav li a {
			font-size:" . ((int) $cmsmasters_option['psychology-help' . '_link_font_font_size'] - 3) . "px;
			font-weight:" . $cmsmasters_option['psychology-help' . '_nav_dropdown_font_font_weight'] . ";
		}
	}
	/* Finish Link Font */


	/* Start Navigation Title Font */
	#navigation > li > a,
	#footer_nav > li > a {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_nav_title_font_google_font']) . $cmsmasters_option['psychology-help' . '_nav_title_font_system_font'] . ";
		font-size:" . $cmsmasters_option['psychology-help' . '_nav_title_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['psychology-help' . '_nav_title_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['psychology-help' . '_nav_title_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_nav_title_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['psychology-help' . '_nav_title_font_text_transform'] . ";
	}
	
	#navigation > li > a > span:before {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_nav_title_font_font_size'] + 3) . "px;
	}
	
	#navigation > li.menu-item-icon > a > span > span.nav_subtitle,
	#navigation > li.menu-item-mega > div.menu-item-mega-container > ul > li.menu-item-icon > a > span > span.nav_subtitle {
		padding-left:" . ceil(((int) $cmsmasters_option['psychology-help' . '_nav_title_font_font_size'] + 3) * 1.4) . "px;
	}
	
	body.rtl #navigation > li.menu-item-icon > a > span > span.nav_subtitle,
	body.rtl #navigation > li.menu-item-mega > div.menu-item-mega-container > ul > li.menu-item-icon > a > span > span.nav_subtitle {
		padding-right:" . ceil(((int) $cmsmasters_option['psychology-help' . '_nav_title_font_font_size'] + 3) * 1.4) . "px;
		padding-left:0; /* static */
	}
	
	#navigation > li > a[data-tag]:before,
	#navigation > li.menu-item-mega > div.menu-item-mega-container > ul > li > a[data-tag]:before {
		margin-top:" . round(((int) $cmsmasters_option['psychology-help' . '_nav_title_font_line_height'] - ((int) $cmsmasters_option['psychology-help' . '_nav_dropdown_font_line_height'] - 2)) / 2) . "px;
	}
	
	#navigation > li.menu-item-mega > div.menu-item-mega-container > ul > li > a {
		font-weight:" . $cmsmasters_option['psychology-help' . '_nav_title_font_font_weight'] . ";
	}
	
	@media only screen and (max-width: 1024px) {
		html #page #header nav #navigation li a {
			font-size:" . ((int) $cmsmasters_option['psychology-help' . '_nav_title_font_font_size'] - 2) . "px;
			font-weight:" . $cmsmasters_option['psychology-help' . '_nav_dropdown_font_font_weight'] . ";
		}
		
		html #page #header nav #navigation > li > a {
			font-size:" . ((int) $cmsmasters_option['psychology-help' . '_nav_title_font_font_size'] - 2) . "px;
			font-weight:400; /* static */
		}
		
		html #page #header nav #navigation > li.menu-item-icon > a > span > span.nav_subtitle,
		html #page #header nav #navigation > li.menu-item-mega > div.menu-item-mega-container > ul > li.menu-item-icon > a > span > span.nav_subtitle {
			padding-left:" . ceil(((int) $cmsmasters_option['psychology-help' . '_nav_title_font_font_size'] + 3) * 1.4) . "px;
		}
	}
	/* Finish Navigation Title Font */


	/* Start Navigation Dropdown Font */
	#navigation ul li a{
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_nav_dropdown_font_google_font']) . $cmsmasters_option['psychology-help' . '_nav_dropdown_font_system_font'] . ";
		font-size:" . $cmsmasters_option['psychology-help' . '_nav_dropdown_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['psychology-help' . '_nav_dropdown_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['psychology-help' . '_nav_dropdown_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_nav_dropdown_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['psychology-help' . '_nav_dropdown_font_text_transform'] . ";
	}
	
	.cmsmasters-form-builder .check_parent label,
	.wpcf7-list-item-label {
		font-weight:" . $cmsmasters_option['psychology-help' . '_nav_dropdown_font_font_weight'] . ";
	}
	
	#navigation li > a[data-tag]:before {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_nav_dropdown_font_google_font']) . $cmsmasters_option['psychology-help' . '_nav_dropdown_font_system_font'] . ";
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_nav_dropdown_font_font_size'] - 1) . "px;
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_nav_dropdown_font_line_height'] - 1) . "px;
		font-style:" . $cmsmasters_option['psychology-help' . '_nav_dropdown_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['psychology-help' . '_nav_dropdown_font_text_transform'] . ";
		font-weight:400; /* static */
	}
	
	#navigation ul li a span:before {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_nav_dropdown_font_font_size'] + 3) . "px;
	}
	
	#navigation > li.menu-item-mega > div.menu-item-mega-container > ul > li > a > span:before {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_nav_dropdown_font_font_size'] + 4) . "px;
	}
	
	@media only screen and (max-width: 1024px) {
		html #page #header nav #navigation > li.menu-item-hide-text > a > span > span.nav_subtitle,
		html #page #header nav #navigation > li.menu-item-mega > div.menu-item-mega-container > ul > li.menu-item-hide-text > a > span > span.nav_subtitle {
			font-size:" . ((int) $cmsmasters_option['psychology-help' . '_nav_dropdown_font_font_size'] - 2) . "px;
			line-height:" . ((int) $cmsmasters_option['psychology-help' . '_nav_dropdown_font_line_height'] - 2) . "px;
		}
		
		html #page #header nav #navigation li li li a {
			font-size:" . $cmsmasters_option['psychology-help' . '_nav_dropdown_font_font_size'] . "px;
		}
		
		#navigation ul li a {
			line-height:" . ((int) $cmsmasters_option['psychology-help' . '_nav_dropdown_font_line_height'] - 26) . "px;
		}
	}
	/* Finish Navigation Dropdown Font */


	/* Start H1 Font */
	h1,
	h1 a,
	#header .logo .title {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_h1_font_google_font']) . $cmsmasters_option['psychology-help' . '_h1_font_system_font'] . ";
		font-size:" . $cmsmasters_option['psychology-help' . '_h1_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['psychology-help' . '_h1_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['psychology-help' . '_h1_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_h1_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['psychology-help' . '_h1_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['psychology-help' . '_h1_font_text_decoration'] . ";
	}
	
	.error_title {
		font-size:200px;
		line-height:200px;
	}
	
	.cmsmasters_dropcap {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_h1_font_google_font']) . $cmsmasters_option['psychology-help' . '_h1_font_system_font'] . ";
		font-weight:" . $cmsmasters_option['psychology-help' . '_h1_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_h1_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['psychology-help' . '_h1_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['psychology-help' . '_h1_font_text_decoration'] . ";
	}
	
	.cmsmasters_icon_list_items.cmsmasters_icon_list_icon_type_number .cmsmasters_icon_list_item .cmsmasters_icon_list_icon:before,
	.cmsmasters_icon_box.box_icon_type_number:before,
	.cmsmasters_icon_box.cmsmasters_icon_heading_left.box_icon_type_number .icon_box_heading:before {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_h1_font_google_font']) . $cmsmasters_option['psychology-help' . '_h1_font_system_font'] . ";
		font-weight:" . $cmsmasters_option['psychology-help' . '_h1_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_h1_font_font_style'] . ";
	}
	
	.cmsmasters_dropcap.type1 {
		font-size:36px; /* static */
	}
	
	.cmsmasters_dropcap.type2 {
		font-size:20px; /* static */
	}
	
	.headline_outer .headline_inner .headline_icon:before {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_h1_font_font_size'] + 4) . "px;
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_h1_font_line_height'] + 10) . "px;
	}
	
	.headline_outer .headline_inner.align_center .headline_icon:before {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_h1_font_line_height'] + 14) . "px;
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_h1_font_line_height'] + 20) . "px;
	}
	
	.headline_outer .headline_inner.align_left .headline_icon {
		padding-left:" . ((int) $cmsmasters_option['psychology-help' . '_h1_font_line_height'] + 10) . "px;
	}
	
	.headline_outer .headline_inner.align_right .headline_icon {
		padding-right:" . ((int) $cmsmasters_option['psychology-help' . '_h1_font_line_height'] + 10) . "px;
	}
	
	.headline_outer .headline_inner.align_center .headline_icon {
		padding-top:" . ((int) $cmsmasters_option['psychology-help' . '_h1_font_line_height'] + 30) . "px;
	}
	/* Finish H1 Font */


	/* Start H2 Font */
	h2,
	h2 a,
	.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_counter_wrap, 
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > a, 
	.comment-respond .comment-reply-title {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_h2_font_google_font']) . $cmsmasters_option['psychology-help' . '_h2_font_system_font'] . ";
		font-size:" . $cmsmasters_option['psychology-help' . '_h2_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['psychology-help' . '_h2_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['psychology-help' . '_h2_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_h2_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['psychology-help' . '_h2_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['psychology-help' . '_h2_font_text_decoration'] . ";
	}
	
	.cmsmasters_stats.stats_mode_bars.stats_type_vertical .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner:before {
		font-size:" . $cmsmasters_option['psychology-help' . '_h2_font_font_size'] . "px;
	}
	
	.cmsmasters_stats.stats_mode_bars.stats_type_vertical .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner:before {
		line-height:" . $cmsmasters_option['psychology-help' . '_h2_font_line_height'] . "px;
	}
	
	.cmsmasters_price,
	.cmsmasters_currency {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_h2_font_font_size'] + 2) . "px;
	}
	
	.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_counter_wrap, 
	.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner:before {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_h2_font_font_size'] + 14) . "px;
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_h2_font_line_height'] + 14) . "px;
	}
	
	.cmsmasters_counters.counters_type_horizontal .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_counter_wrap {
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_h2_font_line_height'] + 8) . "px;
	}
	
	.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_counter_wrap {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_small_font_google_font']) . $cmsmasters_option['psychology-help' . '_small_font_system_font'] . ";
		font-weight:400; /* static */
	}
	
	.cmsmasters_counters.counters_type_horizontal .cmsmasters_counter_wrap .cmsmasters_counter.counter_has_icon .cmsmasters_counter_inner {
		padding-" . ((is_rtl()) ? 'right' : 'left') . ":" . ((int) $cmsmasters_option['psychology-help' . '_h2_font_line_height'] + 14) . "px;
	}
	/* Finish H2 Font */


	/* Start H3 Font */
	h3,
	h3 a, 
	#bottom .widgettitle {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_h3_font_google_font']) . $cmsmasters_option['psychology-help' . '_h3_font_system_font'] . ";
		font-size:" . $cmsmasters_option['psychology-help' . '_h3_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['psychology-help' . '_h3_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['psychology-help' . '_h3_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_h3_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['psychology-help' . '_h3_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['psychology-help' . '_h3_font_text_decoration'] . ";
	}
	
	.cmsmasters_timeline_type .cmsmasters_post_header h3 a{
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_h3_font_font_size'] + 2) . "px;
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_h3_font_line_height'] + 2) . "px;
	}
	
	.bypostauthor > .comment-body .alignleft:before {
		font-size:" . $cmsmasters_option['psychology-help' . '_h3_font_font_size'] . "px;
	}
	
	.bypostauthor > .comment-body .alignleft:before {
		line-height:" . $cmsmasters_option['psychology-help' . '_h3_font_line_height'] . "px;
	}
	
	.bypostauthor > .comment-body .alignleft:before {
		width:" . $cmsmasters_option['psychology-help' . '_h3_font_line_height'] . "px;
	}
	
	.bypostauthor > .comment-body .alignleft:before {
		height:" . $cmsmasters_option['psychology-help' . '_h3_font_line_height'] . "px;
	}
	/* Finish H3 Font */


	/* Start H4 Font */
	h4, 
	h4 a, 
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > ul > li > a, 
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap_category > li > a, 
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap_archive > li > a, 
	.post_nav > span a {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_h4_font_google_font']) . $cmsmasters_option['psychology-help' . '_h4_font_system_font'] . ";
		font-size:" . $cmsmasters_option['psychology-help' . '_h4_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['psychology-help' . '_h4_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['psychology-help' . '_h4_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_h4_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['psychology-help' . '_h4_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['psychology-help' . '_h4_font_text_decoration'] . ";
	}
	
	.about_author .about_author_cont_title, 
	.about_author .about_author_cont_title a, 
	.post_comments .cmsmasters_comment_item_title, 
	.post_comments .cmsmasters_comment_item_title a {
		text-transform:none;
	}
	/* Finish H4 Font */


	/* Start H5 Font */
	h5,
	h5 a, 
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > ul > li > ul li a, 
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap_archive > li > ul li a,
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap_category > li > ul li a,
	.cmsmasters_tabs .cmsmasters_tabs_list .cmsmasters_tabs_list_item > a,
	.cmsmasters_toggle_title > a,
	.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat_title,
	.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_title {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_h5_font_google_font']) . $cmsmasters_option['psychology-help' . '_h5_font_system_font'] . ";
		font-size:" . $cmsmasters_option['psychology-help' . '_h5_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['psychology-help' . '_h5_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['psychology-help' . '_h5_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_h5_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['psychology-help' . '_h5_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['psychology-help' . '_h5_font_text_decoration'] . ";
	}
	
	.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_title {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_h5_font_font_size'] + 2) . "px;
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_h5_font_line_height'] + 8) . "px;
	}
	
	/* Finish H5 Font */


	/* Start H6 Font */
	h6,
	.cmsmasters_period,
	#wp-calendar caption,
	#wp-calendar th,
	.widget_custom_twitter_entries .tweet_list > li .tweet_time, 
	.cmsmasters_tabs.lpr .cmsmasters_tabs_list .cmsmasters_tabs_list_item > a,
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap_archive > li,
	.cmsmasters_stats .cmsmasters_stat_wrap .cmsmasters_stat_title, 
	.project_details_item .project_details_item_title,
	.profile_details_item .profile_details_item_title,
	.widget_custom_posts_tabs_entries .cmsmasters_lpr_tabs_cont > a,
	.project_features_item .project_features_item_title,
	.profile_features_item .profile_features_item_title,
	.cmsmasters_tabs.lpr .cmsmasters_tabs_wrap .tab_comments a, 
	.widget_recent_comments .recentcomments a,
	.widget_nav_menu > div > ul li a, 
	.widget.widget_recent_entries ul li a,
	h6 a {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_h6_font_google_font']) . $cmsmasters_option['psychology-help' . '_h6_font_system_font'] . ";
		font-size:" . $cmsmasters_option['psychology-help' . '_h6_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['psychology-help' . '_h6_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['psychology-help' . '_h6_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_h6_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['psychology-help' . '_h6_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['psychology-help' . '_h6_font_text_decoration'] . ";
	}
	
	.cmsmasters_stats.stats_mode_bars.stats_type_horizontal .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner:before,
	.project_details_item .project_details_item_desc a,
	.project_details_item .project_details_item_desc,
	.profile_details_item .profile_details_item_desc a,
	.profile_details_item .profile_details_item_des,
	.project_features_item .project_features_item_desc a,
	.project_features_item .project_features_item_desc,
	.profile_features_item .profile_features_item_desc a,
	.profile_features_item .profile_features_item_desc {
		line-height:" . $cmsmasters_option['psychology-help' . '_h6_font_line_height'] . "px;
	}
	
	.cmsmasters_profile.horizontal .pl_subtitle, 
	.widget_custom_twitter_entries .tweet_list > li .tweet_time {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_h6_font_font_size'] - 1) . "px;
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_h6_font_line_height'] - 1) . "px;
	}
	
	.cmsmasters_stats .cmsmasters_stat_container .cmsmasters_stat_counter_wrap, 
	.cmsmasters_stats.stats_mode_bars.stats_type_horizontal .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_counter_wrap,
	.cmsmasters_stats.stats_mode_bars.stats_type_vertical .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_counter_wrap {
		font-size:" . $cmsmasters_option['psychology-help' . '_h6_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['psychology-help' . '_h6_font_line_height'] . "px;
	}
	
	.cmsmasters_stats.stats_mode_bars.stats_type_vertical .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_counter_wrap {
		top:" . - ((int) $cmsmasters_option['psychology-help' . '_h6_font_line_height'] + 10) . "px;
	}
	
	.cmsmasters_stats.stats_mode_bars.stats_type_vertical .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner {
		margin-top:" . ((int) $cmsmasters_option['psychology-help' . '_h6_font_line_height'] + 10) . "px;
	}
	
	.cmsmasters_stats.stats_mode_bars.stats_type_vertical .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner {
		border-bottom-width:" . ((int) $cmsmasters_option['psychology-help' . '_h6_font_line_height'] + 15) . "px;
	}
	
	.cmsmasters_stats .cmsmasters_stat_container {
		height:" . ((int) $cmsmasters_option['psychology-help' . '_h6_font_line_height'] + 300) . "px;
	}
	
	label,
	.cmsmasters_contact_form,
	.cmsmasters_items_filter_wrap .cmsmasters_items_sort_block .cmsmasters_items_sort_but,
	.cmsmasters_items_filter_wrap .cmsmasters_items_filter_block .cmsmasters_items_filter_but,
	.header_top .top_line_nav > li > a,
	table tfoot td,
	table thead th {
		font-weight:" . $cmsmasters_option['psychology-help' . '_h6_font_font_weight'] . ";
	}
	
	/* Finish H6 Font */

	/* Start Button Font */
	.cmsmasters_button,
	.button, 
	.cmsmasters_img_rollover > a,
	.cmsmasters_post_read_more,
	.cmsmasters_slider_post_read_more,
	input[type=submit], 
	input[type=button], 
	.cmsmasters_posts_slider .post .cmsmasters_slider_post_footer .cmsmasters_slider_post_meta_info,
	button {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_button_font_google_font']) . $cmsmasters_option['psychology-help' . '_button_font_system_font'] . ";
		font-size:" . $cmsmasters_option['psychology-help' . '_button_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['psychology-help' . '_button_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['psychology-help' . '_button_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_button_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['psychology-help' . '_button_font_text_transform'] . ";
	}
	
	.cmsmasters_img_rollover > a {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_button_font_font_size'] + 2) . "px;
	}
	
	#header .header_mid .button {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_button_font_font_size'] + 2) . "px;
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_button_font_line_height'] + 10) . "px;
	}
	
	.cmsmasters_twitter_wrap .published {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_button_font_google_font']) . $cmsmasters_option['psychology-help' . '_button_font_system_font'] . ";
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_button_font_font_size'] - 1) . "px;
		font-weight:" . $cmsmasters_option['psychology-help' . '_button_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_button_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['psychology-help' . '_button_font_text_transform'] . ";
	}
	
	.wpcf7 input[type=submit] {
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_button_font_line_height'] - 2) . "px;
	}
	
	.gform_wrapper .gform_footer input.button, 
	.gform_wrapper .gform_footer input[type=submit] {
		font-size:" . $cmsmasters_option['psychology-help' . '_button_font_font_size'] . "px !important;
	}
	
	.post.cmsmasters_masonry_type .cmsmasters_post_footer .cmsmasters_post_footer_info,
	.post.cmsmasters_timeline_type .cmsmasters_post_footer .cmsmasters_post_footer_info .cmsmasters_post_meta_info {
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_button_font_line_height'] + 6) . "px;
	}
	
	.cmsmasters_button.cmsmasters_but_icon_dark_bg, 
	.cmsmasters_button.cmsmasters_but_icon_light_bg, 
	.cmsmasters_button.cmsmasters_but_icon_divider, 
	.cmsmasters_button.cmsmasters_but_icon_inverse {
		padding-left:" . ((int) $cmsmasters_option['psychology-help' . '_button_font_line_height'] + 20) . "px;
	}
	
	.cmsmasters_button.cmsmasters_but_icon_dark_bg:before, 
	.cmsmasters_button.cmsmasters_but_icon_light_bg:before, 
	.cmsmasters_button.cmsmasters_but_icon_divider:before, 
	.cmsmasters_button.cmsmasters_but_icon_inverse:before, 
	.cmsmasters_button.cmsmasters_but_icon_dark_bg:after, 
	.cmsmasters_button.cmsmasters_but_icon_light_bg:after, 
	.cmsmasters_button.cmsmasters_but_icon_divider:after, 
	.cmsmasters_button.cmsmasters_but_icon_inverse:after {
		width:" . $cmsmasters_option['psychology-help' . '_button_font_line_height'] . "px;
	}
	/* Finish Button Font */


	/* Start Small Text Font */
	small,
	tbody,
	#wp-calendar tfoot a,
	#wp-calendar tbody,
	.widget ul li a,
	.cmsmasters_twitter_item_content a,
	.cmsmasters_stats .cmsmasters_stat_subtitle,
	.cmsmasters_slider_post_meta_info a,
	.cmsmasters_slider_post_meta_info .cmsmastersView > span,
	.cmsmasters_slider_project_footer .cmsmastersView > span,
	.cmsmasters_slider_project_footer a,
	.cmsmasters_post_meta_info a,
	.cmsmasters_post_meta_info .cmsmastersView > span,
	.cmsmasters_post_tags a,
	.cmsmasters_post_date abbr,
	.cmsmasters_post_category a,
	.cmsmasters_post_user_name a,
	.cmsmasters_project_cont_info,
	.cmsmasters_project_category a,
	.widget_custom_contact_info_entries span a,
	.cmsmasters_project_footer > span > a,
	.cmsmasters_project_footer > span,
	.cmsmasters_archive_item_type,
	.cmsmasters_archive_item_date_wrap abbr,
	.cmsmasters_archive_item_date_wrap abbr a,
	.cmsmasters_archive_item_user_name a,
	.cmsmasters_archive_item_category a,
	.cmsmasters_archive_item_info > span,
	.cmsmasters_slider_post_date abbr,
	.cmsmasters_slider_post_author a,
	.cmsmasters_post_cont_info,
	.cmsmasters_quotes_slider .cmsmasters_quote_content,
	.cmsmasters_slider_post_category a,
	.cmsmasters_slider_project_category a,
	.cmsmasters_slider_project_cont_info,
	.cmsmasters_counter_subtitle,
	.image-attachment .entry-meta > p,
	.image-attachment .entry-meta > p a,
	.image-attachment .entry-meta > .edit-link a,
	.widget_custom_posts_tabs_entries .cmsmasters_lpr_tabs_cont > abbr,
	.headline_outer, 
	.widget.widget_recent_entries ul li span,
	.cmsmasters_pricing_table .cmsmasters_pricing_item .feature_list li a,
	.cmsmasters_pricing_table .cmsmasters_pricing_item .feature_list li,
	.headline_outer a,
	.about_author_cont > a,
	.cmsmasters_items_filter_wrap .cmsmasters_items_filter_block .cmsmasters_items_filter_list li > a.button,
	#header .header_mid .slogan_wrap_text,
	#navigation > li span.nav_subtitle,
	ul.navigation li a .nav_tag,
	form .formError .formErrorContent {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_small_font_google_font']) . $cmsmasters_option['psychology-help' . '_small_font_system_font'] . ";
		font-size:" . $cmsmasters_option['psychology-help' . '_small_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['psychology-help' . '_small_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['psychology-help' . '_small_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_small_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['psychology-help' . '_small_font_text_transform'] . ";
	}
	
	.cmsmasters_stats .cmsmasters_stat_counter_wrap {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_small_font_google_font']) . $cmsmasters_option['psychology-help' . '_small_font_system_font'] . ";
	}
	
	.project_details_item .project_details_item_desc a,
	.project_details_item .project_details_item_desc,
	.profile_details_item .profile_details_item_desc a,
	.profile_details_item .profile_details_item_desc,
	.project_features_item .project_features_item_desc a,
	.project_features_item .project_features_item_desc,
	.profile_features_item .profile_features_item_desc a,
	.profile_features_item .profile_features_item_desc {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_small_font_font_size'] + 1) . "px;
	}
	
	.error_subtitle,
	.cmsmasters_quote_subtitle_wrap > h6,
	.pl_content .pl_subtitle,
	.cmsmasters_quote_site a,
	.cmsmasters_profile_subtitle,
	.project_details_item .project_details_item_desc,
	.project_details_item .project_details_item_desc a,
	.profile_details_item .profile_details_item_desc,
	.profile_details_item .profile_details_item_desc a,
	.project_features_item .project_features_item_desc,
	.project_features_item .project_features_item_desc a,
	.profile_features_item .profile_features_item_desc,
	.profile_features_item .profile_features_item_desc a,
	.cmsmasters_quote_site {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_small_font_google_font']) . $cmsmasters_option['psychology-help' . '_small_font_system_font'] . ";
		font-weight:" . $cmsmasters_option['psychology-help' . '_small_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_small_font_font_style'] . ";
	}
	
	.error_subtitle {
		font-size:24px;
		line-height:40px;
	}
	
	.cmsmasters_post_tags a {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_small_font_font_size'] - 1) . "px;
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_small_font_line_height'] + 2) . "px;
	}
	
	.cmsmasters_quote_site,
	#wp-calendar tfoot a,
	.cmsmasters_twitter_item_content a,
	.cmsmasters_quote_subtitle_wrap > h6,
	.about_author_cont > a,
	.cmsmasters_quote_site a {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_small_font_font_size'] + 2) . "px;
	}
	
	
	.widget ul li a {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_small_font_font_size'] + 2) . "px;
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_small_font_line_height'] + 2) . "px;
	}
	
	.cmsmasters_price,
	.cmsmasters_coins,
	.cmsmasters_currency {
		font-weight:" . $cmsmasters_option['psychology-help' . '_small_font_font_weight'] . ";
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_small_font_google_font']) . $cmsmasters_option['psychology-help' . '_small_font_system_font'] . ";
	}
	
	.cmsmasters_quotes_slider .cmsmasters_quote_content {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_small_font_font_size'] + 3) . "px;
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_small_font_line_height'] + 12) . "px;
	}
	
	.cmsmasters_coins {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_small_font_font_size'] + 3) . "px;
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_small_font_line_height'] - 2) . "px;
	}
	
	.cmsmasters-form-builder small,
	.image-attachment .entry-meta > p,
	.image-attachment .entry-meta > p a,
	.image-attachment .entry-meta > .edit-link a,
	.cmsmasters_items_filter_wrap .cmsmasters_items_filter_block .cmsmasters_items_filter_list li > a.button,
	tbody {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_small_font_font_size'] + 2) . "px;
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_small_font_line_height'] + 2) . "px;
	}
	
	#header .header_mid .slogan_wrap_text {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_small_font_font_size'] + 9) . "px;
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_small_font_line_height'] + 9) . "px;
	}
	
	ul.navigation li a .nav_tag {
		font-weight:" . $cmsmasters_option['psychology-help' . '_nav_title_font_font_weight'] . ";
	}
	
	.headline_outer, 
	.cmsmasters_counter_subtitle,
	.cmsmasters_timeline_type .cmsmasters_post_meta_info a,
	.cmsmasters_timeline_type .cmsmasters_post_meta_info .cmsmastersView > span,
	.cmsmasters_timeline_type .cmsmasters_post_category a,
	.cmsmasters_timeline_type .cmsmasters_post_user_name a,
	.cmsmasters_default_type .cmsmasters_post_meta_info a,
	.cmsmasters_default_type .cmsmasters_post_meta_info .cmsmastersView > span,
	.cmsmasters_default_type .cmsmasters_post_category a,
	.cmsmasters_default_type .cmsmasters_post_user_name a,
	.cmsmasters_archive_item_type,
	.cmsmasters_archive_item_date_wrap abbr,
	.cmsmasters_archive_item_date_wrap abbr a,
	.cmsmasters_archive_item_user_name a,
	.cmsmasters_archive_item_category a,
	.cmsmasters_archive_item_info > span,
	.cmsmasters_default_type .cmsmasters_post_date abbr,
	.blog.opened-article .cmsmasters_post_meta_info a,
	.blog.opened-article .cmsmasters_post_meta_info .cmsmastersView > span,
	.blog.opened-article .cmsmasters_post_category a,
	.blog.opened-article .cmsmasters_post_user_name a,
	.blog.opened-article .cmsmasters_post_date abbr,
	.cmsmasters_pricing_table .cmsmasters_pricing_item .feature_list li a,
	.cmsmasters_pricing_table .cmsmasters_pricing_item .feature_list li,
	.headline_outer a,
	.cmsmasters_stats .cmsmasters_stat_subtitle,
	.cmsmasters_timeline_type .cmsmasters_day_mon {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_small_font_font_size'] + 1) . "px;
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_small_font_line_height'] + 1) . "px;
	}
	
	.cmsmasters_timeline_type .cmsmasters_year {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_small_font_font_size'] + 5) . "px;
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_small_font_line_height'] + 5) . "px;
	}
	
	#navigation > li span.nav_subtitle {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_small_font_font_size'] + 3) . "px;
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_small_font_line_height'] - 3) . "px;
	}

	#navigation > li.menu-item-mega > div.menu-item-mega-container ul ul li.menu-item-mega-description span.menu-item-mega-description-container {
		font-size:" . $cmsmasters_option['psychology-help' . '_small_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['psychology-help' . '_small_font_line_height'] . "px;
	}
	
	.gform_wrapper .description, 
	.gform_wrapper .gfield_description, 
	.gform_wrapper .gsection_description, 
	.gform_wrapper .instruction {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_small_font_google_font']) . $cmsmasters_option['psychology-help' . '_small_font_system_font'] . " !important;
		font-size:" . $cmsmasters_option['psychology-help' . '_small_font_font_size'] . "px !important;
		line-height:" . $cmsmasters_option['psychology-help' . '_small_font_line_height'] . "px !important;
	}
	/* Finish Small Text Font */


	/* Start Text Fields Font */
	input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	textarea,
	select,
	option {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_input_font_google_font']) . $cmsmasters_option['psychology-help' . '_input_font_system_font'] . ";
		font-size:" . $cmsmasters_option['psychology-help' . '_input_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['psychology-help' . '_input_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['psychology-help' . '_input_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_input_font_font_style'] . ";
	}
	
	.gform_wrapper input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	.gform_wrapper textarea, 
	.gform_wrapper select {
		font-size:" . $cmsmasters_option['psychology-help' . '_input_font_font_size'] . "px !important;
	}
	/* Finish Text Fields Font */


	/* Start Blockquote Font */
	blockquote,
	.notice_content {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_quote_font_google_font']) . $cmsmasters_option['psychology-help' . '_quote_font_system_font'] . ";
		font-size:" . $cmsmasters_option['psychology-help' . '_quote_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['psychology-help' . '_quote_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['psychology-help' . '_quote_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_quote_font_font_style'] . ";
	}
	
	.notice_content {
		font-size:" . ((int)$cmsmasters_option['psychology-help' . '_content_font_font_size'] - 2) . "px;
		line-height:" . ((int)$cmsmasters_option['psychology-help' . '_content_font_line_height'] - 2) . "px;
	}
	
	.post_comments .cmsmasters_comment_item_date,
	.post_comments .cmsmasters_comment_item_cont_info > a, 
	.comment-respond .comment-reply-title a {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_quote_font_google_font']) . $cmsmasters_option['psychology-help' . '_quote_font_system_font'] . ";
		font-weight:" . $cmsmasters_option['psychology-help' . '_quote_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_quote_font_font_style'] . ";
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_content_font_font_size'] - 3) . "px;
		line-height:" . $cmsmasters_option['psychology-help' . '_content_font_line_height'] . "px;
	}
	
	.share_posts a {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_quote_font_google_font']) . $cmsmasters_option['psychology-help' . '_quote_font_system_font'] . ";
		font-weight:" . $cmsmasters_option['psychology-help' . '_quote_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_quote_font_font_style'] . ";
	}
	
	.cmsmasters_wrap_pagination ul li .page-numbers {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_quote_font_google_font']) . $cmsmasters_option['psychology-help' . '_quote_font_system_font'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_quote_font_font_style'] . ";
	}
	
	.cmsmasters_wrap_pagination ul li .page-numbers.next,
	.cmsmasters_wrap_pagination ul li .page-numbers.prev {
		font-size: 8px; /* static */
	}
	
	q {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_quote_font_google_font']) . $cmsmasters_option['psychology-help' . '_quote_font_system_font'] . ";
		font-weight:" . $cmsmasters_option['psychology-help' . '_quote_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_quote_font_font_style'] . ";
	}
	/* Finish Blockquote Font */

/***************** Finish Theme Font Styles ******************/


";


if (CMSMASTERS_DONATIONS) {

	$custom_css .= "
/***************** Start CMSMASTERS Donations Font Styles ******************/

	/* Start Content Font */
	.campaign .cmsmasters_campaign_meta_info {
		height:" . $cmsmasters_option['psychology-help' . '_content_font_line_height'] . "px;
	}
	/* Finish Content Font */
	
	
	/* Start Link Font */
	/* Finish Link Font */
	
	
	/* Start Navigation Title Font */
	#header .header_donation_but .cmsmasters_button, 
	#header .header_top_donation_but {
		font-weight:" . $cmsmasters_option['psychology-help' . '_nav_title_font_font_weight'] . ";
	}
	/* Finish Navigation Title Font */
	
	
	/* Start H1 Font */
	.cmsmasters_featured_campaign .campaign .cmsmasters_campaign_title, 
	.cmsmasters_featured_campaign .campaign .cmsmasters_campaign_title a {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_h1_font_google_font']) . $cmsmasters_option['psychology-help' . '_h1_font_system_font'] . ";
		font-size:" . $cmsmasters_option['psychology-help' . '_h1_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['psychology-help' . '_h1_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['psychology-help' . '_h1_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_h1_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['psychology-help' . '_h1_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['psychology-help' . '_h1_font_text_decoration'] . ";
	}
	
	.donations.opened-article > .donation .cmsmasters_donation_title, 
	.donations.opened-article > .donation .cmsmasters_donation_amount_currency {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_h1_font_google_font']) . $cmsmasters_option['psychology-help' . '_h1_font_system_font'] . ";
		font-weight:" . $cmsmasters_option['psychology-help' . '_h1_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_h1_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['psychology-help' . '_h1_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['psychology-help' . '_h1_font_text_decoration'] . ";
	}
	
	.donations.opened-article > .donation .cmsmasters_donation_title {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_h1_font_font_size'] + 4) . "px;
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_h1_font_line_height'] + 4) . "px;
	}
	
	.donations.opened-article > .donation .cmsmasters_donation_amount_currency {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_h1_font_font_size'] * 2 + 4) . "px;
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_h1_font_line_height'] * 2 + 4) . "px;
	}
	
	@media only screen and (max-width: 540px) {
		.donations.opened-article > .donation .cmsmasters_donation_amount_currency {
			font-size:" . ((int) $cmsmasters_option['psychology-help' . '_h1_font_font_size'] + 4) . "px;
			line-height:" . ((int) $cmsmasters_option['psychology-help' . '_h1_font_line_height'] + 4) . "px;
		}
	}
	/* Finish H1 Font */
	
	
	/* Start H2 Font */
	/* Finish H2 Font */
	
	
	/* Start H3 Font */
	.donations.opened-article > .donation .cmsmasters_donation_campaign, 
	.donations.opened-article > .donation .cmsmasters_donation_campaign a, 
	.cmsmasters_donations .donation .cmsmasters_donation_amount_currency {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_h3_font_google_font']) . $cmsmasters_option['psychology-help' . '_h3_font_system_font'] . ";
		font-size:" . $cmsmasters_option['psychology-help' . '_h3_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['psychology-help' . '_h3_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['psychology-help' . '_h3_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_h3_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['psychology-help' . '_h3_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['psychology-help' . '_h3_font_text_decoration'] . ";
	}
	/* Finish H3 Font */
	
	
	/* Start H4 Font */
	.cmsmasters_featured_campaign .campaign .cmsmasters_campaign_rest_amount {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_h4_font_google_font']) . $cmsmasters_option['psychology-help' . '_h4_font_system_font'] . ";
		font-size:" . $cmsmasters_option['psychology-help' . '_h4_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['psychology-help' . '_h4_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['psychology-help' . '_h4_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_h4_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['psychology-help' . '_h4_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['psychology-help' . '_h4_font_text_decoration'] . ";
	}
	/* Finish H4 Font */
	
	
	/* Start H5 Font */
	.donation_confirm .donation_confirm_info_title, 
	.cmsmasters_donations .donation .cmsmasters_donation_campaign, 
	.cmsmasters_donations .donation .cmsmasters_donation_campaign a, 
	.cmsmasters_donations .donation .cmsmasters_donation_amount_title, 
	.cmsmasters_campaigns .campaign .cmsmasters_stats.stats_mode_bars.stats_type_horizontal .cmsmasters_stat_wrap .cmsmasters_stat_title_wrap {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_h5_font_google_font']) . $cmsmasters_option['psychology-help' . '_h5_font_system_font'] . ";
		font-size:" . $cmsmasters_option['psychology-help' . '_h5_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['psychology-help' . '_h5_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['psychology-help' . '_h5_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_h5_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['psychology-help' . '_h5_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['psychology-help' . '_h5_font_text_decoration'] . ";
	}
	/* Finish H5 Font */
	
	
	/* Start H6 Font */
	.related_posts_tabs_campaign .cmsmasters_stats .cmsmasters_stat_wrap .cmsmasters_stat_title, 
	.related_posts_tabs_campaign .cmsmasters_stats.stats_mode_bars .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_counter_wrap {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_h6_font_google_font']) . $cmsmasters_option['psychology-help' . '_h6_font_system_font'] . ";
		font-size:" . $cmsmasters_option['psychology-help' . '_h6_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['psychology-help' . '_h6_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['psychology-help' . '_h6_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_h6_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['psychology-help' . '_h6_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['psychology-help' . '_h6_font_text_decoration'] . ";
	}
	/* Finish H6 Font */
	
	
	/* Start Button Font */
	#header .header_top_donation_but {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_button_font_google_font']) . $cmsmasters_option['psychology-help' . '_button_font_system_font'] . ";
	}
	
	#header .header_top_donation_but {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_button_font_font_size'] - 2) . "px;
	}
	/* Finish Button Font */
	
	
	/* Start Small Text Font */
	.related_posts_tabs_campaign .cmsmasters_stats .cmsmasters_stat_wrap .cmsmasters_stat_subtitle, 
	.related_posts_tabs_campaign .rel_post_content .related_posts_campaign_wrap .related_posts_campaign_togo {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_small_font_font_size'] + 1) . "px;
	}
	/* Finish Small Text Font */

/***************** Finish CMSMASTERS Donations Font Styles ******************/


";

}


if (CMSMASTERS_WOOCOMMERCE) {

	$custom_css .= "
/***************** Start WooCommerce Font Styles ******************/

	/* Start Content Font */
	/* Finish Content Font */
	
	
	/* Start Link Font */
	/* Finish Link Font */
	
	
	/* Start H1 Font */
	/* Finish H1 Font */
	
	
	/* Start H2 Font */
	/* Finish H2 Font */
	
	
	/* Start H3 Font */
	/* Finish H3 Font */
	
	
	/* Start H4 Font */
	/* Finish H4 Font */
	
	
	/* Start H5 Font */
	/* Finish H5 Font */
	
	
	/* Start H6 Font */	
	/* Finish H6 Font */
	
	
	/* Start Button Font */
	/* Finish Button Font */
	
	
	/* Start Small Text Font */
	/* Finish Small Text Font */

/***************** Finish WooCommerce Font Styles ******************/


";

}


if (CMSMASTERS_EVENTS_CALENDAR) {

	$custom_css .= "
/***************** Start Events Font Styles ******************/

	/* Start Content Font */
	#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td div[id*=tribe-events-event-] .tribe-events-event-body{
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_content_font_google_font']) . $cmsmasters_option['psychology-help' . '_content_font_system_font'] . ";
		font-size:" . $cmsmasters_option['psychology-help' . '_content_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['psychology-help' . '_content_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['psychology-help' . '_content_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_content_font_font_style'] . ";
	}
	
	#tribe-events-content.tribe-events-week-grid .tribe-events-event-body,
	#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td div[id*=tribe-events-event-] .tribe-events-event-body {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_content_font_font_size'] - 1) . "px;
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_content_font_line_height'] - 5) . "px;
	}

	#tribe-events-bar #tribe-bar-views label.button {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_content_font_font_size'] + 2) . "px;
	}
	
	/* Finish Content Font */
	
	
	/* Start Link Font */
	/* Finish Link Font */
	
	
	/* Start H1 Font */
	
	.tribe-countdown-time .tribe-countdown-number, 
	.tribe-countdown-time .tribe-countdown-colon {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_h1_font_google_font']) . $cmsmasters_option['psychology-help' . '_h1_font_system_font'] . ";
		font-size:" . $cmsmasters_option['psychology-help' . '_h1_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['psychology-help' . '_h1_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['psychology-help' . '_h1_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_h1_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['psychology-help' . '_h1_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['psychology-help' . '_h1_font_text_decoration'] . ";
	}
	
	/* Finish H1 Font */
	
	
	/* Start H2 Font */
	.cmsmasters_events_organizer_header_left h1,
	.cmsmasters_events_venue_header_left h1,
	.tribe-events-adv-list-widget .tribe-events-list-widget-content-wrap .entry-title, 
	.tribe-events-adv-list-widget .tribe-events-list-widget-content-wrap .entry-title a, 
	.tribe-events-single-event-title {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_h2_font_google_font']) . $cmsmasters_option['psychology-help' . '_h2_font_system_font'] . ";
		font-size:" . $cmsmasters_option['psychology-help' . '_h2_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['psychology-help' . '_h2_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['psychology-help' . '_h2_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_h2_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['psychology-help' . '_h2_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['psychology-help' . '_h2_font_text_decoration'] . ";
	}
	
	/* Finish H2 Font */
	
	
	/* Start H3 Font */
	
	.tribe-events-single-section-title,
	#tribe-events-content.tribe-events-list .tribe-events-list-separator-month, 
	#tribe-events-content.tribe-events-day .tribe-events-day-time-slot > h5 {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_h3_font_google_font']) . $cmsmasters_option['psychology-help' . '_h3_font_system_font'] . ";
		font-size:" . $cmsmasters_option['psychology-help' . '_h3_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['psychology-help' . '_h3_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['psychology-help' . '_h3_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_h3_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['psychology-help' . '_h3_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['psychology-help' . '_h3_font_text_decoration'] . ";
	}
	
	/* Finish H3 Font */
	
	
	/* Start H4 Font */
	.tribe-this-week-events-widget .type-tribe_events .entry-title,
	.tribe-this-week-events-widget .type-tribe_events .entry-title a,
	.widget.tribe-events-venue-widget .tribe-venue-widget-wrapper .tribe-venue-widget-venue .tribe-venue-widget-venue-name a,
	ul.tribe-related-events > li .tribe-related-event-info .tribe-related-events-title a,
	.tribe-events-week-grid .tribe-grid-content-wrap,
	.tribe-events-week-grid .tribe-grid-content-wrap a,
	#tribe-events-content.tribe-events-month table.tribe-events-calendar thead th {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_h4_font_google_font']) . $cmsmasters_option['psychology-help' . '_h4_font_system_font'] . ";
		font-size:" . $cmsmasters_option['psychology-help' . '_h4_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['psychology-help' . '_h4_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['psychology-help' . '_h4_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_h4_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['psychology-help' . '_h4_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['psychology-help' . '_h4_font_text_decoration'] . ";
	}
	
	/* Finish H4 Font */
	
	
	/* Start H5 Font */
	.tribe-events-tooltip .entry-title {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_h5_font_google_font']) . $cmsmasters_option['psychology-help' . '_h5_font_system_font'] . ";
		font-size:" . $cmsmasters_option['psychology-help' . '_h5_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['psychology-help' . '_h5_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['psychology-help' . '_h5_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_h5_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['psychology-help' . '_h5_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['psychology-help' . '_h5_font_text_decoration'] . ";
	}
	
	/* Finish H5 Font */
	
	
	/* Start H6 Font */
	.tribe-this-week-events-widget .tribe-events-page-title,
	.tribe-this-week-events-widget .this-week-no-events-msg,
	.cmsmasters_widget_event_info_cost .tribe-events-event-cost,
	.tribe-events-adv-list-widget .tribe-events-event-cost,
	.tribe-venue-widget-list .entry-title,
	.tribe-venue-widget-list .entry-title a,
	.tribe-events-list-widget-content-wrap .entry-title,
	.tribe-events-list-widget-content-wrap .entry-title a,
	.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .tribe-mini-calendar-nav div > span,
	#tribe-events-content.tribe-events-single .cmsmasters_single_event_meta .tribe-events-meta-group .cmsmasters_event_meta_info .cmsmasters_event_meta_info_item .cmsmasters_event_meta_info_item_title, 
	#tribe-events-content.tribe-events-single .cmsmasters_single_event_meta .tribe-events-meta-group .cmsmasters_event_meta_info .cmsmasters_event_meta_info_item.cmsmasters_event_tags dt, 
	#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-week-event > div:first-child > .entry-title a,
	.tribe-events-gmap,
	.tribe-events-read-more,
	.tribe-events-ical,
	.tribe-events-viewmore a,
	#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td div[id*=tribe-events-event-], .tribe-events-month-event-title a {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_h6_font_google_font']) . $cmsmasters_option['psychology-help' . '_h6_font_system_font'] . ";
		font-size:" . $cmsmasters_option['psychology-help' . '_h6_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['psychology-help' . '_h6_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['psychology-help' . '_h6_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_h6_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['psychology-help' . '_h6_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['psychology-help' . '_h6_font_text_decoration'] . ";
	}
	
	#tribe-events-bar #tribe-bar-views label.button {
		font-weight:" . $cmsmasters_option['psychology-help' . '_h6_font_font_weight'] . ";
	}
	
	.tribe-events-gmap {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_h6_font_font_size'] - 1) . "px;
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_h6_font_line_height'] - 1) . "px;
	}
	
	.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .tribe-mini-calendar-nav div > span {
		text-transform:uppercase;
	}
	
	/* Finish H6 Font */
	
	
	/* Start Button Font */
	
	#tribe-events-bar .tribe-bar-filters .tribe-bar-filters-inner .tribe-bar-submit input {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_button_font_font_size'] + 2) . "px;
	}
	
	#tribe-events-bar .tribe-bar-filters .tribe-bar-filters-inner .tribe-bar-submit input {
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_button_font_line_height'] - 2) . "px;
	}
	
	/* Finish Button Font */
	
	
	/* Start Small Text Font */
	.tribe-this-week-events-widget .tribe-this-week-widget-header-date,
	.tribe-this-week-events-widget .duration,
	.tribe-this-week-events-widget .tribe-venue a,
	.tribe-events-event-meta .url a,
	.tribe-events-back a,
	.organizer-address span,
	.organizer-address span a,
	.tribe-events-adv-list-widget .tribe-events-list-widget-content-wrap .cmsmasters_widget_event_venue_info_loc span, 
	.tribe-events-adv-list-widget .tribe-events-list-widget-content-wrap .cmsmasters_widget_event_venue_info_loc span a, 
	.widget .vcalendar .cmsmasters_event_date .cmsmasters_event_day,
	.widget .vcalendar .cmsmasters_event_date .cmsmasters_event_month,
	.tribe-venue-widget-wrapper .tribe-events-widget-link a,
	.tribe-events-adv-list-widget .tribe-events-widget-link a,
	.tribe-venue-widget-wrapper .cmsmasters_widget_event_info .cmsmasters_widget_event_info_date,
	.tribe-countdown-time .tribe-countdown-number .tribe-countdown-under,
	.cmsmasters_widget_event_info .duration,
	.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar tbody td > div,
	.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar tbody td > div a,
	#tribe-events-content.tribe-events-single .cmsmasters_single_event_meta .tribe-events-meta-group .cmsmasters_event_meta_info .cmsmasters_event_meta_info_item .cmsmasters_event_meta_info_item_descr,
	#tribe-events-content.tribe-events-single .cmsmasters_single_event_meta .tribe-events-meta-group .cmsmasters_event_meta_info .cmsmasters_event_meta_info_item .cmsmasters_event_meta_info_item_descr a,
	#tribe-events-content.tribe-events-single .cmsmasters_single_event_meta .tribe-events-meta-group .cmsmasters_event_meta_info .cmsmasters_event_meta_info_item .cmsmasters_event_meta_info_item_descr .tribe-address > span,
	#tribe-events-content.tribe-events-single .cmsmasters_single_event_meta .tribe-events-meta-group .cmsmasters_event_meta_info .cmsmasters_event_meta_info_item.cmsmasters_event_tags a,
	.cmsmasters_single_event_header_right .tribe-events-back a,
	.cmsmasters_single_event_header_right .tribe-events-cal-links a,
	#tribe-events-content.tribe-events-photo #tribe-events-photo-events .tribe-events-photo-event .tribe-events-photo-event-wrap .tribe-events-event-details .tribe-events-event-meta .time-details,
	#tribe-events-content.tribe-events-photo #tribe-events-photo-events .tribe-events-photo-event .tribe-events-photo-event-wrap .tribe-events-event-details .tribe-events-event-meta .time-details a,
	.tribe-week-grid-hours div,
	.tribe-events-loop .published,
	.event-is-recurring a,
	.tribe-related-event-info > span,
	#tribe-events-content.tribe-events-single .tribe-related-event-info .recurringinfo .event-is-recurring,
	#tribe-events-content.tribe-events-single .tribe-related-event-info .recurringinfo .event-is-recurring a,
	.tribe-events-schedule,
	.tribe-events-event-cost,
	.tribe-events-schedule .tribe-address,
	.tribe-events-venue-details .author a,
	.tribe-events-event-meta .tribe-address *,
	.tribe-events-tooltip .tribe-event-duration,
	#tribe-mobile-container .tribe-mobile-day .tribe-events-mobile .tribe-events-event-body .time-details,
	li.tribe-bar-views-option a,
	#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-grid-allday .column.first span,
	#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td div[id*=tribe-events-daynum-] a {
		font-family:" . psychology_help_get_google_font($cmsmasters_option['psychology-help' . '_small_font_google_font']) . $cmsmasters_option['psychology-help' . '_small_font_system_font'] . ";
		font-size:" . $cmsmasters_option['psychology-help' . '_small_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['psychology-help' . '_small_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['psychology-help' . '_small_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['psychology-help' . '_small_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['psychology-help' . '_small_font_text_transform'] . ";
	}
	
	#tribe-events-content.tribe-events-single .cmsmasters_single_event_meta .tribe-events-meta-group .cmsmasters_event_meta_info .cmsmasters_event_meta_info_item .cmsmasters_event_meta_info_item_descr,
	#tribe-events-content.tribe-events-single .cmsmasters_single_event_meta .tribe-events-meta-group .cmsmasters_event_meta_info .cmsmasters_event_meta_info_item .cmsmasters_event_meta_info_item_descr a,
	#tribe-events-content.tribe-events-single .cmsmasters_single_event_meta .tribe-events-meta-group .cmsmasters_event_meta_info .cmsmasters_event_meta_info_item .cmsmasters_event_meta_info_item_descr .tribe-address > span,
	#tribe-events-content.tribe-events-single .cmsmasters_single_event_meta .tribe-events-meta-group .cmsmasters_event_meta_info .cmsmasters_event_meta_info_item.cmsmasters_event_tags a {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_small_font_font_size'] + 1) . "px;
		line-height:" . $cmsmasters_option['psychology-help' . '_h6_font_line_height'] . "px;
	}
	
	.tribe-events-event-meta .url,
	.tribe-events-event-meta .url a,
	.tribe-events-adv-list-widget .tribe-events-list-widget-content-wrap .cmsmasters_widget_event_info .duration span, 
	.tribe-events-adv-list-widget .tribe-events-list-widget-content-wrap .cmsmasters_widget_event_venue_info_loc span, 
	.tribe-events-adv-list-widget .tribe-events-list-widget-content-wrap .cmsmasters_widget_event_venue_info_loc span a, 
	.tribe-venue-widget-wrapper .tribe-events-widget-link a,
	.tribe-events-adv-list-widget .tribe-events-widget-link a,
	#tribe-events-content.tribe-events-single .tribe-events-schedule,
	#tribe-events-content.tribe-events-single .event-is-recurring a,
	#tribe-events-content.tribe-events-single .event-is-recurring,
	#tribe-events-content.tribe-events-single .tribe-events-event-cost,
	#tribe-events-content.tribe-events-single .tribe-events-schedule .tribe-address,
	#tribe-events-content.tribe-events-single .tribe-events-venue-details .author a,
	#tribe-events-content.tribe-events-single .tribe-events-event-meta .tribe-address *,
	.tribe-events-venue-details .author a,
	.cmsmasters_single_event_header_right .tribe-events-back a,
	.cmsmasters_single_event_header_right .tribe-events-cal-links a,
	#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td div[id*=tribe-events-daynum-] a,
	li.tribe-bar-views-option a,
	.organizer-address span,
	.organizer-address span a,
	.tribe-events-back a,
	.tribe-countdown-time .tribe-countdown-number .tribe-countdown-under,
	.tribe-events-event-meta .tribe-address *,
	.tribe-events-loop .published .event-is-recurring a,
	.tribe-events-loop .published {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_small_font_font_size'] + 2) . "px;
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_small_font_line_height'] + 2) . "px;
	}
	
	
	.widget .vcalendar .cmsmasters_event_date .cmsmasters_event_day {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_small_font_font_size'] + 7) . "px;
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_small_font_line_height'] + 7) . "px;
	}
	
	.widget .vcalendar .cmsmasters_event_date .cmsmasters_event_month {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_small_font_font_size'] + 5) . "px;
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_small_font_line_height'] + 5) . "px;
	}
	
	.tribe-week-grid-hours div {
		font-size:" . ((int) $cmsmasters_option['psychology-help' . '_small_font_font_size'] - 1) . "px;
		line-height:" . ((int) $cmsmasters_option['psychology-help' . '_small_font_line_height'] - 1) . "px;
	}
	
	.tribe-events-event-cost {
		font-size:" . $cmsmasters_option['psychology-help' . '_h2_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['psychology-help' . '_h2_font_line_height'] . "px;
	}
	
	/* Finish Small Text Font */

/***************** Finish Events Font Styles ******************/


";

}
	
	return apply_filters('psychology_help_theme_fonts_filter', $custom_css);
}

