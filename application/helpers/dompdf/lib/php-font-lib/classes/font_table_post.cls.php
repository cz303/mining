<?php



class Font_Table_post extends Font_Table {
  protected $Vrylphpo42p4 = array(
    "format"             => self::Fixed,
    "italicAngle"        => self::Fixed,
    "underlinePosition"  => self::FWord,
    "underlineThickness" => self::FWord,
    "isFixedPitch"       => self::uint32,
    "minMemType42"       => self::uint32,
    "maxMemType42"       => self::uint32,
    "minMemType1"        => self::uint32,
    "maxMemType1"        => self::uint32,
  );
  
  protected function _parse(){
    $Vj0kojsfk0h3 = $this->getFont();
    $Vou4vxorrdoe = $Vj0kojsfk0h3->unpack($this->def);
    
    $Vuyq43c4rgyg = array();
    
    switch($Vou4vxorrdoe["format"]) {
      case 1:
        $Vuyq43c4rgyg = Font_TrueType::$Vdhdjesmvosc;
      break;
      
      case 2:
        $Vou4vxorrdoe["numberOfGlyphs"] = $Vj0kojsfk0h3->readUInt16();
        
        $Vjms3rjysrv4 = array();
        for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vou4vxorrdoe["numberOfGlyphs"]; $Vfhiq1lhsoja++) {
          $Vjms3rjysrv4[] = $Vj0kojsfk0h3->readUInt16();
        }
        
        $Vou4vxorrdoe["glyphNameIndex"] = $Vjms3rjysrv4;
        
        $Vuyq43c4rgygPascal = array();
        for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vou4vxorrdoe["numberOfGlyphs"]; $Vfhiq1lhsoja++) {
          $Vtojwsl3m1uw = $Vj0kojsfk0h3->readUInt8();
          $Vuyq43c4rgygPascal[] = $Vj0kojsfk0h3->read($Vtojwsl3m1uw);
        }
        
        foreach($Vjms3rjysrv4 as $Vpatv3dcvvhr => $Vfhiq1lhsojandex) {
          if ($Vfhiq1lhsojandex < 258) {
            $Vuyq43c4rgyg[$Vpatv3dcvvhr] = Font_TrueType::$Vdhdjesmvosc[$Vfhiq1lhsojandex];
          }
          else {
            $Vuyq43c4rgyg[$Vpatv3dcvvhr] = $Vuyq43c4rgygPascal[$Vfhiq1lhsojandex - 258];
          }
        }
        
      break;
      
      case 2.5:
        
      break;
      
      case 3:
        
      break;
      
      case 4:
        
      break;
    }
    
    $Vou4vxorrdoe["names"] = $Vuyq43c4rgyg;
    
    $this->data = $Vou4vxorrdoe;
  }
  
  function _encode(){
    $Vj0kojsfk0h3 = $this->getFont();
    $Vou4vxorrdoe = $this->data;
    $Vou4vxorrdoe["format"] = 3;
    
    $Vtojwsl3m1uwgth = $Vj0kojsfk0h3->pack($this->def, $Vou4vxorrdoe);
    
    return $Vtojwsl3m1uwgth;
    
    $Vr0sffgtekfz = $Vj0kojsfk0h3->getSubset();
    
    switch($Vou4vxorrdoe["format"]) {
      case 1:
        
      break;
      
      case 2:
        $Vyzutm3jtq30 = $Vou4vxorrdoe["names"];
        
        $Vjms3rjysrv4 = range(0, count($Vr0sffgtekfz));
        
        $Vuyq43c4rgyg = array();
        foreach($Vr0sffgtekfz as $Vpatv3dcvvhrid) {
          $Vuyq43c4rgyg[] = $Vou4vxorrdoe["names"][$Vou4vxorrdoe["glyphNameIndex"][$Vpatv3dcvvhrid]];
        }
    
        $Vfwi3tbah5og = count($Vuyq43c4rgyg);
        $Vtojwsl3m1uwgth += $Vj0kojsfk0h3->writeUInt16($Vfwi3tbah5og);
        
        foreach($Vjms3rjysrv4 as $Vpatv3dcvvhrni) {
          $Vtojwsl3m1uwgth += $Vj0kojsfk0h3->writeUInt16($Vpatv3dcvvhrni);
        }
        
        
        foreach($Vuyq43c4rgyg as $Vcvluzjs3wzb) {
          var_dump($Vcvluzjs3wzb);
          $Vtojwsl3m1uw = strlen($Vcvluzjs3wzb);
          $Vtojwsl3m1uwgth += $Vj0kojsfk0h3->writeUInt8($Vtojwsl3m1uw);
          $Vtojwsl3m1uwgth += $Vj0kojsfk0h3->write($Vcvluzjs3wzb, $Vtojwsl3m1uw);
        }
        
      break;
      
      case 2.5:
        
      break;
      
      case 3:
        
      break;
      
      case 4:
        
      break;
    }
    
    return $Vtojwsl3m1uwgth;
  }
}