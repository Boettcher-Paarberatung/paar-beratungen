<?php $bg_img = ( $bg_img ) ? $bg_img : get_template_directory_uri() .'/images/background/2.jpg';
$query_args = array('post_type' => 'bunch_testimonials' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
if( $cat ) $query_args['testimonials_category'] = $cat;
$query = new WP_Query( $query_args );
if ( $query->have_posts() ) :
?>
<section class="testimonial-section">
    <div class="upper-box" style="background-image:url(<?php echo esc_url( $bg_img ); ?>)">
        <div class="auto-container">
            <div class="title-box">
                <h2><?php echo wp_kses_post( $title ); ?></h2>
                <div class="title"><?php echo wp_kses_post( $subtitle ); ?></div>
            </div>
        </div>
    </div>
    <div class="testimonial-blocks">
        <div class="auto-container">
            <div class="testimonial-carousel owl-carousel owl-theme">
                <?php while ( $query->have_posts() ) : $query->the_post();
                        $testimonials_meta = _WSH()->get_meta();
                        global $post; ?>
                
                    <!--Testimonial Block-->
                    <div class="testimonial-block">
                        <div class="inner-box">
                            <div class="content">
                                <div class="image">
                                    <?php the_post_thumbnail('mindron_65x66', array('class' => 'img-responsive'));?>
                                </div>
                                <h3><?php the_title(); ?></h3>
                                <div class="title"><?php echo wp_kses_post( mindron_set( $testimonials_meta, 'designation' ) ); ?></div>
                                <div class="text"><?php echo wp_trim_words( get_the_content(), $text_limit ); ?></div>
                            </div>
                        </div>
                    </div>
                
                <?php endwhile; ?>

            </div>
        </div>
    </div>
</section>

<?php endif;
wp_reset_postdata();