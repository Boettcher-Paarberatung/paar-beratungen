<?php 
$options = _WSH()->option();
$header_top = mindron_set( $options, 'header_top' );
$header_phone = mindron_set( $options, 'header_phone' );
$header_email = mindron_set( $options, 'header_email' );
$hide_search = mindron_set( $options, 'hide_search' );
$hide_appoint_btn = mindron_set( $options, 'hide_appoint_btn' );
$appointment_link = mindron_set( $options, 'appointment_link' );
?>
<header class="main-header">
    
    <!-- Header Top -->
    <?php if( $header_top ):?>
    <div class="header-top">
        <div class="auto-container">
            <div class="clearfix">

                <!--Top Left-->
                <div class="top-left">
                    <ul class="links clearfix">
                        <?php if ( $header_phone ) : ?>
                            <li>
                                <a href="#">
                                    <span class="icon fa fa-phone"></span><?php echo wp_kses_post( $header_phone ); ?>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if ( $header_email ) : ?>
                            <li>
                                <a href="#"><span class="icon flaticon-envelope"></span><?php echo sanitize_email( $header_email ); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>

                <!--Top Right-->
                <div class="top-right clearfix">
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
    <!-- Header Top End -->
    <?php endif; ?>

    <!-- Main Box -->
    <div class="main-box">
        <div class="auto-container">
            <div class="outer-container clearfix">
                <!--Logo Box-->
                <div class="logo-box">
                    <div class="logo">
                        <?php if(mindron_set($options, 'logo_image')):?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(mindron_set($options, 'logo_image'));?>" alt="<?php esc_attr_e('Mindron', 'mindron');?>" title="<?php esc_attr_e('Arctica', 'mindron');?>"></a>
                        <?php else:?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_template_directory_uri().'/images/logo.png');?>" alt="<?php esc_attr_e('Mindron', 'mindron');?>"></a>
                        <?php endif;?>
                    </div>
                </div>

                <?php if ( $hide_appoint_btn ) : ?>
                    <!--Btn Outer-->
                    <div class="btn-outer">
                        <a href="<?php echo esc_url( $appointment_link );  ?>" class="theme-btn btn-style-one"><?php esc_html_e( 'Get Appointment', 'mindron' ); ?></a>
                    </div>
                <?php endif; ?>
                <!--Nav Outer-->
                <div class="nav-outer clearfix">
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
                    </nav>
                    <!-- Main Menu End-->

                </div>
                <!--Nav Outer End-->

            </div>    
        </div>
        <div class="outer-bg"></div>
    </div>

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

            <?php if ( $hide_appoint_btn ) : ?>
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