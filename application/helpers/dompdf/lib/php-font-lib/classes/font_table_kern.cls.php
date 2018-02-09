<?php



class Font_Table_kern extends Font_Table {
  protected function _parse(){
    $Vj0kojsfk0h3 = $this->getFont();
    
    $Vrc2k35qljw1 = $Vj0kojsfk0h3->pos();
    
    $Vou4vxorrdoe = $Vj0kojsfk0h3->unpack(array(
      "version"    => self::uint16,
      "nTables"    => self::uint16,
    
      
      "subtableVersion" => self::uint16,
      "length"     => self::uint16,
      "coverage"   => self::uint16,
    ));
    
    $Vou4vxorrdoe["format"] = ($Vou4vxorrdoe["coverage"] >> 8);
    
    $Vldxaapdjtvp = array();
    
    switch($Vou4vxorrdoe["format"]) {
      case 0:
      $Vldxaapdjtvp = $Vj0kojsfk0h3->unpack(array(
        "nPairs"        => self::uint16,
        "searchRange"   => self::uint16,
        "entrySelector" => self::uint16,
        "rangeShift"    => self::uint16,
      ));
      
      $Vkxgyldfh5bm = array();
      $Vpnxy30x1asc = array();
       
      for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vldxaapdjtvp["nPairs"]; $Vfhiq1lhsoja++) {
        $Vrce0gsxjgkc  = $Vj0kojsfk0h3->readUInt16();
        $Vqyn43hpxtm0 = $Vj0kojsfk0h3->readUInt16();
        $Vp4xjtpabm0l = $Vj0kojsfk0h3->readInt16();
        
        $Vkxgyldfh5bm[] = array(
          "left"  => $Vrce0gsxjgkc,
          "right" => $Vqyn43hpxtm0,
          "value" => $Vp4xjtpabm0l,
        );
        
        $Vpnxy30x1asc[$Vrce0gsxjgkc][$Vqyn43hpxtm0] = $Vp4xjtpabm0l;
      }
      
      
      $Vldxaapdjtvp["tree"] = $Vpnxy30x1asc;
      break;
      
      case 1:
      case 2:
      case 3:
      break;
    }
    
    $Vou4vxorrdoe["subtable"] = $Vldxaapdjtvp;
    
    $this->data = $Vou4vxorrdoe;
  }
}