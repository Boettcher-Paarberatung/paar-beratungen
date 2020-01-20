 <section class="clinic-section">
    <div class="clearfix">
        <!--Content Column-->
        <div class="content-column col-md-7 col-sm-12 col-xs-12">
            <div class="inner-column">
                <div class="sec-title">
                    <div class="title"><?php echo wp_kses_post( $title ); ?></div>
                    <h2><?php echo wp_kses_post( $heading ); ?></h2>
                </div>
                <div class="text"><?php echo wp_kses_post( $text ); ?> </div>
                <div class="row clearfix">

                    <div class="column col-md-6 col-sm-6 col-xs-12">
                        <ul class="list-style-one">

                            <?php $count = 0; $fearures1 = explode( "\n", ( $features ) );
                              foreach( $fearures1 as $feature ) :
                                if ( $count == 7 ) {
                                    $count = 0;
                                }
                                if ( $count == 4 ) :
                            ?>
                                </ul>
                            </div>

                            <div class="column col-md-6 col-sm-6 col-xs-12">
                                <ul class="list-style-one">

                            <?php endif; ?>

                                <li><?php echo wp_kses_post( $feature ); ?></li>
                            <?php $count++; endforeach;?>


                        </ul>
                    </div>

                </div>
                <a href="<?php echo esc_url( $btn_url ); ?>" class="theme-btn btn-style-one"><?php echo wp_kses_post( $btn_title ); ?></a>
            </div>
        </div>
        <!--Image Column-->
        <div class="image-column col-md-5 col-sm-12 col-xs-12">
            <div class="image">
                <img src="<?php echo esc_url( $attach_img ); ?>" alt="<?php esc_attr_e('image', 'mindron');?>" />
            </div>
        </div>
    </div>
</section>