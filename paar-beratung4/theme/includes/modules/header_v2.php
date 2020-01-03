<?php 
$options = _WSH()->option();
$header_phone = mindron_set( $options, 'header_phone' );
$header_email = mindron_set( $options, 'header_email' );
$hide_search = mindron_set( $options, 'hide_search' );
$hide_appoint_btn = mindron_set( $options, 'hide_appoint_btn' );
$appointment_link = mindron_set( $options, 'appointment_link' );
?>
<!-- Main Header -->
<header class="main-header header-style-two">

    <!--Header-Upper-->
    <div class="header-upper">
        <div class="auto-container">
            <div class="inner-container clearfix">

                <div class="pull-left logo-outer">
                    <div class="logo">
                        <?php if(mindron_set($options, 'logo_image')):?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(mindron_set($options, 'logo_image'));?>" alt="<?php esc_attr_e('Mindron', 'mindron');?>" title="<?php esc_attr_e('Arctica', 'mindron');?>"></a>
                        <?php else:?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_template_directory_uri().'/images/logo.png');?>" alt="<?php esc_attr_e('Mindron', 'mindron');?>"></a>
                        <?php endif;?>
                    </div>
                </div>

                <div class="pull-right upper-right clearfix">

                    <!--Info Box-->
                    <div class="upper-column info-box">
                        <?php if ( $header_phone ) : ?>
                            <div class="icon-box"><span class="fa fa-phone"></span></div>
                            <ul>
                                <li><strong><?php echo wp_kses_post( $header_phone ); ?></strong></li>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <!--Info Box-->
                    <div class="upper-column info-box">
                        <?php if ( $header_email ) : ?>
                            <div class="icon-box"><span class="flaticon-note"></span></div>
                            <ul>
                                <li><?php echo sanitize_email( $header_email ); ?></li>
                            </ul>
                        <?php endif; ?>
                    </div>
                    <?php if ( ! $hide_appoint_btn ) : ?>
                        <!--Info Box-->
                        <div class="upper-column info-box">
                            <a href="<?php echo esc_url( $appointment_link );  ?>" class="theme-btn btn-style-one"><?php esc_html_e( 'Get Appointment', 'mindron' ); ?></a>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
    <!--End Header Upper-->

    <!--Header Lower-->
    <div class="header-lower">
        <div class="auto-container clearfix">
            <div class="nav-outer clearfix">
                <!-- Main Menu -->
                <nav class="main-menu">
                    <div class="navbar-header">
                        <!-- Toggle Button -->    	
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="navbar-collapse collapse clearfix" id="bs-example-navbar-collapse-1">
                        <ul class="navigation clearfix">
                            <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
                                'container_class'=>'navbar-collapse collapse navbar-right',
                                'menu_class'=>'nav navbar-nav',
                                'fallback_cb'=>false, 
                                'items_wrap' => '%3$s', 
								'depth' => 3,
                                'container'=>false,
                                'walker'=> new Bunch_Bootstrap_walker()  
                            ) ); ?>
                        </ul>
                    </div>
                </nav>
                <!-- Main Menu End-->

                <div class="outer-box">
                    <?php if ( ! $hide_search ) : ?>
                        <!-- Search -->
                        <div class="search-box">
                            <?php get_template_part('searchform2')?>
                        </div>
                    <?php endif; ?>
                </div>

            </div>

        </div>
    </div>
    <!--End Header Lower-->

    <!--Sticky Header-->
    <div class="sticky-header">
        <div class="auto-container clearfix">
            <!--Logo-->
            <div class="logo pull-left">
                <?php if(mindron_set($options, 'logo_image')):?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="img-responsive"><img src="<?php echo esc_url(mindron_set($options, 'logo_image'));?>" alt="<?php esc_attr_e('Mindron', 'mindron');?>" title="<?php esc_attr_e('Arctica', 'mindron');?>"></a>
                <?php else:?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="img-responsive"><img src="<?php echo esc_url(get_template_directory_uri().'/images/logo.png');?>" alt="<?php esc_attr_e('Mindron', 'mindron');?>"></a>
                <?php endif;?>
            </div>

            <?php if ( ! $hide_appoint_btn ) : ?>
                <!--Btn Outer-->
                <div class="btn-outer">
                    <a href="<?php echo esc_url( $appointment_link );  ?>" class="theme-btn btn-style-one"><?php esc_html_e( 'Get Appointment', 'mindron' ); ?></a>
                </div>
            <?php endif; ?>
            
            <!--Right Col-->
            <div class="right-col pull-right">
                <!-- Main Menu -->
                <nav class="main-menu">
                    <div class="navbar-header">
                        <!-- Toggle Button -->    	
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="navbar-collapse collapse clearfix">
                        <ul class="navigation clearfix">
                            <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
                                'container_class'=>'navbar-collapse collapse navbar-right',
                                'menu_class'=>'nav navbar-nav',
                                'fallback_cb'=>false, 
                                'items_wrap' => '%3$s', 
								'depth' => 3,
                                'container'=>false,
                                'walker'=> new Bunch_Bootstrap_walker()  
                            ) ); ?>
                         </ul>
                    </div>
                </nav><!-- Main Menu End-->
            </div>

        </div>
    </div>
    <!--End Sticky Header-->

</header>