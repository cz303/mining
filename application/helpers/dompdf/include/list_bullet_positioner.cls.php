<?php



class List_Bullet_Positioner extends Positioner {

  function __construct(Frame_Decorator $Vrlbsjbjglkb) { parent::__construct($Vrlbsjbjglkb); }
  
  

  function position() {
    
    
    
    $Vstfrw5akne1 = $this->_frame->get_containing_block();
    
    
    
    $V1e1eaicqarh = $Vstfrw5akne1["x"] - $this->_frame->get_width();

    $Vzqw0ieauwu4 = $this->_frame->find_block_parent();

    $Vqwmp2bx0ii2 = $Vzqw0ieauwu4->get_current_line_box()->y;

    
    $Vmwwo1qnmepz = $this->_frame->get_next_sibling();
    if ( $Vmwwo1qnmepz ) {
      $Vdtcpflt5bhp = $Vmwwo1qnmepz->get_style();
      $Vwtjstnlj0bu = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->line_height, $Vdtcpflt5bhp->get_font_size());
      $Vortqlloirgz = $Vdtcpflt5bhp->length_in_pt($Vwtjstnlj0bu, $Vmwwo1qnmepz->get_containing_block("h")) - $this->_frame->get_height();             
      $Vqwmp2bx0ii2 += $Vortqlloirgz / 2;
    }

  
  
  
  
  
  
  
  
  
    
    
    
    
    
    

  
  

    
   
    
    $this->_frame->set_position($V1e1eaicqarh, $Vqwmp2bx0ii2);
    
  }
}
