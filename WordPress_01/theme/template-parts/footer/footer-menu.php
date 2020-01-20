<footer>
  <div class="copyright">
	  <div class="container">
	  	<div class="row">
		    <div class="col-md-4">
		    	<h6>Quicklinks</h6>
					<?php
	      	$args = array(
	      		'theme_location' => 'footer',
	      	);
	      	wp_nav_menu($args);
					?>
				</div>
		    <div class="col-md-4">
		    	<h6>Legal</h6>
		    	<?php
	      	$args = array(
	      		'theme_location' => 'legal',
	      	);
	      	wp_nav_menu($args);
					?>
		    </div>
		    <div class="col-md-4 text-right">
          <h6>Languages</h6>
          <ul>
            <li><a href="https://www.diana-boettcher.de">Paartherapie Berlin Diana Boettcher</a></li>
            <li><a href="https://www.diana-boettcher.com">Couples Therapy Berlin Diana Boettcher</a></li>
          </ul>
          <p>© <?php echo date('Y'); ?> - <?php bloginfo('name'); ?></p>
		    </div>
	  	</div>
	  </div>
	</div>
</footer>
