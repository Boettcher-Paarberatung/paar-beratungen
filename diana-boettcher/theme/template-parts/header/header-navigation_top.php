<nav class="navbar navbar-fixed-top navbar-contact">
  <div class="container">
    <ul class="nav navbar-nav">
      <a class="navbar-brand" href="<?php echo home_url(); ?>">
        <?php bloginfo('name'); ?>
      </a>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="appointment">
        <span><?php echo do_shortcode('[latepoint_book_button caption="Termin vereinbaren"]') ?></span>
      </li>
      <li class="phone">
        <a href="tel:<?php echo get_theme_mod('navigation_phone'); ?>">
          <span><?php echo get_theme_mod('navigation_phone'); ?></span>
        </a>
      </li>
    </ul>
  </div><!-- /.container-fluid -->
</nav>
