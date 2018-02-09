<?php



class Font_Table_hhea extends Font_Table {
  protected $Vrylphpo42p4 = array(
    "version"             => self::Fixed,
    "ascent"              => self::FWord,
    "descent"             => self::FWord,
    "lineGap"             => self::FWord,
    "advanceWidthMax"     => self::uFWord,
    "minLeftSideBearing"  => self::FWord,
    "minRightSideBearing" => self::FWord,
    "xMaxExtent"          => self::FWord,
    "caretSlopeRise"      => self::int16,
    "caretSlopeRun"       => self::int16,
    "caretOffset"         => self::FWord,
                             self::int16,
                             self::int16,
                             self::int16,
                             self::int16,
    "metricDataFormat"    => self::int16,
    "numOfLongHorMetrics" => self::uint16,
  );
  
  function _encode(){
    $Vj0kojsfk0h3 = $this->getFont();
    $this->data["numOfLongHorMetrics"] = count($Vj0kojsfk0h3->getSubset());
    
    return parent::_encode();
  }
}