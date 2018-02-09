<?php


require_once dirname(__FILE__)."/font_table_name_record.cls.php";


class Font_Table_name extends Font_Table {
  private static $V5ngy5snherh = array(
    "format"       => self::uint16,
    "count"        => self::uint16,
    "stringOffset" => self::uint16,
  );
  
  protected function _parse(){
    $Vj0kojsfk0h3 = $this->getFont();
    $Vou4vxorrdoe = array();
    
    $Vrc2k35qljw1 = $Vj0kojsfk0h3->pos();
    
    $Vou4vxorrdoe = $Vj0kojsfk0h3->unpack(self::$V5ngy5snherh);
    
    $Vaq4zgw3slcm = array();
    for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vou4vxorrdoe["count"]; $Vfhiq1lhsoja++) {
      $Vkry1ureuzsj = new Font_Table_name_Record();
      $Vkry1ureuzsj_data = $Vj0kojsfk0h3->unpack(Font_Table_name_Record::$Vrcanlvxmlmp);
      $Vkry1ureuzsj->map($Vkry1ureuzsj_data);
      
      $Vaq4zgw3slcm[] = $Vkry1ureuzsj;
    }
    
    $Vuyq43c4rgyg = array();
    foreach($Vaq4zgw3slcm as $Vkry1ureuzsj) {
      $Vj0kojsfk0h3->seek($Vrc2k35qljw1 + $Vou4vxorrdoe["stringOffset"] + $Vkry1ureuzsj->offset);
      $V2n430jknk35 = $Vj0kojsfk0h3->read($Vkry1ureuzsj->length);
      $Vkry1ureuzsj->string = Font::UTF16ToUTF8($V2n430jknk35);
      $Vuyq43c4rgyg[$Vkry1ureuzsj->nameID] = $Vkry1ureuzsj;
    }
    
    $Vou4vxorrdoe["records"] = $Vuyq43c4rgyg;
    
    $this->data = $Vou4vxorrdoe;
  }
  
  protected function _encode(){
    $Vj0kojsfk0h3 = $this->getFont();
    
    $Vaq4zgw3slcm = $this->data["records"];
    $Vvsxedpxzmt5 = count($Vaq4zgw3slcm);
    
    $this->data["count"] = $Vvsxedpxzmt5;
    $this->data["stringOffset"] = 6 + $Vvsxedpxzmt5 * 12; 
    
    $Vrc2k35qljw1 = $Vj0kojsfk0h3->pos();
    
    $Volq3gdvkuqp = $Vj0kojsfk0h3->pack(self::$V5ngy5snherh, $this->data);
    
    $Vaq4zgw3slcmOffset = $Vj0kojsfk0h3->pos();
    
    $Vortqlloirgz = 0;
    foreach($Vaq4zgw3slcm as $Vkry1ureuzsj) {
      $Vkry1ureuzsj->length = mb_strlen($Vkry1ureuzsj->getUTF16(), "8bit");
      $Vkry1ureuzsj->offset = $Vortqlloirgz;
      $Vortqlloirgz += $Vkry1ureuzsj->length;
      $Volq3gdvkuqp += $Vj0kojsfk0h3->pack(Font_Table_name_Record::$Vrcanlvxmlmp, (array)$Vkry1ureuzsj);
    }
    
    foreach($Vaq4zgw3slcm as $Vkry1ureuzsj) {
      $V2n430jknk35tr = $Vkry1ureuzsj->getUTF16();
      $Volq3gdvkuqp += $Vj0kojsfk0h3->write($V2n430jknk35tr, mb_strlen($V2n430jknk35tr, "8bit"));
    }
    
    return $Volq3gdvkuqp;
  }
}