<!--Experiance Section-->
<section class="experiance-section">
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
                    <div class="image">
                        <img src="<?php echo esc_url( $upload_img ); ?>" alt="<?php esc_attr_e('image', 'mindron');?>" />
                    </div>
                    <div class="lower-content">
                        <div class="sec-title">
                            <h2><?php echo wp_kses_post( $title ); ?></h2>
                        </div>
                        
                        <?php if ( $add_group ) : 
                            foreach ( $add_group as $grp ) :
                        ?>
                            <h3><?php echo wp_kses_post( mindron_set( $grp, 'group_title' ) ) ?> </h3>
                            <div class="text"><?php echo wp_kses_post( mindron_set( $grp, 'group_text' ) ) ?></div>
                        <?php endforeach; endif; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!--End Experiance Section-->