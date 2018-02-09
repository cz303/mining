<?php


require_once dirname(__FILE__)."/font_truetype.cls.php";


class Font_EOT extends Font_TrueType {
  private $Vzkmdbomblir;
  private $Vk4coaduwr32 = 0;
  
  public $Vl5rjgb1nsf3;
  
  function parseHeader(){
    $this->header = $this->unpack(array(
      "EOTSize"        => self::uint32,
      "FontDataSize"   => self::uint32,
      "Version"        => self::uint32,
      "Flags"          => self::uint32,
    ));
    
    $this->header["FontPANOSE"] = $this->read(10);
    
    $this->header += $this->unpack(array(
      "Charset"        => self::uint8,
      "Italic"         => self::uint8,
      "Weight"         => self::uint32,
      "fsType"         => self::uint16,
      "MagicNumber"    => self::uint16,
      "UnicodeRange1"  => self::uint32,
      "UnicodeRange2"  => self::uint32,
      "UnicodeRange3"  => self::uint32,
      "UnicodeRange4"  => self::uint32,
      "CodePageRange1" => self::uint32,
      "CodePageRange2" => self::uint32,
      "CheckSumAdjustment" => self::uint32,
      "Reserved1"      => self::uint32,
      "Reserved2"      => self::uint32,
      "Reserved3"      => self::uint32,
      "Reserved4"      => self::uint32,
      "Padding1"       => self::uint16,
      "FamilyNameSize" => self::uint16,
    ));
  }
  
  function parse() {
    exit("EOT not supported yet");
  }
  
  public function readUInt16() {
    $Vi3y3l1uvwp3 = unpack('vv', $this->read(2));
    return $Vi3y3l1uvwp3['v'];
  }

  public function readUInt32() {
    $Vi3y3l1uvwp3 = unpack('VV', $this->read(4));
    return $Vi3y3l1uvwp3['V'];
  }
}
