<?php



abstract class Font_Header extends Font_Binary_Stream {
  
  protected $Vj0kojsfk0h3;
  protected $Vrylphpo42p4 = array();
  
  public $Vou4vxorrdoe;
  
  public function __construct(Font_TrueType $Vj0kojsfk0h3) {
    $this->font = $Vj0kojsfk0h3;
  }
  
  public function encode(){
    return $this->font->pack($this->def, $this->data);
  }
  
  public function parse(){
    $this->data = $this->font->unpack($this->def);
  }
}