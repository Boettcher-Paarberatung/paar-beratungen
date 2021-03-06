<?php
function jws_theme_autoCompileLess($inputFile, $outputFile) {
    require_once ( JWS_THEME_ABS_PATH_FR . '/inc/lessc.inc.php' );
    $jws_theme_options = $GLOBALS['jws_theme_options'];
    $less = new lessc();
    $less->setFormatter("classic");
    $less->setPreserveComments(true);
	
	/*----------------------------VARIABLES THEME OPTIONS---------------------------*/
    $lists_extra_font = array();
    for( $i = 1; $i < 5; $i++ ){
        $font_name = 'google-font-'.$i;
        // var_dump( $jws_theme_options );
        // var_dump( isset( $jws_theme_options[ $font_name ] ) );
        if( isset( jws_theme_get_option( $font_name, array() )['font-family'] ) ){
            $lists_extra_font[ 'jws_theme_'. str_replace('-','_', $font_name ) ] = jws_theme_get_option( $font_name )['font-family'];
        }
    }
    if( isset( jws_theme_get_option( 'jws_theme_body_font', array() )['font-family'] ) ){
        $lists_extra_font[ 'jws_theme_body_font' ] = jws_theme_get_option( 'jws_theme_body_font' )['font-family'];
    }
    /* Styling Options */
    $jws_theme_primary_color = jws_theme_get_option('jws_theme_primary_color','Monda');
    $jws_theme_common_color =  jws_theme_get_option('jws_theme_common_color');
    $jws_theme_common_color_2 = jws_theme_get_option('jws_theme_common_color_2');
	
	/*----------------------------VARIABLES THEME OPTIONS---------------------------*/
	
	
    $variables = array(
		
		/* Primary Color */
		"jws_theme_primary_color" => $jws_theme_primary_color,
		"jws_theme_common_color" => $jws_theme_common_color,
		"jws_theme_common_color_2" => $jws_theme_common_color_2,
        // "jws_theme_extra_font_1" => $jws_theme_extra_font_1
    );
    $variables = wp_parse_args( $lists_extra_font, $variables );
	
	
    $less->setVariables($variables);
    $cacheFile = $inputFile.".cache";
    if (file_exists($cacheFile)) {
            $cache = unserialize(file_get_contents($cacheFile));
    } else {
            $cache = $inputFile;
    }
    $newCache = $less->cachedCompile($inputFile);
    if (!is_array($cache) || $newCache["updated"] > $cache["updated"]) {
            file_put_contents($cacheFile, serialize($newCache));
            file_put_contents($outputFile, $newCache['compiled']);
    }
}
function jws_theme_addLessStyle() {
    try {
		$inputFile = JWS_THEME_ABS_PATH.'/assets/css/less/style.less';
		$outputFile = JWS_THEME_ABS_PATH.'/style.css';
		jws_theme_autoCompileLess($inputFile, $outputFile);
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }
}
add_action('wp_enqueue_scripts', 'jws_theme_addLessStyle');
/* End less*/