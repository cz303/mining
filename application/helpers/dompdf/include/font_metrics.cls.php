<?php


require_once DOMPDF_LIB_DIR . "/class.pdf.php";
require_once DOMPDF_LIB_DIR . "/php-font-lib/classes/font.cls.php";


if (!defined("__DOMPDF_FONT_CACHE_FILE")) {
  if (file_exists(DOMPDF_FONT_DIR . "dompdf_font_family_cache")) {
    define('__DOMPDF_FONT_CACHE_FILE', DOMPDF_FONT_DIR . "dompdf_font_family_cache");
  } else {
    define('__DOMPDF_FONT_CACHE_FILE', DOMPDF_FONT_DIR . "dompdf_font_family_cache.dist.php");
  }
}


class Font_Metrics {

  
  const CACHE_FILE = __DOMPDF_FONT_CACHE_FILE;
  
  
  static protected $Vqyyzc2szlte = null;

  
  static protected $Vy0ebugax0im = array();
  
  
  
  static function init(Canvas $Vhvgft0vzcla = null) {
    if (!self::$Vqyyzc2szlte) {
      if (!$Vhvgft0vzcla) {
        $Vhvgft0vzcla = Canvas_Factory::get_instance();
      }
      
      self::$Vqyyzc2szlte = $Vhvgft0vzcla;
    }
  }

  
  static function get_text_width($Vkjdq1foihhi, $Vj0kojsfk0h3, $V4jbadwq4bzj, $V3ioe2zhnovg = 0, $Vshdzmkj2dla = 0) {
    
    
    
    static $Vzuoy3afrlta = array();
    
    if ( $Vkjdq1foihhi === "" ) {
      return 0;
    }
    
    
    $Vap2lpvptsaa = !isset($Vkjdq1foihhi[50]); 
    
    $Vseq1edikdvg = "$Vj0kojsfk0h3/$V4jbadwq4bzj/$V3ioe2zhnovg/$Vshdzmkj2dla";
    
    if ( $Vap2lpvptsaa && isset($Vzuoy3afrlta[$Vseq1edikdvg][$Vkjdq1foihhi]) ) {
      return $Vzuoy3afrlta[$Vseq1edikdvg]["$Vkjdq1foihhi"];
    }
    
    $Vojs2qdgagwv = self::$Vqyyzc2szlte->get_text_width($Vkjdq1foihhi, $Vj0kojsfk0h3, $V4jbadwq4bzj, $V3ioe2zhnovg, $Vshdzmkj2dla);
    
    if ( $Vap2lpvptsaa ) {
      $Vzuoy3afrlta[$Vseq1edikdvg][$Vkjdq1foihhi] = $Vojs2qdgagwv;
    }
    
    return $Vojs2qdgagwv;
  }

  
  static function get_font_height($Vj0kojsfk0h3, $V4jbadwq4bzj) {
    return self::$Vqyyzc2szlte->get_font_height($Vj0kojsfk0h3, $V4jbadwq4bzj);
  }

  
  static function get_font($Vt5aj1423wg2, $Vwecbks45sng = "normal") {

    

    if ( $Vt5aj1423wg2 ) {
      $Vt5aj1423wg2 = str_replace( array("'", '"'), "", mb_strtolower($Vt5aj1423wg2));
      $Vwecbks45sng = mb_strtolower($Vwecbks45sng);

      if ( isset(self::$Vy0ebugax0im[$Vt5aj1423wg2][$Vwecbks45sng]) ) {
        return self::$Vy0ebugax0im[$Vt5aj1423wg2][$Vwecbks45sng];
      }
      return null;
    }

    $Vt5aj1423wg2 = DOMPDF_DEFAULT_FONT;

    if ( isset(self::$Vy0ebugax0im[$Vt5aj1423wg2][$Vwecbks45sng]) ) {
      return self::$Vy0ebugax0im[$Vt5aj1423wg2][$Vwecbks45sng];
    }

    foreach ( self::$Vy0ebugax0im[$Vt5aj1423wg2] as $Vbisy5oskm1h => $Vj0kojsfk0h3 ) {
      if (strpos($Vwecbks45sng, $Vbisy5oskm1h) !== false) {
        return $Vj0kojsfk0h3;
      }
    }

    if ($Vwecbks45sng !== "normal") {
      foreach ( self::$Vy0ebugax0im[$Vt5aj1423wg2] as $Vbisy5oskm1h => $Vj0kojsfk0h3 ) {
        if ($Vbisy5oskm1h !== "normal") {
          return $Vj0kojsfk0h3;
        }
      }
    }

    $Vwecbks45sng = "normal";

    if ( isset(self::$Vy0ebugax0im[$Vt5aj1423wg2][$Vwecbks45sng]) ) {
      return self::$Vy0ebugax0im[$Vt5aj1423wg2][$Vwecbks45sng];
    }
    return null;
  }
  
  static function get_family($Vt5aj1423wg2) {
    $Vt5aj1423wg2 = str_replace( array("'", '"'), "", mb_strtolower($Vt5aj1423wg2));
    
    if ( isset(self::$Vy0ebugax0im[$Vt5aj1423wg2]) ) {
      return self::$Vy0ebugax0im[$Vt5aj1423wg2];
    }
    
    return null;
  }

  
  static function save_font_families() {
    
    $Vzuoy3afrlta_data = var_export(self::$Vy0ebugax0im, true);
    $Vzuoy3afrlta_data = str_replace('\''.DOMPDF_FONT_DIR , 'DOMPDF_FONT_DIR . \'' , $Vzuoy3afrlta_data);
    $Vzuoy3afrlta_data = "<"."?php return $Vzuoy3afrlta_data ?".">";
    file_put_contents(self::CACHE_FILE, $Vzuoy3afrlta_data);
  }

  
  static function load_font_families() {
    if ( !is_readable(self::CACHE_FILE) )
      return;

    self::$Vy0ebugax0im = require_once(self::CACHE_FILE);
    
    
    if ( self::$Vy0ebugax0im === 1 ) {
      $Vzuoy3afrlta_data = file_get_contents(self::CACHE_FILE);
      file_put_contents(self::CACHE_FILE, "<"."?php return $Vzuoy3afrlta_data ?".">");
      self::$Vy0ebugax0im = require_once(self::CACHE_FILE);
    }
  }
  
  static function get_type($V4pigtpor0ln) {
    if (preg_match("/bold/i", $V4pigtpor0ln)) {
      if (preg_match("/italic|oblique/i", $V4pigtpor0ln)) {
        $V4pigtpor0ln = "bold_italic";
      }
      else {
        $V4pigtpor0ln = "bold";
      }
    }
    elseif (preg_match("/italic|oblique/i", $V4pigtpor0ln)) {
      $V4pigtpor0ln = "italic";
    }
    else {
      $V4pigtpor0ln = "normal";
    }
      
    return $V4pigtpor0ln;
  }
  
  static function install_fonts($V0u2szlcgtg2) {
    $Vuyq43c4rgyg = array();
    
    foreach($V0u2szlcgtg2 as $Vg5mhfl1beoi) {
      $Vj0kojsfk0h3 = Font::load($Vg5mhfl1beoi);
      $Vaq4zgw3slcm = $Vj0kojsfk0h3->getData("name", "records");
      $V4pigtpor0ln = self::get_type($Vaq4zgw3slcm[2]);
      $Vuyq43c4rgyg[mb_strtolower($Vaq4zgw3slcm[1])][$V4pigtpor0ln] = $Vg5mhfl1beoi;
    }
    
    return $Vuyq43c4rgyg;
  }
  
  static function get_system_fonts() {
    $V0u2szlcgtg2 = glob("/usr/share/fonts/truetype/*.ttf") +
             glob("/usr/share/fonts/truetype/*/*.ttf") +
             glob("/usr/share/fonts/truetype/*/*/*.ttf") +
             glob("C:\\Windows\\fonts\\*.ttf") + 
             glob("C:\\WinNT\\fonts\\*.ttf") + 
             glob("/mnt/c_drive/WINDOWS/Fonts/");
    
    return self::install_fonts($V0u2szlcgtg2);
  }

  
  static function get_font_families() {
    return self::$Vy0ebugax0im;
  }

  static function set_font_family($Vj0kojsfk0h3name, $V4o5wb5ucdu5) {
    self::$Vy0ebugax0im[mb_strtolower($Vj0kojsfk0h3name)] = $V4o5wb5ucdu5;
  }
  
  static function register_font($Vdtcpflt5bhp, $Vkcc5bxvigsh) {
    $Vj0kojsfk0h3name = mb_strtolower($Vdtcpflt5bhp["family"]);
    $Vh5ypxk5jjwi = Font_Metrics::get_font_families();
    
    $V4o5wb5ucdu5 = array();
    if ( isset($Vh5ypxk5jjwi[$Vj0kojsfk0h3name]) ) {
      $V4o5wb5ucdu5 = $Vh5ypxk5jjwi[$Vj0kojsfk0h3name];
    }
    
    $Vkcc5bxvigsh = $Vkcc5bxvigsh;
    $Vynlfqbp0gda = DOMPDF_FONT_DIR . md5($Vkcc5bxvigsh);
    $Vzuoy3afrlta_entry = $Vynlfqbp0gda;
    $Vynlfqbp0gda .= ".ttf";
    
    $Vdtcpflt5bhp_string = Font_Metrics::get_type("{$Vdtcpflt5bhp['weight']} {$Vdtcpflt5bhp['style']}");
    
    if ( !isset($V4o5wb5ucdu5[$Vdtcpflt5bhp_string]) ) {
      $V4o5wb5ucdu5[$Vdtcpflt5bhp_string] = $Vzuoy3afrlta_entry;
      
      Font_Metrics::set_font_family($Vj0kojsfk0h3name, $V4o5wb5ucdu5);
      
      
      if ( !is_file($Vynlfqbp0gda) ) {
        file_put_contents($Vynlfqbp0gda, file_get_contents($Vkcc5bxvigsh));
      }
      
      $Vj0kojsfk0h3 = Font::load($Vynlfqbp0gda);
      
      if (!$Vj0kojsfk0h3) {
        return false;
      }
      
      $Vj0kojsfk0h3->parse();
      $Vj0kojsfk0h3->saveAdobeFontMetrics("$Vzuoy3afrlta_entry.ufm");
      
      
      Font_Metrics::save_font_families();
    }
    
    return true;
  }
}

Font_Metrics::load_font_families();
