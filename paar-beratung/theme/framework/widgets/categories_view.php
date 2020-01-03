<?php/*Plugin Name: Categoties custom post typePlugin URI: Description: View categories for custom post typeAuthor: Dai HuynhVersion: 1.0Author URI: http://jwsthemes.com*//** * Class Custom_Categories_Widget */class Custom_Categories_Widget extends WP_Widget {	/**	 * New Widget: Name, base ID	 */	function __construct() {		$widget_ops = array(			'classname' => 'custom_categories_widget', 			'description' => esc_html__( "View categorgies by custom post-type", 'medicare') 		);		parent::__construct(			'custom_categories', //id			esc_html__('Custom Categories view', 'medicare'), //name			$widget_ops		);	}	/**	 * Form option for Widget	 */	function form( $instance ) {		$default = array(			'title'		=> __('Category', 'medicare'),			'number'	=> 5,			'taxonomy'	=> __('category', 'medicare')		);		$instance = wp_parse_args( (array) $instance, $default);		$title = esc_attr( $instance['title'] );		$taxonomy = isset( $instance['taxonomy'] ) ? ($instance['taxonomy']) : 'category';		$number    = isset( $instance['number'] ) ? /*absint*/(int)( $instance['number'] ) : 5;		// title		?>		<p><label >Title:</label>		<input class="widefat" id=" <?php echo $this->get_field_id( 'title' ) ?>" name=" <?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>		<?php		//Taxonomy		$taxonomies = get_taxonomies( '', 'objects' );		$index=1;		if ( $taxonomies ) {			printf(				'<p><label for="%1$s">%2$s</label>' .				'<select class="widefat" id="%1$s" name="%3$s">',				$this->get_field_id( 'taxonomy' ),				esc_html__( 'Taxonomy:', 'medicare' ),				$this->get_field_name( 'taxonomy' )			);			foreach ( $taxonomies as $taxobjects => $value ) {				$is_sel = $taxonomy == $taxobjects ? 'selected ':'';				if ( ! $value->hierarchical ) {					continue;				}				if ( 'nav_menu' === $taxobjects || 'link_category' === $taxobjects || 'post_format' === $taxobjects ) {					continue;				}				?>				<option 					<?php echo $is_sel; ?>									value= <?php esc_attr( $taxobjects );					echo esc_attr( $taxobjects );?>				>					<?php echo $value->label.' ' . $taxobjects;?>				</option>				<?php				}			echo '</select></p>';		}		//Number of category		?>		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php esc_html_e( 'Number of categories to show:', 'medicare' ); ?></label>        <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" />		<i> -1 to show all</i></p>		<?php	}	/**	 * save widget form	 */	function update( $new_instance, $old_instance ) {		$instance = $old_instance;		$instance['title'] = strip_tags($new_instance['title']);		$instance['number'] = (int) $new_instance['number'];		$instance['taxonomy'] = $new_instance['taxonomy'];		return $instance;	}	/**	 * Show widget	 */	function widget( $args, $instance ) {		if ( ! isset( $args['widget_id'] ) )            $args['widget_id'] = $this->id;		ob_start();        extract($args);		//$title = apply_filters( 'widget_title', $instance['title'] );		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Categories','medicare' );        //$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 10;		//$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 10;		$number = apply_filters( 'widget_number', $instance['number']);		$taxonomy = (!empty($instance['taxonomy'] ) ) ? $instance['taxonomy'] : esc_html__( 'category','medicare' );		$categories = get_terms( 			array(				'orderby' => 'date',				'order'   => 'ASC',				'taxonomy' => $taxonomy,			)		);		echo $before_widget;		//Widget title		if($title) echo $before_title.$title.$after_title;		 		//Widget content		?>		<ul>				<?php 				$i=0;				foreach( $categories as $category ) {					if($i==$number) break;					$category_link = sprintf( 						'<a href="%1$s" alt="%2$s">%3$s</a>',						esc_url( get_category_link( $category->term_id ) ),						esc_attr( sprintf( esc_html__( 'View all posts in %s', 'medicare' ), $category->name ) ),						esc_html( $category->name )					);					echo '<li><p>'. $category_link. '</p></li>';					$i++;				}?>			</ul>		<?php 		// End Widget content		echo $after_widget;		// Reset the global $the_post as this query will have stomped on it        wp_reset_postdata();        $cache[$args['widget_id']] = ob_get_flush();	}}function register_custom_categories_widget() {	register_widget('Custom_Categories_Widget');}add_action('widgets_init', 'register_custom_categories_widget');