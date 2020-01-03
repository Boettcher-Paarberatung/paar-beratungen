<div id="tb-blog-loading" class="jws_theme_loading" style="display: block;">
	<div id="followingBallsG">
	<div id="followingBallsG_1" class="followingBallsG">
	</div>
	<div id="followingBallsG_2" class="followingBallsG">
	</div>
	<div id="followingBallsG_3" class="followingBallsG">
	</div>
	<div id="followingBallsG_4" class="followingBallsG">
	</div>
	</div>
</div>
<div id="tb-blog-metabox" class='jws_theme_metabox' style="display: none;">
	<div id="tb-tab-blog" class='categorydiv'>
		<ul class='category-tabs'>
		   <li class='tb-tab'><a href="#tabs-header">	<i class="dashicons dashicons-menu"></i> <?php echo esc_html_e('HEADER','medicare');?></a></li>
		   <li class='tb-tab'><a href="#tabs-title-bar"><i class="dashicons dashicons-menu"></i> <?php echo esc_html_e('TITLE BAR','medicare');?></a></li>
		   <li class='tb-tab'><a href="#tabs-footer">	<i class="dashicons dashicons-menu"></i> <?php echo esc_html_e('FOOTER','medicare');?></a></li>
		   <li class='tb-tab'><a href="#tabs-other">	<i class="dashicons dashicons-menu"></i> <?php echo esc_html_e('OTHER','medicare');?></a></li>
		</ul>
		<div class='tb-tabs-panel'>
			<div id="tabs-header">
				<?php
					$headers = array('global' => 'Global', 'v1' => 'Header 1', 'v2' => 'Header 2');
					$this->select('header_layout',
							'Header',
							$headers,
							'',
							''
					);
					$this->upload(
						'logo_image',
						esc_html_e('Custom Header Logo','medicare'),
						''
					);
					$this->select('header_fixed',
							'Header Fixed',
							array('' => 'No', '1' => 'Yes, please'),
							'',
							''
					);
					$this->select('header_full',
							'Header Full Width',
							array('' => 'No', '1' => 'Yes, please'),
							'',
							''
					);
					$this->select('display_widget_top',
							'Display Widget Header Top',
							array('0' => 'No', '1' => 'Yes'),
							'',
							''
					);
				?>
				
				<p class="cs_info"><i class="dashicons dashicons-megaphone"></i><?php echo esc_html_e('Main Navigation','medicare'); ?></p>
				<?php
				$menus = array('' => 'Global');
				$obj_menus = wp_get_nav_menus();
				foreach ($obj_menus as $obj_menu){
					$menus[$obj_menu->term_id] = $obj_menu->name;
				}
				$this->select('custom_menu',
						'Select Menu',
						$menus,
						'',
						''
				);
				?>
			</div>
			<div id="tabs-title-bar">
				<?php 
					$this->select('page_title_bar',
						'Title Bar',
						array('0' => 'No', '1' => 'Yes, please'),
						'',
						'Show title bar on page'
					);

					$this->select('show_page_title',
						'Page Name',
						array('0' => 'No', '1' => 'Yes, please'),
						'1',
						'Show page title. <i> Require Title Bar is selected. </i>'
					);
					$this->select('show_page_breadcrumb', 
					//auto add 'jws_theme_' => jws_theme_show_page_breadcrumb
						'Page Breadcrumb',
						array('0' => 'No', '1' => 'Yes, please'),
						'1',
						'Show breadcrumb on page. <i> Require Title Bar is selected. </i>'
					);

					$this->select('display_searchbar',
						'Show Search Bar',
						array('0' => 'No', '1' => 'Yes, please'),
						'',
						'Show search bar on page'
					);
				?>
			</div>
			<div id="tabs-footer">
				<?php
					$this->select('display_footer',
							'Display Footer',
							array('1' => 'Yes, please', 0 => 'No'),
							'',
							''
					);

					$footers = array('' => 'Global', 'v1' => 'Footer 1', 'v2' => 'Footer 2', 'v3' => 'Footer 3', 'v4'=>'Footer 4');
					$this->select('footer_layout',
							'Footer',
							$footers,
							'',
							''
					);
					$this->select('footer_full',
							'Footer Full Width',
							array(0 => 'No', '1' => 'Yes, please'),
							'',
							''
					);
				?>
			</div>
			<div id="tabs-other">
				<?php
					$this->select('ex_body_background',
							'Change body background',
							array('1' => 'Yes, please', 0 => 'No'),
							'0',
							'<i> Style your color to class "ex_body_background" </i>'
					);
				?>
			</div>
		</div>
	</div>
</div>
