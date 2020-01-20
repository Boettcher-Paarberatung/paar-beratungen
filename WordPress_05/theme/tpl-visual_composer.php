<?php /* Template Name: King Composer Page */
	get_header() ;
	$meta = _WSH()->get_meta('_bunch_header_settings');
	$bg = (mindron_set($meta, 'header_img')) ? mindron_set($meta, 'header_img') : get_template_directory_uri().'/images/background/5.jpg';
	$title = mindron_set($meta, 'header_title');
?>
<?php if ( mindron_set( $meta, 'breadcrumb' ) ) : ?>

    <section class="page-title" <?php if( $bg ) : ?>style="background-image:url(<?php echo esc_url( $bg ); ?>);"<?php endif;?>>
    	<div class="auto-container">
        	<div class="clearfix">
            	<div class="pull-left">
                	<h1><?php if($title) echo wp_kses_post($title); else wp_title('');?></h1>
                </div>
                <div class="pull-right">
                    <?php echo wp_kses_post( mindron_get_the_breadcrumb() ); ?>
                </div>
            </div>
        </div>
    </section>

<?php endif;?>

<?php while( have_posts() ): the_post(); ?>
    <?php the_content(); ?>
<?php endwhile;  ?>
<?php get_footer() ; ?>