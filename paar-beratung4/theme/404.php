<?php
$options = _WSH()->option();
    get_header(); 
?>

<!--Error Section-->
<section class="error-section" style="background-image:url(<?php if(mindron_set( $options, '404_page_bg' )) echo esc_url( mindron_set( $options, '404_page_bg' ) ); else echo esc_url(get_template_directory_uri(). '/images/background/4.jpg'); ?>)">
    <div class="auto-container">
        <div class="content">
            <h1><?php if( mindron_set( $options, '404_page_title' ) ) echo wp_kses_post( mindron_set( $options, '404_page_title' ) ); else esc_attr_e('404', 'mindron'); ?></h1>
            <h2><?php if( mindron_set( $options, '404_page_heading' ) ) echo wp_kses_post( mindron_set( $options, '404_page_heading' ) ); else esc_attr_e('Oops! That page can’t be found', 'mindron'); ?></h2>
            <div class="text"><?php if( mindron_set( $options, '404_page_text' ) ) echo wp_kses_post( mindron_set( $options, '404_page_text' ) ); else esc_attr_e('Sorry, but the page you are looking for does not existing', 'mindron'); ?></div>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="theme-btn btn-style-one"><?php if( mindron_set( $options, '404_button_title' ) ) echo wp_kses_post( mindron_set( $options, '404_button_title' ) ); else esc_attr_e('Go to home page', 'mindron') ?></a>
        </div>
    </div>
</section>
<!--End Error Section--> 

<?php get_footer(); ?>