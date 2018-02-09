<?php



class PHP_Evaluator {
  
  
  protected $V4u1equ3zmgd;

  function __construct(Canvas $Vhvgft0vzcla) {
    $this->_canvas = $Vhvgft0vzcla;
  }

  function evaluate($V0x4xt3l5phz, $Vtf0r1rll31w = array()) {
    if ( !DOMPDF_ENABLE_PHP )
      return;
    
    
    $Vxj5miiauhxo = $this->_canvas;
    $Vt2hwhzxhitp = $Vxj5miiauhxo->get_page_number();
    $Vxlwfgramhbk = $Vxj5miiauhxo->get_page_count();
    
    
    foreach ($Vtf0r1rll31w as $V51lf1kcbto4 => $Vf1kwqxxhqpz) {
      $$V51lf1kcbto4 = $Vf1kwqxxhqpz;
    }

    
    eval(utf8_decode($V0x4xt3l5phz)); 
  }

  function render($Vrlbsjbjglkb) {
    $this->evaluate($Vrlbsjbjglkb->get_node()->nodeValue);
  }
}
