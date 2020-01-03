<?php
$video_img = ( $video_img ) ? $video_img : get_template_directory_uri() . '/images/resource/video.jpg';
$video_link = ( $video_link ) ? $video_link : 'https://www.youtube.com/watch?v=kxPCFljwJws';
?>
<section class="about-section">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Content Column-->
            <div class="content-column col-md-6 col-sm-12 col-xs-12">
                <div class="inner-column">
                    <div class="sec-title">
                        <h2><?php echo wp_kses_post( $title ); ?></h2>
                    </div>
                    <div class="text"><?php echo wp_kses_post( $text ); ?></div>
                    <div class="call"><?php esc_html_e( 'Just Call us. and', 'mindron' ); ?> <a href="<?php echo esc_url( $btn_link ); ?>"><?php echo wp_kses_post( $btn_title ); ?></a></div>
                    <div class="number"><strong><?php echo wp_kses_post( $phone_num ); ?></strong> <?php if ( $phone_num2 ) : ?><span class="or"><?php esc_html_e( 'or', 'mindron' ); ?></span> <strong><?php echo wp_kses_post( $phone_num2 ); ?></strong><?php endif; ?></div>
                </div>
            </div>
            <!--Video Column-->
            <div class="video-column col-md-6 col-sm-12 col-xs-12">
                <div class="inner-column">

                    <!--Video Box-->
                    <div class="video-box">
                        <figure class="image">
                            <img src="<?php echo esc_url( $video_img ); ?>" alt="<?php esc_attr_e('image', 'mindron');?>">
                        </figure>
                        <a href="<?php echo esc_url( $video_link ); ?>" class="lightbox-image overlay-box"><span class="flaticon-play-button-1"></span></a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>