<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Layered Navigation Widget
 *
 * @author   WooThemes
 * @category Widgets
 * @package  WooCommerce/Widgets
 * @version  2.3.0
 * @extends  WC_Widget
 */
class Medicare_WC_Widget_Banner extends WC_Widget {

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->widget_cssclass    = 'woocommerce widget_banner widget_banner';
		$this->widget_description = esc_html__( 'Shows a custom banner', 'woocommerce' );
		$this->widget_id          = 'medicare_woocommerce_banner';
		$this->widget_name        = esc_html__( '@Medicare WooCommerce Banner', 'woocommerce' );
		
		$this->settings = array(
			'title' => array(
				'type'  => 'text',
				'std'   => esc_html__( '', 'woocommerce' ),
				'label' => esc_html__( 'Title', 'woocommerce' )
			),
			'heading' => array(
				'type'  => 'text',
				'std'   => esc_html__( 'SAVE', 'woocommerce' ),
				'label' => esc_html__( 'Heading banner', 'woocommerce' )
			),
			'sub_head' => array(
				'type'  => 'text',
				'std'   => esc_html__( 'MEN’S COLLECTION, MID SEASON SALE', 'woocommerce' ),
				'label' => esc_html__( 'Subheading', 'woocommerce' )
			),
			'img_src' => array(
				'type'    => 'text',
				'std'     => '',
				'label'   => esc_html__( 'Image source', 'woocommerce' )
			),
			'link' => array(
				'type'  => 'text',
				'std'   => '',
				'label' => esc_html__( 'Link', 'woocommerce' )
			),
			'el_class' => array(
				'type'  => 'text',
				'std'   => '',
				'label' => esc_html__( 'Extra class', 'woocommerce' )
			)
		);


		parent::__construct();
	}
	/**
	 * widget function.
	 *
	 * @see WP_Widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		ob_start();
		$this->widget_start( $args, $instance );
		$heading = esc_attr( $instance['heading'] );
		$sub_head = jws_theme_get_sep_title( $instance['sub_head'] );
		$el_class= ! empty( $instance['el_class'] ) ? esc_attr( $instance['el_class'] ) : '';
		$link = empty( $instance['link'] ) ? '#' : esc_url( $instance['link'] );
		?>
			<div class="tb-woo-banner <?php echo esc_attr($el_class);?>">
				<a href="<?php echo esc_url($link);?>">
				<?php if( ! empty( $instance['img_src'] ) ){ ?>
					<img class="img-responsive" src="<?php echo esc_url( $instance['img_src'] );?>" alt="<?php echo esc_attr($sub_head[0]);?>">
				<?php } ?>
				</a>
				<div class="hgroup">
				<?php if( ! empty( $heading ) ){ ?>
					<h2 class="font-medicare-2"><?php echo esc_attr($heading); ?></h2>
				<?php } ?>
				<?php if( ! empty( $sub_head ) ): ?>
					<h3 class="font-medicare-2"><?php echo esc_attr($sub_head[0]);if( isset( $sub_head[1] ) ) echo '<span>'. esc_attr($sub_head[1]) .'</span>'; ?></h3>
				<?php endif; ?>
				</div>
			</div>
		<?php

		$this->widget_end( $args );

		echo ob_get_clean();
	}
}

function register_medicare_banner() {
    register_widget('Medicare_WC_Widget_Banner');
}
add_action('widgets_init', 'register_medicare_banner');
