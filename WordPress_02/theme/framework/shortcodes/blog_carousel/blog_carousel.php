<?php
function jws_theme_blog_carousel_func($atts, $content = null) {
    extract(shortcode_atts(array(
        'el_class' => '',
		'category' => '',
		'posts_per_page' => -1,
		'orderby' => 'none',
        'order' => 'none',
		'show_thumb' => 1,
		'thumb_size' => 'medicare-blog-grid',
		'show_title' => 1,
		'show_info' => 1,
        'show_excerpt' => 1,
        'excerpt_lenght' => 15,
        'excerpt_more' => '',
        'readmore_text' => '',
        'readmore_block' => ''
    ), $atts));
			
    $class = array();
    $class[] = 'tb-blog-carousel ct-blog-small-grid';
    $class[] = $el_class;
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    
    $args = array(
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'orderby' => $orderby,
        'order' => $order,
        'post_type' => 'post',
        'post_status' => 'publish');
    if (isset($category) && $category != '') {
        $cats = explode(',', $category);
        $category = array();
        foreach ((array) $cats as $cat) :
        $category[] = trim($cat);
        endforeach;
        $args['tax_query'] = array(
                            array(
                                'taxonomy' => 'category',
                                'field' => 'id',
                                'terms' => $category
                            )
                        );
    }
    $wp_query = new WP_Query($args);
	
    ob_start();
	
	if ( $wp_query->have_posts() ) {
    ?>
	<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
		<div class="owl-carousel">
			<?php
				while ( $wp_query->have_posts() ) { $wp_query->the_post();
					?>
					<article <?php post_class(); ?>>
						<div class="tb-post-item">
							<?php if($show_thumb) { ?>
								<a href="<?php the_permalink(); ?>">
									<div class="tb-thumb tb-image">
										<?php the_post_thumbnail($thumb_size); ?>
									</div>
								</a>
							<?php } ?>
							<div class="tb-content">
								<?php if($show_info) { ?>
									<div class="tb-info">
										<?php echo jws_theme_info_bar_render(); ?>
									</div>
								<?php } ?>
								<?php if($show_title) { ?>
									<a href="<?php the_permalink(); ?>"><h4 class="tb-title"><?php the_title(); ?></h4></a>
								<?php } ?>
								<?php if($show_excerpt) { ?>
									<div class="tb-excerpt">
										<?php echo jws_theme_custom_excerpt(intval($excerpt_lenght), $excerpt_more); ?>
									</div>
								<?php } ?>
								<?php if($readmore_text) { ?>
									<a class="tb-readmore <?php if( $readmore_block ) echo ' block';?>" href="<?php the_permalink(); ?>"><?php echo esc_attr( $readmore_text ); ?></a>
								<?php } ?>
							</div>
						</div>
					</article>
					<?php
				} wp_reset_postdata();
			?>
		</div>
	</div>
    <?php
	}
    return ob_get_clean();
}

if(function_exists('insert_shortcode')) { insert_shortcode('blog_carousel', 'jws_theme_blog_carousel_func'); }
