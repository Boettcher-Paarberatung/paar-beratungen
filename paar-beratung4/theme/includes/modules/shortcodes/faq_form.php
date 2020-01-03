<!--Faq Form Section-->
<section class="faq-form-section">
    <div class="auto-container">
        <div class="sec-title">
            <h2><?php echo wp_kses_post( $title ); ?></h2>
        </div>
        <!--Form Outer-->
        <div class="form-outer">
            <!--Faq Form-->
            <div class="faq-form-box">
                
                <?php echo do_shortcode( $faq_form );  ?>
                
            </div>
            <!--End Faq Form-->
        </div>

    </div>
</section>