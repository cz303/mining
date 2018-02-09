<?php



class Font_Binary_Stream {
  
  protected $Vtbbah5lqvpo;
  
  const uint8     = 1;
  const  int8     = 2;
  const uint16    = 3;
  const  int16    = 4;
  const uint32    = 5;
  const  int32    = 6;
  const shortFrac = 7;
  const Fixed     = 8;
  const  FWord    = 9;
  const uFWord    = 10;
  const F2Dot14   = 11;
  const longDateTime = 12;
  const char      = 13;
  
  private static $Voa40yygjgfq = array(
    self::uint8     => 1,
    self::int8      => 1,
    self::uint16    => 2,
    self::int16     => 2,
    self::uint32    => 4,
    self::int32     => 4,
    self::shortFrac => 4,
    self::Fixed     => 4,
    self::FWord     => 2,
    self::uFWord    => 2,
    self::F2Dot14   => 2,
    self::longDateTime => 8,
    self::char      => 1,
  );
  
  const modeRead      = "rb";
  const modeWrite     = "wb";
  const modeReadWrite = "rb+";

  
  public function load($Vtbbah5lqvpoilename) {
    return $this->open($Vtbbah5lqvpoilename, self::modeRead);
  }
  
  
  public function open($Vtbbah5lqvpoilename, $Vbdcqcmfhadr = self::modeRead) {
    if (!in_array($Vbdcqcmfhadr, array(self::modeRead, self::modeWrite, self::modeReadWrite))) {
      throw new Exception("Unkown file open mode");
    }
    
    $this->f = fopen($Vtbbah5lqvpoilename, $Vbdcqcmfhadr);
    return $this->f != false;
  }
  
  
  public function close() {
    return fclose($this->f) != false;
  }
  
  
  public function setFile($Vtbbah5lqvpop) {
    if (!is_resource($Vtbbah5lqvpop)) {
      throw new Exception('$Vtbbah5lqvpop is not a valid resource');
    }
    
    $this->f = $Vtbbah5lqvpop;
  }
  
  
  public static function getTempFile($Vqivlli0rjv4 = true) {
    $Vtbbah5lqvpo = null;
    
    if ($Vqivlli0rjv4) {
      
      @fopen("php://temp", "rb+");
    }
    
    if (!$Vtbbah5lqvpo) {
      $Vtbbah5lqvpo = fopen(tempnam(sys_get_temp_dir(), "fnt"), "rb+");
    }
    
    return $Vtbbah5lqvpo;
  }
  
  
  public function seek($Vortqlloirgz) {
    return fseek($this->f, $Vortqlloirgz, SEEK_SET) == 0;
  }
  
  
  public function pos() {
    return ftell($this->f);
  }
  
  public function skip($Vmwwo1qnmepz) {
    fseek($this->f, $Vmwwo1qnmepz, SEEK_CUR);
  }
  
  public function read($Vmwwo1qnmepz) {
    if ($Vmwwo1qnmepz < 1) return "";
    return fread($this->f, $Vmwwo1qnmepz);
  }
  
  public function write($Vou4vxorrdoe, $Volq3gdvkuqp = null) {
    if ($Vou4vxorrdoe === null || $Vou4vxorrdoe === "") return;
    return fwrite($this->f, $Vou4vxorrdoe, $Volq3gdvkuqp);
  }

  public function readUInt8() {
    return ord($this->read(1));
  }

  public function writeUInt8($Vou4vxorrdoe) {
    return $this->write(chr($Vou4vxorrdoe), 1);
  }

  public function readInt8() {
    $Vf1kwqxxhqpz = $this->readUInt8();
    
    if ($Vf1kwqxxhqpz >= 0x80) {
      $Vf1kwqxxhqpz -= 0x100;
    }
      
    return $Vf1kwqxxhqpz;
  }

  public function writeInt8($Vou4vxorrdoe) {
    if ($Vou4vxorrdoe < 0) {
      $Vou4vxorrdoe += 0x100;
    }
    
    return $this->writeUInt8($Vou4vxorrdoe);
  }

  public function readUInt16() {
    $Vi3y3l1uvwp3 = unpack("nn", $this->read(2));
    
    return $Vi3y3l1uvwp3["n"];
  }

  public function writeUInt16($Vou4vxorrdoe) {
    return $this->write(pack("n", $Vou4vxorrdoe), 2);
  }

  public function readInt16() {
    $Vf1kwqxxhqpz = $this->readUInt16();
    
    if ($Vf1kwqxxhqpz >= 0x8000) {
      $Vf1kwqxxhqpz -= 0x10000;
    }
      
    return $Vf1kwqxxhqpz;
  }

  public function writeInt16($Vou4vxorrdoe) {
    if ($Vou4vxorrdoe < 0) {
      $Vou4vxorrdoe += 0x10000;
    }
    
    return $this->writeUInt16($Vou4vxorrdoe);
  }

  public function readUInt32() {
    $Vi3y3l1uvwp3 = unpack("NN", $this->read(4));
    return $Vi3y3l1uvwp3["N"];
  }

  public function writeUInt32($Vou4vxorrdoe) {
    return $this->write(pack("N", $Vou4vxorrdoe), 4);
  }

  public function readFixed() {
    $Vrec2f1japon = $this->readInt16();
    $Vrec2f1japon2 = $this->readUInt16();
    return round($Vrec2f1japon + $Vrec2f1japon2 / 0x10000, 4);
  }

  public function writeFixed($Vou4vxorrdoe) {
    $Vrce0gsxjgkc = floor($Vou4vxorrdoe);
    $Vqyn43hpxtm0 = ($Vou4vxorrdoe - $Vrce0gsxjgkc) * 0x10000;
    return $this->writeInt16($Vrce0gsxjgkc) + $this->writeUInt16($Vqyn43hpxtm0);
  }
  
  public function readLongDateTime() {
    $this->readUInt32(); 
    $Vrec2f1japonate = $this->readUInt32() - 2082844800;
    
    return strftime("%Y-%m-%d %H:%M:%S", $Vrec2f1japonate);
  }
  
  public function writeLongDateTime($Vou4vxorrdoe) {
    $Vrec2f1japonate = strtotime($Vou4vxorrdoe);
    $Vrec2f1japonate += 2082844800;
    
    return $this->writeUInt32(0) + $this->writeUInt32($Vrec2f1japonate);
  }
  
  public function unpack($Vrec2f1japonef) {
    $Vrec2f1japon = array();
    foreach($Vrec2f1japonef as $Vmwwo1qnmepzame => $V4pigtpor0ln) {
      $Vrec2f1japon[$Vmwwo1qnmepzame] = $this->r($V4pigtpor0ln);
    }
    return $Vrec2f1japon;
  }
  
  public function pack($Vrec2f1japonef, $Vou4vxorrdoe) {
    $Vg1e0ta0mrbf = 0;
    foreach($Vrec2f1japonef as $Vmwwo1qnmepzame => $V4pigtpor0ln) {
      $Vg1e0ta0mrbf += $this->w($V4pigtpor0ln, $Vou4vxorrdoe[$Vmwwo1qnmepzame]);
    }
    return $Vg1e0ta0mrbf;
  }
  
  
  public function r($V4pigtpor0ln) {
    switch($V4pigtpor0ln) {
      case self::uint8:     return $this->readUInt8();
      case self::int8:      return $this->readInt8();
      case self::uint16:    return $this->readUInt16();
      case self::int16:     return $this->readInt16();
      case self::uint32:    return $this->readUInt32();
      case self::int32:     return $this->readUInt32(); 
      case self::shortFrac: return $this->readFixed();
      case self::Fixed:     return $this->readFixed();
      case self::FWord:     return $this->readInt16();
      case self::uFWord:    return $this->readUInt16();
      case self::F2Dot14:   return $this->readInt16();
      case self::longDateTime: return $this->readLongDateTime();
      case self::char:      return $this->read(1);
      default: 
        if ( is_array($V4pigtpor0ln) ) {
          if ($V4pigtpor0ln[0] == self::char) {
            return $this->read($V4pigtpor0ln[1]);
          }
          
          $Vc0brddnw0vm = array();
          for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $V4pigtpor0ln[1]; $Vfhiq1lhsoja++) {
            $Vc0brddnw0vm[] = $this->r($V4pigtpor0ln[0]);
          }
          return $Vc0brddnw0vm;
        }
    }
  }
  
  
  public function w($V4pigtpor0ln, $Vou4vxorrdoe) {
    switch($V4pigtpor0ln) {
      case self::uint8:     return $this->writeUInt8($Vou4vxorrdoe);
      case self::int8:      return $this->writeInt8($Vou4vxorrdoe);
      case self::uint16:    return $this->writeUInt16($Vou4vxorrdoe);
      case self::int16:     return $this->writeInt16($Vou4vxorrdoe);
      case self::uint32:    return $this->writeUInt32($Vou4vxorrdoe);
      case self::int32:     return $this->writeUInt32($Vou4vxorrdoe); 
      case self::shortFrac: return $this->writeFixed($Vou4vxorrdoe);
      case self::Fixed:     return $this->writeFixed($Vou4vxorrdoe);
      case self::FWord:     return $this->writeInt16($Vou4vxorrdoe);
      case self::uFWord:    return $this->writeUInt16($Vou4vxorrdoe);
      case self::F2Dot14:   return $this->writeInt16($Vou4vxorrdoe);
      case self::longDateTime: return $this->writeLongDateTime($Vou4vxorrdoe);
      case self::char:      return $this->write($Vou4vxorrdoe, 1);
      default: 
        if ( is_array($V4pigtpor0ln) ) {
          if ($V4pigtpor0ln[0] == self::char) {
            return $this->write($Vou4vxorrdoe, $V4pigtpor0ln[1]);
          }
          
          $Vc0brddnw0vm = 0;
          for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $V4pigtpor0ln[1]; $Vfhiq1lhsoja++) {
            $Vc0brddnw0vm += $this->w($V4pigtpor0ln[0], $Vou4vxorrdoe[$Vfhiq1lhsoja]);
          }
          return $Vc0brddnw0vm;
        }
    }
  }
  
  
  public function convertUInt32ToStr($Vgoezp5dx4s3) {
    return chr(($Vgoezp5dx4s3 >> 24) & 0xFF).chr(($Vgoezp5dx4s3 >> 16) & 0xFF).chr(($Vgoezp5dx4s3 >> 8) & 0xFF).chr($Vgoezp5dx4s3 & 0xFF);
  }
}
