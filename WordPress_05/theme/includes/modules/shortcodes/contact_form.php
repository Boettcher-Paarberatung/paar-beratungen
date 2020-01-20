<!--Contact Page Section-->
<section class="contact-page-section">
    <div class="auto-container">
        <div class="sec-title">
            <h2><?php echo wp_kses_post( $title ); ?></h2>
            <div class="text"><?php echo wp_kses_post( $text ); ?></div>
        </div>
        <div class="row clearfix">

            <!--Form Column-->
            <div class="form-column col-md-8 col-sm-12 col-xs-12">
                <div class="inner-column">
                    <!--Contact Form-->
                    <div class="contact-form">
                        <?php echo do_shortcode( $contact_form ); ?>
                    </div>
                    <!--Contact Form-->
                </div>
            </div>
            <!--Info Column-->
            <div class="info-column col-md-4 col-sm-12 col-xs-12">
                <div class="inner-column">
                    <ul class="contact-info-list">
                        <?php if ( $office_address ) : ?>
                            <li><span><?php esc_html_e( 'Address:', 'mindron' ); ?></span><?php echo wp_kses_post( $office_address ); ?></li>
                        <?php endif; ?>
                        <?php if ( $office_phone ) : ?>
                            <li><span><?php esc_html_e( 'Phone:', 'mindron' ); ?></span><?php echo wp_kses_post( $office_phone ); ?></li>
                        <?php endif; ?>
                        <?php if ( $office_email ) : ?>
                            <li><span><?php esc_html_e( 'email:', 'mindron' ); ?></span><?php echo sanitize_email( $office_email ); ?></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>
<!--End Contact Page Section-->