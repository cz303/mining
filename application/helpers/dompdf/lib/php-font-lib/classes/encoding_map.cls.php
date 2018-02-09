<?php



class Encoding_Map {
  private $Vtbbah5lqvpo;
  
  function __construct($Vtbbah5lqvpoile) {
    $this->f = fopen($Vtbbah5lqvpoile, "r");
  }
  
  function parse(){
    $V2lrhw0msxly = array();
    
    while($Vdmbypy2xlg1 = fgets($this->f)) {
      if (preg_match("/^[\!\=]([0-9A-F]{2,})\s+U\+([0-9A-F]{2})([0-9A-F]{2})\s+([^\s]+)/", $Vdmbypy2xlg1, $Vt3xexsia3ta)) {
        $Vofoss035ofb = (hexdec($Vt3xexsia3ta[2]) << 8) + hexdec($Vt3xexsia3ta[3]);
        $V2lrhw0msxly[hexdec($Vt3xexsia3ta[1])] = array($Vofoss035ofb, $Vt3xexsia3ta[4]);
      }
    }
    
    ksort($V2lrhw0msxly);
    
    return $V2lrhw0msxly;
  }
}
