<?php
function jws_theme_blog_grid_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'tpl' => 'tpl1',
		'columns' =>'',
		/**/
		//'show_pagination' => '',
		'pos_pagination' => 'text-center',
		'ob_animation' => 'wrap',
		'animation' => '',
		/**/
		'post_type' => 'post',
        'el_class' => '',
		'category' => '',
		'doctor_category' => '',
		'services_category' => '',		
		'posts_per_page' => -1,
		'orderby' => 'none',
        'order' => 'none',
		'show_thumb' => 0,
		'show_title' => 0,
		'show_info' => 0,
		'show_more_info'=>'',  //custom field
        'show_excerpt' => 0,
        'excerpt_lenght' => 15,
        'excerpt_more' => '',
        'readmore_text' => '',
        'readmore_block' => '',
		'style' => 'blog',
		'services_style'=>'services_style_one',
		'crop_image' => 1,
		//'show_view_more' => 0,
        'width_image' => 300,
        'height_image' => 200,		
		'view_more_post' =>'', // pagination || load_more || none
		'title_view_more_post'  => '',
		'text_align' =>'text-left'
    ), $atts));
	
    $class = array();
    $class[] = $tpl;
	

    if($tpl == 'tpl1'){
    	$class[] =  'tb-blog-grid';
    }elseif($tpl == 'tpl2'){
    	$class[] = 'ct-blog-small-grid';
    	$tpl = 'tpl2';
    }else{
		$class[] = 'ct-blog-custom-grid';
		//$tpl = 'tpl3';
	}
	$class[] = $text_align;
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
			$style_wrap[] = 'overflow-y: hidden;';
			$class[] = 'nice-scroll-class-js';
            break;
		case 'doctor':
			$category = $doctor_category;
            $taxonomy = 'doctor_category';
            $style = '';
			break;
    }
	$cl_effect = getCSSAnimation($animation);
	if($ob_animation == 'wrap') $class[] = $cl_effect;
    $class[] = $el_class;
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $class[] = $style;
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
		$class_columns = array();
		switch ($columns) {
			case 1:
				$class_columns[] = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
				break;
			case 2:
				$class_columns[] = 'col-xs-12 col-sm-12 col-md-6 col-lg-6';
				break;
			case 3:
				$class_columns[] = 'col-xs-12 col-sm-6 col-md-4 col-lg-4';
				break;
			case 4:
				$class_columns[] = 'col-xs-12 col-sm-6 col-md-3 col-lg-3';
				break;
			case 5:
			case 6:
				$class_columns[] = 'col-xs-6 col-sm-4 col-md-2 col-lg-2';
				break;
			default:
				$class_columns[] = 'col-xs-6 col-sm-4 col-md-4 col-lg-4';
				break;
		}
		
		?>
		<?php  if($tpl == 'tpl5') {
		  include $tpl.'.php';; 
        }
		
		else{ 
			$class_columns[] = ' same-height';?>
            <div class="row">
    			<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
    				<?php $i = 0;$ex_clss='';$xman=rand(1,sizeof($wp_query->posts));
    				while ( $wp_query->have_posts() ) { $wp_query->the_post(); $i++;?>
    					<?php if($tpl == 'tpl3' && $i == 1){
    						$col_6 = 'col-xs-12 col-sm-12 col-md-6 col-lg-6 bit_columns';
    						$ex_clss = ' small_item';?>
    						 <div class="<?php echo esc_attr($col_6).' big_item'; ?>">
    						  <?php include 'big_item.php'; ?>
    						 </div>
    					 <?php }elseif($tpl == 'tpl4' && $i == 1){
    						 $ex_clss = ' small_item';
    					 }else{?>
    						 <div class="<?php echo esc_attr(implode(' ', $class_columns)).$ex_clss ?>">
    							<?php 
    							if($tpl == 'tpl4') include 'tpl3.php';
    							//elseif($tpl =='tpl5' && $i != $xman){}
    							else include $tpl.'.php'; ?>
    						</div>
    				<?php }
    				} ?>
    			</div>
            </div>
		
		<?php }
		if( $wp_query->max_num_pages > 1 ){
		if( $view_more_post == "load_more"):?>
		<div class = "loadmore_space <?php  echo esc_attr(implode(' ', $class));?>"></div>
            <div class="tb-view-more-post text-center <?php echo esc_attr($style);?>"><a class="health-btn round-border" data-args='<?php echo json_encode( $args );?>' data-atts='<?php echo json_encode( $atts );?>'  href="#"><?php echo $title_view_more_post;?></a></div>
        <?php endif;
		if($view_more_post =='pagination'){?>		
			<nav class="pagination tb-pagination text-center" role="navigation">
			<?php
				$big = 999999999; // need an unlikely integer

				echo paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var('paged') ),
					'total' => $wp_query->max_num_pages,
					'type'               => 'plain',
					'prev_text' => wp_kses( __( '<i class="fa fa-angle-left"></i>', 'medicare' ),array('i')),
					'next_text' => wp_kses( __( '<i class="fa fa-angle-right"></i>', 'medicare' ),array('i')),
				) );
			?>
			</nav>
		<?php }
		}?>
		<?php
	}else {
		echo '<h2> Post not found!<h2>';
	} 
	?>
	<?php wp_reset_postdata(); ?> 	
    <?php
	return ob_get_clean();
}
if(function_exists('insert_shortcode')) { insert_shortcode('blog_grid', 'jws_theme_blog_grid_func'); }
?>