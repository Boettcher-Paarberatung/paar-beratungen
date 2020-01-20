<?php $upload_img = ( $upload_img ) ? $upload_img : get_template_directory_uri() . '/images/resource/clinic-1.jpg'; ?>
<section class="fluid-section-one">
    <div class="outer-container clearfix">
        
        <div class="image-column" style="background-image:url(<?php echo esc_url( $upload_img ); ?>);">
            <figure class="image-box"><img src="<?php echo esc_url( $upload_img ); ?>" alt="<?php esc_attr_e('image', 'mindron');?>"></figure>
        </div>

        <div class="content-column">
            <div class="inner-box">
                
                <?php foreach ( $choose_us as $choose ) :  ?>

                    <div class="featured-block-two">
                        <div class="inner">
                            <div class="icon-box">
                                <span class="icon <?php echo esc_attr( $choose->icons ); ?>"></span>
                            </div>
                            <h3><?php echo wp_kses_post( $choose->title1 ); ?></h3>
                            <div class="text"><?php echo wp_kses_post( $choose->text ); ?></div>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>
        
    </div>
</section>