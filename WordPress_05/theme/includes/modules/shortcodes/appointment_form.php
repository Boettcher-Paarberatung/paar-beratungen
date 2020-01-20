<?php $bg_img = ( $bg_img ) ? $bg_img : get_template_directory_uri() . '/images/background/3.jpg' ?>
<section class="appointment-section" style="background-image:url(<?php echo esc_url( $bg_img ); ?>);">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Content Column-->
            <div class="content-column col-md-5 col-sm-12 col-xs-12">
                <div class="inner-column">
                    <h2><?php echo wp_kses_post( $title ); ?></h2>
                    <div class="text"><?php echo wp_kses_post( $text ); ?></div>
                </div>
            </div>
            <!--Form Column-->
            <div class="form-column col-md-7 col-sm-12 col-xs-12">
                <div class="inner-column">

                    <!-- Default Form -->
                    <div class="default-form">

                        <!--Contact Form-->
                        <?php echo do_shortcode($contact_form);?> 

                    </div>
                    <!--End Default Form --> 

                </div>
            </div>
        </div>
    </div>
</section>