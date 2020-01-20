<!--Sidebar Page Container-->
<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">

            <!--Sidebar Side-->
            <div class="sidebar-side col-lg-3 col-md-4 col-sm-12 col-xs-12">
                <aside class="sidebar">
                    
                    <?php if ( is_active_sidebar( $sidebar_slug ) ) : ?>

                        <?php dynamic_sidebar( $sidebar_slug ); ?>

                    <?php endif; ?>

                </aside>
            </div>

            <!--Content Side / Our Blog-->
            <div class="content-side col-lg-9 col-md-8 col-sm-12 col-xs-12">
                <div class="services-single">
                    <div class="inner-box">
                        <div class="gallery-image">
                            <div class="row clearfix">
                                <!--Image Column-->
                                
                                <?php if ( $therapy_img ) : $count = 0;
                                        $therap_img = explode( ',', $therapy_img );
                                        foreach ( $therap_img as $images ) :
                                        if ( $count == 2 ) {
                                            $count = 0;
                                        }
                                        if ( $count == 0 ) {
                                            $class = 'col-md-8 col-sm-8 col-xs-12';
                                            $image_size = 'mindron_550x365';
                                        } else {
                                            $class = 'col-md-4 col-sm-4 col-xs-12';
                                            $image_size = 'mindron_260x361';
                                        }
                                ?>
                                    <div class="image-column <?php echo esc_attr( $class ); ?>">
                                        <div class="image">
                                            <?php echo wp_get_attachment_image( $images, $image_size, '', array( 'class' => 'img-responsive' ) ); ?>
                                        </div>
                                    </div>
                                
                                <?php $count++; endforeach; endif; ?>
                                
                            </div>
                        </div>
                        <h2><?php echo wp_kses_post( $therapy_title ); ?></h2>
                        <div class="text">
                            <p><?php echo wp_kses_post( $text ); ?></p>
                            <!--Two Column-->
                            <div class="two-column style-two row clearfix">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <h3><?php echo wp_kses_post( $benefits_title ); ?></h3>
                                    <p><?php echo wp_kses_post( $benefits_text ); ?></p>
                                    <?php  if ( $benefits_features ) : ?>
                                        <ul class="list-style-three">
                                            <?php $fearures = explode( "\n", ( $benefits_features ) ); ?>
                                              <?php foreach ( $fearures as $feature ) :?>
                                                  <li><?php echo wp_kses_post( $feature ); ?></li>
                                              <?php endforeach;?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                                <div class="image-column col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <div class="image">
                                        <img src="<?php echo esc_url( $benefits_img ); ?>" alt="<?php esc_attr_e('image', 'mindron');?>" />
                                    </div>
                                </div>
                            </div>

                            <!--Featured Blocks-->
                            <div class="featured-blocks">
                                <div class="clearfix">

                                    <?php foreach ( $add_services as $services ) :  ?>
                                    
                                        <div class="featured-block-three col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                            <div class="inner-box">
                                                <div class="icon-box">
                                                    <span class="icon <?php echo esc_attr( mindron_set( $services, 'services_icon' ) ); ?>"></span>
                                                </div>
                                                <h3><a href="<?php echo esc_url( mindron_set( $services, 'services_link' ) );  ?>"><?php echo wp_kses_post( mindron_set( $services, 'services_title' ) ); ?></a></h3>
                                                <div class="text"><?php echo wp_kses_post( mindron_set( $services, 'services_text' ) ); ?></div>
                                            </div>
                                        </div>
                                    
                                    <?php endforeach; ?>

                                </div>
                            </div>

                        </div>

                        <div class="row clearfix">

                            <div class="column col-md-6 col-sm-6 col-xs-12">
                                <h3><?php echo wp_kses_post( $choose_title ); ?></h3>
                                <div class="text">
                                    <p><?php echo wp_kses_post( $choose_text ); ?></p>
                                </div>
                                
                                <?php if ( $choose_features ) :  ?>
                                    <ul class="list-style-one no-margin">
                                        <?php $fearures1 = explode( "\n", ( $choose_features ) );?>
                                        <?php foreach ( $fearures1 as $feature1 ) : ?>
                                            <li><?php echo wp_kses_post( $feature1 ); ?></li>
                                        <?php endforeach;?>
                                    </ul>
                                <?php endif; ?>
                                        
                            </div>
                            <div class="column col-md-6 col-sm-6 col-xs-12">
                                <h3><?php echo wp_kses_post( $consult_title ); ?></h3>

                                <!-- Default Form -->
                                <div class="default-form">

                                    <!--Contact Form-->
                                    <?php echo do_shortcode( $consult_form );  ?>

                                </div>
                                <!--End Default Form --> 

                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!--End Sidebar Page Container-->