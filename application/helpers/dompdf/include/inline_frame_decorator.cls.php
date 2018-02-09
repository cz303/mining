<?php



class Inline_Frame_Decorator extends Frame_Decorator {
  
  function __construct(Frame $Vrlbsjbjglkb, DOMPDF $Vhygqjznl3ul) { parent::__construct($Vrlbsjbjglkb, $Vhygqjznl3ul); }

  function split($Vrlbsjbjglkb = null, $V0nltne4gj0x = false) {

    if ( is_null($Vrlbsjbjglkb) ) {
      $this->get_parent()->split($this, $V0nltne4gj0x);
      return;
    }

    if ( $Vrlbsjbjglkb->get_parent() !== $this )
      throw new DOMPDF_Exception("Unable to split: frame is not a child of this one.");
        
    $Vabnunvypdme = $this->copy( $this->_frame->get_node()->cloneNode() ); 
    $this->get_parent()->insert_child_after($Vabnunvypdme, $this);

    
    $Vdtcpflt5bhp = $this->_frame->get_style();
    $Vdtcpflt5bhp->margin_right = 0;
    $Vdtcpflt5bhp->padding_right = 0;
    $Vdtcpflt5bhp->border_right_width = 0;

    
    
    $Vdtcpflt5bhp = $Vabnunvypdme->get_style();
    $Vdtcpflt5bhp->margin_left = 0;
    $Vdtcpflt5bhp->padding_left = 0;
    $Vdtcpflt5bhp->border_left_width = 0;

    
    
    
    if ( ($Vbfatyoohaps = $Vdtcpflt5bhp->background_image) && $Vbfatyoohaps !== "none"
         && ($Ventvdulusdf = $Vdtcpflt5bhp->background_repeat) && $Ventvdulusdf !== "repeat" &&  $Ventvdulusdf !== "repeat-y"
       ) {
      $Vdtcpflt5bhp->background_image = "none";
    }           

    
    $V3m11hrbzjfu = $Vrlbsjbjglkb;
    while ($V3m11hrbzjfu) {
      $Vrlbsjbjglkb = $V3m11hrbzjfu;      
      $V3m11hrbzjfu = $V3m11hrbzjfu->get_next_sibling();
      $Vrlbsjbjglkb->reset();
      $Vabnunvypdme->append_child($Vrlbsjbjglkb);
    }
    
    $Vea0vadn2sv2 = array("always", "left", "right");
    $Vrlbsjbjglkb_style = $Vrlbsjbjglkb->get_style();
    if( $V0nltne4gj0x ||
      in_array($Vrlbsjbjglkb_style->page_break_before, $Vea0vadn2sv2) ||
      in_array($Vrlbsjbjglkb_style->page_break_after, $Vea0vadn2sv2) ) {

      $this->get_parent()->split($Vabnunvypdme, true);
    }
  }
  
} 
