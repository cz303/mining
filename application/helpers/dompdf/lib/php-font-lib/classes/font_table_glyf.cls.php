<?php



class Font_Table_glyf extends Font_Table {
  const ARG_1_AND_2_ARE_WORDS    = 1;
  const ARGS_ARE_XY_VALUES       = 2;
  const ROUND_XY_TO_GRID         = 4;
  const WE_HAVE_A_SCALE          = 8;
  const MORE_COMPONENTS          = 32;
  const WE_HAVE_AN_X_AND_Y_SCALE = 64;
  const WE_HAVE_A_TWO_BY_TWO     = 128;
  const WE_HAVE_INSTRUCTIONS     = 256;
  const USE_MY_METRICS           = 512;
  const OVERLAP_COMPOUND         = 1024;
  
  protected function getGlyphData($Vortqlloirgz, $Vcrs3lxqte4s, $Vwn52b3jaf14){
    $Vj0kojsfk0h3 = $this->getFont();
    
    
    
    $Vj0kojsfk0h3->seek($Vortqlloirgz + $Vcrs3lxqte4s[$Vwn52b3jaf14]);
    return $Vj0kojsfk0h3->read($Vcrs3lxqte4s[$Vwn52b3jaf14+1] - $Vcrs3lxqte4s[$Vwn52b3jaf14]);
  }
  
  protected function _parse(){
    $Vj0kojsfk0h3 = $this->getFont();
    $Vortqlloirgz = $Vj0kojsfk0h3->pos();
    
    $Vcrs3lxqte4s = $Vj0kojsfk0h3->getData("loca");
    $V5ln2swybwnp = array_slice($Vcrs3lxqte4s, 0, -1); 
    
    $Vou4vxorrdoe = array();
    
    foreach($V5ln2swybwnp as $Vwn52b3jaf14 => $Vcrs3lxqte4stion) {
      $Vou4vxorrdoe[$Vwn52b3jaf14] = $this->getGlyphData($Vortqlloirgz, $Vcrs3lxqte4s, $Vwn52b3jaf14);
    }
    
    $this->data = $Vou4vxorrdoe;
  }
  
  protected function _encode() {
    $Vj0kojsfk0h3 = $this->getFont();
    $Vr0sffgtekfz = $Vj0kojsfk0h3->getSubset();
    $V4ck0gyr3odw = $Vj0kojsfk0h3->compound_glyph_offsets;
    $Vou4vxorrdoe = $this->data;
    
    $Vcrs3lxqte4s = array();
    
    $Volq3gdvkuqp = 0;
    foreach($Vr0sffgtekfz as $Vwn52b3jaf14) {
      $Vcrs3lxqte4s[] = $Volq3gdvkuqp;
      $V2xbsnapuozj = $Vou4vxorrdoe[$Vwn52b3jaf14];
      $Vtojwsl3m1uw = strlen($V2xbsnapuozj);
      
      if (isset($V4ck0gyr3odw[$Vwn52b3jaf14])) {
        $Vortqlloirgzs = $V4ck0gyr3odw[$Vwn52b3jaf14];
        foreach($Vortqlloirgzs as $Vortqlloirgz => $Vx3kcl1bytq4) {
          list($V2xbsnapuozj[$Vortqlloirgz], $V2xbsnapuozj[$Vortqlloirgz+1]) = pack("n", $Vx3kcl1bytq4);
        }
      }
      
      $Volq3gdvkuqp += $Vj0kojsfk0h3->write($V2xbsnapuozj, strlen($V2xbsnapuozj));
    }
    
    $Vcrs3lxqte4s[] = $Volq3gdvkuqp; 
    $Vj0kojsfk0h3->getTableObject("loca")->data = $Vcrs3lxqte4s;
    
    return $Volq3gdvkuqp;
  }
}