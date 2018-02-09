<?php



class Font {
  static $V01yhzbgix2k = false;
  
  
  public static function load($Vg5mhfl1beoi) {
    $Vl5rjgb1nsf3 = file_get_contents($Vg5mhfl1beoi, false, null, null, 4);
    $Vtwwmjiiu40i = null;
    
    switch($Vl5rjgb1nsf3) {
      case "\x00\x01\x00\x00": 
      case "true": 
      case "typ1": 
        $Vtwwmjiiu40i = "Font_TrueType"; break;
      
      case "OTTO":
        $Vtwwmjiiu40i = "Font_OpenType"; break;
      
      case "wOFF":
        $Vtwwmjiiu40i = "Font_WOFF"; break;
        
      case "ttcf":
        $Vtwwmjiiu40i = "Font_TrueType_Collection"; break;
        
      
      default: 
        $V0ivv1ousafc = file_get_contents($Vg5mhfl1beoi, false, null, 34, 2);
        
        if ($V0ivv1ousafc === "LP") {
          $Vtwwmjiiu40i = "Font_EOT";
        }
    }
    
    if ($Vtwwmjiiu40i) {
      require_once dirname(__FILE__)."/".strtolower($Vtwwmjiiu40i).".cls.php";
      
      $Vxvi2fem1djf = new $Vtwwmjiiu40i;
      $Vxvi2fem1djf->load($Vg5mhfl1beoi);
      
      return $Vxvi2fem1djf;
    }
  }
  
  static function d($Vyqctydehp2e) {
    if (!self::$V01yhzbgix2k) return;
    echo "$Vyqctydehp2e\n";
  }
  
  static function UTF16ToUTF8($Vyqctydehp2e) {
    return mb_convert_encoding($Vyqctydehp2e, "utf-8", "utf-16");
  }
  
  static function UTF8ToUTF16($Vyqctydehp2e) {
    return mb_convert_encoding($Vyqctydehp2e, "utf-16", "utf-8");
  }
}
