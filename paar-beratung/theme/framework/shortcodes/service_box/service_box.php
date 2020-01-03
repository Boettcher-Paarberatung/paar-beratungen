<?php
function jws_theme_service_box_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'icon' => '',
		'title' => '',
        'ex_link' => '',
        'el_align' => 'text-center',
        'tpl' => 'tpl',
		'image_icon' => '',
        'el_class' => ''
    ), $atts));

	$content = wpb_js_remove_wpautop($content, true);
	
    $class = $child_class = array();
	$class[] = 'tb-service-wrap';
	$class[] = $el_class;
	$child_class[] = $el_align;
	$child_class[] = $tpl;
    ob_start();
    ?>
		<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
			<?php if( !empty( $ex_link ) ){?>
			<a href="<?php echo esc_url($ex_link); ?>">
			<?php } ?>
			<?php if( $tpl == 'tpl2' ):
				wp_enqueue_script( 'countUP' );
				$child_class[] = 'tb-incremental';
			?>
				<div class="tb-service <?php echo esc_attr(implode(' ', $child_class)); ?>">
					<?php
						$max = intval( $title );
						if( ! empty( $icon ) ) echo '<div class="tb-icon"><i class="'. esc_attr($icon) .'"></i></div>';
						if( ! empty( $title ) ) echo '<h5 class="tb-title"><span class="incremental-counter" data-value="'. $max .'"></span>'. str_replace( $max, '', $title ) .'</h5>';
						if( ! empty( $content ) ) echo '<div class="tb-content">'. $content .'</div>';
					?>
				</div>
			<?php elseif( $tpl == 'tpl3'): ?>
					<div class="tb-service <?php echo esc_attr(implode(' ', $child_class)); ?>">
						<h5 class="tb-title-icon">
						<?php

							if( ! empty( $icon ) ) echo '<span class="tb-icon"><i class="'.esc_attr($icon).'"></i></span>';
							if( ! empty( $title ) ) echo '<span class="tb-title">'. esc_html($title) .'</span>';
						?>
						</h5>
						<?php
							if( ! empty( $content ) ) echo '<div class="tb-content">'.$content.'</div>';
						?>
					</div>
			<?php elseif( $tpl == 'tpl4' || $tpl == 'tpl6'): ?>
					<div class="tb-service <?php echo esc_attr(implode(' ', $child_class)); ?>">
						<div class = "tb-services-inner">
							<div class="tb-title-icon">
							<?php
								if( ! empty( $icon ) ) echo '<span class="tb-icon"><i class="'.esc_attr($icon).'"></i></span>';
								
							?>
							</div>
							<?php
								if( ! empty( $image_icon ) ) echo wp_get_attachment_image( $image_icon, 'full', false, array('class'=>'img-responsive') );
								if( ! empty( $title ) ) echo '<div class="tb-title">'. esc_html($title) .'</div>';
								if( ! empty( $content ) ) echo '<div class="tb-content">'.$content.'</div>';
							?>
						</div>
					</div>
			<?php elseif( $tpl == 'tpl5' ): ?>
					<div class="tb-service <?php echo esc_attr(implode(' ', $child_class)); ?>">
						<div class="tb-title-icon">
						<?php

							if( ! empty( $icon ) ) echo '<span class="tb-icon"><i class="'.esc_attr($icon).'"></i></span>';
							if( ! empty( $image_icon ) ) echo '<span class="tb-icon">'.wp_get_attachment_image( $image_icon, 'full', false, array('class'=>'img-responsive')).'</span>';
						?>
						</div>
						<?php
							if( ! empty( $title ) ) echo '<div class="service-right-content"> <h5 class="tb-title">'. esc_html($title) .'</h5>';
						
							if( ! empty( $content ) ) echo '<div class="tb-content">'.$content.'</div></div>';
						?>
					</div>
			<?php else: ?>
					<div class="tb-service <?php echo esc_attr(implode(' ', $child_class)); ?>">
						<?php

							if( ! empty( $icon ) ) echo '<div class="tb-icon"><i class="'.esc_attr($icon).'"></i></div>';
							if( ! empty( $title ) ) echo '<h5 class="tb-title">'.esc_html($title).'</h5>';
							if( ! empty( $content ) ) echo '<div class="tb-content">'.$content.'</div>';
						?>
					</div>
			<?php endif; ?>
			<?php if( !empty( $ex_link ) ){ ?>
			</a>
			<?php } ?>
		</div>
		
    <?php
    return ob_get_clean();
}
if(function_exists('insert_shortcode')) { insert_shortcode('service_box', 'jws_theme_service_box_func');}
