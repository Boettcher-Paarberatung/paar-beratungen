<div class="main-title">
	<?php
	$main_tag = 'h1';
	$blog_id = absint( get_option( 'page_for_posts' ) );
	$subtitle = false;

	if ( is_home() || ( is_single() && 'post' === get_post_type() ) ) {
		$title    = get_the_title( $blog_id );
		$subtitle = get_field( 'subtitle', $blog_id );

		if ( is_single() ) {
			$main_tag = 'h2';
		}

	} elseif ( is_woocommerce_active() && is_woocommerce() ) {
			ob_start();
			woocommerce_page_title();
			$title    = ob_get_clean();
			$subtitle = get_field( 'subtitle', (int)get_option( 'woocommerce_shop_page_id' ) );
	} elseif ( is_category() || is_tag() || is_author() || is_post_type_archive() || is_tax() || is_day() || is_month() || is_year() ) {
		$title = get_the_archive_title();
	} elseif ( is_search() ) {
		$title = __( 'Search Results For' , 'mentalpress_wp') . ' &quot;' . get_search_query() . '&quot;';
	} elseif ( is_404() ) {
		$title = __( 'Error 404' , 'mentalpress_wp');
	} else {
		$title    = get_the_title();
		$subtitle = get_field( 'subtitle' );
	}

	?>

	<?php printf( '<%1$s class="main-title__primary">%2$s</%1$s>', tag_escape( $main_tag ), esc_html( $title ) ); ?>

	<?php if ( $subtitle ): ?>
		<h3 class="main-title__secondary"><?php echo esc_html( $subtitle ); ?></h3>
	<?php endif; ?>
</div>
