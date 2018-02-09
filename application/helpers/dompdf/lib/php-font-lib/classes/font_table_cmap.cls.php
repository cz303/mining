<?php



class Font_Table_cmap extends Font_Table {
  private static $V5ngy5snherh = array(
    "version"         => self::uint16,
    "numberSubtables" => self::uint16,
  );
  
  private static $V3jh1upqenru = array(
    "platformID"         => self::uint16,
    "platformSpecificID" => self::uint16,
    "offset"             => self::uint32,
  );
  
  private static $Vzr10iq2opyr = array(
    "length"        => self::uint16, 
    "language"      => self::uint16, 
    "segCountX2"    => self::uint16, 
    "searchRange"   => self::uint16, 
    "entrySelector" => self::uint16, 
    "rangeShift"    => self::uint16,
  );
  
  protected function _parse(){
    $Vj0kojsfk0h3 = $this->getFont();
    
    $V1t4c1s3vqvu = $Vj0kojsfk0h3->pos();
    
    $Vou4vxorrdoe = $Vj0kojsfk0h3->unpack(self::$V5ngy5snherh);
    
    $V5vbnasxj3ia = array();
    for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vou4vxorrdoe["numberSubtables"]; $Vfhiq1lhsoja++){
      $V5vbnasxj3ia[] = $Vj0kojsfk0h3->unpack(self::$V3jh1upqenru);
    }
    $Vou4vxorrdoe["subtables"] = $V5vbnasxj3ia;
    
    foreach($Vou4vxorrdoe["subtables"] as $Vfhiq1lhsoja => &$Vldxaapdjtvp) {
      $Vj0kojsfk0h3->seek($V1t4c1s3vqvu + $Vldxaapdjtvp["offset"]);
      
      $Vldxaapdjtvp["format"] = $Vj0kojsfk0h3->readUInt16();
      
      
      if($Vldxaapdjtvp["format"] != 4) {
        unset($Vou4vxorrdoe["subtables"][$Vfhiq1lhsoja]);
        $Vou4vxorrdoe["numberSubtables"]--;
        continue;
      }
      
      $Vldxaapdjtvp += $Vj0kojsfk0h3->unpack(self::$Vzr10iq2opyr);
      $Vuxwrb53igif = $Vldxaapdjtvp["segCountX2"] / 2;
      $Vldxaapdjtvp["segCount"] = $Vuxwrb53igif;
      
      $V4hpynujgpx5       = $Vj0kojsfk0h3->r(array(self::uint16, $Vuxwrb53igif));
      
      $Vj0kojsfk0h3->readUInt16(); 
      
      $V5pqmrb3hquy     = $Vj0kojsfk0h3->r(array(self::uint16, $Vuxwrb53igif));
      $Vfhiq1lhsojadDelta       = $Vj0kojsfk0h3->r(array(self::int16, $Vuxwrb53igif));
      
      $Vvv4rxdj2jlq      = $Vj0kojsfk0h3->pos();
      $Vfhiq1lhsojadRangeOffset = $Vj0kojsfk0h3->r(array(self::uint16, $Vuxwrb53igif));
      
      $Vrkrbvtcqvht = array();
      for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vuxwrb53igif; $Vfhiq1lhsoja++) {
        $Vxc4jqbmntad = $V5pqmrb3hquy[$Vfhiq1lhsoja];
        $V1qv1g2vnwq5 = $V4hpynujgpx5[$Vfhiq1lhsoja];
        $Vrec2f1japon  = $Vfhiq1lhsojadDelta[$Vfhiq1lhsoja];
        $Vde0nm2gk2vi = $Vfhiq1lhsojadRangeOffset[$Vfhiq1lhsoja];
        
        if($Vde0nm2gk2vi > 0)
          $Vj0kojsfk0h3->seek($Vldxaapdjtvp["offset"] + 2 * $Vfhiq1lhsoja + $Vde0nm2gk2vi);
          
        for($V4y0urwpnd3j = $Vxc4jqbmntad; $V4y0urwpnd3j <= $V1qv1g2vnwq5; $V4y0urwpnd3j++) {
          if ($Vde0nm2gk2vi == 0)
            $Vwn52b3jaf14 = ($V4y0urwpnd3j + $Vrec2f1japon) & 0xFFFF;
          else {
            $Vortqlloirgz = ($V4y0urwpnd3j - $Vxc4jqbmntad) * 2 + $Vde0nm2gk2vi;
            $Vortqlloirgz = $Vvv4rxdj2jlq + 2 * $Vfhiq1lhsoja + $Vortqlloirgz;
            
            $Vj0kojsfk0h3->seek($Vortqlloirgz);
            $Vwn52b3jaf14 = $Vj0kojsfk0h3->readUInt16();
            
            if ($Vwn52b3jaf14 != 0)
               $Vwn52b3jaf14 = ($Vwn52b3jaf14 + $Vrec2f1japon) & 0xFFFF;
          }
          
          if($Vwn52b3jaf14 > 0) {
            $Vrkrbvtcqvht[$V4y0urwpnd3j] = $Vwn52b3jaf14;
          }
        }
      }
      
      $Vldxaapdjtvp += array(
        "endCode"         => $V4hpynujgpx5,
        "startCode"       => $V5pqmrb3hquy,
        "idDelta"         => $Vfhiq1lhsojadDelta,
        "idRangeOffset"   => $Vfhiq1lhsojadRangeOffset,
        "glyphIndexArray" => $Vrkrbvtcqvht,
      );
    }
    
    $this->data = $Vou4vxorrdoe;
  }
  
  function _encode(){
    $Vj0kojsfk0h3 = $this->getFont();
    $Vr0sffgtekfz = $Vj0kojsfk0h3->getSubset();
    
    $Vobm2xehzkhp = array();
    
    $Vfhiq1lhsoja = count($Vobm2xehzkhp)-1;
    $Vzmnqyqjjodw = $Vfhiq1lhsoja+1;
    $Vgrikuf5eiis = 0;
    $Vrkrbvtcqvht = array();
    
    foreach($Vr0sffgtekfz as $V4y0urwpnd3jode => $Vwn52b3jaf14) {
      if ($Vgrikuf5eiis + 1 != $V4y0urwpnd3jode) {
        $Vfhiq1lhsoja++;
        $Vobm2xehzkhp[$Vfhiq1lhsoja] = array();
      }
      
      $Vobm2xehzkhp[$Vfhiq1lhsoja][] = array($V4y0urwpnd3jode, $Vzmnqyqjjodw);
      
      $Vrkrbvtcqvht[] = $V4y0urwpnd3jode;
      $Vzmnqyqjjodw++;
      $Vgrikuf5eiis = $V4y0urwpnd3jode;
    }
    
    $Vobm2xehzkhp[][] = array(0xFFFF, 0xFFFF);
    
    $V5pqmrb3hquy = array();
    $V4hpynujgpx5 = array();
    $Vfhiq1lhsojadDelta = array();
    
    foreach($Vobm2xehzkhp as $V4y0urwpnd3jodes){
      $Vvzcx2qx0r4o = reset($V4y0urwpnd3jodes);
      $Vidi1l5xe3bf   = end($V4y0urwpnd3jodes);
      
      $V5pqmrb3hquy[] = $Vvzcx2qx0r4o[0];
      $V4hpynujgpx5[]   = $Vidi1l5xe3bf[0];
      $Vfhiq1lhsojadDelta[]   = $Vvzcx2qx0r4o[1] - $Vvzcx2qx0r4o[0];
    }
    
    $Vuxwrb53igif = count($V5pqmrb3hquy);
    $Vfhiq1lhsojadRangeOffset = array_fill(0, $Vuxwrb53igif, 0);
    
    $Vghlu2memsle = 1;
    $Vlyukfrznqk4 = 0;
    while ($Vghlu2memsle * 2 <= $Vuxwrb53igif) {
      $Vghlu2memsle *= 2;
      $Vlyukfrznqk4++;
    }
    $Vghlu2memsle *= 2;
    $Vmwyn5f0prov = $Vuxwrb53igif * 2 - $Vghlu2memsle;
    
    $V5vbnasxj3ia = array(
      array(
        
        "platformID"         => 3, 
        "platformSpecificID" => 1,
        "offset"        => null,
      
        
        "format"        => 4, 
        "length"        => null, 
        "language"      => 0, 
        "segCount"      => $Vuxwrb53igif, 
        "segCountX2"    => $Vuxwrb53igif * 2, 
        "searchRange"   => $Vghlu2memsle, 
        "entrySelector" => $Vlyukfrznqk4, 
        "rangeShift"    => $Vmwyn5f0prov,
        "startCode"     => $V5pqmrb3hquy,
        "endCode"       => $V4hpynujgpx5,
        "idDelta"       => $Vfhiq1lhsojadDelta,
        "idRangeOffset" => $Vfhiq1lhsojadRangeOffset, 
        "glyphIndexArray" => $Vrkrbvtcqvht, 
      )
    );
    
    $Vou4vxorrdoe = array(
      "version"         => 0,
      "numberSubtables" => count($V5vbnasxj3ia),
      "subtables"       => $V5vbnasxj3ia,
    );
    
    $Volq3gdvkuqp = $Vj0kojsfk0h3->pack(self::$V5ngy5snherh, $Vou4vxorrdoe);
    
    $Vldxaapdjtvp_headers_size = $Vou4vxorrdoe["numberSubtables"] * 8; 
    $Vldxaapdjtvp_headers_offset = $Vj0kojsfk0h3->pos();
    
    $Volq3gdvkuqp += $Vj0kojsfk0h3->write(str_repeat("\0", $Vldxaapdjtvp_headers_size), $Vldxaapdjtvp_headers_size);
    
    
    foreach($Vou4vxorrdoe["subtables"] as $Vfhiq1lhsoja => $Vldxaapdjtvp) {
      $Volq3gdvkuqp_before = $Volq3gdvkuqp;
      $Vou4vxorrdoe["subtables"][$Vfhiq1lhsoja]["offset"] = $Volq3gdvkuqp;
      
      $Volq3gdvkuqp += $Vj0kojsfk0h3->writeUInt16($Vldxaapdjtvp["format"]);
      
      $V1jb2ansiqyp = $Vj0kojsfk0h3->pos();
      $Volq3gdvkuqp += $Vj0kojsfk0h3->pack(self::$Vzr10iq2opyr, $Vldxaapdjtvp);
      
      $Vuxwrb53igif = $Vldxaapdjtvp["segCount"];
      $Volq3gdvkuqp += $Vj0kojsfk0h3->w(array(self::uint16, $Vuxwrb53igif), $Vldxaapdjtvp["endCode"]);
      $Volq3gdvkuqp += $Vj0kojsfk0h3->writeUInt16(0); 
      $Volq3gdvkuqp += $Vj0kojsfk0h3->w(array(self::uint16, $Vuxwrb53igif), $Vldxaapdjtvp["startCode"]);
      $Volq3gdvkuqp += $Vj0kojsfk0h3->w(array(self::int16, $Vuxwrb53igif), $Vldxaapdjtvp["idDelta"]);
      $Volq3gdvkuqp += $Vj0kojsfk0h3->w(array(self::uint16, $Vuxwrb53igif), $Vldxaapdjtvp["idRangeOffset"]);
      $Volq3gdvkuqp += $Vj0kojsfk0h3->w(array(self::uint16, $Vuxwrb53igif), $Vldxaapdjtvp["glyphIndexArray"]);
      
      $V1cr11aiqcpe = $Vj0kojsfk0h3->pos();
      
      $Vldxaapdjtvp["length"] = $Volq3gdvkuqp - $Volq3gdvkuqp_before;
      $Vj0kojsfk0h3->seek($V1jb2ansiqyp);
      $Volq3gdvkuqp += $Vj0kojsfk0h3->pack(self::$Vzr10iq2opyr, $Vldxaapdjtvp);
      
      $Vj0kojsfk0h3->seek($V1cr11aiqcpe);
    }
    
    
    $Vj0kojsfk0h3->seek($Vldxaapdjtvp_headers_offset);
    foreach($Vou4vxorrdoe["subtables"] as $Vldxaapdjtvp) {
      $Vj0kojsfk0h3->pack(self::$V3jh1upqenru, $Vldxaapdjtvp);
    }
    
    return $Volq3gdvkuqp;
  }
}
