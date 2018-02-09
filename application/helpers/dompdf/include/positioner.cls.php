<?php



abstract class Positioner {
  
  
  protected $Vvvuswijwhvo;
  
  

  function __construct(Frame_Decorator $Vrlbsjbjglkb) {
    $this->_frame = $Vrlbsjbjglkb;
  }
  
  
  function __destruct() {
    clear_object($this);
  }
  

  abstract function position();
  
  function move($V4w5ekxv5ji5, $Vm1noqcw5sjz, $Vtdvwwufoff2 = false) {
    list($V1e1eaicqarh, $Vqwmp2bx0ii2) = $this->_frame->get_position();
    
    if ( !$Vtdvwwufoff2 ) {
      $this->_frame->set_position($V1e1eaicqarh + $V4w5ekxv5ji5, $Vqwmp2bx0ii2 + $Vm1noqcw5sjz);
    }
    
    foreach($this->_frame->get_children() as $Vcnoizcxjx0n) {
      $Vcnoizcxjx0n->move($V4w5ekxv5ji5, $Vm1noqcw5sjz);
    }
  }
}
