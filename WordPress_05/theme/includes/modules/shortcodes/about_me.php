<!--About Me-->
<section class="about-me-section">
    <div class="auto-container">
        <div class="row clearfix">

            <!--Image Column-->
            <div class="image-column col-md-5 col-sm-12 col-xs-12">
                <?php if ( $upload_img ) : ?>
                    <div class="image">
                        <img src="<?php echo esc_url( $upload_img ); ?>" alt="<?php esc_attr_e('image', 'mindron');?>" />
                    </div>
                <?php endif; ?>
                <ul class="list-style-two">
                    
                    <?php if ( $phone ) : ?>
                        <li class="number">
                            <span class="icon fa fa-phone"></span>
                            <?php echo wp_kses_post( $phone ); ?>
                        </li>
                    <?php endif; ?>
                    
                    <?php if ( $email ) : ?>
                        <li>
                            <span class="icon fa fa-envelope-o"></span>
                            <?php echo sanitize_email( $email ); ?>
                        </li>
                    <?php endif; ?>
                    
                    <?php if ( $social_media ) : ?>
                        <li>
                            <a href="#" class="icon fa fa-share-alt"></a> 
                            <?php foreach ( $social_media as $media ) :  ?>
                                <a href="<?php echo esc_url( mindron_set( $media, 'permalink' ) ); ?>" class="social-icon fa <?php echo esc_attr( mindron_set( $media, 'icons' ) ); ?>"></a>
                            <?php endforeach; ?>
                        </li>
                    <?php endif; ?>
                    
                </ul>
            </div>
            <!--Content Column-->
            <div class="content-column col-md-7 col-sm-12 col-xs-12">
                <div class="inner-column">
                    <h2><?php echo wp_kses_post( $title ); ?></h2>
                    <div class="title"><?php echo wp_kses_post( $designation ); ?></div>
                    <div class="text">
                        <p><?php echo wp_kses_post( $text ); ?></p>
                        <h3><?php echo wp_kses_post( $heading ); ?></h3>
                        <p><?php echo wp_kses_post( $content ); ?></p>
                    </div>
                    <?php if ( $sign_img ) : ?>
                        <div class="signature">
                            <img src="<?php echo esc_url( $sign_img ); ?>" alt="<?php esc_attr_e('image', 'mindron');?>" />
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</section>
<!--End About Me-->