<?php 
$options = _WSH()->option();
$hide_footer = mindron_set( $options, 'hide_upper_footer' );
$hide_copyright = mindron_set( $options, 'hide_footer_copyright' );
?>
<!--Main Footer-->
    <div class="clearfix"></div>

    <?php if ( ! $hide_footer ) : ?>

        <footer class="main-footer">
		<div class="auto-container">
        	<!--Widgets Section-->
            
            <?php if ( is_active_sidebar( 'footer-sidebar' ) ) : ?>
                <div class="widgets-section">
                    <div class="row clearfix">
                        <?php dynamic_sidebar( 'footer-sidebar' ); ?>
                    </div>
                </div>
            <?php endif; ?>
            
            <?php if ( ! $hide_copyright ) : ?>
                <!--Footer Bottom-->
                <div class="footer-bottom">
                    <div class="clearfix">
                        <div class="pull-left">
                            <div class="copyright"><?php echo wp_kses_post( mindron_set( $options, 'footer_copyright' ) ); ?></div>
                        </div>
                        <div class="pull-right">
                            <div class="created"><?php echo wp_kses_post( mindron_set( $options, 'created_by' ) ); ?></div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
        </div>
        
    </footer>

    <?php endif; ?>    

</div>
<!--End pagewrapper-->

<?php if ( ! mindron_set( $options, 'hide_go_to_top' ) ) : ?>
    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="fa fa-arrow-up"></span></div>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>