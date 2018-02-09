<?php



class Javascript_Embedder {
  
  
  protected $Vci1vex3llkx;

  function __construct(DOMPDF $Vhygqjznl3ul) {
    $this->_dompdf = $Vhygqjznl3ul;
  }

  function insert($V0x4xt3l5phz) {
    $this->_dompdf->get_canvas()->javascript($V0x4xt3l5phz);
  }

  function render($Vrlbsjbjglkb) {
    if ( !DOMPDF_ENABLE_JAVASCRIPT )
      return;
      
    $this->insert($Vrlbsjbjglkb->get_node()->nodeValue);
  }
}
