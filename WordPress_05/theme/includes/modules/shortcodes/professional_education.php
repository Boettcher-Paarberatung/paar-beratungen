<!--Education Section-->
<section class="education-section grey-bg">
    <div class="auto-container">
        <div class="sec-title">
            <h2><?php echo wp_kses_post( $title ); ?></h2>
        </div>
        <div class="row clearfix">

            <div class="column col-md-6 col-sm-12 col-xs-12">
                
                <?php $count = 0; if ( $edu_info ) :
                    foreach ( $edu_info as $info ) :
                
                    if ( $count == 6 ) {
                        $count = 0;
                    }
                
                    if ( $count == 3 ) :
                ?>
                
                        </div>
                    <div class="column col-md-6 col-sm-12 col-xs-12">
                    
                <?php endif; ?>
                        
                <!--Year Block-->
                <div class="year-block">
                    <div class="inner-box">
                        <span class="year"><?php echo wp_kses_post( mindron_set( $info, 'year' ) ); ?></span>
                        <h4><?php echo wp_kses_post( mindron_set( $info, 'title1' ) ); ?></h4>
                        <div class="year-text"><?php echo wp_kses_post( mindron_set( $info, 'text' ) ); ?></div>
                    </div>
                </div>
                
                <?php $count++; endforeach; endif; ?>    

            </div>

        </div>
    </div>
</section>
<!--End Education Section-->