<!--Sidebar Page Container-->
<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">
            
            <div class="sidebar-side col-lg-3 col-md-4 col-sm-12 col-xs-12">
                <aside class="sidebar">

                    <!--Sidebar Side-->
                    <?php if ( is_active_sidebar( $sidebar_slug ) ) : ?>

                        <?php dynamic_sidebar( $sidebar_slug ); ?>

                    <?php endif; ?>
                    
                </aside>
            </div>

            <!--Content Side / Our Blog-->
            <div class="content-side col-lg-9 col-md-8 col-sm-12 col-xs-12">
                <div class="services-single">
                    <div class="inner-box">
                        <div class="image">
                            <img src="<?php echo esc_url( $therapy_img ); ?>" alt="<?php esc_attr_e('image', 'mindron');?>" />
                        </div>
                        <h2><?php echo wp_kses_post( $therapy_title ); ?></h2>
                        <div class="text">
                            <p><?php echo wp_kses_post( $text ); ?></p>
                            <!--Two Column-->
                            <div class="two-column row clearfix">
                                <div class="image-column col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <div class="image">
                                        <img src="<?php echo esc_url( $benefits_img ); ?>" alt="<?php esc_attr_e('image', 'mindron');?>" />
                                    </div>
                                </div>
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

                            <h3><?php echo wp_kses_post( $choose_title ); ?></h3>
                            <p><?php echo wp_kses_post( $choose_text ); ?></p>
                        </div>

                        <div class="row clearfix">

                            <?php if ( $choose_features ) : $count = 0; ?>
                            <div class="column col-md-6 col-sm-6 col-xs-12">
                                <ul class="list-style-one no-margin">
                            <?php
                                $fearures1 = explode( "\n", ( $choose_features ) );
                                foreach ( $fearures1 as $feature1 ) :
                                    if ( $count == 8 ) {
                                        $count = 0;
                                    }
                                    if( $count == 4 ) :
                            ?>
                                </ul>
                            </div>
                            
                            <div class="column col-md-6 col-sm-6 col-xs-12">
                                <ul class="list-style-one no-margin">
                                    
                            <?php endif; ?>
                                
                                    <li><?php echo wp_kses_post( $feature1 ); ?> </li>
                                
                            <?php $count++; endforeach; ?>
                                    
                                    </ul>
                                </div>
                            
                            <?php endif; ?>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!--End Sidebar Page Container-->