<?php function jws_theme_gallery_func($atts, $content = null) {
    $atts = shortcode_atts(array(
		'category' => '',
		'tpl' => 'tpl1',
		'posts_per_page' => -1,
		'crop_image' => 1,
		'width_image' => 370,
		'height_image' => 330,
		'show_popup' => '',
		'show_title' =>'',
		'show_author' => '',
		'show_pagination' => 'ajax',
		'pos_pagination' =>'',
		'columns' => '',
		'orderby' => '',
		'order' =>'',
		'el_class' => '',
		'load_more' =>'',
	),$atts);
	extract( $atts );	
	$class = array();	
	$class[] = $tpl;
	$class[] = $el_class;
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
	$args = array(
		'posts_per_page' => $posts_per_page,
		'paged' => $paged,
		'orderby' => $orderby,
		'order' => $order,
		'post_type' => 'gallery',
		'post_status' => 'publish');
		
	if (isset($category) && $category != '') {
		$cats = explode(',', $category);
		$category = array();
		foreach ((array) $cats as $cat) :
		$category[] = trim($cat);
		endforeach;
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'gallery_category',
				'field' => 'id',
				'terms' => $category
			)
		);
	}
	$wp_query = new WP_Query($args);
	ob_start();
	if ( $wp_query->have_posts() ) {
		$class_columns = array();
		if($tpl =="tpl1"){
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
					$class_columns[] = 'col-xs-12 col-sm-6 col-md-4 col-lg-4';
					break;
			}
		}
		?>
		<div class = "tb-grid-gallery-view">
			<div class= "tb-gallery-filter">
				<ul class="controls-filter list-unstyled list-inline text-center">
					<li class="filter active" data-filter="all"><a href="javascript:void(0);"><?php esc_html_e('All', 'medicare');?></a></li>
					<?php  
					$terms = get_terms('gallery_category');
						if ( !empty( $terms ) && !is_wp_error( $terms ) ){
							foreach ( $terms as $term ) {
							?>
								<li class="filter" data-filter=".<?php echo esc_attr($term->slug); ?>"><a href="javascript:void(0);"><?php echo esc_html($term->name); ?></a></li>
							<?php
							}
						}
						?>
				</ul
			</div>
			<div <?php  if($tpl == 'tpl1') echo 'id="gallery-container" class="tb-grid-gallery"';?> class ="<?php  echo esc_attr(implode(' ', $class)); ?>">
				<ul>
					<?php while ( $wp_query->have_posts() ) {
						$wp_query->the_post();
						include "tpl/{$tpl}.php";
					}
				?>
				</ul>
			</div>
			<div class="tb-gallery-footer">
				 <?php $paged = is_front_page() ? get_query_var('page') : get_query_var('paged'); $paged = max(1, $paged); if($show_pagination == 'number'){ ?>
					<nav class="pagination <?php echo esc_attr($pos_pagination); ?>" role="navigation">
						<?php
							$big = 999999999; // need an unlikely integer
							
							echo paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => '?paged=%#%',
								'current' => max( 1, $paged ),
								'total' => $wp_query->max_num_pages,
								'type'               => 'plain',
								'prev_text' => esc_html__( ' Prev', 'medicare' ),
								'next_text' => esc_html__( 'Next', 'medicare' ),
							) );
						?>
					</nav>
				<?php } ?>
				<?php if($show_pagination == 'ajax'){ 
					$args['posts_per_page'] = '-1';
					$wp_query_pagination = new WP_Query($args);
					$all_post = count($wp_query_pagination->posts);
					$max_page_num =  round(($all_post / $posts_per_page) + 0.4);
				
					if($all_post > $posts_per_page){
						wp_enqueue_script('gallery.page.ajax', JWS_THEME_URI_PATH_FR . '/shortcodes/gallery/ajax-page.js');
						wp_localize_script( 'gallery.page.ajax', 'variable_js', array(
							'ajax_url' => admin_url( 'admin-ajax.php' )
						));
						//$atts['paged'] = $paged;
						$data_params = $atts;
						?>
						<nav class="pagination blog <?php echo esc_attr($pos_pagination); ?> <?php echo esc_attr($show_pagination); ?>" role="navigation">
							<a class="btn-pre-v2" href="#" data-params="<?php echo esc_attr(json_encode($data_params)); ?>" data-max-page="<?php echo esc_attr($max_page_num); ?>" data-next-page="<?php echo esc_attr('2'); ?>">LOAD MORE</a>
						</nav>
						<?php
						} 
					}	
				wp_reset_postdata(); ?>
			</div>
		</div>
		<?php
		}
	return ob_get_clean();
}
if(function_exists('insert_shortcode')) { insert_shortcode('gallerys', 'jws_theme_gallery_func'); }
add_action( 'wp_ajax_nopriv_render_gallery_grid', 'render_gallery_grid' );
add_action( 'wp_ajax_render_gallery_grid', 'render_gallery_grid' );
function render_gallery_grid(){
	extract($_POST['params']);
	$class = array();
    $class[] = $el_class;	
	$class[] = $tpl;
	
	$paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;
	
    $args = array(
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'orderby' => $orderby,
        'order' => $order,
        'post_type' => 'gallery',
        'post_status' => 'publish');
    if (isset($category) && $category != '') {
        $cats = explode(',', $category);
        $category = array();
        foreach ((array) $cats as $cat) :
        $category[] = trim($cat);
        endforeach;
        $args['tax_query'] = array(
                                array(
                                    'taxonomy' => 'gallery_category',
                                    'field' => 'id',
                                    'terms' => $category
                                )
                        );
    }
    $wp_query = new WP_Query($args);
    ob_start();
	if ( $wp_query->have_posts() ) {
		$class_columns = array();
		if($tpl !="tpl1"){
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
		} ?>
		<div <?php if($tpl =='tpl1') echo 'id="tb-list-gallery" class="tb-list-gallery"'; else echo 'class="jws-list-gallery row"';?> class="<?php echo esc_attr(implode(' ', $class)); ?>">
			<ul>
			<?php while ( $wp_query->have_posts() ) {
					$wp_query->the_post();
					include "tpl/{$tpl}.php";
				}
			?>
			</ul>
		</div>
	<?php
	wp_reset_postdata();
    $blog_items = ob_get_clean();
    echo jws_theme_filtercontent($blog_items); exit;
    }
}