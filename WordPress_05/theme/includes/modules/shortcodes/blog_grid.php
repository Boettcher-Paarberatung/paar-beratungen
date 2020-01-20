<?php
$paged = get_query_var('paged');
$query_args = array( 'showposts' => $num , 'order_by' => $sort , 'order' => $order, 'paged' => $paged );
if( $cat ) $query_args['category'] = $cat;
$query = new WP_Query($query_args) ; 
if ( $query->have_posts() ) :  ?>

<!--News Page Section-->
<div class="news-page-section">
    <div class="auto-container">
        <div class="inner-container">
            <div class="row clearfix">
                <?php while ( $query->have_posts() ) : $query->the_post();
                    $term_list = wp_get_post_terms( get_the_id(), 'category', array( "fields" => "names" ) );
                    global $post;
                ?>
                    <!--News Block Three-->
                    <div class="news-block-three style-two col-md-6 col-sm-6 col-xs-12">
                        <div class="inner-box">
                            <div class="image">
                                <a href="<?php echo esc_url(get_permalink(get_the_id()));?>">
                                    <?php the_post_thumbnail( 'mindron_570x360', array( 'class' => 'img-responsive' ) ); ?>
                                </a>
                            </div>
                            <div class="lower-content">
                                <div class="upper-box">
                                    <div class="posted-date"><?php echo get_the_date();?></div>
                                    <ul class="post-meta">
                                        <li><?php esc_html_e( 'By:', 'mindron' ); ?> <?php the_author(); ?></li>
                                        <li><?php echo implode( ', ', (array)$term_list );?></li>
                                        <li><?php comments_number( wp_kses_post(__('0 Comments' , 'mindron')), wp_kses_post(__('1 Comment' , 'mindron')), wp_kses_post(__('% Comments' , 'mindron'))); ?></li>
                                    </ul>
                                </div>
                                <div class="lower-box">
                                    <h3><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title(); ?></a></h3>
                                    <div class="text"><?php echo wp_trim_words( get_the_content(), $text_limit ); ?> </div>
                                    <a href="<?php echo esc_url(get_permalink(get_the_id()));?>" class="theme-btn btn-style-one read-more">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                
                <?php endwhile; ?>
                
            </div>
        </div>
        <!--Styled Pagination-->
        <?php mindron_the_blog_grid_pagination( array( 'total'=>$query->max_num_pages ) ); ?>
        <!--End Styled Pagination-->
    </div>
</div>
<!--End News Page Section-->

<?php endif;
wp_reset_postdata();