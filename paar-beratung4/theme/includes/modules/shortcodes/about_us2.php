<?php $attach_img = ( $attach_img ) ? $attach_img : get_template_directory_uri() .'/images/background/7.jpg'; ?>
<!--Doctor Section Three-->
<section class="doctor-section-three">
    <div class="auto-container">
        <div class="inner-container clearfix" style="background-image:url(<?php echo esc_url( $attach_img ); ?>)">
            <div class="content">
                <h2><?php echo wp_kses_post( $title ); ?></h2>
                <div class="title"><?php echo wp_kses_post( $heading ); ?></div>
                <div class="text"><?php echo wp_kses_post( $text ); ?></div>
                <div class="signature"><img src="<?php echo esc_url( $sign_img ); ?>" alt="<?php esc_attr_e('image', 'mindron');?>" /></div>
            </div>
        </div>
    </div>
</section>
<!--End Doctor Section Three-->