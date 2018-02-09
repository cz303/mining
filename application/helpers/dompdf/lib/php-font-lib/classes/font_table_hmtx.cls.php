<?php



class Font_Table_hmtx extends Font_Table {
  protected function _parse(){
    $Vj0kojsfk0h3 = $this->getFont();
    $Vortqlloirgz = $Vj0kojsfk0h3->pos();
    
    $Vgs35ky0rl50 = $Vj0kojsfk0h3->getData("hhea", "numOfLongHorMetrics");
    $V0adzqqly5hr = $Vj0kojsfk0h3->getData("maxp", "numGlyphs");
    
    $Vj0kojsfk0h3->seek($Vortqlloirgz);
    
    $Vou4vxorrdoe = array();
    for($Vwn52b3jaf14 = 0; $Vwn52b3jaf14 < $Vgs35ky0rl50; $Vwn52b3jaf14++) {
      $Vu2wqhw3qiuo = $Vj0kojsfk0h3->readUInt16();
      $Vof0jxccbyar = $Vj0kojsfk0h3->readUInt16();
      $Vou4vxorrdoe[$Vwn52b3jaf14] = array($Vu2wqhw3qiuo, $Vof0jxccbyar);
    }
    
    if($Vgs35ky0rl50 < $V0adzqqly5hr){
      $V5wepdvtl32s = end($Vou4vxorrdoe);
      $Vou4vxorrdoe = array_pad($Vou4vxorrdoe, $V0adzqqly5hr, $V5wepdvtl32s);
    }
    
    $this->data = $Vou4vxorrdoe;
  }
  
  protected function _encode() {
    $Vj0kojsfk0h3 = $this->getFont();
    $Vr0sffgtekfz = $Vj0kojsfk0h3->getSubset();
    $Vou4vxorrdoe = $this->data;
    
    $Volq3gdvkuqp = 0;
    
    foreach($Vr0sffgtekfz as $Vwn52b3jaf14) {
      $Volq3gdvkuqp += $Vj0kojsfk0h3->writeUInt16($Vou4vxorrdoe[$Vwn52b3jaf14][0]);
      $Volq3gdvkuqp += $Vj0kojsfk0h3->writeUInt16($Vou4vxorrdoe[$Vwn52b3jaf14][1]);
    }
    
    return $Volq3gdvkuqp;
  }
}