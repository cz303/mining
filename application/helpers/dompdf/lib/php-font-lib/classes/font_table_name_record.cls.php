<?php



class Font_Table_name_Record extends Font_Binary_Stream {
  public $Vknqhqzp3bvv;
  public $Vdbwh4fwnygu;
  public $V2dqnuxpj3hc;
  public $Veitoaub1rnw;
  public $Volq3gdvkuqp;
  public $Vortqlloirgz;
  public $Vlkger5ehs4w;
  
  public static $Vrcanlvxmlmp = array(
    "platformID" => self::uint16,
    "platformSpecificID" => self::uint16,
    "languageID" => self::uint16,
    "nameID"     => self::uint16,
    "length"     => self::uint16,
    "offset"     => self::uint16,
  );
  
  public function map($Vou4vxorrdoe) {
    foreach($Vou4vxorrdoe as $Vseq1edikdvg => $Vp4xjtpabm0l) {
      $this->$Vseq1edikdvg = $Vp4xjtpabm0l;
    }
  }
  
  public function getUTF8() {
    return $this->string;
  }
  
  public function getUTF16() {
    return Font::UTF8ToUTF16($this->string);
  }
  
  function __toString(){
    return $this->string;
  }
}