<?php
$show_readmore  = isset( $show_readmore ) ? $show_readmore  : 0;
$show_title  = isset( $show_title ) ? $show_title  : 1;
$show_category  = isset( $show_category ) ? $show_category  : 1;
$post_type  = isset( $post_type ) ? $post_type  : 'portfolio';

$tax = $post_type.'_category';
$terms = wp_get_post_terms(get_the_ID(), $tax);
if ( !empty( $terms ) && !is_wp_error( $terms ) ){
	$term_list = array();
	foreach ( $terms as $term ) {
		$term_list[] = $term->slug;
	}
}
$j = $index % 6;
$class_index = 'masonry-item item-'.$j;
$class_term_list = esc_attr(implode(' ', $term_list)); //for filter
//setthumb for post[index]
//$lists_thumb = array('medicare_masonry_vertical'=>array(0,4),'medicare_masonry_horizontal'=>array(1,5),'medicare_masonry_normal'=> array(2,3));
$lists_thumb = array('medicare_masonry_vertical'=>array(0,4),'medicare_masonry_horizontal'=>array(1,5),'medicare_masonry_normal'=> array(2,3));

$thumb = 'medicare_masonry_normal';
foreach( $lists_thumb as $k=>$thumbs ){
	if( array_search( $j, $thumbs) !== false ){
		$thumb = $k;
		break;
	}
}
$width = jws_theme_get_image_width( $thumb );
$full = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ),'full' );
if( $full ):
?>
	<div class="mix <?php if( !is_single() ){ echo $class_index.' '.$thumb.' '.$class_term_list; } ?>" data-myorder="<?php echo get_the_ID(); ?>" >
		<div class="tb-content" style ="display: none;">
			<?php
			if($show_title): ?> 
				<h4> <?php the_title(); ?> </h4>
			<?php endif; ?>
			<a href="#" class="tb-open-lighth-box" data-src="<?php if($post_type == 'gallery') {echo esc_url( $full[0]);} else the_permalink();?>">
			</a>
		</div>
		<a href="<?php  the_permalink(); ?>"> <?php the_post_thumbnail( $thumb ); ?> </a>
	</div>
	<?php
	$index++;
endif;