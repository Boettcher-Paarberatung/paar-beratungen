<?php
$query_args = array( 'post_type' => 'bunch_gallery', 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
if( $cat ) $query_args['gallery_category'] = $cat;
$query = new WP_Query($query_args) ; 
if ( $query->have_posts() ) :  ?>

<!--Gallry Page Section-->
<section class="gallery-page-section">
    <div class="auto-container">
        <div class="row clearfix">

            <?php 
                while ( $query->have_posts() ) : $query->the_post();
                $gallery_meta = _WSH()->get_meta();
                $ext_url = mindron_set( $gallery_meta, 'ext_url' );
                global $post;
                $post_thumbnail_id = get_post_thumbnail_id( $post->ID );
		        $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
            ?>
            
                <!--Gallery Item-->
                <div class="gallery-item col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <figure class="image-box">
                            <?php the_post_thumbnail( 'mindron_370x350', array( 'class' => 'img-responsive' ) ); ?>
                            <!--Overlay Box-->
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                    <div class="content">
                                        <a href="<?php echo esc_url( $post_thumbnail_url ); ?>" data-fancybox="images" data-caption="" class="link lightbox-image"><span class="icon flaticon-search-1"></span></a>
                                        <a href="<?php echo esc_url( $ext_url ); ?>" class="link"><span class="icon flaticon-unlink"></span></a>
                                    </div>
                                </div>
                            </div>
                        </figure>
                    </div>
                </div>

            <?php endwhile; ?>
            
        </div>
    </div>
</section>
<!--End Gallry Page Section-->


<?php endif;
wp_reset_postdata();