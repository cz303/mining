<?php



class Table_Row_Group_Renderer extends Block_Renderer {

  

  function render(Frame $Vrlbsjbjglkb) {
    $Vdtcpflt5bhp = $Vrlbsjbjglkb->get_style(); 
    
    $this->_set_opacity( $Vrlbsjbjglkb->get_opacity( $Vdtcpflt5bhp->opacity ) );

    $this->_render_border($Vrlbsjbjglkb);
    $this->_render_outline($Vrlbsjbjglkb);
    
    if (DEBUG_LAYOUT && DEBUG_LAYOUT_BLOCKS) {
      $this->_debug_layout($Vrlbsjbjglkb->get_border_box(), "red");
      if (DEBUG_LAYOUT_PADDINGBOX) {
        $this->_debug_layout($Vrlbsjbjglkb->get_padding_box(), "red", array(0.5, 0.5));
      }
    }
    
    if (DEBUG_LAYOUT && DEBUG_LAYOUT_LINES && $Vrlbsjbjglkb->get_decorator()) {
      foreach ($Vrlbsjbjglkb->get_decorator()->get_line_boxes() as $Vdmbypy2xlg1) {
        $Vrlbsjbjglkb->_debug_layout(array($Vdmbypy2xlg1->x, $Vdmbypy2xlg1->y, $Vdmbypy2xlg1->w, $Vdmbypy2xlg1->h), "orange");
      }
    }
  }
}
