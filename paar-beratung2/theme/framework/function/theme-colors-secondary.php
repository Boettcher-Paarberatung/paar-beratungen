<?php
/**
 * @package 	WordPress
 * @subpackage 	Psychology Help
 * @version 	1.1.2
 * 
 * Theme Secondary Color Schemes Rules
 * Created by CMSMasters
 * 
 */


function psychology_help_theme_colors_secondary() {
	$cmsmasters_option = psychology_help_get_global_options();
	
	
	$cmsmasters_color_schemes = cmsmasters_color_schemes_list();
	
	
	$custom_css = "/**
 * @package 	WordPress
 * @subpackage 	Psychology Help
 * @version 	1.1.2
 * 
 * Theme Secondary Color Schemes Rules
 * Created by CMSMasters
 * 
 */

";
	
	
	foreach ($cmsmasters_color_schemes as $scheme => $title) {
		$rule = (($scheme != 'default') ? "html .cmsmasters_color_scheme_{$scheme} " : '');
		
		
		if (CMSMASTERS_DONATIONS) {
			$custom_css .= "
/***************** Start {$title} CMSMASTERS Donations Color Scheme Rules ******************/

	/* Start Header Donation Button Colors */
	#header .header_donation_but .cmsmasters_button {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_header_hover_bg']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_header_hover']) . "
	}
	
	#header .header_donation_but .cmsmasters_button:hover {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_header_link']) . "
	}
	
	#header .header_top_donation_but {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_header_top_hover']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_header_top_border']) . "
	}
	
	#header .header_top_donation_but:hover {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_header_top_border']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_header_top_hover']) . "
	}
	/* Finish Header Donation Button Colors */
	
	
	/* Start Main Content Font Color */
	{$rule}.opened-article > .campaign .campaign_meta_wrap .cmsmasters_campaign_donations_count_number, 
	{$rule}.donations.opened-article > .donation .cmsmasters_donation_campaign, 
	{$rule}.donations.opened-article > .donation .cmsmasters_donation_campaign a, 
	{$rule}.cmsmasters_donations .donation .cmsmasters_donation_campaign, 
	{$rule}.cmsmasters_donations .donation .cmsmasters_donation_campaign a {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_color']) . "
	}
	/* Finish Main Content Font Color */
	
	
	/* Start Primary Color */
	{$rule}.opened-article > .campaign .campaign_meta_wrap .cmsmasters_campaign_target_number, 
	{$rule}.related_posts_tabs_campaign .rel_post_content .related_posts_campaign_wrap .related_posts_campaign_togo > span, 
	{$rule}.donations.opened-article > .donation .cmsmasters_donation_amount_currency, 
	{$rule}.donations.opened-article > .donation .cmsmasters_donation_campaign a:hover, 
	{$rule}.cmsmasters_donations .donation .cmsmasters_donation_amount_currency, 
	{$rule}.cmsmasters_donations .donation .cmsmasters_donation_campaign a:hover {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_featured_campaign .campaign .cmsmasters_campaign_wrap_heading {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_campaigns .campaign .cmsmasters_img_wrap .preloader:hover:after {
		background-color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . ", 0.85);
	}
	/* Finish Primary Color */
	
	
	/* Start Highlight Color */
	{$rule}.cmsmasters_campaigns .owl-buttons {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_hover']) . "
	}
	/* Finish Highlight Color */
	
	
	/* Start Headings Color */
	{$rule}.cmsmasters_campaigns .owl-buttons span:hover,
	{$rule}.donations.opened-article > .donation .cmsmasters_donation_details_item_title, 
	{$rule}.cmsmasters_donations .donation .cmsmasters_donation_amount_title, 
	{$rule}.opened-article > .campaign .cmsmasters_campaign_cont_info > span, 
	{$rule}.cmsmasters_campaigns .campaign .cmsmasters_stats.stats_mode_bars.stats_type_horizontal .cmsmasters_stat_wrap .cmsmasters_stat_title_wrap {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_heading']) . "
	}
	
	{$rule}.donation_confirm .donation_confirm_info_title {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_heading']) . "
	}
	/* Finish Headings Color */
	
	
	/* Start Main Background Color */
	{$rule}.cmsmasters_campaigns .campaign .cmsmasters_img_wrap .preloader:before {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_featured_campaign .campaign .cmsmasters_campaign_donated_percent .cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat canvas {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.opened-article > .campaign .campaign_meta_wrap > div {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_bg']) . "
	}
	/* Finish Main Background Color */
	
	
	/* Start Alternate Background Color */
	{$rule}.donation_confirm .donation_confirm_info_title {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_alternate']) . "
	}
	
	{$rule}.opened-article > .campaign .campaign_meta_wrap > div,
	{$rule}.donations.opened-article > .donation .cmsmasters_donation_info, 
	{$rule}.donation_confirm .donation_confirm_info, 
	{$rule}.cmsmasters_donations .donation .cmsmasters_donation_cont_wrap, 
	{$rule}.cmsmasters_featured_campaign .campaign, 
	{$rule}.cmsmasters_featured_campaign .campaign .cmsmasters_campaign_donated_percent .cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_alternate']) . "
	}
	/* Finish Alternate Background Color */
	
	
	/* Start Borders Color */
	{$rule}.cmsmasters_donations .donation .img_placeholder, 
	{$rule}.cmsmasters_featured_campaign .campaign .cmsmasters_campaign_wrap_img .img_placeholder, 
	{$rule}.cmsmasters_campaigns .campaign .cmsmasters_img_wrap .img_placeholder {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.donations.opened-article > .donation .cmsmasters_donation_details_item, 
	{$rule}.cmsmasters_donations .donation .cmsmasters_donation_footer, 
	{$rule}.campaign .cmsmasters_campaign_cont_info {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_border']) . "
	}
	/* Finish Borders Color */

/***************** Finish {$title} CMSMASTERS Donations Color Scheme Rules ******************/


";
		}
		
		
		if (CMSMASTERS_EVENTS_CALENDAR) {
			$custom_css .= "
/***************** Start {$title} Events Color Scheme Rules ******************/

	/* Start Main Content Font Color */
	{$rule}#tribe-events-bar #tribe-bar-views .tribe-bar-views-inner ul.tribe-bar-views-list li.tribe-bar-views-option a,
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td div[id*=\"tribe-events-daynum-\"], 
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td div[id*=\"tribe-events-daynum-\"] a, 
	{$rule}.tribe-events-countdown-widget .tribe-countdown-time .tribe-countdown-timer .tribe-countdown-number .tribe-countdown-under, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-events-has-events div, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-events-has-events * {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_color']) . "
	}
	
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td.tribe-events-othermonth > div[id*=tribe-events-daynum-] a, 
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td.tribe-events-othermonth > div[id*=tribe-events-daynum-] {
		color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['psychology-help' . '_' . $scheme . '_color']) . ", 0.5);
	}
	
	/* Finish Main Content Font Color */
	
	
	/* Start Primary Color */
	{$rule}#tribe-bar-views .tribe-bar-views-list li:hover, 
	{$rule}#tribe-bar-views .tribe-bar-views-list li.tribe-bar-active, 
	{$rule}#tribe-events-content.tribe-events-list .vevent .cmsmasters_events_list_event_wrap .cmsmasters_events_list_event_header .tribe-events-event-cost, 
	{$rule}#tribe-events-content.tribe-events-list .vevent .cmsmasters_events_list_event_wrap .tribe-events-event-meta .tribe-events-venue-details a:hover, 
	{$rule}ul.tribe-related-events > li .tribe-related-events-thumbnail .cmsmasters_events_img_placeholder:hover, 
	{$rule}.tribe-events-countdown-widget .tribe-countdown-text a:hover, 
	{$rule}.tribe-events-venue-widget .tribe-venue-widget-wrapper .tribe-venue-widget-venue .tribe-venue-widget-venue-name a:hover, 
	{$rule}.time-details:before, 
	{$rule}.author:before, 
	{$rule}.tribe-events-organizer .cmsmasters_events_organizer_header .cmsmasters_events_organizer_header_right a:before, 
	{$rule}.tribe-events-organizer .cmsmasters_events_organizer_header .cmsmasters_events_organizer_header_right a:hover:before, 
	{$rule}#tribe-events-content.tribe-events-single .cmsmasters_single_event_header .cmsmasters_single_event_header_right .tribe-events-back a:before, 
	{$rule}#tribe-events-content.tribe-events-single .cmsmasters_single_event_header .cmsmasters_single_event_header_right .tribe-events-back a:hover:before, 
	{$rule}.tribe-events-sub-nav li a, 
	{$rule}.widget .tribe-events-sub-nav li a, 
	{$rule}#tribe-events-content.tribe-events-single #tribe-events-sub-nav > span > span:before,
	{$rule}.tribe-events-address:before, 
	{$rule}.tribe-events-venue .cmsmasters_events_venue_header .cmsmasters_events_venue_header_right a:before, 
	{$rule}.tribe-events-venue .cmsmasters_events_venue_header .cmsmasters_events_venue_header_right a:hover:before, 
	{$rule}.widget .vcalendar .vevent .entry-title a:hover, 
	{$rule}.widget .vcalendar .vevent .cmsmasters_widget_event_info .cmsmasters_widget_event_info_date, 
	{$rule}.widget .vcalendar .vevent .cmsmasters_widget_event_venue_info_loc .cmsmasters_widget_event_venue_info a:hover, 
	{$rule}.widget .vcalendar .vevent .cmsmasters_widget_event_venue_info_loc .cmsmasters_widget_event_venue_loc a, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-events-has-events:hover *, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-list-wrapper .tribe-events-loop .vevent .tribe-mini-calendar-event .list-info, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-list-wrapper .tribe-events-loop .vevent .tribe-mini-calendar-event .list-info .tribe-mini-calendar-event-venue a:hover, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-events-has-events.tribe-events-past div .tribe-mini-calendar-day-link:hover {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-grid-header, 
	{$rule}#tribe-events-content .cmsmasters_event_date:before, 
	{$rule}.tribe-events-list-widget-events .cmsmasters_event_date:before, 
	{$rule}.vcalendar .vevent .cmsmasters_event_date:before, 
	{$rule}.tribe-events-sub-nav li a:hover, 
	{$rule}.tribe-this-week-events-widget .this-week-today .tribe-this-week-widget-header-date, 
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar thead th, 
	{$rule}.tribe_events .cmsmasters_post_cont .cmsmasters_post_title:before, 
	{$rule}#tribe-events-content.tribe-events-list .tribe-events-list-separator-month:before, 
	{$rule}#tribe-events-content.tribe-events-day .tribe-events-day-time-slot > h5:before, 
	{$rule}#tribe-events-content.tribe-events-photo #tribe-events-photo-events .tribe-events-photo-event .tribe-events-photo-event-wrap .tribe-events-event-details .tribe-events-list-event-title:before, 
	{$rule}.tribe-bar-views-open label.button,
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-grid-header .tribe-grid-content-wrap .column a:hover, 
	{$rule}#tribe-events-content.tribe-events-single #tribe-events-sub-nav > span:hover > span:before,
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar th.tribe-mini-calendar-dayofweek, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-events-has-events div .tribe-mini-calendar-day-link:hover:before, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-events-has-events.tribe-events-past div .tribe-mini-calendar-day-link:hover:before, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-events-present {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.datepicker table tr td span.active,
	{$rule}.datepicker table tr td.active {
		background:" . $cmsmasters_option['psychology-help' . '_' . $scheme . '_link'] . " !important;
	}
	
	{$rule}.tribe-events-sub-nav li a:hover,
	{$rule}#tribe-events-content.tribe-events-single #tribe-events-sub-nav > span:hover > span:before,
	{$rule}#tribe-events-bar #tribe-bar-views.tribe-bar-views-open label.button {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
	}
	
	@media only screen and (max-width: 768px) {
		{$rule}#main #tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td.tribe-events-thismonth:hover * {
			" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_link']) . "
		}
	}
	/* Finish Primary Color */
	
	
	/* Start Highlight Color */
	{$rule}.datepicker table thead th,
	{$rule}.datepicker table thead td,
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td.tribe-events-past .tribe-events-month-event-title a, 
	{$rule}.tribe-events-schedule,
	{$rule}.tribe-events-loop .published,
	{$rule}.tribe-events-schedule .tribe-address,
	{$rule}.tribe-events-venue-details .author a,
	{$rule}.tribe-events-event-meta .tribe-address *,
	{$rule}.tribe-events-tooltip .tribe-event-duration,
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td .tribe-events-month-event-title a:hover,
	{$rule}.widget .vcalendar .tribe-events-list-widget-content-wrap .duration:before, 
	{$rule}.widget .vcalendar .tribe-events-list-widget-content-wrap .cmsmasters_widget_event_venue_info:before, 
	{$rule}.widget .vcalendar .tribe-events-list-widget-content-wrap .cmsmasters_widget_event_venue_loc:before, 
	{$rule}.widget .vcalendar .tribe-events-list-widget-content-wrap .duration, 
	{$rule}.widget .vcalendar .tribe-events-list-widget-content-wrap .cmsmasters_widget_event_venue_info, 
	{$rule}.widget .vcalendar .tribe-events-list-widget-content-wrap .cmsmasters_widget_event_venue_info a, 
	{$rule}.widget .vcalendar .tribe-events-list-widget-content-wrap .cmsmasters_widget_event_venue_loc, 
	{$rule}.widget .vcalendar .tribe-events-list-widget-content-wrap .cmsmasters_widget_event_venue_loc a, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar tbody td > div a,
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar tbody td > div,
	{$rule}#tribe-events-content.tribe-events-single .cmsmasters_single_event_header .cmsmasters_single_event_header_left .tribe-events-schedule .tribe-events-cost,
	{$rule}#tribe-events-content.tribe-events-single .cmsmasters_single_event_header .cmsmasters_single_event_header_right .tribe-events-back a, 
	{$rule}#tribe-events-content.tribe-events-single .cmsmasters_single_event_header .cmsmasters_single_event_header_right .tribe-events-cal-links a, 
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td.tribe-events-past .tribe-events-month-event-title a:hover, 
	{$rule}.recurringinfo a:hover, 
	{$rule}.event-is-recurring a, 
	{$rule}.tribe-venue-widget-wrapper .tribe-events-widget-link a, 
	{$rule}.tribe-events-adv-list-widget .tribe-events-widget-link a, 
	{$rule}.tribe-events-venue-widget .tribe-venue-widget-wrapper .tribe-venue-widget-venue .tribe-venue-widget-venue-name a:hover, 
	{$rule}.tribe-related-event-info > span, 
	{$rule}.organizer-address span, 
	{$rule}.organizer-address span a, 
	{$rule}.tribe-events-venue .cmsmasters_events_venue_header .cmsmasters_events_venue_header_right a, 
	{$rule}.tribe-events-organizer .cmsmasters_events_organizer_header .cmsmasters_events_organizer_header_right a, 
	{$rule}.tribe-related-event-info .recurringinfo, 
	{$rule}#tribe-events-content.tribe-events-single .cmsmasters_single_event_meta .tribe-events-meta-group .cmsmasters_event_meta_info .cmsmasters_event_meta_info_item .cmsmasters_event_meta_info_item_descr,
	{$rule}#tribe-events-content.tribe-events-single .cmsmasters_single_event_meta .tribe-events-meta-group .cmsmasters_event_meta_info .cmsmasters_event_meta_info_item .cmsmasters_event_meta_info_item_descr a,
	{$rule}#tribe-events-content.tribe-events-single .cmsmasters_single_event_meta .tribe-events-meta-group .cmsmasters_event_meta_info .cmsmasters_event_meta_info_item .cmsmasters_event_meta_info_item_descr .tribe-address > span,
	{$rule}#tribe-events-content.tribe-events-single .cmsmasters_single_event_meta .tribe-events-meta-group .cmsmasters_event_meta_info .cmsmasters_event_meta_info_item.cmsmasters_event_tags a,
	{$rule}#tribe-events-footer > a:hover, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-list-wrapper .tribe-events-loop .vevent .tribe-mini-calendar-event .list-info .duration:before, 
	{$rule}.tribe-events-venue-widget .tribe-venue-widget-wrapper .cmsmasters_widget_event_info > div:before, 
	{$rule}.widget .vcalendar .vevent .cmsmasters_widget_event_info > div:before, 
	{$rule}.tribe-events-list-widget-events .tribe-events-list-widget-content-wrap .duration:before, 
	{$rule}.widget .vcalendar .vevent .cmsmasters_widget_event_venue_info_loc > div:before, 
	{$rule}.tribe-venue-widget-list .entry-title a:hover, 
	{$rule}.venue-address span, 
	{$rule}.venue-address span a, 
	{$rule}.tribe-this-week-events-widget .duration,
	{$rule}.tribe-this-week-events-widget .tribe-venue a, 
	{$rule}.tribe-this-week-events-widget .tribe-this-week-widget-header-date, 
	{$rule}.widget.tribe-events-venue-widget .tribe-venue-widget-wrapper .tribe-venue-widget-list > li .cmsmasters_widget_event_info_date, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-list-wrapper .tribe-events-loop .type-tribe_events .cmsmasters_widget_event_info .duration, 
	{$rule}.tribe-events-tooltip .tribe-events-event-body .duration, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-events-has-events.tribe-events-past div .tribe-mini-calendar-day-link, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-events-past div .tribe-mini-calendar-no-event {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_hover']) . "
	}
	
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-events-has-events div .tribe-mini-calendar-day-link:before {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_hover']) . "
	}
	
	@media only screen and (max-width: 768px) {
		{$rule}#main #tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td.tribe-events-has-events:before {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_hover']) . "
		}
	}
	/* Finish Highlight Color */
	
	
	/* Start Headings Color */
	{$rule}#tribe-events-content.tribe-events-single .cmsmasters_single_event_header .tribe-events-address address .adr span:first-child, 
	{$rule}#tribe-events-content .cmsmasters_event_date .cmsmasters_event_day, 
	{$rule}.tribe-this-week-events-widget .this-week-no-events-msg, 
	{$rule}.tribe-events-list-widget-events .cmsmasters_event_date .cmsmasters_event_day, 
	{$rule}.vcalendar .vevent .cmsmasters_event_date .cmsmasters_event_day, 
	{$rule}#tribe-events-content.tribe-events-single .cmsmasters_single_event_header .cmsmasters_single_event_header_left .tribe-events-schedule > div:before, 
	{$rule}#tribe-events-content.tribe-events-list .vevent .cmsmasters_events_list_event_wrap .tribe-events-event-meta > div:before, 
	{$rule}#tribe-events-content.tribe-events-list .vevent .cmsmasters_events_list_event_wrap .tribe-events-event-meta > div > div:before, 
	{$rule}#tribe-events-content.tribe-events-photo #tribe-events-photo-events .tribe-events-photo-event .tribe-events-photo-event-wrap .tribe-events-event-details .tribe-events-event-meta .time-details:before, 
	{$rule}#tribe-events-content.tribe-events-single .cmsmasters_single_event_header .cmsmasters_single_event_header_right .tribe-events-back:before, 
	{$rule}.tribe-events-list-widget-events .tribe-events-list-widget-content-wrap .tribe-events-event-cost, 
	{$rule}.widget .vcalendar .vevent .cmsmasters_widget_event_info .tribe-events-event-cost, 
	{$rule}#tribe-events-content.tribe-events-single .cmsmasters_single_event_meta .tribe-events-meta-group .cmsmasters_event_meta_info .cmsmasters_event_meta_info_item .cmsmasters_event_meta_info_item_title, 
	{$rule}#tribe-events-content.tribe-events-single .cmsmasters_single_event_meta .tribe-events-meta-group .cmsmasters_event_meta_info .cmsmasters_event_meta_info_item dt, 
	{$rule}#tribe-events-bar .tribe-bar-filters .tribe-bar-filters-inner .tribe-bar-date-filter #tribe-bar-dates label, 
	{$rule}#tribe-events-bar .tribe-bar-filters .tribe-bar-filters-inner .tribe-bar-search-filter label, 
	{$rule}#tribe-events-bar .tribe-bar-filters .tribe-bar-filters-inner .tribe-bar-geoloc-filter label, 
	{$rule}#tribe-events-bar .tribe-bar-filters .tribe-bar-filters-inner .tribe-bar-submit label, 
	{$rule}#tribe-events-footer > a, 
	{$rule}#tribe-events-content.tribe-events-list .tribe-events-list-separator-month, 
	{$rule}#tribe-mobile-container .tribe-mobile-day .tribe-mobile-day-heading, 
	{$rule}#tribe-mobile-container .tribe-mobile-day .tribe-mobile-day-date, 
	{$rule}#tribe-events-content.tribe-events-list .vevent .cmsmasters_events_list_event_wrap .tribe-events-event-meta .tribe-events-venue-details .author, 
	{$rule}#tribe-events-content.tribe-events-list .vevent .cmsmasters_events_list_event_wrap .tribe-events-event-meta .tribe-events-venue-details a, 
	{$rule}#tribe-events-content.tribe-events-day .tribe-events-day-time-slot > h5, 
	{$rule}.tribe-events-notices, 
	{$rule}ul.tribe-related-events > li .tribe-related-events-thumbnail .cmsmasters_events_img_placeholder, 
	{$rule}.tribe-events-venue .cmsmasters_events_venue_header .cmsmasters_events_venue_header_right a:hover, 
	{$rule}.tribe-events-organizer .cmsmasters_events_organizer_header .cmsmasters_events_organizer_header_right a:hover, 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-week-event > div:first-child > .entry-title, 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-week-event > div:first-child > .entry-title a, 
	{$rule}.tribe-events-countdown-widget .tribe-countdown-text a, 
	{$rule}.tribe-events-countdown-widget .tribe-countdown-time .tribe-countdown-timer .tribe-countdown-number, 
	{$rule}.tribe-events-countdown-widget .tribe-countdown-time .tribe-countdown-timer .tribe-countdown-colon, 
	{$rule}.tribe-events-venue-widget .tribe-venue-widget-wrapper .tribe-venue-widget-venue .tribe-venue-widget-venue-name, 
	{$rule}.tribe-events-venue-widget .tribe-venue-widget-wrapper .tribe-venue-widget-venue .tribe-venue-widget-venue-name a, 
	{$rule}.widget .vcalendar .vevent .cmsmasters_widget_event_info .cmsmasters_widget_event_info_cost, 
	{$rule}.widget .vcalendar .vevent .entry-title, 
	{$rule}#tribe-events-bar #tribe-bar-views label.button, 
	{$rule}.widget .vcalendar .vevent .entry-title a, 
	{$rule}#tribe-events-bar #tribe-bar-views .tribe-bar-views-inner ul.tribe-bar-views-list li.tribe-bar-views-option a:hover, 
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td div[id*=tribe-events-daynum-] a:hover,  
	{$rule}#tribe-events-content.tribe-events-single .cmsmasters_single_event_header .cmsmasters_single_event_header_right .tribe-events-back a:hover, 
	{$rule}#tribe-events-content.tribe-events-single .cmsmasters_single_event_header .cmsmasters_single_event_header_right .tribe-events-cal-links a:hover, 
	{$rule}.tribe-events-venue-details .author a:hover,
	{$rule}.tribe-events-event-cost,
	{$rule}.tribe-events-gmap,
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .tribe-mini-calendar-nav div, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar tbody td > div a:hover,
	{$rule}#tribe-events-content.tribe-events-single .cmsmasters_single_event_meta .tribe-events-meta-group .cmsmasters_event_meta_info .cmsmasters_event_meta_info_item .cmsmasters_event_meta_info_item_descr a:hover,
	{$rule}#tribe-events-content.tribe-events-single .cmsmasters_single_event_meta .tribe-events-meta-group .cmsmasters_event_meta_info .cmsmasters_event_meta_info_item.cmsmasters_event_tags a:hover,
	{$rule}.tribe-events-read-more,
	{$rule}.tribe-events-tooltip .entry-title,
	{$rule}.event-is-recurring a:hover, 
	{$rule}.organizer-address span a:hover, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .tribe-mini-calendar-nav div .tribe-mini-calendar-nav-link,
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .tribe-mini-calendar-nav div .tribe-mini-calendar-nav-link:hover,
	{$rule}#tribe-events-bar #tribe-bar-views .tribe-bar-views-inner ul.tribe-bar-views-list li.tribe-bar-views-option.tribe-bar-active a, 
	{$rule}.tribe-venue-widget-list .entry-title a, 
	{$rule}.venue-address span a:hover, 
	{$rule}.tribe-this-week-events-widget .tribe-venue a:hover, 
	{$rule}.widget .vcalendar .tribe-events-list-widget-content-wrap .cmsmasters_widget_event_venue_info a:hover, 
	{$rule}.widget .vcalendar .tribe-events-list-widget-content-wrap .cmsmasters_widget_event_venue_loc a:hover, 
	{$rule}.tribe-venue-widget-wrapper .tribe-events-widget-link a:hover, 
	{$rule}.tribe-events-adv-list-widget .tribe-events-widget-link a:hover, 
	{$rule}.widget .vcalendar .vevent .cmsmasters_widget_event_venue_info_loc .cmsmasters_widget_event_venue_info a, 
	{$rule}.widget .vcalendar .vevent .cmsmasters_widget_event_venue_info_loc .cmsmasters_widget_event_venue_loc a:hover, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-list-wrapper .tribe-events-loop .vevent .tribe-mini-calendar-event .list-info .tribe-mini-calendar-event-venue, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-list-wrapper .tribe-events-loop .vevent .tribe-mini-calendar-event .list-info .tribe-mini-calendar-event-venue a {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_heading']) . "
	}
	 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-mini-calendar-today {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_heading']) . "
	}
	
	@media only screen and (max-width: 768px) {
		{$rule}#main #tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td.tribe-events-thismonth * {
			" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_heading']) . "
		}
	
		{$rule}#main #tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td.mobile-active div[id*=\"tribe-events-daynum-\"] {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_heading']) . "
		}
	}
	/* Finish Headings Color */
	
	
	/* Start Main Background Color */
	{$rule}.tribe-events-sub-nav li a:hover,
	{$rule}.widget .tribe-events-sub-nav li a:hover,
	{$rule}.tribe-this-week-events-widget .this-week-today .tribe-this-week-widget-header-date,
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar thead th, 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-grid-header .tribe-grid-content-wrap .column, 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-grid-header .tribe-grid-content-wrap .column a, 
	{$rule}#tribe-events-content.tribe-events-single #tribe-events-sub-nav > span:hover > span:before,
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-week-event:hover > div:first-child > .entry-title a, 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-events-past .tribe-week-event:hover > div:first-child a,
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar th.tribe-mini-calendar-dayofweek, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-events-present *, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-events-present:hover *, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-mini-calendar-today *, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-mini-calendar-today:hover * {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.datepicker table thead th,
	{$rule}.datepicker table thead td,
	{$rule}.tribe-events-calendar,
	{$rule}#tribe-events-bar #tribe-bar-views .tribe-bar-views-inner label.button .cmsmasters_next_arrow, 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .tribe-mini-calendar-nav div .tribe-mini-calendar-nav-link span, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-events-othermonth, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-events-present div .tribe-mini-calendar-day-link:before, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-events-has-events.tribe-events-present div .tribe-mini-calendar-day-link:hover:before, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-mini-calendar-today div .tribe-mini-calendar-day-link:before {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}#tribe-events-bar #tribe-bar-views .tribe-bar-views-inner label.button .cmsmasters_next_arrow:before, 
	{$rule}#tribe-events-bar #tribe-bar-views .tribe-bar-views-inner label.button .cmsmasters_next_arrow:after, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .tribe-mini-calendar-nav div .tribe-mini-calendar-nav-link:before, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .tribe-mini-calendar-nav div .tribe-mini-calendar-nav-link span:before, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .tribe-mini-calendar-nav div .tribe-mini-calendar-nav-link span:after {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_bg']) . "
	}
	
	@media only screen and (max-width: 768px) {
		{$rule}#main #tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td.tribe-events-thismonth.mobile-active *, 
		{$rule}#main #tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td.tribe-events-thismonth.tribe-events-present * {
			" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_bg']) . "
		}
		
		{$rule}#main #tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td.tribe-events-present:before {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_bg']) . "
		}
	}
	/* Finish Main Background Color */
	
	
	/* Start Alternate Background Color */ 
	@media only screen and (max-width: 768px) {
		{$rule}#main #tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td.mobile-active div[id*=\"tribe-events-daynum-\"], 
		{$rule}#main #tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td.mobile-active div[id*=\"tribe-events-daynum-\"] a {
			" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_alternate']) . "
		}
	}
	
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td.tribe-events-othermonth,
	{$rule}#tribe-events-content .cmsmasters_event_date, 
	{$rule}.tribe-events-list-widget-events .cmsmasters_event_date, 
	{$rule}.vcalendar .vevent .cmsmasters_event_date, 
	{$rule}.tribe_events .cmsmasters_post_cont, 
	{$rule}#tribe-events-content.tribe-events-list .tribe-events-list-separator-month, 
	{$rule}#tribe-mobile-container .tribe-mobile-day .tribe-mobile-day-heading, 
	{$rule}#tribe-mobile-container .tribe-mobile-day .tribe-mobile-day-date, 
	{$rule}#tribe-events-content.tribe-events-day .tribe-events-day-time-slot > h5, 
	{$rule}#tribe-events-content.tribe-events-list .tribe-events-list-separator-month span, 
	{$rule}.tribe-events-notices, 
	{$rule}ul.tribe-related-events > li .tribe-related-events-thumbnail .cmsmasters_events_img_placeholder, 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-week-event > div:first-child > .entry-title, 
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td div[id*=\"tribe-events-daynum-\"], 
	{$rule}.tribe-events-tooltip,
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-week-grid-wrapper .tribe-week-today {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_alternate']) . "
	}
	
	{$rule}.tribe-events-tooltip:before {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_alternate']) . "
	}
	
	{$rule}.tribe-events-tooltip.recurring-info-tooltip:before {
		border-bottom-color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['psychology-help' . '_' . $scheme . '_alternate']) . ", 1) !important;
	}
	
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-grid-body .tribe-events-tooltip:before {
		border-right-color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['psychology-help' . '_' . $scheme . '_alternate']) . ", 1) !important;
	}
	
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-grid-body .tribe-events-right .tribe-events-tooltip:before {
		border-left-color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['psychology-help' . '_' . $scheme . '_alternate']) . ", 1) !important;
	}
	
	@media only screen and (max-width: 768px) {
		{$rule}#main #tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td.tribe-events-thismonth {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_alternate']) . "
		}
	}
	/* Finish Alternate Background Color */
	
	
	/* Start Borders Color */
	{$rule}.bd_font_color {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar tbody td.tribe-events-has-events,
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-events-has-events.tribe-events-past div .tribe-mini-calendar-day-link:before {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.widget.tribe-this-week-events-widget .tribe-this-week-widget-day, 
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar, 
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td, 
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td div[id*=\"tribe-events-daynum-\"], 
	{$rule}#tribe-events-content.tribe-events-list .vevent, 
	{$rule}.widget .vcalendar li, 
	{$rule}.widget .tribe-events-list-widget-events li,
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td .tribe-events-viewmore, 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid, 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-scroller, 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-grid-content-wrap .column, 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-grid-allday, 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-week-grid-wrapper .tribe-week-grid-outer-wrap .tribe-week-grid-inner-wrap .tribe-week-grid-block div, 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-week-grid-wrapper .tribe-week-grid-outer-wrap .tribe-week-grid-inner-wrap .tribe-week-grid-block div:before, 
	{$rule}#tribe-mobile-container .tribe-mobile-day .tribe-events-mobile, 
	{$rule}.widget .vcalendar .vevent, 
	{$rule}.tribe-events-sub-nav li a, 
	{$rule}#tribe-events-header,
	{$rule}.cmsmasters_event_date,
	{$rule}.widget.tribe-events-venue-widget .tribe-venue-widget-wrapper .tribe-venue-widget-list > li,
	{$rule}.tribe-events-venue-widget .tribe-venue-widget-wrapper .tribe-venue-widget-venue .tribe-venue-widget-venue-name,
	{$rule}.tribe-events-loop .type-tribe_events,
	{$rule}#tribe-events-content.tribe-events-single #tribe-events-sub-nav > span > span:before, 
	{$rule}.cmsmasters_single_event_content, 
	{$rule}#tribe-events-content .type-tribe_events, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar th, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar td, 
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td div[id*=tribe-events-event-],
	{$rule}#tribe-events-bar #tribe-bar-views label.button, 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-week-event > div:first-child > .entry-title {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.tribe_events .cmsmasters_post_cont_info, 
	{$rule}.tribe_events .cmsmasters_post_footer_info {
		" . cmsmasters_color_css('border-top-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.tribe_events .cmsmasters_post_cont_info {
		" . cmsmasters_color_css('border-bottom-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_border']) . "
	}
	/* Finish Borders Color */ 
	
	/* Static Transparent Color Start*/
	
	#tribe-events-bar #tribe-bar-views label.button {
		background-color:transparent;
	}
	
	/* Static Transparent Color Finish*/
	
	/* Start Secondary Color*/
	
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .tribe-mini-calendar-nav div,
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-grid-header .tribe-grid-content-wrap .column a:hover,
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-week-event:hover > div:first-child > .entry-title, 
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td.tribe-events-present div[id*=tribe-events-daynum-] {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_' . $scheme . '_secondary_color']) . "
	}
	
	/* Finish Secondary Color*/

/***************** Finish {$title} Events Color Scheme Rules ******************/


";
		}
	}
	
	
	$custom_css .= "
/***************** Start Header Middle Color Scheme Rules ******************/

	/* Start Header Middle Content Color */
	.header_mid,
	.header_mid .button:hover, 
	.header_mid input[type=submit]:hover, 
	.header_mid input[type=button]:hover, 
	.header_mid .cmsmasters_button, 
	.header_mid button:hover,
	.header_mid .cmsmasters_button:hover, 
	.header_mid input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	.header_mid textarea,
	.header_mid select,
	.header_mid option {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_header_mid_color']) . "
	}
	/* Finish Header Middle Content Color */
	
	
	/* Start Header Middle Primary Color */
	.header_mid a,
	.header_mid .search_wrap .search_bar_wrap .search_button button:before {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_header_mid_link']) . "
	}
	
	.header_mid input[type=submit]:hover, 
	.header_mid input[type=button]:hover {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_header_mid_link']) . "
	}
	/* Finish Header Middle Primary Color */
	
	
	/* Start Header Middle Rollover Color */
	.header_mid a:hover,
	.header_mid .search_wrap .search_bar_wrap .search_button:hover button:before {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_header_mid_hover']) . "
	}
	
	.header_mid .button, 
	.header_mid .resp_mid_nav span:before,
	.header_mid .resp_mid_nav.active,
	.header_mid .resp_mid_nav:hover,
	.header_mid input[type=submit], 
	.header_mid input[type=button], 
	.header_mid button {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_header_mid_hover']) . "
	}
	
	.header_mid .resp_mid_nav,
	.header_mid .resp_mid_nav span,
	.header_mid input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]):focus,
	.header_mid textarea:focus,
	.header_mid select:focus {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_header_mid_hover']) . "
	}
	/* Finish Header Middle Rollover Color */
	
	
	/* Start Header Middle Background Color */
	.header_mid,
	.header_mid .resp_mid_nav.active span:before,
	.header_mid .resp_mid_nav:hover span:before,
	.header_mid input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	.header_mid textarea,
	.header_mid select,
	.header_mid option {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_header_mid_bg']) . "
	}
	
	.header_mid .resp_mid_nav.active span,
	.header_mid .resp_mid_nav:hover span {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_header_mid_bg']) . "
	}
	
	/* Finish Header Middle Background Color */
	
	
	/* Start Header Middle Background Color on Scroll */
	.header_mid.header_mid_scroll {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_header_mid_bg_scroll']) . "
	}
	
	@media only screen and (max-width: 1024px) {
		.header_mid {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_header_mid_bg_scroll']) . "
		}
	}
	/* Finish Header Middle Background Color on Scroll */
	
	
	/* Start Header Middle Borders Color */
	.header_mid,
	.social_wrap,
	.slogan_wrap,
	.header_mid input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	.header_mid textarea,
	.header_mid select,
	.header_mid option {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_header_mid_border']) . "
	}
	/* Finish Header Middle Borders Color */
	
	
	/* Start Header Middle Custom Rules */
	.header_mid ::selection {
		" . cmsmasters_color_css('background', $cmsmasters_option['psychology-help' . '_header_mid_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_header_mid_bg']) . "
	}
	
	.header_mid ::-moz-selection {
		" . cmsmasters_color_css('background', $cmsmasters_option['psychology-help' . '_header_mid_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_header_mid_bg']) . "
	}
	/* Finish Header Middle Custom Rules */

/***************** Finish Header Middle Color Scheme Rules ******************/



/***************** Start Header Bottom Color Scheme Rules ******************/

	/* Start Header Bottom Content Color */
	.header_bot,
	.header_bot input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	.header_bot textarea,
	.header_bot select,
	.header_bot option {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_header_bot_color']) . "
	}
	/* Finish Header Bottom Content Color */
	
	
	/* Start Header Bottom Primary Color */
	.header_bot a {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_header_bot_link']) . "
	}
	
	.header_bot .button:hover, 
	.header_bot input[type=submit]:hover, 
	.header_bot input[type=button]:hover, 
	.header_bot button:hover, 
	.header_bot .search_wrap .search_bar_wrap .search_button button:hover, 
	.header_bot .search_wrap.search_opened .search_bar_wrap .search_button button {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_header_bot_link']) . "
	}
	/* Finish Header Bottom Primary Color */
	
	
	/* Start Header Bottom Rollover Color */
	.header_bot a:hover {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_header_bot_hover']) . "
	}
	
	.header_bot .button, 
	.header_bot .resp_bot_nav:hover,
	.header_bot .resp_bot_nav.active,
	.header_bot .resp_bot_nav span:before,
	.header_bot input[type=submit], 
	.header_bot input[type=button], 
	.header_bot button,
	.header_bot .search_wrap .search_bar_wrap .search_button button {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_header_bot_hover']) . "
	}
	
	.header_bot .resp_bot_nav,
	.header_bot .resp_bot_nav span,
	.header_bot input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]):focus,
	.header_bot textarea:focus,
	.header_bot select:focus {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_header_bot_hover']) . "
	}
	/* Finish Header Bottom Rollover Color */
	
	
	/* Start Header Bottom Background Color */
	.header_bot .button, 
	.header_bot input[type=submit], 
	.header_bot input[type=button], 
	.header_bot button, 
	.header_bot .search_wrap .search_bar_wrap .search_button button {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_header_bot_bg']) . "
	}
	
	.header_bot,
	.header_bot .resp_bot_nav:hover span:before,
	.header_bot .resp_bot_nav.active span:before,
	.header_bot input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	.header_bot textarea,
	.header_bot select,
	.header_bot option {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_header_bot_bg']) . "
	}
	
	
	.header_bot .resp_bot_nav.active span,
	.header_bot .resp_bot_nav:hover span {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_header_bot_bg']) . "
	}
	
	/* Finish Header Bottom Background Color */
	
	
	/* Start Header Bottom Background Color on Scroll */
	.header_bot.header_bot_scroll {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_header_bot_bg_scroll']) . "
	}
	
	@media only screen and (max-width: 1024px) {
		.header_bot {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_header_bot_bg_scroll']) . "
		}
	}
	/* Finish Header Bottom Background Color on Scroll */
	
	
	/* Start Header Bottom Borders Color */
	.header_bot,
	.header_bot input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	.header_bot textarea,
	.header_bot select,
	.header_bot option {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_header_bot_border']) . "
	}
	/* Finish Header Bottom Borders Color */
	
	
	/* Start Header Bottom Custom Rules */
	.header_bot ::selection {
		" . cmsmasters_color_css('background', $cmsmasters_option['psychology-help' . '_header_bot_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_header_bot_bg']) . "
	}
	
	.header_bot ::-moz-selection {
		" . cmsmasters_color_css('background', $cmsmasters_option['psychology-help' . '_header_bot_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_header_bot_bg']) . "
	}
	/* Finish Header Bottom Custom Rules */

/***************** Finish Header Bottom Color Scheme Rules ******************/



/***************** Start Navigation Color Scheme Rules ******************/

	/* Start Navigation Title Link Color */
	@media only screen and (min-width: 1025px) {
		ul.navigation > li > a,
		ul.navigation > li > a .nav_tag {
			" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_navigation_title_link']) . "
		}
	}
	/* Finish Navigation Title Link Color */
	
	
	/* Start Navigation Title Link Hover Color */
	@media only screen and (min-width: 1025px) {
		ul.navigation > li > a:hover,
		ul.navigation > li > a:hover .nav_subtitle,
		ul.navigation > li:hover > a,
		ul.navigation > li:hover > a .nav_subtitle {
			" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_navigation_title_link_hover']) . "
		}
		
		ul.navigation > li > a .nav_tag {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_navigation_title_link_hover']) . "
		}
	}
	/* Finish Navigation Title Link Hover Color */
	
	
	/* Start Navigation Title Link Current Color */
	@media only screen and (min-width: 1025px) {
		ul.navigation > li.menu-item.current-menu-item > a, 
		ul.navigation > li.menu-item.current-menu-item > a .nav_subtitle, 
		ul.navigation > li.menu-item.current-menu-ancestor > a, 
		ul.navigation > li.menu-item.current-menu-ancestor > a .nav_subtitle {
			" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_navigation_title_link_current']) . "
		}
	}
	/* Finish Navigation Title Link Current Color */
	
	
	/* Start Navigation Title Link Subtitle Color */
	@media only screen and (min-width: 1025px) {
		ul.navigation > li > a .nav_subtitle {
			" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_navigation_title_link_subtitle']) . "
		}
	}
	/* Finish Navigation Title Link Subtitle Color */
	
	
	/* Start Navigation Title Link Background Color */
	@media only screen and (min-width: 1025px) {
		ul.navigation > li > a {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_navigation_title_link_bg']) . "
		}
	}
	/* Finish Navigation Title Link Background Color */
	
	
	/* Start Navigation Title Link Hover Background Color */
	@media only screen and (min-width: 1025px) {
		ul.navigation > li > a:hover,
		ul.navigation > li:hover > a {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_navigation_title_link_bg_hover']) . "
		}
	}
	/* Finish Navigation Title Link Hover Background Color */
	
	
	/* Start Navigation Title Link Current Background Color */
	@media only screen and (min-width: 1025px) {
		ul.navigation > li.menu-item.current-menu-item > a, 
		ul.navigation > li.menu-item.current-menu-ancestor > a {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_navigation_title_link_bg_current']) . "
		}
	}
	/* Finish Navigation Title Link Current Background Color */
	
	
	/* Start Navigation Title Link Border Color */
	@media only screen and (min-width: 1025px) {
		ul.navigation > li {
			" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_navigation_title_link_border']) . "
		}
	}
	/* Finish Navigation Title Link Border Color */
	
	
	/* Start Navigation Dropdown Text Color */
	.navigation li .menu-item-mega-description-container, 
	.navigation li .menu-item-mega-description-container * {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_navigation_dropdown_text']) . "
	}
	/* Finish Navigation Dropdown Tex Color */
	
	
	/* Start Navigation Dropdown Background Color */
	@media only screen and (max-width: 1024px) {
		ul.navigation {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_navigation_dropdown_bg']) . "
		}
	}
	
	@media only screen and (min-width: 1025px) {
		ul.navigation ul, 
		ul.navigation .menu-item-mega-container {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_navigation_dropdown_bg']) . "
		}
		
		ul.navigation > li ul li .nav_tag {
			" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_navigation_dropdown_bg']) . "
		}
	}
	/* Finish Navigation Dropdown Background Color */
	
	
	/* Start Navigation Dropdown Border Color */
	@media only screen and (min-width: 1025px) {
		ul.navigation ul, 
		ul.navigation .menu-item-mega-container > ul {
			" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_navigation_dropdown_border']) . "
		}
		
		.header_bot .bot_nav .menu-item-mega-container:before {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_navigation_dropdown_border']) . "
		}
	}
	/* Finish Navigation Dropdown Border Color */
	
	
	/* Start Navigation Dropdown Link Color */
	.navigation li a {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_navigation_dropdown_link']) . "
	}
	
	ul.navigation > li ul li .nav_tag {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_navigation_dropdown_link']) . "
	}
	/* Finish Navigation Dropdown Link Color */
	
	
	/* Start Navigation Dropdown Link Hover Color */
	.navigation li > a:hover,
	.navigation li > a:hover .nav_subtitle,
	.navigation li.current-menu-item > a, 
	.navigation li.current-menu-ancestor > a, 
	.navigation li.current-menu-item > a .nav_subtitle {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_navigation_dropdown_link_hover']) . "
	}
	
	@media only screen and (min-width: 1025px) {
		ul.navigation li > ul li:hover > a, 
		ul.navigation li > ul li:hover > a .nav_subtitle, 
		ul.navigation li > ul li.current-menu-ancestor > a, 
		ul.navigation li > ul li.current-menu-ancestor > a .nav_subtitle {
			" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_navigation_dropdown_link_hover']) . "
		}
	}
	/* Finish Navigation Dropdown Link Hover Color */
	
	
	/* Start Navigation Dropdown Link Subtitle Color */
	.navigation li a .nav_subtitle {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_navigation_dropdown_link_subtitle']) . "
	}
	/* Finish Navigation Dropdown Link Subtitle Color */
	
	
	/* Start Navigation Dropdown Link Hover Highlight Color */
	.navigation li li > a:hover,
	.navigation li.menu-item-highlight > a,
	.navigation li li.current-menu-item > a {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_navigation_dropdown_link_highlight']) . "
	}
	
	@media only screen and (min-width: 1025px) {
		ul.navigation li > ul li:hover, 
		ul.navigation li.current-menu-ancestor > a,
		ul.navigation li > ul li.current-menu-ancestor {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_navigation_dropdown_link_highlight']) . "
		}
	}
	/* Finish Navigation Dropdown Link Hover Highlight Color */
	
	
	/* Start Navigation Dropdown Link Border Color */
	.navigation li,
	.menu-item-mega-container > ul > li > a {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_navigation_dropdown_link_border']) . "
	}
	/* Finish Navigation Dropdown Link Border Color */

/***************** Finish Navigation Color Scheme Rules ******************/



/***************** Start Header Top Color Scheme Rules ******************/

	/* Start Header Top Content Color */
	.header_top {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_header_top_color']) . "
	}
	
	.header_top .responsive_top_nav.active,
	.header_top .responsive_top_nav:hover,
	.header_top .responsive_top_nav span:before {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_header_top_color']) . "
	}
	
	.header_top .responsive_top_nav,
	.header_top .responsive_top_nav span {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_header_top_color']) . "
	}
	
	/* Finish Header Top Content Color */
	
	
	/* Start Header Top Primary Color */
	.header_top a,  
	.header_top .header_top_but:hover, 
	.header_top .header_top_but.opened {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_header_top_link']) . "
	}
	/* Finish Header Top Primary Color */
	
	
	/* Start Header Top Rollover Color */
	.header_top a:hover,
	.header_top .meta_wrap [class^=cmsmasters-icon-]:before,
	.header_top .meta_wrap [class*= cmsmasters-icon-]:before,
	.header_top .header_top_but {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_header_top_hover']) . "
	}
	/* Finish Header Top Rollover Color */
	
	
	/* Start Header Top Background Color */
	.header_top .responsive_top_nav.active span:before,
	.header_top .responsive_top_nav:hover span:before,
	.header_top {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_header_top_bg']) . "
	}
	
	.header_top .responsive_top_nav.active span,
	.header_top .responsive_top_nav:hover span {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_header_top_bg']) . "
	}
	
	/* Finish Header Top Background Color */
	
	
	/* Start Header Top Borders Color */
	.header_top,
	.header_top .top_nav_wrap nav,
	.header_top .header_top_but {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_header_top_border']) . "
	}
	/* Finish Header Top Borders Color */
	
	
	/* Start Header Top Custom Rules */
	.header_top ::selection {
		" . cmsmasters_color_css('background', $cmsmasters_option['psychology-help' . '_header_top_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_header_top_bg']) . "
	}
	
	.header_top ::-moz-selection {
		" . cmsmasters_color_css('background', $cmsmasters_option['psychology-help' . '_header_top_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_header_top_bg']) . "
	}
	/* Finish Header Top Custom Rules */

/***************** Finish Header Top Color Scheme Rules ******************/



/***************** Start Header Top Navigation Color Scheme Rules ******************/

	/* Start Header Top Navigation Title Link Color */
	@media only screen and (min-width: 1025px) {
		ul.top_line_nav > li > a {
			" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_header_top_title_link']) . "
		}
	}
	/* Finish Header Top Navigation Title Link Color */
	
	
	/* Start Header Top Navigation Title Link Hover Color */
	@media only screen and (min-width: 1025px) {
		ul.top_line_nav > li > a:hover,
		ul.top_line_nav > li:hover > a,
		ul.top_line_nav > li.current-menu-item > a,
		ul.top_line_nav > li.current-menu-ancestor > a {
			" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_header_top_title_link_hover']) . "
		}
	}
	/* Finish Header Top Navigation Title Link Hover Color */
	
	
	/* Start Header Top Navigation Title Link Background Color */
	@media only screen and (min-width: 1025px) {
		ul.top_line_nav > li > a {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_header_top_title_link_bg']) . "
		}
	}
	/* Finish Header Top Navigation Title Link Background Color */
	
	
	/* Start Header Top Navigation Title Link Hover Background Color */
	@media only screen and (min-width: 1025px) {
		ul.top_line_nav > li > a:hover,
		ul.top_line_nav > li:hover > a,
		ul.top_line_nav > li.current-menu-item > a,
		ul.top_line_nav > li.current-menu-ancestor > a {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_header_top_title_link_bg_hover']) . "
		}
	}
	/* Finish Header Top Navigation Title Link Hover Background Color */
	
	
	/* Start Header Top Navigation Title Link Border Color */
	@media only screen and (min-width: 1025px) {
		ul.top_line_nav > li {
			" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_header_top_title_link_border']) . "
		}
	}
	/* Finish Header Top Navigation Title Link Border Color */
	
	
	/* Start Header Top Navigation Dropdown Background Color */
	@media only screen and (max-width: 1024px) {
		ul.top_line_nav {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_header_top_dropdown_bg']) . "
		}
	}
	
	@media only screen and (min-width: 1025px) {
		ul.top_line_nav ul {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_header_top_dropdown_bg']) . "
		}
	}
	/* Finish Header Top Navigation Dropdown Background Color */
	
	
	/* Start Header Top Navigation Dropdown Border Color */
	@media only screen and (min-width: 1025px) {
		ul.top_line_nav ul {
			" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_header_top_dropdown_border']) . "
		}
	}
	/* Finish Header Top Navigation Dropdown Border Color */
	
	
	/* Start Header Top Navigation Dropdown Link Color */
	.top_line_nav li a {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_header_top_dropdown_link']) . "
	}
	/* Finish Header Top Navigation Dropdown Link Color */
	
	
	/* Start Header Top Navigation Dropdown Link Hover Color */
	.top_line_nav li > a:hover,
	.top_line_nav li.current-menu-item > a {
		" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_header_top_dropdown_link_hover']) . "
	}
	
	@media only screen and (min-width: 1025px) {
		ul.top_line_nav ul li:hover > a, 
		ul.top_line_nav ul li.current-menu-ancestor > a {
			" . cmsmasters_color_css('color', $cmsmasters_option['psychology-help' . '_header_top_dropdown_link_hover']) . "
		}
	}
	/* Finish Header Top Navigation Dropdown Link Hover Color */
	
	
	/* Start Header Top Navigation Dropdown Link Hover Highlight Color */
	.top_line_nav li > a:hover,
	.top_line_nav li.current-menu-item > a {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_header_top_dropdown_link_highlight']) . "
	}
	
	@media only screen and (min-width: 1025px) {
		ul.top_line_nav ul li:hover > a,
		ul.top_line_nav ul li.current-menu-ancestor > a {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['psychology-help' . '_header_top_dropdown_link_highlight']) . "
		}
	}
	/* Finish Header Top Navigation Dropdown Link Hover Highlight Color */
	
	
	/* Start Header Top Navigation Dropdown Link Border Color */
	.top_line_nav li {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['psychology-help' . '_header_top_dropdown_link_border']) . "
	}
	/* Finish Header Top Navigation Dropdown Link Border Color */

/***************** Finish Header Top Navigation Color Scheme Rules ******************/

";
	
	
	return apply_filters('psychology_help_theme_colors_secondary_filter', $custom_css);
}

