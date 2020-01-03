<?php
/*
Plugin Name: Our Services Widget
Plugin URI: 
Description: View Special services
Author: Dai Huynh
Version: 1.0
Author URI: http://jwsthemes.com
*/
/**
 * Class Our_Services
 */
 
class Our_Services extends WP_Widget {
	
	/**
	 * New Widget: Name, base ID
	 */
	function __construct() {
		$widget_ops = array(
			'classname' => 'our_services_widget', 
			'description' => esc_html__( "View services",'medicare') //Huynh
		);
		parent::__construct(
			'our_services_widget', //id
			esc_html__('Our Services Widget','medicare'), //name
			$widget_ops
		);
		

	}

	/**
	 * Form option for Widget
	 */
	function form( $instance ) {
		$dafault = array(
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
        $post_num	= esc_attr( $instance['post_num'] );
        $col_num	= esc_attr( $instance['col_num'] );
		$txtdata = array();
		for($i=1; $i<=$post_num;$i++){
			$txt ='header_text'.$i; 
			$$txt= esc_attr( $instance[$txt] );
			$txtdata[$txt] = $$txt;
			$txt ='text_content'.$i;
			$$txt= esc_attr( $instance[$txt] );
			$txtdata[$txt] = $$txt;
		}
		//var_dump($txtdata);
		?>
		<script>
			function post_num_change(val){
				var strhtml='';
				var toID = "<?php echo $this->id?>";
				var name = "<?php echo $this->get_field_name( '' ); ?>"
				var id = "widget-" + toID + "-";
				name = "widget-" + name;
				var data = <?php echo json_encode($txtdata) ?>;
				console.log(data);
				console.log(data);
				for(var i=1; i<=val;i++){
					var txt ='header_text' + i; 
					var out = data[txt]!="undefined" ? data[txt] : "";
					strhtml += '<p><label for= "'+ id + 'text' + i +'">Text '+ i + ': </label>';
					strhtml +=	'<input class="widefat" placeholder="Header text" id="' + id + 'header_text_' + i+ '" name="' + name + '[header_text_' + i + ']" type="text" value="' + out + '"></input>';
					$txt ='text_content'.$i;
					var out = data[txt]!="undefined" ? data[txt] : "";
					strhtml +=	'<textarea rows="2" class="widefat" placeholder="Text" id="' + id + 'text_content' + i + '" name="' + name + '[text_content'+ i+ ']" style="margin-top: 0px; margin-bottom: 0px; width:100%; ">' + out + '</textarea></p>';
				}
				console.log("toID: " + toID);
				document.getElementById(toID).innerHTML = strhtml;
				
			}		
		</script>
		<?php  
		//var_dump(json_encode($txtdata));
		// user interface
		?>
		
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:','medicare' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('post_num' ); ?>"><?php esc_html_e( 'Number of services to show:','medicare' );?></label>
        <input id="<?php echo $this->get_field_id( 'post_num' ); ?>" name="<?php echo $this->get_field_name( 'post_num' ); ?>" type="text" onchange="post_num_change(this.value)" value="<?php echo $post_num; ?>" size="3" /> <i>max = 6 , default all</i> </p>
		<?php  var_dump($post_num);?>
		<p><label for="<?php echo $this->get_field_id('col_num' ); ?>"><?php esc_html_e( 'Column(s) to show:' ,'medicare');?></label>
        <input id="<?php echo $this->get_field_id( 'col_num' ); ?>" name="<?php echo $this->get_field_name( 'col_num' ); ?>" type="text" value="<?php echo $col_num; ?>" size="3" /><i>max = 6 default 1</i> </p>
		
		<p><label for="<?php echo $this->get_field_id( 'header_icon' ); ?>"><?php esc_html_e( 'Header_icon:' ,'medicare'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'header_icon' ); ?>" name="<?php echo $this->get_field_name( 'header_icon' ); ?>" type="text" value="<?php echo $header_icon; ?>" /></p>
		
		<div id ="<?php echo $this->id?>" class ="widget-services-form <?php  $this->id;?>">
			<?php  for($i=1; $i<=$post_num;$i++){?>
				<p><label for="<?php echo $this->get_field_id( 'Text'.$i ); ?>"><?php printf( esc_html__( 'Text %d: ','medicare'),$i); ?></label>
				<input class="widefat" placeholder="Header text" id="<?php echo $this->get_field_id( 'header_text_'.$i ); ?>" name="<?php echo $this->get_field_name('header_text'.$i); ?>" type="text" value="<?php $txt ='header_text'.$i; echo $$txt; ?>" />
				<textarea rows="2" class="widefat" placeholder="Text" id="<?php echo $this->get_field_id( 'text_content'.$i ); ?>" name="<?php echo $this->get_field_name('text_content'.$i); ?>" style="margin-top: 0px; margin-bottom: 0px; width:100%; "><?php $txt ='text_content'.$i; echo $$txt; ?></textarea> </p>
				<?php  
			}?>
		</div> 
		
		
		
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
		$instance['post_num'] 	= (int) $new_instance['post_num']<=6 ? $new_instance['post_num']:6;
		//$instance['col_num'] 	= (int) $new_instance['col_num']!='' ? $new_instance['col_num'] :1;
		$instance['col_num'] 	= (int) $new_instance['col_num'] <=6 ? $new_instance['col_num'] :$instance['post_num'];
		for($i=1; $i<=6;$i++){
			$instance['header_text'.$i]= strip_tags($new_instance['header_text'.$i]);
			$instance['text_content'.$i]= strip_tags($new_instance['text_content'.$i]);
		}
?>
<pre>
<div class="var-dump-10" style="font-size:14px; color:yellow; background:blue;"><?php  
var_dump($new_instance); ?></div>
</pre>
<?php
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
		if($post_num =='')$postnum = 4;
		$col_num = apply_filters( 'widget_col_num', $instance['col_num'] );
		if($col_num=='') $col_num = $post_num>6? 6: $post_num;
		for($i=1; $i<=6;$i++){
			$txt ='header_text'.$i; 
			$$txt = apply_filters( 'widget_'.$txt, $instance[$txt] );
			$txt ='text_content'.$i;
			$$txt = apply_filters( 'widget_'.$txt, $instance[$txt] );
		}
		$before_header_text = '<h3 class ="header_text">';
		$after_header_text = '</h3> ';
		if($icon){
			$icon = implode(' ',array(
				'fa',
				end(explode(' ',$icon))
				)
			);
		}
		var_dump($col_num);
		$class_col = 'col-xs-12 col-sm-12 col-md-'.(12/$col_num).' col-lg-'.(12/$col_num);
		//Start widget
		echo $before_widget; //<div
		if($title) echo $before_title.$title.$after_title;
		echo '<div class = "our_special_widget">';
		//$i=1;
		for($i=1;$i<=$post_num;$i++){
			?><div class = "<?php echo $class_col;?>  our_special_widget_col_<?php  echo $i;?>"><?php  
				$txt ='header_text'.$i;
				if($$txt){
					echo $before_header_text;		 
					if( ! empty( $icon ) ) echo '<span class="wg-icon"><i class="'.esc_attr($icon).'"></i></span>';
					echo '<span class="wg-title">'. esc_html($$txt) .'</span>';
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
		// Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();
        $cache[$args['widget_id']] = ob_get_flush();
	}
	/***********
	var a;
	
	function g{}
	*/
}

function register_Our_Services_widget () {
	register_widget('Our_Services');
}
add_action('widgets_init', 'register_Our_Services_widget');