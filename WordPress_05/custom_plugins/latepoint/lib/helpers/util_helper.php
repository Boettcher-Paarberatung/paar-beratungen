<?php 

class OsUtilHelper {


  public static function group_array_by($array, $key) {
    $return = array();
    foreach($array as $val) {
      $return[$val[$key]][] = $val;
    }
    return $return;
  }


  public static function get_weekday_numbers(){
    return array(1,2,3,4,5,6,7);
  }

  public static function is_valid_email($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL);
  }

  public static function merge_default_atts($defaults = [], $settings = []){
    return array_merge($defaults, array_intersect_key($settings, $defaults));
  }

  public static function random_text( $type = 'nozero', $length = 6 ){
    switch ( $type ) {
      case 'nozero':
        $pool = '123456789';
        break;
      case 'alnum':
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        break;
      case 'alpha':
        $pool = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        break;
      case 'hexdec':
        $pool = '0123456789abcdef';
        break;
      case 'numeric':
        $pool = '0123456789';
        break;
      case 'distinct':
        $pool = '2345679ACDEFHJKLMNPRSTUVWXYZ';
        break;
      default:
        $pool = (string) $type;
        break;
    }


    $crypto_rand_secure = function ( $min, $max ) {
      $range = $max - $min;
      if ( $range < 0 ) return $min; // not so random...
      $log    = log( $range, 2 );
      $bytes  = (int) ( $log / 8 ) + 1; // length in bytes
      $bits   = (int) $log + 1; // length in bits
      $filter = (int) ( 1 << $bits ) - 1; // set all lower bits to 1
      do {
        $rnd = hexdec( bin2hex( openssl_random_pseudo_bytes( $bytes ) ) );
        $rnd = $rnd & $filter; // discard irrelevant bits
      } while ( $rnd >= $range );
      return $min + $rnd;
    };

    $token = "";
    $max   = strlen( $pool );
    for ( $i = 0; $i < $length; $i++ ) {
      $token .= $pool[$crypto_rand_secure( 0, $max )];
    }
    return $token;
  }


  public static function get_month_name_by_number($month_number, $short = false){
    $month_names = [__('January', 'latepoint'),
                    __('February', 'latepoint'),
                    __('March', 'latepoint'),
                    __('April', 'latepoint'),
                    __('May', 'latepoint'),
                    __('June', 'latepoint'),
                    __('July', 'latepoint'),
                    __('August', 'latepoint'),
                    __('September', 'latepoint'),
                    __('October', 'latepoint'),
                    __('November', 'latepoint'),
                    __('December', 'latepoint')];
    $month_name = isset($month_names[$month_number - 1]) ? $month_names[$month_number - 1] : 'n/a';
    if($short) $month_name = substr($month_name, 0, 3);
    return $month_name;
  }

  public static function get_months_for_select(){
    $months = [];
    for($i = 1; $i<= 12; $i++){
      $months[] = ['label' => self::get_month_name_by_number($i), 'value' => $i];
    }
    return $months;
  }

  public static function get_weekday_name_by_number($weekday_number, $short = false){
    $weekday_names = [__('Monday', 'latepoint'),
                      __('Tuesday', 'latepoint'),
                      __('Wednesday', 'latepoint'),
                      __('Thursday', 'latepoint'),
                      __('Friday', 'latepoint'),
                      __('Saturday', 'latepoint'),
                      __('Sunday', 'latepoint')];
    $weekday_name = isset($weekday_names[$weekday_number - 1]) ? $weekday_names[$weekday_number - 1] : 'n/a';
    if($short) $weekday_name = substr($weekday_name, 0, 3);
    return $weekday_name;
  }

  // Checks if array is associative
  public static function is_array_a($array){
    return count(array_filter(array_keys($array), 'is_string')) > 0;
  }

  public static function is_phone_formatting_disabled(){
    return OsSettingsHelper::is_on('disable_phone_formatting');
  }

	public static function format_phone($number){
    if(OsUtilHelper::is_phone_formatting_disabled()){
      return $number;
    }else{
      return preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3', $number);
    }
	}

  public static function e164format($number){
    $country_code = OsSettingsHelper::get_country_phone_code();
    if(strpos($country_code, '+')) $number = str_replace($country_code, '', $number);
    $number = OsUtilHelper::clean_phone($number);
    if(empty($number)) return false;
    return $country_code.$number;
  }

  public static function clean_phone($number){
    return preg_replace('/[^0-9]/', '', $number);
  }

  public static function is_date_valid($date_string){
    return (bool)strtotime($date_string);
  }

  public static function build_os_params($params = array()){
    return http_build_query($params);
  }

	
  public static function get_user_ip(){
    if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ){
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ){
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
      $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
  }

  public static function create_nonce($string = ''){
    return wp_create_nonce( 'latepoint_'.$string );
  }

  public static function verify_nonce($nonce, $string = ''){
    return wp_verify_nonce( $nonce, 'latepoint_'.$string );
  }
}