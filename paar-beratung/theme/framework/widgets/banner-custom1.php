<?php
/*
Widget Name: Banner custom wp_widget
Plugin URI: 
Description: Add a banner with text
Author: Dai Huynh
Version: 1.0
Author URI: http://jwsthemes.com
*/
/**
 * Class WP_Widget_banner_custom
 */
class WP_Widget_banner_custom extends WP_Widget {
	
	/**
	 * New Widget: Name, base ID
	 */
	function __construct() {
		$widget_ops = array(
			'classname' => 'wpwg_banner_custom', 
			'description' => esc_html__( "Add a banner with text",'medicare') //Huynh
		);
		parent::__construct(
			'banner_custom_widget', //id
			esc_html__('Banner custom','medicare'), //name
			$widget_ops
		);
		

	}

	/**
	 * Form option for Widget
	 */
	function form( $instance ) {
		$default = array(
			'title'		=> '',
			'banner_image'	=> '',
			'header'	=> '',
			'el_class'	=> '',
			'link'=> '#',
			'icon'=> '',
			
		);
		// @param
		$instance = wp_parse_args( (array) $instance, $default );
        $title = esc_attr( $instance['title'] );
        $banner_image = isset( $instance['banner_image']) ? ($instance['banner_image']) : '';
        $link = isset( $instance['link']) ? esc_html($instance['link']) : '#';		
        $el_class = isset( $instance['el_class']) ? ($instance['el_class']) : 1;		
        $header = isset( $instance['header']) ? ($instance['header']) : 1;		
        $icon = isset( $instance['icon']) ? ($instance['icon']) : 1;		
				
		// user interface
		?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:','medicare' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id( 'banner_image' ); ?>"><?php esc_html_e( 'Banner image:','medicare' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'banner_image' ); ?>" name="<?php echo $this->get_field_name( 'banner_image' ); ?>" type="text" value="<?php echo esc_html($banner_image); ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php esc_html_e( 'Banner image link:','medicare' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" value="<?php echo esc_html($link); ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id( '</p>' ); ?>"><?php esc_html_e( 'Extra class:','medicare' ); ?></label><i> for CSS style</i>
		<input class="widefat" id="<?php echo $this->get_field_id( 'el_class' ); ?>" name="<?php echo $this->get_field_name( 'el_class' ); ?>" type="text"  value="<?php echo esc_attr($el_class); ?>"/></p>
		
		<p><label for="<?php echo $this->get_field_id( 'header'); ?>"><?php esc_html_e( 'Header :','medicare' ); ?></label><i> Line break by "/"</i>
			<input  class="widefat" id="<?php echo $this->get_field_id( 'header'); ?>" name="<?php echo $this->get_field_name('header'); ?>" type="text" value="<?php echo esc_attr($header);?>"/></p>
		<p><label for="<?php echo $this->get_field_id( 'icon'); ?>"><?php esc_html_e( 'Icon:','medicare' ); ?></label>
			<input  class="widefat" id="<?php echo $this->get_field_id( 'icon'); ?>" name="<?php echo $this->get_field_name('icon'); ?>" type="text" value="<?php echo esc_attr($icon);?>"/></p>
		
		
		
		<?php 
		//End form
	}
	/**
	 * save widget form
	 */

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] 		= strip_tags($new_instance['title']);
		$instance['link'] 		= esc_html($new_instance['link']);
		$instance['el_class'] 		= strip_tags($new_instance['el_class']);
		$instance['banner_image'] 	= $new_instance['banner_image'];
		$instance['header'] 	= $new_instance['header'];
		$instance['icon'] 	= $new_instance['icon'];
		return $instance;
	}
	function widget($args, $instance) {
		if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;
		ob_start();
        extract($args);
		$title = apply_filters( 'widget_title', $instance['title'] );
		$number = apply_filters( 'widget_number', $instance['number'] );
		$link = apply_filters( 'widget_link', $instance['link'] );
		$banner_image = apply_filters( 'widget_banner_image', $instance['banner_image'] );
		$el_class = apply_filters( 'widget_el_class', $instance['el_class'] );
		$header = apply_filters( 'widget_header', $instance['header'] );
		$icon = apply_filters( 'widget_icon', $instance['icon'] );
		if($icon){
			$arr_icon=explode(' ',$icon);
			$icon = implode(' ',array(
				'fa',
				end($arr_icon)
				)
			);
		}
		//Start widget
		echo $before_widget; //<div
		if($el_class){echo '<div class = "'.esc_attr($el_class).'">';}
		if($title) echo $before_title.$title.$after_title;
		?>
		<div class = "banner-img">
			<a href="<?php echo esc_url($link);?>" >
			<?php if( ! empty( $banner_image) ){ ?>
				<img class="img-responsive" src="<?php echo esc_url( $banner_image );?>" alt="<?php echo $this->id.'banner-image';?>">
			<?php } ?>
			</a>
		</div>
		<!-- Text -->
		<?php  
		if($header){?>
			<div class="tb-banner-header">
				<a href="<?php  echo esc_url($link); ?>"><?php 
					$arr_ex=explode("/",esc_attr($header));
					$index=1;
					foreach($arr_ex as $str_ex){
						echo '<p class = "header header'.$index++.'">'.$str_ex.'</p>';
					}?>
				</a>
				<?php  if($icon){?>
						<a href="<?php  echo esc_url($link); ?>" class="tb-banner-icon">
							<i class="<?php echo esc_attr($icon); ?>"></i>
						</a>
				<?php } ?>
			</div>
		<?php }
		// End Widget content
		if($el_class){echo '</div>';}
		echo $after_widget;
		// Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();
        $cache[$args['widget_id']] = ob_get_flush();
	}
}

function register_WP_Widget_banner_custom () {
	register_widget('WP_Widget_banner_custom');
}
add_action('widgets_init', 'register_WP_Widget_banner_custom');