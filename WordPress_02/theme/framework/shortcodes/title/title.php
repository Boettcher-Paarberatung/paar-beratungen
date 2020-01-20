<?php
function jws_theme_title_func($atts) {
    $title = $color = $el_align =$animation = $el_class = '';
    extract(shortcode_atts(array(
        'title' => '',
		'title_background' => '',
        'title_tpl' => '',
		'font_size' => '',
        'color' => '',
		'sub_title' =>'',
		 'images' => '',
        'el_align' => 'text-center',
        'animation' => '',
        'el_class' => '',
		'title_link_id' =>''
    ), $atts));

    $class = $style = $parent_class = array();
    $class[] = 'medicare-title';
    if( in_array( $title_tpl, array('tpl3','tpl2') ) ){
        $parent_class[] = $el_align;
        $parent_class[] = getCSSAnimation($animation);
    }else{
        $class[] = $el_align;
        $class[] = getCSSAnimation($animation);
    }
	if($font_size){
        $style[] = "font-size: {$font_size}px";
    }
    if($color){
        $style[] = "color: $color";
    }
    $class[] = $el_class;
	$layout = "";

    $title = wp_kses_post( $title );
        if ($title_tpl == 'tpl1'){
            ob_start();
            $class[] = "medicare-title-underline medicare-title-underline-1";
            ?>
                <h3 class="<?php echo esc_attr(implode(' ', $class)); ?>" <?php if($style)echo ' style="'.esc_attr(implode('; ', $style)).'"'; ?>>
                    <?php echo $title;?>
                </h3>
            <?php
            $layout = ob_get_clean();
        } elseif ($title_tpl == 'tpl2'){
            $bg_title = wp_get_attachment_image_src($title_background, 'full');
            $parent_class[] = 'medicare-title-underline-2';
             ob_start();
            ?>
            <div class="medicare-title-separator-wrap <?php echo esc_attr( implode(' ', $parent_class) );?>" <?php  if($title_link_id) echo ' id="'.$title_link_id.'"';?>>
                <h3 class="medicare-title-separator <?php echo esc_attr(implode(' ', $class)); ?>" <?php if($style) echo 'style="'. esc_attr(implode('; ', $style))  .'"'; ?>>
                    <span>
                    <?php echo $title;?>
                    </span>
					
                </h3>
            </div>
            <?php
            $layout = ob_get_clean();
        }else if($title_tpl == 'tpl3'){
            ob_start();
            ?>
            <div class="medicare-title-separator-wrap <?php echo esc_attr( implode(' ', $parent_class) );?>">
                <h3 class="medicare-title-separator <?php echo esc_attr(implode(' ', $class)); ?>" <?php if($style) echo 'style="'. esc_attr(implode('; ', $style))  .'"'; ?>>
                    <span>
                    <?php echo $title;?>
                    </span>
                </h3>
            </div>
            <?php
            $layout = ob_get_clean();
        }else{
            ob_start();
            ?>
            <div class="medicare-title-default" <?php  if($title_link_id) echo ' id="'.$title_link_id.'"';?>>
                <h3 class="<?php echo esc_attr(implode(' ', $class)); ?>" <?php if($style) echo 'style="'. esc_attr(implode('; ', $style))  .'"'; ?>>
                    <?php echo $title;?>
					<?php if($images){ ?>
					<?php echo wp_get_attachment_image( $images, 'full', false, array('class'=>'img-responsive') );?>
					<?php  }?>
					
                </h3>
				<?php  
				if($sub_title){ ?>
				<p class="medicare_sub_title <?php echo $el_align;?>"> 
                    <?php echo esc_html($sub_title);?>
                </p>
				<?php  }?>
            </div>
            <?php
            $layout = ob_get_clean();
        }
		
	
	return $layout;
}

if(function_exists('insert_shortcode')) { insert_shortcode('title', 'jws_theme_title_func'); }
