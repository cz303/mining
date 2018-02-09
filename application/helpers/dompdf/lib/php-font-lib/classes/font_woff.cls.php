<?php


require_once dirname(__FILE__)."/font_truetype.cls.php";
require_once dirname(__FILE__)."/font_woff_table_directory_entry.cls.php";
require_once dirname(__FILE__)."/font_woff_header.cls.php";


class Font_WOFF extends Font_TrueType {
  function parseHeader(){
    if (!empty($this->header)) {
      return;
    }
    
    $this->header = new Font_WOFF_Header($this);
    $this->header->parse();
  }
  
  public function load($Vg5mhfl1beoi) {
    parent::load($Vg5mhfl1beoi);
    
    $this->parseTableEntries();
    $Vpxdu5b3icge = $this->pos() + count($this->directory) * 20;
    
    $Viaoukfm1ihl = $this->getTempFile(false);
    $Vdfgqy2d4rx3 = $this->f;
    
    $this->f = $Viaoukfm1ihl;
    $Vortqlloirgz = $this->header->encode();
    
    foreach($this->directory as $V4o5wb5ucdu5) {
      
      $this->f = $Vdfgqy2d4rx3;
      $this->seek($V4o5wb5ucdu5->offset);
      $Vou4vxorrdoe = $this->read($V4o5wb5ucdu5->length);
      
      if ($V4o5wb5ucdu5->length < $V4o5wb5ucdu5->origLength) {
        $Vou4vxorrdoe = gzuncompress($Vou4vxorrdoe);
      }
      
      
      $Volq3gdvkuqp = strlen($Vou4vxorrdoe);
      $V4o5wb5ucdu5->length = $V4o5wb5ucdu5->origLength = $Volq3gdvkuqp;
      $V4o5wb5ucdu5->offset = $Vpxdu5b3icge;
      
      
      $this->f = $Viaoukfm1ihl;
      
      
      $this->seek($Vortqlloirgz);
      $Vortqlloirgz += $this->write($V4o5wb5ucdu5->tag, 4);    
      $Vortqlloirgz += $this->writeUInt32($Vpxdu5b3icge); 
      $Vortqlloirgz += $this->writeUInt32($Volq3gdvkuqp);     
      $Vortqlloirgz += $this->writeUInt32($Volq3gdvkuqp);     
      $Vortqlloirgz += $this->writeUInt32(Font_Table_Directory_Entry::computeChecksum($Vou4vxorrdoe)); 
      
      
      $this->seek($Vpxdu5b3icge);
      $Vpxdu5b3icge += $this->write($Vou4vxorrdoe, $Volq3gdvkuqp);
    }
    
    $this->f = $Viaoukfm1ihl;
    $this->seek(0);
    
    
    $this->header = null;
    $this->directory = array();
    $this->parseTableEntries();
  }
}
