<?php
/* Title */
if (!function_exists('jws_theme_title_render')) {
	function jws_theme_title_render(){
		global $jws_theme_options;
		ob_start();
		?>
		<?php if(is_single()){ ?>
			<?php if(get_the_title()){ ?>
				<div class="blog-title"><?php the_title(); ?></div>
			<?php } else { ?>    
				<div class="blog-title"><a href="<?php the_permalink(); ?>"><?php esc_html_e('Read more...', 'medicare');; ?></a></div>
			<?php } ?>
		<?php }else{ ?>
			<?php if(get_the_title()){ ?>
				<h3 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php }
		}
		return  ob_get_clean();
	}
}
/* Info Bar */
if (!function_exists('jws_theme_blog_info_bar_render')){
	function jws_theme_blog_info_bar_render() {
		global $jws_theme_options, $post;
		if( is_wp_error( $post ) ) return;
		$jws_theme_show_post_comment = (int) isset($jws_theme_options['jws_theme_'. $post->post_type .'_show_post_comment']) ?  $jws_theme_options['jws_theme_'. $post->post_type .'_show_post_comment']: 1;
		$jws_theme_show_post_tag = (int) isset( $jws_theme_options['jws_theme_post_show_post_tags'] ) ? $jws_theme_options['jws_theme_post_show_post_tags'] : 1;
		$jws_theme_show_author= (int) isset( $jws_theme_options['jws_theme_post_show_post_author'] ) ? $jws_theme_options['jws_theme_post_show_post_author'] : 1;
		ob_start();
			?>
			<div class="show-blog-info">
				<span class = "sml-avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 170 ); ?> </span>
				<?php if( $jws_theme_show_author ){ ?><span class="author-name"><?php esc_html_e('By ', 'medicare'); the_author_posts_link(); ?></span><?php } ?>
				 <span class = "posted"><?php esc_html_e('Posted ', 'medicare');?> : </span>
				<span class="jws-blog-date">
				   <?php 
					$archive_year  = get_the_time('Y'); 
					$archive_month = get_the_time('m');   
					$archive_day   = get_the_time('d'); 
					?>
				   <a href="<?php echo esc_url(get_day_link($archive_year, $archive_month, $archive_day)); ?>"><time><?php echo get_the_time('d').'/'.get_the_time('m').'/'.get_the_time('Y');?></time></a>				   
				</span>
				<!-- Comment count -->
				<?php if( $jws_theme_show_post_comment ): ?><span class="comments-number"><i class="fa fa-comments-o"></i><?php comments_number( esc_html__( '0 Comment', 'medicare' ), esc_html__( '1 Comment', 'medicare' ), esc_html__( '% Comments ', 'medicare' ) ); ?></span><?php endif; ?>
				
			</div>
			<?php
	}
}
	
if (!function_exists('jws_theme_info_bar_render')) {
	function jws_theme_info_bar_render($jws_theme_show_post_comment='',$jws_theme_show_post_tag='',$jws_theme_show_author='') {
		global $jws_theme_options, $post;
		if( is_wp_error( $post ) ) return;
		if($jws_theme_show_post_comment=='')
			$jws_theme_show_post_comment = (int) isset($jws_theme_options['jws_theme_'. $post->post_type .'_show_post_comment']) ?  $jws_theme_options['jws_theme_'. $post->post_type .'_show_post_comment']: 1;
		if( $jws_theme_show_post_tag =='')
			$jws_theme_show_post_tag = (int) isset( $jws_theme_options['jws_theme_post_show_post_tags'] ) ? $jws_theme_options['jws_theme_post_show_post_tags'] : 1;
		if($jws_theme_show_author =='')$jws_theme_show_author= (int) isset( $jws_theme_options['jws_theme_post_show_post_author'] ) ? $jws_theme_options['jws_theme_post_show_post_author'] : 1;
		ob_start();
			?>
			<div class="blog-info">
				
				<?php if( $jws_theme_show_author ){ ?><span class="author-name"><i class="fa fa-user"></i><?php esc_html_e('By ', 'medicare'); the_author_posts_link(); ?></span><?php } ?>
				<!-- Date -->
				<span class="tb-blog-date">
				   <?php 
					$archive_year  = get_the_time('Y'); 
					$archive_month = get_the_time('m'); 
					$archive_day   = get_the_time('d'); 
					?>
				   <a href="<?php echo esc_url(get_day_link($archive_year, $archive_month, $archive_day)); ?>"><i class="fa fa-calendar"></i><time><small><?php echo get_the_time('j');?></small><?php echo get_the_time('M');?></time></a>
				   
				</span>
				<!-- Comment count -->
				<?php if( $jws_theme_show_post_comment ): ?><span class="comments-number"><i class="fa fa-comment"></i><?php comments_number( esc_html__( '0 Comment', 'medicare' ), esc_html__( '1 Comment', 'medicare' ), esc_html__( '% Comments ', 'medicare' ) ); ?></span><?php endif; ?>
				<?php if( $jws_theme_show_post_tag ){ ?><span class="tags"><?php the_tags( '<i class="fa fa-tags"></i> ', ', ', '' ); ?> </span><?php } ?>
				
			</div>
			<?php
		return  ob_get_clean();
	}
}
/* Post gallery */
if (!function_exists('jws_theme_grab_ids_from_gallery')) {

    function jws_theme_grab_ids_from_gallery() {
        global $post;
        $gallery = jws_theme_get_shortcode_from_content('gallery');
        $object = new stdClass();
        $object->columns = '3';
        $object->link = 'post';
        $object->ids = array();
        if ($gallery) {
            $object = jws_theme_extra_shortcode('gallery', $gallery, $object);
        }
        return $object;
    }

}
/* Extra shortcode */
if (!function_exists('jws_theme_extra_shortcode')) {
    function jws_theme_extra_shortcode($name, $shortcode, $object) {
        if ($shortcode && is_object($object)) {
            $attrs = str_replace(array('[', ']', '"', $name), null, $shortcode);
            $attrs = explode(' ', $attrs);
            if (is_array($attrs)) {
                foreach ($attrs as $attr) {
                    $_attr = explode('=', $attr);
                    if (count($_attr) == 2) {
                        if ($_attr[0] == 'ids') {
                            $object->$_attr[0] = explode(',', $_attr[1]);
                        } else {
                            $object->$_attr[0] = $_attr[1];
                        }
                    }
                }
            }
        }
        return $object;
    }
}
/* Get Shortcode Content */
if (!function_exists('jws_theme_get_shortcode_from_content')) {

    function jws_theme_get_shortcode_from_content($param) {
        global $post;
        $pattern = get_shortcode_regex();
        $content = $post->post_content;
        if (preg_match_all('/' . $pattern . '/s', $content, $matches) && array_key_exists(2, $matches) && in_array($param, $matches[2])) {
            $key = array_search($param, $matches[2]);
            return $matches[0][$key];
        }
    }

}
/* Remove Shortcode */
if (!function_exists('jws_theme_remove_shortcode_from_content')) {
	function jws_theme_remove_shortcode_from_content( $content ) {
		global $post;
		$format = get_post_format();
		if ( is_single() && 'gallery' == $format ) {
			$content = strip_shortcodes( $content );
		}
		return $content;
	}
}
/* add_filter( 'the_content', 'jws_theme_remove_shortcode_from_content' ); */
/* Content */
if (!function_exists('jws_theme_content_render')) {
	function jws_theme_content_render($jws_theme_blog_post_excerpt_leng=false,$jws_theme_post_excerpt_more=false,$jws_theme_post_read_more=false){
		global $jws_theme_options;
		if(!$jws_theme_blog_post_excerpt_leng)	
			$jws_theme_blog_post_excerpt_leng = (int) isset($jws_theme_options['jws_theme_blog_post_excerpt_leng']) ? $jws_theme_options['jws_theme_blog_post_excerpt_leng'] : 0;
		if(!$jws_theme_post_excerpt_more)	
			$jws_theme_post_excerpt_more = isset($jws_theme_options['jws_theme_blog_post_excerpt_more']) ? $jws_theme_options['jws_theme_blog_post_excerpt_more'] : '';
		if(!$jws_theme_post_read_more)	
			$jws_theme_post_read_more = isset($jws_theme_options['jws_theme_blog_post_readmore']) ? esc_attr( $jws_theme_options['jws_theme_blog_post_readmore'] ) : '';
		
		ob_start();
		?>
		<?php if (is_single() || is_home()) { ?>
				<div class="tb-excerpt">
					<?php
					if(has_excerpt()):
						the_excerpt();	
					else:
						the_content();
					endif;
					wp_link_pages(array(
						'before' => '<div class="page-links">' . esc_html__('Pages:', 'medicare'),
						'after' => '</div>',
					));
					?>
				</div>
			<?php } else { ?>
				<div class="tb-excerpt">
					<?php echo jws_theme_custom_excerpt( intval( $jws_theme_blog_post_excerpt_leng ), $jws_theme_post_excerpt_more); ?>
				</div>
				<a class="tb-readmore" href="<?php the_permalink(); ?>"><?php echo $jws_theme_post_read_more; ?></a>
			<?php } ?>
		<?php
		return  ob_get_clean();
	}
}
/*Tags*/
if (!function_exists('jws_theme_tags_render')) {
	function jws_theme_tags_render(){
		ob_start();
		?>
		<?php if (is_single()) { ?>
				<div class="tag-links">
					<?php the_tags(); ?>
				</div>
			<?php }?>
		<?php
		return  ob_get_clean();
	}
}
/*Author*/

if ( ! function_exists( 'jws_theme_blog_author_render' ) ) {
	function jws_theme_blog_author_render() {
		ob_start();
		?>
		<div class="about-author"> 
			<div class="author-avatar">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 170 ); ?>
			</div>
			<div class="author-info">
				
				<a class="author-name" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"> <h4 class="name"><?php the_author_meta('display_name'); ?></h4> </a>
				<span class="subtitle"><?php esc_html_e( 'Author', 'medicare' ); ?></span>
				<p class="desc"><?php the_author_meta('description'); ?></p>
				<p class="sosial-info">
					<?php  if(get_the_author_meta('facebook')) ?>  <span class ="author-fb"> <a href="https://facebook.com/<?php echo get_the_author_meta('facebook'); ?> "> Facebook</a> </span>
					<?php  if(get_the_author_meta('twitter')) ?> <span class ="author-tw"> <a href="https://twitter.com/<?php echo the_author_meta('twitter'); ?> "> Twitter</a>  </span>
					<?php  if(get_the_author_meta('instagram')) ?> <span class ="author-ins"><a href="https://instagram.com/<?php echo the_author_meta('instagram'); ?> "> Instagram</a> </span> 
					<?php  if(get_the_author_meta('ybuser')) ?> <span class ="author-ins"><a href="https://www.youtube.com/user/<?php echo the_author_meta('ybuser'); ?> "> YouTube</a> </span> 
					
				</p>
				
			</div>
		</div>
		<?php  
		return  ob_get_clean();
	}
}
if ( ! function_exists( 'jws_theme_author_render' ) ) {
	function jws_theme_author_render() {
		ob_start();
		?>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) { ?>
			<span class="featured-post"> <?php esc_html_e( 'Sticky', 'medicare' ); ?></span>
		<?php } ?>
		<div class="about-author"> 
			<div class="author-avatar">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 170 ); ?>
			</div>
			<div class="author-info">
				<span class="subtitle"><?php esc_html_e( 'AUTHOR', 'medicare' ); ?></span>
				<h4 class="name"><?php the_author_meta('display_name'); ?></h4>
				<p class="desc"><?php the_author_meta('description'); ?></p>
				<a class="read-more" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php esc_html_e('All stories by: ', 'medicare'); the_author_meta('display_name'); ?></a>
			</div>
		</div>
		<?php
		return  ob_get_clean();
	} 
}
/* Social share */
if ( ! function_exists('jws_theme_social_share_post_render') ) {
	function jws_theme_social_share_post_render() {
		global $post;
		$post_title = $post->post_title;
		$permalink = get_permalink($post->ID);
		$title = get_the_title();
		$output = '';
		$output .= '<div class="tb-social-share-buttons">
			'.__('Share: ', 'medicare').'
			<a class="tb-twitter-icon" href="http://twitter.com/share?text='.$title.'&url='.$permalink.'"
				onclick="window.open(this.href, \'twitter-share\', \'width=550,height=235\');return false;">
				<i class="fa fa-twitter"></i>
				<span>Twitter</span>
			</a>             
			<a class="tb-fb-icon" href="https://www.facebook.com/sharer/sharer.php?u='.$permalink.'"
				 onclick="window.open(this.href, \'facebook-share\',\'width=580,height=296\');return false;">
				 <i class="fa fa-facebook"></i>
				<span>Facebook</span>
			</a>         
			<a class="tb-gplus-icon" href="https://plus.google.com/share?url='.$permalink.'"
			   onclick="window.open(this.href, \'google-plus-share\', \'width=490,height=530\');return false;">
			   <i class="fa fa-google-plus"></i>
				<span>Google+</span>
			</a>
		</div>';
		return $output;
	}
}
