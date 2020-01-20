<?php
add_action('after_setup_theme', 'mindron_bunch_theme_setup');
function mindron_bunch_theme_setup()
{
	global $wp_version;
	if(!defined('MINDRON_VERSION')) define('MINDRON_VERSION', '1.0');
	if( !defined( 'MINDRON_ROOT' ) ) define('MINDRON_ROOT', get_template_directory().'/');
	if( !defined( 'MINDRON_URL' ) ) define('MINDRON_URL', get_template_directory_uri().'/');	
	include_once get_template_directory() . '/includes/loader.php';
	
	
	load_theme_textdomain('mindron', get_template_directory() . '/languages');
	
	//ADD THUMBNAIL SUPPORT
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links'); //Enables post and comment RSS feed links to head.
	add_theme_support('widgets'); //Add widgets and sidebar support
	add_theme_support( "title-tag" );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
	/** Register wp_nav_menus */
	if(function_exists('register_nav_menu'))
	{
		register_nav_menus(
			array(
				/** Register Main Menu location header */
				'main_menu' => esc_html__('Main Menu', 'mindron'),
			)
		);
	}
	if ( ! isset( $content_width ) ) $content_width = 960;
	add_image_size( 'mindron_270x219', 270, 219, true ); // 'mindron_270x219 Services Carousel'
	add_image_size( 'mindron_65x66', 65, 66, true ); // 'mindron_65x66 Our Testimonials'
	add_image_size( 'mindron_550x365', 550, 365, true ); // 'mindronx550x365 Services Single Style Two'
    add_image_size( 'mindron_260x361', 260, 361, true ); // 'mindronx260x361 Services Single Style Two'
    add_image_size( 'mindron_370x350', 370, 350, true ); // 'mindron_370x350 Our Gallery'
    add_image_size( 'mindron_1170x460', 1170, 460, true ); // 'mindron_840x360 Blog Page'
    add_image_size( 'mindron_72x64', 72, 64, true ); // 'mindronx72x64 Recent News Widget'
    add_image_size( 'mindron_570x360', 570, 360, true ); // 'mindron_570x360 Blog Grid'
    add_image_size( 'mindron_370x214', 370, 214, true ); // 'mindron_370x214 our blog'
}
function mindron_bunch_widget_init()
{
	global $wp_registered_sidebars;
	$theme_options = _WSH()->option();
	register_sidebar(array(
	  'name' => esc_html__( 'Default Sidebar', 'mindron' ),
	  'id' => 'default-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'mindron' ),
	  'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<div class="sidebar-title"><h3>',
	  'after_title' => '</h3></div>'
	));
	register_sidebar(array(
	  'name' => esc_html__( 'Footer Sidebar', 'mindron' ),
	  'id' => 'footer-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown in Footer Area.', 'mindron' ),
	  'before_widget'=>'<div id="%1$s"  class="big-column footer-widget col-md-3 col-sm-12 col-xs-12 %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<h2>',
	  'after_title' => '</h2>'
	));
	
	register_sidebar(array(
	  'name' => esc_html__( 'Blog Listing', 'mindron' ),
	  'id' => 'blog-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'mindron' ),
	  'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<div class="sidebar-title"><h3>',
	  'after_title' => '</h3></div>'
	));
    
	if( !is_object( _WSH() )  )  return;
	$sidebars = mindron_set(mindron_set( $theme_options, 'dynamic_sidebar' ) , 'dynamic_sidebar' ); 
	foreach( array_filter((array)$sidebars) as $sidebar)
	{
		if(mindron_set($sidebar , 'topcopy')) continue ;
		
		$name = mindron_set( $sidebar, 'sidebar_name' );
		
		if( ! $name ) continue;
		$slug = mindron_bunch_slug( $name ) ;
		
		register_sidebar( array(
			'name' => $name,
			'id' =>  sanitize_title( $slug ) ,
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget' => "</div>",
			'before_title' => '<div class="sidebar-title style-two"><h2>',
			'after_title' => '</h2></div>',
		) );		
	}
	
	update_option('wp_registered_sidebars' , $wp_registered_sidebars) ;
}

function mindron_gutenberg_editor_palette_styles() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => __( 'strong yellow', 'mindron' ),
            'slug' => 'strong-yellow',
            'color' => '#f7bd00',
        ),
        array(
            'name' => __( 'strong white', 'mindron' ),
            'slug' => 'strong-white',
            'color' => '#fff',
        ),
		array(
            'name' => __( 'light black', 'mindron' ),
            'slug' => 'light-black',
            'color' => '#242424',
        ),
        array(
            'name' => __( 'very light gray', 'mindron' ),
            'slug' => 'very-light-gray',
            'color' => '#797979',
        ),
        array(
            'name' => __( 'very dark black', 'mindron' ),
            'slug' => 'very-dark-black',
            'color' => '#000000',
        ),
    ) );
	
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => __( 'Small', 'mindron' ),
			'size' => 10,
			'slug' => 'small'
		),
		array(
			'name' => __( 'Normal', 'mindron' ),
			'size' => 15,
			'slug' => 'normal'
		),
		array(
			'name' => __( 'Large', 'mindron' ),
			'size' => 24,
			'slug' => 'large'
		),
		array(
			'name' => __( 'Huge', 'mindron' ),
			'size' => 36,
			'slug' => 'huge'
		)
	) );
	
}
add_action( 'after_setup_theme', 'mindron_gutenberg_editor_palette_styles' );

add_action( 'widgets_init', 'mindron_bunch_widget_init' );
// Update items in cart via AJAX
function mindron_load_head_scripts() {
	$options = _WSH()->option();
    if ( !is_admin() ) {
		$protocol = is_ssl() ? 'https://' : 'http://';
		if(mindron_set($options, 'map_api_key')){
		$map_path = '?key='.mindron_set($options, 'map_api_key');
		wp_enqueue_script( 'mindron-map-api', ''.$protocol.'maps.google.com/maps/api/js'.$map_path, array(), false, false );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'mindron_load_head_scripts');
//global variables
function mindron_bunch_global_variable() {
    global $wp_query;
}

function mindron_enqueue_scripts() {
    //styles
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );
	wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/css/flaticon.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );
	wp_enqueue_style( 'owl-theme', get_template_directory_uri() . '/css/owl.css' );
	wp_enqueue_style( 'jquery-fancybox', get_template_directory_uri() . '/css/jquery.fancybox.min.css' );
	wp_enqueue_style( 'mindron-main-style', get_stylesheet_uri() );
	wp_enqueue_style( 'mindron-custom-style', get_template_directory_uri() . '/css/custom.css' );
	wp_enqueue_style( 'mindron-gutenberg', get_template_directory_uri() . '/css/gutenberg.css' );
	wp_enqueue_style( 'mindron-responsive', get_template_directory_uri() . '/css/responsive.css' );
	wp_enqueue_style( 'mindron-default-theme', get_template_directory_uri() . '/css/color-themes/default-theme.css' );
	
	
	
    //scripts
	wp_enqueue_script( 'jquery-ui-core' );
    wp_enqueue_script( 'jquery-countdown', get_template_directory_uri().'/js/jquery.countdown.js', array('jquery'), '2.1.2', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array(), false, true );
	wp_enqueue_script( 'jquery-fancybox-pack', get_template_directory_uri().'/js/jquery.fancybox.js', array('jquery'), '2.1.2', true );
	wp_enqueue_script( 'owl', get_template_directory_uri().'/js/owl.js', array(), false, true );
	wp_enqueue_script( 'wow', get_template_directory_uri().'/js/wow.js', array(), false, true );
	wp_enqueue_script( 'appear', get_template_directory_uri().'/js/appear.js', array(), false, true );
	wp_enqueue_script( 'mindron-main-script', get_template_directory_uri().'/js/script.js', array(), false, true );
    wp_enqueue_script( 'map-script', get_template_directory_uri().'/js/map-script.js', array(), false, true );
	if( is_singular() ) wp_enqueue_script('comment-reply');
	
}
add_action( 'wp_enqueue_scripts', 'mindron_enqueue_scripts');

/*-------------------------------------------------------------*/
function mindron_theme_slug_fonts_url() {
    $fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $lato = _x( 'on', 'Lato Script: on or off', 'mindron' );
	$lora = _x( 'on', 'Lora font: on or off', 'mindron' );
	$montserrat = _x( 'on', 'Montserrat font: on or off', 'mindron' );
    $sans = _x( 'on', 'Open Sans font: on or off', 'mindron' );
    $playfair = _x( 'on', 'Play Fair font: on or off', 'mindron' );
    $poppins = _x( 'on', 'Poppins font: on or off', 'mindron' );
 
    if ( 'off' !== $lato || 'off' !== $lora || 'off' !== $montserrat || 'off' !== $sans || 'off' !== $playfair || 'off' !== $poppins ) {
        $font_families = array();
 
        if ( 'off' !== $lato ) {
            $font_families[] = 'Lato:100,100i,300,300i,400,400i,700,700i,900,900i';
        }
		
		if ( 'off' !== $lora ) {
            $font_families[] = 'Lora:400,400i,700,700i';
        }
		
		if ( 'off' !== $montserrat ) {
            $font_families[] = 'Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
        }
		
		if ( 'off' !== $sans ) {
            $font_families[] = 'Open Sans:300,300i,400,400i,600,600i,700,700i,800,800i';
        }
        
        if ( 'off' !== $playfair ) {
            $font_families[] = 'Playfair+Display:400,400i,700,700i,900,900i';
        }
        
        if ( 'off' !== $poppins ) {
            $font_families[] = 'Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
        }
 
        $opt = get_option('mindron'.'_theme_options');
		if ( mindron_set( $opt, 'body_custom_font' ) ) {
			if ( $custom_font = mindron_set( $opt, 'body_font_family' ) )
				$font_families[] = $custom_font . ':300,300i,400,400i,600,700';
		}
		if ( mindron_set( $opt, 'use_custom_font' ) ) {
			$font_families[] = mindron_set( $opt, 'h1_font_family' ) . ':300,300i,400,400i,600,700';
			$font_families[] = mindron_set( $opt, 'h2_font_family' ) . ':300,300i,400,400i,600,700';
			$font_families[] = mindron_set( $opt, 'h3_font_family' ) . ':300,300i,400,400i,600,700';
			$font_families[] = mindron_set( $opt, 'h4_font_family' ) . ':300,300i,400,400i,600,700';
			$font_families[] = mindron_set( $opt, 'h5_font_family' ) . ':300,300i,400,400i,600,700';
			$font_families[] = mindron_set( $opt, 'h6_font_family' ) . ':300,300i,400,400i,600,700';
		}
		$font_families = array_unique( $font_families);
        
		$query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
 
    return esc_url_raw( $fonts_url );
}
function mindron_theme_slug_scripts_styles() {
    wp_enqueue_style( 'mindron-theme-slug-fonts', mindron_theme_slug_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'mindron_theme_slug_scripts_styles' );
/*---------------------------------------------------------------------*/
function mindron_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'mindron_add_editor_styles' );
/**
 * WooCommerce Extra Feature
 * --------------------------
 *
 * Change number of related products on product page
 * Set your own value for 'posts_per_page'
 *
 */ 
function mindron_woo_related_products_limit() {
  global $product;
  $options = _WSH()->option();
  
  $num = mindron_set($options, 'number_of_products_per_page');
  $num = ($num) ? $num : 6;
 
 $args['posts_per_page'] = $num;
 return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'mindron_jk_related_products_args' );
  function mindron_jk_related_products_args( $args ) {
 $options = _WSH()->option();
 
 $rel_num = mindron_set($options, 'number_of_related_products');
    $rel_num = ($rel_num) ? $rel_num : 4;
  
 $args['posts_per_page'] = $rel_num; // 4 related products
 $args['columns'] = $rel_num; // arranged in 2 columns
 return $args;
}