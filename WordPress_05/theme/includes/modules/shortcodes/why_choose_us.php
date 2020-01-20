<?php $upload_img = ( $upload_img ) ? $upload_img : get_template_directory_uri() . '/images/resource/clinic-1.jpg'; ?>
<section class="choose-section <?php if ( $remove_space ) : ?>style-two <?php endif; ?>">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <!--Image Column-->
            <div class="image-column col-md-5 col-sm-12 col-xs-12">
                <div class="image">
                    <img src="<?php echo esc_url( $upload_img ); ?>" alt="<?php esc_attr_e('image', 'mindron');?>" />
                </div>
            </div>
            <!--Image Column-->
            <div class="content-column col-md-7 col-sm-12 col-xs-12">
                <div class="inner-column">
                    <?php if ( $title ) : ?>
                        <div class="sec-title light">
                            <h2><?php echo wp_kses_post( $title ); ?></h2>
                        </div>
                    <?php endif; ?>
                    <?php foreach ( $choose_us as $choose ) :  ?>

                        <div class="featured-block">
                            <div class="inner-box">
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
    </div>
</section>