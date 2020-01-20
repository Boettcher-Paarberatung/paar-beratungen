<?php get_header(); ?>
<?php

$jws_theme_options = $GLOBALS['jws_theme_options'];
$jws_theme_post_show_post_title = (int) isset($jws_theme_options['jws_theme_post_show_post_title']) ? $jws_theme_options['jws_theme_post_show_post_title'] : 1;
$jws_theme_show_page_breadcrumb = (int) isset($jws_theme_options['jws_theme_post_show_page_breadcrumb']) ? $jws_theme_options['jws_theme_post_show_page_breadcrumb'] : 1;
$jws_theme_post_show_post_nav = (int) isset($jws_theme_options['jws_theme_post_show_post_nav']) ?  $jws_theme_options['jws_theme_post_show_post_nav']: 0;
$jws_theme_show_post_comment = (int) isset($jws_theme_options['jws_theme_post_show_post_comment']) ?  $jws_theme_options['jws_theme_post_show_post_comment']: 1;
$jws_theme_post_show_post_related = (int) isset($jws_theme_options['jws_theme_post_show_post_related']) ?  $jws_theme_options['jws_theme_post_show_post_related']: 1;
$jws_theme_post_no_post_related = (int) isset($jws_theme_options['jws_theme_post_no_post_related']) ?  $jws_theme_options['jws_theme_post_no_post_related']: 3;
$columns = $jws_theme_post_no_post_related > 0 ? $jws_theme_post_no_post_related : 3;
$jws_theme_post_show_social_share = (int) isset($jws_theme_options['jws_theme_post_show_social_share']) ? $jws_theme_options['jws_theme_post_show_social_share'] : 1;
//
$jws_theme_post_crop_image = (int) isset($jws_theme_options['jws_theme_post_crop_image']) ? $jws_theme_options['jws_theme_post_crop_image'] : 1;
$jws_theme_post_image_width = (int) isset($jws_theme_options['jws_theme_post_image_width']) ? $jws_theme_options['jws_theme_post_image_width'] : 870;
$jws_theme_post_image_height = (int) isset($jws_theme_options['jws_theme_post_image_height']) ? $jws_theme_options['jws_theme_post_image_height'] : 430;
$jws_theme_post_show_post_info = (int) isset($jws_theme_options['jws_theme_post_show_post_info']) ? $jws_theme_options['jws_theme_post_show_post_info'] : 1;
$jws_theme_post_show_post_tags = (int) isset($jws_theme_options['jws_theme_post_show_post_tags']) ? $jws_theme_options['jws_theme_post_show_post_tags'] : 1;
$jws_theme_post_show_post_author = (int) isset($jws_theme_options['jws_theme_post_show_post_author']) ? $jws_theme_options['jws_theme_post_show_post_author'] : 1;
$jws_theme_post_show_post_comment = (int) isset($jws_theme_options['jws_theme_post_show_post_comment']) ? $jws_theme_options['jws_theme_post_show_post_comment'] : 1;
$jws_theme_post_show_post_about_author = (int) isset($jws_theme_options['jws_theme_post_show_post_about_author']) ? $jws_theme_options['jws_theme_post_show_post_about_author'] : 1;
$jws_theme_blog_layout = isset($jws_theme_options['jws_theme_post_layout']) ? $jws_theme_options['jws_theme_post_layout'] : '2cr';
$left_sidebar_id = 'tbtheme-left-sidebar';
$right_sidebar_id = 'tbtheme-blog-sidebar';
$image_default = isset($jws_theme_options['jws_theme_image_default']) ? $jws_theme_options['jws_theme_image_default'] : '';
?>
	<div class="main-content">

		<div class="container">
			<div class="row">
				<?php
				
				
				$cl_content = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
				$cl_sb_left = '';
				$cl_sb_right = '';
				
				switch ($jws_theme_blog_layout) {
					case '1col':
						$cl_content = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
						$cl_sb_left = '';
						$cl_sb_right = '';
						break;
					case '2cl':
						if(is_active_sidebar( $left_sidebar_id )){
							$cl_content = 'col-xs-12 col-sm-9 col-md-9 col-lg-9';
							$cl_sb_left = 'col-xs-12 col-sm-3 col-md-3 col-lg-3';
						}
						break;
					case '2cr':
						if(is_active_sidebar( $right_sidebar_id  )){
							$cl_content = 'col-xs-12 col-sm-9 col-md-9 col-lg-9';
							$cl_sb_right = 'col-xs-12 col-sm-3 col-md-3 col-lg-3';
						}
						break;
					case '3cm':
						if(is_active_sidebar( $left_sidebar_id ) && is_active_sidebar( $right_sidebar_id  )){
							$cl_content = 'col-xs-12 col-sm-3 col-md-3 col-lg-3';
							$cl_sb_left = 'col-xs-12 col-sm-6 col-md-6 col-lg-6';
							$cl_sb_right = 'col-xs-12 col-sm-3 col-md-3 col-lg-3';
						}else{
							if(is_active_sidebar( $left_sidebar_id )){
								$cl_content = 'col-xs-12 col-sm-9 col-md-9 col-lg-9';
								$cl_sb_left = 'col-xs-12 col-sm-3 col-md-3 col-lg-3';
							}
							if(is_active_sidebar( $right_sidebar_id  )){
								$cl_content = 'col-xs-12 col-sm-9 col-md-9 col-lg-9';
								$cl_sb_right = 'col-xs-12 col-sm-3 col-md-3 col-lg-3';
							}
						}
						break;
				}
				?>
				<!-- Start Left Sidebar -->
				<?php if($jws_theme_blog_layout == '2cl' && is_active_sidebar( $left_sidebar_id  ) || ($jws_theme_blog_layout == '3cm' && is_active_sidebar( $left_sidebar_id  ))){ ?>
					<div class="<?php echo esc_attr($cl_sb_left) ?> post-sidebar">
						
						<?php 
							//get_sidebar('left'); //"sidebar-{$name}.php" 
							dynamic_sidebar($left_sidebar_id );
						?>
					</div>
				<?php } ?>
				<!-- End Left Sidebar -->
				<!-- Start Content -->
				<div class="<?php echo esc_attr($cl_content) ?> content tb-blog">
					<?php
					while ( have_posts() ) : the_post();
						$post_id = get_the_ID();
						//count post view
						jws_theme_setPostViews(get_the_ID());
						//End 
						get_template_part( 'framework/templates/blog/single/entry', get_post_format());
						
						// If comments are open or we have at least one comment, load up the comment template.
						if ( (comments_open() && $jws_theme_show_post_comment) || (get_comments_number() && $jws_theme_show_post_comment) ) comments_template();
					endwhile;
					?>
					<?php if($jws_theme_post_show_post_related) { ?>
					<div class = "related-space"></div>
					<div class="tb-blog-related">
						<?php
						$related = get_posts( array( 'category__in' => wp_get_post_categories($post_id), 'numberposts' => $jws_theme_post_no_post_related, 'post__not_in' => array($post_id) ) );
						if( $related ) {
							echo '<div class="tb-title text-left"><h4>'. esc_html__('Related Posts','medicare') .'</h4></div>
							<div class = related-title-space> </div>
							<div class="row">';
							//echo '';
							/*$colrow = array(
								'col2' => 'hidden-xs  col-sm-6 col-md-6 col-lg-6';
								'col3' => 'hidden-xs  col-sm-6 col-md-4 col-lg-4';
								'col4' => 'hidden-xs  col-sm-6 col-md-3 col-lg-3';
								'col6' => 'hidden-xs  col-sm-4 col-md-2 col-lg-2';
							);
							$col = $colrow['col4']; //default 
							$col = $colrow['col'.$number]; //switch case*/
							foreach( $related as $post ) {
							setup_postdata($post); 
							?><div class="col-lg-<?php echo intval( 12/$columns );?> col-md-<?php echo intval( 12/$columns );?> col-sm-6 hidden-xs related-col"><?php  
								if(has_post_thumbnail()){
									$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false);
									$image_resize = matthewruddy_image_resize( $attachment_image[0], 600, 400, true, false );
									?>
									
										<a href="<?php the_permalink(); ?>"><img style="width:100%;" class="bt-image-cropped" src="<?php echo esc_attr($image_resize['url']); ?>" alt=""></a>
									<?php
								}else{
									//echo '<img style="width:100%;" class="bt-image-cropped" src="'. esc_attr($image_default['url']) .'" alt="">';
								}
								?>
								<div class="tb-content">
										<a href="<?php the_permalink(); ?>"><h4 class="tb-title"><?php the_title(); ?></h4></a>
										<div class ="update-info">
											<?php 
										$archive_year  = get_the_time('Y'); 
										$archive_month = get_the_time('m'); 
										$archive_day   = get_the_time('d'); 
										$archive_all = get_the_time('');   
										?>
										<span class='update-text'>Updated: </span>
										<a href="<?php echo esc_url(get_day_link($archive_year, $archive_month, $archive_day)); ?>">
											<?php echo get_the_time('d').'/'.get_the_time('m').'/'.get_the_time('Y');?></a>
										</div>
										<div class="tb-excerpt">
											<?php echo jws_theme_custom_excerpt(intval(15), '...'); ?>
										</div>
								</div>
								<?php  
							?></div><?php  
							} 
						echo '</div>'; //close "row"
						}
						wp_reset_postdata(); 
						?>
					</div>
					<?php } ?>
				</div>
				<!-- End Content -->
				<!-- Start Right Sidebar -->
				<?php if(($jws_theme_blog_layout == '2cr' && is_active_sidebar( $right_sidebar_id )) || ($jws_theme_blog_layout == '3cm' && is_active_sidebar( $right_sidebar_id ))){ ?>
					<div class="<?php echo esc_attr($cl_sb_right) ?> post-sidebar">
						<?php // if(is_active_sidebar('tbtheme-blog-sidebar' )) ?> 
						<?php dynamic_sidebar($right_sidebar_id); ?>
					</div>
				<?php } ?>
				<!-- End Right Sidebar -->
			</div>
		</div>
	</div>
<?php get_footer(); ?>