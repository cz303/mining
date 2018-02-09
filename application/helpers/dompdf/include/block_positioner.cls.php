<?php



class Block_Positioner extends Positioner {


  function __construct(Frame_Decorator $Vrlbsjbjglkb) { parent::__construct($Vrlbsjbjglkb); }
  
  

  function position() {
    $Vrlbsjbjglkb = $this->_frame;
    $Vdtcpflt5bhp = $Vrlbsjbjglkb->get_style();
    $Vstfrw5akne1 = $Vrlbsjbjglkb->get_containing_block();
    $Vzqw0ieauwu4 = $Vrlbsjbjglkb->find_block_parent();
    
    if ( $Vzqw0ieauwu4 ) {
      $Vpldvvijbza2 = $Vdtcpflt5bhp->float;
      if ( !DOMPDF_ENABLE_CSS_FLOAT || !$Vpldvvijbza2 || $Vpldvvijbza2 === "none" ) {
        $Vzqw0ieauwu4->add_line(true);
      }
      $Vqwmp2bx0ii2 = $Vzqw0ieauwu4->get_current_line_box()->y;
      
    } else
      $Vqwmp2bx0ii2 = $Vstfrw5akne1["y"];

    $V1e1eaicqarh = $Vstfrw5akne1["x"];

    
    if ( $Vdtcpflt5bhp->position === "relative" ) {
      $Vrveb1xz24qu =    $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->top,    $Vstfrw5akne1["h"]);
      
      
      $Vrce0gsxjgkc =   $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->left,   $Vstfrw5akne1["w"]);
      
      $V1e1eaicqarh += $Vrce0gsxjgkc;
      $Vqwmp2bx0ii2 += $Vrveb1xz24qu;
    }
    
    $Vrlbsjbjglkb->set_position($V1e1eaicqarh, $Vqwmp2bx0ii2);
  }
}
