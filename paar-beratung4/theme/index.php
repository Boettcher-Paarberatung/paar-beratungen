<?php mindron_bunch_global_variable(); 
	$options = _WSH()->option();
	get_header(); 
	if( $wp_query->is_posts_page ) {
		$meta = _WSH()->get_meta('_bunch_layout_settings', get_queried_object()->ID);
		$meta1 = _WSH()->get_meta('_bunch_header_settings', get_queried_object()->ID);
		if(mindron_set($_GET, 'layout_style')) $layout = mindron_set($_GET, 'layout_style'); else
		$layout = mindron_set( $meta, 'layout', 'full' );
		$sidebar = mindron_set( $meta, 'sidebar', 'default-sidebar' );
		$bg = mindron_set($meta1, 'header_img');
		$title = mindron_set($meta1, 'header_title');
	} else {
		$settings  = _WSH()->option(); 
		if(mindron_set($_GET, 'layout_style')) $layout = mindron_set($_GET, 'layout_style'); else
		$layout = mindron_set( $settings, 'archive_page_layout', 'full' );
		$sidebar = mindron_set( $settings, 'archive_page_sidebar', 'default-sidebar' );
		$bg = mindron_set($settings, 'archive_page_header_img');
		$title = mindron_set($settings, 'archive_page_header_title');
	}
	$layout = mindron_set( $_GET, 'layout' ) ? mindron_set( $_GET, 'layout' ) : $layout;
    $layout = ( $layout ) ? $layout : 'full';
	$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
	_WSH()->page_settings = array('layout'=>'right', 'sidebar'=>$sidebar);
	$classes = ( !$layout || $layout == 'full' || mindron_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' content-side col-lg-9 col-md-8 col-sm-12 col-xs-12 ' ;
	?>
	<!--Page Title-->
    <section class="page-title" <?php if( $bg ) : ?>style="background-image:url(<?php echo esc_url( $bg ); ?>);"<?php endif;?>>
    	<div class="auto-container">
        	<div class="clearfix">
            	<div class="pull-left">
                	<h1><?php if ( $title ) echo wp_kses_post( $title ); else esc_html_e( 'Blog', 'mindron' ); ?></h1>
                </div>
            </div>
        </div>
    </section>
    
    <!--Sidebar Page-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                
                <!-- sidebar area -->
                <?php if( $layout == 'left' ): ?>
                    <?php if ( is_active_sidebar( $sidebar ) ) : ?>
                        <div class="sidebar-side col-lg-3 col-md-4 col-sm-12 col-xs-12">        
                            <aside class="sidebar default-sidebar">
                                <?php dynamic_sidebar( $sidebar ); ?>
                            </aside>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                
                <!--Content Side-->	
                <div class="<?php echo esc_attr($classes);?>">
                    
                    <!--Default Section-->
                    <div class="our-blog padding-right">

                        <!--Blog Post-->
                        <div class="thm-unit-test">
                        <?php while( have_posts() ): the_post();?>
                            <!-- blog post item -->
                            <!-- Post -->
                            <div id="post-<?php the_ID(); ?>" <?php post_class();?>>
                                <?php get_template_part( 'blog' ); ?>
                            <!-- blog post item -->
                            </div><!-- End Post -->
                        <?php endwhile;?>
						</div>
                        <!--Pagination-->
                        <?php mindron_the_pagination(); ?>

                    </div>
                </div>
                <!--Content Side-->
                
                <!--Sidebar-->	
                <!-- sidebar area -->
                <?php if( $layout == 'right' ): ?>
                    <?php if ( is_active_sidebar( $sidebar ) ) : ?>
                        <div class="sidebar-side col-lg-3 col-md-4 col-sm-12 col-xs-12">        
                            <aside class="sidebar default-sidebar">
                                <?php dynamic_sidebar( $sidebar ); ?>
                            </aside>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <!--Sidebar-->
            </div>
        </div>
    </div>
<?php get_footer(); ?>