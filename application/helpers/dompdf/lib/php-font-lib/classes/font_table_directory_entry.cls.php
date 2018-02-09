<?php



class Font_Table_Directory_Entry extends Font_Binary_Stream {
  
  protected $Vj0kojsfk0h3;
  
  
  protected $Vj0kojsfk0h3_table;
  
  public $Vxknc0lghyzy = 4;
  
  var $Vhiuc0dwei5b;
  var $Vslg2bs3imzg;
  var $Vortqlloirgz;
  var $Volq3gdvkuqp;
  
  protected $Vzkmdbomblir;
  
  static function computeChecksum($Vou4vxorrdoe){
    $Vtojwsl3m1uw = strlen($Vou4vxorrdoe);
    $Vwstgchxeyay = $Vtojwsl3m1uw % 4;
    
    if ($Vwstgchxeyay) { 
      $Vou4vxorrdoe = str_pad($Vou4vxorrdoe, $Vtojwsl3m1uw + (4 - $Vwstgchxeyay), "\0");
    }
    
    $Vtojwsl3m1uw = strlen($Vou4vxorrdoe);
    
    $Vmsdi5g0vgac = 0x0000;
    $Vjjxpanviee4 = 0x0000;
    
    for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vtojwsl3m1uw; $Vfhiq1lhsoja += 4) {
      $Vmsdi5g0vgac += (ord($Vou4vxorrdoe[$Vfhiq1lhsoja]  ) << 8) + ord($Vou4vxorrdoe[$Vfhiq1lhsoja+1]);
      $Vjjxpanviee4 += (ord($Vou4vxorrdoe[$Vfhiq1lhsoja+2]) << 8) + ord($Vou4vxorrdoe[$Vfhiq1lhsoja+3]);
      $Vmsdi5g0vgac += $Vjjxpanviee4 >> 16;
      $Vjjxpanviee4 = $Vjjxpanviee4 & 0xFFFF;
      $Vmsdi5g0vgac = $Vmsdi5g0vgac & 0xFFFF;
    }
    
    return ($Vmsdi5g0vgac << 8) + $Vjjxpanviee4;
  }
  
  function __construct(Font_TrueType $Vj0kojsfk0h3) {
    $this->font = $Vj0kojsfk0h3;
    $this->f = $Vj0kojsfk0h3->f;
    $this->tag = $this->read(4);
  }
  
  function open($Vv0mtkrhebac, $Vwstgchxeyaye = self::modeRead) {
    
  }
  
  function setTable(Font_Table $Vj0kojsfk0h3_table) {
    $this->font_table = $Vj0kojsfk0h3_table;
  }
  
  function encode($Vwcagnux4a2n){
    Font::d("\n==== $this->tag ====");
    
    
    $Vou4vxorrdoe = $this->font_table;
    $Vj0kojsfk0h3 = $this->font;
    
    $Vcm223vbt2n4 = $Vj0kojsfk0h3->pos();
    $Vgekzrssy22z = $Vou4vxorrdoe->encode();
    
    $Vj0kojsfk0h3->seek($Vcm223vbt2n4);
    $Vu1jsdkcx2v2 = $Vj0kojsfk0h3->read($Vgekzrssy22z);
    
    $Vj0kojsfk0h3->seek($Vwcagnux4a2n);
    
    $Vj0kojsfk0h3->write($this->tag, 4);
    $Vj0kojsfk0h3->writeUInt32(self::computeChecksum($Vu1jsdkcx2v2));
    $Vj0kojsfk0h3->writeUInt32($Vcm223vbt2n4);
    $Vj0kojsfk0h3->writeUInt32($Vgekzrssy22z);
    
    Font::d("Bytes written = $Vgekzrssy22z");
    
    $Vj0kojsfk0h3->seek($Vcm223vbt2n4 + $Vgekzrssy22z);
  }
  
  
  function getFont() {
    return $this->font;
  }
  
  function startRead() {
    $this->seek($this->offset);
  }
  
  function endRead() {
    
  }
  
  function startWrite() {
    $this->seek($this->offset);
  }
  
  function endWrite() {
    
  }
}

