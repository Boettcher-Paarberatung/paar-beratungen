<!--Patient Section-->
<section class="patient-section">
    <div class="auto-container">
        <div class="row clearfix">

            <!--Offer Column-->
            <div class="offer-column col-lg-3 col-md-4 col-sm-12 col-xs-12">
                <div class="inner-column">
                    <h2><?php echo wp_kses_post( $offer_title ); ?></h2>
                    <div class="text"><?php echo wp_kses_post( $offer_text ); ?></div>
                    <a href="<?php echo esc_url( $btn_link ); ?>" class="theme-btn btn-style-three"><?php echo wp_kses_post( $btn_title ); ?></a>
                </div>
            </div>

            <!--Content Column-->
            <div class="content-column col-lg-9 col-md-8 col-sm-12 col-xs-12">
                <div class="inner-column">
                    <div class="sec-title">
                        <h2><?php echo wp_kses_post( $title ); ?></h2>
                    </div>
                    <div class="bold-text"><?php echo wp_kses_post( $subtitle ); ?></div>
                    <div class="text"><?php echo wp_kses_post( $text ); ?></div>
                    
                    <?php if ( $features ) : ?>
                        <ul class="list-style-one">
                            <?php $fearures = explode( "\n", ( $features ) );?>
                              <?php foreach( $fearures as $feature ) : ?>
                                <li><?php echo wp_kses_post( $feature ); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    
                    <?php if ( $add_btns ) : ?>
                        <div class="btns-box">
                            <?php foreach ( $add_btns as $btn ) : ?>
                                <a href="<?php echo esc_url( mindron_set( $btn, 'button_link' ) ); ?>" class="theme-btn btn-style-one"><?php echo wp_kses_post( mindron_set( $btn, 'button_title' ) ); ?></a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</section>
<!--End Patient Section-->