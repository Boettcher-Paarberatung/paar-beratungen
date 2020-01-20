<?php
/**
 * Contains methods for customizing the theme customization screen.
 *
 * @package MentalPress
 * @link http://codex.wordpress.org/Theme_Customization_API
 */

class MentalPress_Customizer_Base {
	/**
	 * The singleton manager instance
	 *
	 * @see wp-includes/class-wp-customize-manager.php
	 * @var WP_Customize_Manager
	 */
	protected $wp_customize;

	public function __construct( WP_Customize_Manager $wp_manager ) {
		// set the private propery to instance of wp_manager
		$this->wp_customize = $wp_manager;

		// register the settings/panels/sections/controls, main method
		$this->register();

		/**
		 * Action and filters
		 */

		// render the CSS and cache it to the theme_mod when the setting is saved
		add_action( 'customize_save_after' , array( $this, 'cache_rendered_css' ) );

		// save logo width/height dimensions
		add_action( 'customize_save_logo_img' , array( $this, 'save_logo_dimensions' ), 10, 1 );

		// flush the rewrite rules after the OT settings are saved
		add_action( 'customize_save_after', 'flush_rewrite_rules' );

		// handle the postMessage transfer method with some dynamically generated JS in the footer of the theme
		add_action( 'wp_footer', array( $this, 'customize_footer_js' ), 30 );
	}

	/**
	* This hooks into 'customize_register' (available as of WP 3.4) and allows
	* you to add new sections and controls to the Theme Customize screen.
	*
	* Note: To enable instant preview, we have to actually write a bit of custom
	* javascript. See live_preview() for more.
	*
	* @see add_action('customize_register',$func)
	*/
	public function register () {
		/**
		 * Settings
		 */

		// branding
		$this->wp_customize->add_setting( 'logo_img', array( 'default' => get_template_directory_uri() . '/assets/images/logo.png' ) );
		$this->wp_customize->add_setting( 'logo2x_img' );

		// header
		$this->wp_customize->add_setting( 'top_bar_visibility', array( 'default' => 'yes' ) );
		$this->wp_customize->add_setting( new MentalPress_Customize_Setting_Dynamic_CSS( $this->wp_customize, 'top_bar_bg', array(
			'default' => '#8b949c',
			'css_map' => array(
				'background-color' => array(
					'.top__background',
					'.top-navigation .sub-menu > li > a',
				),
				'border-bottom-color|lighten(10)' => array(
					'.top-navigation .sub-menu > li > a',
				),
			)
		) ) );
		$this->wp_customize->add_setting( new MentalPress_Customize_Setting_Dynamic_CSS( $this->wp_customize, 'top_bar_color', array(
			'default' => '#edeff2',
			'css_map' => array(
				'color' => array(
					'.top',
					'.top-navigation a',
					'.top-navigation > .menu-item-has-children > a::after',
				),
			)
		) ) );

		$this->wp_customize->add_setting( new MentalPress_Customize_Setting_Dynamic_CSS( $this->wp_customize, 'header_bg', array(
			'default' => '#ffffff',
			'css_map' => array(
				'background-color' => array(
					'.header',
				),
			)
		) ) );
		$this->wp_customize->add_setting( new MentalPress_Customize_Setting_Dynamic_CSS( $this->wp_customize, 'header_text_color', array(
			'default' => '#676b6f',
			'css_map' => array(
				'color' => array(
					'.icon-box__title',
				),
				'color|lighten(24)' => array (
					'.icon-box__subtitle',
					'.widget-icon-box .icon-box',
					'.textwidget',
				),
			)
		) ) );
		$this->wp_customize->add_setting( new MentalPress_Customize_Setting_Dynamic_CSS( $this->wp_customize, 'header_fa_icons', array(
			'default' => '#e9edf1',
			'css_map' => array(
				'color' => array (
					'.widget-icon-box .icon-box .fa',
				),
				'color|darken(5)' => array (
					'.header-widgets .icon-box:hover>.fa',
				),
			)
		) ) );
		$this->wp_customize->add_setting( new MentalPress_Customize_Setting_Dynamic_CSS( $this->wp_customize, 'header_navigation_link_color', array(
			'default' => '#414447',
			'css_map' => array(
				'color' => array(
					'.header .menu > li > a',
					'.header .menu > li > a:hover'
				),
				'background-color' => array (
					'.header .menu > .current-menu-item > a::before',
					'.header .menu > li:hover > a::before',
				),
			)
		) ) );
		$this->wp_customize->add_setting( new MentalPress_Customize_Setting_Dynamic_CSS( $this->wp_customize, 'header_navigation_sub_bg', array(
			'default' => '#73bfa6',
			'css_map' => array(
				'background-color' => array(
					'.header .menu .sub-menu > li|@media (min-width: 992px)',
				),
				'border-color|darken(5)' => array(
					'.header .menu .sub-menu > li > a|@media (min-width: 992px)',
					'.header .menu .sub-menu > li > .sub-menu|@media (min-width: 992px)',
				),
				'background-color|darken(5)' => array(
					'.header .menu .sub-menu > li > a:hover|@media (min-width: 992px)',
				),
			)
		) ) );
		$this->wp_customize->add_setting( new MentalPress_Customize_Setting_Dynamic_CSS( $this->wp_customize, 'header_navigation_sub_color', array(
			'default' => '#ffffff',
			'css_map' => array(
				'color' => array(
					'.header .menu .sub-menu > li > a|@media (min-width: 992px)',
					'.header .menu .sub-menu > li > a:hover|@media (min-width: 992px)',
				),
			)
		) ) );
		$this->wp_customize->add_setting( new MentalPress_Customize_Setting_Dynamic_CSS( $this->wp_customize, 'header_navigation_sub_mobile_color', array(
			'default' => '#919699',
			'css_map' => array(
				'color' => array(
					'.header .menu .sub-menu > li > a|@media (max-width: 992px)',
				),
			)
		) ) );

		// typography
		$this->wp_customize->add_setting( 'charset_setting', array( 'default' => 'latin' ) );

		// navigation
		// featured page
		$this->wp_customize->add_setting( 'featured_page_select', array( 'default' => 'none' ) );
		$this->wp_customize->add_setting( 'featured_page_custom_text' );
		$this->wp_customize->add_setting( 'featured_page_custom_url' );
		$this->wp_customize->add_setting( 'featured_page_open_in_new_window' );

		$this->wp_customize->add_setting( new MentalPress_Customize_Setting_Dynamic_CSS( $this->wp_customize, 'main_navigation_bg', array(
			'default' => '#ffffff',
			'css_map' => array(
				'background-color' => array(
					'.main-navigation__container',
					'.main-navigation .sub-menu',
				),
			)
		) ) );
		$this->wp_customize->add_setting( new MentalPress_Customize_Setting_Dynamic_CSS( $this->wp_customize, 'main_navigation_color', array(
			'default' => '#414447',
			'css_map' => array(
				'color' => array(
					'.main-navigation > li > a',
				),
			)
		) ) );
		$this->wp_customize->add_setting( new MentalPress_Customize_Setting_Dynamic_CSS( $this->wp_customize, 'main_navigation_color_hover', array(
			'default' => '#414447',
			'css_map' => array(
				'color' => array(
					'.main-navigation > li > a:hover',
				),
			)
		) ) );
		$this->wp_customize->add_setting( new MentalPress_Customize_Setting_Dynamic_CSS( $this->wp_customize, 'main_navigation_active_bg', array(
			'default' => '#edeff2',
			'css_map' => array(
				'background-color' => array(
					'.main-navigation .current_page_item > a',
					'.main-navigation > li:hover > a',
				),
			)
		) ) );
		$this->wp_customize->add_setting( new MentalPress_Customize_Setting_Dynamic_CSS( $this->wp_customize, 'main_navigation_sub_bg', array(
			'default' => '#73bfa6',
			'css_map' => array(
				'background-color' => array(
					'.main-navigation .sub-menu > li > a|@media (min-width: 992px)',
					'.main-navigation .sub-menu .current_page_item > a|@media (min-width: 992px)',
				),
				'border-color' => array(
					'.main-navigation .sub-menu > li > a|@media (min-width: 992px)',
				),
				'background-color|darken(5)' => array(
					'.main-navigation .sub-menu > li > a:hover|@media (min-width: 992px)',
				),
				'border-color|darken(5)' => array(
					'.main-navigation .sub-menu > li > .sub-menu',
					'.main-navigation .sub-menu > li > a',
				),
			)
		) ) );
		$this->wp_customize->add_setting( new MentalPress_Customize_Setting_Dynamic_CSS( $this->wp_customize, 'main_navigation_sub_color', array(
			'default' => '#ffffff',
			'css_map' => array(
				'color' => array(
					'.main-navigation .sub-menu > li > a|@media (min-width: 992px)',
					'.main-navigation .sub-menu > li > a:hover|@media (min-width: 992px)',
				),
			)
		) ) );
		$this->wp_customize->add_setting( new MentalPress_Customize_Setting_Dynamic_CSS( $this->wp_customize, 'main_navigation_sub_mobile_color', array(
			'default' => '#9ba7b2',
			'css_map' => array(
				'color' => array(
					'.main-navigation .sub-menu > li > a|@media (max-width: 992px)',
				),
			)
		) ) );
		$this->wp_customize->add_setting( new MentalPress_Customize_Setting_Dynamic_CSS( $this->wp_customize, 'main_navigation_sub_mobile_color_hover', array(
			'default' => '#414447',
			'css_map' => array(
				'color' => array(
					'.main-navigation .sub-menu > li > a:hover|@media (max-width: 992px)',
				),
			)
		) ) );

		// theme colors
		$css_map_text_color = array(
			'color' => array(
				'body',
				'.textwidget',
			),
		);

		if ( is_ecwid_active() ) {
			$css_map_text_color['color'] += array(
				'html#ecwid_html#ecwid_html body#ecwid_body .ecwid',
				'html#ecwid_html#ecwid_html body#ecwid_body div.ecwid-productBrowser-subcategories-categoryName',
				'html#ecwid_html#ecwid_html body#ecwid_body .ecwid-productBrowser-productsGrid-productInside',
				'html#ecwid_html#ecwid_html body#ecwid_body .ecwid-productBrowser-productsGrid-v2 div.ecwid-productBrowser-productNameLink a',
			);
		}

		$this->wp_customize->add_setting( new MentalPress_Customize_Setting_Dynamic_CSS( $this->wp_customize, 'text_color', array(
			'default' => '#919699',
			'css_map' => $css_map_text_color
		) ) );

		$css_map_button_color = array(
			'background-color' => array(
				'.btn-primary',
				'.btn-primary:focus',
				'.widget_search .search-submit',
				'.widget_search .search-submit:focus',
				'.header .menu .featured-link',
				'.navbar-toggle',
			),
			'border-color' => array(
				'.btn-primary',
				'.btn-primary:focus',
			),
			'background-color|darken(5)' => array(
				'.btn-primary:hover',
				'.widget_search .search-submit:hover',
				'.header .menu .featured-link > a:hover',
				'.navbar-toggle:hover',
			),
			'border-color|darken(5)' => array(
				'.btn-primary:hover',
			),
		);

		if ( is_ecwid_active() ) {
			$css_map_button_color['background-color'][] = 'html#ecwid_html#ecwid_html body#ecwid_body .ecwid .ecwid-btn--primary';
		}

		if ( is_woocommerce_active() ) {
			$css_map_button_color['background-color'] += array(
				'body.woocommerce-page .widget_shopping_cart_content .buttons .checkout',
				'body.woocommerce-page .widget_product_search .search-field + input',
				'body.woocommerce-page button.button.alt',
				'body.woocommerce-page #review_form #respond input#submit',
				'body.woocommerce-page .woocommerce-info a.button',
				'body.woocommerce-page .woocommerce-message a.button',
				'body.woocommerce-page .woocommerce-error a.button',
				'.woocommerce-cart .wc-proceed-to-checkout a.checkout-button',
				'body.woocommerce-page #payment #place_order',
				'.woocommerce button.button.alt:disabled',
				'.woocommerce button.button.alt:disabled:hover',
				'.woocommerce button.button.alt:disabled[disabled]',
				'.woocommerce button.button.alt:disabled[disabled]:hover',
			);
			$css_map_button_color['border-color'][] = 'body.woocommerce-page .widget_shopping_cart_content .buttons .checkout';
			$css_map_button_color['background-color|darken(5)'] += array(
				'body.woocommerce-page .widget_shopping_cart_content .buttons .checkout:hover',
				'body.woocommerce-page .widget_product_search .search-field + input:hover',
				'body.woocommerce-page .widget_product_search .search-field + input:focus',
				'body.woocommerce-page button.button.alt:hover',
				'body.woocommerce-page #review_form #respond input#submit:hover',
				'body.woocommerce-page .woocommerce-info a.button:hover',
				'body.woocommerce-page .woocommerce-message a.button:hover',
				'body.woocommerce-page .woocommerce-error a.button:hover',
				'.woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover',
				'body.woocommerce-page #payment #place_order:hover',
			);
			$css_map_button_color['border-color|darken(5)'][] = 'body.woocommerce-page .widget_shopping_cart_content .buttons .checkout:hover';
		}

		$this->wp_customize->add_setting( new MentalPress_Customize_Setting_Dynamic_CSS( $this->wp_customize, 'button_color', array(
			'default' => '#957aca',
			'css_map' => $css_map_button_color
		) ) );

		$css_map_informative_color = array(
			'background-color' => array(
				'.testimonial__quote::before',
				'.latest-post__categories a',
				'.about-us__tag',
				'.meta-data__categories a',
				'.widget_calendar caption',
				'.widget_tag_cloud a',
				'.pagination a:hover',
				'.pagination .current',
				'.btn-success',
				'.btn-success:focus',
			),
			'border-color' => array(
				'blockquote',
				'.btn-success',
			),
			'background-color|darken(5)' => array(
				'.latest-post__categories a:hover',
				'.about-us__tag:hover',
				'.meta-data__categories a:hover',
				'.widget_tag_cloud a:hover',
				'.btn-success:hover',
			),
			'border-color|darken(5)' => array(
				'.btn-success:hover',
			),
			'color' => array(),
			'background' => array(),
		);

		if ( is_ecwid_active() ) {
			$css_map_informative_color['background-color'] += array(
				'html#ecwid_html#ecwid_html body#ecwid_body .ecwid .ecwid-btn',
				'html#ecwid_html#ecwid_html body#ecwid_body .ecwid-SearchPanel .ecwid-SearchPanel-button',
				'html#ecwid_html#ecwid_html body#ecwid_body div.ecwid-Invoice-cell-title',
			);
			$css_map_informative_color['border-color'] += array(
				'html#ecwid_html#ecwid_html body#ecwid_body .ecwid-productBrowser-productsGrid-v2 td.ecwid-productBrowser-productsGrid-productInside.ecwid-productBrowser-productsGrid-hover',
				'html#ecwid_html#ecwid_html body#ecwid_body td.ecwid-productBrowser-productsList-mouseover',
			);
			$css_map_informative_color['background-color|darken(5)'] += array(
				'html#ecwid_html#ecwid_html body#ecwid_body .ecwid-SearchPanel .ecwid-SearchPanel-button:hover',
				'html#ecwid_html#ecwid_html body#ecwid_body .ecwid-SearchPanel .ecwid-SearchPanel-button:focus',
			);
		}

		if ( is_woocommerce_active() ) {
			$css_map_informative_color['background-color'] += array(
				'body.woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle',
				'body.woocommerce-page .widget_price_filter .ui-slider .ui-slider-range',
				'body.woocommerce-page nav.woocommerce-pagination ul li span.current',
				'body.woocommerce-page nav.woocommerce-pagination ul li a:hover',
				'body.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active',
			);
			$css_map_informative_color['color'] += array(
				'body.woocommerce-page ul.products li.product a:hover img',
				'.woocommerce ul.products li.product a:hover img',
				'body.woocommerce-page .star-rating',
				'.woocommerce .star-rating',
				'body.woocommerce-page p.stars a',
			);
			$css_map_informative_color['background'] += array(
				'body.woocommerce-page .tagcloud a',
			);
		}

		$this->wp_customize->add_setting( new MentalPress_Customize_Setting_Dynamic_CSS( $this->wp_customize, 'informative_color', array(
			'default' => '#73bfa6',
			'css_map' => $css_map_informative_color
		) ) );

		$css_map_link_color = array(
			'color' => array(
				'a',
			),
			'color|darken(5)' => array(
				'a:hover',
			),
		);

		if ( is_ecwid_active() ) {
			$css_map_link_color['color'][]           = 'html#ecwid_html#ecwid_html body#ecwid_body .ecwid a';
			$css_map_link_color['color|darken(5)'][] = 'html#ecwid_html#ecwid_html body#ecwid_body .ecwid a:hover';
		}

		$this->wp_customize->add_setting( new MentalPress_Customize_Setting_Dynamic_CSS( $this->wp_customize, 'link_color', array(
			'default' => '#1fa7da',
			'css_map' => $css_map_link_color
		) ) );

		$this->wp_customize->add_setting( new MentalPress_Customize_Setting_Dynamic_CSS( $this->wp_customize, 'attention_color', array(
			'default' => '#fd7062',
			'css_map' => array(
				'background-color' => array(
					'.btn-danger',
					'.btn-danger:focus',
				),
				'background-color|darken(5)' => array(
					'.btn-danger:hover',
				),
				'border-color' => array(
					'.btn-danger',
					'.btn-danger:focus',
				),
				'border-color|darken(5)' => array(
					'.btn-danger:hover',
				),
			)
		) ) );

		// latests posts under main container
		$this->wp_customize->add_setting( 'display_latest_posts', array( 'default' => 'all_pages' ) );

		// shop
		$this->wp_customize->add_setting( 'products_per_page', array( 'default' => 12 ) );
		$this->wp_customize->add_setting( 'single_product_sidebar', array( 'default' => 'left' ) );

		// footer
		$this->wp_customize->add_setting( 'footer_widgets_layout', array( 'default' => '[4,6,8]' ) );

		$this->wp_customize->add_setting( new MentalPress_Customize_Setting_Dynamic_CSS( $this->wp_customize, 'footer_bg_color', array(
			'default' => '#ffffff',
			'css_map' => array(
				'background-color' => array(
					'.footer',
				),
			)
		) ) );
		$this->wp_customize->add_setting( new MentalPress_Customize_Setting_Dynamic_CSS( $this->wp_customize, 'footer_title_color', array(
			'default' => '#333333',
			'css_map' => array(
				'color' => array(
					'.footer-top__headings',
				),
			)
		) ) );
		$this->wp_customize->add_setting( new MentalPress_Customize_Setting_Dynamic_CSS( $this->wp_customize, 'footer_text_color', array(
			'default' => '#919699',
			'css_map' => array(
				'color' => array(
					'.footer',
					'.footer .textwidget',
					'.footer .widget_nav_menu ul > li > a',
				),
			)
		) ) );
		$this->wp_customize->add_setting( new MentalPress_Customize_Setting_Dynamic_CSS( $this->wp_customize, 'footer_link_color', array(
			'default' => '#1fa7da',
			'css_map' => array(
				'color' => array(
					'.footer a',
				),
				'color|darken(5)' => array(
					'.footer a:hover',
				),
			)
		) ) );
		$this->wp_customize->add_setting( 'footer_left_txt', array( 'default' => '<a href="https://www.proteusthemes.com/wordpress-themes/mentalpress/"><img src="' . get_template_directory_uri() . '/assets/images/logo-footer.png" alt="Logo Footer"/></a>' ) );
		$this->wp_customize->add_setting( 'footer_right_txt', array( 'default' => '<div class="footer-bottom__payment-methods"> <span>PAYMENT METHODS:</span> &nbsp; &nbsp; &nbsp; <i class="fa  fa-3x  fa-cc-visa"></i> &nbsp; <i class="fa  fa-3x  fa-cc-mastercard"></i> &nbsp; <i class="fa  fa-3x  fa-cc-amex"></i> &nbsp; <i class="fa  fa-3x  fa-cc-paypal"></i></div>' ) );

		// custom code (css/js)
		$this->wp_customize->add_setting( 'custom_js_head' );
		$this->wp_customize->add_setting( 'custom_js_footer' );
		$this->wp_customize->add_setting( 'custom_css', array( 'default' => '/* enter here your custom CSS styles */' ) );

		// Migrate any existing theme CSS to the core option added in WordPress 4.7.
		if ( function_exists( 'wp_update_custom_css_post' ) ) {
			$css = get_theme_mod( 'custom_css', '' );

			if ( ! empty( $css ) ) {
				$core_css = wp_get_custom_css(); // Preserve any CSS already added to the core option.
				$return   = wp_update_custom_css_post( '/* Migrated CSS from old Theme Custom CSS setting: */' . PHP_EOL . $css . PHP_EOL . PHP_EOL . '/* New custom CSS: */' . PHP_EOL . $core_css );
				if ( ! is_wp_error( $return ) ) {
					// Remove the old theme_mod, so that the CSS is stored in only one place moving forward.
					remove_theme_mod( 'custom_css' );
				}
			}

			// Add new "CSS setting" that will only notify the users that the new "Additional CSS" field is available.
			// It can't be the same name ('custom_css'), because the core control is also named 'custom_css' and it would not display the WP core "Additional CSS" control.
			$this->wp_customize->add_setting( 'pt_custom_css', array( 'default' => '' ) );
		}

		// acf
		$this->wp_customize->add_setting( 'show_acf', array( 'default' => 'no' ) );

		// other
		$this->wp_customize->add_setting( 'google_maps_api_key' );

		/**
		 * Panel and Sections
		 */

		// one ProteusThemes panel to rule them all
		$this->wp_customize->add_panel( 'panel_mentalpress', array(
			'title'       => _x( '[PT] Theme Options', 'backend', 'mentalpress_wp' ),
			'description' => _x( 'All MentalPress theme specific settings.', 'backend', 'mentalpress_wp' ),
			'priority'    => 10
		) );

		// individual sections

		// Logo
		$logo_section_array = array(
			'title'       => _x( 'Logo', 'backend', 'mentalpress_wp' ),
			'description' => _x( 'Logo settings for the MentalPress theme.', 'backend', 'mentalpress_wp' ),
			'priority'    => 10,
			'panel'       => 'panel_mentalpress',
		);

		// Theme favicon section, which will be phased out, because of WP core favicon integration
		if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
			$logo_section_array['title']       = _x( 'Logo &amp; Favicon', 'backend', 'mentalpress_wp' );
			$logo_section_array['description'] = _x( 'Logo &amp; Favicon for the MentalPress theme.', 'backend', 'mentalpress_wp' );
		}

		$this->wp_customize->add_section( 'mentalpress_section_logos', $logo_section_array );

		// Header
		$this->wp_customize->add_section( 'mentalpress_section_header', array(
			'title'       => _x( 'Header', 'backend', 'mentalpress_wp' ),
			'description' => _x( 'All layout and appearance settings for the header.', 'backend', 'mentalpress_wp' ),
			'priority'    => 20,
			'panel'       => 'panel_mentalpress'
		) );

		$this->wp_customize->add_section( 'mentalpress_section_navigation', array(
			'title'       => _x( 'Navigation', 'backend', 'mentalpress_wp' ),
			'description' => _x( 'Navigation for the MentalPress theme.', 'backend', 'mentalpress_wp' ),
			'priority'    => 30,
			'panel'       => 'panel_mentalpress'
		) );

		$this->wp_customize->add_section( 'mentalpress_section_typography', array(
			'title'       => _x( 'Typography', 'backend', 'mentalpress_wp' ),
			'priority'    => 35,
			'panel'       => 'panel_mentalpress'
		) );

		$this->wp_customize->add_section( 'mentalpress_section_theme_colors', array(
			'title'       => _x( 'Theme Colors', 'backend', 'mentalpress_wp' ),
			'priority'    => 40,
			'panel'       => 'panel_mentalpress'
		) );

		$this->wp_customize->add_section( 'mentalpress_section_latest_posts', array(
			'title'       => _x( 'Latest Posts', 'backend', 'mentalpress_wp' ),
			'description' => _x( 'Latest posts for the MentalPress theme.', 'backend', 'mentalpress_wp' ),
			'priority'    => 50,
			'panel'       => 'panel_mentalpress'
		) );

		if ( is_woocommerce_active() ) {
			$this->wp_customize->add_section( 'mentalpress_section_shop', array(
				'title'       => _x( 'Shop', 'backend', 'mentalpress_wp' ),
				'priority'    => 80,
				'panel'       => 'panel_mentalpress'
			) );
		}

		$this->wp_customize->add_section( 'section_footer', array(
			'title'       => _x( 'Footer', 'backend', 'mentalpress_wp' ),
			'description' => _x( 'All layout and appearance settings for the footer.', 'backend', 'mentalpress_wp' ),
			'priority'    => 90,
			'panel'       => 'panel_mentalpress'
		) );

		$this->wp_customize->add_section( 'section_custom_code', array(
			'title'       => _x( 'Custom Code' , 'backend', 'mentalpress_wp' ),
			'priority'    => 100,
			'panel'       => 'panel_mentalpress'
		) );

		$this->wp_customize->add_section( 'section_other', array(
			'title'       => _x( 'Other' , 'backend', 'mentalpress_wp' ),
			'priority'    => 120,
			'panel'       => 'panel_mentalpress',
		) );


		/**
		 * Controls
		 */

		// Section: mentalpress_section_logos
		$this->wp_customize->add_control( new WP_Customize_Image_Control(
			$this->wp_customize,
			'logo_img',
			array(
				'label'       => _x( 'Logo Image', 'backend', 'mentalpress_wp' ),
				'description' => _x( 'Recommended height for the Logo is 90px.', 'backend', 'mentalpress_wp' ),
				'section'     => 'mentalpress_section_logos',
			)
		) );

		$this->wp_customize->add_control( new WP_Customize_Image_Control(
			$this->wp_customize,
			'logo2x_img',
			array(
				'label'       => _x( 'Retina Logo Image', 'backend', 'mentalpress_wp' ),
				'description' => _x( '2x logo size, for screens with high DPI.', 'backend', 'mentalpress_wp' ),
				'section'     => 'mentalpress_section_logos',
			)
		) );

		// Section: header
		$this->wp_customize->add_control( 'top_bar_visibility', array(
			'type'        => 'select',
			'priority'    => 0,
			'label'       => _x( 'Top bar visibility', 'backend', 'mentalpress_wp' ),
			'description' => _x( 'Show or hide?', 'backend', 'mentalpress_wp' ),
			'section'     => 'mentalpress_section_header',
			'choices'     => array(
				'yes'         => _x( 'Show', 'backend', 'mentalpress_wp' ),
				'no'          => _x( 'Hide', 'backend', 'mentalpress_wp' ),
			),
		) );
		$this->wp_customize->add_control( new WP_Customize_Color_Control(
			$this->wp_customize,
			'top_bar_bg',
			array(
				'priority' => 1,
				'label'    => _x( 'Top bar background color', 'backend', 'mentalpress_wp' ),
				'section'  => 'mentalpress_section_header',
				'active_callback' => array( $this, 'is_top_bar_visible' ),
			)
		) );
		$this->wp_customize->add_control( new WP_Customize_Color_Control(
			$this->wp_customize,
			'top_bar_color',
			array(
				'priority' => 2,
				'label'    => _x( 'Top bar text color', 'backend', 'mentalpress_wp' ),
				'section'  => 'mentalpress_section_header',
			)
		) );

		$this->wp_customize->add_control( new WP_Customize_Color_Control(
			$this->wp_customize,
			'header_bg',
			array(
				'priority' => 30,
				'label'    => _x( 'Header background color', 'backend', 'mentalpress_wp' ),
				'section'  => 'mentalpress_section_header',
			)
		) );
		$this->wp_customize->add_control( new WP_Customize_Color_Control(
			$this->wp_customize,
			'header_text_color',
			array(
				'priority' => 32,
				'label'    => _x( 'Header text color', 'backend', 'mentalpress_wp' ),
				'section'  => 'mentalpress_section_header',
			)
		) );
		$this->wp_customize->add_control( new WP_Customize_Color_Control(
			$this->wp_customize,
			'header_fa_icons',
			array(
				'priority'    => 33,
				'label'       => __( 'Header icons', 'mentalpress_wp' ),
				'description' => __( 'Icons in "Icon Box" widget', 'mentalpress_wp' ),
				'section'     => 'mentalpress_section_header',
			)
		) );
		$this->wp_customize->add_control( new WP_Customize_Color_Control(
			$this->wp_customize,
			'header_navigation_link_color',
			array(
				'priority' => 35,
				'label'    => _x( 'Header navigation link color', 'backend', 'mentalpress_wp' ),
				'section'  => 'mentalpress_section_header',
			)
		) );
		$this->wp_customize->add_control( new WP_Customize_Color_Control(
			$this->wp_customize,
			'header_navigation_sub_bg',
			array(
				'priority' => 38,
				'label'    => _x( 'Header navigation submenu background', 'backend', 'mentalpress_wp' ),
				'section'  => 'mentalpress_section_header',
			)
		) );
		$this->wp_customize->add_control( new WP_Customize_Color_Control(
			$this->wp_customize,
			'header_navigation_sub_color',
			array(
				'priority' => 40,
				'label'    => _x( 'Header navigation submenu link color', 'backend', 'mentalpress_wp' ),
				'section'  => 'mentalpress_section_header',
			)
		) );
		$this->wp_customize->add_control( new WP_Customize_Color_Control(
			$this->wp_customize,
			'header_navigation_sub_mobile_color',
			array(
				'priority' => 42,
				'label'    => _x( 'Header navigation submenu mobile link color', 'backend', 'mentalpress_wp' ),
				'section'  => 'mentalpress_section_header',
			)
		) );

		// Section: mentalpress_section_navigation
		$this->wp_customize->add_control( 'featured_page_select', array(
				'type'        => 'select',
				'priority'    => 100,
				'label'       => _x( 'Featured page', 'backend', 'mentalpress_wp' ),
				'description' => _x( 'To which page should the Featured Page button link to? Under the main navigation.', 'backend', 'mentalpress_wp' ),
				'section'     => 'mentalpress_section_navigation',
				'choices'     => $this->get_all_pages_id_title(),
			) );

		$this->wp_customize->add_control( 'featured_page_custom_text', array(
				'priority'    => 104,
				'label'       => _x( 'Custom Button Text', 'backend', 'mentalpress_wp' ),
				'section'     => 'mentalpress_section_navigation',
				'active_callback' => array( $this, 'is_featured_page_custom_url' ),
			) );

		$this->wp_customize->add_control( 'featured_page_custom_url', array(
				'priority'    => 105,
				'label'       => _x( 'Custom URL', 'backend', 'mentalpress_wp' ),
				'section'     => 'mentalpress_section_navigation',
				'active_callback' => array( $this, 'is_featured_page_custom_url' ),
			) );

		$this->wp_customize->add_control( 'featured_page_open_in_new_window', array(
				'type'        => 'checkbox',
				'priority'    => 110,
				'label'       => _x( 'Open link in a new window/tab.', 'backend', 'mentalpress_wp' ),
				'section'     => 'mentalpress_section_navigation',
				'active_callback' => array( $this, 'is_featured_page_selected' ),
			) );

		$this->wp_customize->add_control( new WP_Customize_Color_Control(
			$this->wp_customize,
			'main_navigation_bg',
			array(
				'priority' => 120,
				'label'    => _x( 'Main navigation background color', 'backend', 'mentalpress_wp' ),
				'section'  => 'mentalpress_section_navigation',
			)
		) );
		$this->wp_customize->add_control( new WP_Customize_Color_Control(
			$this->wp_customize,
			'main_navigation_color',
			array(
				'priority' => 130,
				'label'    => _x( 'Main navigation link color', 'backend', 'mentalpress_wp' ),
				'section'  => 'mentalpress_section_navigation',
			)
		) );
		$this->wp_customize->add_control( new WP_Customize_Color_Control(
			$this->wp_customize,
			'main_navigation_color_hover',
			array(
				'priority' => 140,
				'label'    => _x( 'Main navigation link hover color', 'backend', 'mentalpress_wp' ),
				'section'  => 'mentalpress_section_navigation',
			)
		) );
		$this->wp_customize->add_control( new WP_Customize_Color_Control(
			$this->wp_customize,
			'main_navigation_active_bg',
			array(
				'priority' => 150,
				'label'    => _x( 'Main navigation active background', 'backend', 'mentalpress_wp' ),
				'section'  => 'mentalpress_section_navigation',
			)
		) );
		$this->wp_customize->add_control( new WP_Customize_Color_Control(
			$this->wp_customize,
			'main_navigation_sub_bg',
			array(
				'priority' => 160,
				'label'    => _x( 'Main navigation submenu background', 'backend', 'mentalpress_wp' ),
				'section'  => 'mentalpress_section_navigation',
			)
		) );
		$this->wp_customize->add_control( new WP_Customize_Color_Control(
			$this->wp_customize,
			'main_navigation_sub_color',
			array(
				'priority' => 170,
				'label'    => _x( 'Main navigation submenu link color', 'backend', 'mentalpress_wp' ),
				'section'  => 'mentalpress_section_navigation',
			)
		) );
		$this->wp_customize->add_control( new WP_Customize_Color_Control(
			$this->wp_customize,
			'main_navigation_sub_mobile_color',
			array(
				'priority' => 180,
				'label'    => _x( 'Main navigation submenu link color (mobile)', 'backend', 'mentalpress_wp' ),
				'section'  => 'mentalpress_section_navigation',
			)
		) );
		$this->wp_customize->add_control( new WP_Customize_Color_Control(
			$this->wp_customize,
			'main_navigation_sub_mobile_color_hover',
			array(
				'priority' => 190,
				'label'    => _x( 'Main navigation submenu link hover color (mobile)', 'backend', 'mentalpress_wp' ),
				'section'  => 'mentalpress_section_navigation',
			)
		) );

		// Section: mentalpress_section_typography
		$this->wp_customize->add_control( 'charset_setting', array(
			'type'     => 'select',
			'priority' => 0,
			'label'    => _x( 'Character set for Google Fonts', 'backend' , 'mentalpress_wp'),
			'section'  => 'mentalpress_section_typography',
			'choices'  => array(
				'latin'        => 'Latin',
				'latin-ext'    => 'Latin Extended',
				'cyrillic'     => 'Cyrillic',
				'cyrillic-ext' => 'Cyrillic Extended'
			)
		) );

		// Section: mentalpress_section_theme_colors
		$this->wp_customize->add_control( new WP_Customize_Color_Control(
			$this->wp_customize,
			'text_color',
			array(
				'priority' => 30,
				'label'    => _x( 'Text color', 'backend', 'mentalpress_wp' ),
				'section'  => 'mentalpress_section_theme_colors',
			)
		) );
		$this->wp_customize->add_control( new WP_Customize_Color_Control(
			$this->wp_customize,
			'button_color',
			array(
				'priority' => 31,
				'label'    => _x( 'Button color', 'backend', 'mentalpress_wp' ),
				'section'  => 'mentalpress_section_theme_colors',
			)
		) );
		$this->wp_customize->add_control( new WP_Customize_Color_Control(
			$this->wp_customize,
			'informative_color',
			array(
				'priority' => 32,
				'label'    => _x( 'Informative color', 'backend', 'mentalpress_wp' ),
				'section'  => 'mentalpress_section_theme_colors',
			)
		) );
		$this->wp_customize->add_control( new WP_Customize_Color_Control(
			$this->wp_customize,
			'link_color',
			array(
				'priority' => 34,
				'label'    => _x( 'Link color', 'backend', 'mentalpress_wp' ),
				'section'  => 'mentalpress_section_theme_colors',
			)
		) );
		$this->wp_customize->add_control( new WP_Customize_Color_Control(
			$this->wp_customize,
			'attention_color',
			array(
				'priority' => 36,
				'label'    => _x( 'Attention color', 'backend', 'mentalpress_wp' ),
				'section'  => 'mentalpress_section_theme_colors',
			)
		) );

		// Section: mentalpress_section_latest_posts
		$this->wp_customize->add_control( 'display_latest_posts', array(
				'type'        => 'select',
				'priority'    => 120,
				'label'       => _x( 'Display latest posts', 'backend', 'mentalpress_wp' ),
				'description' => _x( 'Display latest posts under the main content container', 'backend', 'mentalpress_wp' ),
				'section'     => 'mentalpress_section_latest_posts',
				'choices'     => array(
					'none' => 'Do not display',
					'front_page' => 'Display on front page only',
					'all_pages' => 'Display on all pages',
				),
			) );

		// Section: mentalpress_section_shop
		if( is_woocommerce_active() ) {
			$this->wp_customize->add_control( 'products_per_page', array(
					'label'   => _x( 'Number of products per page', 'backend', 'mentalpress_wp' ),
					'section' => 'mentalpress_section_shop',
				)
			);
			$this->wp_customize->add_control( 'single_product_sidebar', array(
					'label'   => _x( 'Sidebar on single product page', 'backend', 'mentalpress_wp'),
					'section' => 'mentalpress_section_shop',
					'type'    => 'select',
					'choices' => array(
						'none'  => _x( 'No sidebar', 'backend', 'mentalpress_wp'),
						'left'  => _x( 'Left', 'backend', 'mentalpress_wp'),
						'right' => _x( 'Right', 'backend', 'mentalpress_wp'),
					)
				)
			);
		}

		// Section: section_footer
		$this->wp_customize->add_control( new WP_Customize_Range_Control(
			$this->wp_customize,
			'footer_widgets_layout',
			array(
				'priority'    => 1,
				'label'       => _x( 'Footer widgets layout', 'backend', 'mentalpress_wp' ),
				'description' => _x( 'Select number of widget you want in the footer and then with the slider rearrange the layout', 'backend', 'mentalpress_wp' ),
				'section'     => 'section_footer',
				'input_attrs' => array(
					'min'     => 0,
					'max'     => 12,
					'step'    => 1,
					'maxCols' => 6,
				)
			)
		) );
		$this->wp_customize->add_control( new WP_Customize_Color_Control(
			$this->wp_customize,
			'footer_bg_color',
			array(
				'priority' => 10,
				'label'    => _x( 'Footer background color', 'backend', 'mentalpress_wp' ),
				'section'  => 'section_footer',
			)
		) );
		$this->wp_customize->add_control( new WP_Customize_Color_Control(
			$this->wp_customize,
			'footer_title_color',
			array(
				'priority' => 30,
				'label'    => _x( 'Footer widget title color', 'backend', 'mentalpress_wp' ),
				'section'  => 'section_footer',
			)
		) );

		$this->wp_customize->add_control( new WP_Customize_Color_Control(
			$this->wp_customize,
			'footer_text_color',
			array(
				'priority' => 31,
				'label'    => _x( 'Footer text color', 'backend', 'mentalpress_wp' ),
				'section'  => 'section_footer',
			)
		) );

		$this->wp_customize->add_control( new WP_Customize_Color_Control(
			$this->wp_customize,
			'footer_link_color',
			array(
				'priority' => 32,
				'label'    => _x( 'Footer link color', 'backend', 'mentalpress_wp' ),
				'section'  => 'section_footer',
			)
		) );

		$this->wp_customize->add_control( 'footer_left_txt', array(
				'type'        => 'text',
				'priority'    => 110,
				'label'       => _x( 'Footer text on left', 'backend', 'mentalpress_wp' ),
				'description' => _x( 'Before footer menu. You can use HTML.', 'backend', 'mentalpress_wp' ),
				'section'     => 'section_footer',
			) );

		$this->wp_customize->add_control( 'footer_right_txt', array(
			'type'        => 'text',
			'priority'    => 120,
			'label'       => _x( 'Footer text on right', 'backend', 'mentalpress_wp' ),
			'description' => _x( 'You can use HTML.', 'backend', 'mentalpress_wp' ),
			'section'     => 'section_footer',
		) );

		// Section: section_custom_code
		if ( function_exists( 'wp_update_custom_css_post' ) ) {
			// Show the notice of custom CSS setting migration.
			$this->wp_customize->add_control( 'pt_custom_css', array(
				'type'        => 'hidden',
				'label'       => esc_html__( 'Custom CSS', 'mentalpress_wp' ),
				'description' => esc_html__( 'This field is obsolete. The existing code was migrated to the "Additional CSS" field, that can be found in the root of the customizer. This new "Additional CSS" field is a WordPress core field and was introduced in WP version 4.7.', 'mentalpress_wp' ),
				'section'     => 'section_custom_code',
			) );
		}
		else {
			$this->wp_customize->add_control( 'custom_css', array(
				'type'        => 'textarea',
				'label'       => _x( 'Custom CSS', 'backend', 'mentalpress_wp' ),
				'description' => sprintf( _x( '%s How to find CSS classes %s in the theme.', 'backend', 'mentalpress_wp' ), '<a href="https://www.youtube.com/watch?v=V2aAEzlvyDc" target="_blank">', '</a>' ),
				'section'     => 'section_custom_code',
			) );
		}

		$this->wp_customize->add_control( 'custom_js_head', array(
			'type'        => 'textarea',
			'label'       => _x( 'Custom JavaScript (head)', 'backend', 'mentalpress_wp' ),
			'description' => _x( 'You have to include the &lt;script&gt;&lt;/script&gt; tags as well.', 'backend', 'mentalpress_wp' ),
			'section'     => 'section_custom_code',
		) );

		$this->wp_customize->add_control( 'custom_js_footer', array(
			'type'        => 'textarea',
			'label'       => _x( 'Custom JavaScript (footer)', 'backend', 'mentalpress_wp' ),
			'description' => _x( 'You have to include the &lt;script&gt;&lt;/script&gt; tags as well.', 'backend', 'mentalpress_wp' ),
			'section'     => 'section_custom_code',
		) );

		// Theme favicon setting and control, which will be phased out, because of WP core favicon integration
		if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
			$this->wp_customize->add_setting( 'favicon', array( 'default' => get_template_directory_uri() . '/assets/images/favicon.png' ) );

			$this->wp_customize->add_control( new WP_Customize_Image_Control(
				$this->wp_customize,
				'favicon',
				array(
					'label'       => _x( 'Favicon Image', 'backend', 'mentalpress_wp' ),
					'description' => _x( 'Recommended dimensions are 32 x 32px.', 'backend', 'mentalpress_wp' ),
					'section'     => 'mentalpress_section_logos',
				)
			) );
		}

		// Section: section_other
		$this->wp_customize->add_control( 'show_acf', array(
			'type'        => 'select',
			'label'       => _x( 'Show ACF admin panel?', 'backend', 'mentalpress_wp' ),
			'description' => _x( 'If you want to use ACF and need the ACF admin panel set this to <strong>Yes</strong>. Do not change if you do not know what you are doing.', 'backend', 'mentalpress_wp' ),
			'section'     => 'section_other',
			'choices'     => array(
				'no'  => _x( 'No', 'backend', 'mentalpress_wp' ),
				'yes' => _x( 'Yes', 'backend', 'mentalpress_wp' ),
			),
		) );

		$this->wp_customize->add_control( 'google_maps_api_key', array(
			'type'        => 'text',
			'label'       => esc_html__( 'Google maps API key', 'mentalpress_wp' ),
			'description' => sprintf( esc_html__( 'Input the Google maps API key in order for maps to start working. %sGet your API key%s.', 'mentalpress_wp' ), '<a href="https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key" target="_blank">', '</a>' ),
			'section'     => 'section_other',
		) );
	}


	/**
	 * Returns if the featured page is selected.
	 *
	 * used by the featured_page_open_in_new_window control
	 *
	 * @return boolean
	 */
	public function is_featured_page_selected() {
		if ( 'none' === get_theme_mod( 'featured_page_select', 'none' ) ) {
			return false;
		}
		else {
			return true;
		}
	}

	/**
	 * Returns if the featured page is selected.
	 *
	 * used by the featured_page_custom_url control
	 *
	 * @return boolean
	 */
	public function is_featured_page_custom_url() {
		if ( 'custom-url' === get_theme_mod( 'featured_page_select', 'none' ) ) {
			return true;
		}
		else {
			return false;
		}
	}

	/**
	 * Returns true if top bar is visible
	 *
	 * used by the top_bar_bg control
	 *
	 * @return boolean
	 */
	public function is_top_bar_visible() {
		return 'yes' === get_theme_mod( 'top_bar_visibility', 'yes' );
	}


	/**
	 * Returns all published pages (IDs and titles).
	 *
	 * used by the featured_page_select control
	 *
	 * @return map with key: ID and value: title
	 */
	public function get_all_pages_id_title() {
		$args = array(
			'sort_order' => 'ASC',
			'sort_column' => 'post_title',
			'post_type' => 'page',
			'post_status' => 'publish'
		);
		$pages = get_pages( $args );
		// Create the pages map with the default value of 0 -> None.
		$featured_page_choices = array();
		$featured_page_choices['none'] = _x( 'None', 'backend', 'mentalpress_wp' );
		$featured_page_choices['custom-url'] = _x( 'Custom URL', 'backend', 'mentalpress_wp' );
		// Parse through the objects returned and add the key value pairs to the featured_page_choices map
		foreach ( $pages as $page ) {
			$featured_page_choices[$page->ID] = $page->post_title;
		}

		return $featured_page_choices;
	}


	/**
	 * Cache the rendered CSS after the settings are saved in the DB.
	 * This is purely a performance improvement.
	 *
	 * Used by hook: add_action( 'customize_save_after' , array( $this, 'cache_rendered_css' ) );
	 *
	 * @return void
	 */
	public function cache_rendered_css() {
		set_theme_mod( 'cached_css', $this->render_css() );
	}

	/**
	 * Get the dimensions of the logo image when the setting is saved
	 * This is purely a performance improvement.
	 *
	 * Used by hook: add_action( 'customize_save_logo_img' , array( $this, 'save_logo_dimensions' ), 10, 1 );
	 *
	 * @return void
	 */
	public function save_logo_dimensions( $setting ) {
		$logo_width_height = '';
		$img_data          = getimagesize( esc_url( $setting->post_value() ) );

		if ( is_array( $img_data ) ) {
			$logo_width_height = $img_data[3];
		}

		set_theme_mod( 'logo_width_height', $logo_width_height );
	}

	/**
	 * Render the CSS from all the settings which are of type `MentalPress_Customize_Setting_Dynamic_CSS`
	 *
	 * @return string text/css
	 */
	public function render_css() {
		$out = '';

		foreach ( $this->get_dynamic_css_settings() as $setting ) {
			$out .= $setting->render_css();
		}

		return $out;
	}

	/**
	 * Get only the CSS settings of type `MentalPress_Customize_Setting_Dynamic_CSS`.
	 *
	 * @see is_dynamic_css_setting
	 * @return array
	 */
	public function get_dynamic_css_settings() {
		return array_filter( $this->wp_customize->settings(), array( $this, 'is_dynamic_css_setting' ) );
	}

	/**
	 * Helper conditional function for filtering the settings.
	 *
	 * @see
	 * @param  mixed  $setting
	 * @return boolean
	 */
	protected static function is_dynamic_css_setting( $setting ) {
		return is_a( $setting, 'MentalPress_Customize_Setting_Dynamic_CSS' );
	}

	/**
	 * Dynamically generate the JS for previewing the settings of type `MentalPress_Customize_Setting_Dynamic_CSS`.
	 *
	 * This function is better for the UX, since all the color changes are transported to the live
	 * preview frame using the 'postMessage' method. Since the JS is generated on-the-fly and we have a single
	 * entry point of entering settings along with related css properties and classes, we cannnot forget to
	 * include the setting in the customizer itself. Neat, man!
	 *
	 * @return string text/javascript
	 */
	public function customize_footer_js() {
		$settings = $this->get_dynamic_css_settings();

		ob_start();
		?>

			<script type="text/javascript">
				( function( $ ) {
					'use strict';

				<?php
					foreach ( $settings as $key_id => $setting ) :
				?>

					wp.customize( '<?php echo esc_js( $key_id ); ?>', function( value ) {
						value.bind( function( newval ) {

						<?php
							foreach ( $setting->get_css_map() as $css_prop_raw => $css_selectors ) {
								extract( $setting->filter_css_property( $css_prop_raw ) );

								// background image needs a little bit different treatment
								if ( 'background-image' === $css_prop ) {
									echo 'newval = "url(" + newval + ")";' . PHP_EOL;
								}

								printf( '$( "%1$s" ).css( "%2$s", newval );%3$s', $setting->plain_selectors_for_all_groups( $css_prop_raw ), $css_prop, PHP_EOL );
							}
						?>

						} );
					} );

				<?php
					endforeach;
				?>

				} )( jQuery );
			</script>

		<?php

		echo ob_get_clean();
	}

	/**
	 * Is Page Builder by SiteOrigin v2?
	 * @return boolean
	 */
	public function is_pb_2() {
		return defined( 'SITEORIGIN_PANELS_VERSION' ) && version_compare( SITEORIGIN_PANELS_VERSION, '2.0', '<' );
	}
}