<?php



class Font_Table_maxp extends Font_Table {
  protected $Vrylphpo42p4 = array(
    "version"               => self::Fixed,
    "numGlyphs"             => self::uint16,
    "maxPoints"             => self::uint16,
    "maxContours"           => self::uint16,
    "maxComponentPoints"    => self::uint16,
    "maxComponentContours"  => self::uint16,
    "maxZones"              => self::uint16,
    "maxTwilightPoints"     => self::uint16,
    "maxStorage"            => self::uint16,
    "maxFunctionDefs"       => self::uint16,
    "maxInstructionDefs"    => self::uint16,
    "maxStackElements"      => self::uint16,
    "maxSizeOfInstructions" => self::uint16,
    "maxComponentElements"  => self::uint16,
    "maxComponentDepth"     => self::uint16,
  );
  
  function _encode(){
    $Vj0kojsfk0h3 = $this->getFont();
    $this->data["numGlyphs"] = count($Vj0kojsfk0h3->getSubset());
    
    return parent::_encode();
  }
}