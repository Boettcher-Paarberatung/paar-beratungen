<?php
$query_args = array('post_type' => 'bunch_team' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
if( $cat ) $query_args['team_category'] = $cat;
$query = new WP_Query( $query_args );
if ( $query->have_posts() ) :
?>

<section class="doctor-section-two <?php if ( ! $white_bg ) : ?>grey-bg<?php endif; ?>">
    <div class="auto-container">
        <div class="sec-title">
            <h2><?php echo wp_kses_post( $title ); ?></h2>
            <div class="text"><?php echo wp_kses_post( $text ); ?></div>
        </div>
        <div class="row clearfix">
            
            <?php while ( $query->have_posts() ) : $query->the_post();
                $team_meta = _WSH()->get_meta();
                global $post;
            ?>
            
                <div class="doctor-block col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="inner-box">
                    <div class="image">
                        <?php the_post_thumbnail('mindron_270x236', array('class' => 'img-responsive'));?>
                        <div class="overlay-box">
                            <?php if ( $socials = mindron_set( $team_meta, 'bunch_team_social' ) ) : ?>
                                <ul class="social-icon-two">
                                    <?php foreach($socials as $key => $value):?>
                                        <li><a href="<?php echo esc_url(mindron_set($value, 'social_link'));?>"><span class="fa <?php echo esc_attr(mindron_set($value, 'social_icon'));?>"></span></a></li>
                                    <?php endforeach;?>
                                </ul>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="lower-box">
                        <h3><a href="<?php echo esc_url(mindron_set($team_meta, 'team_link'));?>"><?php the_title(); ?></a></h3>
                        <div class="designation"><?php echo wp_kses_post(mindron_set($team_meta, 'designation'));?></div>
                    </div>
                </div>
            </div>

            <?php endwhile; ?>
            
        </div>
    </div>
</section>

<?php endif;
wp_reset_postdata();