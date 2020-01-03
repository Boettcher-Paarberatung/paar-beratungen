<?php $attach_img = ( $attach_img ) ? $attach_img : get_template_directory_uri() .'/images/resource/about-1.jpg'; ?>
<section class="about-clinic-section">
    <div class="auto-container">
        <div class="row clearfix">

            <!--Image Column-->
            <div class="image-column col-md-4 col-sm-12 col-xs-12">
                <div class="image">
                    <img src="<?php echo esc_url( $attach_img ); ?>" alt="<?php esc_attr_e('image', 'mindron');?>" />
                </div>
            </div>
            <!--Content Column-->
            <div class="content-column col-md-8 col-sm-12 col-xs-12">
                <div class="inner-column">
                    <div class="sec-title">
                        <h2><?php echo wp_kses_post( $title ); ?></h2>
                        <div class="text"><?php echo wp_kses_post( $heading ); ?></div>
                    </div>
                    <div class="text">
                        <p><?php echo wp_kses_post( $text ); ?></p>
                    </div>
                    <a href="<?php echo esc_url( $btn_link ); ?>" class="theme-btn btn-style-one"><?php echo wp_kses_post( $btn_title ); ?></a>
                </div>
            </div>

        </div>
    </div>
</section>