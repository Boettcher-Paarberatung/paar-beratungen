<?php get_header();?>
<?php
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array(
  'posts_per_page' => 10,
  'paged'          => $paged
);

$the_query = new WP_Query( $args );
?>
<div class="container">
  <div class="row">

    <?php
      if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<p id="breadcrumbs">','</p>');
      }
    ?>

    <?php if(have_posts()) : ?>

      <div class="col-md-12">
        <h1>Blog</h1>

        <?php while (have_posts()) : the_post();?>
          <div class="col-md-12 blog-card">
            <div class="thumbnail col-md-3">
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail(array(512, 341)); ?>
              </a>
            </div>
            <div class="caption col-md-9">
  						<a class="title" href="<?php the_permalink(); ?>">
  							<?php the_title(); ?>
  						</a>
  						<p><?php the_excerpt(); ?></p>
  						<a class="link" href="<?php the_permalink(); ?>">
  							<?php echo get_theme_mod('frontpage_about_me_button'); ?>
  						</a>
  					</div>
          </div>
        <?php endwhile; ?>

      </div>

    <?php endif; ?>

    <div class="pagination">
      <?php
        echo paginate_links( array(
        	'base' => str_replace( 100, '%#%', esc_url( get_pagenum_link( 100 ) ) ),
        	'format' => '?paged=%#%',
        	'current' => max( 1, get_query_var('paged') ),
        	'total' => $wp_query->max_num_pages
        ) );
      ?>
    </div>

  </div>
</div>

<?php get_footer();?>
