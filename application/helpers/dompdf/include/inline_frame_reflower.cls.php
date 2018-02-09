<?php



class Inline_Frame_Reflower extends Frame_Reflower {

  function __construct(Frame $Vrlbsjbjglkb) { parent::__construct($Vrlbsjbjglkb); }
  
  

  function reflow(Frame_Decorator $V4uturqtpcq5 = null) {
    $Vrlbsjbjglkb = $this->_frame;
    
    
    $Vmt0302hgn5x = $Vrlbsjbjglkb->get_root();
    $Vmt0302hgn5x->check_forced_page_break($Vrlbsjbjglkb);
    
    if ( $Vmt0302hgn5x->is_full() )
      return;
      
    $Vdtcpflt5bhp = $Vrlbsjbjglkb->get_style();
    
    
    $this->_set_content();
    
    $Vrlbsjbjglkb->position();

    $Vstfrw5akne1 = $Vrlbsjbjglkb->get_containing_block();

    
    if ( ($Vtbbah5lqvpo = $Vrlbsjbjglkb->get_first_child()) && $Vtbbah5lqvpo instanceof Text_Frame_Decorator ) {
      $Vtbbah5lqvpo_style = $Vtbbah5lqvpo->get_style();
      $Vtbbah5lqvpo_style->margin_left  = $Vdtcpflt5bhp->margin_left;
      $Vtbbah5lqvpo_style->padding_left = $Vdtcpflt5bhp->padding_left;
      $Vtbbah5lqvpo_style->border_left  = $Vdtcpflt5bhp->border_left;
    }

    if ( ($Vxlmgxcqqg2w = $Vrlbsjbjglkb->get_last_child()) && $Vxlmgxcqqg2w instanceof Text_Frame_Decorator ) {
      $Vxlmgxcqqg2w_style = $Vxlmgxcqqg2w->get_style();
      $Vxlmgxcqqg2w_style->margin_right  = $Vdtcpflt5bhp->margin_right;
      $Vxlmgxcqqg2w_style->padding_right = $Vdtcpflt5bhp->padding_right;
      $Vxlmgxcqqg2w_style->border_right  = $Vdtcpflt5bhp->border_right;
    }
    
    if ( $V4uturqtpcq5 ) {
      $V4uturqtpcq5->add_frame_to_line($this->_frame);
    }

    
    
    foreach ( $Vrlbsjbjglkb->get_children() as $Vcnoizcxjx0n ) {
      $Vcnoizcxjx0n->set_containing_block($Vstfrw5akne1);
      $Vcnoizcxjx0n->reflow($V4uturqtpcq5);
    }
  }
}
