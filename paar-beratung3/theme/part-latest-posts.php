<?php
/* Latest Posts. under the content. */

	$excerpt_length = 120;

	$args = array(
		'posts_per_page'   => 3,
		'orderby'          => 'post_date',
		'order'            => 'DESC',
		'post_type'        => 'post',
		'post_status'      => 'publish',
		'suppress_filters' => false // WPML fix for multiple languages
	);
	$posts_array = get_posts( $args );

?>

<div class="latest-posts">
	<div class="row">
		<?php
			foreach ( $posts_array as $post ) :
			setup_postdata( $post );
		?>
			<div class="col-xs-12 col-md-4">
				<div class="latest-post">
					<?php if ( has_post_thumbnail() ) : ?>
						<a class="latest-post__thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'latest-posts' ); ?></a>
					<?php endif; ?>
					<div class="latest-post__categories"><?php the_category(); ?></div>
					<h4 class="latest-post__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					<p class="latest-post__excerpt">
						<?php
							$excerpt = get_the_excerpt();
							if ( strlen( $excerpt ) > $excerpt_length ) {
								$excerpt = substr( $excerpt, 0, strpos( $excerpt , ' ', $excerpt_length ) ) . ' &hellip;';
							}
							echo esc_html( $excerpt );
						?>
					</p>
				</div>
			</div>
		<?php
			endforeach;
			wp_reset_postdata();
		?>
	</div>
</div>
