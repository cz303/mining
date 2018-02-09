<?php



class Font_Table_loca extends Font_Table {
  protected function _parse(){
    $Vj0kojsfk0h3 = $this->getFont();
    $Vortqlloirgz = $Vj0kojsfk0h3->pos();
    
    $Vkzeswyz1vv2 = $Vj0kojsfk0h3->getData("head", "indexToLocFormat");
    $V0adzqqly5hr = $Vj0kojsfk0h3->getData("maxp", "numGlyphs");
    
    $Vj0kojsfk0h3->seek($Vortqlloirgz);
    
    $Vou4vxorrdoe = array();
    
    
    if ($Vkzeswyz1vv2 == 0) {
      $Vrec2f1japon = $Vj0kojsfk0h3->read(($V0adzqqly5hr + 1) * 2);
      $Vpzop43vsktv = unpack("n*", $Vrec2f1japon);
      
      for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja <= $V0adzqqly5hr; $Vfhiq1lhsoja++) {
        $Vou4vxorrdoe[] = $Vpzop43vsktv[$Vfhiq1lhsoja+1] * 2;
      }
    }
    
    
    else if ($Vkzeswyz1vv2 == 1) {
      $Vrec2f1japon = $Vj0kojsfk0h3->read(($V0adzqqly5hr + 1) * 4);
      $Vpzop43vsktv = unpack("N*", $Vrec2f1japon);
      
      for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja <= $V0adzqqly5hr; $Vfhiq1lhsoja++) {
        $Vou4vxorrdoe[] = $Vpzop43vsktv[$Vfhiq1lhsoja+1];
      }
    }
    
    $this->data = $Vou4vxorrdoe;
  }
  
  function _encode(){
    $Vj0kojsfk0h3 = $this->getFont();
    $Vou4vxorrdoe = $this->data;
    
    $Vkzeswyz1vv2 = $Vj0kojsfk0h3->getData("head", "indexToLocFormat");
    $V0adzqqly5hr = $Vj0kojsfk0h3->getData("maxp", "numGlyphs");
    $Volq3gdvkuqp = 0;
    
    
    if ($Vkzeswyz1vv2 == 0) {
      for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja <= $V0adzqqly5hr; $Vfhiq1lhsoja++) {
        $Volq3gdvkuqp += $Vj0kojsfk0h3->writeUInt16($Vou4vxorrdoe[$Vfhiq1lhsoja] / 2);
      }
    }
    
    
    else if ($Vkzeswyz1vv2 == 1) {
      for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja <= $V0adzqqly5hr; $Vfhiq1lhsoja++) {
        $Volq3gdvkuqp += $Vj0kojsfk0h3->writeUInt32($Vou4vxorrdoe[$Vfhiq1lhsoja]);
      }
    }
    
    return $Volq3gdvkuqp;
  }
}