<?php
$query_args = array('showposts' => $num , 'order_by' => $sort , 'order' => $order);
if( $cat ) $query_args['category'] = $cat;
$query = new WP_Query($query_args) ; 
if ( $query->have_posts() ) :  ?>

<section class="blog-section <?php if ( $remove_space ) : ?>style-two <?php endif; ?><?php if ( $add_top_space ) : ?>style-three<?php endif; ?>">
    <div class="auto-container">
        <div class="sec-title">
            <h2><?php echo wp_kses_post( $title ); ?></h2>
        </div>
        <div class="row clearfix">

            <div class="column col-md-4 col-sm-12 col-xs-12">
                <div class="sidebar-news">
                    <!--News Block-->
                    <?php while ( $query->have_posts() ) : $query->the_post();
                    global $post; ?>
                    
                        <div class="news-block">
                            <div class="inner-box">
                                <div class="post-date"><?php echo get_the_date(  ); ?></div>
                                <h3><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title(); ?></a></h3>
                            </div>
                        </div>
                    <?php endwhile; ?>

                </div>
            </div>
            
            <div class="column col-md-8 col-sm-12 col-xs-12">
                <div class="row clearfix">

                    <!--News Block Two-->
                    <?php while ( $query->have_posts() ) : $query->the_post();
                    global $post; ?>
                        <div class="news-block-two col-md-6 col-sm-6 col-xs-12">
                            <div class="inner-box">
                                <div class="image">
                                    <a href="<?php echo esc_url(get_permalink(get_the_id()));?>">
                                        <?php the_post_thumbnail('mindron_370x214', array('class' => 'img-responsive'));?>
                                    </a>
                                </div>
                                <div class="lower-content">
                                    <div class="post-date"><?php echo get_the_date(  ); ?></div>
                                    <h3><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title(); ?></a></h3>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>

                </div>
            </div>

        </div>
    </div>
</section>

<?php endif;
wp_reset_postdata();