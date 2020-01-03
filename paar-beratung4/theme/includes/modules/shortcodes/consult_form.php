<!--Offer Section-->
<section class="offer-section">
    <div class="auto-container">
        <div class="content">
            <h2><?php echo wp_kses_post( $title ); ?></h2>
            <div class="text"><?php echo wp_kses_post( $subtitle ); ?></div>

            <!-- Offer Form -->
            <div class="offer-form">

                <?php echo do_shortcode( $consult_form );  ?>

            </div>
            <!--End Default Form --> 

        </div>
    </div>
</section>
<!--End Offer Section-->