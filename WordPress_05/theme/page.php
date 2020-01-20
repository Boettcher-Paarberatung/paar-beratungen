<?php $options = _WSH()->option();
	get_header();
	$settings  = mindron_set(mindron_set(get_post_meta(get_the_ID(), 'bunch_page_meta', true) , 'bunch_page_options') , 0);
	$meta = _WSH()->get_meta('_bunch_layout_settings');
	$meta1 = _WSH()->get_meta('_bunch_header_settings');
	if(mindron_set($_GET, 'layout_style')) $layout = mindron_set($_GET, 'layout_style'); else
	$layout = mindron_set( $meta, 'layout' );
    $layout = ( $layout ) ? $layout : 'full';
	$sidebar = mindron_set( $meta, 'sidebar' );
    $sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
	$classes = ( !$layout || $layout == 'full' || mindron_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' content-side col-lg-9 col-md-8 col-sm-12 col-xs-12 ' ;
	$bg = mindron_set($meta, 'header_img');
	$title = mindron_set($meta, 'header_title');
?>

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
                <div class="our-blog <?php if( $layout == 'right' ) echo " padding-right"; ?>">
                    <!--Blog Post-->
                    <div class="thm-unit-test">
						<?php while( have_posts() ): the_post();?>
                            <!-- blog post item -->
                            <?php the_content(); ?>
                            <div class="clearfix"></div>
                            <?php comments_template(); ?><!-- end comments -->
                            <br><br>
                            <?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'mindron'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
                        
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