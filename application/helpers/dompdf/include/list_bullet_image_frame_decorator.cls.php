<?php



class List_Bullet_Image_Frame_Decorator extends Frame_Decorator {

  
  protected $Vyf2n4z31iy0;

  
  protected $V1hgtvz3lirj;
  
  
  protected $Vcbzw3tnapla;

  
  function __construct(Frame $Vrlbsjbjglkb, DOMPDF $Vhygqjznl3ul) {
    $Vdtcpflt5bhp = $Vrlbsjbjglkb->get_style();
    $Vbfatyoohaps = $Vdtcpflt5bhp->list_style_image;
    $Vrlbsjbjglkb->get_node()->setAttribute("src", $Vbfatyoohaps);
    $this->_img = new Image_Frame_Decorator($Vrlbsjbjglkb, $Vhygqjznl3ul);
    parent::__construct($this->_img, $Vhygqjznl3ul);
    list($Vojs2qdgagwv, $Vzo4g5xb4yip) = dompdf_getimagesize($this->_img->get_image_url());

    
    
    
    $this->_width = (((float)rtrim($Vojs2qdgagwv, "px")) * 72) / DOMPDF_DPI;
    $this->_height = (((float)rtrim($Vzo4g5xb4yip, "px")) * 72) / DOMPDF_DPI;
 
    
    
    
    
    
    
    
    
    
    
    
  }

  
  function get_width() {
    
    
    
    
    return $this->_frame->get_style()->get_font_size()*List_Bullet_Frame_Decorator::BULLET_SIZE + 
      2 * List_Bullet_Frame_Decorator::BULLET_PADDING;
  }

  
  function get_height() {
    
    return $this->_height;
  }
  
  
  function get_margin_width() {
    
    
    
    
    
    

    
    
    if ( $this->_frame->get_style()->list_style_position === "outside" ||
         $this->_width == 0) 
      return 0;
    
    
    
    
    
    return $this->_width + 2 * List_Bullet_Frame_Decorator::BULLET_PADDING;
  }

  
  function get_margin_height() {
    
    
    return $this->_height + 2 * List_Bullet_Frame_Decorator::BULLET_PADDING;
  }

  
  function get_image_url() {
    return $this->_img->get_image_url();
  }
  
}
