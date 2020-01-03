<?php
/*
Plugin Name: Categoties custom post type
Plugin URI: 
Description: View categories for custom post type
Author: Dai Huynh
Version: 1.0
Author URI: http://jwsthemes.com
*/
/**
 * Class Popular_Posts_With_Thumbnails
 */
class Popular_Posts_With_Thumbnails extends WP_Widget {
	
	/**
	 * New Widget: Name, base ID
	 */
	function __construct() {
		$widget_ops = array(
			'classname' => 'popular_post_widget', 
			'description' => esc_html__( "Show popular post in your blog. Note: Add meta-key",'medicare') //Huynh
		);
		parent::__construct(
			'popular_post_widget', //id
			esc_html__('Popular Post','medicare'), //name
			$widget_ops
		);
		

	}

	/**
	 * Form option for Widget
	 */
	function form( $instance ) {
		$default = array(
			'title'		=> 'Popular post',
			'postnum'	=> 5,
			'postdate'	=> 30,
			'show_date' => true,
			'show_view' => true,
			'crop_img' => 'none'
		);
		// @param
		$instance = wp_parse_args( (array) $instance, $default );
        $title = esc_attr( $instance['title'] );
        $postnum = intval( esc_attr( $instance['postnum'] ));
        $postdate = intval(esc_attr( $instance['postdate'] ));
		$show_date = esc_attr( $instance['show_date'] );
        $show_view = esc_attr( $instance['show_view'] );
        $crop_img = esc_attr( $instance['crop_img'] );
		// user interface
		?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:','medicare' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id( 'postnum' ); ?>"><?php esc_html_e( 'Number of posts to show:','medicare'); ?></label>
        <input id="<?php echo $this->get_field_id( 'postnum' ); ?>" name="<?php echo $this->get_field_name( 'postnum' ); ?>" type="text" value="<?php echo $postnum; ?>" size="3" /></p>
		
		<p><label for="<?php echo $this->get_field_id( 'postdate' ); ?>"><?php esc_html_e( 'Display post','medicare' ); ?></label>
        <input id="<?php echo $this->get_field_id( 'postdate' ); ?>" name="<?php echo $this->get_field_name( 'postdate' ); ?>" type="text" value="<?php echo $postdate; ?>" size="3" /><label for="<?php echo $this->get_field_id( 'postdate' ).'_2'; ?>"><?php esc_html_e( 'day(s) ago.','medicare' ); ?></label> <i><?php esc_html_e('0 to show all','medicare');?></i> </p>
		
		<p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php esc_html_e( 'Display post date','medicare' ); ?></label></p>
		
		<p><input class="checkbox" type="checkbox" <?php checked( $show_view ); ?> id="<?php echo $this->get_field_id( 'show_view' ); ?>" name="<?php echo $this->get_field_name( 'show_view' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_view' ); ?>"><?php esc_html_e( 'Display post view','medicare' ); ?></label></p>
		
		<p><label for="<?php echo $this->get_field_id( 'crop_img' ); ?>"><?php esc_html_e( 'Crop image:','medicare' ); ?></label>
		<select name = "<?php echo $this->get_field_name( 'crop_img');  ?>">
		  <option value="none" <?php  if($crop_img =='none') echo 'selected'?>>None</option>
		  <option value="popular_post_small_thumbnail" <?php  if($crop_img =='popular_post_small_thumbnail') echo 'selected'?>><?php esc_html_e('Small thumbnail','medicare');?></option>
		  <option value="popular_post_normal_thumbnail" <?php  if($crop_img =='popular_post_normal_thumbnail') echo 'selected'?>><?php esc_html_e('Normal thumbnail','medicare');?></option>
		</select>
		<?php 
		//End form
	}
	/**
	 * save widget form
	 */

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] 		= strip_tags($new_instance['title']);
		$instance['postnum'] 	= (int) $new_instance['postnum'];
		$instance['postdate'] 	= (int) $new_instance['postdate'];
		$instance['show_date'] 	= (bool) $new_instance['show_date'];
		$instance['show_view'] 	= (bool) $new_instance['show_view'];
		$instance['crop_img'] 	=  $new_instance['crop_img'];
		return $instance;
	}
	function widget($args, $instance) {
		if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;
		ob_start();
        extract($args);
		global $jws_theme_options;
		$image_default = isset($jws_theme_options['jws_theme_image_default']) ? $jws_theme_options['jws_theme_image_default'] : '';
		$title = apply_filters( 'widget_title', $instance['title'] );
		$postnum = intval( apply_filters( 'widget_postnum', $instance['postnum'] ));
		$postdate = intval( apply_filters( 'widget_postdate', $instance['postdate'] ));
		$show_date = apply_filters( 'widget_show_date', $instance['show_date'] );
		$show_view = apply_filters( 'widget_show_view', $instance['show_view'] );
		$crop_img = apply_filters( 'widget_crop_img', $instance['crop_img'] );
		
		 $query_args = array(
			'post_type'=>'post',
            'posts_per_page' => $postnum,
			
			'no_found_rows' => true, 
			'post_status' => 'publish', 
			'ignore_sticky_posts' => true,
			
            'meta_key' => 'postview_number', //Huynh
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
            'ignore_sticky_posts' => -1
        );
		
		//Get the popular-post list
		/*
		$r = new WP_Query(array('post_type'=>'post','posts_per_page' => $number,'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true,'meta_key'=>'popular_posts', 'orderby'=>'meta_value_num', 'order'=>'DESC'));
		*/
		//Start widget
		echo $before_widget; //<div
		if($title) echo $before_title.$title.$after_title;
	
		$postview_query = '';
		if($postdate > 0){
			if (!function_exists('filter_where')) {
				function filter_where( $where = '' ) {
					global $postdate;
					$where .= " AND post_date > '" . date('Y-m-d', strtotime('-'.$postdate.' days')) . "'";
					return $where;
				}
			}
			//add filter
			add_filter( 'posts_where', 'filter_where' );
			$postview_query = new WP_Query( $query_args );
 
			remove_filter( 'posts_where', 'filter_where' ); // remove filter
		}else{
			$postview_query = new WP_Query( $query_args );
		}
		if ($postview_query->have_posts()){?>
			<div class="show_popular_post">
				<ul> <?php
					while ( $postview_query->have_posts() ) :
						$postview_query->the_post(); ?>
						
					<li>
						<div class = "post_view">
							<div class="tb-thumb">
								<a href="<?php the_permalink();?>" class="thumb-image"> 
								<?php //thumbnail
									if ( has_post_thumbnail() ){
										//the_post_thumbnail( 'thumbnail' );
										/* add_image_size( 'popular_post_thumbnail', 150, 100, true );
										the_post_thumbnail( 'popular_post_thumbnail' );
										remove_image_size('popular_post_thumbnail'); */
										//$img_siz = array('150','100');
										//the_post_thumbnail(array('320','200'));
										if($crop_img != 'none'){
											add_image_size( 'popular_post_small_thumbnail', 150, 100, true );
											add_image_size( 'popular_post_normal_thumbnail', 375, 250, true );
											the_post_thumbnail( $crop_img );
											remove_image_size('popular_post_small_thumbnail');
											remove_image_size('popular_post_normal_thumbnail');
										}
										else the_post_thumbnail(array('300','200'));
										
									}else
										echo '<img class="bt-image-cropped" src="'. esc_attr($image_default['url']) .'" alt="">';
								?>
								</a>
							</div>
							<div class="popular-post-content "> 
								<a href="<?php the_permalink(); ?>" class="title_popular"><?php the_title(); ?></a>
								<div class ="post-more-info"> 
									<?php if ( $show_date ) : 
										$post_year  = get_the_time('Y'); 
										$post_month = get_the_time('m'); 
										$post_day   = get_the_time('d'); 
									?>							
									<a href="<?php echo esc_url(get_day_link($post_year, $post_month, $post_day)); ?>">
										<span class="post-date"><?php echo get_the_time('d').' '.get_the_time('M').'. '.get_the_time('Y').'. ';?></span></a>
									<?php endif; ?>
									<?php if ( $show_view ) :?>
										<i class="post-view"><?php echo jws_theme_getPostViews(get_the_ID()).' views'; ?></i>
									<?php endif; ?>
								</div>
								
							</div>  
						</div>
					</li> 
					<?php endwhile; ?>
				</ul>
	
			</div>  
		
		
		
		
 
		<?php  
		}
		// End Widget content
		echo $after_widget;
		// Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();
        $cache[$args['widget_id']] = ob_get_flush();
	}
	/***********
	var a;
	
	function g{}
	*/
}

function register_popular_post_widget () {
	register_widget('Popular_Posts_With_Thumbnails');
}
add_action('widgets_init', 'register_popular_post_widget');