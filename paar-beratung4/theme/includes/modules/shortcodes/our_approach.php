<!--Approach Section-->
<section class="approach-section">
    <div class="auto-container">
        <div class="inner-container">

            <div class="row clearfix">

                <!--Title Column-->
                <div class="title-column col-md-4 col-sm-12 col-xs-12">
                    <div class="sec-title">
                        <h2><?php echo wp_kses_post( $heading );  ?></h2>
                    </div>
                </div>
                <div class="content-column col-md-8 col-sm-12 col-xs-12">
                    <div class="approach-title"><?php echo wp_kses_post( $title );  ?></div>
                    <div class="bold-text"><?php echo wp_kses_post( $bold_text );  ?></div>
                    <div class="text">
                        <?php echo wp_kses_post( $text );  ?>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
<!--End Approach Section-->