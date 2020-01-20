<?php
    /**
     * ReduxFramework Theme Config File
     * For full documentation, please visit: https://docs.reduxframework.com
     * */

    if ( ! class_exists( 'Redux_Framework_theme_config' ) ) {

        class Redux_Framework_theme_config {

            public $args = array();
            public $sections = array();
            public $theme;
            public $ReduxFramework;

            public function __construct() {

                if ( ! class_exists( 'ReduxFramework' ) ) {
                    return;
                }

                // This is needed. Bah WordPress bugs.  ;)
                if ( true == Redux_Helpers::isTheme( __FILE__ ) ) {
                    $this->initSettings();
                } else {
                    add_action( 'plugins_loaded', array( $this, 'initSettings' ), 10 );
                }
				add_action( 'admin_enqueue_scripts', array( $this, 'tbtheme_add_scripts' ));

            }
			public function tbtheme_add_scripts(){
				wp_enqueue_script( 'action', JWS_THEME_URI_PATH_ADMIN.'/assets/js/action.js', false );
				wp_enqueue_style( 'style_admin', JWS_THEME_URI_PATH_ADMIN.'/assets/css/style_admin.css', false );
			}
            public function initSettings() {

                // Just for demo purposes. Not needed per say.
                $this->theme = wp_get_theme();

                // Set the default arguments
                $this->setArguments();

                // Set a few help tabs so you can see how it's done
                //$this->setHelpTabs();

                // Create the sections and fields
                $this->setSections();

                if ( ! isset( $this->args['opt_name'] ) ) { // No errors please
                    return;
                }

                // If Redux is running as a plugin, this will remove the demo notice and links
                //add_action( 'redux/loaded', array( $this, 'remove_demo' ) );

                // Function to test the compiler hook and demo CSS output.
                // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
                //add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 3);

                // Change the arguments after they've been declared, but before the panel is created
                //add_filter('redux/options/'.$this->args['opt_name'].'/args', array( $this, 'change_arguments' ) );

                // Change the default value of a field after it's been set, but before it's been useds
                //add_filter('redux/options/'.$this->args['opt_name'].'/defaults', array( $this,'change_defaults' ) );

                // Dynamically add a section. Can be also used to modify sections/fields
                //add_filter('redux/options/' . $this->args['opt_name'] . '/sections', array($this, 'dynamic_section'));

                $this->ReduxFramework = new ReduxFramework( $this->sections, $this->args );
            }

            /**
             * This is a test function that will let you see when the compiler hook occurs.
             * It only runs if a field    set with compiler=>true is changed.
             * */
            function compiler_action( $options, $css, $changed_values ) {
                echo '<h1>The compiler hook has run!</h1>';
                echo "<pre>";
                print_r( $changed_values ); // Values that have changed since the last save
                echo "</pre>";
            }

            /**
             * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
             * Simply include this function in the child themes functions.php file.
             * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
             * so you must use get_template_directory_uri() if you want to use any of the built in icons
             * */
            function dynamic_section( $sections ) {
                //$sections = array();
                $sections[] = array(
                    'title'  => esc_html__( 'Section via hook', 'medicare' ),
                    'desc'   => wp_kses(__( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'medicare' ),array('p'=>array())),
                    'icon'   => 'el-icon-paper-clip',
                    // Leave this as a blank section, no options just some intro text set above.
                    'fields' => array()
                );

                return $sections;
            }

            /**
             * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
             * */
            function change_arguments( $args ) {
                //$args['dev_mode'] = true;

                return $args;
            }

            /**
             * Filter hook for filtering the default value of any given field. Very useful in development mode.
             * */
            function change_defaults( $defaults ) {
                $defaults['str_replace'] = 'Testing filter hook!';

                return $defaults;
            }

            // Remove the demo link and the notice of integrated demo from the redux-framework plugin
            function remove_demo() {

                // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
                if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                    remove_filter( 'plugin_row_meta', array(
                        ReduxFrameworkPlugin::instance(),
                        'plugin_metalinks'
                    ), null, 2 );

                    // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                    remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
                }
            }

            public function setSections() {

                /**
                 * Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
                 * */
                // Background Patterns Reader
                $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
                $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
                $sample_patterns      = array();

                if ( is_dir( $sample_patterns_path ) ) :

                    if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) :
                        $sample_patterns = array();

                        while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                            if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                                $name              = explode( '.', $sample_patterns_file );
                                $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                                $sample_patterns[] = array(
                                    'alt' => $name,
                                    'img' => $sample_patterns_url . $sample_patterns_file
                                );
                            }
                        }
                    endif;
                endif;

                ob_start();

                $ct          = wp_get_theme();
                $this->theme = $ct;
                $item_name   = $this->theme->get( 'Name' );
                $tags        = $this->theme->Tags;
                $screenshot  = $this->theme->get_screenshot();
                $class       = $screenshot ? 'has-screenshot' : '';

                $customize_title = sprintf( esc_html__( 'Customize &#8220;%s&#8221;', 'medicare' ), $this->theme->display( 'Name' ) );

                ?>
                <div id="current-theme" class="<?php echo esc_attr( $class ); ?>">
                    <?php if ( $screenshot ) : ?>
                        <?php if ( current_user_can( 'edit_theme_options' ) ) : ?>
                            <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize"
                               title="<?php echo esc_attr( $customize_title ); ?>">
                                <img src="<?php echo esc_url( $screenshot ); ?>"
                                     alt="<?php esc_attr_e( 'Current theme preview', 'medicare' ); ?>"/>
                            </a>
                        <?php endif; ?>
                        <img class="hide-if-customize" src="<?php echo esc_url( $screenshot ); ?>"
                             alt="<?php esc_attr_e( 'Current theme preview', 'medicare' ); ?>"/>
                    <?php endif; ?>

                    <h4><?php echo esc_attr($this->theme->display( 'Name' )); ?></h4>

                    <div>
                        <ul class="theme-info">
                            <li><?php printf( esc_html__( 'By %s', 'medicare' ), $this->theme->display( 'Author' ) ); ?></li>
                            <li><?php printf( esc_html__( 'Version %s', 'medicare' ), $this->theme->display( 'Version' ) ); ?></li>
                            <li><?php echo '<strong>' . esc_html__( 'Tags', 'medicare' ) . ':</strong> '; ?><?php printf( $this->theme->display( 'Tags' ) ); ?></li>
                        </ul>
                        <p class="theme-description"><?php echo esc_attr($this->theme->display( 'Description' )); ?></p>
                        <?php
                            if ( $this->theme->parent() ) {
                                printf( ' <p class="howto">' . wp_kses(__( 'This <a href="%1$s">child theme</a> requires its parent theme, %2$s.', 'medicare' ),array('a'=>array('href'=>array()))) . '</p>', esc_html__( 'http://codex.wordpress.org/Child_Themes', 'medicare' ), $this->theme->parent()->display( 'Name' ) );
                            }
                        ?>

                    </div>
                </div>

                <?php
                $item_info = ob_get_contents();

                ob_end_clean();

                $sampleHTML = '';
                if ( file_exists( JWS_THEME_ABS_PATH_ADMIN . '/info-html.html' ) ) {
                    Redux_Functions::initWpFilesystem();

                    global $wp_filesystem;

                    $sampleHTML = $wp_filesystem->get_contents( JWS_THEME_ABS_PATH_ADMIN . '/info-html.html' );
                }
				
				$of_options_fontsize = array("8px" => "8px", "9px" => "9px", "10px" => "10px", "11px" => "11px", "12px" => "12px", "13px" => "13px", "14px" => "14px", "15px" => "15px", "16px" => "16px", "17px" => "17px", "18px" => "18px", "19px" => "19px", "20px" => "20px", "21px" => "21px", "22px" => "22px", "23px" => "23px", "24px" => "24px", "25px" => "25px", "26px" => "26px", "27px" => "27px", "28px" => "28px", "29px" => "29px", "30px" => "30px", "31px" => "31px", "32px" => "32px", "33px" => "33px", "34px" => "34px", "35px" => "35px", "36px" => "36px", "37px" => "37px", "38px" => "38px", "39px" => "39px", "40px" => "40px");
				$of_options_fontweight = array("100" => "100", "200" => "200", "300" => "300", "400" => "400", "500" => "500", "600" => "600", "700" => "700");
				$of_options_font = array("1" => "Google Font", "2" => "Standard Font", "3" => "Custom Font");
				//Google font API
				$of_options_google_font = array();
				if (is_admin()) {
					$results = '';
					//$whitelist = array('127.0.0.1','::1');
					//if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
						$results = wp_remote_get('https://www.googleapis.com/webfonts/v1/webfonts?sort=alpha&key=AIzaSyDnf-ujK_DUCihfvzqdlBokan6zbnrJbi0');
						if (!is_wp_error($results)) {
								$results = json_decode($results['body']);
								if(isset($results->items)){
									foreach ($results->items as $font) {
										$of_options_google_font[$font->family] = $font->family;
									}
								}
						}
					//}
				}
				//Standard Fonts
				$of_options_standard_fonts = array(
					'Arial, Helvetica, sans-serif' => 'Arial, Helvetica, sans-serif',
					"'Arial Black', Gadget, sans-serif" => "'Arial Black', Gadget, sans-serif",
					"'Bookman Old Style', serif" => "'Bookman Old Style', serif",
					"'Comic Sans MS', cursive" => "'Comic Sans MS', cursive",
					"Courier, monospace" => "Courier, monospace",
					"Garamond, serif" => "Garamond, serif",
					"Georgia, serif" => "Georgia, serif",
					"Impact, Charcoal, sans-serif" => "Impact, Charcoal, sans-serif",
					"'Lucida Console', Monaco, monospace" => "'Lucida Console', Monaco, monospace",
					"'Lucida Sans Unicode', 'Lucida Grande', sans-serif" => "'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
					"'MS Sans Serif', Geneva, sans-serif" => "'MS Sans Serif', Geneva, sans-serif",
					"'MS Serif', 'New York', sans-serif" => "'MS Serif', 'New York', sans-serif",
					"'Palatino Linotype', 'Book Antiqua', Palatino, serif" => "'Palatino Linotype', 'Book Antiqua', Palatino, serif",
					"Tahoma, Geneva, sans-serif" => "Tahoma, Geneva, sans-serif",
					"'Times New Roman', Times, serif" => "'Times New Roman', Times, serif",
					"'Trebuchet MS', Helvetica, sans-serif" => "'Trebuchet MS', Helvetica, sans-serif",
					"Verdana, Geneva, sans-serif" => "Verdana, Geneva, sans-serif"
				);
				// Custom Font
				$fonts = array();
				$of_options_custom_fonts = array();
				$font_path = get_template_directory() . "/fonts";
				if (!$handle = opendir($font_path)) {
					$fonts = array();
				} else {
					while (false !== ($file = readdir($handle))) {
						if (strpos($file, ".ttf") !== false ||
							strpos($file, ".eot") !== false ||
							strpos($file, ".svg") !== false ||
							strpos($file, ".woff") !== false
						) {
							$fonts[] = $file;
						}
					}
				}
				closedir($handle);

				foreach ($fonts as $font) {
					$font_name = str_replace(array('.ttf', '.eot', '.svg', '.woff'), '', $font);
					$of_options_custom_fonts[$font_name] = $font_name;
				}
				/* remove dup item */
				$of_options_custom_fonts = array_unique($of_options_custom_fonts);

                //lists page
                $lists_page = array();
                $args_page = array(
                    'sort_order' => 'asc',
                    'sort_column' => 'post_title',
                    'hierarchical' => 1,
                    'exclude' => '',
                    'include' => '',
                    'meta_key' => '',
                    'meta_value' => '',
                    'authors' => '',
                    'child_of' => 0,
                    'parent' => -1,
                    'exclude_tree' => '',
                    'number' => '',
                    'offset' => 0,
                    'post_type' => 'page',
                    'post_status' => 'publish'
                );
                $pages = get_pages( $args_page );

                foreach( $pages as $p ){
                    $lists_page[ $p->ID ] = esc_attr( $p->post_title );
                }
				
				/*General Setting*/
				$this->sections[] = array(
                    'title'  => esc_html__( 'General Setting', 'medicare' ),
                    'desc'   => esc_html__( '', 'medicare' ),
                    'icon'   => 'el-icon-cogs',
                    'fields' => array(
						array(
                            'id'       => 'jws_theme_less',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Less Design', 'medicare' ),
                            'subtitle' => esc_html__( 'Use the less design features.', 'medicare' ),
							'default'  => false,
                        ),
                        array(
                            'id'       => 'jws_theme_box_style',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Box Style', 'medicare' ),
                            'subtitle' => esc_html__( 'Show Box style options', 'medicare' ),
                            'default'  => false,
                        ),
                        array(
                            'id'       => 'jws_theme_enabled_smooth_scroll',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Smooth Scroll', 'medicare' ),
                            'subtitle' => esc_html__( 'Enable smooth scroll', 'medicare' ),
                            'default'  => true
                        ),
                        array(
                            'id'       => 'jws_theme_show_popup',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Newsletter Popup onload', 'medicare' ),
                            'subtitle' => esc_html__( 'Show Newsletter popup on load', 'medicare' ),
                            'default'  => false,
                        ),
                        array( 
                            'id'       => 'jws_theme_body_layout',
                            'type'     => 'select',
                                'title'    => esc_html__('Choose Body Layout', 'medicare'),
                                'subtitle' => esc_html__('Select body layout.', 'medicare'),
                                'options'  => array(
                                    'wide'=>esc_html__('Wide', 'medicare'),
                                    'boxed'=>esc_html__('Boxed', 'medicare')
                                ),
                                'default'  => 'wide'
                        ),
						array(
							'id'       => 'jws_theme_background',
							'type'     => 'background',
							'title'    => esc_html__('Body Background', 'medicare'),
							'subtitle' => esc_html__('Body background with image, color, etc.', 'medicare'),
							'default'  => array(
								'background-color' => '#f7f7f7',
							),
							'output' => array('body'),
						),
						array(
							'id'       => 'jws_theme_image_default',
							'type'     => 'media',
							'url'      => true,
							'title'    => esc_html__('Image default', 'medicare'),
							'subtitle' => esc_html__('Image default for the post', 'medicare'),
							'default'  => array(
								'url' => JWS_THEME_URI_PATH.'/Img_default/thumb_default.jpg'
							),
							'output' => array('body'),
						),
					)
					
				);
				/*Logo*/
				$this->sections[] = array(
                    'title'  => __( 'Logo', 'medicare' ),
                    'desc'   => __( '', 'medicare' ),
                    'icon'   => 'el-icon-viadeo',
                    'fields' => array(
						array(
							'id'       => 'jws_theme_favicon_image',
							'type'     => 'media',
							'url'      => true,
							'title'    => esc_html__('Favicon Image', 'medicare'),
							'subtitle' => esc_html__('Select an image file for your favicon.', 'medicare'),
							'default'  => array(
								//'url'	=> JWS_THEME_URI_PATH.'/assets/images/favicon.jpg'
								'url'	=> 'http://jwsuperthemes.com/themecheck2/wp-content/themes/medicare/assets/images/favicon.jpg'
							),
						),
                        array(
                            'id'       => 'jws_theme_logo_text',
                            'type'     => 'text',
                            'title'    => esc_html__('Logo Text', 'medicare'),
                            'subtitle' => esc_html__('Enter Logo text', 'medicare'),
                            'default'  => esc_html__( '', 'medicare')
                        ),
						array(
							'id'       => 'jws_theme_logo_image',
							'type'     => 'media',
							'url'      => true,
							'title'    => esc_html__('Logo Image', 'medicare'),
							'subtitle' => esc_html__('Select an image file for your logo instead of text.', 'medicare'),
							'default'  => array(
								//'url'	=> JWS_THEME_URI_PATH.'/assets/images/logo.png'
								'url'	=> 'http://jwsuperthemes.com/themecheck2/wp-content/themes/medicare//assets/images/logo.png'
							),
						)
					)
				);
				
				/* Header Options */
				$this->sections[] = array(
                    'title'  => esc_html__( 'Header', 'medicare' ),
                    'desc'   => esc_html__( '', 'medicare' ),
                    'icon'   => 'el-icon-file-edit',
                    'fields' => array(
						array( 
							'id'       => 'jws_theme_header_layout',
							'type'     => 'image_select',
							'title'    => esc_html__('Header Layout', 'medicare'),
							'subtitle' => esc_html__('Select header layout in your site.', 'medicare'),
							'options'  => array(
                                'v1'    => array(
                                    'alt'   => 'Header 1',
                                    'img'   => JWS_THEME_URI_PATH.'/assets/images/headers/header-v1.png'
                                ),
                                'v2'    => array(
                                    'alt'   => 'Header 2',
                                    'img'   => JWS_THEME_URI_PATH.'/assets/images/headers/header-v2.png'
                                )
                            
							),
							'default' => 'v1'
						),
						/* Header Sticky */
						array(
                            'id'       => 'jws_theme_stick_header',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Sticky Header', 'medicare' ),
                            'subtitle' => esc_html__( 'Enable a fixed header when scrolling.', 'medicare' ),
							'default'  => false,
                        ),
                        array(
                            'id'       => 'jws_theme_header_full',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Header fullwidth', 'medicare' ),
                            'subtitle' => esc_html__( 'Header fullwidth.', 'medicare' ),
                            'default'  => false,
                        )
						/* Header Sticky */
					)
				);
				/* Header Options */
				
				/*Main Menu*/
				$this->sections[] = array(
                    'title'  => esc_html__( 'Main Menu', 'medicare' ),
                    'desc'   => esc_html__( '', 'medicare' ),
                    'icon'   => 'el-icon-list',
                    'fields' => array(
						array(
							'id'          => 'jws_theme_menu_font_size_firts_level',
							'type'        => 'typography', 
							'title'       => esc_html__('Typography', 'medicare'),
							'color'      => '#ffffff', 
							'font-weight' => '700', 
							'subsets' => false,
							'font-backup' => false,
							'line-height' => '100px',
							'subtitle' => esc_html__('Typography option with firts level item in menu. Default: 16px, ex: 16px.', 'medicare'),
							'default'     => array(
								'font-size'   => '16px',
								'font-family' => 'Dosis'
							),
							'output' => array('#nav > li > a, a.icon_search_wrap, a.icon_cart_wrap, .header-menu-item-icon a'),
						),
						array(
							'id'          => 'jws_theme_menu_font_size_sub_level',
							'type'        => 'typography', 
							'title'       => esc_html__('Typography', 'medicare'),
							'color'      => '#898989', 
							'font-weight' => '400', 
							'subsets' => false,
							'font-backup' => false,
							'subtitle' => esc_html__('Typography option with sub level item in menu.', 'medicare'),
							'default'     => array(
                                'font-family' => 'Source Sans Pro',
								'font-size'   => '14px',
								'line-height' => '41px',
							),
							'output' => array('#nav > li > ul li a'),
						),
						array(
							'id' => 'jws_theme_menu_padding',
							'title' => 'Menu Padding',
							'subtitle' => esc_html__('Please, Enter padding For Menu.', 'medicare'),
							'type' => 'spacing',
							'units' => array('px'),
							'output' => array('#nav > li > a'),
							'default' => array(
								'padding-top'     => '0',
								'padding-right'   => '60px', 
								'padding-bottom'  => '0',
								'padding-left'    => '5px',
								'units'          => 'px', 
							)
						),
					)
					
				);
                /*404 page*/
                $this->sections[] = array(
                    'title'  => esc_html__( '404 Page', 'medicare' ),
                    'desc'   => esc_html__( '', 'medicare' ),
                    'icon'   => 'el el-error',
                    'fields' => array(
                        array(
                            'id'       => 'jws_theme_error404_page_id',
                            'type'     => 'select',
                            'title'    => esc_html__('Page 404 Template', 'medicare'),
                            'subtitle' => esc_html__('Select the page to be displayed when the wrong URL', 'medicare'),
                            'options'  => $lists_page,
							'default'  => '605'
                        ),
                        array(
                            'id'       => 'jws_theme_error404_display_header',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Display Header', 'medicare' ),
                            'subtitle' => esc_html__( 'Display header.', 'medicare' ),
                            'default'  => true,
                        ),
                        array(
                            'id'       => 'jws_theme_error404_display_top_sidebar',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Display Top Sidebar', 'medicare' ),
                            'subtitle' => esc_html__( 'Display Top Sidebar.', 'medicare' ),
                            'default'  => false
                        ),
                        array(
                            'id'       => 'jws_theme_error404_display_title',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Display Page title', 'medicare' ),
                            'subtitle' => esc_html__( 'Display Page title.', 'medicare' ),
                            'default'  => false,
                        ),
                        array(
                            'id'       => 'jws_theme_error404_display_footer',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Display Footer', 'medicare' ),
                            'subtitle' => esc_html__( 'Display Footer.', 'medicare' ),
                            'default'  => true,
                        ),
                        array(
                            'id'       => 'jws_theme_error404_bg',
                            'type'     => 'background',
                            'title'    => esc_html__('404 Page Background', 'medicare'),
                            'subtitle' => esc_html__('404 page background with image, color, etc.', 'medicare'),
                            'default'  => array(
                                'background-color' => '#fff',
                               // 'background-image' => JWS_THEME_URI_PATH.'/assets/images/404-page/background.jpg',
                            ),
                            'output' => array('.tb-error404-wrap'),
                        )
                        
                    )
                    
                );
				/*Footer*/
                $this->sections[] = array(
                    'title'  => esc_html__( 'Footer', 'medicare' ),
                    'desc'   => esc_html__( '', 'medicare' ),
                    'icon'   => 'el-icon-file-edit',
                    'fields' => array(
                        array(
                            'id'       => 'jws_theme_display_footer',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Display Footer', 'medicare' ),
                            'subtitle' => esc_html__( 'Display footer.', 'medicare' ),
                            'default'  => true,
                        ),
                        array( 
                            'id'       => 'jws_theme_footer_layout',
                            'type'     => 'image_select',
                            'title'    => esc_html__('Footer Layout', 'medicare'),
                            'subtitle' => esc_html__('Select footer layout in your site.', 'medicare'),
                            'options'  => array(
                                'v1'    => array(
                                    'alt'   => 'Footer 1',
                                    'img'   => JWS_THEME_URI_PATH.'/assets/images/footers/footer-v1.png'
                                )
                            ),
                            'default' => 'v1'
                        ),/*
                        array(
                            'id'       => 'jws_theme_footer_column',
                            'type'     => 'select',
                            'title'    => esc_html__('Footer Columns', 'medicare'),
                            'subtitle' => esc_html__('Select column of footer top.', 'medicare'),
                            'options'  => array(
                                '1' => '1 Column',
                                '2' => '2 Columns',
                                '3' => '3 Columns',
                                '4' => '4 Columns',
                                '5' => '5 Columns'
                            ),
                            'default'  => '5',
                        ),
                        array(
                            'id'       => 'jws_theme_footer_col1',
                            'type'     => 'text',
                            'title'    => esc_html__('Footer Column 1', 'medicare'),
                            'subtitle' => esc_html__('Please, Enter class boostrap and extra class. Ex: col-xs-12 col-sm-6 col-md-3 col-lg-3 el-class.', 'medicare'),
                            'default'  => 'col-xs-12 col-sm-12 col-md-3 col-lg-3',
                            'required' => array('jws_theme_footer_column','>=','1')
                        ),
                        array(
                            'id'       => 'jws_theme_footer_col2',
                            'type'     => 'text',
                            'title'    => esc_html__('Footer Column 2', 'medicare'),
                            'subtitle' => esc_html__('Please, Enter class boostrap and extra class. Ex: col-xs-12 col-sm-6 col-md-2 col-lg-2 el-class.', 'medicare'),
                            'default'  => 'col-xs-12 col-sm-12 col-md-2 col-lg-2',
                            'required' => array('jws_theme_footer_column','>=','2')
                        ),
                        array(
                            'id'       => 'jws_theme_footer_col3',
                            'type'     => 'text',
                            'title'    => esc_html__('Footer Column 3', 'medicare'),
                            'subtitle' => esc_html__('Please, Enter class boostrap and extra class. Ex: col-xs-12 col-sm-6 col-md-2 col-lg-2 el-class.', 'medicare'),
                            'default'  => 'col-xs-12 col-sm-12 col-md-2 col-lg-2',
                            'required' => array('jws_theme_footer_column','>=','3')
                        ),
                        array(
                            'id'       => 'jws_theme_footer_col4',
                            'type'     => 'text',
                            'title'    => esc_html__('Footer Column 4', 'medicare'),
                            'subtitle' => esc_html__('Please, Enter class boostrap and extra class. Ex: col-xs-12 col-sm-6 col-md-2 col-lg-2 el-class.', 'medicare'),
                            'default'  => 'col-xs-12 col-sm-12 col-md-2 col-lg-2',
                            'required' => array('jws_theme_footer_column','>=','4')
                        ),

                        array(
                            'id'       => 'jws_theme_footer_col5',
                            'type'     => 'text',
                            'title'    => esc_html__('Footer Column 5', 'medicare'),
                            'subtitle' => esc_html__('Please, Enter class boostrap and extra class. Ex: col-xs-12 col-sm-6 col-md-3 col-lg-3 el-class.', 'medicare'),
                            'default'  => 'col-xs-12 col-sm-12 col-md-3 col-lg-3',
                            'required' => array('jws_theme_footer_column','>=','5')
                        ),*/

                        array(
                            'id' => 'jws_theme_footer_margin',
                            'title' => 'Footer Margin',
                            'subtitle' => esc_html__('Please, Enter margin of Footer.', 'medicare'),
                            'type' => 'spacing',
                            'mode' => 'margin',
                            'units' => array('px'),
                            'output' => array('.jws_theme_footer'),
                            'default' => array(
                                'margin-top'     => '0',
                                'margin-right'   => '0',
                                'margin-bottom'  => '0',
                                'margin-left'    => '0',
                                'units'          => 'px', 
                            )
                        ),
                        array(
                            'id' => 'jws_theme_footer_padding',
                            'title' => 'Footer Padding',
                            'subtitle' => esc_html__('Please, Enter padding of Footer.', 'medicare'),
                            'type' => 'spacing',
                            'units' => array('px'),
                            'output' => array('.jws_theme_footer'),
                            'default' => array(
                                'padding-top'     => '0',
                                'padding-right'   => '0',
                                'padding-bottom'  => '0',
                                'padding-left'    => '0',
                                'units'          => 'px', 
                            )
                        ),

                        
                    )
                    
                );
                    /* Footer top */
				$this->sections[] = array(
                    'title'  => esc_html__( 'Footer Top', 'medicare' ),
                    'desc'   => esc_html__( '', 'medicare' ),
                    'icon'   => 'el-icon-file-edit',
                    'subsection' => true,
                    'fields' => array(
                        array(
                            'id'       => 'jws_theme_footer_top_bg',
                            'type'     => 'background',
                            'title'    => esc_html__('Footer Background', 'medicare'),
                            'subtitle' => esc_html__('Footer background with image, color, etc.', 'medicare'),
                            'default'  => array(
                                'background-color' => '#012345',
                            ),
                            'output' => array('.jws_theme_footer .footer-top'),
                        ),
                        array(
                            'id'       => 'jws_theme_footer_top_column',
                            'type'     => 'select',
                            'title'    => esc_html__('Footer Top Columns', 'medicare'),
                            'subtitle' => esc_html__('Select column of footer top.', 'medicare'),
                            'options'  => array(
                                '1' => '1 Column',
                                '2' => '2 Columns',
                                '3' => '3 Columns',
                                '4' => '4 Columns',
								'5' => '5 Columns'
                            ),
                            'default'  => '1',
                        ),
                        array(
                            'id'       => 'jws_theme_footer_top_col1',
                            'type'     => 'text',
                            'title'    => esc_html__('Footer Top Column 1', 'medicare'),
                            'subtitle' => esc_html__('Please, Enter class boostrap and extra class. Ex: col-xs-12 col-sm-6 col-md-12 col-lg-12 el-class.', 'medicare'),
                            'default'  => 'col-xs-12 col-sm-12 col-md-12',
                            'required' => array('jws_theme_footer_top_column','>=','1')
                        ),
                        array(
                            'id'       => 'jws_theme_footer_top_col2',
                            'type'     => 'text',
                            'title'    => esc_html__('Footer Top Column 2', 'medicare'),
                            'subtitle' => esc_html__('Please, Enter class boostrap and extra class. Ex: col-xs-12 col-sm-6 col-md-3 col-lg-3 el-class.', 'medicare'),
                            'default'  => 'col-xs-12 col-sm-6 col-md-3',
                            'required' => array('jws_theme_footer_top_column','>=','2')
                        ),
                        array(
                            'id'       => 'jws_theme_footer_top_col3',
                            'type'     => 'text',
                            'title'    => esc_html__('Footer Top Column 3', 'medicare'),
                            'subtitle' => esc_html__('Please, Enter class boostrap and extra class. Ex: col-xs-12 col-sm-6 col-md-3 col-lg-3 el-class.', 'medicare'),
                            'default'  => 'col-xs-12 col-sm-6 col-md-3',
                            'required' => array('jws_theme_footer_top_column','>=','3')
                        ),
                        array(
                            'id'       => 'jws_theme_footer_top_col4',
                            'type'     => 'text',
                            'title'    => esc_html__('Footer Top Column 4', 'medicare'),
                            'subtitle' => esc_html__('Please, Enter class boostrap and extra class. Ex: col-xs-12 col-sm-6 col-md-3 col-lg-3 el-class.', 'medicare'),
                            'default'  => 'col-xs-12 col-sm-6 col-md-3',
                            'required' => array('jws_theme_footer_top_column','>=','4')
                        ),
						array(
                            'id'       => 'jws_theme_footer_top_col5',
                            'type'     => 'text',
                            'title'    => esc_html__('Footer Top Column 5', 'medicare'),
                            'subtitle' => esc_html__('Please, Enter class boostrap and extra class. Ex: col-xs-12 col-sm-6 col-md-2 col-lg-2 el-class.', 'medicare'),
                            'default'  => 'col-xs-12 col-sm-6 col-md-2',
                            'required' => array('jws_theme_footer_top_column','>=','5')
                        ),
                        array(
                            'id' => 'jws_theme_footer_top_margin',
                            'title' => 'Footer Top Margin',
                            'subtitle' => esc_html__('Please, Enter margin of Footer Top.', 'medicare'),
                            'type' => 'spacing',
                            'mode' => 'margin',
                            'units' => array('px'),
                            'output'  => array('.jws_theme_footer .footer-top'),
                            'default' => array(
                                'margin-top'     => '0',
                                'margin-right'   => '0',
                                'margin-bottom'  => '0',
                                'margin-left'    => '0',
                                'units'          => 'px', 
                            )
                        ),
                        array(
                            'id' => 'jws_theme_footer_top_padding',
                            'title' => 'Footer Top Padding',
                            'subtitle' => esc_html__('Please, Enter padding of Footer Top.', 'medicare'),
                            'type' => 'spacing',
                            'units' => array('px'),
                            'output'  => array('.jws_theme_footer .footer-top'),
                            'default' => array(
                                'padding-top'     => '0', 
                                'padding-right'   => '0',
                                'padding-bottom'  => '40px', 
                                'padding-left'    => '0',
                                'units'          => 'px',
                            )
                        ),
                    )
                    
                );
                    /* footer center*/
                $this->sections[] = array(
                    'title'  => esc_html__( 'Footer Center', 'medicare' ),
                    'desc'   => esc_html__( '', 'medicare' ),
                    'icon'   => 'el-icon-file-edit',
                    'subsection' => true,
                    'fields' => array(
                        array(
                            'id'       => 'jws_theme_footer_center_bg',
                            'type'     => 'background',
                            'title'    => esc_html__('Footer Background', 'medicare'),
                            'subtitle' => esc_html__('Footer background with image, color, etc.', 'medicare'),
                            'default'  => array(
                                'background-color' => '#012345',
                            ),
                            'output' => array('.jws_theme_footer .footer-center'),
                        ),
                        array(
                            'id'       => 'jws_theme_footer_center_column',
                            'type'     => 'select',
                            'title'    => esc_html__('Footer Center Columns', 'medicare'),
                            'subtitle' => esc_html__('Select column of footer center.', 'medicare'),
                            'options'  => array(
                                '1' => '1 Column',
                                '2' => '2 Columns',
                                '3' => '3 Columns',
                                '4' => '4 Columns',
								'5' => '5 Columns'
                            ),
                            'default'  => '4',
                        ),
                        array(
                            'id'       => 'jws_theme_footer_center_col1',
                            'type'     => 'text',
                            'title'    => esc_html__('Footer Center Column 1', 'medicare'),
                            'subtitle' => esc_html__('Please, Enter class boostrap and extra class. Ex: col-xs-12 col-sm-6 col-md-3 col-lg-3 el-class.', 'medicare'),
                            'default'  => 'col-xs-12 col-sm-6 col-md-3 col-lg-3',
                            'required' => array('jws_theme_footer_center_column','>=','1')
                        ),
                        array(
                            'id'       => 'jws_theme_footer_center_col2',
                            'type'     => 'text',
                            'title'    => esc_html__('Footer Center Column 2', 'medicare'),
                            'subtitle' => esc_html__('Please, Enter class boostrap and extra class. Ex: col-xs-12 col-sm-6 col-md-3 col-lg-3 el-class.', 'medicare'),
                            'default'  => 'col-xs-12 col-sm-6 col-md-2 col-lg-2',
                            'required' => array('jws_theme_footer_center_column','>=','2')
                        ),
                        array(
                            'id'       => 'jws_theme_footer_center_col3',
                            'type'     => 'text',
                            'title'    => esc_html__('Footer Center Column 3', 'medicare'),
                            'subtitle' => esc_html__('Please, Enter class boostrap and extra class. Ex: col-xs-12 col-sm-6 col-md-3 col-lg-3 el-class.', 'medicare'),
                            'default'  => 'col-xs-12 col-sm-6 col-md-2 col-lg-2',
                            'required' => array('jws_theme_footer_center_column','>=','3')
                        ),
                        array(
                            'id'       => 'jws_theme_footer_center_col4',
                            'type'     => 'text',
                            'title'    => esc_html__('Footer Center Column 4', 'medicare'),
                            'subtitle' => esc_html__('Please, Enter class boostrap and extra class. Ex: col-xs-12 col-sm-6 col-md-3 col-lg-3 el-class.', 'medicare'),
                            'default'  => 'col-xs-12 col-sm-6 col-md-2 col-lg-2',
                            'required' => array('jws_theme_footer_center_column','>=','4')
                        ),
						array(
                            'id'       => 'jws_theme_footer_center_col5',
                            'type'     => 'text',
                            'title'    => esc_html__('Footer Center Column 5', 'medicare'),
                            'subtitle' => esc_html__('Please, Enter class boostrap and extra class. Ex: col-xs-12 col-sm-6 col-md-3 col-lg-3 el-class.', 'medicare'),
                            'default'  => 'col-xs-12 col-sm-6 col-md-3 col-lg-3',
                            'required' => array('jws_theme_footer_center_column','>=','5')
                        ),
                        array(
                            'id' => 'jws_theme_footer_center_margin',
                            'title' => 'Footer Center Margin',
                            'subtitle' => esc_html__('Please, Enter margin of Footer Center.', 'medicare'),
                            'type' => 'spacing',
                            'mode' => 'margin',
                            'units' => array('px'),
                            'output'  => array('.jws_theme_footer .footer-center'),
                            'default' => array(
                                'margin-top'     => '0',
                                'margin-right'   => '0',
                                'margin-bottom'  => '0',
                                'margin-left'    => '0',
                                'units'          => 'px', 
                            )
                        ),
                        array(
                            'id' => 'jws_theme_footer_center_padding',
                            'title' => 'Footer Center Padding',
                            'subtitle' => esc_html__('Please, Enter padding of Footer Center.', 'medicare'),
                            'type' => 'spacing',
                            'units' => array('px'),
                            'output'  => array('.jws_theme_footer .footer-center'),
                            'default' => array(
                                'padding-top'     => '25px', 
                                'padding-right'   => '0',
                                'padding-bottom'  => '40px', 
                                'padding-left'    => '0',
                                'units'          => 'px',
                            )
                        ),
                    )
                    
                );
                /*Footer Bottom*/
                $this->sections[] = array(
                    'title'  => esc_html__( 'Footer Bottom', 'medicare' ),
                    'desc'   => esc_html__( '', 'medicare' ),
                    'icon'   => 'el-icon-file-edit',
                    'subsection' => true,
                    'fields' => array(
                        array(
                            'id'       => 'jws_theme_footer_bottom_bg',
                            'type'     => 'background',
                            'title'    => esc_html__('Footer Background', 'medicare'),
                            'subtitle' => esc_html__('Footer background with image, color, etc.', 'medicare'),
                            'default'  => array(
                                'background-color' => '#012345',
                            ),
                            'output' => array('.jws_theme_footer .footer-bottom'),
                        ),
                        array(
                            'id'       => 'jws_theme_footer_bottom_column',
                            'type'     => 'select',
                            'title'    => esc_html__('Footer Bottom Columns', 'medicare'),
                            'subtitle' => esc_html__('Select column of footer bottom.', 'medicare'),
                            'options'  => array(
                                '1' => '1 Column',
                                '2' => '2 Columns'
                            ),
                            'default'  => '2',
                        ),
                        array(
                            'id'       => 'jws_theme_footer_bottom_col1',
                            'type'     => 'text',
                            'title'    => esc_html__('Footer Bottom Column 1', 'medicare'),
                            'subtitle' => esc_html__('Please, Enter class boostrap and extra class. Ex: col-xs-12 col-sm-6 col-md-6 col-lg-6 el-class.', 'medicare'),
                            'default'  => 'col-xs-12 col-sm-6 col-md-6 col-lg-6',
                            'required' => array('jws_theme_footer_bottom_column','>=','1')
                        ),
                        array(
                            'id'       => 'jws_theme_footer_bottom_col2',
                            'type'     => 'text',
                            'title'    => esc_html__('Footer Bottom Column 2', 'medicare'),
                            'subtitle' => esc_html__('Please, Enter class boostrap and extra class. Ex: col-xs-12 col-sm-6 col-md-6 col-lg-6 el-class.', 'medicare'),
                            'default'  => 'col-xs-12 col-sm-6 col-md-6 col-lg-6',
                            'required' => array('jws_theme_footer_bottom_column','>=','2')
                        ),
                        array(
                            'id' => 'jws_theme_footer_bottom_margin',
                            'title' => 'Footer Bottom Margin',
                            'subtitle' => esc_html__('Please, Enter margin of Footer Bottom.', 'medicare'),
                            'type' => 'spacing',
                            'mode' => 'margin',
                            'units' => array('px'),
                            'output'  => array('.jws_theme_footer .footer-bottom'),
                            'default' => array(
                                'margin-top'     => '0',
                                'margin-right'   => '0',
                                'margin-bottom'  => '0',
                                'margin-left'    => '0',
                                'units'          => 'px', 
                            )
                        ),
                        array(
                            'id' => 'jws_theme_footer_bottom_padding',
                            'title' => 'Footer Bottom Padding',
                            'subtitle' => esc_html__('Please, Enter padding of Footer Bottom.', 'medicare'),
                            'type' => 'spacing',
                            'units' => array('px'),
                            'output'  => array('.jws_theme_footer .footer-bottom'),
                            'default' => array(
                                'padding-top'     => '20px', 
                                'padding-right'   => '0',
                                'padding-bottom'  => '20px', 
                                'padding-left'    => '0',
                                'units'          => 'px', 
                            )
                        ),
                    )
                );
                /*Styling Setting*/
                $this->sections[] = array(
                    'title'  => esc_html__( 'Styling Options', 'medicare' ),
                    'desc'   => esc_html__( '', 'medicare' ),
                    'icon'   => 'el-icon-tint',
                    'fields' => array(
                        array(
                            'id'       => 'jws_theme_primary_color',
                            'type'     => 'color',
                            'title'    => esc_html__('Primary Color', 'medicare'),
                            'subtitle' => esc_html__('Controls several items, ex: link hovers, highlights, and more. (default: #00aeef).', 'medicare'),
                            'default'  => '#00aeef',
                            'validate' => 'color',
                        ),
                        array(
                            'id'       => 'jws_theme_common_color',
                            'type'     => 'color',
                            'title'    => esc_html__('Common  Color', 'medicare'),
                            'subtitle' => esc_html__('Controls text color for nomal', 'medicare'),
                            'default'  => '#898989',
                            'validate' => 'color',
                        ),
                        array(
                            'id'       => 'jws_theme_common_color_2',
                            'type'     => 'color',
                            'title'    => esc_html__('Common  Color', 'medicare'),
                            'subtitle' => esc_html__('Controls common color', 'medicare'),
                            'default'  => '#f06eaa',
                            'validate' => 'color',
                        ),
                    )
                    
                );
				
				/* Typography Setting */
				$this->sections[] = array(
                    'title'  => esc_html__( 'Typography', 'medicare' ),
                    'desc'   => esc_html__( '', 'medicare' ),
                    'icon'   => 'el-icon-font',
                    'fields' => array(
						/*Body font*/
						array(
							'id'          => 'jws_theme_body_font',
							'type'        => 'typography', 
							'title'       => esc_html__('Body Font Options', 'medicare'),
							'google'      => true, 
							'font-backup' => true,
							'output'      => array('body'),
							'units'       =>'px',
							'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'medicare'),
							'default'     => array(
								'google'      => true,
								'color'       => '#898989',
								'font-family' => 'Source Sans Pro',
								'font-size'   => '15px', 
								'line-height' => '24px',
								'font-weight' => '400',
                                'text-align'    => 'justify'
							),
						),
						array(
							'id'          => 'jws_theme_h1_font',
							'type'        => 'typography', 
							'title'       => esc_html__('H1 Font Options', 'medicare'),
							'google'      => true,
							'font-backup' => true,
							'letter-spacing' => true,
							'output'      => array('body h1'),
							'units'       =>'px',
							'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'medicare'),
							'default'     => array(
								'google'      => true,
								'color'       => '#000',
								'font-family' => 'Source Sans Pro',
								'font-size'   => '40px', 
								'line-height' => '40px',
								'font-weight' => '700'
							),
						),
						array(
							'id'          => 'jws_theme_h2_font',
							'type'        => 'typography', 
							'title'       => esc_html__('H2 Font Options', 'medicare'),
							'google'      => true, 
							'font-backup' => true,
							'letter-spacing' => true,
							'output'      => array('body h2'),
							'units'       =>'px',
							'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'medicare'),
							'default'     => array(
								'google'      => true,
								'color'       => '#000', 
								'font-family' => 'Source Sans Pro', 
								'font-size'   => '30px', 
								'line-height' => '30px',
                                'font-weight' => '700'
							),
						),
						array(
							'id'          => 'jws_theme_h3_font',
							'type'        => 'typography', 
							'title'       => esc_html__('H3 Font Options', 'medicare'),
							'google'      => true, 
							'font-backup' => true,
							'letter-spacing' => true,
							'output'      => array('body h3'),
							'units'       =>'px',
							'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'medicare'),
							'default'     => array(
								'google'      => true,
								'color'       => '#898989', 
								'font-family' => 'Source Sans Pro',
								'font-size'   => '24px', 
								'line-height' => '29px',
                                'font-weight' => '700'
							),
						),
						array(
							'id'          => 'jws_theme_h4_font',
							'type'        => 'typography', 
							'title'       => esc_html__('H4 Font Options', 'medicare'),
							'google'      => true, 
							'font-backup' => true,
							'letter-spacing' => true,
							'output'      => array('body h4'),
							'units'       =>'px',
							'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'medicare'),
							'default'     => array(
								'google'      => true,
								'color'       => '#898989',
								'font-family' => 'Source Sans Pro',
								'font-size'   => '20px', 
								'line-height' => '22px'
							),
						),
						array(
							'id'          => 'jws_theme_h5_font',
							'type'        => 'typography', 
							'title'       => esc_html__('H5 Font Options', 'medicare'),
							'google'      => true, 
							'font-backup' => true,
							'letter-spacing' => true,
							'output'      => array('body h5'),
							'units'       =>'px',
							'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'medicare'),
							'default'     => array(
								'google'      => true,
								'color'       => '#898989',
								'font-family' => 'Source Sans Pro', 
								'font-size'   => '18px', 
								'line-height' => '19px'
							),
						),
						array(
							'id'          => 'jws_theme_h6_font',
							'type'        => 'typography', 
							'title'       => esc_html__('H6 Font Options', 'medicare'),
							'google'      => true, 
							'font-backup' => true,
							'letter-spacing' => true,
							'output'      => array('body h6'),
							'units'       =>'px',
							'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'medicare'),
							'default'     => array(
								'google'      => true,
								'color'       => '#898989',
                                'font-family' => 'Source Sans Pro', 
                                'font-size'   => '16px', 
                                'line-height' => '17px'
							),
						),
					)
				);
				$this->sections[] = array(
					'title' => esc_html__('Extra Fonts', 'medicare'),
					'icon' => 'el el-fontsize',
					'subsection' => true,
					'fields' => array(
						array(
							'id' => 'google-font-1',
							'type' => 'typography',
							'subtitle' => esc_html__('Set font family for content... extend class "font-medicare-1"', 'medicare' ),
							'title' => esc_html__('Font 1', 'medicare'),
							'google' => true,
							'font-backup' => false,
							'font-style' => false,
							'color' => '#898989',
							'text-align'=> 'justify',
							'line-height'=>'24px',
							'font-size'=> '14px',
							'subsets'=> false,
							'output'=> array('.font-medicare-1'),
							'default' => array(
								'font-family' => 'Source Sans Pro',
								//'font-weight'=> '400',
							)
						),
						array(
							'id' => 'google-font-2',
							'type' => 'typography',
							'subtitle' => esc_html__('Set font family for heading... extend class "font-medicare-2"(light background)', 'medicare' ),
							'title' => esc_html__('Font 2', 'medicare'),
							'google' => true,
                            'font-backup' => false,
                            'font-style' => false,
                            'color' => '#898989',
                            'text-align'=> false,
                            'line-height'=>'27px',
                            'font-size'=> '16px',
                            'subsets'=> false,
                            'output'=> array('.font-medicare-2'),
                            'default' => array(
                                'font-family' => 'Dosis',
                                //'font-weight'=> '700',
                            )
						),
						/*
						array(
							'id' => 'google-font-3',
							'type' => 'typography',
							'subtitle' => esc_html__('Set font family for heading... extend class "font-medicare-3".(dark background)', 'medicare' ),
							'title' => esc_html__('Font 3', 'medicare'),
							'google' => true,
							'font-backup' => false,
							'font-style' => false,
							'color' => '#fff',
							'text-align'=> false,
							'line-height'=>'27',
							'font-size'=> '16',
							'subsets'=> false,
							'output'=> array('.font-medicare-3'),
							'default' => array(
								'font-family' => 'Dosis',
								'font-weight'=> '700',
								'color' => '#fff',
							)
						),
						array(
							'id' => 'google-font-4',
							'type' => 'typography',
							'subtitle' => esc_html__('Set font family for heading... extend class "font-medicare-3" Font Source Sans Pro Bold', 'medicare' ),
							'title' => esc_html__('Font 4', 'medicare'),
							'google' => true,
							'font-backup' => false,
							'font-style' => false,
							'color' => false,
							'text-align'=> false,
							'line-height'=>false,
							'font-size'=> false,
							'subsets'=> false,
							'output'=> array('.font-medicare-4'),
							'default' => array(
								'font-family' => 'Source Sans Pro',
								'font-weight'=> '700',
							)
						),*/
					)
				);
				/* Typography Setting */
				
				/*Title Bar Setting*/
				$this->sections[] = array(
                    'title'  => esc_html__( 'Title Bar', 'medicare' ),
                    'desc'   => esc_html__( '', 'medicare' ),
                    'icon'   => 'el-icon-livejournal',
                    'fields' => array(
						array(
                            'id'       => 'jws_theme_display_page_title',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show page title', 'medicare' ),
                            'subtitle' => esc_html__( 'Show page title', 'medicare' ),
                            'default'  => true,
                        ),
						array(
							'id' => 'jws_theme_title_bar_typography',
							'type' => 'typography',
							'title' => esc_html__('Typography', 'medicare'),
							'google' => true,
							'font-backup' => true,
							'all_styles' => true,
							'output'  => array('.title-bar .page-title'),
							'units' => 'px',
							'subtitle' => esc_html__('Typography option with title text.', 'medicare'),
							'default' => array(
								'color' => '#fff',
								'font-style' => 'normal',
								'font-weight' => '700',
								'font-family' => 'Dosis',
								'google' => true,
								'font-size' => '24px',
								'line-height' => '40px',
								'text-align' => 'left',
                                'text-transform' => 'uppercase'
							)
						),
						array(
							'id'       => 'jws_theme_title_bar_bg',
							'type'     => 'background',
							'title'    => esc_html__('Background', 'medicare'),
							'subtitle' => esc_html__('background with image, color, etc.', 'medicare'),
							'default'  => array(
								'background-color' => 'transparent',
								'background-image' => JWS_THEME_URI_PATH.'/assets/images/title_bars/bg-pagetitle.jpg',
								'background-repeat'=>'no-repeat',
								'background-position'=>'center bottom'
							),
							'output' => array('.title-bar, .title-bar-shop'),
						),
						// array(
						// 	'id' => 'jws_theme_title_bar_margin',
						// 	'title' => 'Margin',
						// 	'subtitle' => esc_html__('Please, Enter margin of title bar.', 'medicare'),
						// 	'type' => 'spacing',
						// 	'mode' => 'margin',
						// 	'units' => array('px'),
						// 	'output' => array('.title-bar, .title-bar-shop'),
						// 	'default' => array(
						// 		'margin-top'     => '0',
						// 		'margin-right'   => '0',
						// 		'margin-bottom'  => '0',
						// 		'margin-left'    => '0',
						// 		'units'          => 'px', 
						// 	)
						// ),
						array(
							'id' => 'jws_theme_title_bar_padding',
							'title' => 'Padding',
							'subtitle' => esc_html__('Please, Enter padding of title bar.', 'medicare'),
							'type' => 'spacing',
							'units' => array('px'),
							'output' => array('.title-bar, .title-bar-shop'),
							'default' => array(
								'padding-top'     => '70px', 
								'padding-right'   => '0',
								'padding-bottom'  => '70px', 
								'padding-left'    => '0',
								'units'          => 'px', 
							)
						),
						array(
							'id'       => 'jws_theme_page_breadcrumb_delimiter',
							'type'     => 'text',
							'title'    => esc_html__('Delimiter', 'medicare'),
							'subtitle' => esc_html__('Please, Enter Delimiter of page breadcrumb in title bar.', 'medicare'),
							'default'  => '\\'
						)
					)
				);
				/* Breadcrumb */
				$this->sections[] = array(
					'title' => esc_html__('Breadcrumb', 'medicare'),
					'icon' => 'el-icon-livejournal',
					// 'subsection' => true,
					'fields' => array(
                        array(
                            'id'       => 'jws_theme_display_breadcrumb',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Breadcrumb', 'medicare' ),
                            'subtitle' => esc_html__( 'Show Breadcrumb', 'medicare' ),
                            'default'  => true,
                        )
					)
				);

                /* Search Bar */
                $this->sections[] = array(
                    'title' => esc_html__('Search Bar', 'medicare'),
                    'icon' => 'el-icon-livejournal',
                    // 'subsection' => true,
                    'fields' => array(
                        array(
                            'id'       => 'jws_theme_display_searchbar',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Search Bar', 'medicare' ),
                            'subtitle' => esc_html__( 'Show Search Bar', 'medicare' ),
                            'default'  => true,
                        )
                    )
                );
				
				/* Page Setting */
				$this->sections[] = array(
					'title'  => esc_html__( 'Page Setting', 'medicare' ),
					'desc'   => esc_html__( '', 'medicare' ),
					'icon'   => 'el-icon-file-edit',
					'fields' => array(
						array(
                            'id'       => 'jws_theme_show_page_comment',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Page Comment', 'medicare' ),
							'default'  => true,
                        ),
					)
				);
				
				/*Post Setting*/
				$this->sections[] = array(
					'title'  => esc_html__( 'Post Setting', 'medicare' ),
					'desc'   => esc_html__( '', 'medicare' ),
					'icon'   => 'el-icon-file-edit',
					'fields' => array()
				);
				$this->sections[] = array(
                    'title'  => esc_html__( 'Archive Post', 'medicare' ),
                    'desc'   => esc_html__( '', 'medicare' ),
                    'icon'   => '',
					'subsection' => true,
                    'fields' => array(
						array( 
							'id'       => 'jws_theme_blog_layout',
							'type'     => 'image_select',
							'title'    => esc_html__('Select Layout', 'medicare'),
							'subtitle' => esc_html__('Select layout of archive post.', 'medicare'),
							'options'  => array(
								'1col'	=> array(
										'alt'   => '1col',
										'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/1col.png'
									),
								/* '2cl'	=> array(
											'alt'   => '2cl',
											'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/2cl.png'
										),/**/ 
								'2cr'	=> array(
											'alt'   => '2cr',
											'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/2cr.png'
										),
								/* '3cm'	=> array(
											'alt'   => '3cm',
											'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/3cm.png'
										)/**/ 
							),
							'default' => '2cr'
						),
						array(
							'id'       => 'jws_theme_blog_image_default',
							'type'     => 'media',
							'url'      => true,
							'title'    => esc_html__('Image Default', 'medicare'),
							'subtitle' => esc_html__('Select an image file for image feature post.', 'medicare'),
							'default'  => array(
								'url'	=> ''
							),
						),
						array(
                            'id'       => 'jws_theme_blog_crop_image',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Crop Image', 'medicare' ),
                            'subtitle' => esc_html__( 'Crop or not crop image of post on your archive post.', 'medicare' ),
							'default'  => true,
                        ),
						array(
							'id'       => 'jws_theme_blog_image_width',
							'type'     => 'text',
							'title'    => esc_html__('Image Width', 'medicare'),
							'subtitle' => esc_html__('Please, Enter the width of image on your archive post. Default: 870.', 'medicare'),
							'indent'   => true,
                            'required' => array( 'jws_theme_blog_crop_image', "=", 1 ),
							'default'  => '870'
						),
						array(
							'id'       => 'jws_theme_blog_image_height',
							'type'     => 'text',
							'title'    => esc_html__('Image Height', 'medicare'),
							'subtitle' => esc_html__('Please, Enter the height of image on your archive post. Default: 430.', 'medicare'),
							'indent'   => true,
                            'required' => array( 'jws_theme_blog_crop_image', "=", 1 ),
							'default'  => '430'
						),
						array(
                            'id'       => 'jws_theme_blog_show_post_title',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Post Title', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not title of post on your archive post.', 'medicare' ),
							'default'  => true,
                        ),
						array(
                            'id'       => 'jws_theme_blog_show_post_info',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Post Info', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not info of post on your archive post.', 'medicare' ),
							'default'  => true,
                        ),
						array(
                            'id'       => 'jws_theme_blog_show_post_desc',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Post Description', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not description of post on your archive post.', 'medicare' ),
							'default'  => true,
                        ),
						array(
                            'id'       => 'jws_theme_blog_post_excerpt_leng',
                            'type'     => 'text',
                            'title'    => esc_html__( 'Excerpt Leng', 'medicare' ),
                            'subtitle' => esc_html__( 'Insert the number of words you want to show in the post excerpts.', 'medicare' ),
							'default'  => '50',
                        ),
						array(
                            'id'       => 'jws_theme_blog_post_excerpt_more',
                            'type'     => 'text',
                            'title'    => esc_html__( 'Excerpt More', 'medicare' ),
                            'subtitle' => esc_html__( 'Insert the character of words you want to show in the post excerpts.', 'medicare' ),
							'default'  => '...',
                        ),
                        array(
                            'id'       => 'jws_theme_blog_post_readmore',
                            'type'     => 'text',
                            'title'    => esc_html__( 'Read More text', 'medicare' ),
                            'subtitle' => esc_html__( 'Enter name of readmore text', 'medicare' ),
                            'default'  => '',
                        ),
					)
				);
				/*Single Post*/
				$this->sections[] = array(
                    'title'  => esc_html__( 'Single Post', 'medicare' ),
                    'desc'   => esc_html__( '', 'medicare' ),
                    'icon'   => '',
					'subsection' => true,
                    'fields' => array(
						array( 
							'id'       => 'jws_theme_post_layout',
							'type'     => 'image_select',
							'title'    => esc_html__('Select Layout', 'medicare'),
							'subtitle' => esc_html__('Select layout of single blog.', 'medicare'),
							'options'  => array(
								'1col'	=> array(
										'alt'   => '1col',
										'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/1col.png'
									),/*
								'2cl'	=> array(
											'alt'   => '2cl',
											'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/2cl.png'
										),*/
								'2cr'	=> array(
											'alt'   => '2cr',
											'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/2cr.png'
										),/*
								'3cm'	=> array(
											'alt'   => '3cm',
											'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/3cm.png'
										)*/
							),
							'default' => '2cr'
						),
						array(
                            'id'       => 'jws_theme_post_display_page_title',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Title Bar', 'medicare' ),
                            'subtitle' => esc_html__( 'Display title bar or not.', 'medicare' ),
							'default'  => true,
                        ),
						array(
                            'id'       => 'jws_theme_post_crop_image',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Crop Image', 'medicare' ),
                            'subtitle' => esc_html__( 'Crop or not crop image of post on your single blog.', 'medicare' ),
							'default'  => true,
                        ),
						array(
							'id'       => 'jws_theme_post_image_width',
							'type'     => 'text',
							'title'    => esc_html__('Image Width', 'medicare'),
							'subtitle' => esc_html__('Please, Enter the width of image on your single blog. Default: 870.', 'medicare'),
							'indent'   => true,
                            'required' => array( 'jws_theme_post_crop_image', "=", 1 ),
							'default'  => '870'
						),
						array(
							'id'       => 'jws_theme_post_image_height',
							'type'     => 'text',
							'title'    => esc_html__('Image Height', 'medicare'),
							'subtitle' => esc_html__('Please, Enter the height of image on your single blog. Default: 430.', 'medicare'),
							'indent'   => true,
                            'required' => array( 'jws_theme_post_crop_image', "=", 1 ),
							'default'  => '430'
						),
						array(
                            'id'       => 'jws_theme_post_show_post_title',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Post Title', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not title of post on your single blog.', 'medicare' ),
							'default'  => true,
                        ),
						array(
                            'id'       => 'jws_theme_post_show_social_share',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Social Share', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not social share of post on your single blog.', 'medicare' ),
							'default'  => true,
                        ),
						array(
                            'id'       => 'jws_theme_post_show_post_info',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Post Info', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not info of post on your single blog.', 'medicare' ),
							'default'  => true,
                        ),
						array(
                            'id'       => 'jws_theme_post_show_post_nav',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Post Navigation', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not post navigation on your single blog.', 'medicare' ),
							'default'  => false,
                        ),
						array(
                            'id'       => 'jws_theme_post_show_post_tags',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Post Tags', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not post tags on your single blog.', 'medicare' ),
							'default'  => true,
                        ),
						array(
                            'id'       => 'jws_theme_post_show_post_author',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Post Author', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not post author on your single blog.', 'medicare' ),
							'default'  => true,
                        ),
						array(
                            'id'       => 'jws_theme_post_show_post_comment',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Post Comment', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not post comment on your single blog.', 'medicare' ),
							'default'  => true,
                        ),
                        array(
                            'id'       => 'jws_theme_post_show_post_about_author',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show About Author', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not about author on your single blog.', 'medicare' ),
                            'default'  => true,
                        ),
						array(
                            'id'       => 'jws_theme_post_show_post_related',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Post Related', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not post related on your single blog.', 'medicare' ),
							'default'  => true,
                        ),
                        array(
                            'id'       => 'jws_theme_post_no_post_related',
                            'type'     => 'text',
                            'title'    => esc_html__( 'Number Post on Related', 'medicare' ),
                            'subtitle' => esc_html__( 'Enter number post related on your single blog.', 'medicare' ),
                            'default'  => 3,
                        )
					)
				);

                /*
				$this->sections[] = array(
                    'title'  => esc_html__( 'Archive Portfolio', 'medicare' ),
                    'desc'   => esc_html__( '', 'medicare' ),
                    'icon'   => '',
                    'subsection' => true,
                    'fields' => array(
                        /* array( 
                            'id'       => 'jws_theme_portfolio_layout',
                            'type'     => 'image_select',
                            'title'    => esc_html__('Select Layout', 'medicare'),
                            'subtitle' => esc_html__('Select layout of archive Portfolio.', 'medicare'),
                            'options'  => array(
                                '1col'  => array(
                                        'alt'   => '1col',
                                        'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/1col.png'
                                    ),
                                '2cl'   => array(
                                            'alt'   => '2cl',
                                            'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/2cl.png'
                                        ),
                                '2cr'   => array(
                                            'alt'   => '2cr',
                                            'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/2cr.png'
                                        ),
                                '3cm'   => array(
                                            'alt'   => '3cm',
                                            'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/3cm.png'
                                        )
                            ),
                            'default' => '1col'
                        ),
                        array(
                            'id'       => 'jws_theme_archive_portfolio_template',
                            'type'     => 'select',
                            'title'    => esc_html__('Portfolio Template', 'medicare'),
                            'options'  => array(
                                "tpl1" => esc_html__("Template 1 ( Overlay effect )",'medicare'),
                                "tpl2" => esc_html__("Template 2 ( Overlay effect With Icon )",'medicare'),
                                "tpl" => esc_html__("Default",'medicare')
                            ),
                            'default'  => 'tpl',
                        ), 
                        array(
                            'id'       => 'jws_theme_archive_portfolio_show_filter',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Filter', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not filter.', 'medicare' ),
                            'default'  => true,
                        ),
                        array(
                            'id'       => 'jws_theme_archive_portfolio_show_page',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Pagination', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not pagination.', 'medicare' ),
                            'default'  => true,
                        ),
                        array(
                            'id'       => 'jws_theme_archive_portfolio_no_pading',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'No Padding?', 'medicare' ),
                            'subtitle' => esc_html__( 'No padding in each items.', 'medicare' ),
                            'default'  => false,
                        ),
                        /* array(
                            'id'       => 'jws_theme_archive_portfolio_column',
                            'type'     => 'select',
                            'title'    => esc_html__('Columns', 'medicare'),
                            'options'  => array(
                                "4" => esc_html__("4 Columns",'medicare'),
                                "3" => esc_html__("3 Columns",'medicare'),

                                "2" => esc_html__("2 Columns",'medicare'),

                                "1" => esc_html__("1 Column",'medicare'),
                            ),
                            'default'  => '3',
                        ),
                        array(
                            'id'       => 'jws_theme_archive_portfolio_count',
                            'type'     => 'text',
                            'title'    => esc_html__('Count', 'medicare'),
                            'subtitle' => esc_html__('The number of posts to display on each page. Set to "-1" for display all posts on the page.', 'medicare')
                        ),
                        array(
                            'id'       => 'jws_theme_archive_portfolio_view_now',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show View Now', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not View Now of post in this element.', 'medicare' ),
                            'default'  => false,
                        ),
						
                        array(
                            'id'       => 'jws_theme_archive_portfolio_view_more',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show View More', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not View more of archive in this element.', 'medicare' ),
                            'default'  => true,
                        )
					
                        
                    )
                );/**/ 
				/*
				* Single Porfolio
				*/
                $this->sections[] = array(
                    'title'  => esc_html__( 'Single Porfolio', 'medicare' ),
                    'desc'   => esc_html__( '', 'medicare' ),
                    'icon'   => '',
                    'subsection' => true,
                    
					'fields' => array(
						
						//Layout
                        array( 
                            'id'       => 'jws_theme_portfolio_post_layout',
                            'type'     => 'image_select',
                            'title'    => esc_html__('Select Layout', 'medicare'),
                            'subtitle' => esc_html__('Select layout of single porfolio.', 'medicare'),
                            'options'  => array(
                                /*'1col'  => array(
                                        'alt'   => '1col',
                                        'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/1col.png'
                                    ),*/
                                '2cl'   => array(
                                            'alt'   => '2cl',
                                            'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/2cl_portfolio.png'
                                        ),
                                '2cr'   => array(
                                            'alt'   => '2cr',
                                            'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/2cr_portfolio.png'
                                        ),
                                /*'3cm'   => array(
                                            'alt'   => '3cm',
                                            'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/3cm.png'
                                        )*/
                            ),
                            'default' => '2cl'
                        ),
						array(
                            'id'       => 'jws_theme_portfolio_display_page_title',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Title Bar', 'medicare' ),
                            'subtitle' => esc_html__( 'Display title bar or not.', 'medicare' ),
							'default'  => true,
                        ),
						/*
                        array(
                            'id'       => 'jws_theme_portfolio_show_post_title',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Post Title', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not title of post on your single porfolio.', 'medicare' ),
                            'default'  => true,
                        ),
						*/
						array(
                            'id'       => 'jws_theme_portfolio_crop_image',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Crop Image', 'medicare' ),
                            'subtitle' => esc_html__( 'Crop or not crop image of post on your single blog.', 'medicare' ),
							'default'  => true,
                        ),
						array(
							'id'       => 'jws_theme_portfolio_image_width',
							'type'     => 'text',
							'title'    => esc_html__('Image Width', 'medicare'),
							'subtitle' => esc_html__('Please, Enter the width of image on your single blog. Default: 770.', 'medicare'),
							'indent'   => true,
                            'required' => array( 'jws_theme_portfolio_crop_image', "=", 1 ),
							'default'  => '770'
						),
						array(
							'id'       => 'jws_theme_portfolio_image_height',
							'type'     => 'text',
							'title'    => esc_html__('Image Height', 'medicare'),
							'subtitle' => esc_html__('Please, Enter the height of image on your single blog. Default: 570.', 'medicare'),
							'indent'   => true,
                            'required' => array( 'jws_theme_portfolio_crop_image', "=", 1 ),
							'default'  => '570'
						),
                        array(
                            'id'       => 'jws_theme_portfolio_show_post_info',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show post info', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not social share of post on your single porfolio.', 'medicare' ),
                            'default'  => false,
                        ),
						array(
                            'id'       => 'jws_theme_portfolio_show_social_share',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Social Share', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not social share of post on your single porfolio.', 'medicare' ),
                            'default'  => false,
                        ),
						
						
                        array(
                            'id'       => 'jws_theme_portfolio_show_post_nav',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Post Navigation', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not post navigation on your single porfolio.', 'medicare' ),
                            'default'  => false,
                        ),
                        /*
						array(
                            'id'       => 'jws_theme_portfolio_show_post_author',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Post Author', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not post author on your single porfolio.', 'medicare' ),
                            'default'  => false,
                        ),*/
						/*
                        array(
                            'id'       => 'jws_theme_portfolio_show_post_comment',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Post Comment', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not post comment on your single porfolio.', 'medicare' ),
                            'default'  => false,
                        ),
						*/
						/*
                        array(
                            'id'       => 'jws_theme_portfolio_show_post_related',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Post Related', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not post related on your single porfolio.', 'medicare' ),
                            'default'  => true,
                        ),
                        array(
                            'id'       => 'jws_theme_portfolio_no_post_related',
                            'type'     => 'text',
                            'title'    => esc_html__( 'Number Porfolio items on Related', 'medicare' ),
                            'subtitle' => esc_html__( 'Enter number porfolio item relate on your single porfolio.', 'medicare' ),
                            'default'  => 3
                        )*/
                    )
                );
				
				/*Services - Archive*/
				/*
				$this->sections[] = array(
                    'title'  => esc_html__( 'Archive Services', 'medicare' ),
                    'desc'   => esc_html__( '', 'medicare' ),
                    'icon'   => '',
                    'subsection' => true,
                    'fields' => array(
                        array( 
                            'id'       => 'jws_theme_services_layout',
                            'type'     => 'image_select',
                            'title'    => esc_html__('Select Layout', 'medicare'),
                            'subtitle' => esc_html__('Select layout of archive post.', 'medicare'),
                            'options'  => array(
                                '1col'  => array(
                                        'alt'   => '1col',
                                        'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/1col.png'
                                    ),
                                '2cl'   => array(
                                            'alt'   => '2cl',
                                            'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/2cl.png'
                                        ),
                                '2cr'   => array(
                                            'alt'   => '2cr',
                                            'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/2cr.png'
                                        ),
                                '3cm'   => array(
                                            'alt'   => '3cm',
                                            'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/3cm.png'
                                        )
                            ),
                            'default' => '1col'
                        ),
                        array(
                            'id'       => 'jws_theme_archive_services_template',
                            'type'     => 'select',
                            'title'    => esc_html__('Services Template', 'medicare'),
                            'options'  => array(
                                "tpl1" => esc_html__("Template 1 ( Overlay effect )",'medicare'),
                                "tpl2" => esc_html__("Template 2 ( Overlay effect With Icon )",'medicare'),
                                "tpl" => esc_html__("Default",'medicare')
                            ),
                            'default'  => 'tpl',
                        ),
                        array(
                            'id'       => 'jws_theme_archive_services_show_filter',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Filter', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not filter.', 'medicare' ),
                            'default'  => true,
                        ),
                        array(
                            'id'       => 'jws_theme_archive_services_show_page',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Pagination', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not pagination.', 'medicare' ),
                            'default'  => false,
                        ),
                        array(
                            'id'       => 'jws_theme_archive_services_no_pading',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'No Padding?', 'medicare' ),
                            'subtitle' => esc_html__( 'No padding in each items.', 'medicare' ),
                            'default'  => false,
                        ),
                        array(
                            'id'       => 'jws_theme_archive_services_column',
                            'type'     => 'select',
                            'title'    => esc_html__('Columns', 'medicare'),
                            'options'  => array(
                                "4" => esc_html__("4 Columns",'medicare'),
                                "3" => esc_html__("3 Columns",'medicare'),

                                "2" => esc_html__("2 Columns",'medicare'),

                                "1" => esc_html__("1 Column",'medicare'),
                            ),
                            'default'  => '3',
                        ),
                        array(
                            'id'       => 'jws_theme_archive_services_count',
                            'type'     => 'text',
                            'title'    => esc_html__('Count', 'medicare'),
                            'subtitle' => esc_html__('The number of posts to display on each page. Set to "-1" for display all posts on the page.', 'medicare')
                        ),
                        array(
                            'id'       => 'jws_theme_archive_services_view_now',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show View Now', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not View Now of post in this element.', 'medicare' ),
                            'default'  => false,
                        ),
                        array(
                            'id'       => 'jws_theme_archive_services_view_more',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show View More', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not View more of archive in this element.', 'medicare' ),
                            'default'  => true,
                        )
                        
                    )
                );
				/*end - Services - Archive*/
				/* ** Start - Services - single*/
				$this->sections[] = array(
                    'title'  => esc_html__( 'Single Services', 'medicare' ),
                    'desc'   => esc_html__( '', 'medicare' ),
                    'icon'   => '',
					'subsection' => true,
                    'fields' => array(
						array( 
							'id'       => 'jws_theme_services_layout',
							'type'     => 'image_select',
							'title'    => esc_html__('Select Layout', 'medicare'),
							'subtitle' => esc_html__('Select layout of single blog.', 'medicare'),
							'options'  => array(
								'1col'	=> array(
										'alt'   => '1col',
										'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/1col.png'
									),
								'2cl'	=> array(
											'alt'   => '2cl',
											'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/2cl.png'
										),
								'2cr'	=> array(
											'alt'   => '2cr',
											'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/2cr.png'
										),
								'3cm'	=> array(
											'alt'   => '3cm',
											'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/3cm.png'
										)
							),
							'default' => '2cr'
						),
						array(
                            'id'       => 'jws_theme_services_display_page_title',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Title Bar', 'medicare' ),
                            'subtitle' => esc_html__( 'Display title bar or not.', 'medicare' ),
							'default'  => true,
                        ),
						array(
                            'id'       => 'jws_theme_service_choice_page',
                            'type'     => 'select',
                            'title'    => esc_html__('Choice Page', 'medicare'),
                            'subtitle' => esc_html__('Select page to add into your page.', 'medicare'),
                            'options'  => $lists_page
                        ),
						array(
                            'id'       => 'jws_theme_services_crop_image',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Crop Image', 'medicare' ),
                            'subtitle' => esc_html__( 'Crop or not crop image of post on your single blog.', 'medicare' ),
							'default'  => true,
                        ),
						array(
							'id'       => 'jws_theme_services_image_width',
							'type'     => 'text',
							'title'    => esc_html__('Image Width', 'medicare'),
							'subtitle' => esc_html__('Please, Enter the width of image on your single blog. Default: 870.', 'medicare'),
							'indent'   => true,
                            'required' => array( 'jws_theme_services_crop_image', "=", 1 ),
							'default'  => '870'
						),
						array(
							'id'       => 'jws_theme_services_image_height',
							'type'     => 'text',
							'title'    => esc_html__('Image Height', 'medicare'),
							'subtitle' => esc_html__('Please, Enter the height of image on your single blog. Default: 430.', 'medicare'),
							'indent'   => true,
                            'required' => array( 'jws_theme_services_crop_image', "=", 1 ),
							'default'  => '430'
						),
						array(
                            'id'       => 'jws_theme_services_show_post_title',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Post Title', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not title of post on your single blog.', 'medicare' ),
							'default'  => false,
                        ),
						array(
							'id'       => 'jws_theme_services_show_page_breadcrumb',
							'type'     => 'switch',
							'title'    => esc_html__( 'Show Page Breadcrumb', 'medicare' ),
							'subtitle' => esc_html__( 'Show or not Page Breadcrumb on your single blog.', 'medicare' ),
							'default'  => true,
						),
						array(
                            'id'       => 'jws_theme_services_show_social_share',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Social Share', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not social share of post on your single blog.', 'medicare' ),
							'default'  => false,
                        ),
						array(
                            'id'       => 'jws_theme_services_show_post_info',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Post Info', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not info of post on your single blog.', 'medicare' ),
							'default'  => false,
                        ),
						array(
                            'id'       => 'jws_theme_services_show_post_nav',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Post Navigation', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not post navigation on your single blog.', 'medicare' ),
							'default'  => false,
                        ),
						array(
                            'id'       => 'jws_theme_services_show_post_tags',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Post Tags', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not post tags on your single blog.', 'medicare' ),
							'default'  => true,
                        ),
						array(
                            'id'       => 'jws_theme_services_show_post_author',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Post Author', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not post author on your single blog.', 'medicare' ),
							'default'  => false,
                        ),
						array(
                            'id'       => 'jws_theme_services_show_post_comment',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Post Comment', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not post comment on your single blog.', 'medicare' ),
							'default'  => false,
                        ),
                        array(
                            'id'       => 'jws_theme_services_show_post_about_author',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show About Author', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not about author on your single blog.', 'medicare' ),
                            'default'  => false,
                        ),
						array(
                            'id'       => 'jws_theme_services_show_post_related',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Show Post Related', 'medicare' ),
                            'subtitle' => esc_html__( 'Show or not post related on your single blog.', 'medicare' ),
							'default'  => false,
                        ),
                        array(
                            'id'       => 'jws_theme_services_no_post_related',
                            'type'     => 'text',
                            'title'    => esc_html__( 'Number Post on Related', 'medicare' ),
                            'subtitle' => esc_html__( 'Enter number post related on your single blog.', 'medicare' ),
                            'default'  => 3,
                        )
					)
				); /*End - Services - single*/
				/*Shop Setting*/

                /* No Shop
				if (class_exists ( 'Woocommerce' )) {
					$this->sections[] = array(
						'title'  => esc_html__( 'Shop Setting', 'medicare' ),
						'desc'   => esc_html__( '', 'medicare' ),
						'icon'   => 'el-icon-shopping-cart',
						'fields' => array(
							
						)
					);
					$this->sections[] = array(
						'title'  => esc_html__( 'Archive Products', 'medicare' ),
						'desc'   => esc_html__( '', 'medicare' ),
						'icon'   => '',
						'subsection' => true,
						'fields' => array(
							array(
								'id'       => 'jws_theme_archive_sidebar_pos_shop',
								'type'     => 'select',
								'title'    => esc_html__('Sidebar Position (Shop layout)', 'medicare'),
								'subtitle' => esc_html__('Select sidebar position in page archive products.', 'medicare'),
								'options'  => array(
									'tb-sidebar-left' => 'Left',
									'tb-sidebar-right' => 'Right',
                                    'tb-sidebar-hidden' =>'Hide sidebar (Shop fullwidth)'
								),
								'default'  => 'tb-sidebar-left',
							),
                            array(
                                'id'       => 'jws_theme_archive_shop_column',
                                'type'     => 'select',
                                'title'    => esc_html__('Products Per Row', 'medicare'),
                                'subtitle' => esc_html__('Change products number display per row for the Shop page'),
                                'options'  => array(
                                    "4" => esc_html__("4 Products",'medicare'),
                                    "3" => esc_html__("3 Products",'medicare'),

                                    "2" => esc_html__("2 Products",'medicare'),

                                    "1" => esc_html__("1 Column",'medicare'),
                                ),
                                'default'  => '3',
                            ),
                            array(
                                'id'       => 'jws_theme_archive_shop_ful_column',
                                'type'     => 'select',
                                'title'    => esc_html__('Products Per Row For Layout Fullwidth', 'medicare'),
                                'subtitle' => esc_html__('Change products number display per row for the Shop page( fullwidth layout )'),
                                'options'  => array(
                                    "4" => esc_html__("4 Products",'medicare'),
                                    "3" => esc_html__("3 Products",'medicare'),
                                    "2" => esc_html__("2 Products",'medicare'),
                                    "1" => esc_html__("1 Column",'medicare'),
                                ),
                                'default'  => '4',
                            ),
                            array(
                                'id'       => 'jws_theme_archive_shop_per_page',
                                'type'     => 'text',
                                'title'    => esc_html__( 'Products Per Page', 'medicare' ),
                                'subtitle' => esc_html__( 'Enter number products per page.', 'medicare' ),
                                'default'  => 9,
                            ),
							array(
								'id'       => 'jws_theme_archive_show_result_count',
								'type'     => 'switch',
								'title'    => esc_html__( 'Show Result Count', 'medicare' ),
								'subtitle' => esc_html__( 'Show result count in page archive products.', 'medicare' ),
								'default'  => true,
							),
							array(
								'id'       => 'jws_theme_archive_show_catalog_ordering',
								'type'     => 'switch',
								'title'    => esc_html__( 'Show Catalog Ordering', 'medicare' ),
								'subtitle' => esc_html__( 'Show catalog ordering in page archive products.', 'medicare' ),
								'default'  => true,
							),
							array(
								'id'       => 'jws_theme_archive_show_pagination_shop',
								'type'     => 'switch',
								'title'    => esc_html__( 'Show Pagination', 'medicare' ),
								'subtitle' => esc_html__( 'Show pagination in page archive products.', 'medicare' ),
								'default'  => true,
							),
							array(
								'id'       => 'jws_theme_archive_show_title_product',
								'type'     => 'switch',
								'title'    => esc_html__( 'Show Product Title', 'medicare' ),
								'subtitle' => esc_html__( 'Show product title in page archive products.', 'medicare' ),
								'default'  => true,
							),
							array(
								'id'       => 'jws_theme_archive_show_price_product',
								'type'     => 'switch',
								'title'    => esc_html__( 'Show Product Price', 'medicare' ),
								'subtitle' => esc_html__( 'Show product price in page archive products.', 'medicare' ),
								'default'  => true,
							),
							array(
								'id'       => 'jws_theme_archive_show_rating_product',
								'type'     => 'switch',
								'title'    => esc_html__( 'Show Product Rating', 'medicare' ),
								'subtitle' => esc_html__( 'Show product rating in page archive products.', 'medicare' ),
								'default'  => true,
							),
							array(
								'id'       => 'jws_theme_archive_show_sale_flash_product',
								'type'     => 'switch',
								'title'    => esc_html__( 'Show Product Sale Flash', 'medicare' ),
								'subtitle' => esc_html__( 'Show product sale flash in page archive products.', 'medicare' ),
								'default'  => true,
							),
                            array(
                                'id'       => 'jws_theme_archive_show_cat_product',
                                'type'     => 'switch',
                                'title'    => esc_html__( 'Show Product Category', 'medicare' ),
                                'subtitle' => esc_html__( 'Show product Catogry in page archive products.', 'medicare' ),
                                'default'  => true
                            ),
							array(
								'id'       => 'jws_theme_archive_show_add_to_cart_product',
								'type'     => 'switch',
								'title'    => esc_html__( 'Show Product Add To Cart', 'medicare' ),
								'subtitle' => esc_html__( 'Show product add to cart in page archive products.', 'medicare' ),
								'default'  => true,
							),
                            array(
                                'id'       => 'jws_theme_archive_show_quick_view_product',
                                'type'     => 'switch',
                                'title'    => esc_html__( 'Show Product Quick View', 'medicare' ),
                                'subtitle' => esc_html__( 'Show product quick view in page archive products.', 'medicare' ),
                                'default'  => true,
                            ),
                            array(
                                'id'       => 'jws_theme_archive_show_whishlist_product',
                                'type'     => 'switch',
                                'title'    => esc_html__( 'Show Product Wish List', 'medicare' ),
                                'subtitle' => esc_html__( 'Show product wish lish in page archive products.', 'medicare' ),
                                'default'  => true,
                            ),
                            array(
                                'id'       => 'jws_theme_archive_show_compare_product',
                                'type'     => 'switch',
                                'title'    => esc_html__( 'Show Product Compare', 'medicare' ),
                                'subtitle' => esc_html__( 'Show product compare in page archive products.', 'medicare' ),
                                'default'  => true,
                            ),
                             array(
                                'id'       => 'jws_theme_archive_show_color_attribute',
                                'type'     => 'switch',
                                'title'    => esc_html__( 'Show Color Attribute', 'medicare' ),
                                'subtitle' => esc_html__( 'Show color attribute in page archive products.', 'medicare' ),
                                'default'  => false
                            ),
						)
					);
					$this->sections[] = array(
						'title'  => esc_html__( 'Single Product', 'medicare' ),
						'desc'   => esc_html__( '', 'medicare' ),
						'icon'   => '',
						'subsection' => true,
						'fields' => array(
							array(
								'id'       => 'jws_theme_single_sidebar_pos_shop',
								'type'     => 'select',
								'title'    => esc_html__('Sidebar Position', 'medicare'),
								'subtitle' => esc_html__('Select sidebar position in page single product.', 'medicare'),
								'options'  => array(
									'tb-sidebar-left' => 'Left',
									'tb-sidebar-right' => 'Right',
                                    'tb-sidebar-hidden' =>'Hide sidebar (single fullwidth)'
								),
								'default'  => 'tb-sidebar-right',
							),
							array(
								'id'       => 'jws_theme_single_show_title_product',
								'type'     => 'switch',
								'title'    => esc_html__( 'Show Product Title', 'medicare' ),
								'subtitle' => esc_html__( 'Show product title in page single product.', 'medicare' ),
								'default'  => true,
							),
							array(
								'id'       => 'jws_theme_single_show_price_product',
								'type'     => 'switch',
								'title'    => esc_html__( 'Show Product Price', 'medicare' ),
								'subtitle' => esc_html__( 'Show product price in page single product.', 'medicare' ),
								'default'  => true,
							),
							array(
								'id'       => 'jws_theme_single_show_rating_product',
								'type'     => 'switch',
								'title'    => esc_html__( 'Show Product Rating', 'medicare' ),
								'subtitle' => esc_html__( 'Show product rating in page single product.', 'medicare' ),
								'default'  => true,
							),
							array(
								'id'       => 'jws_theme_single_show_sale_flash_product',
								'type'     => 'switch',
								'title'    => esc_html__( 'Show Product Sale Flash', 'medicare' ),
								'subtitle' => esc_html__( 'Show product sale flash in page single product.', 'medicare' ),
								'default'  => true,
							),
                            array( 
                                'id'       => 'jws_theme_video_tab',
                                'type'     => 'select',
                                    'title'    => esc_html__('How to display video tab?', 'medicare'),
                                    'options'  => array(
                                        'none'=>esc_html__('Hidden', 'medicare'),
                                        'on_tabs'=>esc_html__('Show in Woocommerce tabs', 'medicare'),
                                        'on_thumbnail'=>esc_html__('Show on product thumbnails', 'medicare')
                                    ),
                                    'default'  => 'on_thumbnail'
                            ),
							array(
								'id'       => 'jws_theme_single_show_excerpt',
								'type'     => 'switch',
								'title'    => esc_html__( 'Show Product Excerpt', 'medicare' ),
								'subtitle' => esc_html__( 'Show product excerpt in page single product.', 'medicare' ),
								'default'  => true,
							),
							array(
								'id'       => 'jws_theme_single_show_add_to_cart_product',
								'type'     => 'switch',
								'title'    => esc_html__( 'Show Product Add To Cart', 'medicare' ),
								'subtitle' => esc_html__( 'Show product add to cart in page single product.', 'medicare' ),
								'default'  => true,
							),
							array(
								'id'       => 'jws_theme_single_show_meta',
								'type'     => 'switch',
								'title'    => esc_html__( 'Show Product Meta', 'medicare' ),
								'subtitle' => esc_html__( 'Show product meta in page single product.', 'medicare' ),
								'default'  => true,
							),
							array(
								'id'       => 'jws_theme_single_show_data_tabs',
								'type'     => 'switch',
								'title'    => esc_html__( 'Show Product Data Tabs', 'medicare' ),
								'subtitle' => esc_html__( 'Show product data tabs in page single product.', 'medicare' ),
								'default'  => true,
							),
							array(
								'id'       => 'jws_theme_single_show_related_products',
								'type'     => 'switch',
								'title'    => esc_html__( 'Show Product Related Products', 'medicare' ),
								'subtitle' => esc_html__( 'Show product related products in page single product.', 'medicare' ),
								'default'  => true,
							),
						)
					);
				}

                */
				/*Custom CSS*/
				$this->sections[] = array(
                    'title'  => esc_html__( 'Custom CSS', 'medicare' ),
                    'desc'   => esc_html__( '', 'medicare' ),
                    'icon'   => 'el-icon-css',
                    'fields' => array(
						array(
							'id'       => 'custom_css_code',
							'type'     => 'ace_editor',
							'title'    => esc_html__('Custom CSS Code', 'medicare'),
							'subtitle' => esc_html__('Quickly add some CSS to your theme by adding it to this block..', 'medicare'),
							'mode'     => 'css',
							'theme'    => 'monokai',
							'default'  => ''
						)
					)
					
				);
				/*Import / Export*/
                $this->sections[] = array(
                    'title'  => __( 'Import / Export', 'medicare' ),
                    'desc'   => __( 'Import and Export your Redux Framework settings from file, text or URL.', 'medicare' ),
                    'icon'   => 'el-icon-refresh',
                    'fields' => array(
                        array(
                            'id'         => 'jws_theme_import_export',
                            'type'       => 'import_export',
                            'title'      => 'Import Export',
                            'subtitle'   => __('Save and restore your Redux options','medicare'),
                            'full_width' => false,
                        ),
                        array (
                            'id'            => 'jws_theme_import',
                            'type'          => 'js_button',
                            'title'         => 'One Click Demo Import.',
                            'subtitle'   => __('Tools > Demo Content Install. <a href="https://www.youtube.com/watch?v=TjiPvlew3KU" target="_blank">Detail Video</a>','medicare'),
                        ),
                    ),
                );
                }
            public function setHelpTabs() {

                // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
                $this->args['help_tabs'][] = array(
                    'id'      => 'redux-help-tab-1',
                    'title'   => esc_html__( 'Theme Information 1', 'medicare' ),
                    'content' => wp_kses( __( '<p>This is the tab content, HTML is allowed.</p>', 'medicare' ),array('p'=>array()))
                );

                $this->args['help_tabs'][] = array(
                    'id'      => 'redux-help-tab-2',
                    'title'   => esc_html__( 'Theme Information 2', 'medicare' ),
                    'content' => wp_kses( __( '<p>This is the tab content, HTML is allowed.</p>', 'medicare' ),array('p' =>array()))
                );

                // Set the help sidebar
                $this->args['help_sidebar'] = wp_kses( __( '<p>This is the sidebar content, HTML is allowed.</p>', 'medicare' ),array('p' =>array()));
            }

            /**
             * All the possible arguments for Redux.
             * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
             * */
            public function setArguments() {

                $theme = wp_get_theme(); // For use with some settings. Not necessary.

                $this->args = array(
                    // TYPICAL -> Change these values as you need/desire
                    'opt_name'             => 'jws_theme_options',
                    // This is where your data is stored in the database and also becomes your global variable name.
                    'display_name'         => $theme->get( 'Name' ),
                    // Name that appears at the top of your panel
                    'display_version'      => $theme->get( 'Version' ),
                    // Version that appears at the top of your panel
                    'menu_type'            => 'menu',
                    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                    'allow_sub_menu'       => true,
                    // Show the sections below the admin menu item or not
                    'menu_title'           => esc_html__( 'Theme Options', 'medicare' ),
                    'page_title'           => esc_html__( 'Theme Options', 'medicare' ),
                    // You will need to generate a Google API key to use this feature.
                    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                    'google_api_key'       => '',
                    // Set it you want google fonts to update weekly. A google_api_key value is required.
                    'google_update_weekly' => false,
                    // Must be defined to add google fonts to the typography module
                    'async_typography'     => true,
                    // Use a asynchronous font on the front end or font string
                    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
                    'admin_bar'            => true,
                    // Show the panel pages on the admin bar
                    'admin_bar_icon'     => 'dashicons-portfolio',
                    // Choose an icon for the admin bar menu
                    'admin_bar_priority' => 50,
                    // Choose an priority for the admin bar menu
                    'global_variable'      => '',
                    // Set a different name for your global variable other than the opt_name
                    'dev_mode'             => false,
                    // Show the time the page took to load, etc
                    'update_notice'        => false,
                    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
                    'customizer'           => true,
                    // Enable basic customizer support
                    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
                    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

                    // OPTIONAL -> Give you extra features
                    'page_priority'        => null,
                    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                    'page_parent'          => 'themes.php',
                    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                    'page_permissions'     => 'manage_options',
                    // Permissions needed to access the options panel.
                    'menu_icon'            => '',
                    // Specify a custom URL to an icon
                    'last_tab'             => '',
                    // Force your panel to always open to a specific tab (by id)
                    'page_icon'            => 'icon-themes',
                    // Icon displayed in the admin panel next to your menu_title
                    'page_slug'            => '_options',
                    // Page slug used to denote the panel
                    'save_defaults'        => true,
                    // On load save the defaults to DB before user clicks save or not
                    'default_show'         => false,
                    // If true, shows the default value next to each field that is not the default value.
                    'default_mark'         => '',
                    // What to print by the field's title if the value shown is default. Suggested: *
                    'show_import_export'   => true,
                    // Shows the Import/Export panel when not used as a field.

                    // CAREFUL -> These options are for advanced use only
                    'transient_time'       => 60 * MINUTE_IN_SECONDS,
                    'output'               => true,
                    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                    'output_tag'           => true,
                    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

                    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                    'database'             => '',
                    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                    'system_info'          => false,
                    // REMOVE

                    // HINTS
                    'hints'                => array(
                        'icon'          => 'icon-question-sign',
                        'icon_position' => 'right',
                        'icon_color'    => 'lightgray',
                        'icon_size'     => 'normal',
                        'tip_style'     => array(
                            'color'   => 'light',
                            'shadow'  => true,
                            'rounded' => false,
                            'style'   => '',
                        ),
                        'tip_position'  => array(
                            'my' => 'top left',
                            'at' => 'bottom right',
                        ),
                        'tip_effect'    => array(
                            'show' => array(
                                'effect'   => 'slide',
                                'duration' => '500',
                                'event'    => 'mouseover',
                            ),
                            'hide' => array(
                                'effect'   => 'slide',
                                'duration' => '500',
                                'event'    => 'click mouseleave',
                            ),
                        ),
                    )
                );
				
                // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
                $this->args['share_icons'][] = array(
                    'url'   => '#',
                    'title' => 'Visit us on GitHub',
                    'icon'  => 'el-icon-github'
                    //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
                );
                $this->args['share_icons'][] = array(
                    'url'   => '#',
                    'title' => 'Like us on Facebook',
                    'icon'  => 'el-icon-facebook'
                );
                $this->args['share_icons'][] = array(
                    'url'   => '#',
                    'title' => 'Follow us on Twitter',
                    'icon'  => 'el-icon-twitter'
                );
                $this->args['share_icons'][] = array(
                    'url'   => '#',
                    'title' => 'Find us on LinkedIn',
                    'icon'  => 'el-icon-linkedin'
                );
            }

            public function validate_callback_function( $field, $value, $existing_value ) {
                $error = true;
                $value = 'just testing';

                /*
              do your validation

              if(something) {
                $value = $value;
              } elseif(something else) {
                $error = true;
                $value = $existing_value;
                
              }
             */

                $return['value'] = $value;
                $field['msg']    = 'your custom error message';
                if ( $error == true ) {
                    $return['error'] = $field;
                }

                return $return;
            }

            public function class_field_callback( $field, $value ) {
                print_r( $field );
                echo '<br/>CLASS CALLBACK';
                print_r( $value );
            }

        }

        global $reduxConfig;
        $reduxConfig = new Redux_Framework_theme_config();
    } else {
        echo "The class named Redux_Framework_theme_config has already been called. <strong>Developers, you need to prefix this class with your company name or you'll run into problems!</strong>";
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ):
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    endif;

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ):
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error = true;
            $value = 'just testing';

            /*
          do your validation

          if(something) {
            $value = $value;
          } elseif(something else) {
            $error = true;
            $value = $existing_value;
            
          }
         */

            $return['value'] = $value;
            $field['msg']    = 'your custom error message';
            if ( $error == true ) {
                $return['error'] = $field;
            }

            return $return;
        }
    endif;


    if( ! function_exists('jws_theme_get_option') ){
        function jws_theme_get_option($name, $default=false){
            global $jws_theme_options;
            return isset( $jws_theme_options[ $name ] ) ? $jws_theme_options[ $name ] : $default;
        }
    }

    if( ! function_exists('jws_theme_update_option') ){
        function jws_theme_update_option($name, $value){
            global $jws_theme_options;
            $jws_theme_options[ $name ] = $value;
        }
    }

