<?php 
/**
 * @package 	WordPress
 * @subpackage 	Psychology Help
 * @version		1.1.2
 * 
 * Admin Panel Theme Settings Import/Export
 * Created by CMSMasters
 * 
 */


function psychology_help_options_demo_tabs() {
	$tabs = array();
	
	
	$tabs['import'] = esc_attr__('Import', 'psychology-help');
	$tabs['export'] = esc_attr__('Export', 'psychology-help');
	
	
	return $tabs;
}


function psychology_help_options_demo_sections() {
	$tab = psychology_help_get_the_tab();
	
	
	switch ($tab) {
	case 'import':
		$sections = array();
		
		$sections['import_section'] = esc_html__('Theme Settings Import', 'psychology-help');
		
		
		break;
	case 'export':
		$sections = array();
		
		$sections['export_section'] = esc_html__('Theme Settings Export', 'psychology-help');
		
		
		break;
	}
	
	
	return $sections;
} 


function psychology_help_options_demo_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = psychology_help_get_the_tab();
	}
	
	
	$options = array();
	
	
	switch ($tab) {
	case 'import':
		$options[] = array( 
			'section' => 'import_section', 
			'id' => 'psychology-help' . '_demo_import', 
			'title' => esc_html__('Theme Settings', 'psychology-help'), 
			'desc' => esc_html__("Enter your theme settings data here and click 'Import' button", 'psychology-help'), 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
		
		break;
	case 'export':
		$options[] = array( 
			'section' => 'export_section', 
			'id' => 'psychology-help' . '_demo_export', 
			'title' => esc_html__('Theme Settings', 'psychology-help'), 
			'desc' => esc_html__("Click here to export your theme settings data to the file", 'psychology-help'), 
			'type' => 'button', 
			'std' => esc_html__('Export Theme Settings', 'psychology-help'), 
			'class' => 'cmsmasters-demo-export' 
		);
		
		
		break;
	}
	
	
	return $options;	
}

