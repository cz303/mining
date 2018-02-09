<?php



class Table_Cell_Frame_Decorator extends Block_Frame_Decorator {
  
  protected $V2zq0sgfrnjb;
  protected $V1nrqwgqj4nx;
  
  

  function __construct(Frame $Vrlbsjbjglkb, DOMPDF $Vhygqjznl3ul) {
    parent::__construct($Vrlbsjbjglkb, $Vhygqjznl3ul);
    $this->_resolved_borders = array();
    $this->_content_height = 0;    
  }

  

  function reset() {
    parent::reset();
    $this->_resolved_borders = array();
    $this->_content_height = 0;
    $this->_frame->reset();    
  }
  
  function get_content_height() {
    return $this->_content_height;
  }

  function set_content_height($Vzo4g5xb4yip) {
    $this->_content_height = $Vzo4g5xb4yip;
  }
  
  function set_cell_height($Vzo4g5xb4yip) {
    $Vdtcpflt5bhp = $this->get_style();
    $Vpk4dfxon3c0 = $Vdtcpflt5bhp->length_in_pt(array($Vdtcpflt5bhp->margin_top,
                                          $Vdtcpflt5bhp->padding_top,
                                          $Vdtcpflt5bhp->border_top_width,
                                          $Vdtcpflt5bhp->border_bottom_width,
                                          $Vdtcpflt5bhp->padding_bottom,
                                          $Vdtcpflt5bhp->margin_bottom),
                                    $Vdtcpflt5bhp->width);

    $Vftgte5yvwv5 = $Vzo4g5xb4yip - $Vpk4dfxon3c0;    
    $Vdtcpflt5bhp->height = $Vftgte5yvwv5;

    if ( $Vftgte5yvwv5 > $this->_content_height ) {
      $V1ddku4w0ezi = 0;
      
      
      switch ($Vdtcpflt5bhp->vertical_align) {
        default:
        case "baseline":
          
          
        case "top":
          
          return;
  
        case "middle":
          $V1ddku4w0ezi = ($Vftgte5yvwv5 - $this->_content_height) / 2;
          break;
  
        case "bottom":
          $V1ddku4w0ezi = $Vftgte5yvwv5 - $this->_content_height;
          break;
      }
   
      if ( $V1ddku4w0ezi ) {
        
        foreach ( $this->get_line_boxes() as $Vfhiq1lhsoja => $Vdmbypy2xlg1 ) {
          foreach ( $Vdmbypy2xlg1->get_frames() as $Vrlbsjbjglkb )
            $Vrlbsjbjglkb->move( 0, $V1ddku4w0ezi );
        }
      }
   }
        
  }

  function set_resolved_border($V5qa0rylnggy, $V5kdivqyx0yw) {    
    $this->_resolved_borders[$V5qa0rylnggy] = $V5kdivqyx0yw;
  }

  

  function get_resolved_border($V5qa0rylnggy) {
    return $this->_resolved_borders[$V5qa0rylnggy];
  }

  function get_resolved_borders() { return $this->_resolved_borders; }
}
