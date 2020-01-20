<?php
/*
Plugin Name: Text with Awesome Icon
Plugin URI: 
Description: Text with Awesome Icon
Author: Dai Huynh
Version: 1.0
Author URI: http://jwsthemes.com
*/
/**
 * Class Text_Awesome_Icon
 */
class Text_Awesome_Icon extends WP_Widget {

	/**
	 * New Widget: Name, base ID
	 */
	function __construct() {
		$widget_ops = array(
			'classname' => 'text_awesome_icon', 
			'description' => esc_html__( "Text with Awesome Icon",'medicare') 
		);
		parent::__construct(
			'text_awesome_icon', //id
			esc_html__('Text with Awesome Icon','medicare'), //name
			$widget_ops
		);

	}

	/**
	 * Form option for Widget
	 */
	function form( $instance ) {
		$dafault = array(
			'title'		=> '',
			'icon'	=> 'fa fa-font',
			'txt'	=> 'Enter Text'
		);
		$instance = wp_parse_args( (array) $instance, $default);
		$title = isset( $instance['title']) ? ($instance['title']) : 'Text title';
		$icon = isset( $instance['icon'] ) ? ($instance['icon']) : 'fa-font';
		$txt    = isset( $instance['txt'] ) ? ( $instance['txt'] ) : 'Enter Text';
		
		// title
		?>
		<p><label ><?php esc_html__('Title:','medicare');?></label> 
		<input class="widefat" id=" <?php echo $this->get_field_id( 'title' ) ?>" name=" <?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>
		
		<?php
		//icon
		?>
		<p><label ><?php esc_html__('Icon :','medicare');?></label>	<i><?php esc_html__('( Ex: fa fa-font )','medicare');?> </i>	
		<input class="widefat" id=" <?php echo $this->get_field_id( 'icon' ) ?>" name=" <?php echo $this->get_field_name( 'icon' ); ?>" type="text" value="<?php echo $icon; ?>" /></p>
		<?php 
		//Select position of icon;
		//Text
		?>
		<p><label><?php esc_html_e( 'Enter you text','medicare' ); ?></label></p>
        <textarea rows="6" id="<?php echo $this->get_field_id( 'txt' ); ?>" name="<?php echo $this->get_field_name( 'txt' ); ?>" style="margin-top: 0px; margin-bottom: 0px; width:100%; " ><?php echo $txt?></textarea>
		<?php 
	}
	
	
	/**
	 * save widget form
	 */

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['icon'] = $new_instance['icon'];
		$instance['txt'] = $new_instance['txt'];
		return $instance;
	}

	/**
	 * Show widget
	 */

	function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;
		ob_start();
        extract($args);
		//$title = apply_filters( 'widget_title', $instance['title'] );
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Categories','medicare' );
        $icon = apply_filters( 'widget_icon', $instance['icon']);
		$txt = (!empty($instance['txt'] ) ) ? $instance['txt'] : esc_html__( 'Your Text','medicare' );
		//for the case users input fa-font or fa fa-font
		if($icon){
			$icon = implode(' ',array(
				'fa',
				end(explode(' ',$icon))
				)
			);
		}
		echo $before_widget;
		//Widget title
		if($title){
			echo $before_title;		 
			if( ! empty( $icon ) ) echo '<span class="wg-icon"><i class="'.esc_attr($icon).'"></i></span>';
			echo '<span class="wg-title">'. esc_html($title) .'</span>';
			echo $after_title;
		}
		// Widget content
		if( ! empty( $txt ) ) echo '<div class="wg-content">'.$txt.'</div>';
		?>
		<?php 
		// End Widget content
		echo $after_widget;
		// Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();
        $cache[$args['widget_id']] = ob_get_flush();

	}

}
function register_text_awesome_icon() {
	register_widget('Text_Awesome_Icon');
}
add_action('widgets_init', 'register_text_awesome_icon');