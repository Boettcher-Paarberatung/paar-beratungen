<?php mindron_bunch_global_variable(); 
	$options = _WSH()->option();
	get_header(); 
	$settings  = _WSH()->option(); 
	if(mindron_set($_GET, 'layout_style')) $layout = mindron_set($_GET, 'layout_style'); else
	$layout = mindron_set( $settings, 'author_page_layout' );
    $layout = ( $layout ) ? $layout : 'full';
	$sidebar = mindron_set( $settings, 'author_page_sidebar' );
    $sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
	$view = mindron_set( $settings, 'author_page_view', 'list' );
	_WSH()->page_settings = array('layout'=>$layout, 'sidebar'=>$sidebar);
	if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
	$classes = ( !$layout || $layout == 'full' || mindron_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' content-side col-lg-9 col-md-8 col-sm-12 col-xs-12 ' ;
	$bg = mindron_set($settings, 'author_page_header_img');
	$title = mindron_set($settings, 'author_page_header_title');
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