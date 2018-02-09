<?php


require_once dirname(__FILE__)."/font_binary_stream.cls.php";
require_once dirname(__FILE__)."/font_truetype.cls.php";


class Font_TrueType_Collection extends Font_Binary_Stream implements Iterator, Countable {
  
  private $Vey0js2ss2mo = 0;
  
  protected $Vinxmvim3rrm = array();
  protected $Vh1voiiflzlk = array();
  protected $Vh51i5i4ai0v;
  protected $Vaye5yaibgfk;
  
  function parse(){
    if (isset($this->numFonts)) {
      return;
    }
    
    $Vhiuc0dwei5b = $this->read(4);
    
    $this->version = $this->readFixed();
    $this->numFonts = $this->readUInt32();
    
    for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->numFonts; $Vfhiq1lhsoja++) {
      $this->collectionOffsets[] = $this->readUInt32();
    }
  }
  
  
  function getFont($Voraprwtd2s2) {
    $this->parse();
    
    if (!isset($this->collectionOffsets[$Voraprwtd2s2])) {
      throw new OutOfBoundsException();
    }
    
    if (isset($this->collection[$Voraprwtd2s2])) {
      return $this->collection[$Voraprwtd2s2];
    }
    
    $Vj0kojsfk0h3 = new Font_TrueType();
    $Vj0kojsfk0h3->f = $this->f;
    $Vj0kojsfk0h3->setTableOffset($this->collectionOffsets[$Voraprwtd2s2]);
    
    return $this->collection[$Voraprwtd2s2] = $Vj0kojsfk0h3;
  }
  
  function current() {
    return $this->getFont($this->position);
  }
  
  function key() {
    return $this->position;
  }
  
  function next() {
    return ++$this->position;
  }
  
  function rewind() {
    $this->position = 0;
  }
  
  function valid() {
    $this->parse();
    return isset($this->collectionOffsets[$this->position]);
  }
  
  function count() {
    $this->parse();
    return $this->numFonts;
  }
}
