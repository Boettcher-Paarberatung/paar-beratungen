<?php
/// note "///"
function jws_theme_portfolio_grid_func($atts, $content = null) {
    $atts = shortcode_atts(array(
		'post_type' => 'portfolio',
        'portfolio_category' => '',
		'gallery_category' => '',
		'posts_per_page' => -1,
		'show_filter' => 1,
		'show_pagination' => 0,
		'columns' => 4,
		'no_pading' => '',
		'tpl' => 'tpl',
		'crop_image' => '',
		'width_image' => '370',
		'height_image' => '330',
		'orderby' => 'none',
        'order' => 'none',
        'el_class' => '',
        'show_title' => 1,
        'show_category' => 1,
        'show_readmore' => 0,
        'show_viewmore' => 1
    ), $atts);
    extract( $atts );
    $class = array();
	$tax = $post_type.'_category';
	$category = $$tax;
    $class[] = 'tb-portfolio-grid-wrapper'; ///
    $class[] = $el_class;
    $class[] = $tpl;
    if( $no_pading ){
    	$class[] = 'no-padding';
    }
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
                                    'taxonomy' => $tax,
                                    'field' => 'id',
                                    'terms' => $category
                                )
                        );
    }
    /*foreach( $args as $k=>$v ){
    	if( isset( $atts[$k] ) ) unset( $atts[$k] );
    }*/
    $p = new WP_Query($args);
	wp_enqueue_script('jquery.mixitup.min', JWS_THEME_URI_PATH . '/assets/js/jquery.mixitup.min.js',array(),"2.1.5");
    ob_start();
	if ( $p->have_posts() ) {
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
				$class_columns[] = 'col-xs-12 col-sm-6 col-md-3 col-lg-3';
				break;
			default:
				$class_columns[] = 'col-xs-12 col-sm-6 col-md-3 col-lg-3';
				break;
		}
	?>
		<script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
		<div id="tb-list-porfolio" class="<?php echo esc_attr(implode(' ', $class));/// ?>">
			<?php if( $show_filter ) { ?>
				<ul class="controls-filter list-unstyled list-inline text-center">
					<li class="filter active" data-filter="all"><a href="javascript:void(0);"><?php esc_html_e('View All ', 'medicare');?></a></li>
					<?php
						$terms = get_terms($tax);
						if ( !empty( $terms ) && !is_wp_error( $terms ) ){
							foreach ( $terms as $term ) {
							?>
								<li class="filter" data-filter=".<?php echo esc_attr($term->slug); ?>"><a href="javascript:void(0);"><?php echo esc_html($term->name); ?></a></li>
							<?php
							}
						}
					?>
				</ul>
			<?php } ?>
			<div id="porfolio-container" class="row tb-grid-content tb-portfolio<?php if( !$show_filter ) echo ' no-filter';?>">
			<div class="grid-sizer"></div>
				<?php $index = 0;
				while ( $p->have_posts() ) { $p->the_post();
					if( $tpl == 'tpl2' ){
						include( locate_template( 'framework/templates/portfolio/portfolio-lightbox.php' ) );
					}elseif($tpl=='tpl3'){
						include(locate_template( 'framework/templates/portfolio/portfolio_masonry.php' ) );
					}else{
						include( locate_template( 'framework/templates/portfolio/porfolio.php' ) );
					}
				} ?>
				
			</div>
			<div class="clearfix"></div> 
			<div class="tb-porfolio-footer">
				<?php if(  $show_viewmore && $p->max_num_pages > 1 && $paged < $p->max_num_pages  ) { ?>
					<div class="tb-viewmore text-center <?php if($show_pagination) echo 'has_pagination'; ?>">
						<div class="tb-btn-viewmore"><a id="tb-btn-viewmore" data-options='<?php echo esc_attr( json_encode( $atts ) );?>' data-args='<?php echo esc_attr( json_encode( $args ) );?>' href="#page/<?php echo intval( $paged + 1 );?>"><span>Load more</span></a></div>
					</div>
				<?php } ?>
				<?php if($show_pagination){ ?>
					<nav class="pagination tb-pagination" role="navigation">
						<?php
							$big = 999999999; // need an unlikely integer
							echo paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => '?paged=%#%',
								'current' => max( 1, get_query_var('paged') ),
								'total' => $p->max_num_pages,
								'prev_text' => wp_kses( __( '<i class="fa fa-angle-left"></i>', 'medicare' ),array('i')),
								'next_text' => wp_kses( __( '<i class="fa fa-angle-right"></i>', 'medicare' ),array('i')),
							) );
						?>
					</nav>
				<?php } wp_reset_postdata(); ?>
			</div>
		</div>
	<?php
	}
    return ob_get_clean();
}
if(function_exists('insert_shortcode')) { insert_shortcode('portfolio_grid', 'jws_theme_portfolio_grid_func'); }