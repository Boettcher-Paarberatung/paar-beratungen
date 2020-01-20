<?php /* Template Name: Comming Soon Page */
	$options = _WSH()->option();
	get_header('comming-soon') ;
	$bg = (mindron_set( $options, 'cs_section_img' ) ) ? mindron_set( $options, 'cs_section_img' ) : get_template_directory_uri().'/images/background/6.jpg';
	$title = mindron_set($options, 'cs_section_title');
	$count = mindron_set($options, 'cs_section_count');
	$text = mindron_set($options, 'cs_section_text');
	$id = mindron_set($options, 'cs_id');
?>

<section class="comming-soon" style="background-image:url('<?php echo esc_url($bg);?>')">
    <div class="auto-container">
        <div class="content">
            <div class="content-inner">
                <h2><?php if($title) echo wp_kses_post($title); else esc_html_e('We are Coming Soon...', 'mindron');?></h2>
                <div class="time-counter"><div class="time-countdown clearfix" data-countdown="<?php if($count) echo esc_attr($count); else esc_html_e('2018/8/17', 'mindron');?>"></div></div>
                <div class="text"><?php if($text): echo wp_kses_post($text); else : esc_html_e('Website is under construction. We will be here soon with new', 'mindron');?> <br> <?php esc_html_e('awesome site, Subscribe to be notified.', 'mindron'); endif;?> </div>
                <!--Emailed Form-->
                <div class="emailed-form">
                    <form method="post" action="http://feedburner.google.com/fb/a/mailverify" accept-charset="utf-8" id="subscribe2" name="mc-embedded-subscribe-form" novalidate>
                        <div class="form-group">
                            <input type="email" name="email" id="newsletter_input2" value="" placeholder="<?php esc_attr_e('Enter your email address', 'mindron');?>" required>
                            <input type="hidden" id="uri2" name="uri" value="<?php echo wp_kses_post($id); ?>">
			  				<input type="hidden" value="en_US" name="loc">
                            <button type="submit" class="theme-btn"><?php esc_html_e('Subscribe now', 'mindron');?></button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</section>

<?php while( have_posts() ): the_post(); ?>
    <?php the_content(); ?>
<?php endwhile;  ?>
<?php get_footer('comming-soon') ; ?>