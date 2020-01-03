<?php
function tb_blog_func($atts) {
    extract(shortcode_atts(array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'category' => '',
        'services_category' => '',
        'testimonial_category' => '',
		'doctor_category' => '',
		'columns' => '',
        'style' => 'blog',
		'deviation_text_align' => 'left',
        'services_style' => 'entry',
        'testimonial_style' => 'entry',
		'doctor_style' => 'entry',
		'testimonial_max_height' => '460px',
        'crop_image' => 1,
        'width_image' => 300,
        'height_image' => 200,
        'show_title' => 0,
        'show_info' => 0,
        'show_desc' => 0,
        'show_pagination' => 'none',
		'pos_pagination' => 'text-center',
        'excerpt_length' => 10,
        'excerpt_more' => '',
        'orderby' => 'none',
        'order' => 'none',
		'ob_animation' => 'wrap',
		'animation' => '',
        'el_class' => ''
    ), $atts));
    
	$style_wrap = array();
	$class = array();
    switch ($post_type) {
        case 'post':
            $category = $category;
            $taxonomy = 'category';
            $style = $style;
            break;
        case 'services':
            $category = $services_category;
            $taxonomy = 'services_category';
            $style = $services_style;
            break;
		case 'testimonial':
            $category = $testimonial_category;
            $taxonomy = 'testimonial_category';
            $style = $testimonial_style;
			$style_wrap[] = 'max-height: '.$testimonial_max_height.';';
			$style_wrap[] = 'overflow-x: hidden;';
			//$style_wrap[] = 'overflow-y: scroll;';
			$style_wrap[] = 'overflow-y: hidden;';
			$class[] = 'nice-scroll-class-js';
            break;
		case 'doctor':
            $category = $doctor_category;
            $taxonomy = 'doctor_category';
            $style = $doctor_style;
			/* $style_wrap[] = 'max-height: '.$doctor_max_height.';';
			$style_wrap[] = 'overflow-x: hidden;';
			//$style_wrap[] = 'overflow-y: scroll;';
			$style_wrap[] = 'overflow-y: hidden;';
			$class[] = 'nice-scroll-class-js'; */
            break;
    }
    $cl_effect = getCSSAnimation($animation);
    
    $class[] = 'tb-blog';
    $class[] = $post_type;
    $class[] = $style;
	if($ob_animation == 'wrap') $class[] = $cl_effect;
    $class[] = $el_class;
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    
    $args = array(
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'orderby' => $orderby,
        'order' => $order,
        'post_type' => $post_type,
        'post_status' => 'publish');
    if (isset($category) && $category != '') {
        $cats = explode(',', $category);
        $category = array();
        foreach ((array) $cats as $cat) :
        $category[] = trim($cat);
        endforeach;
        $args['tax_query'] = array(
			array(
				'taxonomy' => $taxonomy,
				'field' => 'id',
				'terms' => $category
			)
		);
    }
    $wp_query = new WP_Query($args);    
    ob_start();
    if ( $wp_query->have_posts() ) {
    ?>
    <div class="<?php echo esc_attr(implode(' ', $class)); ?>" <?php  if($style_wrap) {?> style="<?php echo esc_attr(implode(' ', $style_wrap)); ?>" <?php  }?>> 
		<?php
			$loop = 0;
			$class_columns = array();
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
					$class_columns[] = 'col-xs-12 col-sm-6 col-md-4 col-lg-3';
					break;
				default:
					$class_columns[] = 'col-xs-12 col-sm-6 col-md-4 col-lg-3';
					break;
			}
			
			if($ob_animation == 'item') $class_columns[] = $cl_effect;
			while ( $wp_query->have_posts() ) { 
				$wp_query->the_post();
				/*echo '<div class="'.esc_attr(implode(' ', $class_columns)).'">';*/ //remo bootstrap
					$format = '';
					$format = get_post_format();
					if($format && is_file(getcwd()."/$post_type/$style-$format.php")){
						if($post_type = 'space') {
							include "$post_type/$style.php";
						}else {
							include "$post_type/$style-$format.php";
						}
					}else{
						include "$post_type/$style.php";
						//include "/$post_type/entry.php";
					}
				/*echo '</div>';*/
			}
		?>
        <?php if($show_pagination == 'number'){ ?>
			<nav class="pagination <?php echo esc_attr($pos_pagination); ?>" role="navigation">
				<?php
					$big = 999999999; // need an unlikely integer

					echo paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('paged') ),
						'total' => $wp_query->max_num_pages,
						'prev_text' => wp_kses( __( '<i class="fa fa-angle-left"></i>&nbsp; Previous', 'medicare' ),array('i')),
						'next_text' => wp_kses( __( 'Next &nbsp;<i class="fa fa-angle-right"></i>', 'medicare' ),array('i')),
					) );
				?>
			</nav>
		<?php } ?>
		<?php if($show_pagination == 'ajax'){ 
			$args['posts_per_page'] = '-1';
			$wp_query_pagination = new WP_Query($args);
			$all_post = count($wp_query_pagination->posts);
			$max_page_num =  round(($all_post / $posts_per_page) + 0.4);
			
			if($all_post > $posts_per_page){
				wp_enqueue_script('blog.page.ajax', URI_PATH_FR . '/shortcodes/blog_grid_custom/ajax-page.js');
				wp_localize_script( 'blog.page.ajax', 'variable_js', array(
					'ajax_url' => admin_url( 'admin-ajax.php' )
				));
				$data_params = $atts;
				?>
				<nav class="pagination blog <?php echo esc_attr($pos_pagination); ?> <?php echo esc_attr($show_pagination); ?>" role="navigation">
					<a href="#" data-params="<?php echo esc_attr(json_encode($data_params)); ?>" data-max-page="<?php echo esc_attr($max_page_num); ?>" data-next-page="<?php echo esc_attr('2'); ?>">LOAD MORE ...</a>
				</nav>
				<?php
			} 
		}	
		?>
    </div>
    <?php
    }else {
            echo 'Post not found!';
    } 
    ?>
    
    <?php
    wp_reset_postdata();
    return ob_get_clean();
}

if(function_exists('insert_shortcode')) { insert_shortcode('tb_blog', 'tb_blog_func'); }

add_action( 'wp_ajax_nopriv_render_blog_list', 'render_blog_list' );
add_action( 'wp_ajax_render_blog_list', 'render_blog_list' );
function render_blog_list(){
	extract($_POST['params']);
	$style_wrap = array();
    switch ($post_type) {
        case 'post':
            $category = (isset($category))? $category : '';
            $taxonomy = 'category';
            $style = $style;
            break;
        case 'services':
            $category = $services_category;
            $taxonomy = 'services_category';
            $style = $services_style;
            break;
		case 'testimonial':
            $category = $testimonial_category;
            $taxonomy = 'testimonial_category';
            $style = $testimonial_style;
			$style_wrap[] = 'max-height: '.$testimonial_max_height.';';
			$style_wrap[] = 'overflow-x: hidden;';
			$style_wrap[] = 'overflow-y: scroll;';
            break;
		case 'doctor':
            $category = $doctor_category;
            $taxonomy = 'doctor_category';
            $style = $doctor_style;
			//$style_wrap[] = 'max-height: '.$doctor_max_height.';';
			//$style_wrap[] = 'overflow-x: hidden;';
			//$style_wrap[] = 'overflow-y: scroll;';
            break;
    }
	$animation = (isset($animation))? $animation : '';
    $cl_effect = getCSSAnimation( $animation );
    $class = array();
    $class[] = 'tb-blog';
    $class[] = $post_type;
    $class[] = $style;
	if($ob_animation == 'wrap') $class[] = $cl_effect;
    $class[] = (isset($el_class))? $el_class : '';
    
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    
    $args = array(
        'posts_per_page' => $posts_per_page,
        'paged' => $_POST['paged'],
        'orderby' => $orderby,
        'order' => $order,
        'post_type' => $post_type,
        'post_status' => 'publish');
    if (isset($category) && $category != '') {
        $cats = explode(',', $category);
        $category = array();
        foreach ((array) $cats as $cat) :
        $category[] = trim($cat);
        endforeach;
        $args['tax_query'] = array(
                                array(
                                    'taxonomy' => $taxonomy,
                                    'field' => 'id',
                                    'terms' => $category
                                )
                        );
    }
    $wp_query = new WP_Query($args);
    
    ob_start();
    if ( $wp_query->have_posts() ) {
			$class_columns = array();
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
					$class_columns[] = 'col-xs-12 col-sm-6 col-md-4 col-lg-3';
					break;
				default:
					$class_columns[] = 'col-xs-12 col-sm-6 col-md-4 col-lg-3';
					break; 
			}
			
			if($ob_animation == 'item') $class_columns[] = $cl_effect;
			while ( $wp_query->have_posts() ) { $wp_query->the_post();
				echo '<div class="'.esc_attr(implode(' ', $class_columns)).'">';
					$format = '';
					$format = get_post_format();
					if($format && is_file(getcwd()."/$post_type/$style-$format.php")){
						include "$post_type/$style-$format.php";
					}else{
						include "$post_type/$style.php";
					}
				echo '</div>';
			}
	}else{ 
		echo 'Post not found!';
	}
	
	wp_reset_postdata();
    $blog_items = ob_get_clean();
    echo tb_filtercontent($blog_items); exit;
    
}
