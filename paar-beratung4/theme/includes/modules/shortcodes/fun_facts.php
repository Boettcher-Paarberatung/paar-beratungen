
<div class="fact-counter-section">
    <div class="fact-counter">
        <div class="auto-container">
            <div class="row clearfix">

                <?php foreach( $facts as $fact ) :   
                    $data_speed = ( $fact->data_speed ) ? $fact->data_speed : 2000;
                ?>
                    <!--Column-->
                    <div class="column counter-column col-md-3 col-sm-6 col-xs-12">
                        <div class="inner">
                            <div class="count-outer count-box">
                                <span class="count-text" data-speed="<?php echo esc_attr( $data_speed ); ?>" data-stop="<?php echo wp_kses_post( $fact->end_num ); ?>">0</span>
                            </div>
                            <h4 class="counter-title"><?php echo wp_kses_post( $fact->title ); ?></h4>
                        </div>
                    </div>
                <?php endforeach; ?>
                
            </div>
        </div>
    </div>
</div>