<?php
$jws_theme_options = $GLOBALS['jws_theme_options'];
$image_default = isset($jws_theme_options['jws_theme_portfolio_image_default']) ? $jws_theme_options['jws_theme_portfolio_image_default'] : '';
if(is_home()){
	$jws_theme_show_post_title = 1;
	$jws_theme_show_post_desc = 1;
	$jws_theme_show_post_info = 1;
}elseif (is_single()) {
	$jws_theme_portfolio_crop_image = isset($jws_theme_options['jws_theme_portfolio_crop_image']) ? $jws_theme_options['jws_theme_portfolio_crop_image'] : 1;
	$jws_theme_portfolio_image_width = (int) isset($jws_theme_options['jws_theme_portfolio_image_width']) ? $jws_theme_options['jws_theme_portfolio_image_width'] : 773;
	$jws_theme_portfolio_image_height = (int) isset($jws_theme_options['jws_theme_portfolio_image_height']) ? $jws_theme_options['jws_theme_portfolio_image_height'] : 573;
	//$jws_theme_show_post_title = (int) isset($jws_theme_options['jws_theme_post_show_post_title']) ? $jws_theme_options['jws_theme_post_show_post_title'] : 1;
	$jws_theme_show_post_info = (int) isset($jws_theme_options['jws_theme_portfolio_show_post_info']) ? $jws_theme_options['jws_theme_portfolio_show_post_info'] : 0;
	$jws_theme_show_social_share = (int) isset($jws_theme_options['jws_theme_portfolio_show_social_share']) ? $jws_theme_options['jws_theme_portfolio_show_social_share'] : 1;
	//$jws_theme_post_show_post_tags = (int) isset($jws_theme_options['jws_theme_post_show_post_tags']) ? $jws_theme_options['jws_theme_post_show_post_tags'] : 1;
	//$jws_theme_post_show_post_author = (int) isset($jws_theme_options['jws_theme_post_show_post_author']) ? $jws_theme_options['jws_theme_post_show_post_author'] : 1;
	$jws_theme_show_post_desc = 1;
}else{
	$jws_theme_portfolio_crop_image = isset($jws_theme_options['jws_theme_portfolio_crop_image']) ? $jws_theme_options['jws_theme_portfolio_crop_image'] : 0;
	$jws_theme_portfolio_image_width = (int) isset($jws_theme_options['jws_theme_portfolio_image_width']) ? $jws_theme_options['jws_theme_portfolio_image_width'] : 600;
	$jws_theme_portfolio_image_height = (int) isset($jws_theme_options['jws_theme_portfolio_image_height']) ? $jws_theme_options['jws_theme_portfolio_image_height'] : 400;
	$jws_theme_show_post_title = (int) isset($jws_theme_options['jws_theme_portfolio_show_post_title']) ? $jws_theme_options['jws_theme_portfolio_show_post_title'] : 1;
	$jws_theme_show_post_info = (int) isset($jws_theme_options['jws_theme_portfolio_show_post_info']) ? $jws_theme_options['jws_theme_portfolio_show_post_info'] : 1;
	$jws_theme_show_post_desc = (int) isset($jws_theme_options['jws_theme_portfolio_show_post_desc']) ? $jws_theme_options['jws_theme_portfolio_show_post_desc'] : 1;
}
	$jws_theme_blog_layout = isset($jws_theme_options['jws_theme_portfolio_post_layout']) ? $jws_theme_options['jws_theme_portfolio_post_layout'] : '2cr'; 	//2cl: 2 col, content left / 2cr: 2columns, content right
	$cl_content = 'col-xs-12 col-sm-12 col-md-4 col-lg-4';
	$cl_img = 'col-xs-12 col-sm-12 col-md-8 col-lg-8';
	function jws_theme_portfolio_show_thumb($cl_img ='',$jws_theme_portfolio_crop_image='',$jws_theme_portfolio_image_width='600',$jws_theme_portfolio_image_height='400'){
		//if ($cl_img =='') $cl_img = 'col-xs-12 col-sm-12 col-md-8 col-lg-8';
		if (has_post_thumbnail()) { ?>
			<div class="tb-portfolio-image <?php echo $cl_img; ?>">
				<!-- Get Thumb -->
				<div class="jws_thumbnail">
				
					<?php  
					$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
					$image_full = $attachment_image[0];
					if($jws_theme_portfolio_crop_image){
						$image_resize = matthewruddy_image_resize( $attachment_image[0], $jws_theme_portfolio_image_width, $jws_theme_portfolio_image_height, true, false );
						echo '<img style="width:100%;" class="bt-image-cropped" src="'. esc_attr($image_resize['url']) .'" alt="">';
					}else{
						the_post_thumbnail();
					}
				

				
					
					?>
					<?php /* the_post_thumbnail('medicare-blog-large-hard-crop'); */ ?>
				</div>
			</div>
		<?php }
		}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php  if($jws_theme_blog_layout == '2cr') {
		jws_theme_portfolio_show_thumb($cl_img,$jws_theme_portfolio_crop_image,$jws_theme_portfolio_image_width,$jws_theme_portfolio_image_height);
	}
	?>
	<div class="tb-content-block <?php echo $cl_content; ?>">
	
		<div class="row">
			<div class="project_desc text-justify">
				<h3 class ="header-content"> Project description</h3>
				<?php if($jws_theme_show_post_desc) echo jws_theme_content_render(); ?>
			</div>
			<div class="project_detail">
				<h3 class ="header-content"> Project detail</h3>
				<ul class="portfolio_project_detail list-unstyled">
					<?php  $list_info = array(
						'createdby'=>esc_html__('Create By','medicare'),
						'participants'=>esc_html__('Participants','medicare'),
						'date'=>esc_html__('Date','medicare'),
						'website'=>esc_html__('Website','medicare')
					);
					$k=0;	
					foreach( $list_info as $key=>$info ){
						$$key = get_post_meta( get_the_ID(), 'jws_theme_'. $key, true );
						if( !empty( $$key ) ){
							?><li>
								<strong><?php echo $info;?>: </strong><?php echo esc_attr( $$key ); ?>
							</li><?php  
						}
					}
					?>
				</ul> 
			</div>
			
		</div>	
	</div>
	<?php  if('2cl' === $jws_theme_blog_layout ){
		jws_theme_portfolio_show_thumb($cl_img,$jws_theme_portfolio_crop_image,$jws_theme_portfolio_image_width,$jws_theme_portfolio_image_height);
	}
	?>
	<div class = "clearfix"> </div>
	<?php  /*
		* Show more info
		*/?>
	<ul class="tb-portfolio-info list-unstyled">
		<?php
			if($jws_theme_show_post_info){
				$list_info = array('date'=>esc_html__('Date','medicare'),'client'=>esc_html__('Client','medicare'),'location'=>esc_html__('Location','medicare'));
				$k = 0;
				foreach( $list_info as $key=>$info ){
					$$key = get_post_meta( get_the_ID(), 'jws_theme_'. $key, true );
					if( $k ===1 ){
						?>
						<li><span><?php esc_html_e('Categories','medicare'); ?>:</span> <?php the_terms( get_the_ID(), 'portfolio_category','', ', '); ?></li>
						<?php
					}
					if( !empty( $$key ) ){
						?>
						<li>
							<span><?php echo $info;?>:</span> <?php echo esc_attr( $$key ); ?>
						</li>
					<?php }
					$k++;
				}
				if($jws_theme_show_post_info){ ?>
					<li>
						<?php echo jws_theme_info_bar_render(); ?>
					</li>
				<?php }
			}?>
		<?php if($jws_theme_show_social_share){ ?>
			<li>
			<?php //jws_theme_info_bar_render($show_post_comment,$show_post_tag,$show_author) 
			echo jws_theme_social_share_post_render(false,false,true); ?>
			</li>
		<?php } ?>
	</ul>
	
</article>