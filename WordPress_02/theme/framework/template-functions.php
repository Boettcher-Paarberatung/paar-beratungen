<?php

if ( ! isset( $content_width ) ) $content_width = 900;
if ( is_singular() ) wp_enqueue_script( "comment-reply" );
if ( ! function_exists( 'jws_theme_setup' ) ) {
	function jws_theme_setup() {
		load_theme_textdomain( 'medicare', get_template_directory() . '/languages' );
		// Add Custom Header.
		add_theme_support('custom-header');
		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post Thumbnails, and declare two sizes.
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'main_navigation'   => esc_html__( 'Primary Menu','medicare' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		) );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery','status'
		) );

		// This theme allows users to set a custom background.
		add_theme_support( 'custom-background', apply_filters( 'tbtheme_custom_background_args', array(
			'default-color' => 'f5f5f5',
		) ) );

		// Add support for featured content.
		add_theme_support( 'featured-content', array(
			'featured_content_filter' => 'tbtheme_get_featured_posts',
			'max_posts' => 6,
		) );
		
		add_theme_support( "title-tag" );

		// This theme uses its own gallery styles.
		add_filter( 'use_default_gallery_style', '__return_false' );
		
		// Register a new image size
		add_image_size( 'medicare-blog-large-hard-crop', 740, 366, true );
		add_image_size( 'medicare-blog-medium-hard-crop', 740, 414, true );
		add_image_size( 'medicare-single-portfolio', 1170, 730, true );
		add_image_size( 'medicare-portfolio-thumb', 760, 500, true );
		add_image_size( 'medicare-blog-grid', 750, 618, true );
		add_image_size( 'medicare-colection-thumb', 540, 660, true );
		add_image_size( 'medicare-blog-grid-medium', 540, 400, true );
		add_image_size( 'medicare-thumb-side-post', 100, 110, true );
		add_image_size( 'medicare-thumb-cat-large', 570, 400, true );
		add_image_size( 'medicare_masonry_vertical', 570, 570, true );
		add_image_size( 'medicare_masonry_horizontal', 570, 420, true );
		add_image_size( 'medicare_masonry_normal', 270, 270, true );
		$shop_catalog_size = get_option('shop_catalog_image_size');
		if( $shop_catalog_size ){
			add_image_size( 'shop_catalog_large_size', ($shop_catalog_size['width'] * 2 + 30), ($shop_catalog_size['height']*2+30), $shop_catalog_size['crop'] );
		}
	}
}
add_action( 'after_setup_theme', 'jws_theme_setup' );
add_filter( 'post-format-status', 'jws_theme_avia_status_content_filter', 10, 1 );

function jws_theme_page_title(){
	global $jws_theme_options;
	$class = array();
	$class[] = 'title-bar';
	//$class[] = ($show_page_name) ? '' : 'no-page-name';
	return jws_theme_get_content_title_bar($class);
}

function jws_theme_get_content_title_bar($class){
	global $jws_theme_options;
	$header_layout = $jws_theme_options['jws_theme_header_layout'];
	$active_page_title = (is_page() || is_search()) ? jws_theme_get_object_id( 'jws_theme_page_title_bar' ) : 1;
	$show_on_front = is_front_page() ? false : true;
	if(is_search()) $active_page_title = $jws_theme_options['jws_theme_display_page_title'];
	if(is_single()){
		if(is_singular('post')) $active_page_title = $jws_theme_options['jws_theme_post_display_page_title'];
		if(is_singular('portfolio')) $active_page_title = $jws_theme_options['jws_theme_portfolio_display_page_title'];
		if(is_singular('services')) $active_page_title = $jws_theme_options['jws_theme_services_display_page_title'];
	}
	//$show_page_title = jws_theme_get_object_id('jws_theme_show_page_title',1);
	$show_page_breadcrumb = 0;//is_page() ? jws_theme_get_object_id('jws_theme_show_page_breadcrumb',true): 1;
	//var_dump($show_page_title);
	if( $active_page_title ) :
		/* $inside = array('v8');
		if( in_array( $header_layout, $inside ) ) $outside = false;
		 */
		// include searchbar

		if( $jws_theme_options['jws_theme_display_page_title'] ):
		// include breadcrumb
		if($active_page_title && $show_on_front && $show_page_breadcrumb) {
			jws_theme_get_breadcrumb();
		}
		
		if($active_page_title ){
			?>
			<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
				<div class="container">
					<div class="text-center">
						<h1 class="page-title"><?php echo jws_theme_getPageTitle(); ?></h1>
						<?php
							// include breadcrumb
							//if( $show_on_front && ! $outside ) jws_theme_get_breadcrumb();
						?>
					</div>
				</div>
			</div>
		<?php  }?>
		<?php
		endif;
	endif;
	// include searchbar
	
}

function jws_theme_get_breadcrumb(){
	global $jws_theme_options;
	ob_start();
	if( $jws_theme_options['jws_theme_display_breadcrumb'] ):
			$delimiter = isset($jws_theme_options['jws_theme_page_breadcrumb_delimiter']) ? $jws_theme_options['jws_theme_page_breadcrumb_delimiter'] :  '/';
		?>
		<!-- Breadcrumb -->
		<div class="tb-breadcrumb">
			<div class="container">
				<?php  echo jws_theme_page_breadcrumb( $delimiter ); ?>
			</div>
		</div>
	<?php endif;

	echo ob_get_clean();
}

function jws_theme_get_search_mega( $class ){
	?>
		<div class="jws_theme_top_search_bar <?php echo esc_attr($class);?>">
			<?php if(is_active_sidebar("tbtheme-top-search-bar")) dynamic_sidebar("tbtheme-top-search-bar"); ?>
		</div>
	<?php
}

function jws_theme_getPageTitle(){
	if (!is_archive()){
		/* page. */
		if(is_page()) :
			the_title();
		/* search */
		elseif (is_search()):
			printf( esc_html__( 'Search Results for: %s', 'medicare' ), '<span>' . get_search_query() . '</span>' );
		/* 404 */ 
		elseif (is_404()):
			esc_html_e( '404', 'medicare');
		/* Blog */ 
		elseif (is_home()):
			esc_html_e( 'Blog', 'medicare');
		/* other */
		else :
			the_title();
		endif;
	} else {
		/* category. */
		if ( is_category() || ( function_exists('is_product_category') && is_product_category() ) ) :
			single_cat_title();
		elseif ( is_tag() || ( function_exists('is_product_tag') && is_product_tag() ) ) :
		/* tag. */
			single_tag_title();
		/* author. */
		elseif ( is_author() ) :
			printf( esc_html__( 'Author: %s', 'medicare' ), '<span class="vcard">' . get_the_author() . '</span>' );
		/* date */
		elseif ( is_day() ) :
			printf( esc_html__( 'Day: %s', 'medicare' ), '<span>' . get_the_date() . '</span>' );
		elseif ( is_month() ) :
			printf( esc_html__( 'Month: %s', 'medicare' ), '<span>' . get_the_date('F Y') . '</span>' );
		elseif ( is_year() ) :
			printf( esc_html__( 'Year: %s', 'medicare' ), '<span>' . get_the_date('Y') . '</span>' );
		/* post format */
		elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
			esc_html_e( 'Asides', 'medicare' );
		elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
			esc_html_e( 'Galleries', 'medicare');
		elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
			esc_html_e( 'Images', 'medicare');
		elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
			esc_html_e( 'Videos', 'medicare' );
		elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
			esc_html_e( 'Quotes', 'medicare' );
		elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
			esc_html_e( 'Links', 'medicare' );
		elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
			esc_html_e( 'Statuses', 'medicare' );
		elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
			esc_html_e( 'Audios', 'medicare' );
		elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
			esc_html_e( 'Chats', 'medicare' );
		elseif( function_exists('is_shop') && is_shop() ):
        	echo esc_attr(get_post_field( 'post_title', get_option( 'woocommerce_shop_page_id' ) ) );
		else :
		/* other */
			the_title();
		endif;
	}
}

/* Header */
function jws_theme_header() {
	global $jws_theme_options;
	//$header_layout = $jws_theme_options["jws_theme_header_layout"];
	$header_layout = jws_theme_get_object_id('jws_theme_header_layout', true);

	$jws_theme_options['jws_theme_header_layout'] = $header_layout;
	//get_template_part('framework/headers/header', $header_layout);
	switch ($header_layout) {
		case 'v1':
			get_template_part('framework/headers/header', 'v1');
			break;
		case 'v2':
			get_template_part('framework/headers/header', 'v2');
			break;
		case 'v3':
			get_template_part('framework/headers/header', 'v3');
			break;
		default :
			get_template_part('framework/headers/header', 'v1');
			break;
	}
}

/* footer */
function jws_theme_footer() {
	global $jws_theme_options,$post;
	$footer_layout = $jws_theme_options["jws_theme_footer_layout"];
	$jws_theme_footer = jws_theme_get_object_id('jws_theme_footer_layout', true);
	$jws_theme_options['jws_theme_footer_layout'] = $jws_theme_footer;

	switch ($jws_theme_footer) {
	case 'v1':
		get_template_part('framework/footers/footer', 'v1');
		break;
	default :
		get_template_part('framework/footers/footer', 'v1');
		break;
	}
}

/* Main Logo */
if (!function_exists('jws_theme_logo')) {
	function jws_theme_logo( $logo='' ) {
		global $jws_theme_options,$post;
		$postid = isset($post->ID) ? $post->ID : 0;
		$meta_logo = get_post_meta( $postid, 'jws_theme_logo_image', true );
		if( ! empty( $meta_logo ) || ( isset($jws_theme_options['jws_theme_logo_image']['url']) && ! empty( $jws_theme_options['jws_theme_logo_image']['url']) ) ){
			$logo = empty( $logo ) ? ( !empty( $meta_logo  ) ? $meta_logo : $jws_theme_options['jws_theme_logo_image']['url'] ) : $logo;
			$logo = '<img src="'.esc_url($logo).'" class="main-logo" alt="' . esc_html__('Main Logo', 'medicare') .  '"/>';
		}else{
			$logo = isset( $jws_theme_options['jws_theme_logo_text'] ) ? strip_tags( $jws_theme_options['jws_theme_logo_text'],'<span><br><em><strong>' ) : wp_kses( __('Medicare','medicare'), array(
				'br' => array(),
			    'em' => array(),
			    'strong' => array(),
			    'span' => array()
			   )
			);
		}
		echo $logo;
	}
}
/* Page title */
if (!function_exists('jws_theme_page_title')) {
    function jws_theme_page_title() { 
            ob_start();
			if( is_home() ){
				esc_html_e('Home', 'medicare');
			}elseif(is_search()){
                esc_html_e('Search Keyword: ', 'medicare');
				echo '<span class="keywork">'. get_search_query(). '</span>';
            }elseif (!is_archive()) {
                the_title();
            } else { 
                if (is_category()){
                    single_cat_title();
                }elseif(get_post_type() == 'recipe' || get_post_type() == 'portfolio' || get_post_type() == 'produce' || get_post_type() == 'team' || get_post_type() == 'testimonial' || get_post_type() == 'myclients' || get_post_type() == 'product'){
                    single_term_title();
                }elseif (is_tag()){
                    single_tag_title();
                }elseif (is_author()){
                    printf(esc_html__('Author: %s', 'medicare'), '<span class="vcard">' . get_the_author() . '</span>');
                }elseif (is_day()){
                    printf(esc_html__('Day: %s', 'medicare'), '<span>' . get_the_date() . '</span>');
                }elseif (is_month()){
                    printf(esc_html__('Month: %s', 'medicare'), '<span>' . get_the_date('F Y') . '</span>');
                }elseif (is_year()){
                    printf(esc_html__('Year: %s', 'medicare'), '<span>' . get_the_date('Y') . '</span>');
                }elseif (is_tax('post_format', 'post-format-aside')){
                    esc_html_e('Asides', 'medicare');
                }elseif (is_tax('post_format', 'post-format-gallery')){
                    esc_html_e('Galleries', 'medicare');
                }elseif (is_tax('post_format', 'post-format-image')){
                    esc_html_e('Images', 'medicare');
                }elseif (is_tax('post_format', 'post-format-video')){
                    esc_html_e('Videos', 'medicare');
                }elseif (is_tax('post_format', 'post-format-quote')){
                    esc_html_e('Quotes', 'medicare');
                }elseif (is_tax('post_format', 'post-format-link')){
                    esc_html_e('Links', 'medicare');
                }elseif (is_tax('post_format', 'post-format-status')){
                    esc_html_e('Statuses', 'medicare');
                }elseif (is_tax('post_format', 'post-format-audio')){
                    esc_html_e('Audios', 'medicare');
                }elseif (is_tax('post_format', 'post-format-chat')){
                    esc_html_e('Chats', 'medicare');
                }else{
                    esc_html_e('Archives', 'medicare');
                }
            }
                
            return ob_get_clean();
    }
}

/* Page breadcrumb */
if (!function_exists('jws_theme_page_breadcrumb')) {
    function jws_theme_page_breadcrumb($delimiter) {
            ob_start();

			$delimiter = esc_attr($delimiter);
			$is_woo = function_exists('is_woocommerce') ? is_woocommerce() : false;
			if( $is_woo ){
				$args = array(
					'delimiter' => $delimiter
				);
				return woocommerce_breadcrumb( $args );
			}
            $home = esc_html__('Home', 'medicare');
            $before = '<span class="current">'; // tag before the current crumb
            $after = '</span>'; // tag after the current crumb

            global $post;
            $homeLink = home_url('/');
			if( is_home() ){
				esc_html_e('Home', 'medicare');
			}else{
				echo '<a href="' . esc_url($homeLink) . '">' . $home . '</a> ' . $delimiter . ' ';
			}

            if ( is_category() ) {
                $thisCat = get_category(get_query_var('cat'), false);
                if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
                echo wp_kses_post($before . esc_html__('Archive by category: ', 'medicare') . single_cat_title('', false) . $after);

            } elseif ( is_search() ) {
                echo wp_kses_post($before . esc_html__('Search results for: ', 'medicare') . get_search_query() . $after);

            } elseif ( is_day() ) {
                echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F').' '. get_the_time('Y') . '</a> ' . $delimiter . ' ';
                echo wp_kses_post($before . get_the_time('d') . $after);

            } elseif ( is_month() ) {
                echo wp_kses_post($before . get_the_time('F'). ' '. get_the_time('Y') . $after);

            } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                if(get_post_type() == 'portfolio'){
                    $terms = get_the_terms(get_the_ID(), 'portfolio_category', '' , '' );
                    if($terms) {
                        the_terms(get_the_ID(), 'portfolio_category', '' , ', ' );
                        echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                    }else{
                        echo wp_kses_post($before . get_the_title() . $after);
                    }
                }elseif(get_post_type() == 'recipe'){
                    $terms = get_the_terms(get_the_ID(), 'recipe_category', '' , '' );
                    if($terms) {
                        the_terms(get_the_ID(), 'recipe_category', '' , ', ' );
                        echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                    }else{
                        echo wp_kses_post($before . get_the_title() . $after);
                    }
                }elseif(get_post_type() == 'produce'){
                    $terms = get_the_terms(get_the_ID(), 'produce_category', '' , '' );
                    if($terms) {
                        the_terms(get_the_ID(), 'produce_category', '' , ', ' );
                        echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                    }else{
                        echo wp_kses_post($before . get_the_title() . $after);
                    }
                }elseif(get_post_type() == 'team'){
                    $terms = get_the_terms(get_the_ID(), 'team_category', '' , '' );
                    if($terms) {
                        the_terms(get_the_ID(), 'team_category', '' , ', ' );
                        echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                    }else{
                        echo wp_kses_post($before . get_the_title() . $after);
                    }
                }elseif(get_post_type() == 'testimonial'){
                    $terms = get_the_terms(get_the_ID(), 'testimonial_category', '' , '' );
                    if($terms) {
                        the_terms(get_the_ID(), 'testimonial_category', '' , ', ' );
                        echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                    }else{
                        echo wp_kses_post($before . get_the_title() . $after);
                    }
                }elseif(get_post_type() == 'myclients'){
                    $terms = get_the_terms(get_the_ID(), 'clientscategory', '' , '' );
                    if($terms) {
                        the_terms(get_the_ID(), 'clientscategory', '' , ', ' );
                        echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                    }else{
                        echo wp_kses_post($before . get_the_title() . $after);
                    }
                }elseif(get_post_type() == 'product'){
                    $terms = get_the_terms(get_the_ID(), 'product_cat', '' , '' );
                    if($terms) {
                        the_terms(get_the_ID(), 'product_cat', '' , ', ' );
                        echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                    }else{
                        echo wp_kses_post($before . get_the_title() . $after);
                    }
                }elseif(get_post_type() == 'services'){
                    $terms = get_the_terms(get_the_ID(), 'services_category', '' , '' );
                    if($terms) {
                        the_terms(get_the_ID(), 'services_category', '' , ', ' );
                        echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                    }else{
                        echo wp_kses_post($before . get_the_title() . $after);
                    }
                }else{
                    $post_type = get_post_type_object(get_post_type());
                    $slug = $post_type->rewrite;
                    echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
                    echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                }

            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                echo wp_kses_post($cats);
                echo wp_kses_post($before . get_the_title() . $after);
            }

            } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
                $post_type = get_post_type_object(get_post_type());
				if($post_type) echo wp_kses_post($before . $post_type->labels->singular_name . $after);
            } elseif ( is_attachment() ) {
                $parent = get_post($post->post_parent);
                $cat = get_the_category($parent->ID); $cat = $cat[0];
                echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
                echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            } elseif ( is_page() && !$post->post_parent ) {
                echo wp_kses_post($before . get_the_title() . $after);

            } elseif ( is_page() && $post->post_parent ) {
                $parent_id  = $post->post_parent;
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                for ($i = 0; $i < count($breadcrumbs); $i++) {
                    echo wp_kses_post($breadcrumbs[$i]);
                    if ($i != count($breadcrumbs) - 1)
                        echo ' ' . $delimiter . ' ';
                }
                echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

            } elseif ( is_tag() ) {
                echo wp_kses_post($before . esc_html__( 'Posts tagged: ', 'medicare' ) . single_tag_title('', false) . $after);
            } elseif ( is_author() ) {
                global $author;
                $userdata = get_userdata($author);
                echo wp_kses_post( $before . esc_html__( 'Articles posted by ', 'medicare' ) . $userdata->display_name . $after );
            } elseif ( is_404() ) {
                echo wp_kses_post($before . esc_html__( 'Error 404', 'medicare' ) . $after);
            }

            if ( get_query_var('paged') ) {
                if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
                    echo ' '.$delimiter.' '.esc_html__('Page', 'medicare') . ' ' . get_query_var('paged');
                if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
            }
                
            return ob_get_clean();
    }
}

/* Custom excerpt */
function jws_theme_custom_excerpt($limit, $more) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . esc_attr( $more );
    } else {
        $excerpt = implode(" ", $excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
    return $excerpt;
}

/* Custom excerpt */
function jws_theme_custom_content($limit,$more) {
	
	$trimContent = get_the_content();
	$shortContent = wp_trim_words( $trimContent, $limit, $more);
	echo do_shortcode($shortContent); 
	
}
/* Display navigation to next/previous set of posts */
if ( ! function_exists( 'jws_theme_paging_nav' ) ) {
	function jws_theme_paging_nav() {
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}

		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

		// Set up paginated links.
		$links = paginate_links( array(
				'base'     => $pagenum_link,
				'format'   => $format,
				'total'    => $GLOBALS['wp_query']->max_num_pages,
				'current'  => $paged,
				'mid_size' => 1,
				'add_args' => array_map( 'urlencode', $query_args ),
				'prev_text' => wp_kses( __( '<i class="fa fa-angle-left"></i>', 'medicare' ),array('i')),
				'next_text' => wp_kses( __( '<i class="fa fa-angle-right"></i>', 'medicare' ),array('i')),
		) );

		if ( $links ) {
		?>
		<div class="col-xs-12">
			<nav class="pagination text-right" role="navigation">
				<?php echo wp_kses_post($links); ?>
			</nav>
		</div>
		<?php
		}
	}
}
/* Display navigation to next/previous post */
if ( ! function_exists( 'jws_theme_post_nav' ) ) {
	function jws_theme_post_nav() {
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );
		if ( ! $next && ! $previous ) {
			return;
		}
		?>
		<nav class="navigation post-navigation clearfix" role="navigation">
			<div class="nav-links">
				<?php
					$previous = get_previous_post_link( '<div class="nav-previous pull-left">%link</div>', wp_kses( __( '<span class="btn text-left btn-default"><i class="fa fa-caret-left"></i>&nbsp; Previous</span>', 'medicare' ),array( 'span' => array( 'class' => array() ), 'i' => array( 'class' => array() ))) );
					$next = get_next_post_link(     '<div class="nav-next pull-right">%link</div>',     wp_kses( __( '<span class="text-right btn btn-default">Next &nbsp;<i class="fa fa-caret-right"></i></span>', 'medicare' ),array( 'span' => array( 'class' => array() ), 'i' => array( 'class' => array() ))) );
					if( $previous ){
						echo $previous;
					}else{
						?>
						<div class="nav-previous pull-left"><a href="#previous" rel="prev"><span class="btn btn-default disabled text-left"><i class="fa fa-caret-left"></i>&nbsp; Previous</span></a></div>
						<?php
					}
					if( $next ){
						echo $next;
					}else{
						?>
						<div class="nav-next pull-right"><a href="#next" rel="next"><span class="btn btn-default disabled text-right">Next &nbsp;<i class="fa fa-caret-right"></i></span></a></div>
						<?php
					}
				?>
			</div>
		</nav>
		<?php
	}
}
/* Title Bar */
if ( ! function_exists( 'jws_theme_title_bar' ) ) {
	function jws_theme_title_bar($jws_theme_show_page_title, $jws_theme_show_page_breadcrumb) {
		global $jws_theme_options;
		$class = array();
		$class[] = 'title-bar';
		
		if($jws_theme_show_page_title || $jws_theme_show_page_breadcrumb){ 
			jws_theme_get_content_title_bar( $class );
		}
	}
}
/*Custom comment list*/
function jws_theme_get_time_ago(){
	$comment_str_time= get_comment_date('Y-m-j').' '.get_comment_time('G:i:s');
	$cmtime = date_create($comment_str_time);
	$crtime = date_create(current_time('mysql'));
	$dif = (array)date_diff($crtime,$cmtime);
	$textreturn = array(
		'y' => esc_html__(' year ago','medicare'),
		'm' => esc_html__(' month ago','medicare'),
		'd' => esc_html__(' day ago','medicare'),
		'h' => esc_html__(' hou ago','medicare'),
		'i' => esc_html__(' minute ago','medicare'),
		's' => esc_html__('few seconrds ago','medicare'),
		'ys' => esc_html__(' years ago','medicare'),
		'ms' => esc_html__(' months ago','medicare'),
		'ds' => esc_html__(' days ago','medicare'),
		'hs' => esc_html__(' hour ago','medicare'),
		'is' => esc_html__(' minutes ago','medicare')
	);
	foreach ($dif as $key => $value) {
		if($value !=0 && $key=='s') return $textreturn[$key];
		if($value ==1) return $dif[$key].$textreturn[$key];
		if($value !=0) return $dif[$key].$textreturn[$key.'s'];
	}
}
function jws_theme_custom_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo wp_kses_post($tag) ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
		<?php if ( 'div' != $args['style'] ) : ?>
			<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php endif; ?>
			<div class="comment-avatar">
				<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
			</div>
			<div class="comment-info">
				
				<div class="comment-header-info">
					<span class="comment-author vcard">
						<?php printf( esc_html__( '%s','medicare' ), get_comment_author_link() ); ?>
					</span>
					<span class="comment-date">
						<?php  /* <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
							<?php
							//* translators: 1: date, 2: time 
							printf( esc_html__('%1$s %2$s','medicare'), get_comment_date('M, d, Y'),  get_comment_time('g:i A') ); ?>
						</a> */?>
						<?php  
						$timeago = jws_theme_get_time_ago(); 
						echo $timeago;
						
						?>
					</span>
					<div class="reply">
						<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					</div>
				</div>
				
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'medicare' ); ?></em>
					<br />
				<?php endif; ?>

				<?php comment_text(); ?>
				
			</div>
			
	<?php if ( 'div' != $args['style'] ) : ?>
		</div>
	<?php endif; ?>
<?php
}

function jws_theme_addURLParameter($url, $paramName, $paramValue) {
	 $url_data = parse_url($url);
	 if(!isset($url_data["query"]))
		 $url_data["query"]="";

	 $params = array();
	 parse_str($url_data['query'], $params);
	 $params[$paramName] = $paramValue;

	 if( $paramName == 'product_count' ) {
	 	$params['paged'] = '1';
	 }

	 $url_data['query'] = http_build_query($params);
	 return jws_theme_build_url($url_data);
}


function jws_theme_build_url($url_data) {
	 $url="";
	 if(isset($url_data['host']))
	 {
		 $url .= $url_data['scheme'] . '://';
		 if (isset($url_data['user'])) {
			 $url .= $url_data['user'];
				 if (isset($url_data['pass'])) {
					 $url .= ':' . $url_data['pass'];
				 }
			 $url .= '@';
		 }
		 $url .= $url_data['host'];
		 if (isset($url_data['port'])) {
			 $url .= ':' . $url_data['port'];
		 }
	 }
	 if (isset($url_data['path'])) {
	 	$url .= $url_data['path'];
	 }
	 if (isset($url_data['query'])) {
		 $url .= '?' . $url_data['query'];
	 }
	 if (isset($url_data['fragment'])) {
		 $url .= '#' . $url_data['fragment'];
	 }
	 return $url;
}

// Hooks add play btn for editor
add_action('admin_init', 'jws_theme_add_button_play');
function jws_theme_add_button_play() {
	add_filter('mce_external_plugins', 'jws_theme_add_plugin_play');
	add_filter('mce_buttons', 'jws_theme_register_button_play');
}
function jws_theme_register_button_play($buttons) {
	   array_push($buttons, "btnplay");
	   return $buttons;
}
function jws_theme_add_plugin_play($plugin_array) {
   $plugin_array['btnplay'] = JWS_THEME_URI_PATH .'/assets/js/mce.btn.play.js';
   return $plugin_array;
}
function jws_theme_get_template_popup($url){
	
	$template = '<div class="tb-overlay-bg"><div class="tb-overlay-container"><div class="tb-overlay-content content-lightbox"><div class="portfolio-lightbox"><img class="img-responsive" src="'.$url.'"><button title="Close (Esc)" type="button" class="tb-close"><i class="fa fa-times"></i></button></div></div></div></div>';
	return $template;
}

//
/**
 * Count product view.
 *
 * @since 1.0.0
 */
function jws_theme_set_count_view(){
    global $post;

    if(is_single() && !empty($post->ID) && !isset($_COOKIE['_jws_theme_count_view_'. $post->ID])){

        $views = get_post_meta($post->ID , '_jws_theme_count_view', true);

        $views = $views ? $views : 0 ;

        $views++;

        update_post_meta($post->ID, '_jws_theme_count_view' , $views);

        /* set cookie. */
        setcookie('_jws_theme_count_view_'. $post->ID, $post->ID, time() * 20, '/');
    }
}

add_action( 'wp', 'jws_theme_set_count_view' );

function jws_theme_get_count_view() {
    global $post;

    $views = get_post_meta($post->ID , '_jws_theme_count_view', true);

    $views = $views ? $views : 0 ;
    return $views;
}
//huynh
// key: postview_number
function jws_theme_setPostViews($postID) {
    $count_key = 'postview_number';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '20');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
}
function jws_theme_getPostViews($postID){
    $count_key = 'postview_number';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}
//end huynh
/* Woocommerce - Add meta tag -  data tabs */
add_filter( 'woocommerce_product_tabs', 'jws_theme_add_meta_tag_to_data_tabs' );
function jws_theme_add_meta_tag_to_data_tabs( $tabs ) {
	global $jws_theme_options;
	// Adds the new tab
	
	$tabs['tag'] = array(
		'title' 	=> esc_html__( 'TAGS', 'medicare' ),
		'priority' 	=> 50,
		'callback' 	=> 'jws_theme_add_meta_tag_to_data_tabs_content'
	);
	if( isset( $jws_theme_options['jws_theme_video_tab'] ) && $jws_theme_options['jws_theme_video_tab'] =='on_tabs' ){
		$tabs['video'] = array(
			'title' 	=> esc_html__( 'Video', 'medicare' ),
			'priority' 	=> 51,
			'callback' 	=> 'jws_theme_add_meta_tag_to_data_video_content'
		);
	}

	return $tabs;

}
function jws_theme_add_meta_tag_to_data_tabs_content() {
	global $post, $product;
	$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );
	echo wp_kses_post($product->get_tags( ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', $tag_count, 'medicare' ) . ' ', '</span>' ));
}
function jws_theme_add_meta_tag_to_data_video_content() {
	global $post;
	if(isset($post->ID)){
		$video = get_post_meta($post->ID, 'jws_theme_product_video_youtube', true);
		echo do_shortcode('<iframe width="560" height="315" src="' . esc_attr($video) .  '?autoplay=0" frameborder="0" allowfullscreen></iframe>');
	}
}


// update porfolio
add_action( 'wp_ajax_jws_theme_update_porfolio', 'jws_theme_update_porfolio' );
add_action( 'wp_ajax_nopriv_jws_theme_update_porfolio', 'jws_theme_update_porfolio' );

function jws_theme_update_porfolio(){
	global $wpdb, $pagenow;
	$data = (array) $_POST['data'];
	
	$args = isset( $data['args'] ) ? (array) $data['args'] : array();
	$options = isset( $data['options'] ) ? (array) $data['options'] : array();
	if( empty( $args ) || empty( $options ) ){
		return;
		wp_die();
	}

	extract( $options );

	$p = new WP_Query($args);
	
	if( $p->have_posts() ){
		switch ($columns) {

			case 1:

				$class_columns[] = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';

				break;

			case 2:

				$class_columns[] = 'col-xs-12 col-sm-6 col-md-6 col-lg-6';

				break;

			case 3:

				$class_columns[] = 'col-xs-12 col-sm-6 col-md-4 col-lg-4';

				break;

			case 4:

				$class_columns[] = 'col-xs-12 col-sm-6 col-md-3 col-lg-3';

				break;

			default:

				$class_columns[] = 'col-xs-12 col-sm-6 col-md-3 col-lg-3';

				break;

		}
		ob_start();
		$index = 0;
		while ( $p->have_posts() ) { $p->the_post();
			if( $tpl == 'tpl2' ){
				include( locate_template( 'framework/templates/portfolio/portfolio-lightbox.php' ) );
			}elseif($tpl=='tpl3'){
				include(locate_template( 'framework/templates/portfolio/portfolio_masonry.php' ) );
			}else{
				include( locate_template( 'framework/templates/portfolio/porfolio.php' ) );
			}
		}
		$response = array('pagination'=>'');
		$response['content'] = ob_get_clean();
		if( $show_pagination ){
			$big = 999999999; // need an unlikely integer
			$response['pagination'] = paginate_links( array(

				'base' => @add_query_arg( 'paged', '%#%', esc_url( $_POST['link'] ) ),

				'format' => '?paged=%#%',

				'current' => max( 1, intval( $args['paged'] ) ),

				'total' => $p->max_num_pages,

				'prev_text' => wp_kses( __( '<i class="fa fa-angle-left"></i>', 'medicare' ),array('i')),

				'next_text' => wp_kses( __( '<i class="fa fa-angle-right"></i>', 'medicare' ),array('i')),

			) );
		}

		wp_reset_postdata();

		$response['paged'] = $args['paged'] < $p->max_num_pages ? ( $args['paged'] + 1 ) : 0;
		echo json_encode( $response );
	}
	wp_die();
}

function jws_theme_get_page_id( $id, $global ){
	global $jws_theme_options;
	if( is_archive() || is_search() || is_single() ){
		if( isset( $jws_theme_options[ $id ] ) ){
			return $jws_theme_options[ $id ];
		}else{
			$post_id = get_option('page_on_front');
		}
	}else{
		$post_id = get_queried_object_id();
	}

	$result = get_post_meta( $post_id , $id, true );

	if( $global && ($result=='global'||$result=='') && isset( $jws_theme_options[ $id ] ) ){
		return $jws_theme_options[ $id ];
	}
	return $result;
}

function jws_theme_get_object_id( $id, $global=false ){
	if( function_exists('is_woocommerce') && is_woocommerce() )
		return jws_theme_get_shop_id( $id, $global );
	else
		return jws_theme_get_page_id( $id, $global );
}

function jws_theme_get_sep_title( $title, $separated=',' ){
	$title = explode( $separated, $title );
	$title = array_map(function($v){
		if( !empty($v) ){
			return $v;
		}
	}, $title);
	return $title;
}

function jws_theme_custom_cat_thumbnail($thumb){
	$thumb = 'medicare-thumb-cat-large';
	return $thumb;
}

add_filter('body_class', 'jws_theme_body_classes');

function jws_theme_body_classes($classes) {
	global $jws_theme_options;
	$classes[] = $jws_theme_options['jws_theme_body_layout'];
    return $classes;
}
add_action( 'wp_ajax_jws_theme_load_more_posts', 'jws_theme_load_more_posts' );
add_action( 'wp_ajax_nopriv_jws_theme_load_more_posts', 'jws_theme_load_more_posts' );

function jws_theme_load_more_posts(){
	global $wpdb, $pagenow;
	$data = (array)$_POST['data'];
	if( empty( $data['args']) || empty( $data['atts']) ) return;
	$query_args = (array)$data['args'];

	if( empty( $query_args['paged'] ) ) return;

	$query_args['paged'] += 1;
	extract( (array)$data['atts'] );

	$class_columns = array();
	switch ($columns) {
		case 1:
			$class_columns[] = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
			break;
		case 2:
			$class_columns[] = 'col-xs-12 col-sm-12 col-md-6 col-lg-6';
			break;
		case 3:
			$class_columns[] = 'col-xs-12 col-sm-12 col-md-4 col-lg-4';
			break;
		case 4:
			$class_columns[] = 'col-xs-12 col-sm-6 col-md-4 col-lg-3';
			break;
		default:
			$class_columns[] = 'col-xs-12 col-sm-6 col-md-4 col-lg-4';
			break;
	}

	$wpp = new WP_Query( $query_args );
	ob_start();	
	if ($wpp->have_posts() ) {
		$response['args'] = $query_args;
		if( $wpp->max_num_pages > 1 && $query_args['paged'] <= $wpp->max_num_pages ){
			/*if( $show_pagination ){
				$big = 999999999;
				$response['page'] = paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, $query_args['paged'] ),
					'total' =>$wpp->max_num_pages,
					'prev_text' => esc_html__( 'Prev', 'mariage' ),
					'next_text' => esc_html__( 'Next', 'mariage' )
				) );
			}
			*/
			$response['max'] = $query_args['paged'] == $wpp->max_num_pages;
		}
		?><?php $i=0;
			while ($wpp->have_posts() ) {$wpp->the_post();
			?>
				<div class="<?php echo esc_attr(implode(' ', $class_columns)); ?>">
				<?php
					include JWS_THEME_ABS_PATH_FR .'/shortcodes/blog_grid/'. $tpl.'.php';
				?>
				</div>
			<?php
            $i++;
		}
    }
    wp_reset_postdata();
    $response['content'] = ob_get_clean();
    echo json_encode( $response );
	wp_die();
}

function jws_theme_get_image_width( $size ) {
	global $_wp_additional_image_sizes;

	if ( in_array( $size, array('thumbnail', 'medium', 'medium_large', 'large') ) ) {
		return get_option( "{$size}_size_w" );
	} elseif ( isset( $_wp_additional_image_sizes[ $size ] ) ) {
		return $_wp_additional_image_sizes[ $size ]['width'];
	}

	return false;
}