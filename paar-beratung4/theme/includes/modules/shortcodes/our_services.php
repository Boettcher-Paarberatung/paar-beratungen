<?php
$query_args = array( 'post_type' => 'bunch_services' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order );
if( $cat ) $query_args['services_category'] = $cat;
$query = new WP_Query( $query_args ) ; 

?>

<?php if ( $query->have_posts() ) :  ?>

<!--Services Page Section-->
<section class="services-page-section">
    <div class="auto-container">
        <div class="sec-title">
            <h2><?php echo wp_kses_post( $title ); ?></h2>
            <div class="text"><?php echo wp_kses_post( $text ); ?></div>
        </div>
        <div class="row clearfix">
        
            <?php while($query->have_posts()): $query->the_post();
				 $services_meta = _WSH()->get_meta();
                 $ext_url = mindron_set( $services_meta, 'ext_url' );
                 global $post; 
            ?>
            
                <!--Services Block Two-->
                <div class="services-block-two col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image">
                            <?php the_post_thumbnail('mindron_270x219', array('class' => 'img-responsive'));?>
                            <a href="<?php echo esc_url( $ext_url ); ?>" class="overlay"></a>
                        </div>
                        <div class="lower-content">
                            <h3><a href="<?php echo esc_url( $ext_url ); ?>"><?php the_title(); ?></a></h3>
                            <div class="text"><?php echo wp_trim_words( get_the_content(), $text_limit ); ?></div>
                            <a href="<?php echo esc_url( $ext_url ); ?>" class="read-more">More details</a>
                        </div>
                    </div>
                </div>
            
            <?php endwhile; ?>
            
        </div>
    </div>
</section>
<!--End Services Page Section-->

<?php endif;

wp_reset_postdata();