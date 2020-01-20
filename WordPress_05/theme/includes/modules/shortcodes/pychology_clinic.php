<section class="clinic-section style-two">
    <div class="auto-container">

        <div class="sec-title">
            <h2><?php echo wp_kses_post( $title ); ?></h2>
        </div>
        <div class="text"><?php echo wp_kses_post( $text ); ?> </div>
        <div class="row clearfix">

            <div class="column col-md-5 col-sm-6 col-xs-12">
                <ul class="list-style-one">
                    
                    <?php $count = 0; $fearures1 = explode( "\n", ( $features ) );
                        foreach( $fearures1 as $feature ) :
                        if ( $count == 7 ) {
                        $count = 0;
                        }
                        if ( $count == 4 ) :
                    ?>
                        </ul>
                    </div>

                    <div class="column col-md-5 col-sm-6 col-xs-12">
                        <ul class="list-style-one">

                    <?php endif; ?>

                        <li><?php echo wp_kses_post( $feature ); ?></li>
                    <?php $count++; endforeach;?>

                </ul>
            </div>
            

        </div>

    </div>
</section>