<?php
/* function 
*public function text($id, $label, $default = '', $desc = '',$placeholder = '')
*public function hidden($id)
*public function select($id, $label, $options, $default, $desc = '')
*public function multiple($id, $label, $options, $desc = '')
*public function textarea($id, $label, $desc = '')
*public function upload($id, $label, $desc = '')
*/

	

class jws_theme_FrameworkMetaboxes {
	public function __construct(){
		global $smof_data;
		$this->data = $smof_data;
		add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
		add_action('save_post', array($this, 'save_meta_boxes'));
		add_action('admin_enqueue_scripts', array($this, 'admin_script_loader'));
	}
	function admin_script_loader() {
		global $pagenow;
		if (is_admin() && ($pagenow=='post-new.php' || $pagenow=='post.php')) {
			wp_enqueue_script('jquery-ui-core');
			wp_enqueue_script('jquery-ui-sortable');
			wp_enqueue_style('tb-metabox', JWS_THEME_URI_PATH_FR.'/meta-boxes/assets/css/metabox.css');
			wp_enqueue_style('colorpicker', JWS_THEME_URI_PATH_FR.'/meta-boxes/assets/css/colorpicker.css');

			wp_enqueue_script('jcolpick', JWS_THEME_URI_PATH_FR.'/meta-boxes/assets/js/colpick.js');
			wp_enqueue_script('tb-upload', JWS_THEME_URI_PATH_FR.'/meta-boxes/assets/js/upload.js');
			//huynh
			wp_enqueue_script('tb-upload', JWS_THEME_URI_PATH_FR.'/meta-boxes/assets/js/upload_brochure.js');
			wp_enqueue_script('jquery-easytabs', JWS_THEME_URI_PATH_FR.'/meta-boxes/assets/js/jquery.easytabs.min.js');
			wp_enqueue_script('blog-tabs', JWS_THEME_URI_PATH_FR.'/meta-boxes/assets/js/blog.tab.js');
			wp_enqueue_script('meta-box', JWS_THEME_URI_PATH_FR.'/meta-boxes/assets/js/meta.box.js');
			wp_enqueue_script('media-upload');
			wp_enqueue_style('thickbox');
		}
	}
	public function add_meta_boxes()
	{
		$post_types = get_post_types( array( 'public' => true ) );
		$this->add_meta_box('post_options', esc_html__('Page Options','medicare'), 'page');
		$this->add_meta_box('product_options', esc_html__('Product Options','medicare'), 'product');
		$this->add_meta_box('post_video', esc_html__('Video Settings','medicare'), 'post');
		$this->add_meta_box('post_audio', esc_html__('Audio Settings','medicare'), 'post');
		$this->add_meta_box('post_quote', esc_html__('Quote Settings','medicare'), 'post');
		$this->add_meta_box('post_link', esc_html__('Link Settings','medicare'), 'post');
		$this->add_meta_box('post_testimonial', esc_html__('Testimonial Settings','medicare'), 'testimonial');
		$this->add_meta_box('post_portfolio', esc_html__('Portfolio Settings','medicare'), 'portfolio');
		$this->add_meta_box('post_doctor', esc_html__('Doctor Settings','medicare'), 'doctor');
		$this->add_meta_box('post_services', esc_html__('Services Brochure','medicare'), 'services');
	}
	public function save_meta_boxes($post_id)
	{
		if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
		}
		foreach($_POST as $key => $value) {
			if(strstr($key, 'jws_theme_')) {
				update_post_meta($post_id, $key, $value);
			}
		}
	}
	public function add_meta_box($id, $label, $post_type)
	{
		add_meta_box(
		'jws_theme_' . $id,
		$label,
		array($this, $id),
		$post_type
		);
	}
	public function post_options()
	{
		$data = $this->data;
		include 'blog_options.php';
	}
	public function product_options()
	{
		include 'product_options.php';
	}
	public function post_video()
	{
		include 'post_video.php';
	}
	public function post_audio()
	{
		include 'post_audio.php';
	}
	public function post_quote()
	{
		include 'post_quote.php';
	}
	public function post_link()
	{
		include 'post_link.php';
	}
	public function post_testimonial()
	{
		include 'post_testimonial.php';
	}

	public function post_portfolio()
	{
		include 'post_portfolio.php';
	}
	public function post_doctor(){
		include 'post_doctor.php';
	}
	public function post_services(){
		include 'post_services.php';
	}

	public function text($id, $label, $default = '', $desc = '',$placeholder = '')
	{
		global $post;
		$value = get_post_meta($post->ID, 'jws_theme_' . $id, true);
		if (!$value){
			$value = $default;
		}
		$html = '';
		$html .= '<div id="jws_theme_metabox_field_'.$id.'" class="jws_theme_metabox_field">';
		$html .= '<label for="jws_theme_' . $id . '">';
		$html .= $label;
		$html .= '</label>';
		$html .= '<div class="field">';
		$html .= '<input type="text" id="jws_theme_' . $id . '" name="jws_theme_' . $id . '" value="' . $value . '" placeholder="'.$placeholder.'"/>';
		if($desc) {
			$html .= '<p>' . $desc . '</p>';
		}
		$html .= '</div>';
		$html .= '</div>';

		echo $html;
	}
	public function hidden($id){
		global $post;
		$html = '<input type="hidden" id="jws_theme_' . $id . '" name="jws_theme_' . $id . '" value="' . get_post_meta($post->ID, 'jws_theme_' . $id, true) . '" />';
		echo $html;
	}
	public function select($id, $label, $options, $default, $desc = '')
	{
		global $post;
		$html = null;
		$html .= '<div id="jws_theme_metabox_field_'.$id.'" class="jws_theme_metabox_field">';
		$html .= '<label for="jws_theme_' . $id . '">';
		$html .= $label;
		$html .= '</label>';
		$html .= '<div class="field">';
		$html .= '<select id="jws_theme_' . $id . '" name="jws_theme_' . $id . '">';                
		$value = get_post_meta($post->ID, 'jws_theme_' . $id, true);
		$default = $value == '' ? $default: $value;
                
		foreach($options as $key => $option) {
                    $selected = $default === (string)$key?'selected="selected"':null;
                    $html .= '<option ' . $selected . 'value="' . $key . '">' . $option . '</option>';
		}
		$html .= '</select>';
		if($desc) {
			$html .= '<p>' . $desc . '</p>';
		}
		$html .= '</div>';
		$html .= '</div>';

		echo $html;
	}

	public function multiple($id, $label, $options, $desc = '')
	{
		global $post;

		$html = '';
		$html .= '<div id="jws_theme_metabox_field_'.$id.'" class="jws_theme_metabox_field">';
		$html .= '<label for="jws_theme_' . $id . '">';
		$html .= $label;
		$html .= '</label>';
		$html .= '<div class="field">';
		$html .= '<select multiple="multiple" id="jws_theme_' . $id . '" name="jws_theme_' . $id . '[]">';
		foreach($options as $key => $option) {
			if(is_array(get_post_meta($post->ID, 'jws_theme_' . $id, true)) && in_array($key, get_post_meta($post->ID, 'jws_theme_' . $id, true))) {
				$selected = 'selected="selected"';
			} else {
				$selected = '';
			}

			$html .= '<option ' . $selected . 'value="' . $key . '">' . $option . '</option>';
		}
		$html .= '</select>';
		if($desc) {
			$html .= '<p>' . $desc . '</p>';
		}
		$html .= '</div>';
		$html .= '</div>';

		echo $html;
	}

	public function textarea($id, $label, $desc = '')
	{
		global $post;

		$html = '';
		$html = '';
		$html .= '<div id="jws_theme_metabox_field_'.$id.'" class="jws_theme_metabox_field">';
		$html .= '<label for="jws_theme_' . $id . '">';
		$html .= $label;
		$html .= '</label>';
		$html .= '<div class="field">';
		$html .= '<textarea class="widefat" style="max-width:480px" cols="30" rows="5" id="jws_theme_' . $id . '" name="jws_theme_' . $id . '">' . get_post_meta($post->ID, 'jws_theme_' . $id, true) . '</textarea>';
		if($desc) {
			$html .= '<p>' . $desc . '</p>';
		}
		$html .= '</div>';
		$html .= '</div>';

		echo $html;
	}

	public function upload($id, $label, $desc = '')
	{
		global $post;
		$html = '';
		$html = '';
		$html .= '<div id="jws_theme_metabox_field_'.$id.'" class="jws_theme_metabox_field">';
		$html .= '<label for="jws_theme_' . $id . '">';
		$html .= $label;
		$html .= '</label>';
		$html .= '<div class="field">';
		$html .= '<input name="jws_theme_' . $id . '" class="upload_field" id="jws_theme_' . $id . '" type="text" value="' . get_post_meta($post->ID, 'jws_theme_' . $id, true) . '" />';
		$html .= '<input class="jws_theme_upload_button button button-primary button-large" type="button" value="Browse" />';
		if($desc) {
			$html .= '<p>' . $desc . '</p>';
		}
		$html .= '</div>';
		$html .= '</div>';

		echo $html;
	}
	//Huynh
	public function upload_brochure($id, $label, $desc = '')
	{
		global $post;
		$html = '';
		$html = '';
		$html .= '<div id="jws_theme_metabox_field_'.$id.'" class="jws_theme_metabox_field">';
		$html .= '<label for="jws_theme_' . $id . '">';
		$html .= $label;
		$html .= '</label>';
		$html .= '<div class="field">';
		$html .= '<input name="jws_theme_' . $id . '" class="upload_field" id="jws_theme_' . $id . '" type="text" value="' . get_post_meta($post->ID, 'jws_theme_' . $id, true) . '" />';
		$html .= '<input class="jws_theme_upload_brochure_button button button-primary button-large" type="button" value="Browse" />';
		if($desc) {
			$html .= '<p>' . $desc . '</p>';
		}
		$html .= '</div>';
		$html .= '</div>';			
		echo $html;
	}
}
$metaboxes = new jws_theme_FrameworkMetaboxes();