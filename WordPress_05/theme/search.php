<?php mindron_bunch_global_variable();
	$options = _WSH()->option();
	get_header(); 
	$settings  = _WSH()->option(); 
	if(mindron_set($_GET, 'layout_style')) $layout = mindron_set($_GET, 'layout_style'); else
	$layout = mindron_set( $settings, 'search_page_layout' );
    $layout = ( $layout ) ? $layout : 'full';
	$sidebar = mindron_set( $settings, 'search_page_sidebar' );
	_WSH()->page_settings = array('layout'=>$layout, 'sidebar'=>$sidebar);
    $sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
	if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
	$classes = ( !$layout || $layout == 'full' || mindron_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' content-side col-lg-9 col-md-8 col-sm-12 col-xs-12 ' ;
	$bg = mindron_set($settings, 'search_page_header_img');
	$title = mindron_set($settings, 'search_page_header_title');
?>
<!--Page Title-->
<section class="page-title" <?php if( $bg ) : ?>style="background-image:url(<?php echo esc_url( $bg ); ?>);"<?php endif;?>>
    <div class="auto-container">
        <div class="clearfix">
            <div class="pull-left">
                <h1><?php if ( $title ) echo wp_kses_post( $title ); else wp_title( '' ); ?></h1>
            </div>
            <div class="pull-right">
                <?php echo wp_kses_post( mindron_get_the_breadcrumb() ); ?>
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
            
            <?php if(have_posts()):?>
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
			<?php else : ?>
                <div class="<?php echo esc_attr($classes);?> blog_post_area eco-search">
                    <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'mindron' ); ?></p><br />
                    <div class="sidebar">
                    <?php get_search_form(); ?>
                    </div>
                </div>
			<?php endif; ?>
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