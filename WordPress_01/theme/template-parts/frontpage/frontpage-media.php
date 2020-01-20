<div class="label-container col-lg-2 col-md-2 col-sm-4 col-xs-6">
  <small>Bekannt aus</small>
</div>
<div class="media-row">
  <?php for($x = 1; $x <= 4; $x++){ ?>
    <div class="img-container col-lg-2 col-md-2 col-sm-4 col-xs-6">
      <img class="img-responsive"
      src="<?php echo get_theme_mod('frontpage_media_image'.$x); ?>">
    </div>
  <?php } ?>
</div>
<div class="press-container col-lg-2 col-md-2 col-sm-4 col-xs-6">
  <?php $post = get_post('1628'); ?>
  <a href="/<?php echo $post -> post_name; ?>/" class="link"><?php echo $post -> post_title; ?></a>
</div>
