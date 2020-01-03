<?php 
/**
 * @package 	WordPress
 * @subpackage 	Psychology Help
 * @version		1.1.2
 * 
 * Admin Panel Post, Project, Profile & Donations Campaign Settings
 * Created by CMSMasters
 * 
 */


function psychology_help_options_single_tabs() {
	$tabs = array();
	
	
	$tabs['post'] = esc_attr__('Post', 'psychology-help');
	
	if (CMSMASTERS_PROJECT_COMPATIBLE && class_exists('Cmsmasters_Projects')) {
		$tabs['project'] = esc_attr__('Project', 'psychology-help');
	}
	
	if (CMSMASTERS_PROFILE_COMPATIBLE && class_exists('Cmsmasters_Profiles')) {
		$tabs['profile'] = esc_attr__('Profile', 'psychology-help');
	}
	
	if (CMSMASTERS_DONATIONS) {
		$tabs['campaign'] = esc_attr__('Campaign', 'psychology-help');
	}
	
	
	return $tabs;
}


function psychology_help_options_single_sections() {
	$tab = psychology_help_get_the_tab();
	
	
	switch ($tab) {
	case 'post':
		$sections = array();
		
		$sections['post_section'] = esc_attr__('Blog Post Options', 'psychology-help');
		
		
		break;
	case 'project':
		$sections = array();
		
		$sections['project_section'] = esc_attr__('Portfolio Project Options', 'psychology-help');
		
		
		break;
	case 'profile':
		$sections = array();
		
		$sections['profile_section'] = esc_attr__('Person Block Profile Options', 'psychology-help');
		
		
		break;
	case 'campaign':
		$sections = array();
		
		$sections['campaign_section'] = esc_attr__('Donations Campaign Options', 'psychology-help');
		
		
		break;
	}
	
	
	return $sections;
} 


function psychology_help_options_single_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = psychology_help_get_the_tab();
	}
	
	
	$options = array();
	
	
	switch ($tab) {
	case 'post':
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'psychology-help' . '_blog_post_layout', 
			'title' => esc_html__('Layout Type', 'psychology-help'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'r_sidebar', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'psychology-help') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'psychology-help') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'psychology-help') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'psychology-help' . '_blog_post_title', 
			'title' => esc_html__('Post Title', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'psychology-help' . '_blog_post_date', 
			'title' => esc_html__('Post Date', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'psychology-help' . '_blog_post_cat', 
			'title' => esc_html__('Post Categories', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'psychology-help' . '_blog_post_author', 
			'title' => esc_html__('Post Author', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'psychology-help' . '_blog_post_comment', 
			'title' => esc_html__('Post Comments', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'psychology-help' . '_blog_post_tag', 
			'title' => esc_html__('Post Tags', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'psychology-help' . '_blog_post_like', 
			'title' => esc_html__('Post Likes', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'psychology-help' . '_blog_post_view', 
			'title' => esc_html__('Post Views', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'psychology-help' . '_blog_post_nav_box', 
			'title' => esc_html__('Posts Navigation Box', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'psychology-help' . '_blog_post_share_box', 
			'title' => esc_html__('Sharing Box', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'psychology-help' . '_blog_post_author_box', 
			'title' => esc_html__('About Author Box', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'psychology-help' . '_blog_more_posts_box', 
			'title' => esc_html__('More Posts Box', 'psychology-help'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'related', 
			'choices' => array( 
				esc_html__('Show Related Posts', 'psychology-help') . '|related', 
				esc_html__('Show Popular Posts', 'psychology-help') . '|popular', 
				esc_html__('Show Recent Posts', 'psychology-help') . '|recent', 
				esc_html__('Hide More Posts Box', 'psychology-help') . '|hide' 
			) 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'psychology-help' . '_blog_more_posts_count', 
			'title' => esc_html__('More Posts Box Items Number', 'psychology-help'), 
			'desc' => esc_html__('posts', 'psychology-help'), 
			'type' => 'number', 
			'std' => '3', 
			'min' => '2', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'psychology-help' . '_blog_more_posts_pause', 
			'title' => esc_html__('More Posts Slider Pause Time', 'psychology-help'), 
			'desc' => esc_html__("in seconds, if '0' - autoslide disabled", 'psychology-help'), 
			'type' => 'number', 
			'std' => '0', 
			'min' => '0', 
			'max' => '20' 
		);
		
		
		break;
	case 'project':
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'psychology-help' . '_portfolio_project_title', 
			'title' => esc_html__('Project Title', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'psychology-help' . '_portfolio_project_details_title', 
			'title' => esc_html__('Project Details Title', 'psychology-help'), 
			'desc' => esc_html__('Enter a project details block title', 'psychology-help'), 
			'type' => 'text', 
			'std' => 'Project details', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'psychology-help' . '_portfolio_project_date', 
			'title' => esc_html__('Project Date', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'psychology-help' . '_portfolio_project_cat', 
			'title' => esc_html__('Project Categories', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'psychology-help' . '_portfolio_project_author', 
			'title' => esc_html__('Project Author', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'psychology-help' . '_portfolio_project_comment', 
			'title' => esc_html__('Project Comments', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'psychology-help' . '_portfolio_project_tag', 
			'title' => esc_html__('Project Tags', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'psychology-help' . '_portfolio_project_like', 
			'title' => esc_html__('Project Likes', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'psychology-help' . '_portfolio_project_link', 
			'title' => esc_html__('Project Link', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'psychology-help' . '_portfolio_project_share_box', 
			'title' => esc_html__('Sharing Box', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'psychology-help' . '_portfolio_project_nav_box', 
			'title' => esc_html__('Projects Navigation Box', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'psychology-help' . '_portfolio_project_author_box', 
			'title' => esc_html__('About Author Box', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'psychology-help' . '_portfolio_more_projects_box', 
			'title' => esc_html__('More Projects Box', 'psychology-help'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'related', 
			'choices' => array( 
				esc_html__('Show Related Projects', 'psychology-help') . '|related', 
				esc_html__('Show Popular Projects', 'psychology-help') . '|popular', 
				esc_html__('Show Recent Projects', 'psychology-help') . '|recent', 
				esc_html__('Hide More Projects Box', 'psychology-help') . '|hide' 
			) 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'psychology-help' . '_portfolio_more_projects_count', 
			'title' => esc_html__('More Projects Box Items Number', 'psychology-help'), 
			'desc' => esc_html__('projects', 'psychology-help'), 
			'type' => 'number', 
			'std' => '3', 
			'min' => '2', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'psychology-help' . '_portfolio_more_projects_pause', 
			'title' => esc_html__('More Projects Slider Pause Time', 'psychology-help'), 
			'desc' => esc_html__("in seconds, if '0' - autoslide disabled", 'psychology-help'), 
			'type' => 'number', 
			'std' => '0', 
			'min' => '0', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'psychology-help' . '_portfolio_project_slug', 
			'title' => esc_html__('Project Slug', 'psychology-help'), 
			'desc' => esc_html__('Enter a page slug that should be used for your projects single item', 'psychology-help'), 
			'type' => 'text', 
			'std' => 'project', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'psychology-help' . '_portfolio_pj_categs_slug', 
			'title' => esc_html__('Project Categories Slug', 'psychology-help'), 
			'desc' => esc_html__('Enter page slug that should be used on projects categories archive page', 'psychology-help'), 
			'type' => 'text', 
			'std' => 'pj-categs', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'psychology-help' . '_portfolio_pj_tags_slug', 
			'title' => esc_html__('Project Tags Slug', 'psychology-help'), 
			'desc' => esc_html__('Enter page slug that should be used on projects tags archive page', 'psychology-help'), 
			'type' => 'text', 
			'std' => 'pj-tags', 
			'class' => '' 
		);
		
		
		break;
	case 'profile':
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'psychology-help' . '_profile_post_title', 
			'title' => esc_html__('Profile Title', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'psychology-help' . '_profile_post_details_title', 
			'title' => esc_html__('Profile Details Title', 'psychology-help'), 
			'desc' => esc_html__('Enter a profile details block title', 'psychology-help'), 
			'type' => 'text', 
			'std' => 'Profile details', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'psychology-help' . '_profile_post_cat', 
			'title' => esc_html__('Profile Categories', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'psychology-help' . '_profile_post_comment', 
			'title' => esc_html__('Profile Comments', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'psychology-help' . '_profile_post_like', 
			'title' => esc_html__('Profile Likes', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'psychology-help' . '_profile_post_nav_box', 
			'title' => esc_html__('Profiles Navigation Box', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'psychology-help' . '_profile_post_share_box', 
			'title' => esc_html__('Sharing Box', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'psychology-help' . '_profile_post_slug', 
			'title' => esc_html__('Profile Slug', 'psychology-help'), 
			'desc' => esc_html__('Enter a page slug that should be used for your profiles single item', 'psychology-help'), 
			'type' => 'text', 
			'std' => 'profile', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'psychology-help' . '_profile_pl_categs_slug', 
			'title' => esc_html__('Profile Categories Slug', 'psychology-help'), 
			'desc' => esc_html__('Enter page slug that should be used on profiles categories archive page', 'psychology-help'), 
			'type' => 'text', 
			'std' => 'pl-categs', 
			'class' => '' 
		);
		
		
		break;
	case 'campaign':
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'psychology-help' . '_donations_campaign_layout', 
			'title' => esc_html__('Layout Type', 'psychology-help'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'r_sidebar', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'psychology-help') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'psychology-help') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'psychology-help') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'psychology-help' . '_donations_campaign_title', 
			'title' => esc_html__('Campaign Title', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'psychology-help' . '_donations_campaign_date', 
			'title' => esc_html__('Campaign Date', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'psychology-help' . '_donations_campaign_cat', 
			'title' => esc_html__('Campaign Categories', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'psychology-help' . '_donations_campaign_author', 
			'title' => esc_html__('Campaign Author', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'psychology-help' . '_donations_campaign_comment', 
			'title' => esc_html__('Campaign Comments', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'psychology-help' . '_donations_campaign_tag', 
			'title' => esc_html__('Campaign Tags', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'psychology-help' . '_donations_campaign_like', 
			'title' => esc_html__('Campaign Likes', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'psychology-help' . '_donations_campaign_nav_box', 
			'title' => esc_html__('Campaign Navigation Box', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'psychology-help' . '_donations_campaign_share_box', 
			'title' => esc_html__('Sharing Box', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'psychology-help' . '_donations_campaign_author_box', 
			'title' => esc_html__('About Author Box', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'psychology-help' . '_donations_more_campaigns_box', 
			'title' => esc_html__('More Campaigns Box', 'psychology-help'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'related', 
			'choices' => array( 
				esc_html__('Show Related Campaigns', 'psychology-help') . '|related', 
				esc_html__('Show Popular Campaigns', 'psychology-help') . '|popular', 
				esc_html__('Show Recent Campaigns', 'psychology-help') . '|recent', 
				esc_html__('Hide More Campaigns Box', 'psychology-help') . '|hide' 
			) 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'psychology-help' . '_donations_more_campaigns_count', 
			'title' => esc_html__('More Campaigns Box Items Number', 'psychology-help'), 
			'desc' => esc_html__('campaigns', 'psychology-help'), 
			'type' => 'number', 
			'std' => '3', 
			'min' => '2', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'psychology-help' . '_donations_more_campaigns_pause', 
			'title' => esc_html__('More Campaigns Slider Pause Time', 'psychology-help'), 
			'desc' => esc_html__("in seconds, if '0' - autoslide disabled", 'psychology-help'), 
			'type' => 'number', 
			'std' => '0', 
			'min' => '0', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'psychology-help' . '_donations_campaign_slug', 
			'title' => esc_html__('Campaign Slug', 'psychology-help'), 
			'desc' => esc_html__('Enter a page slug that should be used for your donations campaign single item', 'psychology-help'), 
			'type' => 'text', 
			'std' => 'campaign', 
			'class' => '' 
		);
		
		
		break;
	}
	
	
	return $options;
}

