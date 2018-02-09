<?php



class List_Bullet_Frame_Decorator extends Frame_Decorator {

  const BULLET_PADDING = 1; 
  
  const BULLET_THICKNESS = 0.04;   
  const BULLET_DESCENT = 0.3;  
  const BULLET_SIZE = 0.35;   
  
  static $Vlcrtfux4oqr = array("disc", "circle", "square");
  
  

  function __construct(Frame $Vrlbsjbjglkb, DOMPDF $Vhygqjznl3ul) {
    parent::__construct($Vrlbsjbjglkb, $Vhygqjznl3ul);
  }
  
  function get_margin_width() {
    $Vdtcpflt5bhp = $this->_frame->get_style();
    
    
    
    if ( $Vdtcpflt5bhp->list_style_position === "outside" ||
         $Vdtcpflt5bhp->list_style_type === "none" ) {
      return 0;
    }
    
    return $Vdtcpflt5bhp->get_font_size() * self::BULLET_SIZE + 2 * self::BULLET_PADDING;
  }

  
  function get_margin_height() {
    $Vdtcpflt5bhp = $this->_frame->get_style();
    
    if ( $Vdtcpflt5bhp->list_style_type === "none" ) {
      return 0;
    }
    
    return $Vdtcpflt5bhp->get_font_size() * self::BULLET_SIZE + 2 * self::BULLET_PADDING;
  }

  function get_width() {
    return $this->get_margin_height();
  }
  
  function get_height() {
    return $this->get_margin_height();
  }
  
  
}
