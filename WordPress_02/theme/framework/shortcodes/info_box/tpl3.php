<div class="tb-info-box">

	
	<div class="tb-image <?php echo esc_attr( $align_image1 );?>">
		<?php echo wp_get_attachment_image( $image_1, 'full', false, array('class'=>'img-responsive') );?>
	</div>
	<div class="tb-info-inner">
		<?php  if( isset( $heading_1[0] ) ){?>
			<div class="tb-title">
				<h2><?php echo esc_attr($heading_1[0]); if( isset( $heading_1[1] ) ) echo '<span>'. esc_attr($heading_1[1]) .'</span>';?></h2>
			</div>
		<?php  } ?>
		<div class="tb-content">
		<?php  
			//string substr ( string $string , int $start [, int $length ] )
			$sstr = substr($content,0,300); 
			if( strlen($sstr) < strlen($content)) {
				$sstr = $sstr."...";
				echo apply_filters('the_content', $sstr);
			}
			else echo apply_filters('the_content', $content);
		?>
		</div>
	
		<?php if( !empty( $link_text ) || !empty( $promotion_text) ): ?>
			<div class="tb-control">
				<?php if( !empty( $link_text ) ): ?>
					<a class="tb-shop-now" href="<?php echo esc_url($ex_link);?>"><?php echo esc_attr( $link_text );?></a>
				<?php endif; ?>
				<?php if( !empty( $promotion_text ) ): ?>
					<a class="tb-shop-now" href="<?php echo esc_url($promotion_link);?>"><?php echo esc_attr( $promotion_text );?></a>
				<?php endif; ?>
			</div>
		<?php endif;?>
	
	</div>
	<div class="clearfix"></div> 

</div>