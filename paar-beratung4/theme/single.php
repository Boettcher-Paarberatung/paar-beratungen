<?php $options = _WSH()->option();
	get_header(); 
	$settings  = mindron_set(mindron_set(get_post_meta(get_the_ID(), 'bunch_page_meta', true) , 'bunch_page_options') , 0);
	$meta = _WSH()->get_meta('_bunch_layout_settings');
	$meta1 = _WSH()->get_meta('_bunch_header_settings');
	$meta2 = _WSH()->get_meta();
	_WSH()->page_settings = $meta;
	if(mindron_set($_GET, 'layout_style')) $layout = mindron_set($_GET, 'layout_style'); else
	$layout = mindron_set( $meta, 'layout' );
	if( !$layout || $layout == 'full' || mindron_set($_GET, 'layout_style')=='full' ) $sidebar = ''; else
	$sidebar = mindron_set( $meta, 'sidebar' );
    $sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
    $layout = ( $layout ) ? $layout : 'full';
	$classes = ( !$layout || $layout == 'full' || mindron_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' content-side col-lg-9 col-md-8 col-sm-12 col-xs-12 ' ;
	/** Update the post views counter */
	_WSH()->post_views( true );
	$bg = mindron_set($meta1, 'header_img');
	$title = mindron_set($meta1, 'header_title');
?>
<!--Page Title-->
<section class="page-title" <?php if( $bg ) : ?>style="background-image:url(<?php echo esc_url( $bg ); ?>);"<?php endif;?>>
    <div class="auto-container">
        <div class="clearfix">
            <div class="pull-left">
                <h1><?php if($title) echo wp_kses_post($title); else wp_title('');?></h1>
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
            <div class="<?php echo esc_attr( $classes ); ?>">
                
                <!--Default Section-->
                <div class="blog-single <?php if( $layout == 'right' ) echo " padding-right"; ?>">
                    <div class="thm-unit-test">
					<?php while( have_posts() ): the_post(); 
						$post_meta = _WSH()->get_meta();
                        $term_list = wp_get_post_terms( get_the_id(), 'category', array( "fields" => "names" ) );
					?>
                        <!--Blog Post-->
                        <div class="news-block-three">
                            <div class="inner-box">
                                <?php if(has_post_thumbnail()):?>
                                <div class="image">
                                    <?php the_post_thumbnail( 'mindron_1170x460', array( 'class' => 'img-responsive' ) );  ?>
                                </div>
                                <?php endif;?>
                                <div class="lower-content">
                                    <div class="upper-box clearfix">
                                        <div class="posted-date pull-left"><?php echo get_the_date();?></div>
                                        <ul class="post-meta pull-right">
                                            <li><?php esc_html_e( 'By:', 'mindron' ); ?> <?php the_author(); ?></li>
                                            <li><?php echo implode( ', ', (array)$term_list );?></li>
                                            <li><?php comments_number( wp_kses_post(__('0 Comments' , 'mindron')), wp_kses_post(__('1 Comment' , 'mindron')), wp_kses_post(__('% Comments' , 'mindron'))); ?></li>
                                        </ul>
                                    </div>
                                    <div class="lower-box">
                                        <div class="text">
                                            <?php the_content(); ?>
                                            <?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'mindron'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
                                            <div class="clearfix"></div><br>
                                            <?php the_tags('<span class="tag"> Tags: ', ', ', '</span>'); ?>
										</div>
                                    </div>
                                </div>
                                <!--Posts Nav-->
                                <div class="posts-nav">
                                    <div class="clearfix">
                                        <div class="pull-left">
                                            <?php previous_post_link('%link','<div class="prev-post"><span class="fa fa-long-arrow-left"></span> &nbsp;&nbsp;&nbsp; Prev Post</div>'); ?>
                                        </div>
                                        <div class="pull-right">
                                            <?php next_post_link('%link','<div class="next-post">Next Post &nbsp;&nbsp;&nbsp; <span class="fa fa-long-arrow-right"></span> </div>'); ?>
                                        </div>                                
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        <!-- comment area -->
		            	<?php comments_template(); ?><!-- end comments -->    
                    <?php endwhile;?>
                    </div>
                </div>
            </div>
            <!--Content Side-->
            
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
        </div>
    </div>
</div>

<?php get_footer(); ?>