<?php

function build_reviews($type){

  // hides user names
	ob_start();
	dynamic_sidebar($type);
	$reviews = ob_get_contents();
	ob_end_clean();

	$reviews = preg_replace('/<div class=\"wp-google-name\">(.*?)<\/div>/', '', $reviews);
	return $reviews;

}

?>
