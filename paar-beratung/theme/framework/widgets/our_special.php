<?php
/*
Plugin Name: Our Special Widget
Plugin URI: 
Description: View our Special services
Author: Dai Huynh
Version: 1.0
Author URI: http://jwsthemes.com
*/
/**
 * Class Our_Special
 */
class Our_Special extends WP_Widget {
	
	/**
	 * New Widget: Name, base ID
	 */
	function __construct() {
		$widget_ops = array(
			'classname' => 'our_special_widget', 
			'description' => esc_html__( "View our Special services",'medicare') //Huynh
		);
		parent::__construct(
			'our_special_widget', //id
			esc_html__('Our Special Widget','medicare'), //name
			$widget_ops
		);
		

	}

	/**
	 * Form option for Widget
	 */
	function form( $instance ) {
		$default = array(
			'title'		=> 'Our Special',
			'post_num'	=> 4,
			'col_num'	=> 2,
			'header_icon'	=>'fa fa-check',
			'header_text' 	=> '',
			'text_content' 	=> '',
			
		);
		// @param
		$instance = wp_parse_args( (array) $instance, $default );
        $title = esc_attr( $instance['title'] );
        $post_num	= intval( esc_attr( $instance['post_num'] ));
        $col_num	= intval(esc_attr( $instance['col_num'] ));
        $header_icon	= esc_attr( $instance['header_icon'] );
		for($i=1; $i<=$post_num;$i++){
			$txt ='header_text'.$i; 
			$$txt= esc_attr( $instance[$txt] );
			$txt ='text_content'.$i;
			$$txt= esc_attr( $instance[$txt] );
			
		}
		
		// user interface

		
		?>
		
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:','medicare' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('post_num' ); ?>"><?php esc_html_e( 'Number of services to show:','medicare' );?></label>
        <input id="<?php echo $this->get_field_id( 'post_num' ); ?>" name="<?php echo $this->get_field_name( 'post_num' ); ?>" type="text" value="<?php echo $post_num; ?>" size="3" /> <i><?php esc_html_e('press Enter to take effect.','medicare');?></i> </p>
		<p><label for="<?php echo $this->get_field_id('col_num' ); ?>"><?php esc_html_e( 'Column(s) to show:','medicare' );?></label>
        <input id="<?php echo $this->get_field_id( 'col_num' ); ?>" name="<?php echo $this->get_field_name( 'col_num' ); ?>" type="text" value="<?php echo $col_num; ?>" size="3" /><i><?php esc_html_e('max = 6 default 1','medicare');?></i> </p>
		
		<p><label for="<?php echo $this->get_field_id( 'header_icon' ); ?>"><?php esc_html_e( 'Header_icon:','medicare'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'header_icon' ); ?>" name="<?php echo $this->get_field_name( 'header_icon' ); ?>" type="text" value="<?php echo $header_icon; ?>" /></p>
		
		<?php  for($i=1; $i<=$post_num;$i++){?>
			<p><label for="<?php echo $this->get_field_id( 'Text'.$i ); ?>"><?php printf(esc_html__( 'Text %d: ','medicare' ),$i); ?></label>
			<input class="widefat" placeholder="Header text" id="<?php echo $this->get_field_id( 'header_text_'.$i ); ?>" name="<?php echo $this->get_field_name('header_text'.$i); ?>" type="text" value="<?php $txt ='header_text'.$i; echo $$txt; ?>" /></p>
			<textarea rows="2" class="widefat" placeholder="Text" id="<?php echo $this->get_field_id( 'text_content'.$i ); ?>" name="<?php echo $this->get_field_name('text_content'.$i); ?>" style="margin-top: 0px; margin-bottom: 0px; width:100%; "><?php $txt ='text_content'.$i; echo $$txt; ?></textarea>
			<?php
		}?>
		<?php 
		//End form
	}
	/**
	 * save widget form
	 */

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] 		= strip_tags($new_instance['title']);
		$instance['header_icon'] = strip_tags($new_instance['header_icon']);
		$instance['post_num'] 	= (int)( $new_instance['post_num']!='' ? $new_instance['post_num']:4);
		$a= $instance['post_num']>6? 6: $instance['post_num'];
		$instance['col_num'] 	= (int) $new_instance['col_num'] <=6 ? $new_instance['col_num'] :a;
		for($i=1; $i<=$instance['post_num'];$i++){
			$instance['header_text'.$i]= strip_tags($new_instance['header_text'.$i]);
			//$instance['text_content'.$i]= strip_tags($new_instance['text_content'.$i]); //clear html tag
			$instance['text_content'.$i]= $new_instance['text_content'.$i];
		}
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
		$post_num = apply_filters( 'widget_post_num', $instance['post_num'] );
		$icon = apply_filters( 'widget_header_icon', $instance['header_icon'] );
		if($post_num =='') $postnum = 4;
		$col_num = apply_filters( 'widget_col_num', $instance['col_num'] );
		if($col_num=='') $post_num>6? 6: $post_num;
		if($col_num == 5) $col_num = 4;
		for($i=1; $i<=$post_num;$i++){
			$txt ='header_text'.$i; 
			$$txt = apply_filters( 'widget_'.$txt, $instance[$txt] );
			$txt ='text_content'.$i;
			$$txt = apply_filters( 'widget_'.$txt, $instance[$txt] );
		}
		$before_header_text = '<h4 class ="header_text">';
		$after_header_text = '</h4> ';
		if($icon){
			$arr_icon=explode(' ',$icon);
			$icon = implode(' ',array(
				'fa',
				end($arr_icon)
				)
			);
		}
		$class_col = 'col-xs-12 col-sm-12 col-md-'.(12/$col_num).' col-lg-'.(12/$col_num);
		//Start widget
		echo $before_widget; //<div
		if($title) echo $before_title.$title.$after_title;
		//echo '<div class = "our_special_widget">';
		//$i=1;
		echo '<div class="row">';
		for($i=1;$i<=$post_num;$i++){
			?>
			
				<div class = "<?php echo $class_col;?>  our_special_widget_col_<?php  echo $i;?>"><?php  
					$txt ='header_text'.$i;
					if($$txt){
						echo $before_header_text;		 
						if( ! empty( $icon ) ) echo '<span class="wg-header-icon"><i class="'.esc_attr($icon).'"></i></span>';
						echo '<span class="wg-header-text">'. esc_html($$txt) .'  </span>';
						echo $after_header_text;
					}
					$txt ='text_content'.$i;
					if( ! empty( $$txt ) ) echo '<div class="wg-content">'.$$txt.'</div>';
				?></div>
			
			<?php  
		}
		
		echo '</div>';
		
		// End Widget content
		echo $after_widget;
		echo '<div class="clearfix"> </div>';
		// Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();
        $cache[$args['widget_id']] = ob_get_flush();
	}	
}

function register_Our_Special_widget () {
	register_widget('Our_Special');
}
add_action('widgets_init', 'register_Our_Special_widget');